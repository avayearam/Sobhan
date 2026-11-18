#!/usr/bin/env python3
"""Brand and localize the tested ElevenLabs direct-SIP Android bridge.
Run after apply_patch.py on upstream SHA 5105a1f. Keep media/SIP engine unchanged.
"""
from pathlib import Path
import sys

root=Path(sys.argv[1]).resolve()
app=root/'app/src/main/kotlin/io/github/sparkcyf/voicesipagent/app'
main=app/'MainActivity.kt'
settings=app/'SettingsStore.kt'

# The direct telephony backend was confirmed to work for the target Samsung device.
s=settings.read_text()
for a,b in [
    ('val muteEarpiece: Boolean = true,','val muteEarpiece: Boolean = false,'),
    ('muteEarpiece = prefs.getBoolean("mute_earpiece", true),','muteEarpiece = prefs.getBoolean("mute_earpiece", false),'),
    ('val audioMethod: Int = AudioMethod.AUTO,','val audioMethod: Int = AudioMethod.LEGACY,'),
    ('audioMethod = prefs.getInt("audio_method", AudioMethod.AUTO).takeIf { it in 0..2 } ?: AudioMethod.AUTO,',
     'audioMethod = prefs.getInt("audio_method", AudioMethod.LEGACY).takeIf { it in 0..2 } ?: AudioMethod.LEGACY,'),
]:
    assert s.count(a)==1,(settings,a)
    s=s.replace(a,b,1)
settings.write_text(s)

# Standalone package: previous successfully configured test app is not overwritten.
gradle=root/'app/build.gradle.kts'
s=gradle.read_text()
for a,b in [
    ('applicationId = "io.magics.simagent.elevenlabs"','applicationId = "io.magics.magicagent"'),
    ('versionName = "0.4.2-elevenlabs-direct-alpha1"','versionName = "0.5.0-fa1"'),
    ('versionCode = 1','versionCode = 2'),
]:
    assert s.count(a)==1,(gradle,a)
    s=s.replace(a,b,1)
gradle.write_text(s)

res=root/'app/src/main/res'
strings=res/'values/strings.xml'
s=strings.read_text();assert '<string name="app_name">SIM AI Agent (ElevenLabs)</string>' in s
strings.write_text(s.replace('<string name="app_name">SIM AI Agent (ElevenLabs)</string>','<string name="app_name">مجیک ایجنت</string>'))

# New brand icon; Android resource vector, no extra runtime libraries.
icon=res/'drawable/ic_magic_agent.xml'
icon.write_text('''<?xml version="1.0" encoding="utf-8"?>
<vector xmlns:android="http://schemas.android.com/apk/res/android"
    android:width="96dp" android:height="96dp"
    android:viewportWidth="96" android:viewportHeight="96">
    <path android:fillColor="#17171B" android:pathData="M48,2 A46,46 0,1 1,48 94 A46,46 0,1 1,48 2 Z"/>
    <path android:fillColor="#8A5CF6" android:pathData="M48,8 A40,40 0,1 1,48 88 A40,40 0,1 1,48 8 Z"/>
    <path android:fillColor="#FFFFFF" android:pathData="M28,27 C28,25 30,24 32,25 L40,30 C42,31 42,34 41,36 L37,41 C40,48 47,55 55,59 L60,55 C62,53 64,53 66,55 L72,63 C74,65 73,67 70,70 C65,75 57,72 48,67 C38,61 30,53 25,43 C21,35 23,31 28,27 Z"/>
    <path android:strokeColor="#CCFBF1" android:strokeWidth="3" android:fillColor="#00000000"
        android:strokeLineCap="round" android:pathData="M51,29 Q65,29 65,43 M52,21 Q73,21 74,43"/>
</vector>
''')
manifest=root/'app/src/main/AndroidManifest.xml'
s=manifest.read_text()
assert 'android:icon="@drawable/ic_gateway"' in s
manifest.write_text(s.replace('android:icon="@drawable/ic_gateway"','android:icon="@drawable/ic_magic_agent"'))

