#!/usr/bin/env python3
"""Apply an *isolated* ElevenLabs direct-SIP mode to sparkcyf/android-voice-sip-agent.

Requires a clean checkout at upstream commit 5105a1f447ffa25ba32d0620dbeef44bbc1705ce.
Does NOT modify the checkout: writes a separate copy at --output.
This is experimental source, NOT a built or device-tested APK.
GPL-2.0-only, derivative modifications to upstream GPL-2.0 source.
"""
import argparse
import pathlib
import shutil
import subprocess
import sys

UPSTREAM_SHA = '5105a1f447ffa25ba32d0620dbeef44bbc1705ce'
KROOT = 'io/github/sparkcyf/voicesipagent/'
ROOT_APP = f'app/src/main/kotlin/{KROOT}app/'
ROOT_PJ = f'sip-pjsua2/src/main/kotlin/{KROOT}pjsua2/'


def patch(src: str, old: str, new: str, file: str) -> str:
    count = src.count(old)
    if count != 1:
        raise RuntimeError(f'{file}: expected exactly 1 upstream anchor, found {count}: {old[:90]!r}')
    return src.replace(old, new, 1)


def transform(path: str, content: str) -> str:
    p = lambda a, b: patch(content_holder[0], a, b, path)
    content_holder = [content]
    def replace(old: str, new: str):
        content_holder[0] = p(old, new)

    if path == ROOT_APP + 'SettingsStore.kt':
        replace('val takeover: Boolean = true,', 'val takeover: Boolean = false,')
        replace('val holdSipWhenNotReady: Boolean = true,',
                'val holdSipWhenNotReady: Boolean = true,\n'
                '    /** Outbound INVITE directly to ElevenLabs: no SIP REGISTER or PBX. */\n'
                '    val directSipMode: Boolean = false,')
        replace('val sipConfigured: Boolean get() = server.isNotBlank() && username.isNotBlank() && password.isNotEmpty()',
                'val sipConfigured: Boolean get() = server.isNotBlank() && username.isNotBlank() && '
                '(directSipMode || password.isNotEmpty())')
        replace('holdSip=$holdSipWhenNotReady user=$username',
                'holdSip=$holdSipWhenNotReady direct=$directSipMode user=$username')
        replace('takeover = prefs.getBoolean("takeover", true),',
                'takeover = prefs.getBoolean("takeover", false),')
        replace('holdSipWhenNotReady = prefs.getBoolean("hold_sip_when_not_ready", true),',
                'holdSipWhenNotReady = prefs.getBoolean("hold_sip_when_not_ready", true),\n'
                '        directSipMode = prefs.getBoolean("direct_sip_mode", false),')
        replace('.putBoolean("hold_sip_when_not_ready", s.holdSipWhenNotReady)',
                '.putBoolean("hold_sip_when_not_ready", s.holdSipWhenNotReady)\n'
                '            .putBoolean("direct_sip_mode", s.directSipMode)')

    elif path == ROOT_APP + 'ConfigFile.kt':
        replace('choice("transport", { it.sipTransport }, { copy(sipTransport = it) }, ids(*SipTransport.entries.map { it.id }.toTypedArray())),',
                'choice("transport", { it.sipTransport }, { copy(sipTransport = it) }, ids(*SipTransport.entries.map { it.id }.toTypedArray())),\n'
                '            bool("directMode", { it.directSipMode }, { copy(directSipMode = it) }),')

    elif path == ROOT_APP + 'SipSettingsDraft.kt':
        replace('var stack by mutableStateOf(SipStack.PJSUA2)',
                'var directMode by mutableStateOf(false)\n    var stack by mutableStateOf(SipStack.PJSUA2)')
        replace('if (previous == null || stack == previous.sipStack) stack = current.sipStack',
                'if (previous == null || directMode == previous.directSipMode) directMode = current.directSipMode\n'
                '        if (previous == null || stack == previous.sipStack) stack = current.sipStack')
        replace('domain = domain, sipStack = stack, sipTransport = transport.id, srtp = srtp.id,',
                'domain = domain, directSipMode = directMode, sipStack = stack, sipTransport = transport.id, srtp = srtp.id,')
        replace('inboundTarget = snapshot.inboundTarget, allowedPrefixes = snapshot.allowedPrefixes, domain = snapshot.domain,',
                'inboundTarget = snapshot.inboundTarget, allowedPrefixes = snapshot.allowedPrefixes, domain = snapshot.domain,\n'
                '            directSipMode = snapshot.directSipMode,')
        replace('sipStack == other.sipStack && sipTransport == other.sipTransport && srtp == other.srtp &&',
                'directSipMode == other.directSipMode && sipStack == other.sipStack && sipTransport == other.sipTransport && srtp == other.srtp &&')

    elif path == ROOT_APP + 'MainActivity.kt':
        replace('Section("Settings") {\n        Choice("SIP stack"',
                'Section("Settings") {\n'
                '        Toggle("Direct ElevenLabs SIP (no PBX)", directMode, { enabled ->\n'
                '            directMode = enabled\n'
                '            if (enabled) {\n'
                '                server = "sip.rtc.elevenlabs.io"\n'
                '                domain = "sip.rtc.elevenlabs.io"\n'
                '                port = "5061"\n'
                '                transport = SipTransport.TLS\n'
                '                stack = SipStack.PJSUA2\n'
                '                srtp = SrtpPolicy.OPTIONAL\n'
                '                tlsVerify = true\n'
                '                if (user.isBlank()) user = "mobile-bridge"\n'
                '            }\n'
                '        }) { "No REGISTER. Cellular calls initiate SIP INVITE to the ElevenLabs identifier below. Enable takeover only after testing." }\n'
                '        Choice("SIP stack"')
        replace('Field("PBX host", server) { server = it }',
                'Field(if (directMode) "ElevenLabs SIP host" else "PBX host", server) { server = it }')
        replace('Field("Cellular inbound -> SIP target (blank = username)", target) { target = it }',
                'Field(if (directMode) "ElevenLabs imported SIP identifier (required)" else "Cellular inbound -> SIP target (blank = username)", target) { target = it }')
        # Do not modify incoming-SIM takeover controls. Existing Shizuku/telephony behavior is preserved.

    elif path == ROOT_APP + 'GatewayRuntime.kt':
        replace('if (s.sipStack == SipStack.BUILTIN) AppLog.w("the built-in SIP stack is deprecated; switch to pjsua2")',
                'if (s.directSipMode && (s.sipStack != SipStack.PJSUA2 || transport != SipTransport.TLS || !s.tlsVerify ||\n'
                '                s.server != "sip.rtc.elevenlabs.io" || s.port != 5061 ||\n'
                '                (s.domain.isNotBlank() && s.domain != "sip.rtc.elevenlabs.io") || s.inboundTarget.isBlank())) {\n'
                '            _health.update { it.copy(sip = EndpointStatus(false, "Direct ElevenLabs requires PJSUA2, TLS:5061, certificate verification and an imported SIP identifier")) }\n'
                '            return\n'
                '        }\n'
                '        if (s.sipStack == SipStack.BUILTIN) AppLog.w("the built-in SIP stack is deprecated; switch to pjsua2")')
        replace('displayName = "gateway",\n                        localPort = s.localSipPort,\n                    ),\n                    pjLog,',
                'displayName = "gateway",\n                        localPort = s.localSipPort,\n'
                '                        directMode = s.directSipMode,\n'
                '                        acceptInboundCalls = !s.directSipMode,\n'
                '                    ),\n                    pjLog,')
        replace('routeBtoA = { leg -> leg.target?.takeIf { it != s.username } },',
                'routeBtoA = { leg -> if (s.directSipMode) null else leg.target?.takeIf { it != s.username } },')

    elif path == ROOT_PJ + 'PjsipConfig.kt':
        replace('val registerExpiresSec: Int = 300,',
                '/** Create local SIP account but never REGISTER; outbound calls use configured proxy. */\n'
                '    val directMode: Boolean = false,\n'
                '    /** Direct mode must not allow remote SIP callers to dial the phone SIM. */\n'
                '    val acceptInboundCalls: Boolean = true,\n'
                '    val registerExpiresSec: Int = 300,')
        replace('(if (transport == SipTransport.TLS) " tls[$tls]" else "") + " local=$localPort)"',
                '(if (transport == SipTransport.TLS) " tls[$tls]" else "") + " direct=$directMode local=$localPort)"')

    elif path == ROOT_PJ + 'PjsipEndpoint.kt':
        replace('setStatus(EndpointStatus(false, "registering"))',
                'setStatus(EndpointStatus(false, if (config.directMode) "starting direct SIP" else "registering"))')
        replace('createAccount()\n                        rtpCheck =',
                'createAccount()\n                        if (config.directMode) setStatus(EndpointStatus(true, "direct SIP ready (not registered)"))\n                        rtpCheck =')
        replace('runCatching {\n                        acc.setRegistration(false)',
                'if (!config.directMode) runCatching {\n                        acc.setRegistration(false)')
        replace('registrarUri = "sip:$hostPort$transportParam"',
                'registrarUri = if (config.directMode) "" else "sip:$hostPort$transportParam"\n'
                '            registerOnAdd = !config.directMode')
        replace('authCreds.add(AuthCredInfo("digest", "*", config.authUsername, 0, config.password))',
                'if (config.password.isNotEmpty()) authCreds.add(AuthCredInfo("digest", "*", config.authUsername, 0, config.password))')
        replace('if (workerFailed.get()) return\n        if (stopped) {',
                'if (workerFailed.get() || config.directMode) return\n        if (stopped) {')
        replace('val refuse = when {\n            config.acceptOnlyFromServer',
                'val refuse = when {\n            !config.acceptInboundCalls -> 403\n            config.acceptOnlyFromServer')

    elif path == ROOT_PJ + 'PjsipCall.kt':
        replace('import java.util.concurrent.ScheduledFuture',
                'import java.util.concurrent.ScheduledFuture\nimport java.util.UUID')
        replace('prm.txOption.headers.add(SipHeader().apply { hName = "P-Asserted-Identity"; hValue = "<${owner.uriFor(n)}>" })',
                'prm.txOption.headers.add(SipHeader().apply { hName = "P-Asserted-Identity"; hValue = "<${owner.uriFor(n)}>" })\n'
                '            if (owner.config.directMode && n.matches(Regex("^[+]?[0-9]{1,16}$"))) {\n                prm.txOption.headers.add(SipHeader().apply { hName = "X-CALLER-ID"; hValue = n })\n            }')
        replace('line?.let { slot ->',
                'if (owner.config.directMode) prm.txOption.headers.add(SipHeader().apply {\n'
                '            hName = "X-CALL-ID"; hValue = UUID.randomUUID().toString()\n'
                '        })\n'
                '        line?.let { slot ->')

    elif path == 'app/build.gradle.kts':
        replace('applicationId = "io.github.sparkcyf.voicesipagent"',
                'applicationId = "io.magics.simagent.elevenlabs"')
        replace('versionName = "0.4.2"', 'versionName = "0.4.2-elevenlabs-direct-alpha1"')
        replace('versionCode = 7', 'versionCode = 1')

    elif path == 'app/src/main/res/values/strings.xml':
        replace('<string name="app_name">Voice SIP Agent</string>',
                '<string name="app_name">SIM AI Agent (ElevenLabs)</string>')

    elif path == 'app/src/main/AndroidManifest.xml':
        replace('Keeps a SIP registration alive to bridge cellular calls to a PBX',
                'Bridges an authorized SIM call to the user configured SIP AI agent')

    else:
        raise ValueError('not a supported patch file: ' + path)
    return content_holder[0]


