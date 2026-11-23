<?php
declare(strict_types=1);
// Render the public guest page in a fresh process: no database or network required.
if (($argv[1] ?? '') === '--render') {
    $_GET = ['lang' => $argv[2]];
    $_COOKIE = [];
    $_SERVER['REQUEST_URI'] = '/?lang='.$argv[2];
    $_SERVER['REQUEST_METHOD'] = 'GET';
    require dirname(__DIR__).'/landing.php';
    exit;
}
function seoAssert(bool $ok, string $message): void {
    if (!$ok) throw new RuntimeException($message);
}
function seoMetaValue(string $html, string $selector): string {
    preg_match_all('~<meta\\b[^>]*>~i',$html,$tags);
    foreach($tags[0] as $tag){
        if(!preg_match('~\\b(?:name|property)="'.preg_quote($selector,'~').'"~i',$tag))continue;
        if(preg_match('~\\bcontent="([^"]*)"~i',$tag,$content))
            return html_entity_decode($content[1],ENT_QUOTES|ENT_HTML5,'UTF-8');
    }
    return '';
}
$ogImageUrl='https://go.magics.site/landing-assets/images/msm-social-preview.jpg';
$ogImageSize=@getimagesize(dirname(__DIR__).'/landing-assets/images/msm-social-preview.jpg');
seoAssert(is_array($ogImageSize)&&$ogImageSize[0]===1200&&$ogImageSize[1]===630,'OG preview image must be a real 1200x630 image');
seoAssert(($ogImageSize['mime'] ?? '') === 'image/jpeg', 'OG preview image file MIME must match image/jpeg metadata');
$sitemap=(string)file_get_contents(dirname(__DIR__).'/sitemap.xml');
if(substr_count($sitemap,'<lastmod>2026-11-23</lastmod>')!==3)
    throw new RuntimeException('Landing sitemap lastmod dates are stale');
if(str_contains($sitemap,'<lastmod>2026-10-29</lastmod>'))
    throw new RuntimeException('Old landing sitemap lastmod remains');