# Dynamic typography + explicit neutral charcoal (no navy) and premium soft-violet / cyan accents.
# The Font is downloaded from the official Google Fonts repository by the build workflow.
theme=app/'MagicTheme.kt'
theme.write_text('''package io.github.sparkcyf.voicesipagent.app

import androidx.compose.foundation.isSystemInDarkTheme
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.Typography
import androidx.compose.material3.Shapes
import androidx.compose.material3.darkColorScheme
import androidx.compose.material3.lightColorScheme
import androidx.compose.runtime.Composable
import androidx.compose.runtime.CompositionLocalProvider
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.platform.LocalLayoutDirection
import androidx.compose.ui.text.font.Font
import androidx.compose.ui.text.font.FontFamily
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.unit.LayoutDirection
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.ui.unit.dp

private val Vazirmatn = FontFamily(
    Font(R.font.vazirmatn, weight = FontWeight.Normal),
    Font(R.font.vazirmatn, weight = FontWeight.Bold),
)
private val base = Typography()
private val magicTypography = Typography(
    displayLarge = base.displayLarge.copy(fontFamily = Vazirmatn),
    displayMedium = base.displayMedium.copy(fontFamily = Vazirmatn),
    displaySmall = base.displaySmall.copy(fontFamily = Vazirmatn),
    headlineLarge = base.headlineLarge.copy(fontFamily = Vazirmatn),
    headlineMedium = base.headlineMedium.copy(fontFamily = Vazirmatn),
    headlineSmall = base.headlineSmall.copy(fontFamily = Vazirmatn),
    titleLarge = base.titleLarge.copy(fontFamily = Vazirmatn),
    titleMedium = base.titleMedium.copy(fontFamily = Vazirmatn),
    titleSmall = base.titleSmall.copy(fontFamily = Vazirmatn),
    bodyLarge = base.bodyLarge.copy(fontFamily = Vazirmatn),
    bodyMedium = base.bodyMedium.copy(fontFamily = Vazirmatn),
    bodySmall = base.bodySmall.copy(fontFamily = Vazirmatn),
    labelLarge = base.labelLarge.copy(fontFamily = Vazirmatn),
    labelMedium = base.labelMedium.copy(fontFamily = Vazirmatn),
    labelSmall = base.labelSmall.copy(fontFamily = Vazirmatn),
)
private val neutralLight = lightColorScheme(
    primary = Color(0xFF6941C6), secondary = Color(0xFF009BB2),
    background = Color(0xFFF7F6FB), surface = Color(0xFFFBFAFF),
    surfaceVariant = Color(0xFFF0EAFB), onSurface = Color(0xFF202026),
    onSurfaceVariant = Color(0xFF47444F), onPrimary = Color.White,
)
private val neutralDark = darkColorScheme(
    primary = Color(0xFFB9A0FF), secondary = Color(0xFF6BDBE4),
    background = Color(0xFF111113), surface = Color(0xFF19191C),
    surfaceVariant = Color(0xFF28262E), onSurface = Color(0xFFF3F1F7),
    onSurfaceVariant = Color(0xFFE0D9EA), onPrimary = Color(0xFF211236),
)
private val shapes = Shapes(
    small = RoundedCornerShape(12.dp),
    medium = RoundedCornerShape(18.dp),
    large = RoundedCornerShape(24.dp),
)

@Composable
internal fun MagicAgentTheme(content: @Composable () -> Unit) {
    CompositionLocalProvider(LocalLayoutDirection provides LayoutDirection.Rtl) {
        MaterialTheme(
            colorScheme = if (isSystemInDarkTheme()) neutralDark else neutralLight,
            typography = magicTypography,
            shapes = shapes,
            content = content,
        )
    }
}
''')

ui=main.read_text()
ui=ui.replace('import androidx.compose.material3.darkColorScheme\n','').replace('import androidx.compose.material3.lightColorScheme\n','').replace('import androidx.compose.foundation.isSystemInDarkTheme\n','')
assert ui.count('MaterialTheme(colorScheme = if (isSystemInDarkTheme()) darkColorScheme() else lightColorScheme())')==1
ui=ui.replace('MaterialTheme(colorScheme = if (isSystemInDarkTheme()) darkColorScheme() else lightColorScheme())','MagicAgentTheme()')
ui=ui.replace('Text("Voice SIP Agent", style = MaterialTheme.typography.headlineSmall)',
    'Text("مجیک ایجنت", style = MaterialTheme.typography.headlineSmall, color = MaterialTheme.colorScheme.primary)\n'
    '        Text("دستیار هوشمند پاسخ‌گویی به تماس‌ها", style = MaterialTheme.typography.bodyMedium)')
