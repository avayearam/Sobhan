# SIM AI Agent → ElevenLabs (آزمایشی، مستقل از Magic Phone)

**وضعیت:** بسته تغییر سورس برای نمونه اولیه. **APK ساخته نشده و اتصال واقعی یا صدای دوطرفه تست نشده است.**

## هدف

تماس ورودی روی سیم‌کارت اندروید → دسترسی تماس مبتنی بر Shizuku در Voice SIP Agent → موتور PJSIP روی خود گوشی → SIP INVITE به ElevenLabs → پاسخ ایجنت به تماس‌گیرنده. مسیر نیازمند کامپیوتر هنگام استفاده نیست؛ برای اولین ساخت برنامه و نصب، محیط ساخت اندروید لازم است.

پایه سورس: https://github.com/sparkcyf/android-voice-sip-agent، **commit دقیق** `5105a1f447ffa25ba32d0620dbeef44bbc1705ce` از ۸ نوامبر ۲۰۲۶. این بسته آخرین `main` همان زمان بررسی را هدف قرار می‌دهد و به هیچ ریپوی Magic Phone وابسته نیست.

## تغییرات محدود و مستقل

- برنامه با شناسه نصب مستقل `io.magics.simagent.elevenlabs`؛ جایگزین Voice SIP Agent فعلی یا Magic Phone نمی‌شود.
- `takeover` در اولین نصب **خاموش** است؛ تماس‌های واقعی بدون فعال‌سازی صریح کاربر گرفته نمی‌شوند.
- تنظیم `sip.directMode` در JSON و UI افزوده شده است؛ در این حالت *هیچ SIP REGISTER به PBX ارسال نمی‌شود*، اما یک حساب SIP محلی PJSUA2 برای ارسال INVITE ساخته می‌شود.
- مسیر خروجی فقط با TLS، تأیید گواهی، `sip.rtc.elevenlabs.io:5061` و شناسه SIP غیرخالی مجاز است.
- تماس SIP به سیم‌کارت از سمت شبکه در حالت Direct مسدود شده است تا امکان سوءاستفاده از خط شخصی برای تماس خروجی ایجاد نشود.
- هدرهای `X-CALL-ID` و `X-CALLER-ID` برای تعامل با ElevenLabs روی تماس‌های Direct ارسال می‌شوند.
- تنظیمات قدیمی PBX/SIP در حالت `directMode=false` مطابق قبل باقی می‌مانند.

## الزامات ElevenLabs (خرید شماره تازه لازم نیست)

در حساب ElevenLabs مسیر **Agents → Phone Numbers → Import number → From SIP Trunk** را باز کن. بر اساس مستندات رسمی باید یک **شناسه مقصد SIP** برای مسیریابی به ایجنت موجود ثبت و به همان Agent اختصاص داده شود. رابط مدیریت ممکن است برای مقدار Number فرمت E.164 بخواهد؛ می‌توان از همان شماره سیم‌کارت خودت به‌عنوان *شناسه مسیریابی* استفاده کرد، بدون آنکه شرکت مخابراتی شماره را پورت یا به ElevenLabs منتقل کرده باشد. امکان واردکردن شناسه دلخواه به رفتار حساب/رابط فعلی ElevenLabs وابسته است و هنوز روی حساب تو بررسی نشده است.

آدرس مقصد ElevenLabs با TLS: `sip.rtc.elevenlabs.io:5061`. شناسه انتخاب‌شده باید دقیقاً با بخش سمت چپ `@` در SIP URI تماس مطابقت داشته باشد. تنظیمات **Inbound** در ElevenLabs باید با SRTP `Allowed` (برای `optional`) و Authentication مطابق نیاز تو هماهنگ شوند. بهتر است برای جلوگیری از تماس‌های ناشناس به مقصد SIP، اعتبارسنجی Digest فعال شود؛ در آن حالت SIP username و password را در برنامه وارد کن (Password فقط داخل دستگاه با Keystore رمزگذاری می‌شود؛ **فایل export JSON آن را به‌صورت متن ساده نگه می‌دارد**).

## روش ساخت مستقل

نیاز به Android SDK پشتیبانی‌کننده از API 37، JDK 17 و Gradle wrapper در سورس upstream داری.

```bash
git clone https://github.com/sparkcyf/android-voice-sip-agent.git
cd android-voice-sip-agent
git checkout 5105a1f447ffa25ba32d0620dbeef44bbc1705ce
cd ..
python3 elevenlabs_sim_direct_patch/apply_patch.py \
  android-voice-sip-agent --output sim-ai-agent-elevenlabs
cd sim-ai-agent-elevenlabs
./gradlew :app:assembleDebug
```

