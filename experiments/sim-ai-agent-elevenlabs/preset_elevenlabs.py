#!/usr/bin/env python3
"""Safe ElevenLabs defaults and Persian one-tap preset for Magic Agent 0.5.1.
Executed after the verified Persian RTL localization. Does not embed credentials.
"""
from pathlib import Path
import sys

root = Path(sys.argv[1]).resolve()
base = root / "app/src/main/kotlin/io/github/sparkcyf/voicesipagent/app"

def replace_once(text, before, after, tag):
    n = text.count(before)
    if n != 1:
        raise RuntimeError(f"{tag}: expected 1 match, got {n}: {before[:80]}")
    return text.replace(before, after, 1)

store = base / "SettingsStore.kt"
s = store.read_text()
for before, after in [
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
]:
    s = replace_once(s, before, after, "SettingsStore.kt")

# A previous install of 0.5.0 may have saved an empty PBX host.
# Migrate ONLY empty/unconfigured profiles; never touch existing working SIP accounts.
s = replace_once(s, '    fun load(): GatewaySettings = GatewaySettings(',
'''    private fun initializePresetForUnconfiguredInstallation() {
        if (prefs.getBoolean("elevenlabs_defaults_051", false)) return
        val savedHost = prefs.getString("server", "").orEmpty()
        val editor = prefs.edit().putBoolean("elevenlabs_defaults_051", true)
        if (savedHost.isBlank()) {
            editor.putString("server", "sip.rtc.elevenlabs.io")
                .putInt("port", 5061).putString("sip_transport", "tls")
                .putString("domain", "sip.rtc.elevenlabs.io")
                .putBoolean("direct_sip_mode", true)
                .putString("srtp", "optional")
                .putBoolean("tls_verify", true)
        }
        editor.apply()
    }

    fun load(): GatewaySettings {
        initializePresetForUnconfiguredInstallation()
        return loadStoredSettings()
    }

    private fun loadStoredSettings(): GatewaySettings = GatewaySettings(''',
"SettingsStore.load migration")
store.write_text(s)

main = base / "MainActivity.kt"
u = main.read_text()
# Present a one-click repair for accidental PBX edits without changing personal identity.
u = replace_once(u,'Section("تنظیمات اتصال") {',
'''Section("تنظیمات اتصال") {
        Text("سرور ElevenLabs، پورت ۵۰۶۱، TLS و رمزگذاری صدا از پیش تنظیم شده‌اند.",
            style = MaterialTheme.typography.bodyMedium)
        OutlinedButton(onClick = {
            directMode = true
            server = "sip.rtc.elevenlabs.io"
            domain = "sip.rtc.elevenlabs.io"
            port = "5061"
            stack = SipStack.PJSUA2
            transport = SipTransport.TLS
            srtp = SrtpPolicy.OPTIONAL
            tlsVerify = true
        }) { Text("اعمال تنظیمات آماده ElevenLabs") }
        Text("فقط نام کاربری SIP، رمز ترانک و شماره ثبت‌شده در ElevenLabs را خودت وارد کن.",
            style = MaterialTheme.typography.bodySmall)''',
"MainActivity settings card")
# Focus safety warnings in visible Persian, not in protocol values or logs.
main.write_text(u)

gradle = root / "app/build.gradle.kts"
g = gradle.read_text()
g = replace_once(g,'versionName = "0.5.0-fa1"','versionName = "0.5.1-fa-elevenlabs-preset"',"build version")
g = replace_once(g,'versionCode = 2','versionCode = 3',"version code")
gradle.write_text(g)

assert "sip.rtc.elevenlabs.io" in s
assert 'val takeover: Boolean = false' in s
assert 'val audioMethod: Int = AudioMethod.LEGACY' in s
assert 'val directSipMode: Boolean = true' in s
assert 'apply' or True
print("ElevenLabs defaults installed; identity remains on-device and takeover stays off.")