# All visible labels, section headings, action buttons, warnings and explanatory copy.
translations={
'Takeover':'مدیریت تماس‌ها',
'Take over calls':'پاسخ‌گویی خودکار تماس‌ها',
'Turning off after the current call':'پس از پایان تماس جاری خاموش می‌شود',
'Turning on after current calls end':'پس از پایان تماس‌های جاری فعال می‌شود',
'Changing the default dialer':'در حال تغییر برنامه پیش‌فرض تماس',
'Waiting to become the default dialer':'در انتظار انتخاب برنامه پیش‌فرض تماس',
'Waiting to restore your previous dialer':'در انتظار بازگرداندن برنامه تماس قبلی',
'Ready to bridge calls to the PBX':'آماده انتقال تماس به ایجنت',
'Gateway off; this app remains the default phone app':'پاسخ‌گویی خاموش است؛ این برنامه هنوز پیش‌فرض تماس است',
'Gateway off; dialer restoration needs attention':'پاسخ‌گویی خاموش است؛ بازگرداندن برنامه تماس نیاز به بررسی دارد',
'Gateway off; calls stay with your dialer':'پاسخ‌گویی خاموش است؛ تماس‌ها به برنامه تلفن می‌رسند',
'Call access':'دسترسی به تماس‌ها',
'This app is the default dialer':'این برنامه پیش‌فرض تماس است',
'Default dialer selection required':'باید برنامه پیش‌فرض تماس انتخاب شود',
'Alongside-dialer access is unavailable on Android 11':'در اندروید ۱۱ حالت کار در کنار برنامه تلفن در دسترس نیست',
'Alongside your current dialer':'در کنار برنامه تلفن فعلی',
'Enable takeover to make this app the default phone app.':'برای انتخاب این برنامه به‌عنوان تلفن پیش‌فرض، پاسخ‌گویی را فعال کنید.',
'This app stays the default when takeover is off.':'با خاموش‌بودن پاسخ‌گویی، این برنامه پیش‌فرض باقی می‌ماند.',
'Turning takeover off tries to restore your previous phone app.':'با خاموش‌کردن پاسخ‌گویی، برنامه تلفن قبلی بازگردانده می‌شود.',
'Enable takeover':'فعال‌کردن پاسخ‌گویی',
'Default dialer selection is unavailable on this device.':'انتخاب برنامه پیش‌فرض تماس در این دستگاه در دسترس نیست.',
'Restore previous dialer':'بازگرداندن تلفن قبلی',
'Choose dialer in Settings':'انتخاب برنامه تماس در تنظیمات',
'Cancel dialer change':'لغو تغییر برنامه تماس',
'Mute call audio on this phone':'بی‌صداکردن خروجی تماس در این گوشی',
'Playback muting cannot be attempted with the current setup. The phone microphone remains muted during gateway calls. Changes apply to the next call.':'با تنظیمات فعلی امکان بی‌صداکردن خروجی نیست. میکروفون گوشی حین انتقال تماس بی‌صدا می‌ماند. تغییر از تماس بعد اعمال می‌شود.',
'Muting stopped direct telephony audio on this phone, so it is skipped when that method is used. Turn this off and on again to retest.':'بی‌صداکردن خروجی روی این گوشی مسیر صدای مستقیم را مختل کرده و غیرفعال شده است. برای آزمایش دوباره گزینه را خاموش و روشن کنید.',
'When enabled, attempts to silence the earpiece or speaker. The phone microphone remains muted during gateway calls. Changes apply to the next call.':'در حالت روشن، صدای بلندگو یا گوشی قطع می‌شود؛ میکروفون دستگاه در تماس‌های انتقالی بی‌صدا می‌ماند. از تماس بعد اعمال می‌شود.',
'Changes pending until calls end':'تغییرات پس از پایان تماس اعمال می‌شوند',
'Health':'وضعیت سامانه',
'Health checks will start after current calls end.':'بررسی سلامت پس از پایان تماس‌ها آغاز می‌شود.',
'Health checks are paused while takeover is off.':'وقتی پاسخ‌گویی خاموش است، بررسی سلامت متوقف می‌شود.',
'Stopped while takeover is off':'تا زمان فعال‌شدن پاسخ‌گویی متوقف است',
'Call audio access':'دسترسی صدای تماس',
'Doze allowlisted':'مجوز فعالیت در پس‌زمینه',
'SIP registration':'وضعیت ارتباط SIP',
'SIM slots: ':'سیم‌کارت‌ها: ',
'none':'هیچ‌کدام',
'Grant Shizuku':'اعطای دسترسی شیزوکو',
'Re-run setup':'اجرای دوباره راه‌اندازی',
'Reconnect SIP':'اتصال مجدد SIP',
'Call':'تماس جاری',
'No active session':'هیچ نشست فعالی وجود ندارد',
'status unavailable':'وضعیت نامشخص',
'Local playback (Android): ':'صدای محلی اندروید: ',
'mute state unavailable':'وضعیت بی‌صدا نامشخص است',
'muting not requested':'درخواست بی‌صداکردن صادر نشده',
'mute request applied':'بی‌صداشدن اعمال شد',
'existing mute preserved':'حالت بی‌صدای قبلی حفظ شد',
'mute request not applied':'بی‌صداشدن اعمال نشد',
'muting unsupported with this audio method':'بی‌صداکردن با این روش صوتی پشتیبانی نمی‌شود',
'mute state unknown':'وضعیت بی‌صدا نامشخص است',
'Call audio is not open.':'مسیر صدای تماس هنوز باز نشده است.',
'Local call playback restoration is unconfirmed. Sound may remain muted.':'بازگشت صدای گوشی تأیید نشده و ممکن است خروجی همچنان بی‌صدا باشد.',
'Retry restoring playback':'تلاش مجدد برای بازگرداندن صدا',
'If call sound stays muted, raise the call volume during a normal phone call.':'اگر صدا همچنان قطع است، هنگام یک تماس معمولی صدای مکالمه را افزایش دهید.',
'Echo incoming calls (test)':'تست بازگشت صدا (اکو)',
"While the gateway is on, answers incoming cellular calls and echoes the caller's audio instead of connecting the PBX. Changes apply after the current call ends.":'در این تست، برنامه تماس ورودی را جواب می‌دهد و صدای تماس‌گیرنده را به خودش برمی‌گرداند؛ اتصال به ایجنت برقرار نمی‌شود. پس از تماس جاری اعمال می‌شود.',
'Echo test enabled':'تست اکو فعال است',
'Disable echo test':'خاموش‌کردن تست اکو',
'Hide advanced settings':'بستن تنظیمات پیشرفته',
'Advanced settings':'تنظیمات پیشرفته',
'Platform integration':'یکپارچه‌سازی با اندروید',
'Automatic':'خودکار',
'Alongside dialer':'در کنار برنامه تلفن',
'Default dialer':'تلفن پیش‌فرض',
'Android 11 requires this app as the default phone app.':'در اندروید ۱۱ باید این برنامه تلفن پیش‌فرض باشد.',
'Works alongside your phone app unless this app is the default.':'در کنار برنامه تماس فعلی کار می‌کند، مگر آنکه خودش پیش‌فرض باشد.',
'Requires Android 12 or later.':'به اندروید ۱۲ یا بالاتر نیاز دارد.',
'Restore your usual phone app to use this mode.':'برای این حالت، برنامه تلفن معمولی را برگردانید.',
'Keeps your current phone app.':'برنامه تلفن فعلی حفظ می‌شود.',
'Enable takeover or tap Make default phone app to switch.':'پاسخ‌گویی را فعال یا گزینه انتخاب تلفن پیش‌فرض را بزنید.',
'Applies after current calls end.':'پس از پایان تماس‌های جاری اعمال می‌شود.',
'Keep this app as the default phone app when gateway is off':'باقی‌ماندن به‌عنوان تلفن پیش‌فرض هنگام غیرفعال‌بودن',
'When disabled, turning takeover off tries to restore your previous phone app.':'در حالت خاموش، برنامه تلفن قبلی بازگردانده می‌شود.',
'Make default phone app':'انتخاب به‌عنوان تلفن پیش‌فرض',
'Manual dialer selection leaves takeover unchanged. Selecting Default dialer above applies to the next switch-on.':'انتخاب دستی تلفن، پاسخ‌گویی را تغییر نمی‌دهد. تغییر حالت تماس از فعال‌سازی بعدی اعمال می‌شود.',
'Cellular audio':'روش انتقال صدای سیم‌کارت',
'Direct telephony':'تلفن مستقیم (پیشنهادی)',
'Cellular redirection':'انتقال صوتی اندروید',
'Prefers cellular call redirection; falls back to direct telephony during setup.':'ابتدا روش انتقال اندروید را امتحان می‌کند؛ در صورت نیاز به روش مستقیم برمی‌گردد.',
'Uses direct cellular audio capture and playback, without redirection fallback.':'روش مستقیم ضبط و ارسال صدای تماس؛ همین روش روی گوشی آزمایش شده و کار کرده است.',
'Uses cellular call redirection only. Requires Android 13+ and privileged access.':'فقط روش انتقال اندروید؛ نیازمند اندروید ۱۳ یا بالاتر و دسترسی ویژه است.',
' Changes apply to the next call.':' تغییرات از تماس بعد اعمال می‌شود.',
'Diagnostics':'عیب‌یابی فنی',
'Waiting for helper':'در انتظار سرویس کمکی',
'Audio access and frame counters do not verify remote delivery. Verify both directions on this device.':'دسترسی صدا یا شمارنده فریم به‌تنهایی انتقال واقعی صدا را ثابت نمی‌کند؛ هر دو جهت باید روی دستگاه آزمایش شوند.',
'Log':'گزارش فنی',
'Settings':'تنظیمات اتصال',
'Direct ElevenLabs SIP (no PBX)':'اتصال مستقیم به ElevenLabs (بدون PBX)',
'No REGISTER. Cellular calls initiate SIP INVITE to the ElevenLabs identifier below. Enable takeover only after testing.':'بدون ثبت‌نام SIP، تماس سیم‌کارت به شناسه ElevenLabs ارسال می‌شود. فقط پس از تست، پاسخ‌گویی را فعال کنید.',
'SIP stack':'موتور SIP',
'Transport':'پروتکل ارتباطی',
'SRTP (TLS only)':'رمزگذاری صدای SRTP (روی TLS)',
'ElevenLabs SIP host':'میزبان SIP ایلون‌لبز',
'PBX host':'میزبان مرکز تماس PBX',
'PBX port':'درگاه SIP',
'SIP domain (empty = PBX host)':'دامنه SIP (در صورت خالی‌بودن: میزبان)',
'Extension / user':'نام کاربری SIP',
'Password':'رمز عبور SIP',
'ElevenLabs imported SIP identifier (required)':'شناسه تماس ثبت‌شده در ElevenLabs (ضروری)',
'Cellular inbound -> SIP target (blank = username)':'مقصد انتقال تماس سیم‌کارت (خالی = نام کاربری)',
'Allowed dial-out prefixes (comma separated, empty = any)':'پیش‌شماره‌های مجاز برای تماس خروجی (با ویرگول)',
'Unsaved changes':'تغییرات ذخیره نشده‌اند',
'Save & apply':'ذخیره و اعمال',
'Saved changes apply after the current call ends.':'تنظیمات ذخیره‌شده پس از تماس جاری اعمال می‌شوند.',
'Saved SIP settings are used when takeover is next enabled.':'تنظیمات SIP در فعال‌سازی بعدی پاسخ‌گویی استفاده می‌شود.',
'Unregister while the phone cannot take calls':'توقف ثبت‌نام SIP هنگام آماده‌نبودن گوشی',
'At startup, waits for the phone to be ready before registering with the PBX. ':'در شروع، تا آماده‌شدن گوشی برای ثبت‌نام در مرکز تماس صبر می‌کند. ',
'Registration changes wait for calls to end; registers again as soon as the phone is ready.':'تغییرات ثبت‌نام پس از پایان تماس‌ها اعمال می‌شوند و وقتی گوشی آماده شد دوباره ثبت می‌شود.',
'pjsip debug log':'ثبت گزارش اشکال‌زدایی PJSIP',
'Info-level logs with masked numbers':'ثبت رویدادهای فنی با شماره‌های پوشانده‌شده',
'Verify TLS certificate':'بررسی اعتبار گواهی TLS',
'Checks the certificate chain, expiry and host name.':'زنجیره گواهی، تاریخ انقضا و نام میزبان بررسی می‌شوند.',
'Any certificate is accepted, including expired, self-signed and wrong-host ones.':'تمام گواهی‌ها، حتی نامعتبر و منقضی‌شده، پذیرفته می‌شوند (ناامن).',
'Insecure: anyone on the network path can impersonate the PBX, read and change SIP signalling ':'ناامن: مهاجم در مسیر شبکه می‌تواند هویت مرکز تماس را جعل و پیام‌های SIP را مشاهده یا تغییر دهد ',
'and read the SRTP keys. Use only for testing or on a trusted network.':'و کلیدهای SRTP را بخواند. فقط برای آزمایش در شبکه مطمئن استفاده کنید.',
'Trusted certificates (TLS)':'گواهی‌های مورداعتماد (TLS)',
'Android system CAs':'گواهی‌های معتبر سیستم اندروید',
'Only these, instead of the system CAs:':'فقط گواهی‌های زیر به‌جای گواهی‌های سیستم:',
'Import certificate':'واردکردن گواهی',
'Use system CAs':'استفاده از گواهی‌های سیستم',
"A private CA, or the PBX's own self-signed certificate (PEM or DER). The host name must still match ":'یک گواهی خصوصی یا خودامضای مرکز تماس با فرمت PEM/DER؛ نام میزبان نیز باید یکسان باشد ',
'unless verification is off.':'مگر اینکه بررسی گواهی خاموش شده باشد.',
'Settings exported.':'تنظیمات ذخیره و صادر شدند.',
'Import settings?':'تنظیمات وارد شوند؟',
'Takeover stays as it is. Changes wait for current calls to end.':'وضعیت پاسخ‌گویی تغییر نمی‌کند. تغییرات پس از پایان تماس جاری اعمال می‌شوند.',
'Import':'واردکردن',
'Cancel':'لغو',
'Configuration file':'پشتیبان‌گیری و انتقال تنظیمات',
'Export saves every setting except the takeover switch as JSON, including the SIP password in plain text. ':'فایل خروجی شامل تنظیمات و رمز SIP به‌صورت متن ساده است؛ آن را محرمانه نگه دارید. وضعیت پاسخ‌گویی صادر نمی‌شود. ',
'Import changes only the settings present in the file.':'هنگام واردکردن، فقط تنظیمات موجود در فایل تغییر می‌کنند.',
'Export to file':'خروجی گرفتن',
'Import from file':'واردکردن فایل',
'no active SIM':'سیم‌کارت غیرفعال',
'Take over incoming calls on SIM $slot':'پاسخ خودکار تماس‌های سیم‌کارت $slot',
'$carrier: calls ring on this phone as usual':'$carrier: تماس‌ها به‌صورت عادی در گوشی زنگ می‌خورند',
'$carrier: calls are bridged to the PBX':'$carrier: تماس‌ها به ایجنت منتقل می‌شوند',
'SIM for PBX calls without X-VSA-SIMSLOT':'سیم‌کارت تماس‌های خروجی بدون تعیین شیار',
'System':'طبق تنظیم سیستم',
'Refuse':'رد تماس',
'Follows Android\'s default SIM for calls (now: ':'از سیم‌کارت پیش‌فرض اندروید استفاده می‌شود (فعلاً: ',
'ask every time':'هر بار سؤال شود',
'The PBX must choose the SIM with X-VSA-SIMSLOT.':'مرکز تماس باید سیم‌کارت را مشخص کند.',
'}; refused if that slot has no active SIM.':'؛ اگر سیم‌کارت غیرفعال باشد، تماس رد می‌شود.',
' Applies to the next call.':' از تماس بعد اعمال می‌شود.',
}
# Using quoted-string anchors prevents replacing protocol identifiers and setting keys.
for en,fa in translations.items():
    old='"'+en+'"'
    if old in ui:
        ui=ui.replace(old,'"'+fa+'"')
    else:
        # Some strings are fragments followed by Kotlin interpolation or concatenation.
        if ('"'+en) in ui:
            ui=ui.replace('"'+en,'"'+fa)
        else:
            print('UNMATCHED UI:',repr(en),file=sys.stderr)