FILES = [
    ROOT_APP + name for name in ('SettingsStore.kt', 'ConfigFile.kt', 'SipSettingsDraft.kt', 'MainActivity.kt', 'GatewayRuntime.kt')
] + [ROOT_PJ + name for name in ('PjsipConfig.kt', 'PjsipEndpoint.kt', 'PjsipCall.kt')] + [
    'app/build.gradle.kts', 'app/src/main/res/values/strings.xml', 'app/src/main/AndroidManifest.xml',
]


def verify_checkout(path: pathlib.Path):
    assert (path / 'settings.gradle.kts').exists(), 'not an upstream Android project checkout'
    assert all((path / p).is_file() for p in FILES), 'expected upstream files missing'
    if (path / '.git').exists():
        rev = subprocess.run(['git', '-C', str(path), 'rev-parse', 'HEAD'], capture_output=True, text=True)
        if rev.returncode == 0 and rev.stdout.strip() != UPSTREAM_SHA:
            raise RuntimeError('upstream revision mismatch: expected ' + UPSTREAM_SHA + ', got ' + rev.stdout.strip())
        status = subprocess.run(['git', '-C', str(path), 'status', '--porcelain'], capture_output=True, text=True)
        if status.returncode == 0 and status.stdout.strip():
            raise RuntimeError('upstream checkout has uncommitted changes; use a clean checkout')


