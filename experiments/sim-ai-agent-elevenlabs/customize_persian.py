#!/usr/bin/env python3
"""Create RTL Persian ElevenLabs focused UI on top of the pinned alpha SIP patch.
No personal credentials or numbers are embedded. Run on a patched checkout.
"""
import pathlib
import sys

root = pathlib.Path(sys.argv[1]).resolve()
base = root / 'app/src/main/kotlin/io/github/sparkcyf/voicesipagent/app'

def rewrite(path, edits):
    text = path.read_text(encoding='utf-8')
    for old, new in edits:
        if old not in text:
            raise RuntimeError(f'{path.name}: anchor missing: {old[:110]!r}')
        text = text.replace(old, new)
    path.write_text(text, encoding='utf-8')

def single(path, old, new):
    text = path.read_text(encoding='utf-8')
    if text.count(old) != 1:
        raise RuntimeError(f'{path.name}: expected one anchor for {old[:90]!r}, got {text.count(old)}')
    path.write_text(text.replace(old, new), encoding='utf-8')

# The first run should already show the correct service host and TLS config. Credentials and phone
# identity must be entered on-device, and persisted only under Android Keystore encryption.
store = base / 'SettingsStore.kt'
rewrite(store, [
    ('val server: String = "",', 'val server: String = "sip.rtc.elevenlabs.io",'),
    ('val port: Int = 5060,', 'val port: Int = 5061,'),
    ('val sipTransport: String = "udp",', 'val sipTransport: String = "tls",'),
    ('val domain: String = "",', 'val domain: String = "sip.rtc.elevenlabs.io",'),
    ('val directSipMode: Boolean = false,', 'val directSipMode: Boolean = true,'),
    ('server = prefs.getString("server", "")!!,', 'server = prefs.getString("server", "sip.rtc.elevenlabs.io")!!,'),
    ('port = prefs.getInt("port", 5060),', 'port = prefs.getInt("port", 5061),'),
    ('sipTransport = prefs.getString("sip_transport", "udp")!!,', 'sipTransport = prefs.getString("sip_transport", "tls")!!,'),
    ('domain = prefs.getString("domain", "")!!,', 'domain = prefs.getString("domain", "sip.rtc.elevenlabs.io")!!,'),
    ('directSipMode = prefs.getBoolean("direct_sip_mode", false),', 'directSipMode = prefs.getBoolean("direct_sip_mode", true),'),
])

# Migrate the empty fields of an older alpha installation, but do not replace any saved
# SIP identity/password or override a user's working PBX configuration.
old = '    fun load(): GatewaySettings = GatewaySettings('
new = '''    private fun migrateEmptyAlphaPreset() {
        if (prefs.getBoolean("elevenlabs_preset_v2", false)) return
        val editor = prefs.edit().putBoolean("elevenlabs_preset_v2", true)
        val host = prefs.getString("server", "").orEmpty()
        if (host.isBlank()) {
            editor.putString("server", "sip.rtc.elevenlabs.io")
                .putInt("port", 5061).putString("sip_transport", "tls")
                .putString("domain", "sip.rtc.elevenlabs.io")
                .putBoolean("direct_sip_mode", true)
                .putString("srtp", "optional").putBoolean("tls_verify", true)
        }
        editor.apply()
    }

    fun load(): GatewaySettings {
        migrateEmptyAlphaPreset()
        return loadSettings()
    }

    private fun loadSettings(): GatewaySettings = GatewaySettings('''
single(store, old, new)