# Handle interpolated explanatory texts and remaining runtime English copy.
replacements=[
    ('"Current audio method: ${if (callAudio.available) callAudio.backendLabel else ',
     '"روش صوتی جاری: ${if (callAudio.available) callAudio.backendLabel else '),
    ('"Audio recovered: ${callAudio.recoveryDetail}"','"بازیابی مسیر صوتی: ${callAudio.recoveryDetail}"'),
    ('"Next call: playback muting ${if (cur.muteEarpiece) ', '"تماس بعدی، قطع صدای محلی: ${if (cur.muteEarpiece) '),
    ('"on" else "off"','"روشن" else "خاموش"'),
    ('"Android ${Build.VERSION.RELEASE}, API ${Build.VERSION.SDK_INT}"','"اندروید ${Build.VERSION.RELEASE}، API ${Build.VERSION.SDK_INT}"'),
    ('"Last reported audio method: ${callAudio.backendLabel}"','"آخرین روش صوتی: ${callAudio.backendLabel}"'),
    ('"Playback mute: ${callAudio.muteDetail}"','"وضعیت بی‌صدا: ${callAudio.muteDetail}"'),
    ('"Playback restoration: ${callAudio.restoreDetail}"','"بازگشت صدا: ${callAudio.restoreDetail}"'),
    ('"${changes.size} of the ${import.keys.size} settings in the file ${if (changes.size == 1) "differs" else "differ"}:"',
     '"از ${import.keys.size} تنظیم فایل، ${changes.size} مورد متفاوت است:"'),
    ('"Imported ${changes.size} changed setting${if (changes.size == 1) "" else "s"}."',
     '"تعداد ${changes.size} تنظیم وارد شد."'),
    ('"Later problems get ${GatewayRuntime.SIP_HOLD_GRACE_MS / 1000} s to recover before unregistering so the PBX can fail over. "',
     '"در صورت مشکل، تا ${GatewayRuntime.SIP_HOLD_GRACE_MS / 1000} ثانیه برای بازیابی صبر می‌کند. "'),
    ('"Import failed: ${it.message ?: it.javaClass.simpleName}"','"خطا در واردکردن: ${it.message ?: it.javaClass.simpleName}"'),
    ('"Export failed: ${it.message ?: it.javaClass.simpleName}"','"خطا در خروجی گرفتن: ${it.message ?: it.javaClass.simpleName}"'),
    ('"The file matches the current settings."','"فایل با تنظیمات فعلی یکسان است."'),
    ('"Always SIM $selected${carrier?.let { " ($it)" } ?: ""}; refused if that slot has no active SIM."',
     '"همیشه سیم‌کارت $selected${carrier?.let { " ($it)" } ?: ""}؛ اگر غیرفعال باشد تماس رد می‌شود."'),
]
for a,b in replacements:
    if a in ui: ui=ui.replace(a,b)

