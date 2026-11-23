<?php
$landingHeaderLang = isset($landingLanguage) && in_array($landingLanguage, ['fa','en','ar'], true) ? $landingLanguage : 'fa';
$landingHeaderStandalone = !empty($landingHeaderStandalone);
$landingHeaderCopy = [
 'fa'=>[
  'tagline'=>'مدیریت هوشمند، از محتوا تا مخاطب','main'=>'منوی اصلی','features'=>'قابلیت‌ها','use_cases'=>'کاربردها',
  'publishing'=>'محتوا و انتشار','smart_direct'=>'دایرکت هوشمند','help'=>'راهنما','contact'=>'ارتباط با ما',
  'language'=>'انتخاب زبان','login'=>'ورود','login_aria'=>'ورود به حساب کاربری','login_title'=>'ورود به Magic Super Manager',
  'theme'=>'تغییر تم','mobile_open'=>'باز کردن منوی موبایل','mobile_close'=>'بستن منوی موبایل','mobile_nav'=>'منوی موبایل',
  'close'=>'بستن منو','quick'=>'دسترسی سریع','quick_desc'=>'هر بخش را مستقیم ببین','active'=>'فعال',
  'features_desc'=>'چیزی که برای کار روزمره لازم داری','use_cases_desc'=>'فروش، پشتیبانی و جذب مخاطب',
  'publishing_desc'=>'از ایده تا انتشار یا زمان‌بندی','smart_desc'=>'هر تعامل، شروع یک مسیر هوشمند',
  'contact_desc'=>'پیام مستقیم، تلگرام، واتساپ و تماس','help_center'=>'مرکز راهنما',
  'help_desc'=>'آموزش، FAQ و پاسخ خطاهای رایج','start'=>'شروع ساده و بدون تعهد','free'=>'رایگان شروع کن'
 ],
 'en'=>[
  'tagline'=>'Smarter management, from content to customers','main'=>'Main Navigation','features'=>'Features','use_cases'=>'Use Cases',
  'publishing'=>'Content & Publishing','smart_direct'=>'Smart Direct','help'=>'Help','contact'=>'Contact Us',
  'language'=>'Choose language','login'=>'Log In','login_aria'=>'Log in to your account','login_title'=>'Log in to Magic Super Manager',
  'theme'=>'Switch color theme','mobile_open'=>'Open mobile menu','mobile_close'=>'Close mobile menu','mobile_nav'=>'Mobile Navigation',
  'close'=>'Close menu','quick'=>'Quick Access','quick_desc'=>'Go straight to any section','active'=>'Active',
  'features_desc'=>'Everything you need for everyday work','use_cases_desc'=>'Sales, support and lead generation',
  'publishing_desc'=>'From idea to publishing or scheduling','smart_desc'=>'Every interaction begins a smarter journey',
  'contact_desc'=>'Direct messages, Telegram, WhatsApp and calls','help_center'=>'Help Center',
  'help_desc'=>'Tutorials, FAQs and troubleshooting','start'=>'Start easily, with no commitment','free'=>'Get Started for Free'
 ],
 'ar'=>[
  'tagline'=>'إدارة أذكى، من المحتوى إلى العملاء','main'=>'القائمة الرئيسية','features'=>'المزايا','use_cases'=>'حالات الاستخدام',
  'publishing'=>'المحتوى والنشر','smart_direct'=>'الرسائل المباشرة الذكية','help'=>'المساعدة','contact'=>'تواصل معنا',
  'language'=>'اختر اللغة','login'=>'تسجيل الدخول','login_aria'=>'تسجيل الدخول إلى حسابك','login_title'=>'تسجيل الدخول إلى Magic Super Manager',
  'theme'=>'تغيير المظهر','mobile_open'=>'فتح قائمة الهاتف','mobile_close'=>'إغلاق قائمة الهاتف','mobile_nav'=>'قائمة الهاتف',
  'close'=>'إغلاق القائمة','quick'=>'وصول سريع','quick_desc'=>'انتقل مباشرةً إلى أي قسم','active'=>'نشط',
  'features_desc'=>'كل ما تحتاجه للعمل اليومي','use_cases_desc'=>'المبيعات والدعم وجذب العملاء المحتملين',
  'publishing_desc'=>'من الفكرة إلى النشر أو الجدولة','smart_desc'=>'كل تفاعل هو بداية لمسار ذكي',
  'contact_desc'=>'الرسائل المباشرة وتليغرام وواتساب والمكالمات','help_center'=>'مركز المساعدة',
  'help_desc'=>'شروحات وأسئلة شائعة وحلول للمشكلات','start'=>'ابدأ بسهولة دون أي التزام','free'=>'ابدأ مجاناً'
 ]
];
$landingHeaderT = $landingHeaderCopy[$landingHeaderLang];
$landingHeaderQuery = $landingHeaderLang === 'fa' ? '' : '?lang=' . rawurlencode($landingHeaderLang);
$landingHeaderHome = '/' . $landingHeaderQuery;
$landingHeaderCurrentPath = $landingHeaderStandalone ? '/meta-verification.php' : '/';
$landingHeaderSection = static function(string $id) use ($landingHeaderStandalone, $landingHeaderHome): string {
 return $landingHeaderStandalone ? $landingHeaderHome . '#' . $id : '#' . $id;
};
$landingHeaderLocale = static function(string $locale) use ($landingHeaderCurrentPath): string {
 return $landingHeaderCurrentPath . ($locale === 'fa' ? '' : '?lang=' . rawurlencode($locale));
};
$landingHeaderEscape = static fn($value): string => htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$landingHeaderBrandHref = $landingHeaderStandalone ? $landingHeaderHome : '#top';
$landingHeaderLogo = '/landing-assets/images/logo-mark.svg';
$landingHeaderLogoPath = __DIR__ . '/../landing-assets/images/logo-mark.svg';
if (!empty($magicPerfLabStable) && is_file($landingHeaderLogoPath)) {
 $landingHeaderLogoBytes = @file_get_contents($landingHeaderLogoPath);
 if (is_string($landingHeaderLogoBytes)) $landingHeaderLogo = 'data:image/svg+xml;base64,' . base64_encode($landingHeaderLogoBytes);
}
?>
<header class="topbar" id="topbar">
<div class="shell topbar-inner">
<a aria-label="Magic Super Manager" class="brand" href="<?= $landingHeaderEscape($landingHeaderBrandHref) ?>">
<img alt="" class="brand-mark" width="46" height="46" src="<?= $landingHeaderEscape($landingHeaderLogo) ?>"<?= !empty($magicPerfLabLogo) ? ' fetchpriority="high"' : '' ?>/>
<span class="brand-copy"><b>Magic Super Manager</b><small><?= $landingHeaderEscape($landingHeaderT['tagline']) ?></small></span>
</a>
<nav aria-label="<?= $landingHeaderEscape($landingHeaderT['main']) ?>" class="desktop-nav">
<a href="<?= $landingHeaderEscape($landingHeaderSection('features')) ?>"><?= $landingHeaderEscape($landingHeaderT['features']) ?></a>
<a href="<?= $landingHeaderEscape($landingHeaderSection('use-cases')) ?>"><?= $landingHeaderEscape($landingHeaderT['use_cases']) ?></a>
<a href="<?= $landingHeaderEscape($landingHeaderSection('studio-publisher')) ?>"><?= $landingHeaderEscape($landingHeaderT['publishing']) ?></a>
<a href="<?= $landingHeaderEscape($landingHeaderSection('smart-direct')) ?>"><?= $landingHeaderEscape($landingHeaderT['smart_direct']) ?></a>
<a href="/help/<?= $landingHeaderEscape($landingHeaderQuery) ?>"><?= $landingHeaderEscape($landingHeaderT['help']) ?></a>
<a class="nav-contact-link" href="<?= $landingHeaderEscape($landingHeaderSection('contact')) ?>"><?= $landingHeaderEscape($landingHeaderT['contact']) ?></a>
</nav>
<div class="top-actions">
<div class="landing-language-switcher" data-landing-language>
  <button class="landing-language-button" type="button" data-landing-language-button aria-label="<?= $landingHeaderEscape($landingHeaderT['language']) ?>" aria-expanded="false" aria-controls="landingLanguageMenu">
    <img src="/assets/images/flags/<?= $landingHeaderEscape($landingHeaderLang) ?>.svg" alt="" width="22" height="22"/>
    <span class="landing-language-chevron" aria-hidden="true">⌄</span>
  </button>
  <div id="landingLanguageMenu" class="landing-language-menu" data-landing-language-menu hidden>
    <a href="<?= $landingHeaderEscape($landingHeaderLocale('fa')) ?>" lang="fa" dir="rtl" class="<?= $landingHeaderLang==='fa'?'is-active':'' ?>"><img src="/assets/images/flags/fa.svg" alt="" width="21" height="21" loading="lazy" decoding="async" fetchpriority="low"/> فارسی</a>
    <a href="<?= $landingHeaderEscape($landingHeaderLocale('en')) ?>" lang="en" dir="ltr" class="<?= $landingHeaderLang==='en'?'is-active':'' ?>"><img src="/assets/images/flags/en.svg" alt="" width="21" height="21" loading="lazy" decoding="async" fetchpriority="low"/> English</a>
    <a href="<?= $landingHeaderEscape($landingHeaderLocale('ar')) ?>" lang="ar" dir="rtl" class="<?= $landingHeaderLang==='ar'?'is-active':'' ?>"><img src="/assets/images/flags/ar.svg" alt="" width="21" height="21" loading="lazy" decoding="async" fetchpriority="low"/> العربية</a>
  </div>
