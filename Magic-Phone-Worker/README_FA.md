# Magic Phone — Cloudflare Worker (Gemini Live)

این فایل، نسخهٔ هماهنگ با APK آزمایشی Magic Phone v0.5.0 است و از **همان Gemini Live فعلی** استفاده می‌کند. هیچ ارتباطی با ElevenLabs ندارد.

- **Cloudflare Worker name:** `phone`
- **Custom domain:** `phone.magics.site`
- **WebSocket for browser:** `wss://phone.magics.site/ws`
- **WebSocket for Android:** `wss://phone.magics.site/ws?mode=phone`
- **Health:** `https://phone.magics.site/health`
- **Source of truth:** `avayearam/ai-magics-site` — main `f9ffa5830490d9ecfd35d137af2868ac3ba1b1ab`
- **Source blob SHA:** `6b409e17a4623ce98dd62d14b1a66f95aeeb51d5`
- **Worker BUILD identifier:** `magic-phone-1.2.2-binary-audio-fix` (شناسه ساخت فعلی؛ کد حالت تلفنی را هم شامل می‌شود).

## نصب

1. Cloudflare Dashboard → Workers & Pages → Worker `phone` → Edit code.
2. محتوای کامل `Magic-Phone-Live-Worker.js` را جایگزین کد فعلی کن، Save و Deploy بزن.
3. مقادیر موجود در بخش Variables and Secrets را **حذف نکن و تغییر نده**:
    - `GEMINI_API_KEY` — Secret
    - `BRIDGE_ACCESS_TOKEN` — Secret (حداقل ۲۴ کاراکتر)
    - `ALLOWED_ORIGIN=https://ai.magics.site` — Variable
    - `GEMINI_MODEL=gemini-3.8-live` — Variable اگر همین مدل فعلاً در مرورگر با موفقیت کار می‌کند.
4. با `https://phone.magics.site/health` شناسه نسخه را بررسی کن؛ سپس صفحه `https://ai.magics.site/call/` را نیز تست کن.
5. در Magic Phone اندروید، رمز `BRIDGE_ACCESS_TOKEN` را فقط در خود گوشی ذخیره کن و برای یک تماس هماهنگ‌شده، حالت Gemini Live را روشن کن.

## نکات

- این Worker سرور SIP/PBX نیست؛ تماس سلولی توسط اپ اندروید و Shizuku به آن متصل می‌شود.
- برای حالت تلفنی، اپ پس از تأیید setup، پیام `phone_start` ارسال می‌کند؛ Worker با یک دستور سلام کوتاه فارسی جلسه صوتی را شروع می‌کند.
- نرخ صوت ورودی 16kHz PCM16 و صوت پاسخ 24kHz PCM16 است. تبدیل نرخ روی گوشی انجام می‌شود.
- از انتشار کلید API یا رمز Worker در GitHub، اسکرین‌شات‌ها یا پیام‌های چت خودداری کن.
- وضعیت: **کد هماهنگ‌شده با APK و تست قرارداد**. مکالمه واقعی تماس ایرانسل با Gemini Live هنوز باید روی گوشی تأیید شود؛ استقرار Cloudflare نیازمند Deploy دستی است.
