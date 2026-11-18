// Magic Phone Live — dedicated Cloudflare Worker (not a SIP/RTP server)
// Secrets: GEMINI_API_KEY, BRIDGE_ACCESS_TOKEN (>=24 ASCII url-safe chars)
// Var: ALLOWED_ORIGIN=https://ai.magics.site ; optional GEMINI_MODEL=gemini-3.8-live
const endpoint="wss://generativelanguage.googleapis.com/ws/google.ai.generativelanguage.v1beta.GenerativeService.BidiGenerateContent";
const BUILD="magic-phone-1.2.2-binary-audio-fix";
const json=(o,s)=>new Response(JSON.stringify(o),{status:s,headers:{"Content-Type":"application/json","Cache-Control":"no-store"}});
function same(a,b){
  if(typeof a!=="string"||typeof b!=="string")return false;
  let d=a.length^b.length;
  for(let i=0;i<Math.max(a.length,b.length);i++)d|=(a.charCodeAt(i)||0)^(b.charCodeAt(i)||0);
  return d===0;
}
function decodeAuthToken(value){
  try{
    const base64=value.replace(/-/g,"+").replace(/_/g,"/");
    const padded=base64+"=".repeat((4-base64.length%4)%4);
    const binary=atob(padded);
    const bytes=Uint8Array.from(binary,c=>c.charCodeAt(0));
    return new TextDecoder().decode(bytes);
  }catch(_){return ""}
}
function authorized(request,env){
  const protocols=(request.headers.get("Sec-WebSocket-Protocol")||"").split(",").map(x=>x.trim());
  const p=protocols.find(x=>x.startsWith("magic-auth."));
  const supplied=decodeAuthToken(p?p.slice("magic-auth.".length):"");
  return request.headers.get("Origin")===env.ALLOWED_ORIGIN &&
    protocols.includes("magic-phone.v1") &&
    same(supplied,env.BRIDGE_ACCESS_TOKEN);
}
function open(ws){return ws&&ws.readyState===1}
function close(ws,code,reason){try{if(ws&&(ws.readyState===0||ws.readyState===1))ws.close(code,reason)}catch(_){}}
export default {
 async fetch(req,env){
  const path=new URL(req.url).pathname;
  if(path.endsWith("/health"))return json({service:"magic-phone-live",build:BUILD,protocol:"websocket",sip:false},200);
  if(!path.endsWith("/ws"))return json({error:"not_found"},404);
  const mode=new URL(req.url).searchParams.get("mode")==="phone"?"phone":"browser";
  const systemText=mode==="phone"
    ?"You are Magic Phone, a live AI telephone assistant. Speak naturally and concisely in Persian (fa-IR) by default. This is a real telephone conversation. Be transparent that you are an AI assistant if asked; never pretend to be the human phone owner. Listen carefully, answer briefly, and ask one clear follow-up question when needed. Never claim that you sent a message, made a booking, transferred a call, or performed another action unless a connected tool confirms it. Never request passwords, one-time codes, full payment-card details, or other sensitive credentials. If asked for a human, explain that you can take a message or ask them to call back; do not claim call transfer is available. For emergencies, direct the caller to local emergency services. Avoid markdown, lists, and emoji."
    :"You are Magic Phone, a friendly and concise Persian-speaking voice assistant. Reply naturally in Persian. Identify yourself as an AI if asked. This is a browser voice test.";
  if(!env.GEMINI_API_KEY||!env.BRIDGE_ACCESS_TOKEN||env.BRIDGE_ACCESS_TOKEN.length<24||!env.ALLOWED_ORIGIN)return json({error:"not_configured"},503);
  if((req.headers.get("Upgrade")||"").toLowerCase()!=="websocket")return json({error:"websocket_required"},426);
  if(!authorized(req,env))return json({error:"unauthorized"},403);
  const pair=new WebSocketPair(),client=pair[0],bridge=pair[1];
  bridge.accept();
  const model=/^[A-Za-z0-9._-]+$/.test(env.GEMINI_MODEL||"")?env.GEMINI_MODEL:"gemini-3.8-live";
  let upstream;
  try{upstream=new WebSocket(endpoint+"?key="+encodeURIComponent(env.GEMINI_API_KEY));upstream.binaryType="arraybuffer"}
  catch(_){close(bridge,1011,"Gemini initialization failed");return json({error:"upstream_unavailable"},502)}
  let ended=false,ready=false,upstreamOpen=false,upstreamFault=false,windowStart=Date.now(),count=0,audioForwarded=0,greetingSent=false;
  function phase(){return ready?"streaming":(upstreamOpen?"awaiting_setup":"connecting")}
  function safeDetail(value){
    let result=String(value||"").slice(0,500);
    for(const secret of [env.GEMINI_API_KEY,env.BRIDGE_ACCESS_TOKEN]){
      if(typeof secret==="string"&&secret.length>=8)result=result.split(secret).join("[redacted]");
    }
    return result.replace(/(api_key|access_token|key)=([^\s&]+)/gi,"$1=[redacted]").slice(0,220);
  }
  function warn(type,details={}){
    if(open(bridge))try{bridge.send(JSON.stringify({bridgeError:type,phase:phase(),...details}))}catch(_){}
  }
  function finish(reason){if(ended)return;ended=true;close(upstream,1000,"Session ended");close(bridge,1000,reason||"Session ended")}
  upstream.addEventListener("open",()=>{
   upstreamOpen=true;
   if(ended)return;
   try{upstream.send(JSON.stringify({setup:{
     model:"models/"+model,
     generationConfig:{responseModalities:["AUDIO"]},
     systemInstruction:{parts:[{text:systemText}]}
   }}))}
   catch(_){warn("setup_failed");finish("Setup failed")}
  });
  // Gemini Live may send JSON via binary WebSocket frames on Cloudflare.
  // Always decode before inspecting setupComplete AND forwarding to browser.
  function onUpstreamPacket(raw){
    if(ended)return;
    let textPayload;
    if(typeof raw==="string")textPayload=raw;
    else if(raw instanceof ArrayBuffer)textPayload=new TextDecoder().decode(raw);
    else if(ArrayBuffer.isView(raw))textPayload=new TextDecoder().decode(raw);
    else{warn("unsupported_upstream_frame");return}
    let message;
    try{message=JSON.parse(textPayload)}
    catch(_){warn("unparseable_upstream_frame");return}
    if(message.setupComplete){
      ready=true;
      if(open(bridge))try{bridge.send(JSON.stringify({bridgeStatus:"setup_confirmed"}))}catch(_){}
    }
    if(message.error){
      warn("gemini_api_error",{closeCode:Number(message.error.code)||0,detail:safeDetail(message.error.message||message.error.status)});
      finish("Gemini rejected request");return;
    }
    if(open(bridge))try{bridge.send(textPayload)}catch(_){finish("Forward failed")}
  }
  upstream.addEventListener("message",e=>{
    if(e.data instanceof Blob){
      e.data.text().then(onUpstreamPacket).catch(()=>warn("binary_decode_failed"));
    }else{
      try{onUpstreamPacket(e.data)}catch(_){warn("upstream_frame_failed")}
    }
  });
  upstream.addEventListener("error",()=>{upstreamFault=true});
  upstream.addEventListener("close",event=>{
    if(ended)return;
    // A CloseEvent code and reason can distinguish an invalid key/model,
    // an invalid setup payload or a transient Google-side disconnect.
    warn("upstream_closed",{
      closeCode:Number.isInteger(event.code)?event.code:0,
      detail:safeDetail(event.reason),
      socketError:upstreamFault,
      clean:!!event.wasClean
    });
    finish("Gemini closed");
  });
  bridge.addEventListener("message",e=>{
    if(!ready||!open(upstream)||typeof e.data!=="string"||e.data.length>44000)return;
    const now=Date.now();if(now-windowStart>1000){count=0;windowStart=now}
    if(++count>100){finish("Rate limit");return}
    let p;try{p=JSON.parse(e.data)}catch(_){return}
    if(mode==="phone"&&p&&p.type==="phone_start"){
      if(ready&&!greetingSent){
        greetingSent=true;
        try{upstream.send(JSON.stringify({clientContent:{turns:[{role:"user",parts:[{text:"The caller has just connected. Greet them briefly in Persian and ask how you can help."}]}],turnComplete:true}}))}
        catch(_){warn("phone_greeting_failed");finish("Greeting failed")}
      }
      return;
    }
    if(!p||p.type!=="audio"||typeof p.data!=="string"||p.data.length>43000||
       !/^[A-Za-z0-9+/]+={0,2}$/.test(p.data))return;
    try{
      upstream.send(JSON.stringify({realtimeInput:{audio:{data:p.data,mimeType:"audio/pcm;rate=16000"}}}));
      audioForwarded++;
      if(audioForwarded%50===0&&open(bridge))bridge.send(JSON.stringify({bridgeStatus:"audio_forwarded",audioFrames:audioForwarded}));
    }catch(_){warn("audio_send_failed");finish("Audio failed")}
  });
  bridge.addEventListener("error",()=>finish("Client error"));
  bridge.addEventListener("close",()=>finish("Client disconnected"));
  return new Response(null,{status:101,webSocket:client,headers:{"Sec-WebSocket-Protocol":"magic-phone.v1"}});
 }
};