# Persian copy for the technical screen retained behind advanced controls.
labels = {
'Voice SIP Agent':'دستیار تماس هوشمند',
'Takeover':'پاسخ‌گویی تماس‌ها',
'Take over calls':'فعال‌سازی پاسخ‌گویی خودکار',
'Turning off after the current call':'پس از پایان تماس جاری غیرفعال می‌شود',
'Turning on after current calls end':'پس از پایان تماس جاری فعال می‌شود',
'Changing the default dialer':'در حال تغییر برنامه پیش‌فرض تماس',
'Waiting to become the default dialer':'در انتظار انتخاب برنامه تماس',
'Waiting to restore your previous dialer':'در انتظار بازگرداندن برنامه تماس قبلی',
'Ready to bridge calls to the PBX':'مسیر محلی آماده است؛ تماس واقعی هنوز تست نشده',
'Gateway off; this app remains the default phone app':'پاسخ‌گویی خاموش است؛ برنامه هنوز شماره‌گیر پیش‌فرض است',
'Gateway off; dialer restoration needs attention':'پاسخ‌گویی خاموش؛ بازگردانی شماره‌گیر را بررسی کن',
'Gateway off; calls stay with your dialer':'پاسخ‌گویی خاموش است؛ تماس‌ها به گوشی می‌رسند',
'Call access':'دسترسی به تماس',
'This app is the default dialer':'این برنامه شماره‌گیر پیش‌فرض است',
'Default dialer selection required':'انتخاب شماره‌گیر پیش‌فرض لازم است',
'Alongside-dialer access is unavailable on Android 11':'در اندروید ۱۱ باید برنامه شماره‌گیر پیش‌فرض باشد',
'Alongside your current dialer':'در کنار شماره‌گیر فعلی',
'Enable takeover to make this app the default phone app.':'برای پیش‌فرض‌کردن، پاسخ‌گویی را فعال کن.',
'This app stays the default when takeover is off.':'با خاموش‌کردن پاسخ‌گویی، برنامه پیش‌فرض باقی می‌ماند.',
'Turning takeover off tries to restore your previous phone app.':'خاموش‌کردن پاسخ‌گویی، شماره‌گیر قبلی را برمی‌گرداند.',
'Enable takeover':'فعال‌سازی پاسخ‌گویی',
'Default dialer selection is unavailable on this device.':'انتخاب شماره‌گیر پیش‌فرض در این دستگاه در دسترس نیست.',
'Restore previous dialer':'بازگرداندن شماره‌گیر قبلی',
'Choose dialer in Settings':'انتخاب شماره‌گیر در تنظیمات',
'Cancel dialer change':'لغو تغییر شماره‌گیر',
'Mute call audio on this phone':'بی‌صداکردن صدای تماس در گوشی',
'Playback muting cannot be attempted with the current setup. The phone microphone remains muted during gateway calls. Changes apply to the next call.':'بی‌صداکردن با این تنظیمات ممکن نیست. تغییرات از تماس بعدی اعمال می‌شوند.',
'Muting stopped direct telephony audio on this phone, so it is skipped when that method is used. Turn this off and on again to retest.':'در این دستگاه قطع صدا با حالت مستقیم ناسازگار بوده است؛ برای تست مجدد گزینه را خاموش و روشن کن.',
'When enabled, attempts to silence the earpiece or speaker. The phone microphone remains muted during gateway calls. Changes apply to the next call.':'برای جلوگیری از تداخل صدا، خروجی محلی تماس خاموش می‌شود. تغییرات از تماس بعدی اعمال می‌شوند.',
'Changes pending until calls end':'تغییرات پس از پایان تماس اعمال می‌شوند',
'Health':'وضعیت اتصال',
'Health checks will start after current calls end.':'بررسی وضعیت پس از پایان تماس شروع می‌شود.',
'Health checks are paused while takeover is off.':'بررسی فعال تماس با خاموش بودن پاسخ‌گویی متوقف است.',
'Shizuku':'شیزوکو',
'Stopped while takeover is off':'در حالت پاسخ‌گویی خاموش، متوقف است',
'Call audio access':'دسترسی صدای تماس',
'Doze allowlisted':'مجوز فعالیت در پس‌زمینه',
'SIP registration':'وضعیت مسیر SIP',
'SIM slots: ':'سیم‌کارت‌ها: ',
'none':'هیچ‌کدام',
'Grant Shizuku':'اعطای مجوز شیزوکو',
'Re-run setup':'بررسی دوباره دسترسی‌ها',
'Reconnect SIP':'اتصال دوباره SIP',
'Call':'تماس',
'No active session':'هیچ تماس فعالی وجود ندارد',
'Current audio method: ':'روش فعلی صدا: ',
'status unavailable':'وضعیت نامشخص',
'Local playback (Android): ':'صدای محلی اندروید: ',
'mute state unavailable':'وضعیت بی‌صدا نامشخص',
'muting not requested':'بی‌صداکردن درخواست نشده',
'mute request applied':'بی‌صداکردن اعمال شد',
'existing mute preserved':'وضعیت قبلی حفظ شد',
'mute request not applied':'بی‌صداکردن اعمال نشد',
'muting unsupported with this audio method':'این روش از بی‌صداکردن پشتیبانی نمی‌کند',
'mute state unknown':'وضعیت نامشخص',
'Audio recovered: ':'صدای تماس بازیابی شد: ',
'Next call: playback muting ':'تماس بعدی، بی‌صداکردن: ',
'requested':'درخواست شده',
'off':'خاموش',
'Call audio is not open.':'مسیر صدا هنوز باز نشده است.',
'Local call playback restoration is unconfirmed. Sound may remain muted.':'بازیابی صدای گوشی تأیید نشده است؛ ممکن است صدا همچنان قطع باشد.',
'Retry restoring playback':'تلاش دوباره برای بازیابی صدا',
'If call sound stays muted, raise the call volume during a normal phone call.':'اگر صدا قطع ماند، هنگام یک تماس معمولی حجم صدای تماس را زیاد کن.',
'Echo incoming calls (test)':'بازتاب صدای تماس ورودی (تست)',
'While the gateway is on, answers incoming cellular calls and echoes the caller\'s audio instead of connecting the PBX. Changes apply after the current call ends.':'تماس ورودی را برای بررسی صدا پاسخ می‌دهد و صدای تماس‌گیرنده را بازتاب می‌کند؛ در این حالت ElevenLabs متصل نمی‌شود.',
'Echo test enabled':'تست بازتاب صدا روشن است',
'Disable echo test':'خاموش‌کردن تست بازتاب',
'Hide advanced settings':'بستن تنظیمات پیشرفته',
'Advanced settings':'تنظیمات پیشرفته',
'Platform integration':'یکپارچه‌سازی اندروید',
'Automatic':'خودکار',
'Alongside dialer':'در کنار شماره‌گیر',
'Default dialer':'شماره‌گیر پیش‌فرض',
'Android 11 requires this app as the default phone app.':'در اندروید ۱۱ این برنامه باید شماره‌گیر پیش‌فرض باشد.',
'Works alongside your phone app unless this app is the default.':'می‌تواند در کنار برنامه تماس فعلی اجرا شود.',
'Requires Android 12 or later.':'به اندروید ۱۲ یا جدیدتر نیاز دارد.',
'Restore your usual phone app to use this mode.':'برای این حالت، شماره‌گیر معمولی را برگردان.',
'Keeps your current phone app.':'شماره‌گیر فعلی را حفظ می‌کند.',
'Enable takeover or tap Make default phone app to switch.':'برای تغییر، پاسخ‌گویی را فعال کن یا شماره‌گیر را پیش‌فرض قرار بده.',
'Applies after current calls end.':'پس از پایان تماس اعمال می‌شود.',
'Keep this app as the default phone app when gateway is off':'حفظ برنامه به‌عنوان شماره‌گیر پیش‌فرض',
'When disabled, turning takeover off tries to restore your previous phone app.':'با خاموش‌کردن این گزینه، شماره‌گیر قبلی بازیابی می‌شود.',
'Make default phone app':'انتخاب به‌عنوان شماره‌گیر پیش‌فرض',
'Manual dialer selection leaves takeover unchanged. Selecting Default dialer above applies to the next switch-on.':'تغییر دستی شماره‌گیر، وضعیت پاسخ‌گویی را تغییر نمی‌دهد.',
'Cellular audio':'صدای سیم‌کارت',
'Direct telephony':'صدای مستقیم تماس',
'Cellular redirection':'تغییر مسیر صدای تماس',
'Prefers cellular call redirection; falls back to direct telephony during setup.':'اول تغییر مسیر صدا را امتحان می‌کند و در صورت نیاز از روش مستقیم استفاده می‌کند.',
'Uses direct cellular audio capture and playback, without redirection fallback.':'ضبط و پخش صدای تماس را مستقیماً امتحان می‌کند.',
'Uses cellular call redirection only. Requires Android 13+ and privileged access.':'فقط از تغییر مسیر صوت استفاده می‌کند؛ اندروید ۱۳ به بالا لازم است.',
' Changes apply to the next call.':' تغییرات از تماس بعدی اعمال می‌شوند.',
'Diagnostics':'عیب‌یابی فنی',
'Last reported audio method: ':'آخرین روش صدا: ',
'Playback mute: ':'قطع صدای پخش: ',
'Playback restoration: ':'بازیابی صدای پخش: ',
'Waiting for helper':'در انتظار سرویس کمکی',
'Audio access and frame counters do not verify remote delivery. Verify both directions on this device.':'اعداد فریم صوتی به‌تنهایی انتقال صدا به مخاطب را تأیید نمی‌کنند؛ هر دو جهت باید آزمایش شوند.',
'Log':'گزارش فنی',
'Settings':'تنظیمات تخصصی SIP',
'SIP stack':'موتور SIP',
'Transport':'روش ارتباط',
'SRTP (TLS only)':'رمزگذاری صدا (SRTP)',
'Verify TLS certificate':'بررسی اعتبار گواهی TLS',
'Checks the certificate chain, expiry and host name.':'اعتبار گواهی، تاریخ انقضا و نام میزبان بررسی می‌شود.',
'Any certificate is accepted, including expired, self-signed and wrong-host ones.':'غیرفعال‌سازی این گزینه ناامن است؛ گواهی‌های نامعتبر پذیرفته می‌شوند.',
'Insecure: anyone on the network path can impersonate the PBX, read and change SIP signalling and read the SRTP keys. Use only for testing or on a trusted network.':'هشدار امنیتی: با غیرفعال‌کردن اعتبارسنجی، ارتباط ممکن است شنود یا دست‌کاری شود.',
'Trusted certificates (TLS)':'گواهی‌های مورداعتماد (TLS)',
'Android system CAs':'گواهی‌های مورداعتماد اندروید',
'Only these, instead of the system CAs:':'فقط این گواهی‌ها، به‌جای گواهی‌های سیستم:',
'Import certificate':'واردکردن گواهی',
'Use system CAs':'استفاده از گواهی‌های سیستم',
'A private CA, or the PBX\'s own self-signed certificate (PEM or DER). The host name must still match unless verification is off.':'برای گواهی اختصاصی از فایل PEM یا DER استفاده کن؛ نام میزبان باید معتبر باشد.',
'PBX host':'میزبان SIP',
'PBX port':'درگاه SIP',
'SIP domain (empty = PBX host)':'دامنه SIP',
'Extension / user':'نام کاربری SIP',
'Password':'رمز SIP',
'Cellular inbound -> SIP target (blank = username)':'مقصد تماس به ایجنت (شماره با +98)',
'Allowed dial-out prefixes (comma separated, empty = any)':'پیش‌شماره‌های مجاز خروجی (اختیاری)',
'Unsaved changes':'تغییرات ذخیره‌نشده',
'Save & apply':'ذخیره تنظیمات',
'Saved changes apply after the current call ends.':'تغییرات پس از پایان تماس جاری اعمال می‌شوند.',
'Saved SIP settings are used when takeover is next enabled.':'تنظیمات ذخیره شد؛ برای پاسخ‌گویی ابتدا آماده‌بودن اتصال را بررسی کن.',
'Unregister while the phone cannot take calls':'قطع اتصال وقتی گوشی آماده نیست',
'At startup, waits for the phone to be ready before registering with the PBX. Later problems get 45 s to recover before unregistering so the PBX can fail over. Registration changes wait for calls to end; registers again as soon as the phone is ready.':'پاسخ‌گویی تا آماده‌شدن دسترسی تماس منتظر می‌ماند.',
'pjsip debug log':'ثبت گزارش عیب‌یابی PJSIP',
'Info-level logs with masked numbers':'گزارش فنی با شماره‌های پوشانده‌شده',
'Configuration file':'فایل تنظیمات',
'Export to file':'خروجی تنظیمات',
'Import from file':'ورود تنظیمات از فایل',
'Import settings?':'تنظیمات وارد شود؟',
'Import':'واردکردن',
'Cancel':'انصراف',
'Export saves every setting except the takeover switch as JSON, including the SIP password in plain text. Import changes only the settings present in the file.':'هشدار: خروجی JSON شامل رمز SIP به‌صورت متن ساده است؛ فقط در محل امن نگه‌داری شود.',
'Takeover stays as it is. Changes wait for current calls to end.':'وضعیت پاسخ‌گویی تغییر نمی‌کند؛ تنظیمات پس از تماس اعمال می‌شوند.',
'no active SIM':'سیم‌کارت غیرفعال',
'calls ring on this phone as usual':'تماس‌ها مثل قبل روی گوشی زنگ می‌خورند',
'calls are bridged to the PBX':'تماس‌های ورودی به ایجنت هدایت می‌شوند',
'SIM for PBX calls without X-VSA-SIMSLOT':'سیم‌کارت پیش‌فرض برای تماس خروجی',
'System':'سیستم',
'Refuse':'ردکردن',
'The PBX must choose the SIM with X-VSA-SIMSLOT.':'انتخاب سیم‌کارت الزامی است.',
'} Applies to the next call.':'} تغییرات از تماس بعدی اعمال می‌شوند.',
}