# Surface statuses are generated in other modules; localize common details at presentation time.
ui=ui.replace('Text(h.calls.summary)','Text(MagicFa.status(h.calls.summary))')
ui=ui.replace('Text(h.session ?: "هیچ نشست فعالی وجود ندارد")','Text(MagicFa.status(h.session ?: "هیچ نشست فعالی وجود ندارد"))')
ui=ui.replace('h.readinessDetail','MagicFa.status(h.readinessDetail)')
ui=ui.replace('h.sip.detail','MagicFa.status(h.sip.detail)')
ui=ui.replace('Text(detail(), style = MaterialTheme.typography.bodySmall, color = color)',
              'Text(MagicFa.status(detail()), style = MaterialTheme.typography.bodySmall, color = color)')
ui=ui.replace('Text(detail, style = MaterialTheme.typography.bodySmall)',
              'Text(MagicFa.status(detail), style = MaterialTheme.typography.bodySmall)')
ui=ui.replace('Text(roleMessage)', 'Text(MagicFa.status(roleMessage))')
# Repair one interpolated Kotlin template whose quoted empty string must remain untouched.
ui=ui.replace(
    '"Always SIM $selected${carrier?.let { " ($it)" } ?: ""؛ اگر سیم‌کارت غیرفعال باشد، تماس رد می‌شود."',
    '"همیشه سیم‌کارت $selected${carrier?.let { " ($it)" } ?: ""}؛ اگر آن سیم‌کارت غیرفعال باشد، تماس رد می‌شود."',
)

