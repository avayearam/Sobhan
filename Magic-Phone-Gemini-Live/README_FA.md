# Magic Phone — Gemini Live Android APK

این پوشه فقط برای ساخت APK نسخه Android پروژه Magic Phone است و مستقل از آزمایش‌های SIM AI Agent / ElevenLabs نگهداری می‌شود.

## منبع دقیق ساخت

- Magic Phone integration: `avayearam/magics-phone`
- Source commit: `91ebcd9c4310b50ce3ed5ae9e05c8e179db19a29`
- Android call/audio engine: `sparkcyf/android-voice-sip-agent`
- Pinned upstream commit: `5105a1f447ffa25ba32d0620dbeef44bbc1705ce`
- Android package: `site.magics.phone.agent`
- Version: `0.5.0 (8)`
- ABI: `arm64-v8a`
- Worker: `wss://phone.magics.site/ws?mode=phone`

## خروجی

GitHub Actions پس از اجرای موفق تست‌ها، APK امضاشده با Debug certificate را به‌همراه فایل SHA-256 در Artifact با نام زیر قرار می‌دهد:

`Magic-Phone-Gemini-Live-0.5.0-debug`

این APK برای نصب و تست روی گوشی است؛ نسخه انتشار نهایی محسوب نمی‌شود. کلید `GEMINI_API_KEY` در Worker ابری باقی می‌ماند و داخل APK قرار نمی‌گیرد. تنها `BRIDGE_ACCESS_TOKEN` موجود در تنظیمات Worker باید در خود برنامه وارد شود و در Android Keystore نگهداری خواهد شد.

## اجرای مجدد

در تب Actions مخزن، Workflow با نام **Build Magic Phone Gemini Live APK** را انتخاب و Run workflow را بزن. Workflow فقط سورس pin‌شده بالا را دریافت می‌کند؛ به پوشه آزمایش ElevenLabs دست نمی‌زند.