پس از build موفق، APK آزمایشی با امضای debug در `app/build/outputs/apk/debug/` تولید می‌شود. **این خروجی تا زمان تست روی دستگاه قابل اتکا برای پاسخ‌گویی به تماس نیست.** اگر بسته به دلیل نسخه SDK یا NDK کامپایل نشد، قبل از نصب رفع و دوباره تست شود.

## روش راه‌اندازی پس از داشتن APK

1. روی گوشی سامسونگ Shizuku را فعال و به اپ مستقل دسترسی بده؛ در Health وضعیت دسترسی تماس/صدا را بررسی کن.
2. در ElevenLabs، شناسه واردشده روی SIP Trunk را به ایجنت موجود Assign کن.
3. یک کپی از `config.example.json` بساز و مقدار `routing.target` را دقیقاً همان شناسه انتخاب‌شده بگذار؛ در صورت استفاده از Digest، `sip.password` را به‌صورت دستی و خصوصی وارد کن. **هرگز این فایل دارای رمز را عمومی نکن.**
4. فایل JSON را در تنظیمات اپ، از `Configuration file → Import from file` وارد کن. این فایل به‌تنهایی برای اپ قدیمی Voice SIP Agent معتبر نیست؛ **نیازمند نسخه اصلاح‌شده این بسته است**.
5. ابتدا `Take over calls` را خاموش نگه دار، وضعیت SIP و Shizuku را بررسی کن، سپس در یک بازه کنترل‌شده takeover را روشن کن و با یک خط دوم تماس بگیر. گزینه `Call access` ممکن است روی دستگاه تو نیازمند `default dialer` باشد؛ در این حالت می‌توان پیش‌فرض را پس از تست به اپ تماس قبلی بازگرداند.
6. تست‌های ضروری: برقراری تماس، شنیدن صدای ایجنت از سمت تماس‌گیرنده، شنیدن صدای تماس‌گیرنده توسط ایجنت، قطع دوطرفه تماس، رد تماس دوم، اختلال اینترنت، برگشت از sleep و پاسخ صحیح به تماس عادی وقتی takeover خاموش است.

## محدودیت‌ها و امنیت

این روش برای **حداکثر یک تماس هم‌زمان** ساخته شده است. اندروید دسترسی رسمی عمومی به صدای دوطرفه تماس سیم‌کارت نمی‌دهد؛ وابسته به Shizuku و APIهای مخفی است و پایداری روی Galaxy S23 Ultra / Android 16 باید واقعاً آزمایش شود. هنگام آزمایش تماس‌های اضطراری/حساس، takeover را روشن نگذار. هر بار پس از ریبوت ممکن است Shizuku نیاز به فعال‌سازی مجدد داشته باشد. استفاده روی خط شخصی ممکن است مشمول مقررات رضایت و اطلاع‌رسانی ضبط/پردازش صوت باشد.

**وابستگی پنهانی به Magic Phone یا PBX/سرور جدید وجود ندارد**؛ با این حال اتصال خروجی SIP به اینترنت، تنظیمات قابل استفاده در ElevenLabs و تأیید دوطرفه صدا برای کارکرد ضروری‌اند. API key ایجنت در اپ لازم نیست؛ مسیریابی SIP به ایجنت از طریق وارد کردن شناسه و اختصاص Agent در حساب انجام می‌شود.

## وضعیت آزمون فعلی

- Patch generator: بررسی syntax پایتون و آزمون ساختار تغییرات بدون SDK انجام می‌شود.
- Android build: **انجام نشده** (Android SDK و وابستگی‌های Native در محیط فعلی در دسترس نیست).
- ElevenLabs Agent lookup: **ناموفق** (کانکتور خطای داخلی داده است).
- تماس واقعی و Production: **تأیید نشده**.

## منابع و مجوز

- Upstream: https://github.com/sparkcyf/android-voice-sip-agent (GPL-2.0؛ همه شرایط و اسناد LICENSE پروژه upstream برای نسخه مشتق رعایت شوند).
- ElevenLabs SIP: https://elevenlabs.io/docs/eleven-agents/phone-numbers/sip-trunking
- This code is an experimental GPL-2.0 derivative patch; it does not imply endorsement by the upstream maintainer or ElevenLabs.