main = base / 'MainActivity.kt'
src = main.read_text(encoding='utf-8')
# Replace literal English strings within the Compose UI, including dynamic portions that still
# arrive from Android and need technical diagnostics. Advanced logs remain raw for troubleshooting.
for english, persian in labels.items():
    src = src.replace('"' + english + '"', '"' + persian + '"')
# Fix the primary title and remove PBX-oriented hint from the user's first screen.
src = src.replace('Text("دستیار تماس هوشمند", style = MaterialTheme.typography.headlineSmall)',
'''Text("دستیار تماس هوشمند", style = MaterialTheme.typography.headlineSmall,
            fontWeight = androidx.compose.ui.text.font.FontWeight.Bold, color = MaterialTheme.colorScheme.primary)
        Text("اتصال سیم‌کارت به ایجنت صوتی ElevenLabs", style = MaterialTheme.typography.bodyMedium)
        ElevenLabsSetup(rt, editor)''')
# Existing dense technical settings remain available, but under Advanced only.
src = src.replace('        SettingsSection(rt, editor)\n        ConfigFileSection(rt)\n        var advanced by', '        var advanced by')
src = src.replace('        if (advanced) {\n            Section("یکپارچه‌سازی اندروید") {',
                  '        if (advanced) {\n            SettingsSection(rt, editor)\n            ConfigFileSection(rt)\n            Section("یکپارچه‌سازی اندروید") {')