</div>
<a class="mini-cta header-login-btn" href="/login<?= $landingHeaderEscape($landingHeaderQuery) ?>" aria-label="<?= $landingHeaderEscape($landingHeaderT['login_aria']) ?>" title="<?= $landingHeaderEscape($landingHeaderT['login_title']) ?>"><span class="header-login-dot" aria-hidden="true"></span><span><?= $landingHeaderEscape($landingHeaderT['login']) ?></span></a>
<button aria-label="<?= $landingHeaderEscape($landingHeaderT['theme']) ?>" class="theme-toggle" id="themeToggle" type="button"><span class="sun">☼</span><i></i><span class="moon">☾</span></button>
<button aria-controls="mobileMenu" aria-expanded="false" aria-label="<?= $landingHeaderEscape($landingHeaderT['mobile_open']) ?>" data-label-open="<?= $landingHeaderEscape($landingHeaderT['mobile_open']) ?>" data-label-close="<?= $landingHeaderEscape($landingHeaderT['mobile_close']) ?>" class="mobile-menu-toggle" id="mobileMenuToggle" type="button"><span></span><span></span><span></span></button>
</div>
</div>
<button aria-label="<?= $landingHeaderEscape($landingHeaderT['close']) ?>" class="mobile-menu-backdrop" hidden="" id="mobileMenuBackdrop" type="button"></button>
<nav aria-label="<?= $landingHeaderEscape($landingHeaderT['mobile_nav']) ?>" class="mobile-menu-panel" hidden="" id="mobileMenu">
<div class="mobile-menu-head"><span class="mobile-menu-spark">✦</span><div><b><?= $landingHeaderEscape($landingHeaderT['quick']) ?></b><small><?= $landingHeaderEscape($landingHeaderT['quick_desc']) ?></small></div><span class="mobile-menu-live"><i></i> <?= $landingHeaderEscape($landingHeaderT['active']) ?></span></div>
<div class="mobile-menu-links">
<a href="<?= $landingHeaderEscape($landingHeaderSection('features')) ?>"><span>01</span><div><b><?= $landingHeaderEscape($landingHeaderT['features']) ?></b><small><?= $landingHeaderEscape($landingHeaderT['features_desc']) ?></small></div><i>←</i></a>
<a href="<?= $landingHeaderEscape($landingHeaderSection('use-cases')) ?>"><span>02</span><div><b><?= $landingHeaderEscape($landingHeaderT['use_cases']) ?></b><small><?= $landingHeaderEscape($landingHeaderT['use_cases_desc']) ?></small></div><i>←</i></a>
<a href="<?= $landingHeaderEscape($landingHeaderSection('studio-publisher')) ?>"><span>03</span><div><b><?= $landingHeaderEscape($landingHeaderT['publishing']) ?></b><small><?= $landingHeaderEscape($landingHeaderT['publishing_desc']) ?></small></div><i>←</i></a>
<a href="<?= $landingHeaderEscape($landingHeaderSection('smart-direct')) ?>"><span>04</span><div><b><?= $landingHeaderEscape($landingHeaderT['smart_direct']) ?></b><small><?= $landingHeaderEscape($landingHeaderT['smart_desc']) ?></small></div><i>←</i></a>
<a href="<?= $landingHeaderEscape($landingHeaderSection('contact')) ?>"><span>05</span><div><b><?= $landingHeaderEscape($landingHeaderT['contact']) ?></b><small><?= $landingHeaderEscape($landingHeaderT['contact_desc']) ?></small></div><i>←</i></a>
<a href="/help/<?= $landingHeaderEscape($landingHeaderQuery) ?>"><span>06</span><div><b><?= $landingHeaderEscape($landingHeaderT['help_center']) ?></b><small><?= $landingHeaderEscape($landingHeaderT['help_desc']) ?></small></div><i>←</i></a>
</div>
<a class="mobile-menu-cta" href="https://go.magics.site/login<?= $landingHeaderEscape($landingHeaderQuery) ?>"><span><?= $landingHeaderEscape($landingHeaderT['start']) ?></span><b><?= $landingHeaderEscape($landingHeaderT['free']) ?></b><i>←</i></a>
</nav>
</header>