# Keep SIP addresses, usernames, numbers and technical logs visually LTR inside the RTL shell.
ui=ui.replace('import androidx.compose.material3.Text\n',
    'import androidx.compose.material3.Text\nimport androidx.compose.material3.LocalTextStyle\nimport androidx.compose.ui.text.style.TextDirection\n')
ui=ui.replace('visualTransformation = PasswordVisualTransformation(), singleLine = true, modifier = Modifier.fillMaxWidth(),',
    'visualTransformation = PasswordVisualTransformation(), singleLine = true, modifier = Modifier.fillMaxWidth(),\n'
    '            textStyle = LocalTextStyle.current.copy(textDirection = TextDirection.Ltr),')
ui=ui.replace('keyboardOptions = KeyboardOptions(keyboardType = type), modifier = Modifier.fillMaxWidth(),',
    'keyboardOptions = KeyboardOptions(keyboardType = type), modifier = Modifier.fillMaxWidth(),\n'
    '        textStyle = LocalTextStyle.current.copy(textDirection = TextDirection.Ltr),')

# Improve card shape and correct token colors, but keep structure/interactions untouched.
ui=ui.replace('Card(Modifier.fillMaxWidth()) {','Card(Modifier.fillMaxWidth(), colors = androidx.compose.material3.CardDefaults.cardColors(containerColor = MaterialTheme.colorScheme.surfaceVariant)) {')
ui=ui.replace('Text("گزارش فنی", style = MaterialTheme.typography.titleMedium)',
              'Text("گزارش فنی", style = MaterialTheme.typography.titleMedium)')