# Avoid falsely claiming SIP remotely registered. This state only tells us local SIP is ready.
src = src.replace('if (h.takeover) h.sip.detail else "در حالت پاسخ‌گویی خاموش، متوقف است"',
'''if (h.takeover && h.sip.detail.contains("direct SIP ready"))
                    "موتور SIP آماده ارسال است؛ هنوز تماس واقعی تأیید نشده"
                else if (h.takeover && h.sip.detail.contains("not configured")) "نام کاربری، رمز و مقصد هنوز کامل نیست"
                else if (h.takeover) h.sip.detail else "در حالت پاسخ‌گویی خاموش، متوقف است"''')
src = src.replace('h.takeover -> h.readinessDetail',
'''h.takeover -> when {
                    h.readinessDetail == "Gateway ready" -> "دسترسی‌های محلی آماده‌اند؛ تست تماس واقعی لازم است"
                    h.readinessDetail.contains("not configured") -> "اطلاعات اتصال ElevenLabs هنوز کامل نیست"
                    else -> h.readinessDetail
                }''')
# All SIM toggles default to enabled upstream. The main ON switch must be a deliberate step.
src = src.replace('Toggle("فعال‌سازی پاسخ‌گویی خودکار", cur.takeover, setTakeover)',
                  'Toggle("فعال‌سازی پاسخ‌گویی خودکار", cur.takeover, setTakeover)')