$landingSource=(string)file_get_contents(dirname(__DIR__).'/landing.php');
seoAssert(preg_match('~\$landingFallbackJson\s*=\s*<<<\'MAGIC_LANDING_DICTIONARY\'\R(.*?)\R MAGIC_LANDING_DICTIONARY;~s',$landingSource,$dictionaryMatch)===1,'Translation dictionary heredoc missing');
$translationDictionary=json_decode($dictionaryMatch[1],true,512,JSON_THROW_ON_ERROR);
$englishTranslations=$translationDictionary['en']??null;
$arabicTranslations=$translationDictionary['ar']??null;
seoAssert(is_array($englishTranslations)&&is_array($arabicTranslations),'English/Arabic translation dictionaries missing');
seoAssert(count($englishTranslations)===770&&count($arabicTranslations)===770,'Expected 770 translations in English and Arabic');
$englishKeys=array_keys($englishTranslations);$arabicKeys=array_keys($arabicTranslations);
sort($englishKeys,SORT_STRING);sort($arabicKeys,SORT_STRING);
seoAssert($englishKeys===$arabicKeys,'English and Arabic translation keys do not match');
$intentionalSpacingTokens=0;
foreach($englishTranslations as $sourceText=>$englishText){
    $arabicText=$arabicTranslations[$sourceText]??null;
    seoAssert(is_string($englishText)&&is_string($arabicText),'Translation value must be a string: '.$sourceText);
    if(trim($englishText)===''||trim($arabicText)===''){
        seoAssert($sourceText===' رو '&&$englishText===' '&&$arabicText===' ','Unexpected blank translation: '.$sourceText);
        $intentionalSpacingTokens++;
    }
    seoAssert(!preg_match('/[\x{0600}-\x{06FF}]/u',$englishText),'Persian/Arabic text leaked into English translation: '.$sourceText);
    seoAssert(!preg_match('/[پچژگکی]/u',$arabicText),'Persian-only characters leaked into Arabic translation: '.$sourceText);
}
seoAssert($intentionalSpacingTokens===1,'Unexpected count of intentional spacing tokens');
foreach (['fa','en','ar'] as $language) {
    $command = escapeshellarg(PHP_BINARY).' '.escapeshellarg(__FILE__).' --render '.escapeshellarg($language);
    $lines = []; $status = 0;
    exec($command, $lines, $status);
    $html = implode("\n", $lines);
    seoAssert($status === 0, $language.' guest render failed');
    preg_match_all('~<script\b([^>]*)>(.*?)</script>~is',$html,$scriptMatches,PREG_SET_ORDER);
    $checkedInlineScripts=0;
    foreach($scriptMatches as $scriptMatch){
        $attributes=$scriptMatch[1];$javascript=trim($scriptMatch[2]);
        if($javascript===''||preg_match('~\bsrc\s*=~i',$attributes))continue;
        if(preg_match('~\btype\s*=\s*["\']([^"\']+)~i',$attributes,$typeMatch)
            &&!in_array(strtolower($typeMatch[1]),['text/javascript','application/javascript','module'],true))continue;
        $temporaryJs=tempnam(sys_get_temp_dir(),'magic-landing-js-');
        seoAssert(is_string($temporaryJs)&&$temporaryJs!=='','Could not create temporary JavaScript file');
        file_put_contents($temporaryJs,$javascript);
        $nodeOutput=[];$nodeStatus=0;
        exec('node --check '.escapeshellarg($temporaryJs).' 2>&1',$nodeOutput,$nodeStatus);
        @unlink($temporaryJs);
        seoAssert($nodeStatus===0,$language.' inline JavaScript syntax failed: '.implode("\n",$nodeOutput));
        $checkedInlineScripts++;
    }
    seoAssert($checkedInlineScripts>0,$language.' no inline JavaScript blocks were syntax-checked');
    echo 'PASS inline JavaScript syntax: '.$language.' ('.$checkedInlineScripts." blocks)\n";
    $canonical = 'https://go.magics.site/'.($language === 'fa' ? '' : '?lang='.$language);
    $expectedTitles=[
        'fa'=>'مدیریت اینستاگرام و پیام‌رسان‌ها | فروشگاه‌ساز مجیک',
        'en'=>'Instagram & Messaging Management | Magic Store Builder',
        'ar'=>'إدارة إنستغرام والرسائل | منشئ المتاجر من مجيك',
    ];
    $expectedDescriptions=[
        'fa'=>'اینستاگرام، تلگرام، بله و روبیکا را یکجا مدیریت کن؛ فروشگاه‌ساز چندکاناله، پاسخ‌گوی هوشمند، مرکز ارتباط+ و اتصال Google Drive و Google Sheets با هوش مصنوعی.',
        'en'=>'Manage Instagram, Telegram, Bale and Rubika together. Build a multichannel store, automate replies, and manage orders with Google Drive, Sheets and AI.',
        'ar'=>'أدر إنستغرام وتيليغرام وBale وRubika من مكان واحد. أنشئ متجراً متعدد القنوات، وأتمت الردود والطلبات، واربط Google Drive وSheets بالذكاء الاصطناعي.',
    ];
    seoAssert(str_contains($html, '<link rel="canonical" href="'.$canonical.'"'), $language.' canonical mismatch');
    foreach (['fa-IR'=>'https://go.magics.site/','en'=>'https://go.magics.site/?lang=en','ar'=>'https://go.magics.site/?lang=ar','x-default'=>'https://go.magics.site/'] as $code=>$url)
        seoAssert(str_contains($html, 'hreflang="'.$code.'" href="'.$url.'"'), $language.' missing alternate '.$code);
    seoAssert((bool)preg_match('~<html[^>]+dir="'.($language==='en'?'ltr':'rtl').'"[^>]+lang="'.$language.'"~', $html), $language.' direction/language mismatch');
    seoAssert(str_contains($html, 'name="robots" content="index,follow,'), $language.' indexing directive changed');
    seoAssert(preg_match_all('~<h1\b~', $html) === 1, $language.' must have one H1');
    preg_match('~<title>(.*?)</title>~s', $html, $title);
    $renderedTitle=html_entity_decode($title[1]??'',ENT_QUOTES|ENT_HTML5,'UTF-8');
    seoAssert($renderedTitle===$expectedTitles[$language],$language.' localized title mismatch');
    seoAssert(seoMetaValue($html,'description')===$expectedDescriptions[$language],$language.' localized meta description mismatch');
    seoAssert(seoMetaValue($html,'og:title')===$expectedTitles[$language],$language.' Open Graph title mismatch');
    seoAssert(seoMetaValue($html,'og:description')===$expectedDescriptions[$language],$language.' Open Graph description mismatch');
    seoAssert(seoMetaValue($html,'og:image')===$ogImageUrl,$language.' Open Graph image URL mismatch');
    seoAssert(seoMetaValue($html,'og:image:secure_url')===$ogImageUrl,$language.' Open Graph secure image URL mismatch');
    seoAssert(seoMetaValue($html,'og:image:type')==='image/jpeg',$language.' Open Graph image MIME type mismatch');
    seoAssert(seoMetaValue($html,'og:image:alt')===$expectedTitles[$language],$language.' Open Graph image alt mismatch');
    seoAssert(seoMetaValue($html,'og:image:width')==='1200'&&seoMetaValue($html,'og:image:height')==='630',$language.' Open Graph image dimensions missing');
    seoAssert(seoMetaValue($html,'twitter:title')===$expectedTitles[$language],$language.' Twitter title mismatch');
    seoAssert(seoMetaValue($html,'twitter:description')===$expectedDescriptions[$language],$language.' Twitter description mismatch');
    seoAssert(seoMetaValue($html,'twitter:image')===$ogImageUrl,$language.' Twitter image URL mismatch');
    seoAssert(seoMetaValue($html,'twitter:image:alt')===$expectedTitles[$language],$language.' Twitter image alt mismatch');
    seoAssert(seoMetaValue($html,'twitter:card')==='summary_large_image',$language.' Twitter card type mismatch');
    preg_match('~<script type="application/ld\+json">(.*?)</script>~s', $html, $match);
    $schema = json_decode($match[1] ?? '', true, 512, JSON_THROW_ON_ERROR);
    $nodes = [];
    foreach ($schema['@graph'] as $node) $nodes[$node['@type']]=$node;
    foreach(['Organization','WebSite','WebPage','SoftwareApplication','FAQPage'] as $type)
        seoAssert(isset($nodes[$type]),$language.' missing '.$type.' schema node');
    $faqItems=$nodes['FAQPage']['mainEntity']??[];
    seoAssert(is_array($faqItems)&&count($faqItems)===15,$language.' FAQ schema must contain all 15 questions');
    foreach($faqItems as $faqItem)
        seoAssert(trim((string)($faqItem['name']??''))!==''&&trim((string)($faqItem['acceptedAnswer']['text']??''))!=='',$language.' FAQ question or answer is empty');
    seoAssert($nodes['WebPage']['url'] === $canonical, $language.' schema URL mismatch');
    seoAssert($nodes['WebPage']['@id'] === $canonical.'#webpage', $language.' schema identity mismatch');
    seoAssert($nodes['WebPage']['name'] === html_entity_decode($title[1], ENT_QUOTES|ENT_HTML5, 'UTF-8'), $language.' schema title differs from page title');
    seoAssert($nodes['WebPage']['about']['@id'] === $nodes['SoftwareApplication']['@id'], $language.' broken schema reference');
    seoAssert($nodes['WebPage']['isPartOf']['@id'] === $nodes['WebSite']['@id'], $language.' broken website reference');
    seoAssert($nodes['WebPage']['inLanguage'] === ($language==='fa'?'fa-IR':$language), $language.' schema language mismatch');
    $schemaLanguage = $language==='fa'?'fa-IR':$language;
    $expectedKeywordCounts=['fa'=>17,'en'=>17,'ar'=>15];
    $schemaKeywords=$nodes['WebPage']['keywords']??null;
    seoAssert(is_array($schemaKeywords)&&count($schemaKeywords)===$expectedKeywordCounts[$language],$language.' schema keywords must be split into localized terms');
    seoAssert(($nodes['SoftwareApplication']['keywords']??null)===$schemaKeywords,$language.' application schema keywords mismatch');
    seoAssert($nodes['WebSite']['inLanguage'] === $schemaLanguage, $language.' website schema language mismatch');
    seoAssert($nodes['SoftwareApplication']['inLanguage'] === $schemaLanguage, $language.' application schema language mismatch');
    seoAssert($nodes['FAQPage']['@id'] === $canonical.'#faq', $language.' FAQ schema identity mismatch');
    seoAssert(($nodes['WebPage']['primaryImageOfPage']['url']??'')===$ogImageUrl,$language.' schema primary image URL mismatch');
    seoAssert(($nodes['WebPage']['primaryImageOfPage']['width']??0)===1200&&($nodes['WebPage']['primaryImageOfPage']['height']??0)===630,$language.' schema primary image dimensions mismatch');
    seoAssert(($nodes['WebPage']['dateModified']??'')==='2026-11-23',$language.' schema dateModified mismatch');
    seoAssert(($nodes['WebPage']['description']??'')===$expectedDescriptions[$language],$language.' schema description mismatch');
    seoAssert(str_contains($html, 'support-embed.js') === ($language==='fa'), $language.' support visibility changed');
    if ($language==='en') seoAssert(!preg_match('/[\x{0600}-\x{06FF}]/u', $match[1]), 'English schema contains Persian/Arabic text');
    if ($language==='ar') seoAssert(!preg_match('/[پچژگکی]/u', $match[1]), 'Arabic schema contains Persian letters');
    preg_match('~<div class="weekdays">(.*?)</div>~s', $html, $week);
    preg_match_all('~<span>(.*?)</span>~s', $week[1] ?? '', $days);
    $expected=['fa'=>['ش','ی','د','س','چ','پ','ج'],'en'=>['Sa','Su','Mo','Tu','We','Th','Fr'],'ar'=>['س','ح','ن','ث','ر','خ','ج']];
    seoAssert($days[1] === $expected[$language], $language.' calendar weekdays corrupted');
    echo 'PASS guest landing metadata, schema, language links and weekdays: '.$language."\n";
}