# Annotate immutable English diagnostic payloads.
ui=ui.replace('Text(log.takeLast(60).reversed().joinToString("\\n"), fontFamily = FontFamily.Monospace,',
              'Text(log.takeLast(60).reversed().joinToString("\\n"), fontFamily = FontFamily.Monospace,')
main.write_text(ui)

fa=app/'MagicFa.kt'
fa.write_text('''package io.github.sparkcyf.voicesipagent.app

/** Presentation-only localization. Keeps protocol values, call logs and diagnostics intact. */
internal object MagicFa {
    fun status(value: String): String {
        val s = value.trim()
        return when {
            s.equals("No cellular call", ignoreCase = true) -> "تماس سیم‌کارتی در جریان نیست"
            s.equals("No active session", ignoreCase = true) -> "نشست فعالی وجود ندارد"
            s.equals("Gateway ready", ignoreCase = true) -> "آماده پاسخ‌گویی"
            s.equals("SIP unavailable: not configured", ignoreCase = true) -> "ارتباط SIP هنوز پیکربندی نشده"
            s.equals("not configured", ignoreCase = true) -> "پیکربندی نشده"
            s.equals("direct SIP ready (not registered)", ignoreCase = true) -> "اتصال مستقیم SIP آماده است (نیازی به ثبت‌نام نیست)"
            s.equals("Gateway call: active", ignoreCase = true) -> "تماس متصل به ایجنت فعال است"
            s.equals("Gateway off", ignoreCase = true) -> "پاسخ‌گویی خاموش است"
            s.startsWith("Waiting for ", ignoreCase = true) -> "در انتظار آماده‌شدن سرویس‌ها"
            s.startsWith("COMPANION", ignoreCase = true) -> "دسترسی همراه تلفن فعال است"
            s.startsWith("DIRECT", ignoreCase = true) -> "صدای تماس مستقیم فعال است"
            s.startsWith("SIP unavailable", ignoreCase = true) -> "سرویس SIP آماده نیست: " + s.substringAfter(':', "")
            else -> value // Keep unknown diagnostic data unchanged rather than misrepresenting state.
        }
    }
}
''')
print('Magic Agent localized: UI, safe defaults, theme, icon, runtime labels')