# Persian labels for the branded mode created by the alpha patch.
src = src.replace('"Direct ElevenLabs SIP (no PBX)"', '"اتصال مستقیم ElevenLabs (بدون PBX)"')
src = src.replace('"ElevenLabs SIP host"', '"سرور ElevenLabs"')
src = src.replace('"ElevenLabs imported SIP identifier (required)"', '"شماره مقصد واردشده در ElevenLabs (با +98)"')
# Arabic/Persian text direction in Compose, plus premium neutral white/violet palette.
src = src.replace('import androidx.compose.material3.MaterialTheme', '''import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.CardDefaults
import androidx.compose.material3.Typography''')
src = src.replace('import androidx.compose.ui.Alignment', '''import androidx.compose.ui.Alignment
import androidx.compose.ui.platform.LocalLayoutDirection
import androidx.compose.ui.unit.LayoutDirection
import androidx.compose.runtime.CompositionLocalProvider
import androidx.compose.ui.text.font.Font
import androidx.compose.ui.text.font.FontFamily
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.foundation.shape.RoundedCornerShape''')
src = src.replace('import androidx.compose.ui.text.font.FontFamily\nimport androidx.compose.ui.text.input.KeyboardType',
                  'import androidx.compose.ui.text.input.KeyboardType')
src = src.replace('''            MaterialTheme(colorScheme = if (isSystemInDarkTheme()) darkColorScheme() else lightColorScheme()) {
                val message by roleMessage.collectAsState()
                Scaffold { pad -> Screen(runtime, editor, Modifier.padding(pad), ::requestDialer, ::switchDialer,
                    ::chooseDialerInSettings, ::cancelDialerChange, ::setTakeoverFromUi, message) }
            }''', '''            val vazir = remember { FontFamily(Font(R.font.vazirmatn_regular)) }
            val typography = remember(vazir) {
                Typography().let { base -> base.copy(
                    bodyLarge = base.bodyLarge.copy(fontFamily = vazir),
                    bodyMedium = base.bodyMedium.copy(fontFamily = vazir),
                    bodySmall = base.bodySmall.copy(fontFamily = vazir),
                    titleLarge = base.titleLarge.copy(fontFamily = vazir),
                    titleMedium = base.titleMedium.copy(fontFamily = vazir),
                    titleSmall = base.titleSmall.copy(fontFamily = vazir),
                    headlineSmall = base.headlineSmall.copy(fontFamily = vazir),
                    labelLarge = base.labelLarge.copy(fontFamily = vazir),
                    labelMedium = base.labelMedium.copy(fontFamily = vazir),
                    labelSmall = base.labelSmall.copy(fontFamily = vazir),
                ) }
            }
            val colors = if (isSystemInDarkTheme()) darkColorScheme(
                primary = Color(0xFFBCA0FF), onPrimary = Color(0xFF24123D),
                background = Color(0xFF151417), surface = Color(0xFF242126),
                surfaceVariant = Color(0xFF322A38), onSurface = Color(0xFFF8F4FF),
                outline = Color(0xFF6C5A76), secondary = Color(0xFFCFB5FF)
            ) else lightColorScheme(
                primary = Color(0xFF7043CE), onPrimary = Color.White,
                background = Color(0xFFF8F6FC), surface = Color.White,
                surfaceVariant = Color(0xFFF1EBFB), onSurface = Color(0xFF241C31),
                outline = Color(0xFFD6C8EA), secondary = Color(0xFF8E6BCC)
            )
            CompositionLocalProvider(LocalLayoutDirection provides LayoutDirection.Rtl) {
                MaterialTheme(colorScheme = colors, typography = typography) {
                    val message by roleMessage.collectAsState()
                    Scaffold(containerColor = MaterialTheme.colorScheme.background) { pad ->
                        Screen(runtime, editor, Modifier.padding(pad), ::requestDialer, ::switchDialer,
                            ::chooseDialerInSettings, ::cancelDialerChange, ::setTakeoverFromUi, message)
                    }
                }
            }''')