def main():
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument('upstream', type=pathlib.Path, help='clean upstream checkout at the pinned commit')
    parser.add_argument('--output', type=pathlib.Path, required=True, help='NEW directory for isolated modified source')
    args = parser.parse_args()
    inp, out = args.upstream.resolve(), args.output.resolve()
    if out.exists():
        parser.error(f'output path already exists: {out}')
    verify_checkout(inp)
    # Validate every source anchor before copying any files or writing output.
    updates = {p: transform(p, (inp / p).read_text(encoding='utf-8')) for p in FILES}
    shutil.copytree(inp, out, ignore=shutil.ignore_patterns('.git', '.gradle', 'build', '.idea'))
    for p, s in updates.items():
        (out / p).write_text(s, encoding='utf-8')
    (out / 'ELEVENLABS_DIRECT_README_FA.md').write_text(
        (pathlib.Path(__file__).parent / 'README_FA.md').read_text(encoding='utf-8'), encoding='utf-8')
    print(f'Applied {len(FILES)} targeted source changes into {out}.')
    print('NOT compiled. NOT verified on Android. Original checkout remains untouched.')


if __name__ == '__main__':
    try:
        main()
    except Exception as exc:
        print('PATCH FAILED: ' + str(exc), file=sys.stderr)
        sys.exit(1)