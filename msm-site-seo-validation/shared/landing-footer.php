<?php
$landingFooterLang = isset($landingLanguage) && in_array($landingLanguage, ['fa','en','ar'], true) ? $landingLanguage : 'fa';
$landingFooterStandalone = !empty($landingFooterStandalone);
$landingFooterCopy = [
 'fa'=>['tagline'=>'محتوا · انتشار · اتوماسیون · مخاطب','features'=>'قابلیت‌ها','contact'=>'ارتباط با ما','free'=>'رایگان شروع کن','copyright'=>'© 2026 Magics'],
 'en'=>['tagline'=>'Content · Publishing · Automation · Audience','features'=>'Features','contact'=>'Contact Us','free'=>'Get Started for Free','copyright'=>'© 2026 Magics'],
 'ar'=>['tagline'=>'المحتوى · النشر · الأتمتة · الجمهور','features'=>'المزايا','contact'=>'تواصل معنا','free'=>'ابدأ مجاناً','copyright'=>'© 2026 Magics']
];
$landingFooterT = $landingFooterCopy[$landingFooterLang];
$landingFooterQuery = $landingFooterLang === 'fa' ? '' : '?lang=' . rawurlencode($landingFooterLang);
$landingFooterHome = '/' . $landingFooterQuery;
$landingFooterPath = $landingFooterStandalone ? '/meta-verification.php' : '/';
$landingFooterLocale = static function(string $locale) use ($landingFooterPath): string {
 return $landingFooterPath . ($locale === 'fa' ? '' : '?lang=' . rawurlencode($locale));
};
$landingFooterAnchor = static function(string $id) use ($landingFooterStandalone, $landingFooterHome): string {
 return $landingFooterStandalone ? $landingFooterHome . '#' . $id : '#' . $id;
};
$landingFooterEscape = static fn($value): string => htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
?>
<footer class="footer">
<div class="shell footer-inner"><a class="brand compact" href="<?= $landingFooterStandalone ? $landingFooterHome : '#top' ?>"><img alt="" src="/landing-assets/images/logo-mark.svg"/><span><b>Magic Super Manager</b><small><?= $landingFooterEscape($landingFooterT['tagline']) ?></small></span></a><div><span><?= $landingFooterEscape($landingFooterT['copyright']) ?></span><a href="<?= $landingFooterEscape($landingFooterAnchor('features')) ?>"><?= $landingFooterEscape($landingFooterT['features']) ?></a><a href="<?= $landingFooterEscape($landingFooterAnchor('contact')) ?>"><?= $landingFooterEscape($landingFooterT['contact']) ?></a><a href="/login<?= $landingFooterEscape($landingFooterQuery) ?>"><?= $landingFooterEscape($landingFooterT['free']) ?></a><a href="<?= $landingFooterEscape($landingFooterLocale('en')) ?>" lang="en" dir="ltr">English</a><a href="<?= $landingFooterEscape($landingFooterLocale('ar')) ?>" lang="ar" dir="rtl">العربية</a></div></div>
</footer>