src = src.replace('''    Card(Modifier.fillMaxWidth()) {
        Column(Modifier.padding(16.dp), verticalArrangement = Arrangement.spacedBy(8.dp)) {''', '''    Card(
        modifier = Modifier.fillMaxWidth(),
        shape = RoundedCornerShape(22.dp),
        colors = CardDefaults.cardColors(containerColor = MaterialTheme.colorScheme.surface),
        elevation = CardDefaults.cardElevation(defaultElevation = 2.dp),
    ) {
        Column(Modifier.padding(18.dp), verticalArrangement = Arrangement.spacedBy(10.dp)) {''')
# Developer-maintained, full Farsi onboarding with a safe one-tap vendor preset.
setup = '''
@Composable
private fun ElevenLabsSetup(rt: GatewayRuntime, editor: SipSettingsDraft) = with(editor) {
    val current by rt.settingsFlow.collectAsState()
    val pending by rt.pendingSettingsFlow.collectAsState()
    LaunchedEffect(current, pending) { syncSaved(current, pending) }
    val validNumber = target.startsWith("+") && target.drop(1).length in 7..15 &&
        target.drop(1).all { it.isDigit() }
    val complete = directMode && user.isNotBlank() && password.isNotBlank() && validNumber &&
        portError == null
    Section("اتصال ایجنت ElevenLabs") {
        Text("سرور، درگاه، TLS و موتور SIP از پیش تنظیم شده‌اند. فقط مشخصات ترانک خودت را وارد کن.",
            style = MaterialTheme.typography.bodyMedium)
        OutlinedButton(onClick = {
            directMode = true
            server = "sip.rtc.elevenlabs.io"
            port = "5061"
            domain = "sip.rtc.elevenlabs.io"
            stack = SipStack.PJSUA2
            transport = SipTransport.TLS
            srtp = SrtpPolicy.OPTIONAL
            tlsVerify = true
        }) { Text("اعمال تنظیمات آماده ElevenLabs") }
        Text("سرور: sip.rtc.elevenlabs.io  ·  TLS: ۵۰۶۱", style = MaterialTheme.typography.bodySmall)
        Field("نام کاربری ترانک SIP در ElevenLabs", user) { user = it }
        OutlinedTextField(
            value = password, onValueChange = { password = it },
            label = { Text("رمز عبور ترانک SIP") },
            visualTransformation = PasswordVisualTransformation(),
            singleLine = true, modifier = Modifier.fillMaxWidth(),
        )
        Field("شماره ثبت‌شده در ElevenLabs (با +98)", target, KeyboardType.Phone,
            error = if (target.isNotEmpty() && !validNumber) "شماره را با + و کد کشور وارد کن" else null) {
            target = it.trim()
        }
        Text("برای امنیت، رمز و شماره شخصی داخل برنامه عمومی قرار نگرفته‌اند.",
            style = MaterialTheme.typography.bodySmall)
        Button(onClick = { rt.applySettings(settingsUpdate()) }, enabled = complete) {
            Text("ذخیره و اتصال به ElevenLabs")
        }
        if (!complete) Text("ابتدا نام کاربری، رمز و شماره مقصد را کامل کن؛ سپس ذخیره کن.",
            style = MaterialTheme.typography.bodySmall)
        if (current.takeover) Text("توجه: پاسخ‌گویی خودکار روشن است. پیش از تست واقعی فقط سیم موردنظر را فعال نگه دار.",
            style = MaterialTheme.typography.bodySmall, color = MaterialTheme.colorScheme.error)
    }
}

'''
src = src.replace('@Composable\nprivate fun SettingsSection', setup+'@Composable\nprivate fun SettingsSection', 1)
# Avoid presenting the old PBX-only technical controls in the customer flow.
src = src.replace('''        Text("دستیار تماس هوشمند",''', '''        Text("دستیار تماس هوشمند",''')
main.write_text(src, encoding='utf-8')

# Branded app name in launcher + new version for a seamless update of the existing alpha install.
xml = root / 'app/src/main/res/values/strings.xml'
rewrite(xml,[('<string name="app_name">SIM AI Agent (ElevenLabs)</string>',
              '<string name="app_name">دستیار هوشمند تماس</string>')])
gradle = root / 'app/build.gradle.kts'
rewrite(gradle,[('versionCode = 1','versionCode = 2'),
                ('versionName = "0.4.2-elevenlabs-direct-alpha1"',
                 'versionName = "0.4.3-elevenlabs-fa-rtl"')])
print('RTL Persian UI, white/violet theme, Vazirmatn typography, ElevenLabs presets and focused onboarding applied.')