<?php
/* MAGIC-DEPLOY-LANDING-SEO-20261122-R2 */
/* MAGIC-DEPLOY-LANDING-CTA-20261122-R3 */
// The public product landing remains available to signed-in and signed-out visitors.
// Authenticated dashboard access is handled separately at /dashboard.
header('Cache-Control: private, no-store, no-cache, must-revalidate, max-age=0');
// Canonical public landing entrypoint; performance-lab requests remain noindex.
$landingPreviewOnly = false; // The standalone preview remains isolated in landing0.php.
$landingNoIndex = $landingPreviewOnly || array_key_exists('magic_perf_lab', $_GET);
if ($landingNoIndex) header('X-Robots-Tag: noindex, nofollow');
// Landing is intentionally independent from authenticated panel session state.
$landingLanguage = strtolower(trim((string)($_GET['lang'] ?? 'fa')));
if (!in_array($landingLanguage, ['fa','en','ar'], true)) $landingLanguage='fa';
$landingSeoTitleByLanguage = [
    'fa' => 'مدیریت اینستاگرام و پیام‌رسان‌ها | فروشگاه‌ساز مجیک',
    'en' => 'Instagram & Messaging Management | Magic Store Builder',
    'ar' => 'إدارة إنستغرام والرسائل | منشئ المتاجر من مجيك',
];
$landingSeoDescriptionByLanguage = [
    'fa' => 'اینستاگرام، تلگرام، بله و روبیکا را یکجا مدیریت کن؛ فروشگاه‌ساز چندکاناله، پاسخ‌گوی هوشمند، مرکز ارتباط+ و اتصال Google Drive و Google Sheets با هوش مصنوعی.',
    'en' => 'Manage Instagram, Telegram, Bale and Rubika together. Build a multichannel store, automate replies, and manage orders with Google Drive, Sheets and AI.',
    'ar' => 'أدر إنستغرام وتيليغرام وBale وRubika من مكان واحد. أنشئ متجراً متعدد القنوات، وأتمت الردود والطلبات، واربط Google Drive وSheets بالذكاء الاصطناعي.',
];
$landingSeoTitle = $landingSeoTitleByLanguage[$landingLanguage];
$landingSeoDescription = $landingSeoDescriptionByLanguage[$landingLanguage];
$landingSeoKeywordsByLanguage = [
    'fa' => 'مدیریت اینستاگرام، فروشگاه‌ساز چندکاناله، فروشگاه‌ساز اینستاگرام، فروشگاه‌ساز تلگرام، فروشگاه‌ساز بله، فروشگاه‌ساز روبیکا، پاسخگوی هوشمند تلگرام، پاسخگوی هوشمند بله، پاسخگوی هوشمند روبیکا، مرکز ارتباط یکپارچه، اتوماسیون دایرکت، اتصال Google Drive، اتصال Google Sheets، Google Workspace، Magic MCP، ChatGPT، Claude',
    'en' => 'Instagram management, multichannel store builder, Instagram store builder, Telegram store builder, Bale store builder, Rubika store builder, Telegram AI responder, Bale AI responder, Rubika AI responder, unified inbox, DM automation, Google Drive integration, Google Sheets integration, Google Workspace, Magic MCP, ChatGPT, Claude',
    'ar' => 'إدارة إنستغرام، منشئ متجر متعدد القنوات، متجر إنستغرام، متجر تيليغرام، متجر بله، متجر روبيكا، ردود ذكية لتيليغرام وبله وروبيكا، صندوق وارد موحد، أتمتة الرسائل الخاصة، ربط Google Drive، ربط Google Sheets، Google Workspace، Magic MCP، ChatGPT، Claude'
];
$landingSeoKeywords = $landingSeoKeywordsByLanguage[$landingLanguage];
$landingServices = [
    'telegram' => [
        'fa' => ['تلگرام', 'ربات تلگرام را به مجیک وصل کن و کانالت را اضافه کن. خبر را فوری منتشر کن یا برای زمان دلخواه برنامه‌ریزی کن.'],
        'en' => ['Telegram', 'Connect your Telegram bot and add your channel. Publish news immediately or schedule it for later.'],
        'ar' => ['تيليغرام', 'اربط بوت تيليغرام بمجيك وأضف قناتك. انشر الأخبار فوراً أو جدولها للوقت الذي تختاره.'],
    ],
    'bale' => [
        'fa' => ['بله', 'ربات و کانال بله را وصل کن. اطلاعیه را فوری یا زمان‌بندی‌شده در کانال منتشر کن و پیام‌های ربات را از مرکز ارتباط+ پاسخ بده.'],
        'en' => ['Bale', 'Connect your Bale bot and channel. Publish announcements immediately or on a schedule, and reply to bot messages in Communication+.'],
        'ar' => ['بله', 'اربط بوت بله وقناتك. انشر الإعلانات فوراً أو في موعد محدّد وأجب عن رسائل البوت من مركز التواصل+.'],
    ],
    'rubika' => [
        'fa' => ['روبیکا', 'ربات روبیکا را وصل کن و کانالت را به مقصدهای انتشار اضافه کن. متن و تصویر را فوری بفرست یا زمان انتشارشان را تعیین کن.'],
        'en' => ['Rubika', 'Connect your Rubika bot and add your channel as a destination. Publish text and photos immediately or set a publishing time.'],
        'ar' => ['روبيكا', 'اربط بوت روبيكا وأضف قناتك كوجهة للنشر. انشر النصوص والصور فوراً أو حدّد موعد نشرها.'],
    ],
    'sheets' => [
        'fa' => ['گوگل‌شیت', 'پاسخ‌های فرم یا دایرکت را در ستون‌های شیت ثبت کن. با شمارهٔ تماس، ردیف قبلی را پیدا کن و وضعیت سفارش را تغییر بده.'],
        'en' => ['Google Sheets', 'Map form or DM answers to sheet columns. Look up a row by phone number and update its order status.'],
        'ar' => ['جداول Google', 'احفظ إجابات النموذج أو الرسائل الخاصة في أعمدة الجدول. ابحث برقم الهاتف عن الصف وحدّث حالة الطلب.'],
    ],
    'drive' => [
        'fa' => ['گوگل‌درایو', 'حساب گوگل را وصل کن و فایل شیت موردنیاز را از درایو انتخاب کن. جریان با همان فایل انتخابی کار می‌کند.'],
        'en' => ['Google Drive', 'Connect your Google account and choose a spreadsheet from Drive. Your flow works with the file you selected.'],
        'ar' => ['Google Drive', 'اربط حساب Google واختر ملف جدول البيانات المطلوب من Drive ليستخدم المسار الملف الذي حددته.'],
    ],
];
$landingServiceIcons = [
    'instagram' => '<svg width="32" height="32" viewBox="0 0 48 48" aria-hidden="true"><rect x="7" y="7" width="34" height="34" rx="10" fill="none" stroke="#D65B9B" stroke-width="3.5"/><circle cx="24" cy="24" r="8" fill="none" stroke="#D65B9B" stroke-width="3.5"/><circle cx="34" cy="14" r="2.4" fill="#D65B9B"/></svg>',
    'telegram' => '<svg width="32" height="32" viewBox="0 0 48 48" aria-hidden="true"><circle cx="24" cy="24" r="24" fill="#229ED9"/><path fill="white" d="m10 23 27-11c1.2-.5 2 .2 1.7 1.7l-4.4 21.5c-.3 1.5-1.3 1.8-2.5 1l-9-6.7 10.1-10.2c.6-.6.2-.9-.5-.5L19 27.3l-8.5-2.6c-1.6-.5-1.7-1.1-.5-1.7Z"/></svg>',
    'bale' => '<img src="/assets/images/brands/bale.svg" width="36" height="36" alt="">',
    'rubika' => '<img src="/assets/images/brands/rubika.svg" width="36" height="36" alt="">',
    'sheets' => '<svg width="32" height="32" viewBox="0 0 48 48" aria-hidden="true"><path fill="#0f9d58" d="M9 3h21l10 10v32H9z"/><path fill="#87ceac" d="M30 3v11h10z"/><path fill="none" stroke="white" stroke-width="2" d="M16 21h17v14H16zM16 26h17m-17 4h17m-10-9v14"/></svg>',
    'drive' => '<svg width="32" height="32" viewBox="0 0 48 48" aria-hidden="true"><path fill="#00832d" d="M3 33h14l-7 12z"/><path fill="#34a853" d="M3 33 17 8l7 12-7 13z"/><path fill="#188038" d="M17 8h14l-7 12z"/><path fill="#fbbc04" d="M31 8 45 33H31L24 20z"/><path fill="#ea4335" d="m45 33-7 12-7-12z"/><path fill="#4285f4" d="M17 33h14l7 12H10z"/></svg>',
];
$landingDirection = $landingLanguage==='en' ? 'ltr' : 'rtl';
// The Persian contact stays unchanged; EN/AR share the international direct line.
$landingContactNumber = $landingLanguage==='fa' ? '+989354554125' : '+4917664211849';
$landingWhatsappNumber = ltrim($landingContactNumber,'+');
$landingTranslations = [];
if ($landingLanguage!=='fa') {
    // Self-contained translation fallback: this file already exists on Production.
    // The Deploy Bridge may not create newly introduced language asset paths.
    $landingFallbackJson=<<<'MAGIC_LANDING_DICTIONARY'
{"en":{"مدیریت هوشمند، از محتوا تا مخاطب":"Smarter management, from content to customers","قابلیت‌ها":"Features","کاربردها":"Use Cases","محتوا و انتشار":"Content & Publishing","دایرکت هوشمند":"Smart Direct","راهنما":"Help","ارتباط با ما":"Contact Us","ورود":"Log In","دسترسی سریع":"Quick Access","هر بخش را مستقیم ببین":"Go straight to any section","فعال":"Active","چیزی که برای کار روزمره لازم داری":"Everything you need for everyday work","فروش، پشتیبانی و جذب مخاطب":"Sales, support and lead generation","از ایده تا انتشار یا زمان‌بندی":"From idea to publishing or scheduling","هر تعامل، شروع یک مسیر هوشمند":"Every interaction begins a smarter journey","پیام مستقیم، تلگرام، واتساپ و تماس":"Direct messages, Telegram, WhatsApp and calls","مرکز راهنما":"Help Center","آموزش، FAQ و پاسخ خطاهای رایج":"Tutorials, FAQs and troubleshooting","شروع ساده و بدون تعهد":"Start easily, with no commitment","رایگان شروع کن":"Get Started for Free","نسل جدید مدیریت اینستاگرام با اتوماسیون و هوش مصنوعی":"A new era of Instagram management, powered by AI and automation","محتوای":"Create"," هوشمند":" smart"," بساز!":" content!","گفتگو":"Make conversations"," رو ":" ","هوشمند":"smarter"," کن؛":";","انتشار":"Leave publishing"," رو بسپار به ":" to ","جادو":"Magic","Magic Super Manager یک نرم‌افزار مدیریت پیج و اتوماسیون اینستاگرام است؛ محتوا بساز، انتشار را زمان‌بندی کن، دایرکت هوشمند و پاسخ‌های خودکار را اجرا کن و مخاطبانت را یکجا مدیریت کن.":"Magic Super Manager is an Instagram management and automation platform. Create content, schedule posts, automate DMs and replies, and manage your audience in one place.","دموی زنده را ببین":"Watch the Live Demo","محتوا بساز":"Create Content","تصویر، ویدیو و کپشن":"Images, videos and captions","منتشر کن":"Publish","فوری یا زمان‌بندی‌شده":"Instantly or on a schedule","خودکار کن":"Automate","گفتگو و مدیریت مخاطب":"Conversations and audience management","اتصال رسمی به Instagram / Meta":"Official Instagram / Meta Connection","اتصال از مسیر رسمی متا":"Connect through Meta's official process","بدون نیاز به رمز اینستاگرام":"No Instagram password required","رمز پیج را در سایت ما وارد نمی‌کنی":"You never enter your Instagram password on our site","مدیریت چند پیج از یک محیط":"Manage Multiple Accounts in One Place","حساب‌ها را یکجا مدیریت کن":"Manage all your accounts together","اتوماسیون + هوش مصنوعی + انتشار":"Automation + AI + Publishing","همه در یک سیستم یکپارچه":"Everything in one integrated platform","دموی زنده دایرکت هوشمند":"Live Smart Direct Demo","نمونه واقعی از اجرای یک جریان کامل":"See a complete workflow in action","در حال اجرا":"Running","مجیک سوپر منیجر":"Magic Super Manager","سناریوی سفارش محصول":"Product Order Scenario","ورود از کامنت":"Triggered by a Comment","کاربر زیر پست می‌نویسد: «قیمت»":"A user comments: “Price”","پیام...":"Message…","شروع خودکار":"Automatic Start","هوش مصنوعی":"Artificial Intelligence","سفارش محصول":"Product Order","کامنت تا ثبت سفارش":"From comment to completed order","مشاوره هوشمند":"Smart Consultation","ویس، تصویر و پاسخ هوش مصنوعی":"Voice, images and AI replies","پشتیبانی":"Support","تشخیص مشکل تا پاسخ نهایی":"From issue detection to resolution","مسیر اصلی محصول":"The Core Product Journey","مدیریت پیج اینستاگرام، از تولید محتوا تا اتوماسیون":"Instagram management, from content creation to automation","قبل از جزئیات، کل ماجرا ساده است: محتوا را می‌سازی، منتشر می‌کنی، گفتگوها را خودکار می‌کنی و مخاطبانت را یکجا مدیریت می‌کنی.":"The idea is simple: create content, publish it, automate conversations and manage your audience in one place.","بساز":"Create","محتوا، تصویر، ویدیو و کپشن":"Content, images, videos and captions","فوری یا در زمان مناسب":"Immediately or at the right time","گفتگو را خودکار کن":"Automate Conversations","کامنت، دایرکت و پاسخ‌ها":"Comments, DMs and replies","مخاطب را مدیریت کن":"Manage Your Audience","اطلاعات، وضعیت و پیگیری":"Details, status and follow-up","دموی تعاملی":"Interactive Demo","کامنت به دایرکت؛ یک تعامل چطور به مسیر واقعی تبدیل می‌شود؟":"Comment to DM: how one interaction becomes a real workflow","بدون توضیح طولانی؛ مسیر را اجرا کن و ببین Magic از اولین تعامل تا اقدام نهایی چه کاری انجام می‌دهد.":"No lengthy explanation. Run the demo to see how Magic turns the first interaction into an outcome.","کامنت → دایرکت → اقدام":"Comment → DM → Action","نمونه ساده از یک اتوماسیون واقعی":"A simple example of real automation","▶ اجرای دمو":"▶ Run Demo","کاربر کامنت می‌گذارد":"A user leaves a comment","«قیمت رو بفرست»":"“Send me the price”","Magic تعامل را تشخیص می‌دهد":"Magic detects the interaction","شروع خودکار مسیر فروش":"The sales workflow starts automatically","دایرکت هوشمند ارسال می‌شود":"A smart DM is sent","پاسخ مناسب برای همان مخاطب":"A tailored reply for that person","گفتگو ادامه پیدا می‌کند":"The conversation continues","سؤال، پاسخ و تصمیم هوشمند":"Questions, answers and smart decisions","کاربر به اقدام نهایی می‌رسد":"The user completes the action","لینک، ثبت‌نام، سفارش یا پیگیری":"Link, sign-up, order or follow-up","نتیجه":"Outcome","یک تعامل ساده، بدون جابه‌جایی بین چند ابزار، به یک مسیر قابل پیگیری تبدیل می‌شود.":"One interaction becomes a trackable journey, without switching between tools.","قابلیت‌های اصلی":"Core Features","ابزارهایی که نتیجه کار را می‌سازند":"The Tools Behind Real Results","به‌جای اصطلاحات فنی، این‌ها همان کارهایی هستند که هر روز برای مدیریت پیج به آن‌ها نیاز داری.":"Forget the jargon. These are the tools you need to manage your Instagram presence every day.","استودیوی هوشمند":"Smart Studio","از یک ایده شروع کن و تصویر، ویدیو و کپشن آماده انتشار را در همان مسیر بساز.":"Turn an idea into publish-ready images, videos and captions in one workflow.","تصویر":"Image","ویدیو":"Video","کپشن":"Caption","انتشار و زمان‌بندی":"Publishing & Scheduling","محتوا را فوری منتشر کن یا برای پست، استوری و ریلز در زمان مناسب برنامه‌ریزی کن.":"Publish now or schedule posts, Stories and Reels for the right moment.","پست":"Post","استوری":"Story","ریلز":"Reels","تعامل مخاطب را به پاسخ، دایرکت و پیگیری خودکار وصل کن تا گفتگو نیمه‌کاره نماند.":"Turn audience interactions into automated replies, DMs and follow-ups.","کامنت":"Comment","دایرکت":"DM","پیگیری":"Follow-up","جریان‌ساز هوشمند":"Visual Workflow Builder","مسیر تعامل را بصری طراحی کن؛ از شروع گفتگو تا اقدام نهایی، بدون پیچیدگی فنی.":"Build visual journeys, from first contact to the final action, without complicated setup.","شروع":"Start","مسیر":"Workflow","اقدام":"Action","صندوق گفتگو":"Unified Inbox","گفتگوهای مخاطبان را یکجا ببین، سریع پاسخ بده و در صورت نیاز به عضو تیم ارجاع بده.":"See all conversations together, reply quickly and hand off to a teammate when needed.","گفتگوها":"Conversations","پاسخ":"Reply","ارجاع":"Handoff","مدیریت مخاطبان":"Contact Management","اطلاعات، وضعیت و سابقه تعامل هر مخاطب را کنار هم نگه دار تا ارتباط دقیق‌تری بسازی.":"Keep contact details, status and interaction history together for more personal service.","اطلاعات":"Information","وضعیت":"Status","تعامل":"Engagement","ابزارهای هوش مصنوعی":"AI Tools","برای ساخت محتوا، پیشنهاد پاسخ و تصمیم‌گیری داخل گفتگو از هوش مصنوعی کمک بگیر.":"Use AI to create content, suggest replies and guide decisions during conversations.","تولید":"Generation","پیشنهاد":"Suggestions","مدیریت چند پیج":"Multi-Account Management","چند حساب اینستاگرام را از یک پنل کنترل کن و بدون پراکندگی بین پیج‌ها جابه‌جا شو.":"Control multiple Instagram accounts from one dashboard.","چند پیج":"Multiple accounts","یک پنل":"One dashboard","مدیریت یکجا":"Centralized control","اتصال تلگرام به اینستاگرام":"Telegram + Instagram Integration","پیام‌ها و لیدهای جریان را به تلگرام بفرست و در سناریوهای Live Reply ادامه پاسخ‌گویی دایرکت را از تلگرام مدیریت کن.":"Forward messages and leads to Telegram and continue Instagram DM replies with Live Reply.","تلگرام":"Telegram","پاسخ هوشمند صوتی":"AI Voice Replies","ویس و پیام صوتی ورودی را با هوش مصنوعی پردازش کن و پاسخ مناسب را به‌صورت صوتی یا متنی برگردان.":"Understand voice messages with AI and respond with audio or text.","ویس":"Voice","پاسخ صوتی":"Voice Reply","سناریوهای واقعی":"Real-World Scenarios","برای چه کارهایی ساخته شده؟":"What can you do with Magic?","هر کسب‌وکار می‌تواند از یک نقطه متفاوت شروع کند؛ مهم این است که مسیر تکراری را به یک سیستم قابل مدیریت تبدیل کنی.":"Every business starts differently. Magic turns repetitive work into a manageable system.","فروش در دایرکت":"Sales Through DMs","از سؤال تا انتخاب و ثبت درخواست":"From inquiry to selection and order","پشتیبانی مشتری":"Customer Support","پاسخ سریع و ارجاع هوشمند":"Fast replies and intelligent handoff","جذب لید":"Lead Generation","جمع‌آوری اطلاعات و پیگیری بعدی":"Collect details and follow up","ارسال خودکار لینک":"Automatic Link Delivery","لینک مناسب بعد از تعامل کاربر":"Send the right link after an interaction","کمپین کامنت → دایرکت":"Comment-to-DM Campaigns","کامنت را به یک مسیر کامل تبدیل کن":"Turn a comment into a complete journey","تولید محتوا":"Content Creation","تصویر، ویدیو و کپشن در یک مسیر":"Images, video and captions in one workflow","زمان‌بندی پست و استوری":"Post & Story Scheduling","انتشار خودکار و منظم محتوای اینستاگرام":"Consistent automated Instagram publishing","پاسخ‌گویی هوشمند":"Intelligent Replies","درک پیام و پاسخ متناسب با گفتگو":"Understand messages and reply in context","اطلاعات و وضعیت هر مخاطب یکجا":"Contact data and status in one place","از ایده تا محتوای آماده انتشار، در یک مسیر":"From Idea to Publish-Ready Content","ایده را وارد کن، تصویر، ویدیو یا کپشن را آماده کن و خروجی را مستقیم به بخش انتشار بفرست؛ بدون دانلود و انتقال دستی بین چند ابزار.":"Enter an idea, create an image, video or caption, then send it directly to publishing—no manual downloads or switching tools.","ساخت تصویر با هوش مصنوعی":"AI Image Creation","ساخت ویدیو":"Video Creation","تولید و بازنویسی کپشن":"Caption Writing & Rewriting","طراحی روی تصویر":"Image Editing & Design","کتابخانه محتوای شما":"Your Content Library","ارسال مستقیم برای انتشار":"Send Straight to Publishing","محیط ساخت و آماده‌سازی محتوا":"Content Creation Workspace","هوش":"AI","رسانه":"Media","متن":"Text","شکل":"Shape","اتوماسیون،":"Automation,","هوشمندتر از همیشه":"Smarter Than Ever","ساخت تصویر":"Create Image","پرامپت":"Prompt","پوستر حرفه‌ای برای معرفی اتوماسیون اینستاگرام، مینیمال و پرمیوم":"A premium minimalist poster promoting Instagram automation","✦ ساخت نمونه":"✦ Generate Sample","ارسال به انتشارگر ←":"Send to Publisher ←","خروجی به انتشارگر منتقل شد ✓":"Sent to Publisher ✓","انتشارگر":"Publisher","تقویم و صف انتشار":"Publishing Calendar & Queue","آماده انتشار":"Ready to Publish","مهر ۱۴۰۵":"October 2026","برنامه محتوایی":"Content Plan","ش":"Sat","ی":"Sun","د":"Mon","س":"Tue","چ":"Wed","پ":"Thu","ج":"Fri","امروز · ۲۰:۳۰":"Today · 20:30","معرفی قابلیت دایرکت هوشمند":"Introducing Smart Direct","ویدیو + کپشن + کاور":"Video + Caption + Cover","زمان‌بندی شد":"Scheduled","فردا · ۱۲:۰۰":"Tomorrow · 12:00","آموزش ساخت اولین جریان هوشمند":"Your First Smart Workflow Tutorial","پست + کاروسل":"Post + Carousel","فردا · ۱۸:۰۰":"Tomorrow · 18:00","معرفی قابلیت‌های هوشمند":"Introducing Smart Features","استوری + دعوت به اقدام":"Story + Call to Action","پیش‌نویس":"Draft","انتشار فوری نمونه":"Try Instant Publishing","برای شبیه‌سازی کلیک کنید":"Click to simulate","وقتی محتوا آماده شد، مستقیم منتشرش کن یا زمان بده":"Publish Now or Schedule for Later","خروجی استودیوی هوشمند همان‌جا وارد بخش انتشار می‌شود؛ مدیا و کپشن آماده‌اند و فقط تصمیم می‌گیری الان منتشر شود یا برای زمان مناسب برنامه‌ریزی شود.":"Your Studio output flows straight into publishing. The media and caption are ready—you decide when to publish.","تصویر و کپشن":"Image & Caption","ویدیو و کاور":"Video & Cover","انتشار سریع":"Quick Publish","دایرکت هوشمند اینستاگرام + جریان‌ساز":"Instagram Smart Direct + Workflow Builder","هر تعامل می‌تواند شروع یک مسیر هوشمند باشد":"Every Interaction Can Start a Smart Journey","دایرکت هوشمند اینستاگرام فراتر از یک ربات دایرکت ساده است؛ یک کامنت، دایرکت یا پاسخ می‌تواند گفتگو را شروع کند، پاسخ خودکار مناسب بفرستد، اطلاعات مخاطب را نگه دارد و مسیر فروش یا پشتیبانی را ادامه دهد. در سناریوهای متصل، می‌توان پیام و لید را به تلگرام فرستاد و ادامه پاسخ‌گویی دایرکت را از پل زنده تلگرام مدیریت کرد.":"Instagram Smart Direct is more than a simple chatbot. A comment, DM or Story reply can trigger a conversation, send a tailored response, save contact details and continue sales or support. Connected flows can forward leads to Telegram for live replies.","از کامنت اولیه تا پیشنهاد و ثبت درخواست":"From the first comment to an offer and order","پشتیبانی هوشمند":"Smart Support","از سؤال کاربر تا پاسخ یا ارجاع مناسب":"From questions to answers or team handoff","جذب مخاطب":"Audience Growth","از درخواست مشاوره تا ثبت اطلاعات و پیگیری":"From consultation request to contact follow-up","جریان‌ساز تصویری":"Visual Workflow Builder","جریان فروش و ثبت سفارش":"Sales & Order Workflow","فروش":"Sales","▶ اجرای مسیر":"▶ Run Workflow","شروع جریان":"Workflow Start","ورود کاربر به سناریوی فعال":"User enters the active scenario","این مرحله چه کاری می‌کند؟":"What happens at this step?","کامنت شامل «قیمت»":"Comment includes “Price”","آماده اجرا":"Ready to Run","روی «اجرای مسیر» بزن یا سناریو را تغییر بده":"Select Run Workflow or choose another scenario","ارتباط هوشمند فراتر از متن":"Smart Communication Beyond Text","اینستاگرام را به تلگرام وصل کن؛ به ویس هم هوشمند جواب بده":"Connect Instagram to Telegram and Answer Voice Messages with AI","دو قابلیت متفاوت اما مکمل: مدیریت ادامه گفتگوهای اینستاگرام از تلگرام، و درک و پاسخ‌گویی هوشمند به پیام‌های صوتی داخل دایرکت.":"Two complementary capabilities: continue Instagram conversations via Telegram, and understand and respond intelligently to voice messages in DMs.","پاسخ دایرکت اینستاگرام از تلگرام":"Reply to Instagram DMs from Telegram","در جریان‌های متصل، پیام یا لید اینستاگرام را به تلگرام بفرست و با پل Live Reply ادامه پاسخ‌گویی را از همان تلگرام به مسیر گفتگو برگردان.":"Forward Instagram messages and leads to Telegram, then use the Live Reply bridge to continue the conversation from Telegram.","پاسخگویی دایرکت در تلگرام":"DM Replies from Telegram","پاسخ و پیگیری لید":"Lead Replies & Follow-Up","دایرکت جدید":"New DM","سلام، شرایط مشاوره چیه؟":"Hi, how does your consultation work?","متصل":"Connected","پیام جدید از اینستاگرام":"New message from Instagram","پاسخ از تلگرام ↗":"Reply via Telegram ↗","پاسخ هوشمند به ویس و صوت در دایرکت":"AI-Powered Voice Replies in DMs","پیام صوتی ورودی را تشخیص بده، محتوای ویس را برای AI قابل فهم کن و در صورت فعال بودن پاسخ صوتی، جواب هوشمند را دوباره به Voice تبدیل کن.":"Detect incoming voice messages, let AI understand them and reply in text or audio when voice replies are enabled.","پاسخ به ویس در دایرکت":"Voice Replies in DMs","پشتیبانی هوشمند صوتی":"Smart Voice Support","پاسخ صوتی AI":"AI Voice Reply","ویس را می‌فهمد و پاسخ را می‌سازد":"It understands audio and crafts the reply","پاسخ هوشمند صوتی آماده شد":"AI voice reply is ready","چرا یک پلتفرم یکپارچه؟":"Why One Integrated Platform?","کمتر بین ابزارها جابه‌جا شو؛ بیشتر روی کسب‌وکارت تمرکز کن":"Spend Less Time Switching Tools. Focus on Your Business.","مسئله فقط تعداد قابلیت‌ها نیست؛ ارزش اصلی این است که محتوا، انتشار، گفتگو، هوش مصنوعی و مخاطب از هم جدا نباشند.":"It isn't just about features. Your content, publishing, conversations, AI and contacts work together.","بدون Magic":"Without Magic","فرآیندهای پراکنده":"Disconnected Workflows","چند ابزار":"Multiple tools","چند پنل":"Multiple dashboards","چند اشتراک":"Multiple subscriptions","انتقال دستی اطلاعات":"Manual data transfers","پیگیری پراکنده":"Scattered follow-ups","با Magic":"With Magic","یک مسیر یکپارچه":"One Unified Workflow","محتوا":"Content","اتوماسیون":"Automation","مخاطب":"Contacts","شروع ساده با Magic":"Start Easily with Magic","Magic Super Manager را":"Try Magic Super Manager","رایگان امتحان کن":"for Free","با شماره موبایل یا جیمیلت وارد شو، پیجت را از مسیر رسمی Meta متصل کن و شروع کن.":"Sign in using your phone or Google, connect your account through Meta's official flow, and get started.","اتصال رسمی از مسیر Meta":"Official Meta Connection","دسترسی از طریق اپلیکیشن رسمی، بدون دریافت رمز پیج":"Official app access, never asking for your password","شروع سریع و ساده":"Quick & Easy Setup","اتصال پیج و ورود به پنل بدون پیچیدگی فنی":"Connect your account without technical complexity","همه‌چیز در یک مسیر":"Everything in One Place","محتوا، انتشار، گفتگو و مخاطب کنار هم":"Content, publishing, conversations and contacts together","پیجت را متصل کن":"Connect Your Account","از مسیر رسمی Instagram / Meta حساب موردنظرت را به پنل وصل کن.":"Connect your Instagram account through the official Instagram / Meta authorization flow.","یک جریان هوشمند بساز":"Build a Smart Workflow","یک سناریوی ساده برای کامنت، دایرکت یا پاسخ مخاطب آماده کن.":"Set up a simple scenario for a comment, DM or audience reply.","با هوش مصنوعی تست کن":"Test with AI","یک دایرکت واقعی را امتحان کن و پاسخ‌گویی هوشمند را ببین.":"Try a real DM and watch smart replies in action.","تصویر، ویدیو یا کپشن را در همان محیط آماده کن.":"Prepare an image, video or caption in the same workspace.","منتشر یا زمان‌بندی کن":"Publish or Schedule","خروجی آماده را مستقیم منتشر کن یا برای زمان مناسب در صف بگذار.":"Publish your content directly or schedule it for later.","نتیجه را برای کسب‌وکارت ببین":"See the Business Impact","فروش، پشتیبانی و ارتباط با مخاطب را در یک سیستم واقعی امتحان کن.":"Try sales, support and customer communication in one real system.","اینستاگرام قرار نیست فقط یک پیج باشه.":"Your Instagram can be more than just a page.","می‌تونه یک سیستم فروش، پشتیبانی و ارتباط با مشتری باشه. اگر به کارت اومد ادامه بده؛ اگر نه، چیزی رو از دست ندادی.":"It can become your system for sales, support and customer relationships. Try it free and decide for yourself.","بدون پیچیدگی":"No Complexity","بدون تعهد اولیه":"No Upfront Commitment","شروع سریع":"Quick Start","سوال‌های متداول":"Frequently Asked Questions","قبل از شروع، این‌ها را بدان":"Everything You Need to Know Before Starting","چند جواب کوتاه برای سوال‌هایی که معمولاً قبل از ساخت اولین جریان هوشمند پیش می‌آید.":"Quick answers to common questions before you build your first smart workflow.","آیا برای استفاده نیاز به دانش فنی دارم؟":"Do I need technical skills?","نه. بخش زیادی از سیستم با جریان‌های هوشمند و تنظیمات قابل ساخت و مدیریت است و برای شروع لازم نیست برنامه‌نویس باشی.":"No. You can build and manage most workflows through visual tools and settings, without coding.","می‌تونم جریان هوشمند مخصوص کسب‌وکار خودم بسازم؟":"Can I build custom workflows for my business?","بله. منطق و مسیر تعامل را می‌توانی متناسب با سناریوی کسب‌وکارت طراحی و شخصی‌سازی کنی؛ از فروش و جذب مخاطب تا پشتیبانی و پیگیری.":"Yes. Tailor every workflow to your business, from sales and lead generation to support and follow-up.","آیا فقط برای فروشگاه‌هاست؟":"Is this only for online stores?","خیر. می‌توان از سیستم برای فروش، لیدگیری، پشتیبانی، خدمات، املاک، تولیدکنندگان محتوا و سناریوهای مختلف ارتباط با مخاطب استفاده کرد.":"No. It's useful for sales, services, real estate, creators, customer support and lead generation.","آیا هوش مصنوعی خودش با مشتری صحبت می‌کند؟":"Can AI talk to my customers?","بله. می‌توانی پاسخ‌گویی، تحلیل پیام و جمع‌آوری اطلاعات موردنیاز را در جریان‌های هوشمند مبتنی بر هوش مصنوعی تعریف کنی.":"Yes. Configure AI-powered replies, message understanding and information collection within smart workflows.","آیا می‌توانم تیمم را هم وارد فرآیند کنم؟":"Can my team participate in the workflows?","بله. در سناریوهای مربوط به مخاطب و لید می‌توان مسیر ارجاع به نیروی انسانی را تعریف کرد تا در نقطه مناسب، ادامه گفتگو به تیم سپرده شود.":"Yes. Add handoffs so your team can take over conversations when needed.","چطور شروع کنم؟":"How do I get started?","وارد پنل شو، رایگان شروع کن و اولین جریان هوشمند خودت را بساز. بعد می‌توانی محتوا، انتشار و گفتگوهای خودکار را قدم‌به‌قدم به همان سیستم اضافه کنی.":"Sign in, start for free and build your first smart workflow. Then add content, publishing and automation as you grow.","آماده‌ای اولین جریان هوشمندت را بسازی؟":"Ready to Build Your First Smart Workflow?","چند دقیقه برای شروع کافیه.":"You can get started in minutes.","جزئیات بیشتر":"More Details","۳۲+ قابلیت در یک پلتفرم":"32+ Features, One Platform","جزئیات بیشتر برای زمانی که می‌خواهی عمیق‌تر ببینی Magic چه کارهایی را در یک محیط کنار هم قرار داده است.":"Explore the full range of Magic capabilities whenever you want a deeper look.","مسیرهای خودکار برای گفتگو":"Automated Conversation Workflows","از یک کامنت یا دایرکت، یک مسیر مشخص برای پاسخ، پیگیری و رسیدن به اقدام نهایی بساز.":"Turn any comment or DM into a defined journey through replies, follow-up and action.","رویداد":"Event","پاسخ خودکار به کامنت":"Automatic Comment Replies","تشخیص کامنت هدف و اجرای پاسخ، دایرکت یا ادامه جریان بر اساس قانون تعریف‌شده.":"Detect matching comments and trigger a reply, DM or workflow based on your rules.","کلمه کلیدی":"Keyword","قانون":"Rule","مسیر متفاوت برای هر نوع گفتگو":"Different Workflows for Different Conversations","ساخت چند جریان مستقل برای پیام‌های ورودی و هدایت هر گفتگو به مسیر مناسب.":"Build separate workflows and route incoming messages to the right one.","پیام ورودی":"Incoming Message","کلیدواژه":"Keyword","مسیر مستقل":"Independent Workflow","پاسخ به استوری و منشن":"Story Replies & Mentions","ساخت مسیرهای مجزا برای پاسخ استوری، منشن و رویدادهای تعاملی قابل پشتیبانی.":"Create dedicated workflows for supported Story replies, mentions and engagement events.","منشن":"Mention","تصمیم‌گیری بر اساس پاسخ مخاطب":"Decide Based on the User's Reply","بر اساس جواب یا وضعیت مخاطب، ادامه گفتگو را به مسیر مناسب هدایت کن.":"Route conversations based on the person's answer or status.","پاسخ مخاطب":"User Reply","مسیر بله":"Yes Path","مسیر خیر":"No Path","شرط دلخواه":"Custom Condition","تشخیص متن، صوت، تصویر و ویدیو":"Detect Text, Audio, Images & Video","تفکیک ورودی متن، صوت، تصویر، ویدیو و فایل برای هدایت به مسیر مناسب.":"Identify incoming message types and route text, voice, images, video or files correctly.","صوت":"Audio","پاسخ‌گویی و تصمیم‌گیری با هوش مصنوعی":"AI Replies & Decision-Making","هوش مصنوعی پیام را می‌فهمد، پاسخ مناسب می‌دهد و مسیر بعدی گفتگو را انتخاب می‌کند.":"AI understands the message, replies appropriately and chooses the next step.","تحلیل":"Analysis","تصمیم":"Decision","زمینه":"Context","فرآیندهای چندمرحله‌ای قابل استفاده مجدد":"Reusable Multi-Step Workflows","فرآیندهای تکراری را یک‌بار بساز و در مسیرهای مختلف دوباره استفاده کن.":"Build a reusable process once and use it across multiple workflows.","فرایند":"Process","قابل استفاده مجدد":"Reusable","انتقال داده":"Data Transfer","بازگشت":"Return","کارت و دکمه تعاملی":"Interactive Cards & Buttons","ارسال کارت‌های تصویری و دکمه‌های انتخاب برای ساخت تجربه هدایت‌شده در گفتگو.":"Send visual cards and buttons to guide users through the conversation.","کارت":"Card","دکمه":"Button","انتخاب":"Selection","ادامه مسیر بر اساس دنبال‌کردن پیج":"Follow-Gated Workflows","بررسی دنبال‌کردن حساب و ادامه مسیر بر اساس نتیجه بررسی کاربر.":"Check whether users follow your account and choose the next step accordingly.","بررسی":"Check","دنبال‌کردن":"Following","تأیید":"Confirmation","ادامه":"Continue","پیگیری زمان‌بندی‌شده":"Scheduled Follow-Ups","ادامه خودکار فرایند با تأخیر و پیگیری مخاطب در زمان تعیین‌شده.":"Continue workflows automatically after a delay and follow up on schedule.","تأخیر":"Delay","زمان":"Time","الگوهای آماده برای شروع سریع":"Ready-Made Templates","با الگوهای آماده شروع کن و آن‌ها را متناسب با کسب‌وکارت شخصی‌سازی کن.":"Start with templates and customize them for your business.","الگو":"Template","ویرایش":"Edit","ذخیره":"Save","تست مسیر قبل از فعال‌سازی":"Test Workflows Before Going Live","قبل از فعال‌کردن، مسیر را اجرا کن و مطمئن شو تجربه مخاطب درست پیش می‌رود.":"Run your workflow before activation to validate the user journey.","تست":"Test","شبیه‌سازی":"Simulation","مرحله":"Step","بررسی آماده‌بودن اتوماسیون":"Automation Readiness Check","کنترل خطاها، هشدارها و پیشنهادهای ساختاری قبل از فعال‌سازی جریان.":"Check errors, warnings and structural recommendations before activation.","خطا":"Error","هشدار":"Warning","آمادگی":"Readiness","انتقال و نسخه‌برداری از مسیرها":"Export & Copy Workflows","یک مسیر آماده را برای نسخه پشتیبان، انتقال یا استفاده دوباره ذخیره و بازیابی کن.":"Back up, transfer and reuse workflows whenever needed.","نسخه پشتیبان":"Backup","انتقال":"Transfer","استفاده دوباره":"Reuse","بازیابی":"Restore","مرتب‌سازی خودکار مسیرهای گفتگو":"Automatic Workflow Layout","مسیرهای بزرگ را خودکار مرتب کن تا روند گفتگو خوانا و قابل مدیریت بماند.":"Auto-arrange large workflows for a clean, readable canvas.","مرتب‌سازی":"Arrangement","مسیرهای بزرگ":"Large Workflows","نمای واضح":"Clear View","مدیریت ساده":"Easy Management","گزارش اجرای اتوماسیون":"Automation Execution Reports","نمایش اجراها، خطاها، عملکرد مسیرها و رفتار دکمه‌ها برای بررسی اتوماسیون.":"Review runs, errors, workflow performance and button interactions.","اجرا":"Execution","گزارش":"Report","مدیریت همه گفتگوها در یک صندوق":"Manage All Conversations in One Inbox","صندوق گفتگوی متمرکز برای مشاهده و پاسخ‌گویی به گفتگوهای مخاطبان در یک محیط واحد.":"A unified inbox for viewing and replying to customer conversations.","پاسخ زنده":"Live Reply","تاریخچه":"History","پاسخ هوشمند صوتی در دایرکت":"AI Voice Replies in DMs","پیام صوتی و ویس ورودی را در جریان هوشمند پردازش کن و در صورت فعال بودن Voice AI، پاسخ هوشمند را به‌صورت صوتی یا متنی برگردان.":"Process incoming voice messages and respond with audio or text when Voice AI is enabled.","ارسال صوت":"Send Audio","دریافت صوت":"Receive Audio","پخش":"Playback","ذخیره اطلاعات و وضعیت هر مخاطب":"Save Contact Details & Status","اطلاعات، علایق و وضعیت هر مخاطب را نگه دار تا گفتگو و پیگیری شخصی‌تر شود.":"Store contact information, interests and status for more personalized conversations.","دسته‌بندی":"Categorization","پروفایل":"Profile","انتشار فوری محتوا":"Instant Content Publishing","ارسال محتوای آماده به مسیر انتشار بدون نیاز به جابه‌جایی بین ابزارهای جداگانه.":"Send ready content straight to publishing without switching tools.","زمان‌بندی انتشار":"Schedule Publishing","قرار دادن محتوا در صف انتشار با تاریخ و ساعت مشخص و مدیریت برنامه محتوایی.":"Queue content for scheduled publishing and manage your calendar.","تقویم":"Calendar","صف":"Queue","تاریخ":"Date","ساعت":"Time","ساخت هوشمند محتوا":"Smart Content Creation","ساخت و آماده‌سازی محتوای تصویری، ویدیویی و متنی در محیط اختصاصی پنل.":"Create and prepare images, video and text in your dedicated workspace.","خروجی":"Output","طراحی و ویرایش تصویر":"Image Design & Editing","افزودن متن، شکل، لایه، تصویر، استیکر و تنظیمات ظاهری روی خروجی محتوا.":"Add text, shapes, layers, images, stickers and styling to your content.","لایه":"Layer","استیکر":"Sticker","ساخت و بازنویسی کپشن":"Write & Rewrite Captions","تولید یا بازنویسی کپشن فارسی و انتقال مستقیم آن همراه محتوای آماده انتشار.":"Generate or rewrite captions and send them with content directly to publishing.","بازنویسی":"Rewrite","لحن":"Tone","انتقال مستقیم به انتشار":"Direct Publishing Handoff","بازگشت خروجی استودیو به پنجره انتشار همراه مدیا و کپشن آماده ادامه کار.":"Move Studio output into publishing with ready media and caption.","مدیا":"Media","مدیریت حساب‌های اینستاگرام":"Manage Instagram Accounts","افزودن، انتخاب و مدیریت حساب فعال برای استفاده در بخش‌های مختلف پنل.":"Add, select and manage the active account throughout Magic.","حساب":"Account","انتخاب فعال":"Active Selection","مدیریت":"Management","اتصال":"Connection","کتابخانه و وضعیت محتوا":"Content Library & Status","مشاهده محتوای آماده، پیش‌نویس، زمان‌بندی‌شده و منتشرشده در یک ساختار مدیریتی.":"View drafts, scheduled, ready and published content together.","زمان‌بندی":"Scheduling","گفتگو با هوش مصنوعی":"Talk to AI","تعامل متنی و صوتی با هوش مصنوعی داخل پنل برای دریافت پاسخ و اجرای سناریوهای هوشمند.":"Chat or speak with AI inside the panel to get help and run workflows.","کنترل مصرف ابزارهای هوش مصنوعی":"Control AI Usage","مدیریت مصرف سرویس‌های هوش مصنوعی با اعتبار مجیک و کنترل موجودی کاربر.":"Manage AI service usage through Magic credits and keep track of your balance.","مجیک":"Magic","مصرف":"Usage","اعتبار":"Credits","کنترل":"Control","اتصال تلگرام به جریان اینستاگرام":"Connect Telegram to Instagram Workflows","ارسال پیام و لید به تلگرام و ادامه زنده پاسخ‌گویی در جریان‌های دارای Telegram Live Reply Bridge.":"Send messages and leads to Telegram, with live replies through the Telegram Live Reply Bridge.","اینستاگرام":"Instagram","پردازش ویس و پاسخ صوتی AI":"Voice Processing & AI Voice Replies","تشخیص پیام صوتی ورودی، پردازش با هوش مصنوعی و امکان برگرداندن پاسخ به‌صورت Voice یا متن.":"Detect and process voice messages with AI, then respond with voice or text.","نمایش ۲۲ قابلیت دیگر":"Show 22 More Features","پیجت را متصل کن و اولین اتوماسیونت را بساز.":"Connect your account and build your first automation.","ارتباط مستقیم":"Direct Contact","سؤالی داری؟ مستقیم با ما در ارتباط باش.":"Have Questions? Talk to Us Directly.","پیامت را همین‌جا بفرست؛ درخواست مستقیماً به تلگرام ما می‌رسد. برای ارتباط سریع‌تر هم می‌توانی از تلگرام، واتساپ یا تماس مستقیم استفاده کنی.":"Send your message here—it reaches our Telegram directly. You can also reach us through Telegram, WhatsApp or a phone call.","پیام مستقیم":"Direct Message","معمولاً سریع‌ترین راه برای شروع گفتگو":"Usually the fastest way to get in touch","نام / مجموعه":"Name / Company","شماره موبایل یا ایمیل":"Phone Number or Email","موضوع پیام":"Message Subject","سؤال درباره Magic Super Manager":"Question About Magic Super Manager","راهنمای شروع و اتصال پیج":"Getting Started & Connecting an Account","همکاری یا پیشنهاد":"Partnership or Suggestion","سایر":"Other","پیام شما":"Your Message","ارسال پیام":"Send Message","گفتگوی مستقیم در تلگرام":"Chat Directly on Telegram","واتساپ":"WhatsApp","ارسال پیام در واتساپ":"Send a Message on WhatsApp","تماس مستقیم":"Direct Call","برای تماس، روی این باکس بزن":"Click this card to call us","یک مسیر، چند راه ارتباطی":"One Platform, Multiple Ways to Reach Us","هر روشی که راحت‌تری انتخاب کن؛ پیام فرم هم بدون نمایش اطلاعات فنی، مستقیم از سمت سرور ارسال می‌شود.":"Choose the channel that works for you. Form messages are sent securely from our server.","محتوا · انتشار · اتوماسیون · مخاطب":"Content · Publishing · Automation · Contacts","سؤالی داری؟ از من بپرس ✦":"Questions? Ask Me ✦","منوی اصلی":"Main Navigation","ورود به حساب کاربری":"Sign in to your account","ورود به Magic Super Manager":"Sign in to Magic Super Manager","تغییر تم":"Switch color theme","باز کردن منوی موبایل":"Open mobile menu","بستن منوی موبایل":"Close mobile menu","بستن منو":"Close menu","منوی موبایل":"Mobile Navigation","محتوای هوشمند بساز! گفتگو رو هوشمند کن؛ انتشار رو بسپار به جادو!":"Create smart content! Automate conversations and let Magic handle publishing!","اعتماد و مزیت‌های اصلی":"Key Benefits & Trust","دموی تعاملی دایرکت هوشمند":"Interactive Smart Direct Demo","انتخاب نمونه جریان":"Choose a sample workflow","اقدام‌های دموی موبایل":"Mobile Demo Actions","خروجی‌های استودیوی هوشمند":"Smart Studio Outputs","روش‌های انتشار":"Publishing Methods","مسیرهای دایرکت هوشمند":"Smart Direct Workflows","مراحل جریان هوشمند":"Smart Workflow Steps","امکانات صندوق گفتگو":"Inbox Features","اطلاعات مدیریت مخاطب":"Contact Management Information","کاربردهای هوش مصنوعی":"AI Use Cases","مزایای مدیریت چند پیج":"Multi-Account Management Benefits","امکانات اتصال تلگرام و اینستاگرام":"Telegram & Instagram Integration Features","امکانات پاسخ صوتی هوشمند":"AI Voice Reply Features","نمایش نمونه اتصال تلگرام و اینستاگرام":"Telegram–Instagram Connection Demo","نمایش نمونه پاسخ هوشمند صوتی":"AI Voice Reply Demo","نام یا نام مجموعه":"Your name or company","راه ارتباطی با شما":"How can we reach you?","کوتاه بگو چه چیزی نیاز داری یا چه سؤالی داری…":"Tell us what you need or ask your question…","Magic Super Manager؛ نرم‌افزار مدیریت پیج و اتوماسیون اینستاگرام برای تولید محتوا، زمان‌بندی انتشار، دایرکت هوشمند، کامنت به دایرکت و مدیریت مخاطب.":"Magic Super Manager is an AI-powered Instagram management and automation platform for content creation, scheduling, smart DMs, comment-to-DM flows and customer management.","بله. می‌توانی پاسخ‌گویی، تحلیل پیام، پردازش ویس و در سناریوهای فعال پاسخ صوتی هوشمند را در جریان‌های هوش مصنوعی تعریف کنی.":"Yes. You can configure AI replies, message analysis, voice processing and smart voice responses where enabled.","Magic Super Manager | مدیریت پیج و اتوماسیون اینستاگرام":"Magic Super Manager | Instagram Management & Automation","تریگر شناسایی شد؛ کامنت «قیمت» وارد جریان فروش شد.":"Trigger matched: “Price” comment entered the sales workflow.","سلام سارا 👋 خوش اومدی. دنبال کدوم مدل هستی؟ اقتصادی، حرفه‌ای یا ویژه؟":"Hi Sara! 👋 Welcome. Which option would you prefer: Basic, Pro or Premium?","مدل حرفه‌ای رو می‌خوام، برای پیجم مناسبه؟":"I'd like Pro. Is it right for my account?","عامل هوش مصنوعی نیاز مخاطب را از متن گفتگو تحلیل کرد.":"The AI agent analyzed the customer's needs from the conversation.","بله. با توجه به چیزی که گفتی مدل حرفه‌ای برای حجم کاری تو مناسب‌تره. مشخصاتش رو برات می‌فرستم.":"Yes! Based on your needs, Pro seems like the best fit. I'll send you the details.","پلن حرفه‌ای":"Pro Plan","اتوماسیون کامل + انتشار + استودیوی هوشمند":"Full automation + Publishing + Smart Studio","دیدن جزئیات":"View Details","۰:۰۹":"0:09","پیام صوتی دریافت و برای ادامه جریان تشخیص داده شد.":"Voice message received and recognized for the next step.","صدات رو گرفتم. گفتی همین پلن رو می‌خوای و قبلش شرایط شروع رو می‌پرسی؛ الان برات ثبت اولیه انجام می‌دم.":"I got your voice message. You'd like this plan and want to know how to start. I'll create your initial request now.","زیرجریان ثبت سفارش اجرا شد و اطلاعات مخاطب در وضعیت سفارش ذخیره شد.":"The order subflow ran and saved the contact and order details.","✓ درخواست با موفقیت ثبت شد و پیام تأیید برای کاربر ارسال شد.":"✓ Request saved and confirmation sent successfully.","سناریوی مشاوره هوشمند":"Smart Consultation Scenario","ورود از دایرکت صوتی":"Triggered by a Voice DM","کاربر یک پیام صوتی برای مشاوره می‌فرستد":"A customer sends a voice message requesting advice","۰:۱۴":"0:14","نوع پیام «صوت» تشخیص داده شد و وارد مسیر مشاوره صوتی شد.":"Voice message detected and routed to voice consultation.","هوش مصنوعی موضوع پیام را تحلیل کرد: «برنامه‌ریزی محتوا برای پیج فروشگاهی».":"AI identified the topic: “Content planning for an online store.”","برای پیج فروشگاهی بهتره اول هدف هفته و تعداد انتشار رو مشخص کنیم. الان یک نمونه برنامه برات می‌سازم.":"For a store, let's define your weekly goal and posting frequency. I'll prepare a sample plan.","نمونه برنامه هفتگی":"Sample Weekly Plan","۳ پست + ۲ ریلز + ۵ استوری با زمان‌بندی پیشنهادی":"3 posts + 2 Reels + 5 Stories with a suggested schedule","مشاهده برنامه":"View Plan","عالیه. می‌خوام همین سبک رو برای پیجم اجرا کنم.":"Perfect. I want to use this approach for my account.","خیلی خوب. برای شروع فقط حوزه فعالیت و تعداد محصولاتت رو بفرست تا مسیرت شخصی‌سازی بشه.":"Great. Tell me your business niche and number of products so I can tailor the workflow.","فروش قهوه؛ حدود ۲۵ محصول.":"Coffee shop; around 25 products.","اطلاعات مخاطب به‌روزرسانی شد و تگ «مشاوره محتوا» ثبت شد.":"Contact updated and “Content consultation” tag saved.","✓ مسیر مشاوره کامل شد و پیگیری بعدی آماده است.":"✓ Consultation complete. Follow-up is ready.","سناریوی پشتیبانی":"Support Scenario","ورود از پیام پشتیبانی":"Triggered by a Support Message","کاربر درباره انتشار یک محتوا سوال دارد":"A user asks about publishing a piece of content","سلام، محتوای من زمان‌بندی شده ولی می‌خوام همین الان منتشرش کنم.":"Hi! My content is scheduled, but I'd like to publish it right now.","موضوع پیام تشخیص داده شد: «انتشار و زمان‌بندی».":"Topic detected: “Publishing and scheduling.”","سلام 👋 می‌تونی از لیست محتوا گزینه «انتشار فوری» رو بزنی. اگر بخوای مسیرش رو تصویری هم نشونت می‌دم.":"Hi 👋 Open your content list and choose “Publish now.” I can also show you a visual guide.","آره لطفاً تصویری بفرست.":"Yes, please show me.","راهنمای انتشار فوری":"Instant Publishing Guide","لیست محتوا ← انتخاب آیتم ← انتشار فوری":"Content list → Select item → Publish now","باز کردن راهنما":"Open Guide","۰:۰۷":"0:07","ویس کاربر تحلیل شد: «انجام شد، فقط می‌خوام مطمئن شم در صف قرار گرفته».":"Voice analyzed: “Done. I just want to be sure it's in the queue.”","بله، درخواستت در صف انتشار ثبت شده و وضعیتش از همان صفحه قابل مشاهده است.":"Yes, your publishing request is queued. You can track its status on that page.","وضعیت گفتگو به «حل‌شده» تغییر کرد و تاریخچه تعامل ذخیره شد.":"Conversation marked resolved and history saved.","✓ پشتیبانی بدون خروج از گفتگو کامل شد.":"✓ Support resolved within the conversation.","۰:۱۰":"0:10","<span class=\"avatar user-avatar\">س</span>":"<span class=\"avatar user-avatar\">S</span>","<b>پاسخ هوش مصنوعی</b>":"<b>AI Reply</b>","نمایش فقط ۱۰ قابلیت اصلی":"Show 10 Core Features","نمایش ۲۰ قابلیت دیگر":"Show 20 More Features","بررسی شرط":"Check Condition","وضعیت مخاطب":"Contact Status","آیا کاربر صفحه را دنبال می‌کند؟":"Does this user follow your account?","دروازه دنبال‌کردن":"Follow Gate","مسیر جایگزین":"Alternative Path","درخواست دنبال‌کردن و بررسی دوباره":"Ask to follow and recheck","عامل هوش مصنوعی":"AI Agent","تحلیل نیاز":"Needs Analysis","تشخیص هدف، بودجه و انتخاب پاسخ":"Identify goals, budget and best response","کارت محصول":"Product Card","تصویر و دکمه":"Image & Button","ارسال مدل‌ها و دکمه انتخاب":"Send plans with selection buttons","دریافت انتخاب":"Receive Selection","ادامه گفتگو":"Continue Conversation","دریافت متن یا ویس انتخاب کاربر":"Receive text or voice selection","ثبت سفارش":"Record Order","زیرجریان":"Subflow","ثبت لید، محصول و وضعیت سفارش":"Save lead, product and order status","جریان پشتیبانی هوشمند":"Smart Support Workflow","پیام جدید":"New Message","ورود به پشتیبانی":"Enter Support","دایرکت جدید مخاطب":"New Customer DM","تشخیص نوع پیام":"Detect Message Type","فیلتر ورودی":"Input Filter","متن، صوت، تصویر، ویدیو یا فایل":"Text, voice, image, video or file","تحلیل هوشمند":"Smart Analysis","تشخیص مسئله":"Identify Issue","موضوع، فوریت و پاسخ مناسب":"Topic, priority and response","راهنمای تصویری":"Visual Guide","در صورت نیاز":"When Needed","ارسال تصویر یا ویدیوی راهنما":"Send image or tutorial video","نیاز به اپراتور؟":"Need a Human Agent?","تصمیم مسیر":"Branch Decision","آیا پاسخ خودکار کافی است؟":"Is the automated answer enough?","ارجاع به اپراتور":"Human Handoff","انتقال گفتگو با تاریخچه کامل":"Hand off with full conversation history","بستن درخواست":"Close Request","ثبت وضعیت":"Save Status","ذخیره نتیجه و تغییر وضعیت مخاطب":"Save outcome and update contact status","جریان جذب مخاطب و مشاوره":"Lead Generation & Consultation Workflow","کامنت شامل «مشاوره»":"Comment includes “Consultation”","ارسال دایرکت":"Send DM","دعوت به ادامه":"Invite to Continue","خوش‌آمد و دکمه شروع مشاوره":"Welcome message and Start Consultation button","دریافت اطلاعات":"Collect Details","فرم کوتاه":"Short Form","نام، حوزه فعالیت و هدف":"Name, industry and goal","تحلیل مخاطب":"Contact Analysis","امتیازدهی":"Lead Scoring","تشخیص نیاز و اولویت پیگیری":"Identify needs and follow-up priority","به‌روزرسانی مخاطب":"Update Contact","تگ و متغیر":"Tag & Variable","ثبت تگ «لید مشاوره» و وضعیت":"Save “Consultation lead” tag and status","زیرجریان رزرو":"Booking Subflow","فرایند تخصصی":"Specialized Process","انتخاب زمان یا مسیر ادامه":"Select time or next step","تأیید نهایی":"Final Confirmation","پیام پایان":"Closing Message","ارسال خلاصه و ثبت پیگیری بعدی":"Send summary and set follow-up","در حال اجرای مسیر…":"Running workflow…","مسیر با موفقیت اجرا شد ✓":"Workflow completed successfully ✓","۰۱۲۳۴۵۶۷۸۹":"0123456789","در حال ثبت درخواست انتشار...":"Submitting publishing request…","در صف انتشار قرار گرفت ✓":"Added to publishing queue ✓","ساخت کپشن با هوش مصنوعی":"AI Caption Writing","یک کپشن فارسی حرفه‌ای با لحن صمیمی برای معرفی دایرکت هوشمند بنویس":"Write a friendly, professional caption introducing Smart Direct","ساخت ویدیو با هوش مصنوعی":"AI Video Creation","ویدیوی کوتاه عمودی برای معرفی چرخه کامنت تا دایرکت خودکار":"A short vertical video introducing the comment-to-DM journey","از ایده تا انتشار،<br>در یک مسیر":"From Idea to Publishing,<br>One Seamless Workflow","اتوماسیون،<br>هوشمندتر از همیشه":"Automation,<br>Smarter Than Ever","سارا محمدی":"Sara Mohammadi","در حال بررسی":"Reviewing","جریان خوش‌آمدگویی":"Welcome Workflow","لید جدید":"New Lead","کاربر جدید":"New User","سلام، برای شروع باید کدوم بخش رو فعال کنم؟":"Hi, which feature should I enable first?","سلام 👋 از دایرکت هوشمند شروع کن. یک جریان نمونه هم برات آماده می‌کنیم.":"Hi 👋 Start with Smart Direct. We'll prepare a sample workflow for you.","۰:۱۲":"0:12","علی رضایی":"Ali Rezaei","ع":"A","ثبت‌نام انجام شد":"Registration Complete","جریان ثبت‌نام":"Registration Workflow","ثبت‌نام‌شده":"Registered","لانچ محدود":"Limited Launch","لینک ثبت‌نام رو دریافت کردم، قدم بعدی چیه؟":"I got the registration link. What's next?","عالیه 👌 بعد از ورود، اکانت اینستاگرامت رو متصل کن تا اولین جریان رو با هم فعال کنیم.":"Great 👌 After signing in, connect your Instagram account so we can activate your first workflow.","راهنمای شروع سریع هم داخل پنل برات نمایش داده می‌شه.":"You'll also see a quick-start guide inside the dashboard.","مهسا کریمی":"Mahsa Karimi","م":"M","پاسخ داده شد":"Replied","پیگیری هوشمند":"Smart Follow-Up","مشتری بالقوه":"Prospect","ممنون، خیلی عالی بود 🙌":"Thank you, this was great! 🙌","خوشحالم که مفید بود 🌱 اگر بخوای یک سناریوی فروش نمونه هم برات آماده می‌کنیم.":"Glad it helped 🌱 We can also prepare a sample sales workflow for you.","آره، برای فروش دوره خیلی خوب می‌شه.":"Yes, that would work really well for course sales.","✓ پیگیری برای مخاطب آماده شد":"✓ Follow-up prepared for this contact","در حال ارسال…":"Sending…","ارسال انجام نشد. لطفاً دوباره تلاش کن.":"Message not sent. Please try again.","پیامت با موفقیت ارسال شد.":"Your message was sent successfully.","بساز!":"Create!","رو":"it","کن؛":"smarter;","رو بسپار به":"let ","آماده":"Ready","۹:۴۱":"9:41","۱":"1","۲":"2","۳":"3","۴":"4","۵":"5","۰۱":"01","۰۲":"02","۰۳":"03","۰۴":"04","۰۵":"05","۰۶":"06"," !":"!","اتصال اینستاگرام به هوش مصنوعی":"Connect Instagram to AI","اینستاگرام را به ChatGPT و Claude وصل کن":"Connect Instagram to ChatGPT and Claude","با Magic MCP، حساب اینستاگرام متصل به مجیک را از محیط چت جی‌پی‌تی (ChatGPT)، کلاد (Claude) یا دستیار سازگار با MCP مدیریت کن؛ آمار را بررسی کن، محتوا آماده کن و کارهای مجاز را با زبان طبیعی انجام بده.":"Use Magic MCP to manage your Instagram account connected to Magic from ChatGPT, Claude or another MCP-compatible AI assistant. Review insights, prepare content and perform authorized tasks through natural-language requests.","تحلیل پیج با ChatGPT و Claude":"Instagram insights with ChatGPT and Claude","از دستیار بخواه عملکرد پست‌ها و ریلزهای حساب خودت را مقایسه کند یا آمار ذخیره‌شدهٔ اینستاگرام را خلاصه کند. زمان آخرین همگام‌سازی را هم بررسی کن.":"Ask your assistant to compare your posts and Reels or summarize stored Instagram analytics. Check the last sync time to understand how recent the data is.","آماده‌سازی و انتشار محتوا با هوش مصنوعی":"AI-assisted content and publishing","پیش‌نویس پست، استوری یا ریلز بساز و محتوای آماده را برای انتشار یا زمان‌بندی بررسی کن. انتشار واقعی فقط با دسترسی لازم و تأیید تو انجام می‌شود.":"Create a post, Story or Reel draft and review ready content for publishing or scheduling. Actual publishing requires the relevant permissions and your confirmation.","دایرکت، مخاطبان و جریان‌های هوشمند":"Instagram DMs, contacts and automation","گفتگوهای مجاز را بخوان، اطلاعات مخاطبان را بررسی کن و جریان‌های دایرکت هوشمند را مدیریت کن. ارسال پیام و فعال‌سازی جریان، مجوز و تأیید جداگانه می‌خواهد.":"Read authorized conversations, review contact information and manage Smart Direct flows. Sending a message or activating a flow requires separate permissions and confirmation.","اتصال با حساب و مجوزهای خودت":"Connect with your own account and permissions","ابتدا اینستاگرامت را به مجیک متصل کن؛ سپس Magic MCP را در دستیار سازگار اضافه کن، وارد حساب مجیک شو و دسترسی‌ها را انتخاب کن. امکانات قابل استفاده به پشتیبانی دستیار و تنظیمات حساب تو بستگی دارد.":"First connect Instagram to Magic. Then add Magic MCP in a compatible assistant, sign in to Magic and choose the permissions. Available features depend on your assistant's support and account settings.","راهنمای اتصال ChatGPT و Claude":"ChatGPT and Claude connection guide","اتصال اینستاگرام بدون دادن رمز به مجیک":"Connect Instagram without sharing your password with Magic","چطور اینستاگرام را به چت جی‌پی‌تی یا کلاد وصل کنم؟":"How do I connect Instagram to ChatGPT or Claude?","حساب اینستاگرامت را از مسیر رسمی به مجیک وصل کن. سپس در ChatGPT یا Claude، در صورت پشتیبانی حساب و تنظیمات دستیار از اتصال MCP، Magic MCP را اضافه کن و با حساب مجیک مجوز بده. راهنمای اتصال، نشانی سرور و مراحل را توضیح می‌دهد.":"Connect your Instagram account to Magic through the official connection flow. Then, if your ChatGPT or Claude account and assistant settings support MCP connections, add Magic MCP and authorize it with your Magic account. The connection guide provides the server address and setup steps.","آیا اتصال اینستاگرام به هوش مصنوعی فقط برای ChatGPT است؟":"Is the Instagram AI integration only for ChatGPT?","خیر. Magic MCP برای ChatGPT، Claude و دیگر کلاینت‌های سازگار با MCP طراحی شده است. هر دستیار فقط به ابزارها و داده‌هایی دسترسی دارد که مجوزشان را داده‌ای؛ سازگاری و امکانات هر کلاینت باید جدا بررسی شود.":"No. Magic MCP is designed for ChatGPT, Claude and other MCP-compatible clients. Each assistant can access only the tools and data you authorize; compatibility and available features must be checked for each client.","مدیریت اینستاگرام و اتصال به ChatGPT و Claude | مجیک":"Instagram AI, ChatGPT & Claude Integration | Magic","با مجیک اینستاگرام را مدیریت و به ChatGPT و Claude متصل کن؛ تحلیل آمار، تولید محتوا، زمان‌بندی انتشار و دایرکت هوشمند با دسترسی‌های انتخابی از طریق Magic MCP.":"Manage Instagram and connect it to ChatGPT and Claude with Magic MCP: review insights, create content, schedule posts and manage DMs with permissions you control.","اتصال اینستاگرام به هوش مصنوعی — ChatGPT, Claude, Magic MCP":"Connect Instagram to AI — ChatGPT, Claude, Magic MCP","یک مرکز برای مدیریت کسب‌وکار دیجیتال":"One hub for your digital business","از انتشار تا فروش":"From publishing to sales","انتشار چندکاناله، فروشگاه اختصاصی، پیام‌رسان‌ها، CRM و ابزارهای هوشمند را در یک مسیر مدیریتی به هم وصل کن.":"Connect multichannel publishing, your own storefront, messaging, CRM and intelligent tools in one business workspace.","انتشار چندکاناله":"Multichannel publishing","اینستاگرام و کانال‌های تلگرام، بله و روبیکا":"Instagram plus Telegram, Bale and Rubika channels","فروشگاه و سفارش‌ها":"Storefront and orders","ویترین اختصاصی، سبد خرید و مدیریت سفارش":"Your own storefront, cart and order management","پاسخ‌گویی در پیام‌رسان‌ها":"Messaging across platforms","مدیریت پیام‌ها و جریان پاسخ‌گویی در یک پنل":"Manage conversations and reply workflows in one panel","تبدیل تعامل به فرصت فروش":"Turn engagement into sales opportunities","از کامنت و دایرکت تا پیگیری و ثبت سفارش":"From comments and DMs to follow-up and orders","CRM و مدیریت مشتریان":"CRM and customer management","پروفایل، تگ‌ها و سوابق ارتباط با مخاطب":"Contact profiles, tags and interaction history","تولید محتوای هوشمند":"AI-powered content creation","ساخت تصویر، ویدئو و کپشن با هوش مصنوعی":"Create images, videos and captions with AI","اتصال Google Drive و Sheets":"Google Drive and Sheets integration","اتصال فایل‌ها و مدیریت داده در جریان‌ها":"Connect files and manage data inside workflows","اتصال ChatGPT و Claude با MCP":"Connect ChatGPT and Claude with MCP","دسترسی دستیارهای هوشمند به ابزارهای مجیک":"Give AI assistants access to Magic tools","اتوماسیون فرایندهای کسب‌وکار":"Business process automation","محرک‌ها، شرط‌ها، متغیرها و زیرجریان‌ها":"Triggers, conditions, variables and subflows","چالش واقعی":"The real challenge","راهکار مجیک":"The Magic solution","نتیجه برای کسب‌وکار":"The business outcome","جزئیات مورد انتخاب‌شده":"Details of the selected use case","انتشار محتوا در چند شبکه و کانال، وقتی هرکدام پنل جداگانه‌ای دارند، زمان و تمرکز زیادی می‌گیرد.":"Publishing across several networks becomes time-consuming when every destination has its own separate dashboard.","مقصدهای اینستاگرام و کانال‌های تلگرام، بله و روبیکا را در پلنر مدیریت کن؛ محتوا را پیش‌نمایش بگیر، فوری منتشر کن یا برای زمان دلخواه برنامه‌ریزی کن.":"Manage Instagram and your Telegram, Bale and Rubika channel destinations in the Planner. Preview content, publish immediately or schedule it for later.","برنامه انتشار چندکاناله را از یک محیط منسجم مدیریت کن.":"Manage your multichannel publishing plan from one connected workspace.","معرفی محصولات، دریافت سفارش و پیگیری موجودی و ارسال معمولاً بین ابزارهای جدا پخش می‌شود.":"Product discovery, order intake, inventory and delivery tracking are often scattered across separate tools.","فروشگاه عمومی با زیردامنه اختصاصی و ۹ قالب آماده بساز؛ کاتالوگ، سبد خرید، موجودی، سفارش‌ها، تأمین‌کنندگان و روش‌های ارسال را از پنل مدیریت کن.":"Create a public storefront on your own subdomain with nine ready-made themes. Manage the catalog, cart, inventory, orders, suppliers and shipping methods from your dashboard.","از ویترین اختصاصی تا ثبت و پیگیری سفارش، یک چرخه کامل داشته باش.":"Run the full journey from your branded storefront to order creation and tracking.","مخاطب در شبکه‌های مختلف پیام می‌دهد و جابه‌جایی بین بات‌ها و پنل‌ها پاسخ‌گویی را دشوار می‌کند.":"Customers message you on different platforms, and switching between bots and dashboards makes replies harder to manage.","حساب‌ها و بات‌های اینستاگرام، تلگرام، بله و روبیکا را متصل کن؛ گفتگوها را در مرکز ارتباط ببین و برای هر حساب جریان پاسخ‌گویی بساز.":"Connect supported Instagram accounts and Telegram, Bale and Rubika bots. Manage conversations in Communication Center and build reply workflows for each account.","مدیریت متمرکزتر گفتگوها و پاسخ‌گویی در بسترهای مختلف.":"A more centralized way to manage conversations and replies across platforms.","کامنت یا پیام مخاطب اگر مسیر بعدی نداشته باشد، به‌راحتی به یک تعامل کوتاه ختم می‌شود.":"A comment or message can remain a one-off interaction unless there is a clear next step.","با محرک‌های کامنت و دایرکت، پاسخ خودکار، دکمه، لینک، شرط و بلوک‌های هوش مصنوعی، ادامه گفتگو را طراحی کن.":"Design the next steps with comment and DM triggers, automated replies, buttons, links, conditions and AI blocks.","از اولین تعامل تا معرفی محصول، دریافت اطلاعات و ثبت سفارش مسیر بساز.":"Build a journey from the first interaction to product discovery, information capture and order creation.","اطلاعات تماس، سوابق گفتگو و وضعیت پیگیری مشتری ممکن است پراکنده بماند.":"Contact details, conversation history and follow-up status can easily become fragmented.","پروفایل مخاطب، تگ‌ها، فیلدهای اختصاصی و تاریخچه تعامل را در CRM مدیریت کن و آن‌ها را به جریان‌های ارتباطی و سفارش‌ها وصل کن.":"Manage contact profiles, tags, custom fields and interaction history in CRM, then connect them to communication workflows and orders.","هر مخاطب با اطلاعات و وضعیت روشن برای پیگیری بعدی.":"Every contact has clear details and a status ready for the next follow-up.","ایده‌پردازی، تولید تصویر و ویدئو و آماده‌سازی کپشن در ابزارهای جداگانه زمان‌بر است.":"Brainstorming, creating images and videos, and preparing captions in separate tools takes time.","در Smart Studio تصویر، ویدئو و کپشن بساز یا ویرایش کن و خروجی را مستقیم به مسیر انتشار بفرست.":"Create or edit images, videos and captions in Smart Studio, then send the output directly to publishing.","از ایده تا محتوای آماده انتشار در یک جریان.":"Move from idea to publish-ready content in one workflow.","ثبت اطلاعات و پیدا کردن داده‌های قبلی در فایل‌های کاری، به کار دستی و تکراری تبدیل می‌شود.":"Saving information and finding existing records in work files can become repetitive manual work.","Google Drive را وصل کن و فایل انتخابی را در جریان استفاده کن؛ با Google Sheets داده‌ها را اضافه، جست‌وجو، به‌روزرسانی یا حذف کن.":"Connect Google Drive and use a file you selected in your workflow. With Google Sheets, append, search, update or delete data rows.","فرایندهای مخاطب و سفارش را به داده‌های واقعی فایل‌های انتخابی متصل کن.":"Connect contact and order workflows to real data in the files you selected.","دستیار هوش مصنوعی بدون اتصال به ابزارهای واقعی، بیشتر به پیشنهاد و تولید متن محدود می‌ماند.":"Without access to real tools, an AI assistant is mostly limited to suggestions and text generation.","Magic MCP را به ChatGPT یا Claude وصل کن تا دستیار سازگار، ابزارها و داده‌های مجاز مجیک را از طریق پروتکل MCP فراخوانی کند.":"Connect Magic MCP to ChatGPT or Claude so a compatible assistant can call authorized Magic tools and data through the MCP protocol.","هوش مصنوعی را از یک پاسخ‌گو به دستیار متصل به ابزارهای واقعی تبدیل کن.":"Turn AI from a conversational responder into an assistant connected to real tools.","فرایندهای کسب‌وکار چندمرحله‌ای‌اند و با شرط‌ها و مسیرهای مختلف پیش می‌روند.":"Business processes often span multiple steps, conditions and branching paths.","با Flow Builder محرک‌ها، شرط‌ها، دکمه‌ها، متغیرها، زیرجریان‌ها، نودهای هوش مصنوعی و Google Sheets را کنار هم بچین.":"Combine triggers, conditions, buttons, variables, subflows, AI nodes and Google Sheets in Flow Builder.","اتوماسیون‌های قابل توسعه و متناسب با عملیات واقعی کسب‌وکار بساز.":"Build extensible automations tailored to the way your business actually operates.","اینستاگرام و پیام‌رسان‌ها":"Instagram and messaging apps","مدیریت اینستاگرام و پیام‌رسان‌ها | فروشگاه‌ساز مجیک":"Instagram & Messaging Management | Magic Store Builder","اینستاگرام، تلگرام، بله و روبیکا را یکجا مدیریت کن؛ فروشگاه‌ساز چندکاناله، پاسخ‌گوی هوشمند، مرکز ارتباط+ و اتصال Google Drive و Google Sheets با هوش مصنوعی.":"Manage Instagram, Telegram, Bale and Rubika together. Build a multichannel store, automate replies, and manage orders with Google Drive, Sheets and AI.","بله":"Bale","روبیکا":"Rubika","اتصال بات":"Bot connection","جریان هوشمند":"Smart flow","پاسخ خودکار":"Automated reply","پیام‌ها":"Messages","پاسخ‌گویی":"Replies","راهنمایی":"Guidance","ارجاع انسانی":"Human handoff","کانال تلگرام":"Telegram channel","متن و تصویر":"Text and image","انتشار فوری":"Publish now","پیش‌نمایش":"Preview","پلنر":"Planner","کانال بله":"Bale channel","کانال روبیکا":"Rubika channel","لینک":"Link","اپراتور":"Operator","مخاطب اینستاگرام":"Instagram contact","دربارهٔ جزئیات محصول سؤال دارم…":"I have a question about the product details…","مخاطب تلگرام":"Telegram contact","لطفاً وضعیت سفارش را بفرستید.":"Please send the order status.","مخاطب بله":"Bale contact","اطلاعات بیشتر دربارهٔ خدمات…":"I’d like more information about the services…","مخاطب روبیکا":"Rubika contact","می‌خواستم دربارهٔ سفارش بپرسم.":"I wanted to ask about the order.","۱۴۰۵/۰۹/۰۵":"2026/11/26","از انتشار محتوا تا پیگیری مشتری در اینستاگرام و پیام‌رسان‌ها":"From content publishing to customer follow-up on Instagram and messaging apps"},"ar":{"مدیریت هوشمند، از محتوا تا مخاطب":"إدارة أذكى، من المحتوى إلى العملاء","قابلیت‌ها":"المزايا","کاربردها":"حالات الاستخدام","محتوا و انتشار":"المحتوى والنشر","دایرکت هوشمند":"الرسائل المباشرة الذكية","راهنما":"المساعدة","ارتباط با ما":"تواصل معنا","ورود":"تسجيل الدخول","دسترسی سریع":"وصول سريع","هر بخش را مستقیم ببین":"انتقل مباشرةً إلى أي قسم","فعال":"نشط","چیزی که برای کار روزمره لازم داری":"كل ما تحتاجه للعمل اليومي","فروش، پشتیبانی و جذب مخاطب":"المبيعات والدعم وجذب العملاء المحتملين","از ایده تا انتشار یا زمان‌بندی":"من الفكرة إلى النشر أو الجدولة","هر تعامل، شروع یک مسیر هوشمند":"كل تفاعل هو بداية لمسار ذكي","پیام مستقیم، تلگرام، واتساپ و تماس":"الرسائل المباشرة وتليغرام وواتساب والمكالمات","مرکز راهنما":"مركز المساعدة","آموزش، FAQ و پاسخ خطاهای رایج":"شروحات وأسئلة شائعة وحلول للمشكلات","شروع ساده و بدون تعهد":"ابدأ بسهولة دون أي التزام","رایگان شروع کن":"ابدأ مجاناً","نسل جدید مدیریت اینستاگرام با اتوماسیون و هوش مصنوعی":"جيل جديد لإدارة إنستغرام بالذكاء الاصطناعي والأتمتة","محتوای":"أنشئ"," هوشمند":" محتوى"," بساز!":" ذكياً!","گفتگو":"اجعل المحادثات"," رو ":" ","هوشمند":"ذكية"," کن؛":"؛","انتشار":"اترك النشر"," رو بسپار به ":" لـ ","جادو":"ماجيك","Magic Super Manager یک نرم‌افزار مدیریت پیج و اتوماسیون اینستاگرام است؛ محتوا بساز، انتشار را زمان‌بندی کن، دایرکت هوشمند و پاسخ‌های خودکار را اجرا کن و مخاطبانت را یکجا مدیریت کن.":"Magic Super Manager منصة لإدارة إنستغرام وأتمتته. أنشئ المحتوى وجدول النشر وشغّل الرسائل والردود الذكية وأدر جمهورك من مكان واحد.","دموی زنده را ببین":"شاهد العرض التفاعلي","محتوا بساز":"أنشئ المحتوى","تصویر، ویدیو و کپشن":"صور وفيديوهات ونصوص مرافقة","منتشر کن":"انشر","فوری یا زمان‌بندی‌شده":"فوراً أو وفق جدول","خودکار کن":"أتمت","گفتگو و مدیریت مخاطب":"المحادثات وإدارة الجمهور","اتصال رسمی به Instagram / Meta":"ربط رسمي مع إنستغرام / ميتا","اتصال از مسیر رسمی متا":"اتصل عبر المسار الرسمي لميتا","بدون نیاز به رمز اینستاگرام":"دون الحاجة إلى كلمة مرور إنستغرام","رمز پیج را در سایت ما وارد نمی‌کنی":"لن تُدخل كلمة مرور حسابك على موقعنا","مدیریت چند پیج از یک محیط":"إدارة حسابات متعددة من مكان واحد","حساب‌ها را یکجا مدیریت کن":"أدر حساباتك كلها في مكان واحد","اتوماسیون + هوش مصنوعی + انتشار":"الأتمتة + الذكاء الاصطناعي + النشر","همه در یک سیستم یکپارچه":"كل شيء ضمن منصة متكاملة","دموی زنده دایرکت هوشمند":"عرض حي للرسائل الذكية","نمونه واقعی از اجرای یک جریان کامل":"شاهد مسار عمل متكاملاً","در حال اجرا":"قيد التشغيل","مجیک سوپر منیجر":"ماجيك سوبر مانجر","سناریوی سفارش محصول":"سيناريو طلب منتج","ورود از کامنت":"البداية من تعليق","کاربر زیر پست می‌نویسد: «قیمت»":"يكتب مستخدم تعليقاً: «السعر»","پیام...":"رسالة…","شروع خودکار":"بدء تلقائي","هوش مصنوعی":"الذكاء الاصطناعي","سفارش محصول":"طلب منتج","کامنت تا ثبت سفارش":"من التعليق إلى تسجيل الطلب","مشاوره هوشمند":"استشارة ذكية","ویس، تصویر و پاسخ هوش مصنوعی":"الصوت والصور وردود الذكاء الاصطناعي","پشتیبانی":"الدعم","تشخیص مشکل تا پاسخ نهایی":"من اكتشاف المشكلة حتى حلّها","مسیر اصلی محصول":"رحلة المنتج الأساسية","مدیریت پیج اینستاگرام، از تولید محتوا تا اتوماسیون":"إدارة إنستغرام، من إنشاء المحتوى إلى الأتمتة","قبل از جزئیات، کل ماجرا ساده است: محتوا را می‌سازی، منتشر می‌کنی، گفتگوها را خودکار می‌کنی و مخاطبانت را یکجا مدیریت می‌کنی.":"الفكرة بسيطة: أنشئ المحتوى وانشره وأتمت المحادثات وأدر جمهورك من مكان واحد.","بساز":"أنشئ","محتوا، تصویر، ویدیو و کپشن":"المحتوى والصور والفيديوهات والنصوص","فوری یا در زمان مناسب":"فوراً أو في الوقت المناسب","گفتگو را خودکار کن":"أتمت المحادثات","کامنت، دایرکت و پاسخ‌ها":"التعليقات والرسائل المباشرة والردود","مخاطب را مدیریت کن":"أدر جمهورك","اطلاعات، وضعیت و پیگیری":"البيانات والحالة والمتابعة","دموی تعاملی":"عرض تفاعلي","کامنت به دایرکت؛ یک تعامل چطور به مسیر واقعی تبدیل می‌شود؟":"من التعليق إلى الرسالة: كيف يتحول التفاعل إلى مسار فعلي؟","بدون توضیح طولانی؛ مسیر را اجرا کن و ببین Magic از اولین تعامل تا اقدام نهایی چه کاری انجام می‌دهد.":"دون شرح مطول. شغّل العرض لترى كيف يحوّل ماجيك التفاعل الأول إلى نتيجة فعلية.","کامنت → دایرکت → اقدام":"تعليق ← رسالة ← إجراء","نمونه ساده از یک اتوماسیون واقعی":"مثال بسيط على أتمتة حقيقية","▶ اجرای دمو":"▶ تشغيل العرض","کاربر کامنت می‌گذارد":"يترك المستخدم تعليقاً","«قیمت رو بفرست»":"«أرسل السعر»","Magic تعامل را تشخیص می‌دهد":"يتعرّف ماجيك على التفاعل","شروع خودکار مسیر فروش":"يبدأ مسار المبيعات تلقائياً","دایرکت هوشمند ارسال می‌شود":"تُرسل رسالة مباشرة ذكية","پاسخ مناسب برای همان مخاطب":"ردّ مخصص لذلك المستخدم","گفتگو ادامه پیدا می‌کند":"تستمر المحادثة","سؤال، پاسخ و تصمیم هوشمند":"أسئلة وأجوبة وقرارات ذكية","کاربر به اقدام نهایی می‌رسد":"يُكمل المستخدم الإجراء","لینک، ثبت‌نام، سفارش یا پیگیری":"رابط أو تسجيل أو طلب أو متابعة","نتیجه":"النتيجة","یک تعامل ساده، بدون جابه‌جایی بین چند ابزار، به یک مسیر قابل پیگیری تبدیل می‌شود.":"يتحول تفاعل بسيط إلى مسار قابل للمتابعة دون التنقل بين الأدوات.","قابلیت‌های اصلی":"المزايا الرئيسية","ابزارهایی که نتیجه کار را می‌سازند":"أدوات تحقق نتائج حقيقية","به‌جای اصطلاحات فنی، این‌ها همان کارهایی هستند که هر روز برای مدیریت پیج به آن‌ها نیاز داری.":"بعيداً عن المصطلحات التقنية، هذه الأدوات التي تحتاجها يومياً لإدارة حسابك.","استودیوی هوشمند":"الاستوديو الذكي","از یک ایده شروع کن و تصویر، ویدیو و کپشن آماده انتشار را در همان مسیر بساز.":"حوّل فكرة إلى صور وفيديوهات ونصوص جاهزة للنشر ضمن مسار واحد.","تصویر":"صورة","ویدیو":"فيديو","کپشن":"وصف المنشور","انتشار و زمان‌بندی":"النشر والجدولة","محتوا را فوری منتشر کن یا برای پست، استوری و ریلز در زمان مناسب برنامه‌ریزی کن.":"انشر الآن أو جدوِل المنشورات والقصص والريلز في الوقت المناسب.","پست":"منشور","استوری":"قصة","ریلز":"ريلز","تعامل مخاطب را به پاسخ، دایرکت و پیگیری خودکار وصل کن تا گفتگو نیمه‌کاره نماند.":"حوّل تفاعلات الجمهور إلى ردود ورسائل مباشرة ومتابعات آلية.","کامنت":"تعليق","دایرکت":"رسالة مباشرة","پیگیری":"متابعة","جریان‌ساز هوشمند":"مُنشئ المسارات الذكية","مسیر تعامل را بصری طراحی کن؛ از شروع گفتگو تا اقدام نهایی، بدون پیچیدگی فنی.":"صمّم مسارات التفاعل بصرياً، من بدء المحادثة حتى الإجراء النهائي دون تعقيد.","شروع":"البداية","مسیر":"المسار","اقدام":"إجراء","صندوق گفتگو":"صندوق محادثات موحد","گفتگوهای مخاطبان را یکجا ببین، سریع پاسخ بده و در صورت نیاز به عضو تیم ارجاع بده.":"اعرض كل المحادثات معاً وردّ بسرعة وحوّلها لعضو الفريق عند الحاجة.","گفتگوها":"المحادثات","پاسخ":"رد","ارجاع":"إحالة","مدیریت مخاطبان":"إدارة جهات الاتصال","اطلاعات، وضعیت و سابقه تعامل هر مخاطب را کنار هم نگه دار تا ارتباط دقیق‌تری بسازی.":"احتفظ ببيانات كل جهة اتصال وحالتها وسجل تفاعلاتها لتواصل أكثر تخصيصاً.","اطلاعات":"معلومات","وضعیت":"حالة","تعامل":"تفاعل","ابزارهای هوش مصنوعی":"أدوات الذكاء الاصطناعي","برای ساخت محتوا، پیشنهاد پاسخ و تصمیم‌گیری داخل گفتگو از هوش مصنوعی کمک بگیر.":"استخدم الذكاء الاصطناعي لإنشاء المحتوى واقتراح الردود وتوجيه القرارات أثناء المحادثات.","تولید":"إنشاء","پیشنهاد":"اقتراحات","مدیریت چند پیج":"إدارة حسابات متعددة","چند حساب اینستاگرام را از یک پنل کنترل کن و بدون پراکندگی بین پیج‌ها جابه‌جا شو.":"تحكّم في عدة حسابات إنستغرام من لوحة واحدة.","چند پیج":"حسابات متعددة","یک پنل":"لوحة واحدة","مدیریت یکجا":"إدارة مركزية","اتصال تلگرام به اینستاگرام":"ربط تليغرام بإنستغرام","پیام‌ها و لیدهای جریان را به تلگرام بفرست و در سناریوهای Live Reply ادامه پاسخ‌گویی دایرکت را از تلگرام مدیریت کن.":"أرسل الرسائل والعملاء المحتملين إلى تليغرام وتابع الرد على رسائل إنستغرام عبر Live Reply.","تلگرام":"تليغرام","پاسخ هوشمند صوتی":"الردود الصوتية الذكية","ویس و پیام صوتی ورودی را با هوش مصنوعی پردازش کن و پاسخ مناسب را به‌صورت صوتی یا متنی برگردان.":"افهم الرسائل الصوتية بالذكاء الاصطناعي وردّ صوتياً أو نصياً.","ویس":"صوت","پاسخ صوتی":"رد صوتي","سناریوهای واقعی":"سيناريوهات واقعية","برای چه کارهایی ساخته شده؟":"ما الذي يمكنك فعله باستخدام ماجيك؟","هر کسب‌وکار می‌تواند از یک نقطه متفاوت شروع کند؛ مهم این است که مسیر تکراری را به یک سیستم قابل مدیریت تبدیل کنی.":"قد تبدأ كل شركة من نقطة مختلفة؛ المهم تحويل الأعمال المتكررة إلى نظام يسهل إدارته.","فروش در دایرکت":"المبيعات عبر الرسائل","از سؤال تا انتخاب و ثبت درخواست":"من السؤال إلى الاختيار وتسجيل الطلب","پشتیبانی مشتری":"دعم العملاء","پاسخ سریع و ارجاع هوشمند":"ردود سريعة وإحالة ذكية","جذب لید":"جذب العملاء المحتملين","جمع‌آوری اطلاعات و پیگیری بعدی":"جمع البيانات والمتابعة","ارسال خودکار لینک":"إرسال الروابط تلقائياً","لینک مناسب بعد از تعامل کاربر":"إرسال الرابط المناسب بعد تفاعل المستخدم","کمپین کامنت → دایرکت":"حملات التعليق إلى الرسائل","کامنت را به یک مسیر کامل تبدیل کن":"حوّل التعليق إلى مسار متكامل","تولید محتوا":"إنشاء المحتوى","تصویر، ویدیو و کپشن در یک مسیر":"الصور والفيديو والنصوص ضمن مسار واحد","زمان‌بندی پست و استوری":"جدولة المنشورات والقصص","انتشار خودکار و منظم محتوای اینستاگرام":"نشر محتوى إنستغرام بانتظام وبشكل آلي","پاسخ‌گویی هوشمند":"الردود الذكية","درک پیام و پاسخ متناسب با گفتگو":"فهم الرسائل والرد بما يناسب المحادثة","اطلاعات و وضعیت هر مخاطب یکجا":"بيانات وحالة كل جهة اتصال في مكان واحد","از ایده تا محتوای آماده انتشار، در یک مسیر":"من الفكرة إلى محتوى جاهز للنشر","ایده را وارد کن، تصویر، ویدیو یا کپشن را آماده کن و خروجی را مستقیم به بخش انتشار بفرست؛ بدون دانلود و انتقال دستی بین چند ابزار.":"أدخل فكرتك وأنشئ صورة أو فيديو أو وصفاً ثم أرسله مباشرة إلى قسم النشر دون تنزيلات أو تنقل بين الأدوات.","ساخت تصویر با هوش مصنوعی":"إنشاء الصور بالذكاء الاصطناعي","ساخت ویدیو":"إنشاء الفيديو","تولید و بازنویسی کپشن":"كتابة أوصاف المنشورات وإعادة صياغتها","طراحی روی تصویر":"تصميم وتحرير الصور","کتابخانه محتوای شما":"مكتبة محتواك","ارسال مستقیم برای انتشار":"إرسال مباشر للنشر","محیط ساخت و آماده‌سازی محتوا":"مساحة إنشاء المحتوى وتجهيزه","هوش":"ذكاء","رسانه":"وسائط","متن":"نص","شکل":"شكل","اتوماسیون،":"الأتمتة،","هوشمندتر از همیشه":"أذكى من أي وقت مضى","ساخت تصویر":"إنشاء صورة","پرامپت":"الموجّه","پوستر حرفه‌ای برای معرفی اتوماسیون اینستاگرام، مینیمال و پرمیوم":"ملصق احترافي بسيط وأنيق للترويج لأتمتة إنستغرام","✦ ساخت نمونه":"✦ أنشئ نموذجاً","ارسال به انتشارگر ←":"إرسال إلى الناشر ←","خروجی به انتشارگر منتقل شد ✓":"تم الإرسال إلى الناشر ✓","انتشارگر":"الناشر","تقویم و صف انتشار":"تقويم النشر وقائمته","آماده انتشار":"جاهز للنشر","مهر ۱۴۰۵":"أكتوبر ٢٠٢٦","برنامه محتوایی":"خطة المحتوى","ش":"س","ی":"ح","د":"ن","س":"ث","چ":"ر","پ":"خ","ج":"ج","امروز · ۲۰:۳۰":"اليوم · ٢٠:٣٠","معرفی قابلیت دایرکت هوشمند":"التعريف بالرسائل الذكية","ویدیو + کپشن + کاور":"فيديو + وصف + غلاف","زمان‌بندی شد":"تمت الجدولة","فردا · ۱۲:۰۰":"غداً · ١٢:٠٠","آموزش ساخت اولین جریان هوشمند":"شرح إنشاء أول مسار ذكي","پست + کاروسل":"منشور + شرائح","فردا · ۱۸:۰۰":"غداً · ١٨:٠٠","معرفی قابلیت‌های هوشمند":"التعريف بالمزايا الذكية","استوری + دعوت به اقدام":"قصة + دعوة لاتخاذ إجراء","پیش‌نویس":"مسودة","انتشار فوری نمونه":"جرّب النشر الفوري","برای شبیه‌سازی کلیک کنید":"انقر للمحاكاة","وقتی محتوا آماده شد، مستقیم منتشرش کن یا زمان بده":"انشر فوراً أو جدوِل لوقت لاحق","خروجی استودیوی هوشمند همان‌جا وارد بخش انتشار می‌شود؛ مدیا و کپشن آماده‌اند و فقط تصمیم می‌گیری الان منتشر شود یا برای زمان مناسب برنامه‌ریزی شود.":"ينتقل إنتاج الاستوديو مباشرةً إلى النشر، مع الوسائط والوصف جاهزين؛ اختر النشر الآن أو الجدولة.","تصویر و کپشن":"صورة ووصف","ویدیو و کاور":"فيديو وغلاف","انتشار سریع":"نشر سريع","دایرکت هوشمند اینستاگرام + جریان‌ساز":"رسائل إنستغرام الذكية + مُنشئ المسارات","هر تعامل می‌تواند شروع یک مسیر هوشمند باشد":"كل تفاعل قد يبدأ مساراً ذكياً","دایرکت هوشمند اینستاگرام فراتر از یک ربات دایرکت ساده است؛ یک کامنت، دایرکت یا پاسخ می‌تواند گفتگو را شروع کند، پاسخ خودکار مناسب بفرستد، اطلاعات مخاطب را نگه دارد و مسیر فروش یا پشتیبانی را ادامه دهد. در سناریوهای متصل، می‌توان پیام و لید را به تلگرام فرستاد و ادامه پاسخ‌گویی دایرکت را از پل زنده تلگرام مدیریت کرد.":"الرسائل الذكية في إنستغرام أكثر من مجرد روبوت دردشة؛ يمكن لتعليق أو رسالة بدء المحادثة وإرسال ردّ مخصص وحفظ بيانات العميل ومتابعة المبيعات أو الدعم. وتتيح المسارات المتصلة إرسال العملاء المحتملين إلى تليغرام ومتابعة الردود المباشرة.","از کامنت اولیه تا پیشنهاد و ثبت درخواست":"من التعليق الأول إلى العرض وتسجيل الطلب","پشتیبانی هوشمند":"دعم ذكي","از سؤال کاربر تا پاسخ یا ارجاع مناسب":"من سؤال العميل إلى الرد أو الإحالة المناسبة","جذب مخاطب":"جذب الجمهور","از درخواست مشاوره تا ثبت اطلاعات و پیگیری":"من طلب الاستشارة إلى حفظ البيانات والمتابعة","جریان‌ساز تصویری":"مُنشئ المسارات المرئي","جریان فروش و ثبت سفارش":"مسار المبيعات وتسجيل الطلب","فروش":"مبيعات","▶ اجرای مسیر":"▶ تشغيل المسار","شروع جریان":"بداية المسار","ورود کاربر به سناریوی فعال":"يدخل المستخدم إلى السيناريو النشط","این مرحله چه کاری می‌کند؟":"ماذا يحدث في هذه المرحلة؟","کامنت شامل «قیمت»":"التعليق يحتوي على «السعر»","آماده اجرا":"جاهز للتشغيل","روی «اجرای مسیر» بزن یا سناریو را تغییر بده":"اضغط تشغيل المسار أو اختر سيناريو آخر","ارتباط هوشمند فراتر از متن":"تواصل ذكي يتجاوز النص","اینستاگرام را به تلگرام وصل کن؛ به ویس هم هوشمند جواب بده":"اربط إنستغرام بتليغرام وردّ على الرسائل الصوتية بذكاء","دو قابلیت متفاوت اما مکمل: مدیریت ادامه گفتگوهای اینستاگرام از تلگرام، و درک و پاسخ‌گویی هوشمند به پیام‌های صوتی داخل دایرکت.":"ميزتان متكاملتان: متابعة محادثات إنستغرام من تليغرام، وفهم الرسائل الصوتية في الخاص والرد عليها بذكاء.","پاسخ دایرکت اینستاگرام از تلگرام":"الرد على رسائل إنستغرام من تليغرام","در جریان‌های متصل، پیام یا لید اینستاگرام را به تلگرام بفرست و با پل Live Reply ادامه پاسخ‌گویی را از همان تلگرام به مسیر گفتگو برگردان.":"أرسل الرسائل والعملاء المحتملين من إنستغرام إلى تليغرام ثم تابع المحادثة من تليغرام عبر جسر Live Reply.","پاسخگویی دایرکت در تلگرام":"الرد على الخاص من تليغرام","پاسخ و پیگیری لید":"الرد على العملاء المحتملين ومتابعتهم","دایرکت جدید":"رسالة مباشرة جديدة","سلام، شرایط مشاوره چیه؟":"مرحباً، ما شروط الاستشارة؟","متصل":"متصل","پیام جدید از اینستاگرام":"رسالة جديدة من إنستغرام","پاسخ از تلگرام ↗":"الرد من تليغرام ↗","پاسخ هوشمند به ویس و صوت در دایرکت":"ردود صوتية ذكية في الرسائل الخاصة","پیام صوتی ورودی را تشخیص بده، محتوای ویس را برای AI قابل فهم کن و در صورت فعال بودن پاسخ صوتی، جواب هوشمند را دوباره به Voice تبدیل کن.":"اكتشف الرسائل الصوتية ودع الذكاء الاصطناعي يفهمها ويرد نصياً أو صوتياً عند تفعيل الرد الصوتي.","پاسخ به ویس در دایرکت":"الرد على الصوتيات في الخاص","پشتیبانی هوشمند صوتی":"دعم صوتي ذكي","پاسخ صوتی AI":"رد صوتي بالذكاء الاصطناعي","ویس را می‌فهمد و پاسخ را می‌سازد":"يفهم الصوت ويُعدّ الرد","پاسخ هوشمند صوتی آماده شد":"الرد الصوتي الذكي جاهز","چرا یک پلتفرم یکپارچه؟":"لماذا منصة متكاملة واحدة؟","کمتر بین ابزارها جابه‌جا شو؛ بیشتر روی کسب‌وکارت تمرکز کن":"قلّل التنقل بين الأدوات وركّز على عملك","مسئله فقط تعداد قابلیت‌ها نیست؛ ارزش اصلی این است که محتوا، انتشار، گفتگو، هوش مصنوعی و مخاطب از هم جدا نباشند.":"القيمة ليست في عدد المزايا وحده؛ بل في تكامل المحتوى والنشر والمحادثات والذكاء الاصطناعي والعملاء.","بدون Magic":"بدون ماجيك","فرآیندهای پراکنده":"عمليات متفرقة","چند ابزار":"أدوات متعددة","چند پنل":"لوحات متعددة","چند اشتراک":"اشتراكات متعددة","انتقال دستی اطلاعات":"نقل البيانات يدوياً","پیگیری پراکنده":"متابعات متفرقة","با Magic":"مع ماجيك","یک مسیر یکپارچه":"مسار موحد","محتوا":"المحتوى","اتوماسیون":"الأتمتة","مخاطب":"جهات الاتصال","شروع ساده با Magic":"ابدأ بسهولة مع ماجيك","Magic Super Manager را":"جرّب Magic Super Manager","رایگان امتحان کن":"مجاناً","با شماره موبایل یا جیمیلت وارد شو، پیجت را از مسیر رسمی Meta متصل کن و شروع کن.":"سجّل الدخول برقم هاتفك أو عبر غوغل، واربط حسابك بالطريقة الرسمية لميتا وابدأ.","اتصال رسمی از مسیر Meta":"اتصال رسمي عبر ميتا","دسترسی از طریق اپلیکیشن رسمی، بدون دریافت رمز پیج":"وصول عبر التطبيق الرسمي دون طلب كلمة المرور","شروع سریع و ساده":"إعداد سريع وسهل","اتصال پیج و ورود به پنل بدون پیچیدگی فنی":"اربط حسابك وادخل إلى المنصة دون تعقيد تقني","همه‌چیز در یک مسیر":"كل شيء في مسار واحد","محتوا، انتشار، گفتگو و مخاطب کنار هم":"المحتوى والنشر والمحادثات والعملاء معاً","پیجت را متصل کن":"اربط حسابك","از مسیر رسمی Instagram / Meta حساب موردنظرت را به پنل وصل کن.":"اربط حساب إنستغرام عبر المسار الرسمي للتفويض من إنستغرام / ميتا.","یک جریان هوشمند بساز":"أنشئ مساراً ذكياً","یک سناریوی ساده برای کامنت، دایرکت یا پاسخ مخاطب آماده کن.":"جهّز سيناريو بسيطاً لتعليق أو رسالة أو رد من الجمهور.","با هوش مصنوعی تست کن":"اختبر بالذكاء الاصطناعي","یک دایرکت واقعی را امتحان کن و پاسخ‌گویی هوشمند را ببین.":"جرّب رسالة حقيقية وشاهد الردود الذكية.","تصویر، ویدیو یا کپشن را در همان محیط آماده کن.":"جهّز صورة أو فيديو أو وصفاً في مساحة العمل نفسها.","منتشر یا زمان‌بندی کن":"انشر أو جدوِل","خروجی آماده را مستقیم منتشر کن یا برای زمان مناسب در صف بگذار.":"انشر المحتوى مباشرةً أو جدوِله لوقت لاحق.","نتیجه را برای کسب‌وکارت ببین":"شاهد الأثر على عملك","فروش، پشتیبانی و ارتباط با مخاطب را در یک سیستم واقعی امتحان کن.":"جرّب المبيعات والدعم والتواصل مع العملاء ضمن نظام واحد.","اینستاگرام قرار نیست فقط یک پیج باشه.":"يمكن لحساب إنستغرام أن يكون أكثر من مجرد صفحة.","می‌تونه یک سیستم فروش، پشتیبانی و ارتباط با مشتری باشه. اگر به کارت اومد ادامه بده؛ اگر نه، چیزی رو از دست ندادی.":"يمكنه أن يصبح نظاماً للمبيعات والدعم وعلاقات العملاء. جرّبه مجاناً ثم قرر بنفسك.","بدون پیچیدگی":"دون تعقيد","بدون تعهد اولیه":"دون التزام مسبق","شروع سریع":"بداية سريعة","سوال‌های متداول":"الأسئلة الشائعة","قبل از شروع، این‌ها را بدان":"ما ينبغي معرفته قبل البدء","چند جواب کوتاه برای سوال‌هایی که معمولاً قبل از ساخت اولین جریان هوشمند پیش می‌آید.":"إجابات موجزة عن الأسئلة الشائعة قبل إنشاء أول مسار ذكي.","آیا برای استفاده نیاز به دانش فنی دارم؟":"هل أحتاج إلى خبرة تقنية؟","نه. بخش زیادی از سیستم با جریان‌های هوشمند و تنظیمات قابل ساخت و مدیریت است و برای شروع لازم نیست برنامه‌نویس باشی.":"لا. يمكنك إنشاء معظم المسارات وإدارتها باستخدام الأدوات المرئية والإعدادات دون برمجة.","می‌تونم جریان هوشمند مخصوص کسب‌وکار خودم بسازم؟":"هل يمكنني إنشاء مسارات خاصة بعملي؟","بله. منطق و مسیر تعامل را می‌توانی متناسب با سناریوی کسب‌وکارت طراحی و شخصی‌سازی کنی؛ از فروش و جذب مخاطب تا پشتیبانی و پیگیری.":"نعم، خصّص منطق ومسار التفاعل وفق احتياجات عملك، من المبيعات وجذب العملاء إلى الدعم والمتابعة.","آیا فقط برای فروشگاه‌هاست؟":"هل المنصة مخصصة للمتاجر فقط؟","خیر. می‌توان از سیستم برای فروش، لیدگیری، پشتیبانی، خدمات، املاک، تولیدکنندگان محتوا و سناریوهای مختلف ارتباط با مخاطب استفاده کرد.":"لا، يمكن استخدامها للمبيعات والخدمات والعقارات وصنّاع المحتوى والدعم وجذب العملاء المحتملين.","آیا هوش مصنوعی خودش با مشتری صحبت می‌کند؟":"هل يستطيع الذكاء الاصطناعي التحدث مع عملائي؟","بله. می‌توانی پاسخ‌گویی، تحلیل پیام و جمع‌آوری اطلاعات موردنیاز را در جریان‌های هوشمند مبتنی بر هوش مصنوعی تعریف کنی.":"نعم، يمكنك إعداد ردود وتحليل رسائل وجمع بيانات عبر مسارات ذكية مدعومة بالذكاء الاصطناعي.","آیا می‌توانم تیمم را هم وارد فرآیند کنم؟":"هل يمكن لفريقي المشاركة في المسارات؟","بله. در سناریوهای مربوط به مخاطب و لید می‌توان مسیر ارجاع به نیروی انسانی را تعریف کرد تا در نقطه مناسب، ادامه گفتگو به تیم سپرده شود.":"نعم، يمكنك إعداد إحالات لأعضاء الفريق كي يتولوا المحادثة عند الحاجة.","چطور شروع کنم؟":"كيف أبدأ؟","وارد پنل شو، رایگان شروع کن و اولین جریان هوشمند خودت را بساز. بعد می‌توانی محتوا، انتشار و گفتگوهای خودکار را قدم‌به‌قدم به همان سیستم اضافه کنی.":"سجّل الدخول وابدأ مجاناً وأنشئ أول مسار ذكي، ثم أضف إنشاء المحتوى والنشر والمحادثات المؤتمتة تدريجياً.","آماده‌ای اولین جریان هوشمندت را بسازی؟":"هل أنت مستعد لإنشاء أول مسار ذكي؟","چند دقیقه برای شروع کافیه.":"يمكنك البدء خلال دقائق.","جزئیات بیشتر":"مزيد من التفاصيل","۳۲+ قابلیت در یک پلتفرم":"أكثر من ٣٢ ميزة في منصة واحدة","جزئیات بیشتر برای زمانی که می‌خواهی عمیق‌تر ببینی Magic چه کارهایی را در یک محیط کنار هم قرار داده است.":"اكتشف جميع إمكانات ماجيك بالتفصيل عندما ترغب في ذلك.","مسیرهای خودکار برای گفتگو":"مسارات محادثة مؤتمتة","از یک کامنت یا دایرکت، یک مسیر مشخص برای پاسخ، پیگیری و رسیدن به اقدام نهایی بساز.":"حوّل أي تعليق أو رسالة إلى مسار محدد للرد والمتابعة وصولاً إلى الإجراء النهائي.","رویداد":"حدث","پاسخ خودکار به کامنت":"ردود تلقائية على التعليقات","تشخیص کامنت هدف و اجرای پاسخ، دایرکت یا ادامه جریان بر اساس قانون تعریف‌شده.":"اكتشف التعليقات المطابقة وشغّل الرد أو الرسالة أو المسار حسب قواعدك.","کلمه کلیدی":"كلمة مفتاحية","قانون":"قاعدة","مسیر متفاوت برای هر نوع گفتگو":"مسارات مختلفة حسب نوع المحادثة","ساخت چند جریان مستقل برای پیام‌های ورودی و هدایت هر گفتگو به مسیر مناسب.":"أنشئ مسارات مستقلة ووجّه الرسائل الواردة إلى المسار المناسب.","پیام ورودی":"رسالة واردة","کلیدواژه":"كلمة مفتاحية","مسیر مستقل":"مسار مستقل","پاسخ به استوری و منشن":"الرد على القصص والإشارات","ساخت مسیرهای مجزا برای پاسخ استوری، منشن و رویدادهای تعاملی قابل پشتیبانی.":"أنشئ مسارات مستقلة للرد على القصص والإشارات والتفاعلات المدعومة.","منشن":"إشارة","تصمیم‌گیری بر اساس پاسخ مخاطب":"اتخاذ القرار بناءً على رد المستخدم","بر اساس جواب یا وضعیت مخاطب، ادامه گفتگو را به مسیر مناسب هدایت کن.":"وجّه المحادثات وفق إجابة المستخدم أو حالته.","پاسخ مخاطب":"رد المستخدم","مسیر بله":"مسار نعم","مسیر خیر":"مسار لا","شرط دلخواه":"شرط مخصص","تشخیص متن، صوت، تصویر و ویدیو":"تمييز النص والصوت والصور والفيديو","تفکیک ورودی متن، صوت، تصویر، ویدیو و فایل برای هدایت به مسیر مناسب.":"ميّز أنواع الرسائل الواردة ووجّه النص والصوت والصور والفيديو والملفات بشكل صحيح.","صوت":"صوت","پاسخ‌گویی و تصمیم‌گیری با هوش مصنوعی":"الردود والقرارات بالذكاء الاصطناعي","هوش مصنوعی پیام را می‌فهمد، پاسخ مناسب می‌دهد و مسیر بعدی گفتگو را انتخاب می‌کند.":"يفهم الذكاء الاصطناعي الرسالة ويرد بما يناسبها ويختار الخطوة التالية.","تحلیل":"تحليل","تصمیم":"قرار","زمینه":"سياق","فرآیندهای چندمرحله‌ای قابل استفاده مجدد":"مسارات متعددة الخطوات قابلة لإعادة الاستخدام","فرآیندهای تکراری را یک‌بار بساز و در مسیرهای مختلف دوباره استفاده کن.":"أنشئ العملية مرة واحدة وأعد استخدامها في مسارات متعددة.","فرایند":"عملية","قابل استفاده مجدد":"قابل لإعادة الاستخدام","انتقال داده":"نقل البيانات","بازگشت":"عودة","کارت و دکمه تعاملی":"بطاقات وأزرار تفاعلية","ارسال کارت‌های تصویری و دکمه‌های انتخاب برای ساخت تجربه هدایت‌شده در گفتگو.":"أرسل بطاقات مرئية وأزرار اختيار لتوجيه المستخدم أثناء المحادثة.","کارت":"بطاقة","دکمه":"زر","انتخاب":"اختيار","ادامه مسیر بر اساس دنبال‌کردن پیج":"مسارات تعتمد على متابعة الحساب","بررسی دنبال‌کردن حساب و ادامه مسیر بر اساس نتیجه بررسی کاربر.":"تحقق من متابعة المستخدم لحسابك وحدد الخطوة التالية وفق النتيجة.","بررسی":"تحقق","دنبال‌کردن":"متابعة","تأیید":"تأكيد","ادامه":"متابعة","پیگیری زمان‌بندی‌شده":"متابعة مجدولة","ادامه خودکار فرایند با تأخیر و پیگیری مخاطب در زمان تعیین‌شده.":"تابع المسارات تلقائياً بعد تأخير وتواصل مع العملاء في الموعد المحدد.","تأخیر":"تأخير","زمان":"وقت","الگوهای آماده برای شروع سریع":"قوالب جاهزة للبدء السريع","با الگوهای آماده شروع کن و آن‌ها را متناسب با کسب‌وکارت شخصی‌سازی کن.":"ابدأ بالقوالب الجاهزة وخصّصها بما يناسب عملك.","الگو":"قالب","ویرایش":"تعديل","ذخیره":"حفظ","تست مسیر قبل از فعال‌سازی":"اختبر المسارات قبل تفعيلها","قبل از فعال‌کردن، مسیر را اجرا کن و مطمئن شو تجربه مخاطب درست پیش می‌رود.":"شغّل مسارك قبل تفعيله للتحقق من تجربة المستخدم.","تست":"اختبار","شبیه‌سازی":"محاكاة","مرحله":"مرحلة","بررسی آماده‌بودن اتوماسیون":"فحص جاهزية الأتمتة","کنترل خطاها، هشدارها و پیشنهادهای ساختاری قبل از فعال‌سازی جریان.":"راجع الأخطاء والتحذيرات والتوصيات البنيوية قبل تفعيل المسار.","خطا":"خطأ","هشدار":"تحذير","آمادگی":"الجاهزية","انتقال و نسخه‌برداری از مسیرها":"تصدير المسارات ونسخها","یک مسیر آماده را برای نسخه پشتیبان، انتقال یا استفاده دوباره ذخیره و بازیابی کن.":"احفظ نسخاً احتياطية من المسارات وانقلها وأعد استخدامها عند الحاجة.","نسخه پشتیبان":"نسخة احتياطية","انتقال":"نقل","استفاده دوباره":"إعادة الاستخدام","بازیابی":"استعادة","مرتب‌سازی خودکار مسیرهای گفتگو":"ترتيب مسارات المحادثة تلقائياً","مسیرهای بزرگ را خودکار مرتب کن تا روند گفتگو خوانا و قابل مدیریت بماند.":"رتّب المسارات الكبيرة تلقائياً لتكون واضحة وسهلة الإدارة.","مرتب‌سازی":"ترتيب","مسیرهای بزرگ":"مسارات كبيرة","نمای واضح":"عرض واضح","مدیریت ساده":"إدارة سهلة","گزارش اجرای اتوماسیون":"تقارير تنفيذ الأتمتة","نمایش اجراها، خطاها، عملکرد مسیرها و رفتار دکمه‌ها برای بررسی اتوماسیون.":"راجع عمليات التنفيذ والأخطاء وأداء المسارات وتفاعلات الأزرار.","اجرا":"تنفيذ","گزارش":"تقرير","مدیریت همه گفتگوها در یک صندوق":"إدارة كل المحادثات في صندوق واحد","صندوق گفتگوی متمرکز برای مشاهده و پاسخ‌گویی به گفتگوهای مخاطبان در یک محیط واحد.":"صندوق موحد لعرض محادثات العملاء والرد عليها.","پاسخ زنده":"رد مباشر","تاریخچه":"السجل","پاسخ هوشمند صوتی در دایرکت":"ردود صوتية ذكية في الخاص","پیام صوتی و ویس ورودی را در جریان هوشمند پردازش کن و در صورت فعال بودن Voice AI، پاسخ هوشمند را به‌صورت صوتی یا متنی برگردان.":"عالج الرسائل الصوتية الواردة وأرسل رداً صوتياً أو نصياً عند تفعيل Voice AI.","ارسال صوت":"إرسال صوت","دریافت صوت":"استقبال صوت","پخش":"تشغيل","ذخیره اطلاعات و وضعیت هر مخاطب":"حفظ بيانات وحالة جهة الاتصال","اطلاعات، علایق و وضعیت هر مخاطب را نگه دار تا گفتگو و پیگیری شخصی‌تر شود.":"احتفظ ببيانات واهتمامات وحالة كل جهة اتصال لتخصيص التواصل والمتابعة.","دسته‌بندی":"تصنيف","پروفایل":"ملف شخصي","انتشار فوری محتوا":"نشر المحتوى فوراً","ارسال محتوای آماده به مسیر انتشار بدون نیاز به جابه‌جایی بین ابزارهای جداگانه.":"أرسل المحتوى الجاهز إلى النشر مباشرةً دون التنقل بين الأدوات.","زمان‌بندی انتشار":"جدولة النشر","قرار دادن محتوا در صف انتشار با تاریخ و ساعت مشخص و مدیریت برنامه محتوایی.":"ضع المحتوى في قائمة النشر بمواعيد محددة وأدر تقويمك.","تقویم":"تقويم","صف":"قائمة انتظار","تاریخ":"تاريخ","ساعت":"ساعة","ساخت هوشمند محتوا":"إنشاء محتوى ذكي","ساخت و آماده‌سازی محتوای تصویری، ویدیویی و متنی در محیط اختصاصی پنل.":"أنشئ وجهّز الصور والفيديوهات والنصوص في مساحة مخصصة.","خروجی":"مخرجات","طراحی و ویرایش تصویر":"تصميم الصور وتحريرها","افزودن متن، شکل، لایه، تصویر، استیکر و تنظیمات ظاهری روی خروجی محتوا.":"أضف النصوص والأشكال والطبقات والصور والملصقات والتنسيقات إلى المحتوى.","لایه":"طبقة","استیکر":"ملصق","ساخت و بازنویسی کپشن":"إنشاء أوصاف المنشورات وإعادة صياغتها","تولید یا بازنویسی کپشن فارسی و انتقال مستقیم آن همراه محتوای آماده انتشار.":"أنشئ أو أعد صياغة أوصاف المنشورات وأرسلها مباشرةً مع المحتوى للنشر.","بازنویسی":"إعادة صياغة","لحن":"أسلوب","انتقال مستقیم به انتشار":"نقل مباشر للنشر","بازگشت خروجی استودیو به پنجره انتشار همراه مدیا و کپشن آماده ادامه کار.":"انقل إنتاج الاستوديو إلى نافذة النشر مع الوسائط والوصف الجاهزين.","مدیا":"وسائط","مدیریت حساب‌های اینستاگرام":"إدارة حسابات إنستغرام","افزودن، انتخاب و مدیریت حساب فعال برای استفاده در بخش‌های مختلف پنل.":"أضف الحساب النشط واختره وأدره لاستخدامه في أقسام المنصة.","حساب":"حساب","انتخاب فعال":"تحديد النشط","مدیریت":"إدارة","اتصال":"اتصال","کتابخانه و وضعیت محتوا":"مكتبة المحتوى وحالته","مشاهده محتوای آماده، پیش‌نویس، زمان‌بندی‌شده و منتشرشده در یک ساختار مدیریتی.":"اعرض المسودات والمحتوى المجدول والجاهز والمنشور في مكان واحد.","زمان‌بندی":"جدولة","گفتگو با هوش مصنوعی":"المحادثة مع الذكاء الاصطناعي","تعامل متنی و صوتی با هوش مصنوعی داخل پنل برای دریافت پاسخ و اجرای سناریوهای هوشمند.":"تفاعل مع الذكاء الاصطناعي نصياً أو صوتياً داخل المنصة للحصول على الإجابات وتنفيذ المسارات.","کنترل مصرف ابزارهای هوش مصنوعی":"التحكم في استخدام أدوات الذكاء الاصطناعي","مدیریت مصرف سرویس‌های هوش مصنوعی با اعتبار مجیک و کنترل موجودی کاربر.":"أدر استهلاك خدمات الذكاء الاصطناعي عبر رصيد ماجيك وتابع رصيدك.","مجیک":"ماجيك","مصرف":"استهلاك","اعتبار":"رصيد","کنترل":"تحكم","اتصال تلگرام به جریان اینستاگرام":"ربط تليغرام بمسارات إنستغرام","ارسال پیام و لید به تلگرام و ادامه زنده پاسخ‌گویی در جریان‌های دارای Telegram Live Reply Bridge.":"أرسل الرسائل والعملاء المحتملين إلى تليغرام واستمر في الرد عبر جسر Telegram Live Reply.","اینستاگرام":"إنستغرام","پردازش ویس و پاسخ صوتی AI":"معالجة الصوت والرد الصوتي بالذكاء الاصطناعي","تشخیص پیام صوتی ورودی، پردازش با هوش مصنوعی و امکان برگرداندن پاسخ به‌صورت Voice یا متن.":"اكتشف الرسائل الصوتية وعالجها بالذكاء الاصطناعي ثم ردّ صوتياً أو نصياً.","نمایش ۲۲ قابلیت دیگر":"عرض ٢٢ ميزة إضافية","پیجت را متصل کن و اولین اتوماسیونت را بساز.":"اربط حسابك وأنشئ أول أتمتة لك.","ارتباط مستقیم":"تواصل مباشر","سؤالی داری؟ مستقیم با ما در ارتباط باش.":"لديك أسئلة؟ تواصل معنا مباشرةً.","پیامت را همین‌جا بفرست؛ درخواست مستقیماً به تلگرام ما می‌رسد. برای ارتباط سریع‌تر هم می‌توانی از تلگرام، واتساپ یا تماس مستقیم استفاده کنی.":"أرسل رسالتك هنا لتصل مباشرة إلى تليغرام الخاص بنا. يمكنك التواصل أيضاً عبر واتساب أو الاتصال الهاتفي.","پیام مستقیم":"رسالة مباشرة","معمولاً سریع‌ترین راه برای شروع گفتگو":"غالباً أسرع وسيلة لبدء الحوار","نام / مجموعه":"الاسم / الشركة","شماره موبایل یا ایمیل":"رقم الهاتف أو البريد الإلكتروني","موضوع پیام":"موضوع الرسالة","سؤال درباره Magic Super Manager":"سؤال عن Magic Super Manager","راهنمای شروع و اتصال پیج":"البدء وربط الحساب","همکاری یا پیشنهاد":"تعاون أو اقتراح","سایر":"أخرى","پیام شما":"رسالتك","ارسال پیام":"إرسال الرسالة","گفتگوی مستقیم در تلگرام":"محادثة مباشرة عبر تليغرام","واتساپ":"واتساب","ارسال پیام در واتساپ":"إرسال رسالة عبر واتساب","تماس مستقیم":"اتصال مباشر","برای تماس، روی این باکس بزن":"انقر على هذه البطاقة للاتصال","یک مسیر، چند راه ارتباطی":"منصة واحدة وطرق متعددة للتواصل","هر روشی که راحت‌تری انتخاب کن؛ پیام فرم هم بدون نمایش اطلاعات فنی، مستقیم از سمت سرور ارسال می‌شود.":"اختر طريقة التواصل الأنسب لك. تُرسل رسائل النموذج مباشرةً عبر خادمنا بأمان.","محتوا · انتشار · اتوماسیون · مخاطب":"المحتوى · النشر · الأتمتة · العملاء","سؤالی داری؟ از من بپرس ✦":"لديك سؤال؟ اسألني ✦","منوی اصلی":"القائمة الرئيسية","ورود به حساب کاربری":"تسجيل الدخول إلى حسابك","ورود به Magic Super Manager":"تسجيل الدخول إلى Magic Super Manager","تغییر تم":"تغيير المظهر","باز کردن منوی موبایل":"فتح قائمة الهاتف","بستن منوی موبایل":"إغلاق قائمة الهاتف","بستن منو":"إغلاق القائمة","منوی موبایل":"قائمة الهاتف","محتوای هوشمند بساز! گفتگو رو هوشمند کن؛ انتشار رو بسپار به جادو!":"أنشئ محتوى ذكياً! وأتمت المحادثات ودع ماجيك يتولى النشر!","اعتماد و مزیت‌های اصلی":"المزايا الأساسية والثقة","دموی تعاملی دایرکت هوشمند":"عرض تفاعلي للرسائل الذكية","انتخاب نمونه جریان":"اختر مساراً تجريبياً","اقدام‌های دموی موبایل":"إجراءات العرض على الهاتف","خروجی‌های استودیوی هوشمند":"مخرجات الاستوديو الذكي","روش‌های انتشار":"طرق النشر","مسیرهای دایرکت هوشمند":"مسارات الرسائل الذكية","مراحل جریان هوشمند":"مراحل المسار الذكي","امکانات صندوق گفتگو":"مزايا صندوق المحادثات","اطلاعات مدیریت مخاطب":"معلومات إدارة العملاء","کاربردهای هوش مصنوعی":"استخدامات الذكاء الاصطناعي","مزایای مدیریت چند پیج":"مزايا إدارة حسابات متعددة","امکانات اتصال تلگرام و اینستاگرام":"مزايا ربط تليغرام بإنستغرام","امکانات پاسخ صوتی هوشمند":"مزايا الردود الصوتية الذكية","نمایش نمونه اتصال تلگرام و اینستاگرام":"عرض ربط تليغرام بإنستغرام","نمایش نمونه پاسخ هوشمند صوتی":"عرض الرد الصوتي الذكي","نام یا نام مجموعه":"اسمك أو اسم الشركة","راه ارتباطی با شما":"كيف يمكننا التواصل معك؟","کوتاه بگو چه چیزی نیاز داری یا چه سؤالی داری…":"أخبرنا بما تحتاجه أو اطرح سؤالك…","Magic Super Manager؛ نرم‌افزار مدیریت پیج و اتوماسیون اینستاگرام برای تولید محتوا، زمان‌بندی انتشار، دایرکت هوشمند، کامنت به دایرکت و مدیریت مخاطب.":"Magic Super Manager منصة لإدارة إنستغرام وأتمتته بالذكاء الاصطناعي، لإنشاء المحتوى وجدولة النشر والرسائل الذكية وتحويل التعليقات إلى رسائل وإدارة العملاء.","بله. می‌توانی پاسخ‌گویی، تحلیل پیام، پردازش ویس و در سناریوهای فعال پاسخ صوتی هوشمند را در جریان‌های هوش مصنوعی تعریف کنی.":"نعم. يمكنك إعداد ردود وتحليل رسائل ومعالجة الصوت وردود صوتية ذكية في المسارات المدعومة.","Magic Super Manager | مدیریت پیج و اتوماسیون اینستاگرام":"Magic Super Manager | إدارة إنستغرام والأتمتة","تریگر شناسایی شد؛ کامنت «قیمت» وارد جریان فروش شد.":"تم اكتشاف المحفّز: دخل تعليق «السعر» إلى مسار المبيعات.","سلام سارا 👋 خوش اومدی. دنبال کدوم مدل هستی؟ اقتصادی، حرفه‌ای یا ویژه؟":"أهلاً سارة 👋 أي باقة تفضلين: الأساسية أم الاحترافية أم المميزة؟","مدل حرفه‌ای رو می‌خوام، برای پیجم مناسبه؟":"أريد الباقة الاحترافية، هل تناسب حسابي؟","عامل هوش مصنوعی نیاز مخاطب را از متن گفتگو تحلیل کرد.":"حلّل وكيل الذكاء الاصطناعي احتياجات العميل من المحادثة.","بله. با توجه به چیزی که گفتی مدل حرفه‌ای برای حجم کاری تو مناسب‌تره. مشخصاتش رو برات می‌فرستم.":"نعم! بناءً على احتياجاتك، الباقة الاحترافية أنسب لك. سأرسل لك التفاصيل.","پلن حرفه‌ای":"الباقة الاحترافية","اتوماسیون کامل + انتشار + استودیوی هوشمند":"أتمتة كاملة + نشر + استوديو ذكي","دیدن جزئیات":"عرض التفاصيل","۰:۰۹":"٠:٠٩","پیام صوتی دریافت و برای ادامه جریان تشخیص داده شد.":"تم استقبال الرسالة الصوتية وفهمها للمتابعة.","صدات رو گرفتم. گفتی همین پلن رو می‌خوای و قبلش شرایط شروع رو می‌پرسی؛ الان برات ثبت اولیه انجام می‌دم.":"فهمت رسالتك الصوتية. تريد هذه الباقة وتسأل عن طريقة البدء؛ سأُنشئ طلبك الأولي الآن.","زیرجریان ثبت سفارش اجرا شد و اطلاعات مخاطب در وضعیت سفارش ذخیره شد.":"تم تنفيذ مسار الطلب الفرعي وحفظ بيانات العميل والطلب.","✓ درخواست با موفقیت ثبت شد و پیام تأیید برای کاربر ارسال شد.":"✓ تم حفظ الطلب وإرسال رسالة التأكيد بنجاح.","سناریوی مشاوره هوشمند":"سيناريو الاستشارة الذكية","ورود از دایرکت صوتی":"البداية من رسالة صوتية خاصة","کاربر یک پیام صوتی برای مشاوره می‌فرستد":"يرسل العميل رسالة صوتية لطلب الاستشارة","۰:۱۴":"٠:١٤","نوع پیام «صوت» تشخیص داده شد و وارد مسیر مشاوره صوتی شد.":"تم التعرف على الرسالة الصوتية وتوجيهها إلى مسار الاستشارة الصوتية.","هوش مصنوعی موضوع پیام را تحلیل کرد: «برنامه‌ریزی محتوا برای پیج فروشگاهی».":"حدّد الذكاء الاصطناعي الموضوع: «تخطيط محتوى لمتجر إلكتروني».","برای پیج فروشگاهی بهتره اول هدف هفته و تعداد انتشار رو مشخص کنیم. الان یک نمونه برنامه برات می‌سازم.":"بالنسبة لمتجرك، لنحدد الهدف الأسبوعي وعدد المنشورات. سأُعد خطة نموذجية.","نمونه برنامه هفتگی":"خطة أسبوعية نموذجية","۳ پست + ۲ ریلز + ۵ استوری با زمان‌بندی پیشنهادی":"٣ منشورات + ٢ ريلز + ٥ قصص مع جدول مقترح","مشاهده برنامه":"عرض الخطة","عالیه. می‌خوام همین سبک رو برای پیجم اجرا کنم.":"رائع! أريد تطبيق هذا الأسلوب على حسابي.","خیلی خوب. برای شروع فقط حوزه فعالیت و تعداد محصولاتت رو بفرست تا مسیرت شخصی‌سازی بشه.":"ممتاز. أرسل مجال عملك وعدد المنتجات لأخصص المسار لك.","فروش قهوه؛ حدود ۲۵ محصول.":"بيع القهوة، نحو ٢٥ منتجاً.","اطلاعات مخاطب به‌روزرسانی شد و تگ «مشاوره محتوا» ثبت شد.":"تم تحديث بيانات العميل وإضافة وسم «استشارة محتوى».","✓ مسیر مشاوره کامل شد و پیگیری بعدی آماده است.":"✓ اكتمل مسار الاستشارة والمتابعة جاهزة.","سناریوی پشتیبانی":"سيناريو الدعم","ورود از پیام پشتیبانی":"البداية من رسالة دعم","کاربر درباره انتشار یک محتوا سوال دارد":"يسأل المستخدم عن نشر محتوى","سلام، محتوای من زمان‌بندی شده ولی می‌خوام همین الان منتشرش کنم.":"مرحباً! المحتوى مجدول لكن أريد نشره الآن.","موضوع پیام تشخیص داده شد: «انتشار و زمان‌بندی».":"تم تحديد الموضوع: «النشر والجدولة».","سلام 👋 می‌تونی از لیست محتوا گزینه «انتشار فوری» رو بزنی. اگر بخوای مسیرش رو تصویری هم نشونت می‌دم.":"أهلاً 👋 افتح قائمة المحتوى واختر «النشر الفوري». ويمكنني عرض دليل مصور.","آره لطفاً تصویری بفرست.":"نعم، أرني من فضلك.","راهنمای انتشار فوری":"دليل النشر الفوري","لیست محتوا ← انتخاب آیتم ← انتشار فوری":"قائمة المحتوى ← اختيار العنصر ← النشر الفوري","باز کردن راهنما":"فتح الدليل","۰:۰۷":"٠:٠٧","ویس کاربر تحلیل شد: «انجام شد، فقط می‌خوام مطمئن شم در صف قرار گرفته».":"تم تحليل الصوت: «تم، أريد التأكد فقط أنه في قائمة الانتظار».","بله، درخواستت در صف انتشار ثبت شده و وضعیتش از همان صفحه قابل مشاهده است.":"نعم، تم تسجيل طلب النشر في القائمة ويمكنك متابعة حالته من الصفحة نفسها.","وضعیت گفتگو به «حل‌شده» تغییر کرد و تاریخچه تعامل ذخیره شد.":"تم تغيير حالة المحادثة إلى «تم الحل» وحفظ السجل.","✓ پشتیبانی بدون خروج از گفتگو کامل شد.":"✓ اكتمل الدعم دون مغادرة المحادثة.","۰:۱۰":"٠:١٠","<span class=\"avatar user-avatar\">س</span>":"<span class=\"avatar user-avatar\">س</span>","<b>پاسخ هوش مصنوعی</b>":"<b>رد الذكاء الاصطناعي</b>","نمایش فقط ۱۰ قابلیت اصلی":"عرض ١٠ مزايا رئيسية","نمایش ۲۰ قابلیت دیگر":"عرض ٢٠ ميزة أخرى","بررسی شرط":"فحص الشرط","وضعیت مخاطب":"حالة العميل","آیا کاربر صفحه را دنبال می‌کند؟":"هل يتابع المستخدم حسابك؟","دروازه دنبال‌کردن":"بوابة المتابعة","مسیر جایگزین":"مسار بديل","درخواست دنبال‌کردن و بررسی دوباره":"طلب المتابعة والتحقق مجدداً","عامل هوش مصنوعی":"وكيل الذكاء الاصطناعي","تحلیل نیاز":"تحليل الاحتياجات","تشخیص هدف، بودجه و انتخاب پاسخ":"تحديد الهدف والميزانية والرد المناسب","کارت محصول":"بطاقة المنتج","تصویر و دکمه":"صورة وزر","ارسال مدل‌ها و دکمه انتخاب":"إرسال الباقات وأزرار الاختيار","دریافت انتخاب":"استقبال الاختيار","ادامه گفتگو":"متابعة المحادثة","دریافت متن یا ویس انتخاب کاربر":"استقبال اختيار المستخدم نصياً أو صوتياً","ثبت سفارش":"تسجيل الطلب","زیرجریان":"مسار فرعي","ثبت لید، محصول و وضعیت سفارش":"حفظ العميل المحتمل والمنتج وحالة الطلب","جریان پشتیبانی هوشمند":"مسار دعم ذكي","پیام جدید":"رسالة جديدة","ورود به پشتیبانی":"الدخول إلى الدعم","دایرکت جدید مخاطب":"رسالة خاصة جديدة من العميل","تشخیص نوع پیام":"اكتشاف نوع الرسالة","فیلتر ورودی":"مرشح الإدخال","متن، صوت، تصویر، ویدیو یا فایل":"نص أو صوت أو صورة أو فيديو أو ملف","تحلیل هوشمند":"تحليل ذكي","تشخیص مسئله":"تحديد المشكلة","موضوع، فوریت و پاسخ مناسب":"الموضوع والأولوية والرد المناسب","راهنمای تصویری":"دليل مرئي","در صورت نیاز":"عند الحاجة","ارسال تصویر یا ویدیوی راهنما":"إرسال صورة أو فيديو إرشادي","نیاز به اپراتور؟":"هل تحتاج إلى موظف؟","تصمیم مسیر":"قرار المسار","آیا پاسخ خودکار کافی است؟":"هل الرد التلقائي كافٍ؟","ارجاع به اپراتور":"إحالة إلى موظف","انتقال گفتگو با تاریخچه کامل":"تحويل المحادثة مع السجل الكامل","بستن درخواست":"إغلاق الطلب","ثبت وضعیت":"حفظ الحالة","ذخیره نتیجه و تغییر وضعیت مخاطب":"حفظ النتيجة وتحديث حالة العميل","جریان جذب مخاطب و مشاوره":"مسار جذب العملاء والاستشارة","کامنت شامل «مشاوره»":"التعليق يحتوي على «استشارة»","ارسال دایرکت":"إرسال رسالة مباشرة","دعوت به ادامه":"دعوة للمتابعة","خوش‌آمد و دکمه شروع مشاوره":"ترحيب وزر بدء الاستشارة","دریافت اطلاعات":"جمع البيانات","فرم کوتاه":"نموذج قصير","نام، حوزه فعالیت و هدف":"الاسم ومجال العمل والهدف","تحلیل مخاطب":"تحليل العميل","امتیازدهی":"تقييم العميل المحتمل","تشخیص نیاز و اولویت پیگیری":"تحديد الاحتياجات وأولوية المتابعة","به‌روزرسانی مخاطب":"تحديث العميل","تگ و متغیر":"وسم ومتغير","ثبت تگ «لید مشاوره» و وضعیت":"حفظ وسم «عميل استشارة» والحالة","زیرجریان رزرو":"مسار حجز فرعي","فرایند تخصصی":"عملية متخصصة","انتخاب زمان یا مسیر ادامه":"اختيار الوقت أو الخطوة التالية","تأیید نهایی":"تأكيد نهائي","پیام پایان":"رسالة ختامية","ارسال خلاصه و ثبت پیگیری بعدی":"إرسال الملخص وحفظ المتابعة التالية","در حال اجرای مسیر…":"جارٍ تشغيل المسار…","مسیر با موفقیت اجرا شد ✓":"اكتمل المسار بنجاح ✓","۰۱۲۳۴۵۶۷۸۹":"٠١٢٣٤٥٦٧٨٩","در حال ثبت درخواست انتشار...":"جارٍ تسجيل طلب النشر…","در صف انتشار قرار گرفت ✓":"أُضيف إلى قائمة النشر ✓","ساخت کپشن با هوش مصنوعی":"إنشاء وصف المنشور بالذكاء الاصطناعي","یک کپشن فارسی حرفه‌ای با لحن صمیمی برای معرفی دایرکت هوشمند بنویس":"اكتب وصفاً احترافياً ودوداً للتعريف بالرسائل الذكية","ساخت ویدیو با هوش مصنوعی":"إنشاء فيديو بالذكاء الاصطناعي","ویدیوی کوتاه عمودی برای معرفی چرخه کامنت تا دایرکت خودکار":"فيديو عمودي قصير يقدم رحلة التعليق إلى الرسائل التلقائية","از ایده تا انتشار،<br>در یک مسیر":"من الفكرة إلى النشر،<br>في مسار واحد","اتوماسیون،<br>هوشمندتر از همیشه":"الأتمتة،<br>أذكى من أي وقت مضى","سارا محمدی":"سارة محمدي","در حال بررسی":"قيد المراجعة","جریان خوش‌آمدگویی":"مسار الترحيب","لید جدید":"عميل محتمل جديد","کاربر جدید":"مستخدم جديد","سلام، برای شروع باید کدوم بخش رو فعال کنم؟":"مرحباً، أي ميزة أبدأ بتفعيلها؟","سلام 👋 از دایرکت هوشمند شروع کن. یک جریان نمونه هم برات آماده می‌کنیم.":"أهلاً 👋 ابدأ بالرسائل الذكية، وسنجهز لك مساراً تجريبياً.","۰:۱۲":"٠:١٢","علی رضایی":"علي رضائي","ع":"ع","ثبت‌نام انجام شد":"اكتمل التسجيل","جریان ثبت‌نام":"مسار التسجيل","ثبت‌نام‌شده":"تم التسجيل","لانچ محدود":"إطلاق محدود","لینک ثبت‌نام رو دریافت کردم، قدم بعدی چیه؟":"وصلني رابط التسجيل. ما الخطوة التالية؟","عالیه 👌 بعد از ورود، اکانت اینستاگرامت رو متصل کن تا اولین جریان رو با هم فعال کنیم.":"رائع 👌 بعد الدخول، اربط حساب إنستغرام لنفعّل أول مسار.","راهنمای شروع سریع هم داخل پنل برات نمایش داده می‌شه.":"سيظهر لك دليل البدء السريع داخل اللوحة أيضاً.","مهسا کریمی":"مهسا كريمي","م":"م","پاسخ داده شد":"تم الرد","پیگیری هوشمند":"متابعة ذكية","مشتری بالقوه":"عميل محتمل","ممنون، خیلی عالی بود 🙌":"شكراً، كان رائعاً 🙌","خوشحالم که مفید بود 🌱 اگر بخوای یک سناریوی فروش نمونه هم برات آماده می‌کنیم.":"سعيد أنه أفادك 🌱 يمكننا إعداد مسار مبيعات نموذجي لك أيضاً.","آره، برای فروش دوره خیلی خوب می‌شه.":"نعم، سيكون مناسباً جداً لبيع الدورات.","✓ پیگیری برای مخاطب آماده شد":"✓ تم تجهيز متابعة العميل","در حال ارسال…":"جارٍ الإرسال…","ارسال انجام نشد. لطفاً دوباره تلاش کن.":"تعذر إرسال الرسالة. حاول مجدداً.","پیامت با موفقیت ارسال شد.":"تم إرسال رسالتك بنجاح.","بساز!":"أنشئ!","رو":"ها","کن؛":"أذكى؛","رو بسپار به":"ودع ","آماده":"جاهز","۹:۴۱":"٩:٤١","۱":"١","۲":"٢","۳":"٣","۴":"٤","۵":"٥","۰۱":"٠١","۰۲":"٠٢","۰۳":"٠٣","۰۴":"٠٤","۰۵":"٠٥","۰۶":"٠٦"," !":"!","اتصال اینستاگرام به هوش مصنوعی":"ربط إنستغرام بالذكاء الاصطناعي","اینستاگرام را به ChatGPT و Claude وصل کن":"اربط إنستغرام بـ ChatGPT و Claude","با Magic MCP، حساب اینستاگرام متصل به مجیک را از محیط چت جی‌پی‌تی (ChatGPT)، کلاد (Claude) یا دستیار سازگار با MCP مدیریت کن؛ آمار را بررسی کن، محتوا آماده کن و کارهای مجاز را با زبان طبیعی انجام بده.":"استخدم Magic MCP لإدارة حساب إنستغرام المتصل بماجيك من ChatGPT أو Claude أو مساعد ذكاء اصطناعي متوافق مع MCP. راجع الإحصاءات وجهّز المحتوى ونفّذ المهام المسموح بها بطلبات باللغة الطبيعية.","تحلیل پیج با ChatGPT و Claude":"تحليل حساب إنستغرام باستخدام ChatGPT و Claude","از دستیار بخواه عملکرد پست‌ها و ریلزهای حساب خودت را مقایسه کند یا آمار ذخیره‌شدهٔ اینستاگرام را خلاصه کند. زمان آخرین همگام‌سازی را هم بررسی کن.":"اطلب من مساعدك مقارنة منشوراتك ومقاطع Reels أو تلخيص إحصاءات إنستغرام المحفوظة. راجع وقت آخر مزامنة لمعرفة مدى حداثة البيانات.","آماده‌سازی و انتشار محتوا با هوش مصنوعی":"تجهيز المحتوى ونشره بمساعدة الذكاء الاصطناعي","پیش‌نویس پست، استوری یا ریلز بساز و محتوای آماده را برای انتشار یا زمان‌بندی بررسی کن. انتشار واقعی فقط با دسترسی لازم و تأیید تو انجام می‌شود.":"أنشئ مسودة منشور أو قصة أو Reel وراجع المحتوى الجاهز للنشر أو الجدولة. يتطلب النشر الفعلي الصلاحيات اللازمة وتأكيدك.","دایرکت، مخاطبان و جریان‌های هوشمند":"رسائل إنستغرام وجهات الاتصال والأتمتة","گفتگوهای مجاز را بخوان، اطلاعات مخاطبان را بررسی کن و جریان‌های دایرکت هوشمند را مدیریت کن. ارسال پیام و فعال‌سازی جریان، مجوز و تأیید جداگانه می‌خواهد.":"اقرأ المحادثات المصرح بها وراجع معلومات جهات الاتصال وأدر مسارات الرسائل الذكية. يتطلب إرسال رسالة أو تفعيل مسار صلاحيات وتأكيداً منفصلين.","اتصال با حساب و مجوزهای خودت":"اتصل بحسابك وصلاحياتك","ابتدا اینستاگرامت را به مجیک متصل کن؛ سپس Magic MCP را در دستیار سازگار اضافه کن، وارد حساب مجیک شو و دسترسی‌ها را انتخاب کن. امکانات قابل استفاده به پشتیبانی دستیار و تنظیمات حساب تو بستگی دارد.":"اربط إنستغرام بماجيك أولاً، ثم أضف Magic MCP في مساعد متوافق وسجّل الدخول إلى ماجيك وحدّد الصلاحيات. تعتمد الميزات المتاحة على دعم المساعد وإعدادات حسابك.","راهنمای اتصال ChatGPT و Claude":"دليل ربط ChatGPT و Claude","اتصال اینستاگرام بدون دادن رمز به مجیک":"ربط إنستغرام دون مشاركة كلمة المرور مع ماجيك","چطور اینستاگرام را به چت جی‌پی‌تی یا کلاد وصل کنم؟":"كيف أربط إنستغرام بـ ChatGPT أو Claude؟","حساب اینستاگرامت را از مسیر رسمی به مجیک وصل کن. سپس در ChatGPT یا Claude، در صورت پشتیبانی حساب و تنظیمات دستیار از اتصال MCP، Magic MCP را اضافه کن و با حساب مجیک مجوز بده. راهنمای اتصال، نشانی سرور و مراحل را توضیح می‌دهد.":"اربط حساب إنستغرام بماجيك عبر مسار الاتصال الرسمي. ثم، إذا كان حسابك وإعدادات المساعد في ChatGPT أو Claude يدعمان اتصال MCP، أضف Magic MCP وامنحه الإذن بحساب ماجيك. يوضّح دليل الاتصال عنوان الخادم وخطوات الإعداد.","آیا اتصال اینستاگرام به هوش مصنوعی فقط برای ChatGPT است؟":"هل ربط إنستغرام بالذكاء الاصطناعي مخصص لـ ChatGPT فقط؟","خیر. Magic MCP برای ChatGPT، Claude و دیگر کلاینت‌های سازگار با MCP طراحی شده است. هر دستیار فقط به ابزارها و داده‌هایی دسترسی دارد که مجوزشان را داده‌ای؛ سازگاری و امکانات هر کلاینت باید جدا بررسی شود.":"لا. صُمّم Magic MCP للعمل مع ChatGPT و Claude وعملاء آخرين متوافقين مع MCP. يصل كل مساعد فقط إلى الأدوات والبيانات التي تسمح بها؛ ويجب التحقق من التوافق والميزات المتاحة لكل عميل.","مدیریت اینستاگرام و اتصال به ChatGPT و Claude | مجیک":"إدارة إنستغرام وربطه بـ ChatGPT و Claude | Magic","با مجیک اینستاگرام را مدیریت و به ChatGPT و Claude متصل کن؛ تحلیل آمار، تولید محتوا، زمان‌بندی انتشار و دایرکت هوشمند با دسترسی‌های انتخابی از طریق Magic MCP.":"أدر إنستغرام واربطه بـ ChatGPT و Claude عبر Magic MCP: تحليل الإحصاءات، إنشاء المحتوى، جدولة النشر وإدارة الرسائل بصلاحيات تختارها.","اتصال اینستاگرام به هوش مصنوعی — ChatGPT, Claude, Magic MCP":"ربط إنستغرام بالذكاء الاصطناعي — ChatGPT, Claude, Magic MCP","یک مرکز برای مدیریت کسب‌وکار دیجیتال":"مركز واحد لإدارة أعمالك الرقمية","از انتشار تا فروش":"من النشر إلى البيع","انتشار چندکاناله، فروشگاه اختصاصی، پیام‌رسان‌ها، CRM و ابزارهای هوشمند را در یک مسیر مدیریتی به هم وصل کن.":"اربط النشر متعدد القنوات ومتجرك الخاص والمراسلات وإدارة العملاء والأدوات الذكية في مساحة عمل واحدة.","انتشار چندکاناله":"النشر متعدد القنوات","اینستاگرام و کانال‌های تلگرام، بله و روبیکا":"إنستغرام وقنوات تيليغرام وبله وروبيكا","فروشگاه و سفارش‌ها":"المتجر والطلبات","ویترین اختصاصی، سبد خرید و مدیریت سفارش":"واجهة متجرك وسلة التسوق وإدارة الطلبات","پاسخ‌گویی در پیام‌رسان‌ها":"الرد عبر تطبيقات المراسلة","مدیریت پیام‌ها و جریان پاسخ‌گویی در یک پنل":"إدارة المحادثات ومسارات الرد من لوحة واحدة","تبدیل تعامل به فرصت فروش":"حوّل التفاعل إلى فرص للبيع","از کامنت و دایرکت تا پیگیری و ثبت سفارش":"من التعليقات والرسائل إلى المتابعة والطلبات","CRM و مدیریت مشتریان":"إدارة العملاء والعلاقات","پروفایل، تگ‌ها و سوابق ارتباط با مخاطب":"ملفات العملاء والعلامات وسجل التفاعلات","تولید محتوای هوشمند":"إنشاء المحتوى بالذكاء الاصطناعي","ساخت تصویر، ویدئو و کپشن با هوش مصنوعی":"أنشئ الصور والفيديوهات والتعليقات باستخدام الذكاء الاصطناعي","اتصال Google Drive و Sheets":"الربط مع Google Drive وSheets","اتصال فایل‌ها و مدیریت داده در جریان‌ها":"اربط الملفات وأدر البيانات داخل مسارات العمل","اتصال ChatGPT و Claude با MCP":"اربط ChatGPT وClaude عبر MCP","دسترسی دستیارهای هوشمند به ابزارهای مجیک":"امنح المساعدات الذكية إمكانية استخدام أدوات Magic","اتوماسیون فرایندهای کسب‌وکار":"أتمتة عمليات الأعمال","محرک‌ها، شرط‌ها، متغیرها و زیرجریان‌ها":"المحفزات والشروط والمتغيرات والمسارات الفرعية","چالش واقعی":"التحدي الفعلي","راهکار مجیک":"حل Magic","نتیجه برای کسب‌وکار":"النتيجة لأعمالك","جزئیات مورد انتخاب‌شده":"تفاصيل الحالة المختارة","انتشار محتوا در چند شبکه و کانال، وقتی هرکدام پنل جداگانه‌ای دارند، زمان و تمرکز زیادی می‌گیرد.":"يستغرق النشر عبر شبكات وقنوات متعددة وقتاً وجهداً عندما تكون لكل وجهة لوحة منفصلة.","مقصدهای اینستاگرام و کانال‌های تلگرام، بله و روبیکا را در پلنر مدیریت کن؛ محتوا را پیش‌نمایش بگیر، فوری منتشر کن یا برای زمان دلخواه برنامه‌ریزی کن.":"أدر وجهات إنستغرام وقنوات تيليغرام وبله وروبيكا من المخطط. عاين المحتوى وانشر فوراً أو جدوله لوقت لاحق.","برنامه انتشار چندکاناله را از یک محیط منسجم مدیریت کن.":"أدر خطة النشر متعددة القنوات من مساحة عمل موحدة.","معرفی محصولات، دریافت سفارش و پیگیری موجودی و ارسال معمولاً بین ابزارهای جدا پخش می‌شود.":"غالباً ما يتوزع عرض المنتجات واستقبال الطلبات ومتابعة المخزون والتوصيل بين أدوات منفصلة.","فروشگاه عمومی با زیردامنه اختصاصی و ۹ قالب آماده بساز؛ کاتالوگ، سبد خرید، موجودی، سفارش‌ها، تأمین‌کنندگان و روش‌های ارسال را از پنل مدیریت کن.":"أنشئ متجراً عاماً على نطاق فرعي خاص بك مع تسعة قوالب جاهزة. أدر الكتالوج وسلة التسوق والمخزون والطلبات والموردين وطرق الشحن من لوحة التحكم.","از ویترین اختصاصی تا ثبت و پیگیری سفارش، یک چرخه کامل داشته باش.":"أدر الرحلة كاملة من واجهة متجرك إلى إنشاء الطلبات ومتابعتها.","مخاطب در شبکه‌های مختلف پیام می‌دهد و جابه‌جایی بین بات‌ها و پنل‌ها پاسخ‌گویی را دشوار می‌کند.":"يراسلك العملاء عبر منصات مختلفة، ويجعل التنقل بين البوتات ولوحات التحكم الردود أصعب.","حساب‌ها و بات‌های اینستاگرام، تلگرام، بله و روبیکا را متصل کن؛ گفتگوها را در مرکز ارتباط ببین و برای هر حساب جریان پاسخ‌گویی بساز.":"اربط حسابات إنستغرام وبوتات تيليغرام وبله وروبيكا المدعومة. أدر المحادثات في مركز التواصل وأنشئ مسارات رد لكل حساب.","مدیریت متمرکزتر گفتگوها و پاسخ‌گویی در بسترهای مختلف.":"طريقة أكثر مركزية لإدارة المحادثات والردود عبر المنصات.","کامنت یا پیام مخاطب اگر مسیر بعدی نداشته باشد، به‌راحتی به یک تعامل کوتاه ختم می‌شود.":"قد يبقى التعليق أو الرسالة تفاعلاً عابراً ما لم تكن هناك خطوة تالية واضحة.","با محرک‌های کامنت و دایرکت، پاسخ خودکار، دکمه، لینک، شرط و بلوک‌های هوش مصنوعی، ادامه گفتگو را طراحی کن.":"صمّم الخطوات التالية باستخدام محفزات التعليقات والرسائل والردود التلقائية والأزرار والروابط والشروط وكتل الذكاء الاصطناعي.","از اولین تعامل تا معرفی محصول، دریافت اطلاعات و ثبت سفارش مسیر بساز.":"أنشئ رحلة تبدأ من أول تفاعل وتمتد إلى عرض المنتج وجمع المعلومات وإنشاء الطلب.","اطلاعات تماس، سوابق گفتگو و وضعیت پیگیری مشتری ممکن است پراکنده بماند.":"قد تتشتت بيانات الاتصال وسجل المحادثات وحالة المتابعة.","پروفایل مخاطب، تگ‌ها، فیلدهای اختصاصی و تاریخچه تعامل را در CRM مدیریت کن و آن‌ها را به جریان‌های ارتباطی و سفارش‌ها وصل کن.":"أدر ملفات العملاء والعلامات والحقول المخصصة وسجل التفاعلات في CRM، واربطها بمسارات التواصل والطلبات.","هر مخاطب با اطلاعات و وضعیت روشن برای پیگیری بعدی.":"بيانات وحالة واضحة لكل جهة اتصال لتسهيل المتابعة التالية.","ایده‌پردازی، تولید تصویر و ویدئو و آماده‌سازی کپشن در ابزارهای جداگانه زمان‌بر است.":"يستغرق ابتكار الأفكار وإنشاء الصور والفيديوهات وتجهيز النصوص وقتاً عند استخدام أدوات منفصلة.","در Smart Studio تصویر، ویدئو و کپشن بساز یا ویرایش کن و خروجی را مستقیم به مسیر انتشار بفرست.":"أنشئ الصور والفيديوهات والنصوص أو حرّرها في Smart Studio، ثم أرسل النتيجة مباشرة إلى النشر.","از ایده تا محتوای آماده انتشار در یک جریان.":"انتقل من الفكرة إلى محتوى جاهز للنشر ضمن مسار واحد.","ثبت اطلاعات و پیدا کردن داده‌های قبلی در فایل‌های کاری، به کار دستی و تکراری تبدیل می‌شود.":"قد يتحول حفظ المعلومات والعثور على السجلات السابقة في ملفات العمل إلى مهام يدوية متكررة.","Google Drive را وصل کن و فایل انتخابی را در جریان استفاده کن؛ با Google Sheets داده‌ها را اضافه، جست‌وجو، به‌روزرسانی یا حذف کن.":"اربط Google Drive واستخدم الملف الذي اخترته داخل المسار. ومن خلال Google Sheets أضف صفوف البيانات أو ابحث عنها أو حدّثها أو احذفها.","فرایندهای مخاطب و سفارش را به داده‌های واقعی فایل‌های انتخابی متصل کن.":"اربط مسارات العملاء والطلبات بالبيانات الفعلية في الملفات التي اخترتها.","دستیار هوش مصنوعی بدون اتصال به ابزارهای واقعی، بیشتر به پیشنهاد و تولید متن محدود می‌ماند.":"من دون الوصول إلى أدوات فعلية، يظل المساعد الذكي محدوداً غالباً بالاقتراحات وإنشاء النصوص.","Magic MCP را به ChatGPT یا Claude وصل کن تا دستیار سازگار، ابزارها و داده‌های مجاز مجیک را از طریق پروتکل MCP فراخوانی کند.":"اربط Magic MCP بـ ChatGPT أو Claude ليتمكن المساعد المتوافق من استدعاء أدوات Magic وبياناتها المصرح بها عبر بروتوكول MCP.","هوش مصنوعی را از یک پاسخ‌گو به دستیار متصل به ابزارهای واقعی تبدیل کن.":"حوّل الذكاء الاصطناعي من مجيب على الأسئلة إلى مساعد متصل بأدوات فعلية.","فرایندهای کسب‌وکار چندمرحله‌ای‌اند و با شرط‌ها و مسیرهای مختلف پیش می‌روند.":"غالباً ما تتكون عمليات الأعمال من خطوات متعددة وشروط ومسارات متفرعة.","با Flow Builder محرک‌ها، شرط‌ها، دکمه‌ها، متغیرها، زیرجریان‌ها، نودهای هوش مصنوعی و Google Sheets را کنار هم بچین.":"اجمع المحفزات والشروط والأزرار والمتغيرات والمسارات الفرعية وعقد الذكاء الاصطناعي وGoogle Sheets في Flow Builder.","اتوماسیون‌های قابل توسعه و متناسب با عملیات واقعی کسب‌وکار بساز.":"أنشئ عمليات أتمتة قابلة للتوسع ومصممة لتناسب طريقة عمل نشاطك التجاري.","اینستاگرام و پیام‌رسان‌ها":"إنستغرام وتطبيقات المراسلة","مدیریت اینستاگرام و پیام‌رسان‌ها | فروشگاه‌ساز مجیک":"إدارة إنستغرام والرسائل | منشئ المتاجر من مجيك","اینستاگرام، تلگرام، بله و روبیکا را یکجا مدیریت کن؛ فروشگاه‌ساز چندکاناله، پاسخ‌گوی هوشمند، مرکز ارتباط+ و اتصال Google Drive و Google Sheets با هوش مصنوعی.":"أدر إنستغرام وتيليغرام وBale وRubika من مكان واحد. أنشئ متجراً متعدد القنوات، وأتمت الردود والطلبات، واربط Google Drive وSheets بالذكاء الاصطناعي.","بله":"Bale","روبیکا":"Rubika","اتصال بات":"ربط البوت","جریان هوشمند":"مسار ذكي","پاسخ خودکار":"رد تلقائي","پیام‌ها":"الرسائل","پاسخ‌گویی":"الردود","راهنمایی":"إرشاد","ارجاع انسانی":"إحالة إلى موظف","کانال تلگرام":"قناة تيليغرام","متن و تصویر":"نص وصورة","انتشار فوری":"نشر فوري","پیش‌نمایش":"معاينة","پلنر":"المخطط","کانال بله":"قناة Bale","کانال روبیکا":"قناة Rubika","لینک":"رابط","اپراتور":"الموظف","مخاطب اینستاگرام":"جهة اتصال Instagram","دربارهٔ جزئیات محصول سؤال دارم…":"لدي سؤال حول تفاصيل المنتج…","مخاطب تلگرام":"جهة اتصال Telegram","لطفاً وضعیت سفارش را بفرستید.":"يرجى إرسال حالة الطلب.","مخاطب بله":"جهة اتصال Bale","اطلاعات بیشتر دربارهٔ خدمات…":"أريد مزيداً من المعلومات حول الخدمات…","مخاطب روبیکا":"جهة اتصال Rubika","می‌خواستم دربارهٔ سفارش بپرسم.":"أود الاستفسار عن الطلب.","۱۴۰۵/۰۹/۰۵":"٢٠٢٦/١١/٢٦","از انتشار محتوا تا پیگیری مشتری در اینستاگرام و پیام‌رسان‌ها":"من نشر المحتوى إلى متابعة العملاء على إنستغرام وتطبيقات المراسلة"}}
MAGIC_LANDING_DICTIONARY;
    $landingDictPath=__DIR__.'/landing-assets/lang/translations.json';
    $landingPacks=is_readable($landingDictPath)
        ?json_decode((string)file_get_contents($landingDictPath),true):null;
    if(!is_array($landingPacks)||count($landingPacks[$landingLanguage]??[])<650)
        $landingPacks=json_decode($landingFallbackJson,true);
    if (is_array($landingPacks) && is_array($landingPacks[$landingLanguage]??null))
        $landingTranslations=$landingPacks[$landingLanguage];
    // Render-only translation: no restructuring or replacement of original layout.
    // Ignore single-character strings to avoid modifying parts of unrelated words.
    $previewCopy = [
        'ویترین' => ['Storefront', 'الواجهة'],
        'سفارش در گفتگو' => ['Chat order', 'الطلب بالمحادثة'],
        'پیگیری سفارش' => ['Order tracking', 'متابعة الطلب'],
        'گزارش فروش' => ['Sales report', 'تقرير المبيعات'],
        'پوستر ساحل هنگام' => ['Hengam coast print', 'ملصق ساحل هنغام'],
        'نمونهٔ فروشگاه' => ['Sample storefront', 'نموذج متجر'],
        'این پوستر را در اندازهٔ A3 می‌خواهم.' => ['I’d like this print in A3.', 'أريد هذا الملصق بمقاس A3.'],
        'یک پوستر A3 به سبدت اضافه شد.' => ['One A3 print was added to your cart.', 'أُضيف ملصق A3 إلى سلّتك.'],
        'سفارش ثبت شد' => ['Order received', 'تم تسجيل الطلب'],
        'در حال آماده‌سازی' => ['Being prepared', 'قيد التجهيز'],
        'ارسال به مشتری' => ['Delivery to customer', 'الإرسال إلى العميل'],
        'سفارش' => ['Order', 'الطلب'],
        'تعداد' => ['Quantity', 'الكمية'],
        'کانال' => ['Channel', 'القناة'],
        'برای اولین انتشار یا ساخت جریان، آموزش مربوط را باز کن. داخل پنل هم راهنمای مجیک قدم‌به‌قدم همراهت است.' => ['Open a tutorial for your first post or flow. Inside the panel, Magic Guide walks you through each step.', 'افتح شرح النشر الأول أو بناء المسار. يرافقك دليل مجيك خطوة بخطوة داخل اللوحة.'],
        'همهٔ آموزش‌ها' => ['All tutorials', 'جميع الشروحات'],
        'انتشار فوری یا زمان‌بندی' => ['Publish now or schedule', 'النشر الفوري أو المجدول'],
        'آموزش ساخت اولین جریان' => ['Build your first flow', 'أنشئ مسارك الأول'],
        'فروشگاه خودت را بساز و از هر کانال سفارش بگیر' => ['Build your storefront and take orders across channels', 'أنشئ متجرك واستقبل الطلبات عبر القنوات'],
        'محصول را یک‌بار در کاتالوگ مجیک تعریف کن. مشتری می‌تواند از ویترین خرید کند یا در گفتگوی همان شبکه سفارش بدهد. تو جزئیات سفارش، پرداخت و ارسال را از پنل فروشگاه پیگیری می‌کنی.' => ['Add a product to your Magic catalog once. Customers can shop on the storefront or order in a conversation. Track order details, payments and delivery from your store panel.', 'أضف المنتج مرة واحدة إلى كتالوج مجيك. يستطيع العميل التسوق من الواجهة أو الطلب داخل المحادثة، ويمكنك متابعة تفاصيل الطلب والدفع والتوصيل من لوحة المتجر.'],
        'ویترینی با هویت برندت' => ['A storefront for your brand', 'واجهة بهوية علامتك'],
        'از میان ۹ قالب، چیدمان فروشگاهت را انتخاب کن. عکس جلد، گالری محصول و قیمت را تنظیم کن و لینک زیردامنهٔ اختصاصی فروشگاه را در بیو یا کانال بگذار. اگر دامنهٔ خودت را داری، می‌توانی آن را به آدرس فروشگاه هدایت کنی.' => ['Choose from nine storefront layouts. Set your cover image, product gallery and prices, then share the store’s dedicated subdomain in your bio or channel. If you own a domain, you can forward it to the storefront address.', 'اختر من بين تسعة قوالب واضبط صورة الغلاف ومعرض المنتجات والأسعار. شارك نطاق المتجر الفرعي في النبذة أو القناة، ويمكنك توجيه نطاق تملكه إلى عنوان المتجر.'],
        'سفارش‌گیری داخل گفتگو' => ['Orders in the conversation', 'استقبال الطلبات داخل المحادثة'],
        'در جریان‌ساز اینستاگرام، تلگرام، بله یا روبیکا، مرحلهٔ سفارش را به کاتالوگ وصل کن. مشتری از دایرکت یا ربات وارد مسیر خرید می‌شود، محصول و تعداد را انتخاب می‌کند و مشخصات سفارش را می‌فرستد.' => ['Connect the ordering step in your Instagram, Telegram, Bale or Rubika flow to the catalog. Customers enter from a DM or bot, choose a product and quantity, and send their order details.', 'اربط خطوة الطلب بالكتالوج في مسار إنستغرام أو تيليغرام أو بله أو روبيكا. يبدأ العميل من الرسائل الخاصة أو البوت، ويختار المنتج والكمية ويرسل تفاصيل طلبه.'],
        'از سبد خرید تا تحویل' => ['From cart to delivery', 'من السلّة إلى التسليم'],
        'مشتری تصاویر محصول را می‌بیند، سبد را تکمیل می‌کند و با روش‌های پرداخت و ارسال فعال فروشگاه سفارش می‌دهد. در پنل، مبلغ، تخفیف، رسید و وضعیت هر سفارش را ببین و مراحل آماده‌سازی و ارسال را پیگیری کن.' => ['Shoppers browse photos, fill their cart and check out using your enabled payment and shipping methods. In the panel, review totals, discounts, receipts and order status, then follow preparation and delivery.', 'يتصفّح العميل الصور ويُكمل السلّة ويطلب بطرق الدفع والشحن المفعّلة. راجع المبلغ والخصم والإيصال وحالة الطلب في اللوحة وتابع التجهيز والتوصيل.'],
        'گزارش سفارش برای مدیر فروشگاه' => ['Order reports for the store manager', 'تقارير الطلبات لمدير المتجر'],
        'در ادامهٔ جریان سفارش، خلاصهٔ خرید را به پیام‌رسان متصل مدیر بفرست یا شمارهٔ سفارش، کالا، تعداد و مبلغ را در ستون‌های Google Sheets ثبت کن. فایل گزارش را از Google Drive خودت انتخاب کن تا سفارش‌ها در همان فایل جمع شوند.' => ['After the ordering step, send a purchase summary to the manager’s connected messenger or map the order number, item, quantity and total to Google Sheets columns. Select the report spreadsheet from your Google Drive to keep orders together.', 'بعد خطوة الطلب أرسل ملخّص الشراء إلى تطبيق المراسلة المتصل للمدير أو سجّل رقم الطلب والمنتج والكمية والمبلغ في أعمدة جداول Google. اختر جدول التقرير من Google Drive لتجميع الطلبات في الملف نفسه.'],
        'کالا' => ['Item', 'المنتج'],
        'لیوان سفالی' => ['Ceramic mug', 'كوب خزفي'],
        'تعداد سفارش' => ['Quantity ordered', 'الكمية المطلوبة'],
        'مسیر سفارش' => ['Order source', 'مصدر الطلب'],
        'وضعیت سفارش' => ['Order status', 'حالة الطلب'],
        'در حال آماده‌سازی' => ['Being prepared', 'قيد التجهيز'],
        'نمونهٔ سفارش فروشگاه' => ['Sample store order', 'نموذج طلب من المتجر'],
        'مجیک دستیار هوشمند مدیر کانال است. ربات هر پیام‌رسان را وصل کن و کانال تلگرام، بله یا روبیکا را به مجیک اضافه کن. برای خبرهای روز انتشار فوری را انتخاب کن و برنامهٔ هفته را از قبل در پلنر بچین.' => ['Magic helps channel managers plan their week. Connect each messenger’s bot and add your Telegram, Bale or Rubika channel. Publish breaking news immediately and schedule the rest in the planner.', 'مجيك مساعد ذكي لمدير القناة. اربط بوت كل تطبيق وأضف قناة تيليغرام أو بله أو روبيكا. انشر الأخبار العاجلة فوراً وجدول منشورات الأسبوع مسبقاً.'],
        'ربات بله را به مجیک وصل کن و کانال بله را اضافه کن. اطلاعیهٔ امروز را فوری منتشر کن و پیام صوتی فردا را زمان‌بندی کن. اگر مخاطب به ربات پیام داد، سابقه‌اش را در مرکز ارتباط+ ببین و همان‌جا جواب بده.' => ['Connect your Bale bot to Magic and add your Bale channel. Publish today’s announcement immediately and schedule tomorrow’s audio message. When someone messages the bot, open their history and reply in Communication+.', 'اربط بوت بله بمجيك وأضف قناة بله. انشر إعلان اليوم فوراً وجدول رسالة الغد الصوتية. عندما يراسلك أحد عبر البوت، راجع سجلّه وأجبه من مركز التواصل+.'],
        'ربات روبیکا را وصل کن و کانال روبیکا را به پلنر اضافه کن. عکس محصول، متن و لینک را پیش‌نمایش بگیر. محصول تازه را فوری معرفی کن یا انتشارش را برای ساعت شروع فروش زمان‌بندی کن.' => ['Connect your Rubika bot and add your channel to the planner. Preview the product photo, caption and link. Publish the announcement immediately or schedule it for the start of the sale.', 'اربط بوت روبيكا وأضف القناة إلى التقويم. عاين صورة المنتج والنص والرابط، ثم انشر الإعلان فوراً أو جدوله لموعد بدء البيع.'],
        'ربات تلگرام را به مجیک وصل کن و کانال تلگرام را اضافه کن. خبر فوری را همان لحظه در کانال منتشر کن یا پست بعدی را زمان‌بندی کن. در جریان‌های متصل، با Live Reply می‌توانی از تلگرام به دایرکت اینستاگرام هم جواب بدهی.' => ['Connect your Telegram bot to Magic and add your Telegram channel. Publish breaking news immediately or schedule your next post. In connected flows, Live Reply also lets you respond to Instagram DMs from Telegram.', 'اربط بوت تيليغرام بمجيك وأضف قناة تيليغرام. انشر الأخبار العاجلة فوراً أو جدول منشورك القادم. وفي المسارات المتصلة يمكنك أيضاً الرد على رسائل إنستغرام من تيليغرام عبر Live Reply.'],
        'برای معرفی محصول، ریلز اینستاگرام و پیام کانال‌ها را در یک پلنر بچین. پس از اتصال ربات و افزودن کانال تلگرام، بله یا روبیکا، مقصد را انتخاب کن و پیش‌نمایش را ببین. پیام را فوری منتشر کن، برای زمان دلخواه برنامه‌ریزی کن یا پیش‌نویس نگه دار.' => ['Plan an Instagram reel and channel posts for a product launch in one planner. After connecting a bot and adding your Telegram, Bale or Rubika channel, choose the destination and preview the message. Publish immediately, schedule it or save a draft.', 'خطّط لريلز إنستغرام ومنشورات القنوات لإطلاق منتج في تقويم واحد. بعد ربط البوت وإضافة قناة تيليغرام أو بله أو روبيكا اختر الوجهة وعاين الرسالة. انشر فوراً أو جدولها أو احفظها كمسودة.'],
        'در کانال‌های تلگرام، بله و روبیکا فوری یا زمان‌بندی‌شده منتشر کن.' => ['Publish immediately or schedule posts in Telegram, Bale and Rubika channels.', 'انشر فوراً أو جدول منشورات قنوات تيليغرام وبله وروبيكا.'],
        'گفتگوهای بله را از پنل پیگیری کن' => ['Follow up on Bale conversations', 'تابع محادثات بله من اللوحة'],
        'ربات بله را متصل کن تا پیام‌های دریافتی را در مرکز ارتباط+ ببینی. سابقهٔ مخاطب را باز کن و پاسخ را در همان گفتگو بفرست.' => ['Connect your Bale bot to see incoming messages in Communication+. Open the contact history and reply in the same conversation.', 'اربط بوت بله لعرض الرسائل الواردة في مركز التواصل+. افتح سجلّ العميل وأرسل ردّك في المحادثة نفسها.'],
        'این سفارش هنوز موجوده؟' => ['Is this item still available?', 'هل هذا المنتج متوفر؟'],
        'بله، برای سفارش راهنمایی‌ات می‌کنم.' => ['Yes, I can help you place an order.', 'نعم، يمكنني مساعدتك في تقديم الطلب.'],
        'انتشار در کانال روبیکا را زمان‌بندی کن' => ['Schedule a Rubika channel post', 'جدول منشوراً لقناة روبيكا'],
        'کانال روبیکا را در پلنر انتخاب کن، تصویر و متن را کنار هم ببین و زمان انتشار را تعیین کن. لینک محصول همراه متن پیام نمایش داده می‌شود.' => ['Choose your Rubika channel in the planner, preview the photo and caption, and choose a publishing time. The product link appears with the message text.', 'اختر قناة روبيكا في التقويم وعاين الصورة والنص ثم حدّد موعد النشر. يظهر رابط المنتج ضمن نص الرسالة.'],
        'مجموعهٔ تازهٔ کارگاه سفال' => ['New pottery collection', 'مجموعة المشغل الجديدة'],
        'امروز، ساعت ۱۸:۳۰' => ['Today at 18:30', 'اليوم، الساعة ١٨:٣٠'],
        'تلگرام، بله و روبیکا را به مجیک وصل کن' => ['Connect Telegram, Bale and Rubika to Magic', 'اربط تيليغرام وبله وروبيكا بمجيك'],
        'از تلگرام به دایرکت اینستاگرام جواب بده، گفتگوهای بله را پیگیری کن و برای کانال روبیکا محتوا زمان‌بندی کن. در دایرکت، پاسخ صوتی هوشمند هم در دسترس است.' => ['Reply to Instagram DMs from Telegram, follow up on Bale messages and schedule Rubika posts. Smart voice replies are also available in Instagram DMs.', 'أجب عن رسائل إنستغرام من تيليغرام وتابع محادثات بله وجدول منشورات روبيكا. وتتوفر الردود الصوتية الذكية أيضاً في رسائل إنستغرام.'],
        'پیام تازه' => ['New message', 'رسالة جديدة'],
        'سابقهٔ مخاطب' => ['Contact history', 'سجلّ العميل'],
        'پاسخ تیم' => ['Team reply', 'ردّ الفريق'],
        'درخواست مهمان' => ['Guest request', 'طلب الضيف'],
        'تأیید اطلاعات' => ['Confirm details', 'تأكيد البيانات'],
        'ارجاع به مسئول رزرو' => ['Booking handoff', 'إحالة للحجوزات'],
        'تاریخ ورود' => ['Arrival date', 'تاريخ الوصول'],
        'تعداد مهمان' => ['Guests', 'عدد الضيوف'],
        'وضعیت رزرو' => ['Booking status', 'حالة الحجز'],
        'کانال متصل' => ['Connected channel', 'القناة المرتبطة'],
        'انتخاب شبکه' => ['Select network', 'اختيار الشبكة'],
        'ساخت استوری' => ['Create story', 'إنشاء قصة'],
        'تعیین زمان' => ['Set time', 'تحديد الموعد'],
        'انتشار چندشبکه‌ای' => ['Multichannel publishing', 'النشر عبر القنوات'],
        'برای هر مقصد، محتوا و زمان انتشار را انتخاب کن.' => ['Choose the content and publishing time for each destination.', 'حدّد المحتوى وموعد النشر لكل وجهة.'],
        'برای معرفی محصول، یک ریلز اینستاگرام آماده کن و عکس و توضیحش را برای کانال‌های تلگرام، بله و روبیکا بچین. پیش‌نمایش هر مقصد را ببین، پیام را پیش‌نویس نگه دار یا زمان بده و وضعیت انتشارش را در پلنر دنبال کن.' => ['Prepare an Instagram reel for a product launch and schedule its photo and description for your Telegram, Bale and Rubika channels. Preview each destination, save a draft or choose a time, then follow its status in the planner.', 'جهّز ريلز لإطلاق منتج على إنستغرام وصورته ووصفه لقنوات تيليغرام وبله وروبيكا. عاين الرسالة لكل وجهة واحفظها كمسودة أو حدّد موعدها، ثم تابع حالة النشر في التقويم.'],
        'مرکز ارتباط+' => ['Communication+', 'مركز التواصل+'],
        'گفتگوهای تلگرام، بله و روبیکا را همراه با سابقهٔ مخاطب ببین.' => ['See Telegram, Bale and Rubika conversations alongside contact history.', 'اطّلع على محادثات تيليغرام وبله وروبيكا وسجلّ كل جهة اتصال.'],
        'پیام‌های خوانده‌نشدهٔ بله را فیلتر کن. وقتی مشتری دربارهٔ سفارش قبلی می‌پرسد، سابقه و برچسب‌هایش را همان‌جا ببین، جواب بده و پس از پیگیری گفتگو را بایگانی کن.' => ['Filter unread Bale messages. When someone asks about a previous order, check their conversation history and tags, reply in the same inbox and archive the thread after following up.', 'صفِّ رسائل بله غير المقروءة. عندما يسأل عميل عن طلب سابق، راجع سجلّه ووسومه وأجبه من صندوق الوارد نفسه، ثم أرشف المحادثة بعد المتابعة.'],
        'گوگل‌شیت در جریان‌ساز' => ['Google Sheets in flows', 'جداول Google في المسارات'],
        'پاسخ‌ها را در شیت ثبت کن و ردیف‌های قبلی را پیدا کن یا تغییر بده.' => ['Save answers to a sheet, find existing rows and update them.', 'احفظ الإجابات في جدول وابحث عن الصفوف السابقة وحدّثها.'],
        'فایل را از Google Drive انتخاب کن و هر پاسخ را به ستون خودش وصل کن. برای درخواست تازه یک ردیف بساز یا با شمارهٔ تماس، درخواست قبلی را پیدا و وضعیتش را به‌روز کن. چند ردیف مرتبط را هم می‌توانی برای تحلیل به بلوک AI بدهی.' => ['Choose a file from Google Drive and map each answer to a column. Add a row for a new request or look up an earlier request by phone number and update its status. Pass matching rows to an AI block for analysis.', 'اختر ملفاً من Google Drive واربط كل إجابة بعمودها. أضف صفاً لطلب جديد أو ابحث برقم الهاتف عن طلب سابق وحدّث حالته. ويمكنك تمرير الصفوف المطابقة إلى كتلة الذكاء الاصطناعي لتحليلها.'],
        'بلوک Google AI' => ['Google AI block', 'كتلة Google AI'],
        'با Gemini پاسخ متنی یا صوتی بده و گفتگو را به مرحلهٔ بعد برسان.' => ['Use Gemini for text or voice replies and move the conversation forward.', 'استخدم Gemini للرد بالنص أو الصوت ونقل المحادثة إلى الخطوة التالية.'],
        'کلید Google API را روی خود بلوک تنظیم کن. Gemini اطلاعات لازم را طی گفتگو می‌گیرد. با تکمیل هدف، جریان به مرحله‌ای که تعیین کرده‌ای می‌رود و برای درخواست اپراتور هم می‌توانی مسیر جداگانه بچینی.' => ['Set the Google API key on each block. Gemini collects the information during the conversation. Connect the goal output to the next step and give requests for a human operator their own route.', 'اضبط مفتاح Google API لكل كتلة. يجمع Gemini البيانات أثناء الحوار. صِل مخرج اكتمال الهدف بالخطوة التالية وخصّص مساراً لطلبات التحدث إلى موظف.'],
        'فروشگاه+' => ['Store+', 'المتجر+'],
        'از ویترین محصول تا سبد خرید و ثبت سفارش.' => ['Give customers a storefront, a cart and a way to place an order.', 'اعرض المنتجات وأتح للعملاء إضافتها إلى السلّة وإرسال الطلب.'],
        'برای هر محصول عکس و توضیح بگذار. مشتری از ویترین وارد صفحهٔ محصول می‌شود، تصاویرش را ورق می‌زند، انتخابش را به سبد اضافه می‌کند و سفارش را ثبت می‌کند.' => ['Add photos and a description to each product. Customers can open a product from the storefront, browse its gallery, add it to their cart and place an order.', 'أضف صوراً ووصفاً لكل منتج. يفتح العميل المنتج من الواجهة، ويتصفّح معرض الصور، ثم يضيفه إلى السلّة ويرسل الطلب.'],
        'پروفایل+' => ['Profile+', 'الملف التعريفي+'],
        'لینک‌های مهم برندت را در یک صفحهٔ معرفی جمع کن.' => ['Bring your brand’s essential links together on one profile.', 'اجمع روابط علامتك المهمة في صفحة تعريف واحدة.'],
        'در بیوی پیج یک آدرس بگذار. کسی که آن را باز می‌کند، معرفی کوتاه برند و لینک‌های انتخابی تو را می‌بیند و می‌تواند مستقیم سراغ فروشگاه یا راه تماس برود.' => ['Put one address in your bio. Visitors see your short brand introduction and the links you choose, then head straight to your store or contact page.', 'ضع عنواناً واحداً في النبذة. يرى الزائر تعريفاً موجزاً بعلامتك والروابط التي تختارها، ثم ينتقل مباشرة إلى المتجر أو صفحة التواصل.'],
        'مدیریت کانال با MCP' => ['Channel management with MCP', 'إدارة القنوات عبر MCP'],
        'از ChatGPT یا Claude برای آماده‌سازی پیام و بررسی گفتگوها کمک بگیر.' => ['Prepare channel posts and review conversations in ChatGPT or Claude.', 'استعن بـ ChatGPT أو Claude لإعداد منشورات القناة ومراجعة المحادثات.'],
        'مثلاً بنویس «پیام‌های خوانده‌نشدهٔ بله را نشان بده» یا «از این متن یک پیش‌نویس برای کانال تلگرام آماده کن». دستیار با حساب متصل و در محدودهٔ دسترسی‌هایی که داده‌ای کار می‌کند.' => ['Ask “Show my unread Bale messages” or “Prepare a Telegram channel draft from this text.” The assistant works with the connected account and the permissions you grant.', 'اطلب مثلاً «اعرض رسائل بله غير المقروءة» أو «جهّز مسودة لقناة تيليغرام من هذا النص». يعمل المساعد بالحساب المتصل وضمن الصلاحيات التي تمنحها.'],
        'راهنمای تعاملی مجیک' => ['Interactive Magic Guide', 'دليل مجيك التفاعلي'],
        'اولین انتشار یا جریان را با راهنمای داخل پنل آماده کن.' => ['Set up your first post or flow with guidance inside the panel.', 'جهّز أول منشور أو مسار بمساعدة الدليل داخل اللوحة.'],
        'برای زمان‌بندی اولین استوری، تور انتشار را باز کن. راهنما جای انتخاب اینستاگرام و تنظیم زمان را روی همان صفحه نشان می‌دهد. در جریان‌ساز هم می‌توانی ساخت مسیر را قدم‌به‌قدم دنبال کنی.' => ['Open the publishing tour to schedule your first story. The guide points out where to select Instagram and set the time on the actual page. A separate tour walks you through building a flow.', 'افتح جولة النشر لجدولة قصتك الأولى. يوضّح لك الدليل على الصفحة أين تختار إنستغرام وتضبط الموعد. وفي منشئ المسارات ترافقك جولة أخرى خطوة بخطوة.'],
        'از انتشار محتوا' => ['From publishing', 'من نشر المحتوى'],
        'تا پیگیری مشتری' => ['to customer follow-up', 'إلى متابعة العملاء'],
        'در اینستاگرام و پیام‌رسان‌ها' => ['on Instagram and messaging apps', 'على إنستغرام وتطبيقات المراسلة'],
        'در اینستاگرام، تلگرام، بله و روبیکا منتشر کن. پیام‌ها را از پنل جواب بده و اطلاعات سفارش یا رزرو را از دل گفتگو به گوگل‌شیت برسان.' => ['Publish on Instagram, Telegram, Bale and Rubika. Reply from your panel and send order or booking details straight from a conversation to Google Sheets.', 'انشر على إنستغرام وتيليغرام وبله وروبيكا. أجب من اللوحة وانقل تفاصيل الطلب أو الحجز من المحادثة إلى جداول Google.'],
        'انتشار کانال و پیگیری پیام‌ها' => ['Channel publishing and follow-up', 'نشر القنوات ومتابعة الرسائل'],
        'مهمان در دایرکت تاریخ ورود و تعداد نفرات را می‌گوید. Gemini خلاصهٔ درخواست را برای تأیید می‌فرستد.' => ['The guest sends their arrival date and party size by DM. Gemini asks them to confirm the details.', 'يرسل الضيف تاريخ الوصول وعدد الأشخاص في رسالة خاصة، ويطلب Gemini تأكيد التفاصيل.'],
        'پس از تأیید مهمان، بلوک گوگل‌شیت یک ردیف برای درخواست رزرو ثبت می‌کند.' => ['Once the guest confirms, the Sheets block adds a row for the booking request.', 'بعد تأكيد الضيف تضيف كتلة الجداول صفاً لطلب الحجز.'],
        'بلوک تلگرام خلاصهٔ درخواست را برای مسئول رزرو می‌فرستد تا پیگیری کند.' => ['The Telegram block sends the request summary to the reservations team for follow-up.', 'ترسل كتلة تيليغرام ملخّص الطلب إلى مسؤول الحجوزات للمتابعة.'],
        'نمونهٔ جریان رزرو اقامتگاه' => ['Example flow for a guesthouse booking', 'مثال لمسار حجز إقامة'],
        'از دایرکت مهمان تا دفتر رزرو' => ['From a guest’s DM to the booking sheet', 'من رسالة الضيف إلى سجلّ الحجوزات'],
        'از لینک بیو تا ثبت سفارش' => ['From the bio link to an order', 'من رابط النبذة إلى إرسال الطلب'],
        'نمونهٔ پروفایل یک کارگاه سفال' => ['Pottery studio profile', 'ملف مشغل خزف'],
        'فروشگاه سفال' => ['Pottery shop', 'متجر الخزف'],
        'تماس با کارگاه' => ['Contact the studio', 'تواصل مع المشغل'],
        'لیوان دست‌ساز' => ['Handmade mug', 'كوب يدوي'],
        'افزودن به سبد' => ['Add to cart', 'إضافة إلى السلّة'],
        'ثبت سفارش' => ['Place order', 'إرسال الطلب'],
        'قابلیت‌های بی‌انتهای مجیک' => ['Magic Features Without Limits', 'مزايا مجيك بلا حدود'],
        'مشاهده بیشتر' => ['View more', 'عرض المزيد'],
        'نمایش کمتر' => ['Show less', 'عرض أقل'],
        'با مجیک اینستاگرام و پیام‌رسان‌های تلگرام، بله و روبیکا را مدیریت کن؛ جریان‌های هوشمند AI و ربات پاسخ‌گو بساز، در کانال‌ها محتوا منتشر و زمان‌بندی کن و از طریق Magic MCP با ChatGPT و Claude کارهای مجاز را انجام بده.' => ['Manage Instagram and Telegram, Bale and Rubika with Magic. Build AI-powered flows and smart reply bots, publish and schedule channel content, and use Magic MCP with ChatGPT and Claude for authorized tasks.', 'أدر إنستغرام وتيليغرام وبله وروبيكا مع مجيك. أنشئ مسارات ذكية وبوتات للرد، وانشر محتوى القنوات وجدوله، واستخدم Magic MCP مع ChatGPT وClaude للمهام المصرّح بها.'],
        'مدیریت اینستاگرام و پیام‌رسان‌ها با هوش مصنوعی | مجیک' => ['Manage Instagram and messaging apps with AI | Magic', 'إدارة إنستغرام وتطبيقات المراسلة بالذكاء الاصطناعي | مجيك'],
        'از اتوماسیون و پیام‌رسان‌ها تا تولید محتوا، انتشار، فروش و مدیریت مخاطب؛ این‌ها فقط بخشی از کارهایی هستند که مجیک کنار هم قرار می‌دهد.' => ['From automation and messaging apps to content creation, publishing, sales and contact management, these are only some of the things Magic brings together.', 'من الأتمتة وتطبيقات المراسلة إلى إنشاء المحتوى والنشر والمبيعات وإدارة جهات الاتصال، هذه مجرد بعض الإمكانات التي يجمعها مجيك.'],
        'اتصال هوشمند اینستاگرام و پیام‌رسان‌ها' => ['Connect Instagram and messaging apps to AI', 'اربط إنستغرام وتطبيقات المراسلة بالذكاء الاصطناعي'],
        'اینستاگرام و پیام‌رسان‌هات رو به ChatGPT و Claude وصل کن' => ['Connect Instagram and your messaging apps to ChatGPT and Claude', 'اربط إنستغرام وتطبيقات المراسلة بـ ChatGPT وClaude'],
        'با Magic MCP، حساب اینستاگرام و بات‌ها و کانال‌های متصل تلگرام، بله و روبیکا را از ChatGPT، Claude یا دستیار سازگار با MCP مدیریت کن. آمار را بررسی کن، پیام‌ها را مرور کن و پیش‌نویس محتوا آماده کن؛ در کنار آن، داخل جریان‌ساز مجیک برای پیام‌رسان‌ها پاسخ‌گویی هوشمند بساز.' => ['Use Magic MCP with ChatGPT, Claude or another compatible assistant to work with your connected Instagram account, Telegram, Bale and Rubika bots and channels. Review insights and messages, prepare content drafts, and build AI-powered replies for messaging apps in Magic Flow Builder.', 'استخدم Magic MCP مع ChatGPT أو Claude أو أي مساعد متوافق لإدارة حساب إنستغرام المتصل وبوتات وقنوات تيليغرام وبله وروبيكا. راجع الإحصاءات والرسائل وجهّز مسودات المحتوى، وأنشئ ردوداً ذكية لتطبيقات المراسلة داخل منشئ المسارات في مجيك.'],
        'ساخت جریان‌های هوشمند AI در تلگرام، بله و روبیکا' => ['Build AI-powered flows for Telegram, Bale and Rubika', 'أنشئ مسارات ذكية بالذكاء الاصطناعي لتيليغرام وبله وروبيكا'],
        'بات هر پیام‌رسان را به مجیک وصل کن و در جریان‌ساز، AI را برای تحلیل پیام، ساخت پاسخ مناسب و انتخاب مرحلهٔ بعد به کار بگیر.' => ['Connect each messaging bot to Magic and use AI in Flow Builder to analyze messages, prepare suitable replies and choose the next step.', 'اربط بوت كل تطبيق مراسلة بمجيك واستخدم الذكاء الاصطناعي في منشئ المسارات لتحليل الرسائل وإعداد الردود المناسبة واختيار الخطوة التالية.'],
        'ساخت ربات هوشمند و منشی پاسخ‌گو' => ['Build a smart bot and AI receptionist', 'أنشئ بوتاً ذكياً ومساعداً للرد'],
        'برای پرسش‌های پرتکرار، دریافت اطلاعات، راهنمایی مشتری و پیگیری درخواست‌ها ربات بساز و موارد نیازمند بررسی را به اپراتور انسانی ارجاع بده.' => ['Build a bot that answers common questions, collects details, guides customers and follows up on requests. Route cases that need review to a human operator.', 'أنشئ بوتاً يجيب عن الأسئلة الشائعة ويجمع المعلومات ويرشد العملاء ويتابع الطلبات، مع تحويل الحالات التي تحتاج إلى مراجعة إلى موظف بشري.'],
        'انتشار محتوا در کانال‌های تلگرام' => ['Publish content to Telegram channels', 'انشر المحتوى في قنوات تيليغرام'],
        'متن، تصویر و محتوای آماده را به کانال متصل بفرست؛ انتشار فوری، پیش‌نویس و زمان‌بندی را از پلنر مدیریت کن.' => ['Send text, images and ready-to-publish content to a connected channel. Manage instant publishing, drafts and scheduling from the planner.', 'أرسل النصوص والصور والمحتوى الجاهز إلى قناة متصلة، وأدر النشر الفوري والمسودات والجدولة من المخطط.'],
        'تحلیل پیج با ChatGPT و Claude' => ['Instagram insights with ChatGPT and Claude', 'تحليلات إنستغرام باستخدام ChatGPT وClaude'],
        'آماده‌سازی و انتشار محتوا با هوش مصنوعی' => ['Prepare and publish content with AI', 'جهّز المحتوى وانشره بالذكاء الاصطناعي'],
        'دایرکت، مخاطبان و جریان‌های هوشمند' => ['DMs, contacts and smart flows', 'الرسائل الخاصة وجهات الاتصال والمسارات الذكية'],
        'دستیار هوشمند برای پیام‌رسان‌ها با Magic MCP' => ['A smart messaging assistant with Magic MCP', 'مساعد ذكي لتطبيقات المراسلة باستخدام Magic MCP'],
        'از ChatGPT یا Claude بخواه آمار مجاز را خلاصه کند، پیام‌های قابل‌دسترسی را بررسی کند یا پیش‌نویس محتوا برای کانال تلگرام آماده کند. برای ارسال یا انتشار واقعی، دسترسی‌های لازم و تأییدهای مربوط رعایت می‌شود.' => ['Ask ChatGPT or Claude to summarize authorized insights, review accessible messages or prepare a content draft for a Telegram channel. Sending or publishing still follows the required permissions and confirmations.', 'اطلب من ChatGPT أو Claude تلخيص الإحصاءات المصرّح بها أو مراجعة الرسائل المتاحة أو إعداد مسودة محتوى لقناة تيليغرام. ويظل الإرسال أو النشر الفعلي خاضعاً للأذونات والتأكيدات المطلوبة.'],
        'اتصال حساب‌ها و انتخاب مجوزها' => ['Connect accounts and choose permissions', 'اربط الحسابات واختر الأذونات'],
        'اینستاگرام و بات‌های تلگرام، بله و روبیکا را در مجیک متصل کن؛ سپس Magic MCP را در دستیار سازگار اضافه کن، وارد حساب مجیک شو و دسترسی‌های موردنیازت را انتخاب کن. ابزارهای در دسترس به نوع اتصال و مجوزهای حساب بستگی دارند.' => ['Connect Instagram and your Telegram, Bale and Rubika bots in Magic. Then add Magic MCP to a compatible assistant, sign in to Magic and choose the permissions you need. Available tools depend on the connection type and account permissions.', 'اربط إنستغرام وبوتات تيليغرام وبله وروبيكا في مجيك. ثم أضف Magic MCP إلى مساعد متوافق، وسجّل الدخول إلى مجيك واختر الأذونات المطلوبة. تعتمد الأدوات المتاحة على نوع الاتصال وأذونات الحساب.'],
        'جریان‌های هوشمند AI برای پیام‌رسان‌ها' => ['AI-powered flows for messaging apps', 'مسارات ذكية لتطبيقات المراسلة'],
        'برای بات‌های تلگرام، بله و روبیکا جریان بساز؛ پیام مخاطب را به AI بسپار تا آن را تحلیل کند، پاسخ مناسب بدهد و مسیر بعدی را انتخاب کند.' => ['Build flows for Telegram, Bale and Rubika bots. Let AI analyze incoming messages, create suitable replies and choose the next step.', 'أنشئ مسارات لبوتات تيليغرام وبله وروبيكا، ودع الذكاء الاصطناعي يحلل الرسائل الواردة ويعدّ الرد المناسب ويحدد الخطوة التالية.'],
        'ربات هوشمند و منشی پاسخ‌گو' => ['Smart bot and AI receptionist', 'بوت ذكي ومساعد للرد'],
        'یک ربات پاسخ‌گو برای پرسش‌های پرتکرار، دریافت اطلاعات، راهنمایی مخاطب و ارجاع درخواست‌های خاص به اپراتور بساز.' => ['Build a bot that answers common questions, collects information, guides people and routes special requests to a human operator.', 'أنشئ بوتاً يجيب عن الأسئلة الشائعة ويجمع المعلومات ويرشد المستخدمين ويحوّل الطلبات الخاصة إلى موظف بشري.'],
        'اتصال بات تلگرام به مجیک' => ['Connect a Telegram bot to Magic', 'اربط بوت تيليغرام بمجيك'],
        'بات تلگرام را به‌عنوان یک اکانت متصل اضافه کن و برای پیام‌های ورودی آن جریان‌های پاسخ‌گویی و اتوماسیون بساز.' => ['Connect your Telegram bot as an account and create automated reply flows for incoming messages.', 'أضف بوت تيليغرام كحساب متصل وأنشئ مسارات آلية للرد على الرسائل الواردة.'],
        'زمان‌بندی پست‌های کانال تلگرام' => ['Schedule Telegram channel posts', 'جدول منشورات قنوات تيليغرام'],
        'برای محتوای کانال زمان تعیین کن، پیش‌نمایش را بررسی کن و وضعیت انتشار را از پلنر دنبال کن.' => ['Set a time for channel content, review the preview and track publishing status in the planner.', 'حدد موعداً لمحتوى القناة، وراجع المعاينة وتابع حالة النشر من المخطط.'],
        'اتصال بات بله و پاسخ‌گویی خودکار' => ['Connect a Bale bot and automate replies', 'اربط بوت بله وأتمت الردود'],
        'بات بله را متصل کن، پیام‌های ورودی را دریافت کن و با جریان‌های هوشمند پاسخ بده یا گفتگو را پیگیری کن.' => ['Connect a Bale bot, receive incoming messages and reply or follow up with smart flows.', 'اربط بوت بله واستقبل الرسائل الواردة وردّ عليها أو تابعها عبر المسارات الذكية.'],
        'انتشار و زمان‌بندی در کانال بله' => ['Publish and schedule in Bale channels', 'انشر وجدول في قنوات بله'],
        'کانال بله را به مقصدهای انتشار اضافه کن و اطلاعیه‌ها و محتوای آماده را فوری یا زمان‌بندی‌شده منتشر کن.' => ['Add a Bale channel as a publishing destination and publish announcements or prepared content immediately or on a schedule.', 'أضف قناة بله كوجهة للنشر وانشر الإعلانات والمحتوى الجاهز فوراً أو وفق جدول زمني.'],
        'اتصال بات روبیکا و مدیریت پیام‌ها' => ['Connect a Rubika bot and manage messages', 'اربط بوت روبيكا وأدر الرسائل'],
        'بات روبیکا را به مجیک وصل کن، پیام‌ها را در مسیرهای تعریف‌شده دریافت کن و پاسخ‌های مناسب را اجرا کن.' => ['Connect a Rubika bot to Magic, route incoming messages through your flows and send suitable replies.', 'اربط بوت روبيكا بمجيك ووجّه الرسائل الواردة عبر المسارات المحددة وأرسل الردود المناسبة.'],
        'انتشار محتوا در کانال روبیکا' => ['Publish content to Rubika channels', 'انشر المحتوى في قنوات روبيكا'],
        'متن، تصویر و لینک را پیش‌نمایش بگیر و برای کانال روبیکا فوری یا در زمان دلخواه منتشر کن.' => ['Preview text, images and links, then publish to a Rubika channel immediately or at a scheduled time.', 'عاين النصوص والصور والروابط، ثم انشر في قناة روبيكا فوراً أو في الموعد المحدد.'],
        'ارجاع گفتگو به اپراتور انسانی' => ['Hand conversations to a human operator', 'حوّل المحادثة إلى موظف بشري'],
        'هرجا تصمیم یا پیگیری انسانی لازم است، گفتگو را به مسئول مربوط بسپار و ادامه فرایند را منظم نگه دار.' => ['Route a conversation to the right team member whenever human judgment or follow-up is needed.', 'حوّل المحادثة إلى عضو الفريق المناسب كلما تطلب الأمر تدخلاً بشرياً أو متابعة.'],
        'چطور اینستاگرام و پیام‌رسان‌ها را به ChatGPT و Claude وصل کنم؟' => ['How do I connect Instagram and messaging apps to ChatGPT and Claude?', 'كيف أربط إنستغرام وتطبيقات المراسلة بـ ChatGPT وClaude؟'],
        'اینستاگرام و بات‌های تلگرام، بله و روبیکا را در مجیک متصل کن. سپس Magic MCP را در ChatGPT یا Claude سازگار اضافه کن، با حساب مجیک وارد شو و مجوزهای موردنیازت را انتخاب کن. دستیار فقط به امکاناتی دسترسی دارد که برای حساب تو فعال و مجاز شده‌اند.' => ['Connect Instagram and your Telegram, Bale and Rubika bots in Magic. Then add Magic MCP to a compatible ChatGPT or Claude setup, sign in to Magic and choose the permissions you need. The assistant can only access features enabled and authorized for your account.', 'اربط إنستغرام وبوتات تيليغرام وبله وروبيكا في مجيك. ثم أضف Magic MCP إلى إعداد متوافق مع ChatGPT أو Claude، وسجّل الدخول إلى مجيك واختر الأذونات المطلوبة. لا يمكن للمساعد الوصول إلا إلى الميزات المفعّلة والمصرّح بها لحسابك.'],
        'آیا این امکانات فقط برای اینستاگرام است؟' => ['Are these features only for Instagram?', 'هل تقتصر هذه الإمكانات على إنستغرام؟'],
        'خیر. علاوه بر اینستاگرام، بات‌ها و کانال‌های تلگرام، بله و روبیکا هم در مجیک پشتیبانی می‌شوند. امکانات هر شبکه به نوع اتصال و مجوزهای همان حساب بستگی دارد.' => ['No. Magic also supports Telegram, Bale and Rubika bots and channels alongside Instagram. Available features depend on each network connection and its account permissions.', 'لا. يدعم مجيك أيضاً بوتات وقنوات تيليغرام وبله وروبيكا إلى جانب إنستغرام. وتعتمد الميزات المتاحة على نوع الاتصال وأذونات كل حساب.'],
        'آیا می‌توانم با هوش مصنوعی برای تلگرام، بله و روبیکا ربات پاسخ‌گو بسازم؟' => ['Can I build AI reply bots for Telegram, Bale and Rubika?', 'هل يمكنني إنشاء بوتات للرد بالذكاء الاصطناعي على تيليغرام وبله وروبيكا؟'],
        'بله. بات موردنظر را به مجیک وصل کن و در جریان‌ساز از بلوک‌های AI استفاده کن تا پیام را تحلیل کند، پاسخ مناسب بدهد و در صورت نیاز درخواست را به اپراتور انسانی ارجاع دهد.' => ['Yes. Connect the bot to Magic and use AI blocks in Flow Builder to analyze messages, prepare replies and route requests to a human operator when needed.', 'نعم. اربط البوت بمجيك واستخدم كتل الذكاء الاصطناعي في منشئ المسارات لتحليل الرسائل وإعداد الردود وتحويل الطلبات إلى موظف بشري عند الحاجة.'],
        'اتصال اینستاگرام و پیام‌رسان‌ها به ChatGPT و Claude از طریق Magic MCP' => ['Connect Instagram and messaging apps to ChatGPT and Claude through Magic MCP', 'اربط إنستغرام وتطبيقات المراسلة بـ ChatGPT وClaude عبر Magic MCP'],
        'انتشار محتوا در کانال‌های تلگرام، بله و روبیکا' => ['Publish content to Telegram, Bale and Rubika channels', 'انشر المحتوى في قنوات تيليغرام وبله وروبيكا'],
        'مرکز ارتباط+ برای تلگرام، بله و روبیکا' => ['Communication+ for Telegram, Bale and Rubika', 'مركز التواصل+ لتيليغرام وبله وروبيكا'],
        'انتشار محتوا در کانال تلگرام' => ['Publish content to a Telegram channel', 'انشر المحتوى في قناة تيليغرام'],
        'متن، تصویر و محتوای آماده را به کانال متصل بفرست؛ برای اطلاع‌رسانی و معرفی محصول از انتشار فوری استفاده کن.' => ['Send text, images and ready-to-publish content to a connected channel for announcements and product updates.', 'أرسل النصوص والصور والمحتوى الجاهز إلى قناة متصلة للإعلانات والتعريف بالمنتجات.'],
        'برای حساب‌ها و مقصدهای متصل، انتشار را از یک پلنر مدیریت کن؛ محتوای اینستاگرام را از Publisher و پست‌های کانال تلگرام، بله و روبیکا را فوری یا زمان‌بندی‌شده منتشر کن.' => ['Manage publishing for connected accounts and destinations from one Planner. Use Publisher for Instagram content and publish Telegram, Bale and Rubika channel posts immediately or on a schedule.', 'أدر النشر للحسابات والوجهات المتصلة من مخطط واحد. استخدم Publisher لمحتوى إنستغرام وانشر منشورات قنوات تيليغرام وبله وروبيكا فوراً أو وفق جدول.'],
                'پیام‌ها و گفتگوهای ورودی حساب‌های متصل اینستاگرام، تلگرام، بله و روبیکا را در یک صندوق واحد ببین. بر اساس شبکه و اکانت فیلتر کن، گفتگوهای خوانده‌نشده و آرشیوشده را جدا کن و تاریخچهٔ هر گفتگو را کنار اطلاعات مخاطب داشته باش. با جست‌وجوی نام نمایشی، نام کاربری و اطلاعات CRM، گفتگو را پیدا کن و تگ‌ها، فیلدهای اختصاصی، مرحلهٔ مشتری و زمان پیگیری را مدیریت کن.' => ['View incoming messages and conversations from connected Instagram, Telegram, Bale and Rubika accounts in one inbox. Filter by network and account, separate unread and archived threads, and keep each conversation’s history beside contact details. Find conversations by display name, username and CRM information, then manage tags, custom fields, customer stage and follow-up date.', 'اعرض الرسائل والمحادثات الواردة من حسابات إنستغرام وتيليغرام وبله وروبيكا المتصلة في صندوق واحد. صفِّ حسب الشبكة والحساب وافصل المحادثات غير المقروءة والمؤرشفة واحتفظ بسجل كل محادثة بجانب بيانات جهة الاتصال. اعثر على المحادثات بالاسم الظاهر واسم المستخدم وبيانات CRM، ثم أدر الوسوم والحقول المخصصة ومرحلة العميل وموعد المتابعة.'],
        'بلوک Google AI و Gemini' => ['Google AI and Gemini node', 'عقدة Google AI وGemini'],
        'در جریان‌ساز از Gemini برای تحلیل پیام، تولید پاسخ، استخراج اطلاعات و تصمیم‌گیری استفاده کن؛ خروجی را با متغیرهای قابل استفاده به نود بعدی وصل کن و تنظیمات ورودی و خروجی صوتی را در سناریوهای پشتیبانی‌شده به کار بگیر.' => ['Use Gemini in Flow Builder to analyze messages, generate replies, extract information and make decisions. Pass outputs to downstream nodes as variables and use voice input or output settings in supported scenarios.', 'استخدم Gemini في منشئ المسارات لتحليل الرسائل وإنشاء الردود واستخراج المعلومات واتخاذ القرارات. مرّر المخرجات إلى العقد التالية كمتغيرات واستخدم إعدادات الإدخال أو الإخراج الصوتي في السيناريوهات المدعومة.'],
        'اتصال به ChatGPT و Claude با Magic MCP' => ['Connect ChatGPT and Claude with Magic MCP', 'اربط ChatGPT وClaude عبر Magic MCP'],
        'دستیار سازگار را به ابزارهای مجاز مجیک وصل کن؛ آمار و اطلاعات قابل‌دسترسی را بخوان، گفتگوها و جریان‌ها را بررسی کن و محتوای موردنیاز را آماده کن. عملیات تغییردهنده فقط با دسترسی و تأیید لازم انجام می‌شود.' => ['Connect a compatible assistant to Magic’s authorized tools. Read available insights, review conversations and flows, and prepare content; actions that change data require the appropriate access and confirmation.', 'اربط مساعداً متوافقاً بأدوات مجيك المصرّح بها. اقرأ الإحصاءات المتاحة وراجع المحادثات والمسارات وجهّز المحتوى؛ وتتطلب الإجراءات التي تغيّر البيانات الصلاحيات والتأكيد المناسبين.'],
        'نود Google Sheets در جریان‌ساز' => ['Google Sheets node in Flow Builder', 'عقدة Google Sheets في منشئ المسارات'],
        'در جریان‌ها ردیف جدید ثبت کن، ردیف‌های موجود را با کلید دلخواه پیدا کن و ستون‌هایشان را به‌روزرسانی کن؛ نتیجهٔ چند ردیف را به‌صورت متغیر متنی یا JSON به نود AI و مراحل بعدی بده.' => ['Append new rows, find existing rows by a chosen key and update their columns from a flow. Pass multi-row results as text or JSON variables to AI nodes and downstream steps.', 'أضف صفوفاً جديدة وابحث عن الصفوف الموجودة بمفتاح تختاره وحدّث أعمدتها من داخل المسار. مرّر نتائج عدة صفوف كمتغيرات نصية أو JSON إلى عقد الذكاء الاصطناعي والخطوات التالية.'],
        'پروفایل مخاطب کنار تاریخچه گفتگو' => ['Contact profile beside conversation history', 'ملف جهة الاتصال بجانب سجل المحادثة'],
        'با بازکردن هر گفتگو، مشخصات و هویت مخاطب، سابقهٔ پیام‌ها، تگ‌ها و اطلاعات CRM را در همان فضای کاری ببین تا برای شناخت و پیگیری مشتری بین چند صفحه جابه‌جا نشوی.' => ['Open a conversation to see the contact’s identity, message history, tags and CRM details in the same workspace, without switching between pages to understand or follow up with the customer.', 'افتح المحادثة لعرض هوية جهة الاتصال وسجل الرسائل والوسوم وبيانات CRM في مساحة العمل نفسها، دون التنقل بين صفحات متعددة لفهم العميل أو متابعته.'],
        'کاتالوگ محصول و موجودی را مدیریت کن، ویترین عمومی با آدرس اختصاصی بساز، از سایت یا جریان دایرکت سفارش بگیر و جزئیات سفارش، تخفیف، ارسال، پرداخت و وضعیت تحویل را از پنل پیگیری کن.' => ['Manage your product catalog and stock, create a public storefront with a dedicated address, take orders from the website or DM flows, and track discounts, shipping, payment and delivery status from the panel.', 'أدر كتالوج المنتجات والمخزون وأنشئ واجهة متجر عامة بعنوان مخصص واستقبل الطلبات من الموقع أو مسارات الرسائل، وتابع الخصومات والشحن والدفع وحالة التسليم من اللوحة.'],
        'داشبورد آمار و تحلیل حساب اینستاگرام؛ تعداد دنبال‌کنندگان، دنبال‌شوندگان و محتوا را ببین و عملکرد استوری، ریلز، پست و کاروسل را با Views، Reach، تعامل، لایک، کامنت، اشتراک‌گذاری، ذخیره و نرخ تعامل بررسی کن.' => ['An Instagram account analytics dashboard: review follower, following and content counts, then measure Stories, Reels, posts and carousels with views, reach, interactions, likes, comments, shares, saves and engagement rate.', 'لوحة تحليلات لحساب إنستغرام: راجع أعداد المتابعين والمتابَعين والمحتوى، ثم قِس أداء القصص وReels والمنشورات والشرائح بالمشاهدات والوصول والتفاعلات والإعجابات والتعليقات والمشاركات والحفظ ومعدل التفاعل.'],
        'با تورهای مرحله‌به‌مرحلهٔ داخل پنل، اتصال حساب، آماده‌سازی اولین انتشار و ساخت جریان هوشمند را یاد بگیر؛ راهنما متناسب با همان صفحه و ابزار، نکته‌ها و مسیر بعدی را نشان می‌دهد.' => ['Learn to connect an account, prepare your first publication and build a smart flow with step-by-step tours inside the panel. Contextual tips guide you through the current page and tool.', 'تعلّم ربط الحساب وتجهيز أول منشور وبناء مسار ذكي عبر جولات إرشادية خطوة بخطوة داخل اللوحة. تعرض الإرشادات نصائح مرتبطة بالصفحة والأداة الحالية.'],
        'نمایش محتوای پیج و استوری‌ویوئر' => ['Browse account content and Story Viewer', 'تصفّح محتوى الحساب وعارض القصص'],
        'استوری‌های فعال، ریلزها، پست‌ها و کاروسل‌ها را در تب‌های جدا ببین؛ پیش‌نمایش محتوا، تاریخ انتشار و شاخص‌های در دسترس را کنار هر آیتم بررسی کن و استوری را در نمایشگر تمام‌صفحه مرور کن.' => ['Browse active Stories, Reels, posts and carousels in separate tabs. Review each item’s preview, publishing date and available metrics, and open Stories in the full-screen viewer.', 'تصفّح القصص النشطة ومقاطع Reels والمنشورات والشرائح في تبويبات منفصلة. راجع معاينة كل عنصر وتاريخ نشره ومؤشراته المتاحة، وافتح القصص في عارض ملء الشاشة.'],
        'مرکز آمار تفکیکی Profile+' => ['Profile+ analytics breakdown', 'مركز تحليلات Profile+ التفصيلي'],
        'بازهٔ ۲۴ ساعت، ۷ روز یا ۳۰ روز را انتخاب کن و آمار همهٔ محتوا، Story، Reels یا Feed را جدا ببین: Views، Reach، Total Interactions، Likes، Comments، Shares، Saves و نرخ تقریبی تعامل به Reach.' => ['Choose a 24-hour, 7-day or 30-day range and view metrics for all content, Stories, Reels or Feed separately: views, reach, total interactions, likes, comments, shares, saves and the approximate interactions-to-reach rate.', 'اختر نطاق 24 ساعة أو 7 أيام أو 30 يوماً واعرض مؤشرات كل المحتوى أو القصص أو Reels أو المنشورات بشكل منفصل: المشاهدات والوصول وإجمالي التفاعلات والإعجابات والتعليقات والمشاركات والحفظ ومعدل التفاعل التقريبي إلى الوصول.'],
        'مدیریت کامل CRM مخاطبان' => ['Manage customer CRM profiles', 'إدارة ملفات CRM للعملاء'],
        'برای هر مخاطب نام دلخواه، ایمیل، تلفن، شرکت و شهر ثبت کن؛ مرحلهٔ لید تا مشتری یا VIP، منبع جذب، اولویت، یادداشت و زمان پیگیری بعدی را در پروفایل همان گفتگو نگه دار.' => ['Save a preferred name, email, phone, company and city for each contact. Track lifecycle stage from lead to customer or VIP, acquisition source, priority, notes and the next follow-up date in the contact profile.', 'احفظ اسماً مفضلاً وبريداً إلكترونياً ورقماً هاتفياً وشركة ومدينة لكل جهة اتصال. تابع المرحلة من عميل محتمل إلى عميل أو VIP، ومصدر الاستحواذ والأولوية والملاحظات وموعد المتابعة التالي.'],
        'جست‌وجو و فیلتر گفتگوها' => ['Search and filter conversations', 'البحث في المحادثات وتصفيتها'],
                'گفتگوها را بر اساس شبکه و اکانت فیلتر کن و با نام نمایشی، نام کاربری، تگ و اطلاعات CRM پیدا کن؛ فیلترهای خوانده‌نشده، آرشیو و مرحلهٔ مشتری را به کار ببر. جست‌وجوی متن خود پیام‌ها از طریق ابزار Messenger Inbox در Magic MCP در دسترس است.' => ['Filter conversations by network and account, then find them by display name, username, tags and CRM information. Use unread, archived and customer-stage filters. Full-text message search is available through the Messenger Inbox tool in Magic MCP.', 'صفِّ المحادثات حسب الشبكة والحساب، ثم اعثر عليها بالاسم الظاهر واسم المستخدم والوسوم وبيانات CRM. استخدم فلاتر غير المقروء والمؤرشف ومرحلة العميل. يتوفر البحث الكامل في نص الرسائل عبر أداة Messenger Inbox في Magic MCP.'],
        'پاسخ مستقیم متنی و رسانه‌ای به پیام‌رسان‌ها' => ['Reply to messenger chats with text and media', 'الرد على محادثات المراسلة بالنص والوسائط'],
        'در گفتگوهای بات‌های متصل تلگرام، بله و روبیکا، پاسخ متنی یا رسانه‌ای ارسال کن؛ فایل‌های تصویری، ویدیویی و صوتی پشتیبانی‌شده را با کنترل نوع و حجم بفرست و نتیجهٔ ارسال را در تاریخچهٔ گفتگو نگه دار.' => ['Send text or media replies in connected Telegram, Bale and Rubika bot conversations. Upload supported images, videos and audio with type and size checks, and keep the delivery result in the conversation history.', 'أرسل ردوداً نصية أو وسائط في محادثات بوتات تيليغرام وبله وروبيكا المتصلة. ارفع الصور والفيديو والصوت المدعوم مع التحقق من النوع والحجم، واحتفظ بنتيجة الإرسال في سجل المحادثة.'],
        'اتصال ایمن Google Workspace' => ['Connect Google Workspace securely', 'ربط Google Workspace بأمان'],
        'حساب Google را از مسیر OAuth متصل کن و Google Sheets و Drive را به‌صورت اختصاصی برای همان کاربر در اختیار جریان‌ساز قرار بده؛ دسترسی Drive فقط به فایل‌هایی محدود است که خودت انتخاب کرده‌ای.' => ['Connect your Google account through OAuth and make Google Sheets and Drive available to that user’s workflows. Drive access is limited to files you explicitly select.', 'اربط حساب Google عبر OAuth وأتح Google Sheets وDrive لمسارات المستخدم نفسه. يقتصر الوصول إلى Drive على الملفات التي تختارها بنفسك.'],
        'نود Google Sheets؛ ثبت، جست‌وجو و به‌روزرسانی' => ['Google Sheets node: append, lookup and update', 'عقدة Google Sheets: إضافة وبحث وتحديث'],
        'انتخاب و مدیریت فایل‌های Google Drive' => ['Select and manage Google Drive files', 'اختيار ملفات Google Drive وإدارتها'],
        'از Google Picker فایل یا شیت مشخص را انتخاب کن؛ نوع، مالک، آخرین ویرایش و مجوزهای واقعی فایل را ببین و فقط در صورت داشتن اجازه، آن را باز یا دانلود کن.' => ['Choose a specific file or spreadsheet with Google Picker. View its type, owner, last-modified date and actual permissions, and open or download it only when allowed.', 'اختر ملفاً أو جدول بيانات محدداً عبر Google Picker. اعرض نوعه ومالكه وآخر تعديل وأذوناته الفعلية، وافتحه أو نزّله فقط إذا سمحت الصلاحيات.'],
        'آدرس اختصاصی فروشگاه روی زیردامنه' => ['A dedicated store subdomain', 'نطاق فرعي مخصص لمتجرك'],
        'برای هر فروشگاه شناسهٔ یکتای ۵ تا ۸ حرفی انتخاب کن تا ویترین عمومی روی نشانی اختصاصی مانند yourname.magics.site در دسترس باشد؛ مسیر فروشگاه به همان مالک متصل می‌ماند.' => ['Choose a unique 5–8 character store slug so your public storefront is available at an address such as yourname.magics.site, scoped to its owner.', 'اختر معرّفاً فريداً للمتجر من 5 إلى 8 أحرف ليصبح متجرك العام متاحاً على عنوان مثل yourname.magics.site مع ربطه بمالكه.'],
        '۹ قالب آماده برای طراحی ویترین' => ['Nine ready-made storefront themes', 'تسعة قوالب جاهزة للواجهة'],
        'از میان ۹ چیدمان فروشگاه انتخاب کن و ظاهر ویترین را با تصویر جلد، گالری محصول، ترتیب نمایش محصولات و تنظیمات قالب هماهنگ با هویت برندت تنظیم کن.' => ['Choose from nine storefront layouts and tailor the cover image, product gallery, product order and theme settings to your brand.', 'اختر من بين تسعة تخطيطات للمتجر واضبط صورة الغلاف ومعرض المنتجات وترتيبها وإعدادات القالب بما يناسب هوية علامتك.'],
        'کاتالوگ محصول و مدیریت موجودی' => ['Product catalog and inventory management', 'كتالوج المنتجات وإدارة المخزون'],
        'محصول‌ها را با نام، توضیح، قیمت، کد و تصویر ثبت کن؛ موجودی کالاهای فیزیکی را مدیریت کن تا فروش از ویترین و سفارش‌های گفتگو به یک کاتالوگ مشترک متصل بماند.' => ['Create products with names, descriptions, prices, codes and images. Manage physical stock so storefront sales and conversation orders use the same catalog.', 'أنشئ منتجات بأسمائها وأوصافها وأسعارها ورموزها وصورها. أدر مخزون المنتجات المادية ليستخدم البيع من المتجر والطلبات عبر المحادثات الكتالوج نفسه.'],
        'صفحهٔ اختصاصی محصول و گالری رسانه' => ['Product detail pages and media galleries', 'صفحات تفاصيل المنتجات ومعارض الوسائط'],
        'برای هر محصول صفحهٔ جزئیات مستقل بساز؛ عکس‌ها و ویدئوهای گالری، توضیحات، مشخصات و قیمت را نمایش بده و لینک مستقیم محصول را از ویترین برای مشتری بفرست.' => ['Give each product its own detail page with image and video galleries, description, specifications and price, then share its direct storefront link.', 'أنشئ صفحة تفاصيل مستقلة لكل منتج تعرض معارض الصور والفيديو والوصف والمواصفات والسعر، ثم شارك رابط المنتج المباشر من المتجر.'],
        'سبد خرید و ثبت سفارش در ویترین' => ['Storefront cart and checkout', 'سلة المتجر وإتمام الطلب'],
        'مشتری از فروشگاه عمومی محصول‌ها را به سبد اضافه کند، تعداد و اطلاعات ارسال را وارد کند، کد تخفیف و هزینهٔ ارسال را ببیند و سفارش را با جمع‌بندی نهایی ثبت کند.' => ['Customers can add products to the public storefront cart, enter quantities and shipping details, review coupons and shipping costs, and submit the order summary.', 'يمكن للعملاء إضافة المنتجات إلى سلة المتجر العامة وإدخال الكميات وبيانات الشحن ومراجعة القسائم وتكاليف الشحن ثم إرسال ملخص الطلب.'],
        'سبد خرید هوشمند در دایرکت' => ['Smart shopping cart in DMs', 'سلة تسوق ذكية في الرسائل'],
        'در Flow Builder محصول را به سبد مخاطب اضافه یا تعدادش را تغییر بده؛ سبد را نمایش بده، تخفیف و روش ارسال را اعمال کن، اطلاعات خریدار را ثبت کن و پس از تأیید مشتری سفارش بساز.' => ['Use Flow Builder to add products to a contact’s cart or change quantities, show the cart, apply discounts and shipping, collect buyer details and create the order after confirmation.', 'استخدم منشئ المسارات لإضافة المنتجات إلى سلة جهة الاتصال أو تعديل الكميات، واعرض السلة وطبّق الخصومات والشحن واجمع بيانات المشتري وأنشئ الطلب بعد تأكيده.'],
        'مدیریت تأمین‌کنندگان و روش‌های ارسال' => ['Manage suppliers and shipping methods', 'إدارة الموردين وطرق الشحن'],
                'اطلاعات تأمین‌کنندگان را جداگانه ثبت و ویرایش کن و روش‌های ارسال دستی داخل ایران را با محدودهٔ استان و شهر، هزینهٔ ثابت و شرط ارسال رایگان تعریف کن؛ گزینهٔ مناسب را هنگام ثبت سفارش و محاسبهٔ هزینهٔ ارسال نمایش بده.' => ['Create and edit supplier records and configure manual shipping methods within Iran by province and city, with fixed costs and free-shipping thresholds. Show applicable options and costs during order placement.', 'أنشئ سجلات الموردين وعدّلها واضبط طرق الشحن اليدوية داخل إيران حسب المحافظة والمدينة، مع تكاليف ثابتة وحدود للشحن المجاني. اعرض الخيارات والتكاليف المناسبة أثناء تسجيل الطلب.'],
        'کنترل موجودی، ارسال و مرجوعی سفارش' => ['Inventory, shipping and returns control', 'إدارة المخزون والشحن والمرتجعات'],
                'موجودی سفارش‌های فعال به‌صورت رزرو‌شده کنترل می‌شود؛ وضعیت بسته‌بندی، ارسال، تحویل یا مرجوعی را ثبت کن و نام شرکت حمل، کد و لینک رهگیری را دستی نگه دار. درخواست مرجوعی، بازگشت موجودی و ثبت استرداد را از پنل پیگیری کن.' => ['Reserve stock for active orders and record packing, shipping, delivery or return status. Manually save the carrier, tracking code and link, then manage return requests, restocking and refund records in the panel.', 'احجز المخزون للطلبات النشطة وسجّل حالة التجهيز أو الشحن أو التسليم أو الإرجاع. احفظ يدوياً شركة النقل ورمز التتبع ورابطه، ثم أدر طلبات الإرجاع وإعادة المخزون وسجلات الاسترداد من اللوحة.'],
        'کد تخفیف و کمپین‌های فروش' => ['Discount codes and sales campaigns', 'رموز الخصم وحملات المبيعات'],
        'کدهای تخفیف را با محدودیت زمانی، تعداد مصرف و قوانین اعتبار تعریف کن؛ مبلغ تخفیف و جمع نهایی سفارش سمت سرور محاسبه می‌شود تا قیمت ارسالی مرورگر مبنای محاسبه نباشد.' => ['Create discount codes with validity dates, usage limits and eligibility rules. Discounts and final totals are recalculated server-side rather than trusted from the browser.', 'أنشئ رموز خصم بمواعيد صلاحية وحدود استخدام وقواعد أهلية. يُعاد حساب الخصم والإجمالي النهائي على الخادم بدلاً من الوثوق بالقيم القادمة من المتصفح.'],
                'آداپتور پرداخت زرین‌پال؛ غیرفعال به‌صورت پیش‌فرض' => ['Zarinpal payment adapter — disabled by default', 'موصل دفع Zarinpal — معطّل افتراضياً'],
                'آداپتور زرین‌پال در کد موجود است، اما درگاه برای فروشگاه‌ها به‌صورت پیش‌فرض خاموش است. فعال‌سازی واقعی نیازمند شناسهٔ پذیرنده، تنظیم اختصاصی فروشگاه و تکمیل تست‌های Sandbox و Production است؛ تا آن زمان سفارش فقط در وضعیت «در انتظار پرداخت» ثبت می‌شود.' => ['The Zarinpal adapter exists in the code, but the gateway is disabled by default for stores. Activation requires a merchant ID, store-specific configuration and completed Sandbox and Production tests. Until then, orders are recorded as awaiting payment.', 'موصل Zarinpal موجود في الكود، لكن بوابة الدفع معطّلة افتراضياً للمتاجر. يتطلب التفعيل معرّف تاجر وإعداداً خاصاً بالمتجر وإكمال اختبارات Sandbox وProduction. وحتى ذلك الحين تُسجّل الطلبات بانتظار الدفع.'],
                'ویترین سه‌زبانهٔ فارسی، انگلیسی و عربی' => ['A trilingual storefront in Persian, English and Arabic', 'واجهة متجر بثلاث لغات: الفارسية والإنجليزية والعربية'],
                'فروشگاه عمومی را به فارسی، انگلیسی یا عربی نمایش بده؛ عنوان‌ها، صفحهٔ محصول، گالری، سبد خرید، فرم ثبت سفارش و پیام‌های وضعیت سفارش متناسب با زبان انتخاب‌شدهٔ بازدیدکننده ارائه می‌شوند.' => ['Display the public store in Persian, English or Arabic. Product pages, galleries, cart, checkout form and order-status messages follow the visitor’s selected language.', 'اعرض المتجر العام بالفارسية أو الإنجليزية أو العربية. تتبع صفحات المنتجات والمعارض وسلة التسوق ونموذج الطلب ورسائل حالة الطلب اللغة التي يختارها الزائر.'],
        'چند مقصد برای یک دکمه و خروجی مستقیم نود' => ['Multiple button destinations and direct node outputs', 'وجهات متعددة للزر ومخرجات مباشرة للعقدة'],
        'یک دکمه را به حداکثر ۸ مسیر مستقل وصل کن؛ در همان نود هم خروجی مستقیم تعریف کن تا بدون کلیک کاربر اجرا شود و شاخه‌های دکمه فقط پس از انتخاب همان دکمه فعال شوند.' => ['Connect one button to up to eight independent destinations, while also defining a direct node output that runs automatically. Button branches run only after the user clicks that exact button.', 'اربط زراً واحداً بما يصل إلى ثمانية مسارات مستقلة، مع تعريف مخرج مباشر للعقدة يعمل تلقائياً. لا تعمل فروع الزر إلا بعد نقر المستخدم على ذلك الزر.'],
        'انتشار چندمرحله‌ای رسانه در کانال‌ها' => ['Multi-stage media publishing to channels', 'نشر وسائط متعدد المراحل في القنوات'],
        'برای تلگرام، بله و روبیکا پیام چندمرحله‌ای شامل متن، تصویر، ویدئو، صوت، سند یا آلبوم بساز؛ ترتیب رسانه، کپشن و دکمهٔ لینک را در پیش‌نویس و پلنر مدیریت کن.' => ['Create multi-stage Telegram, Bale and Rubika channel messages with text, images, video, audio, documents or albums. Manage media order, captions and link buttons in drafts and the Planner.', 'أنشئ رسائل متعددة المراحل لقنوات تيليغرام وبله وروبيكا تشمل النصوص والصور والفيديو والصوت والمستندات أو الألبومات. أدر ترتيب الوسائط والتعليقات وأزرار الروابط في المسودات والمخطط.'],
                'گزارش عملکرد Smart Direct با Magic MCP' => ['Smart Direct performance reports with Magic MCP', 'تقارير أداء Smart Direct عبر Magic MCP'],
                'برای جریان‌های Smart Direct اینستاگرام، از طریق ابزار گزارش Magic MCP اجراهای موفق و ناموفق، مخاطبان یکتا و تفکیک هر جریان را بخوان؛ نمایش و Postback دکمه‌های تعاملی را از نمایش، کلیک و نرخ کلیک لینک‌های خروجی جداگانه بررسی کن.' => ['Use the Magic MCP reporting tool for Instagram Smart Direct flows to review successful and failed executions, unique contacts and per-flow breakdowns. Separate native button impressions and postbacks from external-link impressions, clicks and click-through rates.', 'استخدم أداة التقارير في Magic MCP لمسارات Smart Direct على إنستغرام لمراجعة التنفيذ الناجح والفاشل وجهات الاتصال الفريدة وتفاصيل كل مسار. افصل مرات ظهور الأزرار الأصلية وعمليات Postback عن مرات ظهور الروابط الخارجية والنقرات ومعدل النقر.'],
        'قابلیت‌ها بر اساس اهمیت و کاربرد مرتب شده‌اند؛ ۱۵ قابلیت اصلی را همین‌جا ببین و برای مشاهدهٔ تمام امکانات عملیاتی مجیک، «مشاهده بیشتر» را بزن.' => ['Features are ordered by importance and practical value. See the top 15 here, then select “View more” to explore the full set of live Magic capabilities.', 'تُرتّب الميزات حسب الأولوية والقيمة العملية. شاهد أهم 15 ميزة هنا، ثم اختر «عرض المزيد» لاستكشاف جميع إمكانات مجيك المتاحة.'],
        'پیام‌های اینستاگرام، تلگرام، بله و روبیکا را در مرکز ارتباط+ یکجا مدیریت کن؛ آمار کامل پیج را در پروفایل+ ببین، محتوا بساز و منتشر کن، فروشگاه و سفارش‌ها را اداره کن و جریان‌های هوشمند AI بساز.' => ['Manage Instagram, Telegram, Bale and Rubika messages in one Communication+ inbox; review account analytics in Profile+, create and publish content, manage your store and orders, and build AI-powered flows.', 'أدر رسائل إنستغرام وتيليغرام وبله وروبيكا في صندوق Communication+ واحد؛ وراجع تحليلات الحساب في Profile+ وأنشئ المحتوى وانشره وأدر المتجر والطلبات وابنِ مسارات مدعومة بالذكاء الاصطناعي.'],
        'مرکز ارتباط+ چه شبکه‌هایی را یکجا نمایش می‌دهد؟' => ['Which networks appear together in Communication+?', 'ما الشبكات التي يعرضها Communication+ معاً؟'],
        'گفتگوهای حساب‌های متصل اینستاگرام، تلگرام، بله و روبیکا در یک صندوق یکپارچه نمایش داده می‌شوند. می‌توانی گفتگوها را بر اساس شبکه، اکانت، خوانده‌نشده و آرشیو فیلتر کنی و مشخصات و اطلاعات CRM مخاطب را کنار تاریخچهٔ گفتگو ببینی.' => ['Conversations from connected Instagram, Telegram, Bale and Rubika accounts appear in one unified inbox. Filter by network, account, unread or archived status, and view contact details and CRM information beside the conversation history.', 'تظهر محادثات حسابات إنستغرام وتيليغرام وبله وروبيكا المتصلة في صندوق موحد. يمكنك التصفية حسب الشبكة والحساب وحالة عدم القراءة أو الأرشفة، وعرض بيانات جهة الاتصال وCRM بجانب سجل المحادثة.'],
        'پروفایل+ چه آمارهایی را نمایش می‌دهد؟' => ['What metrics does Profile+ show?', 'ما المؤشرات التي يعرضها Profile+؟'],
        'پروفایل+ آمار حساب و محتوا را نمایش می‌دهد؛ از دنبال‌کنندگان و تعداد محتوا تا Views، Reach، تعامل، لایک، کامنت، اشتراک‌گذاری، ذخیره و نرخ تعامل در بازه‌های ۲۴ ساعت، ۷ روز و ۳۰ روز و تفکیک Story، Reels و Feed. دسترس‌پذیری هر شاخص به داده‌ای بستگی دارد که Meta برای آن نوع محتوا ارائه می‌کند.' => ['Profile+ shows account and content metrics, from follower and content counts to views, reach, interactions, likes, comments, shares, saves and engagement rate across 24-hour, 7-day and 30-day ranges, broken down by Stories, Reels and Feed. Availability depends on the metrics Meta provides for each content type.', 'يعرض Profile+ مؤشرات الحساب والمحتوى، من أعداد المتابعين والمحتوى إلى المشاهدات والوصول والتفاعلات والإعجابات والتعليقات والمشاركات والحفظ ومعدل التفاعل خلال 24 ساعة و7 أيام و30 يوماً، مع تقسيم القصص وReels والمنشورات. وتعتمد الإتاحة على المؤشرات التي توفرها Meta لكل نوع محتوى.'],
        'مدیریت اینستاگرام و پیام‌رسان‌ها | فروشگاه‌ساز مجیک' => ['Instagram and Messaging Management | Magic Store Builder', 'إدارة إنستغرام والرسائل | منشئ المتاجر من مجيك'],
        'اینستاگرام، تلگرام، بله و روبیکا را یکجا مدیریت کن؛ فروشگاه‌ساز چندکاناله، پاسخ‌گوی هوشمند، مرکز ارتباط+ و اتصال Google Drive و Google Sheets با هوش مصنوعی.' => ['Manage Instagram, Telegram, Bale and Rubika in one place. Build a multichannel store, automate replies, manage orders, and connect Google Drive and Google Sheets with AI.', 'أدر إنستغرام وتيليغرام وبله وروبيكا من مكان واحد. أنشئ متجراً متعدد القنوات، وأتمت الردود والطلبات، واربط Google Drive وGoogle Sheets بالذكاء الاصطناعي.'],
        'مدیریت اینستاگرام، اتوماسیون پیام‌رسان‌ها و فروشگاه‌ساز چندکاناله' => ['Instagram management, messaging automation and multichannel store builder', 'إدارة إنستغرام وأتمتة الرسائل ومنشئ متجر متعدد القنوات'],
        'مدیریت اینستاگرام' => ['Instagram management', 'إدارة إنستغرام'],
        'فروشگاه‌ساز چندکاناله' => ['Multichannel store builder', 'منشئ متجر متعدد القنوات'],
        'فروشگاه‌ساز اینستاگرام' => ['Instagram store builder', 'منشئ متجر إنستغرام'],
        'فروشگاه‌ساز تلگرام' => ['Telegram store builder', 'منشئ متجر تيليغرام'],
        'فروشگاه‌ساز بله' => ['Bale store builder', 'منشئ متجر بله'],
        'فروشگاه‌ساز روبیکا' => ['Rubika store builder', 'منشئ متجر روبيكا'],
        'پاسخگوی هوشمند تلگرام' => ['Telegram AI responder', 'مساعد رد ذكي لتيليغرام'],
        'پاسخگوی هوشمند بله' => ['Bale AI responder', 'مساعد رد ذكي لبله'],
        'پاسخگوی هوشمند روبیکا' => ['Rubika AI responder', 'مساعد رد ذكي لروبيكا'],
        'مرکز ارتباط یکپارچه' => ['Unified inbox', 'صندوق وارد موحد'],
        'اتوماسیون دایرکت' => ['DM automation', 'أتمتة الرسائل الخاصة'],
        'اتصال Google Drive' => ['Google Drive integration', 'ربط Google Drive'],
        'اتصال Google Sheets' => ['Google Sheets integration', 'ربط Google Sheets'],
        'Google Workspace' => ['Google Workspace', 'Google Workspace'],
        'Magic MCP' => ['Magic MCP', 'Magic MCP'],
        'ChatGPT' => ['ChatGPT', 'ChatGPT'],
        'Claude' => ['Claude', 'Claude'],
        'فروشگاه‌ساز چندکاناله برای اینستاگرام، تلگرام، بله و روبیکا' => ['Multichannel store builder for Instagram, Telegram, Bale and Rubika', 'منشئ متجر متعدد القنوات لإنستغرام وتيليغرام وبله وروبيكا'],
        'ساخت ویترین عمومی با زیردامنه اختصاصی و ۹ قالب آماده' => ['Create a public storefront on a dedicated subdomain with nine ready-made themes', 'أنشئ واجهة متجر عامة على نطاق فرعي مخصص مع تسعة قوالب جاهزة'],
        'سفارش‌گیری از ویترین و جریان‌های دایرکت و ربات‌های متصل' => ['Accept orders from the storefront and connected DM or bot workflows', 'استقبل الطلبات من واجهة المتجر ومسارات الرسائل والبوتات المتصلة'],
        'پاسخ‌گوی هوشمند تلگرام با جریان‌ساز و بلوک‌های AI' => ['Telegram AI responder with Flow Builder and AI blocks', 'مساعد رد ذكي لتيليغرام عبر منشئ المسارات وكتل الذكاء الاصطناعي'],
        'پاسخ‌گوی هوشمند بله با جریان‌ساز و بلوک‌های AI' => ['Bale AI responder with Flow Builder and AI blocks', 'مساعد رد ذكي لبله عبر منشئ المسارات وكتل الذكاء الاصطناعي'],
        'پاسخ‌گوی هوشمند روبیکا با جریان‌ساز و بلوک‌های AI' => ['Rubika AI responder with Flow Builder and AI blocks', 'مساعد رد ذكي لروبيكا عبر منشئ المسارات وكتل الذكاء الاصطناعي'],
        'صندوق یکپارچه پیام‌های اینستاگرام، تلگرام، بله و روبیکا' => ['Unified inbox for Instagram, Telegram, Bale and Rubika messages', 'صندوق موحد لرسائل إنستغرام وتيليغرام وبله وروبيكا'],
        'اتصال Google Drive برای انتخاب فایل‌های اختصاصی' => ['Connect Google Drive to select user-authorized files', 'اربط Google Drive لاختيار الملفات التي يصرّح بها المستخدم'],
        'اتصال Google Sheets برای ثبت، جست‌وجو و به‌روزرسانی داده‌ها' => ['Connect Google Sheets to append, search and update data', 'اربط Google Sheets لإضافة البيانات والبحث عنها وتحديثها'],
        'مدیریت کاتالوگ، موجودی، سفارش‌ها، تأمین‌کنندگان و ارسال' => ['Manage catalogs, inventory, orders, suppliers and shipping', 'أدر الكتالوج والمخزون والطلبات والموردين والشحن'],
        'انتشار چندشبکه‌ای و زمان‌بندی کانال‌های تلگرام، بله و روبیکا' => ['Multichannel publishing and scheduling for Telegram, Bale and Rubika channels', 'النشر والجدولة عبر قنوات تيليغرام وبله وروبيكا'],
        'آیا مجیک فروشگاه‌ساز چندکاناله برای اینستاگرام، تلگرام، بله و روبیکا دارد؟' => ['Can Magic build a multichannel store for Instagram, Telegram, Bale and Rubika?', 'هل يوفّر Magic منشئ متجر متعدد القنوات لإنستغرام وتيليغرام وبله وروبيكا؟'],
        'بله. می‌توانی یک ویترین عمومی با زیردامنه اختصاصی و یکی از ۹ قالب آماده بسازی. محصولات را در کاتالوگ مشترک ثبت کن و سفارش‌ها را از ویترین یا جریان‌های دایرکت و ربات‌های متصل بگیر؛ مدیریت موجودی و پیگیری سفارش‌ها از پنل انجام می‌شود.' => ['Yes. Create a public storefront on a dedicated subdomain and choose from nine ready-made themes. Manage products in one shared catalog, accept orders from the storefront or connected DM and bot flows, and track inventory and orders from your dashboard.', 'نعم. أنشئ واجهة متجر عامة على نطاق فرعي مخصص واختر من بين تسعة قوالب جاهزة. أدر المنتجات في كتالوج موحد واستقبل الطلبات من الواجهة أو مسارات الرسائل والبوتات المتصلة، وتابع المخزون والطلبات من لوحة التحكم.'],
        'چطور برای تلگرام، بله و روبیکا پاسخ‌گوی هوشمند بسازم؟' => ['How can I build an AI responder for Telegram, Bale and Rubika?', 'كيف أنشئ مساعد رد ذكي لتيليغرام وبله وروبيكا؟'],
        'بات هر پیام‌رسان را به مجیک وصل کن و در جریان‌ساز برای آن مسیر پاسخ‌گویی بساز. بلوک‌های هوش مصنوعی پیام را پردازش می‌کنند و می‌توانند پاسخ متناسب بدهند یا گفتگو را به اپراتور انسانی ارجاع دهند.' => ['Connect each messenger bot to Magic and create a reply workflow for that account. AI blocks process incoming messages and can generate contextual replies or hand the conversation to a human operator.', 'اربط بوت كل تطبيق مراسلة بـ Magic وأنشئ مسار رد لذلك الحساب. تعالج كتل الذكاء الاصطناعي الرسائل الواردة ويمكنها إنشاء ردود مناسبة للسياق أو إحالة المحادثة إلى موظف بشري.'],
        'اتصال Google Drive و Google Sheets در مجیک چه کاربردی دارد؟' => ['What can Google Drive and Google Sheets do in Magic?', 'ما فائدة ربط Google Drive وGoogle Sheets في Magic؟'],
        'حساب Google را با OAuth متصل کن، فایل موردنیاز را از Google Drive انتخاب کن و در جریان‌ساز از نود Google Sheets برای ثبت پاسخ‌ها، جست‌وجوی ردیف قبلی و به‌روزرسانی اطلاعات مخاطب یا سفارش استفاده کن. دسترسی Drive به فایل‌هایی محدود است که خودت انتخاب کرده‌ای.' => ['Connect your Google account through OAuth, select the required file from Google Drive, and use the Google Sheets node in Flow Builder to append responses, find existing rows and update contact or order information. Drive access is limited to files you select.', 'اربط حساب Google عبر OAuth واختر الملف المطلوب من Google Drive، ثم استخدم عقدة Google Sheets في منشئ المسارات لإضافة الردود والبحث عن صف سابق وتحديث بيانات جهة الاتصال أو الطلب. يقتصر الوصول إلى Drive على الملفات التي تختارها.'],
        'آیا می‌توانم انتشار محتوا در اینستاگرام، تلگرام، بله و روبیکا را یکجا مدیریت کنم؟' => ['Can I manage publishing to Instagram, Telegram, Bale and Rubika in one place?', 'هل يمكنني إدارة النشر على إنستغرام وتيليغرام وبله وروبيكا من مكان واحد؟'],
        'بله. در پلنر مقصدهای انتشار را مدیریت کن؛ برای کانال‌های تلگرام، بله و روبیکا می‌توانی پیام چندرسانه‌ای را پیش‌نویس نگه داری، فوری منتشر کنی یا زمان‌بندی کنی. امکانات هر مقصد به نوع حساب و دسترسی API همان شبکه بستگی دارد.' => ['Yes. Manage publishing destinations in the Planner. For Telegram, Bale and Rubika channels, save multimedia messages as drafts, publish immediately or schedule them. Available actions depend on each account type and the network API permissions.', 'نعم. أدر وجهات النشر من المخطط. وبالنسبة إلى قنوات تيليغرام وبله وروبيكا، يمكنك حفظ الرسائل متعددة الوسائط كمسودات أو نشرها فوراً أو جدولتها. وتعتمد الإمكانات المتاحة على نوع الحساب وأذونات API الخاصة بالشبكة.'],
        'یک مرکز برای مدیریت کسب‌وکار دیجیتال' => ['One hub for your digital business', 'مركز واحد لإدارة أعمالك الرقمية'],
        'از انتشار تا فروش' => ['From publishing to sales', 'من النشر إلى البيع'],
        'انتشار چندکاناله، فروشگاه اختصاصی، پیام‌رسان‌ها، CRM و ابزارهای هوشمند را در یک مسیر مدیریتی به هم وصل کن.' => ['Connect multichannel publishing, your own storefront, messaging, CRM and intelligent tools in one business workspace.', 'اربط النشر متعدد القنوات ومتجرك الخاص والمراسلات وإدارة العملاء والأدوات الذكية في مساحة عمل واحدة.'],
        'انتشار چندکاناله' => ['Multichannel publishing', 'النشر متعدد القنوات'],
        'اینستاگرام و کانال‌های تلگرام، بله و روبیکا' => ['Instagram plus Telegram, Bale and Rubika channels', 'إنستغرام وقنوات تيليغرام وبله وروبيكا'],
        'فروشگاه و سفارش‌ها' => ['Storefront and orders', 'المتجر والطلبات'],
        'ویترین اختصاصی، سبد خرید و مدیریت سفارش' => ['Your own storefront, cart and order management', 'واجهة متجرك وسلة التسوق وإدارة الطلبات'],
        'پاسخ‌گویی در پیام‌رسان‌ها' => ['Messaging across platforms', 'الرد عبر تطبيقات المراسلة'],
        'مدیریت پیام‌ها و جریان پاسخ‌گویی در یک پنل' => ['Manage conversations and reply workflows in one panel', 'إدارة المحادثات ومسارات الرد من لوحة واحدة'],
        'تبدیل تعامل به فرصت فروش' => ['Turn engagement into sales opportunities', 'حوّل التفاعل إلى فرص للبيع'],
        'از کامنت و دایرکت تا پیگیری و ثبت سفارش' => ['From comments and DMs to follow-up and orders', 'من التعليقات والرسائل إلى المتابعة والطلبات'],
        'CRM و مدیریت مشتریان' => ['CRM and customer management', 'إدارة العملاء والعلاقات'],
        'پروفایل، تگ‌ها و سوابق ارتباط با مخاطب' => ['Contact profiles, tags and interaction history', 'ملفات العملاء والعلامات وسجل التفاعلات'],
        'تولید محتوای هوشمند' => ['AI-powered content creation', 'إنشاء المحتوى بالذكاء الاصطناعي'],
        'ساخت تصویر، ویدئو و کپشن با هوش مصنوعی' => ['Create images, videos and captions with AI', 'أنشئ الصور والفيديوهات والتعليقات باستخدام الذكاء الاصطناعي'],
        'اتصال Google Drive و Sheets' => ['Google Drive and Sheets integration', 'الربط مع Google Drive وSheets'],
        'اتصال فایل‌ها و مدیریت داده در جریان‌ها' => ['Connect files and manage data inside workflows', 'اربط الملفات وأدر البيانات داخل مسارات العمل'],
        'اتصال ChatGPT و Claude با MCP' => ['Connect ChatGPT and Claude with MCP', 'اربط ChatGPT وClaude عبر MCP'],
        'دسترسی دستیارهای هوشمند به ابزارهای مجیک' => ['Give AI assistants access to Magic tools', 'امنح المساعدات الذكية إمكانية استخدام أدوات Magic'],
        'اتوماسیون فرایندهای کسب‌وکار' => ['Business process automation', 'أتمتة عمليات الأعمال'],
        'محرک‌ها، شرط‌ها، متغیرها و زیرجریان‌ها' => ['Triggers, conditions, variables and subflows', 'المحفزات والشروط والمتغيرات والمسارات الفرعية'],
        'چالش واقعی' => ['The real challenge', 'التحدي الفعلي'],
        'راهکار مجیک' => ['The Magic solution', 'حل Magic'],
        'نتیجه برای کسب‌وکار' => ['The business outcome', 'النتيجة لأعمالك'],
        'جزئیات مورد انتخاب‌شده' => ['Details of the selected use case', 'تفاصيل الحالة المختارة'],
        'انتشار محتوا در چند شبکه و کانال، وقتی هرکدام پنل جداگانه‌ای دارند، زمان و تمرکز زیادی می‌گیرد.' => ['Publishing across several networks becomes time-consuming when every destination has its own separate dashboard.', 'يستغرق النشر عبر شبكات وقنوات متعددة وقتاً وجهداً عندما تكون لكل وجهة لوحة منفصلة.'],
        'مقصدهای اینستاگرام و کانال‌های تلگرام، بله و روبیکا را در پلنر مدیریت کن؛ محتوا را پیش‌نمایش بگیر، فوری منتشر کن یا برای زمان دلخواه برنامه‌ریزی کن.' => ['Manage Instagram and your Telegram, Bale and Rubika channel destinations in the Planner. Preview content, publish immediately or schedule it for later.', 'أدر وجهات إنستغرام وقنوات تيليغرام وبله وروبيكا من المخطط. عاين المحتوى وانشر فوراً أو جدوله لوقت لاحق.'],
        'برنامه انتشار چندکاناله را از یک محیط منسجم مدیریت کن.' => ['Manage your multichannel publishing plan from one connected workspace.', 'أدر خطة النشر متعددة القنوات من مساحة عمل موحدة.'],
        'معرفی محصولات، دریافت سفارش و پیگیری موجودی و ارسال معمولاً بین ابزارهای جدا پخش می‌شود.' => ['Product discovery, order intake, inventory and delivery tracking are often scattered across separate tools.', 'غالباً ما يتوزع عرض المنتجات واستقبال الطلبات ومتابعة المخزون والتوصيل بين أدوات منفصلة.'],
        'فروشگاه عمومی با زیردامنه اختصاصی و ۹ قالب آماده بساز؛ کاتالوگ، سبد خرید، موجودی، سفارش‌ها، تأمین‌کنندگان و روش‌های ارسال را از پنل مدیریت کن.' => ['Create a public storefront on your own subdomain with nine ready-made themes. Manage the catalog, cart, inventory, orders, suppliers and shipping methods from your dashboard.', 'أنشئ متجراً عاماً على نطاق فرعي خاص بك مع تسعة قوالب جاهزة. أدر الكتالوج وسلة التسوق والمخزون والطلبات والموردين وطرق الشحن من لوحة التحكم.'],
        'از ویترین اختصاصی تا ثبت و پیگیری سفارش، یک چرخه کامل داشته باش.' => ['Run the full journey from your branded storefront to order creation and tracking.', 'أدر الرحلة كاملة من واجهة متجرك إلى إنشاء الطلبات ومتابعتها.'],
        'مخاطب در شبکه‌های مختلف پیام می‌دهد و جابه‌جایی بین بات‌ها و پنل‌ها پاسخ‌گویی را دشوار می‌کند.' => ['Customers message you on different platforms, and switching between bots and dashboards makes replies harder to manage.', 'يراسلك العملاء عبر منصات مختلفة، ويجعل التنقل بين البوتات ولوحات التحكم الردود أصعب.'],
        'حساب‌ها و بات‌های اینستاگرام، تلگرام، بله و روبیکا را متصل کن؛ گفتگوها را در مرکز ارتباط ببین و برای هر حساب جریان پاسخ‌گویی بساز.' => ['Connect supported Instagram accounts and Telegram, Bale and Rubika bots. Manage conversations in Communication Center and build reply workflows for each account.', 'اربط حسابات إنستغرام وبوتات تيليغرام وبله وروبيكا المدعومة. أدر المحادثات في مركز التواصل وأنشئ مسارات رد لكل حساب.'],
        'مدیریت متمرکزتر گفتگوها و پاسخ‌گویی در بسترهای مختلف.' => ['A more centralized way to manage conversations and replies across platforms.', 'طريقة أكثر مركزية لإدارة المحادثات والردود عبر المنصات.'],
        'کامنت یا پیام مخاطب اگر مسیر بعدی نداشته باشد، به‌راحتی به یک تعامل کوتاه ختم می‌شود.' => ['A comment or message can remain a one-off interaction unless there is a clear next step.', 'قد يبقى التعليق أو الرسالة تفاعلاً عابراً ما لم تكن هناك خطوة تالية واضحة.'],
        'با محرک‌های کامنت و دایرکت، پاسخ خودکار، دکمه، لینک، شرط و بلوک‌های هوش مصنوعی، ادامه گفتگو را طراحی کن.' => ['Design the next steps with comment and DM triggers, automated replies, buttons, links, conditions and AI blocks.', 'صمّم الخطوات التالية باستخدام محفزات التعليقات والرسائل والردود التلقائية والأزرار والروابط والشروط وكتل الذكاء الاصطناعي.'],
        'از اولین تعامل تا معرفی محصول، دریافت اطلاعات و ثبت سفارش مسیر بساز.' => ['Build a journey from the first interaction to product discovery, information capture and order creation.', 'أنشئ رحلة تبدأ من أول تفاعل وتمتد إلى عرض المنتج وجمع المعلومات وإنشاء الطلب.'],
        'اطلاعات تماس، سوابق گفتگو و وضعیت پیگیری مشتری ممکن است پراکنده بماند.' => ['Contact details, conversation history and follow-up status can easily become fragmented.', 'قد تتشتت بيانات الاتصال وسجل المحادثات وحالة المتابعة.'],
        'پروفایل مخاطب، تگ‌ها، فیلدهای اختصاصی و تاریخچه تعامل را در CRM مدیریت کن و آن‌ها را به جریان‌های ارتباطی و سفارش‌ها وصل کن.' => ['Manage contact profiles, tags, custom fields and interaction history in CRM, then connect them to communication workflows and orders.', 'أدر ملفات العملاء والعلامات والحقول المخصصة وسجل التفاعلات في CRM، واربطها بمسارات التواصل والطلبات.'],
        'هر مخاطب با اطلاعات و وضعیت روشن برای پیگیری بعدی.' => ['Every contact has clear details and a status ready for the next follow-up.', 'بيانات وحالة واضحة لكل جهة اتصال لتسهيل المتابعة التالية.'],
        'ایده‌پردازی، تولید تصویر و ویدئو و آماده‌سازی کپشن در ابزارهای جداگانه زمان‌بر است.' => ['Brainstorming, creating images and videos, and preparing captions in separate tools takes time.', 'يستغرق ابتكار الأفكار وإنشاء الصور والفيديوهات وتجهيز النصوص وقتاً عند استخدام أدوات منفصلة.'],
        'در Smart Studio تصویر، ویدئو و کپشن بساز یا ویرایش کن و خروجی را مستقیم به مسیر انتشار بفرست.' => ['Create or edit images, videos and captions in Smart Studio, then send the output directly to publishing.', 'أنشئ الصور والفيديوهات والنصوص أو حرّرها في Smart Studio، ثم أرسل النتيجة مباشرة إلى النشر.'],
        'از ایده تا محتوای آماده انتشار در یک جریان.' => ['Move from idea to publish-ready content in one workflow.', 'انتقل من الفكرة إلى محتوى جاهز للنشر ضمن مسار واحد.'],
        'ثبت اطلاعات و پیدا کردن داده‌های قبلی در فایل‌های کاری، به کار دستی و تکراری تبدیل می‌شود.' => ['Saving information and finding existing records in work files can become repetitive manual work.', 'قد يتحول حفظ المعلومات والعثور على السجلات السابقة في ملفات العمل إلى مهام يدوية متكررة.'],
        'Google Drive را وصل کن و فایل انتخابی را در جریان استفاده کن؛ با Google Sheets داده‌ها را اضافه، جست‌وجو، به‌روزرسانی یا حذف کن.' => ['Connect Google Drive and use a file you selected in your workflow. With Google Sheets, append, search, update or delete data rows.', 'اربط Google Drive واستخدم الملف الذي اخترته داخل المسار. ومن خلال Google Sheets أضف صفوف البيانات أو ابحث عنها أو حدّثها أو احذفها.'],
        'فرایندهای مخاطب و سفارش را به داده‌های واقعی فایل‌های انتخابی متصل کن.' => ['Connect contact and order workflows to real data in the files you selected.', 'اربط مسارات العملاء والطلبات بالبيانات الفعلية في الملفات التي اخترتها.'],
        'دستیار هوش مصنوعی بدون اتصال به ابزارهای واقعی، بیشتر به پیشنهاد و تولید متن محدود می‌ماند.' => ['Without access to real tools, an AI assistant is mostly limited to suggestions and text generation.', 'من دون الوصول إلى أدوات فعلية، يظل المساعد الذكي محدوداً غالباً بالاقتراحات وإنشاء النصوص.'],
        'Magic MCP را به ChatGPT یا Claude وصل کن تا دستیار سازگار، ابزارها و داده‌های مجاز مجیک را از طریق پروتکل MCP فراخوانی کند.' => ['Connect Magic MCP to ChatGPT or Claude so a compatible assistant can call authorized Magic tools and data through the MCP protocol.', 'اربط Magic MCP بـ ChatGPT أو Claude ليتمكن المساعد المتوافق من استدعاء أدوات Magic وبياناتها المصرح بها عبر بروتوكول MCP.'],
        'هوش مصنوعی را از یک پاسخ‌گو به دستیار متصل به ابزارهای واقعی تبدیل کن.' => ['Turn AI from a conversational responder into an assistant connected to real tools.', 'حوّل الذكاء الاصطناعي من مجيب على الأسئلة إلى مساعد متصل بأدوات فعلية.'],
        'فرایندهای کسب‌وکار چندمرحله‌ای‌اند و با شرط‌ها و مسیرهای مختلف پیش می‌روند.' => ['Business processes often span multiple steps, conditions and branching paths.', 'غالباً ما تتكون عمليات الأعمال من خطوات متعددة وشروط ومسارات متفرعة.'],
        'با Flow Builder محرک‌ها، شرط‌ها، دکمه‌ها، متغیرها، زیرجریان‌ها، نودهای هوش مصنوعی و Google Sheets را کنار هم بچین.' => ['Combine triggers, conditions, buttons, variables, subflows, AI nodes and Google Sheets in Flow Builder.', 'اجمع المحفزات والشروط والأزرار والمتغيرات والمسارات الفرعية وعقد الذكاء الاصطناعي وGoogle Sheets في Flow Builder.'],
        'اتوماسیون‌های قابل توسعه و متناسب با عملیات واقعی کسب‌وکار بساز.' => ['Build extensible automations tailored to the way your business actually operates.', 'أنشئ عمليات أتمتة قابلة للتوسع ومصممة لتناسب طريقة عمل نشاطك التجاري.'],
        'اینستاگرام و پیام‌رسان‌ها' => ['Instagram and messaging apps', 'إنستغرام وتطبيقات المراسلة'],
        'جست‌وجوی متن پیام‌ها و مخاطبان با Magic MCP' => ['Search message text and contacts with Magic MCP', 'ابحث في نص الرسائل وجهات الاتصال باستخدام Magic MCP'],
        'در ابزار Messenger Inbox از طریق Magic MCP، متن پیام‌ها و اطلاعات مخاطبان یک اکانت متصل را جست‌وجو کن؛ دامنهٔ جست‌وجو را روی پیام‌ها، مخاطبان یا هر دو بگذار و نتایج را بر اساس جهت پیام و بازهٔ زمانی محدود کن.' => ['Use the Messenger Inbox tool through Magic MCP to search message text and contact information for a connected account. Search messages, contacts or both, then narrow results by message direction and date range.', 'استخدم أداة Messenger Inbox عبر Magic MCP للبحث في نص الرسائل وبيانات جهات الاتصال لحساب متصل. ابحث في الرسائل أو جهات الاتصال أو كليهما، ثم حدّد النتائج حسب اتجاه الرسالة والنطاق الزمني.'],
    ];
    foreach ($previewCopy as $original => $variants) {
        $landingTranslations[$original] = $variants[$landingLanguage === 'en' ? 0 : 1];
    }
    $landingMarkupDictionary=[];
    foreach ($landingTranslations as $original=>$translated) {
        if (!is_string($original)||!is_string($translated)||$translated==='') continue;
        if (preg_match('/^.{1,2}$/us',$original)) continue;
        $landingMarkupDictionary[$original]=$translated;
    }
    $landingSchemaDictionary=$landingTranslations+[
        'ساخت و مدیریت محتوا'=>$landingLanguage==='en'?'Content creation and management':'إنشاء المحتوى وإدارته',
        'انتشار فوری و زمان‌بندی محتوا'=>$landingLanguage==='en'?'Instant and scheduled publishing':'النشر الفوري وجدولة المحتوى',
        'دایرکت هوشمند و اتوماسیون گفتگو'=>$landingLanguage==='en'?'Smart DMs and conversation automation':'الرسائل الذكية وأتمتة المحادثات',
        'اتصال تلگرام به جریان‌های اینستاگرام و ادامه پاسخ از تلگرام'=>$landingLanguage==='en'?'Connect Telegram to Instagram workflows and reply from Telegram':'ربط تيليغرام بمسارات إنستغرام والرد من تيليغرام',
        'پردازش ویس و پاسخ هوشمند صوتی در دایرکت'=>$landingLanguage==='en'?'Voice message processing and intelligent voice replies in DMs':'معالجة الرسائل الصوتية والردود الصوتية الذكية في الرسائل الخاصة',
        'مدیریت مخاطب و لید'=>$landingLanguage==='en'?'Contact and lead management':'إدارة جهات الاتصال والعملاء المحتملين',
        'ابزارهای هوش مصنوعی برای محتوا و پاسخ‌گویی'=>$landingLanguage==='en'?'AI tools for content and replies':'أدوات الذكاء الاصطناعي للمحتوى والردود',
    ];
    ob_start(static function(string $markup) use($landingMarkupDictionary,$landingSchemaDictionary,$landingLanguage):string {
        // JSON-LD is data, not executable JavaScript. Decode and encode it so
        // translated quotes cannot break JSON or escape the script element.
        $markup=preg_replace_callback('~(<script\b[^>]*type="application/ld\+json"[^>]*>)([\s\S]*?)(</script>)~i',
            static function(array $m) use($landingSchemaDictionary,$landingLanguage):string {
                $data=json_decode($m[2],true);
                if(!is_array($data))return $m[0];
                $root='https://go.magics.site/';
                $canonical=$root.($landingLanguage==='fa'?'':'?lang='.$landingLanguage);
                $translateValue=static function($value) use(&$translateValue,$landingSchemaDictionary,$landingLanguage,$root,$canonical) {
                    if(is_array($value))return array_map($translateValue,$value);
                    if(!is_string($value))return $value;
                    if($value==='fa-IR')return $landingLanguage==='fa'?'fa-IR':$landingLanguage;
                    if($value===$root)return $canonical;
                    foreach(['webpage','software','faq'] as $fragment)
                        if($value===$root.'#'.$fragment)return $canonical.'#'.$fragment;
                    return $landingSchemaDictionary[$value]??$value;
                };
                $data=$translateValue($data);
                foreach($data['@graph']??[] as $i=>$node){
                    if(($node['@type']??'')==='WebSite'){
                        $data['@graph'][$i]['url']=$root;
                        $data['@graph'][$i]['inLanguage']=['fa-IR','en','ar'];
                    }
                }
                return $m[1].json_encode($data,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_HEX_TAG|JSON_HEX_AMP|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_THROW_ON_ERROR).$m[3];
            },$markup)??$markup;
        // Translate only HTML markup. Never alter inline JavaScript or CSS:
        // interpolating translated apostrophes into JS literals could break demos.
        $fragments=preg_split(
            '~(<(?:script|style)\\b[^>]*>[\\s\\S]*?</(?:script|style)>)~i',
            $markup,-1,PREG_SPLIT_DELIM_CAPTURE
        );
        $digitMap=$landingLanguage==='en'
            ?['۰'=>'0','۱'=>'1','۲'=>'2','۳'=>'3','۴'=>'4','۵'=>'5','۶'=>'6','۷'=>'7','۸'=>'8','۹'=>'9']
            :['۰'=>'٠','۱'=>'١','۲'=>'٢','۳'=>'٣','۴'=>'٤','۵'=>'٥','۶'=>'٦','۷'=>'٧','۸'=>'٨','۹'=>'٩'];
        if(is_array($fragments)){
            foreach($fragments as $i=>$fragment){
                if(preg_match('~^<(?:script|style)\\b~i',$fragment))continue;
                $fragments[$i]=strtr(strtr($fragment,$landingMarkupDictionary),$digitMap);
            }
            $markup=implode('',$fragments);
        }
        // Keep the original calendar design while localizing its seven abbreviations.
        $weekdays=$landingLanguage==='en'
            ?['ش'=>'Sa','ی'=>'Su','د'=>'Mo','س'=>'Tu','چ'=>'We','پ'=>'Th','ج'=>'Fr']
            :['ش'=>'س','ی'=>'ح','د'=>'ن','س'=>'ث','چ'=>'ر','پ'=>'خ','ج'=>'ج'];
        $markup=preg_replace_callback('~(<div class="weekdays">)(.*?)(</div>)~s',
            static function(array $m) use($weekdays):string {
                $middle=$m[2];
                $middle=preg_replace_callback('~>([^<>]+)<~u',
                    static fn(array $day):string=>'>'.($weekdays[$day[1]]??$day[1]).'<',$middle)??$middle;
                return $m[1].$middle.$m[3];
            },$markup)??$markup;
        $markup=str_replace('<span>صف</span>',
            $landingLanguage==='en'?'<span>Queue</span>':'<span>قائمة</span>',$markup);

        return $markup;
    });
}
?>
<!DOCTYPE html>

<html data-theme="light" dir="<?= $landingDirection ?>" lang="<?= $landingLanguage ?>">
<head>
<script src="/landing-assets/js/theme-bootstrap.js?v=1.0.0"></script>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1, viewport-fit=cover" name="viewport"/>
<meta name="magic-perf-build" content="msm-landing-perf-20261029-r10"/>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<!-- Cold-load performance: request the unchanged critical stylesheet before large SEO metadata. -->
<?php
// Opt-in measurement only. Default landing behavior stays unchanged.
$magicPerfLabInline = isset($_GET['magic_perf_lab']) && $_GET['magic_perf_lab'] === 'inline-css';
$magicPerfLabLogo = isset($_GET['magic_perf_lab']) && $_GET['magic_perf_lab'] === 'critical-logo';
$magicPerfLabLite = isset($_GET['magic_perf_lab']) && $_GET['magic_perf_lab'] === 'critical-lite';
$magicPerfLabIdle = isset($_GET['magic_perf_lab']) && $_GET['magic_perf_lab'] === 'critical-idle';
$magicPerfLabVisibility = isset($_GET['magic_perf_lab']) && $_GET['magic_perf_lab'] === 'critical-visibility';
// Enable the verified critical-fast loading path for ordinary public landing requests.
$magicPerfPublicFast = !array_key_exists('magic_perf_lab', $_GET);
$magicPerfLabFast = $magicPerfPublicFast || (isset($_GET['magic_perf_lab']) && $_GET['magic_perf_lab'] === 'critical-fast');
$magicPerfLabPaint = isset($_GET['magic_perf_lab']) && $_GET['magic_perf_lab'] === 'critical-paint';
$magicPerfLabStable = $magicPerfLabFast || $magicPerfLabPaint || (isset($_GET['magic_perf_lab']) && $_GET['magic_perf_lab'] === 'critical-stable');
$magicPerfLabCritical = $magicPerfLabStable || $magicPerfLabLogo || $magicPerfLabLite || $magicPerfLabIdle || $magicPerfLabVisibility || (isset($_GET['magic_perf_lab']) && $_GET['magic_perf_lab'] === 'critical-css');
if ($magicPerfLabInline || $magicPerfLabCritical): ?>
<?php if ($magicPerfLabLogo): ?><link rel="preload" href="/landing-assets/images/logo-mark.svg" as="image" type="image/svg+xml" fetchpriority="high"/><?php endif; ?>
<style id="magic-perf-lab-inline-css"><?php
  $magicPerfCssPath = __DIR__ . ($magicPerfLabLite ? '/landing-assets/css/critical-mobile-lite.css' : ($magicPerfLabCritical ? '/landing-assets/css/critical-mobile.css' : '/landing-assets/css/styles.css'));
  if (is_file($magicPerfCssPath)) { readfile($magicPerfCssPath); }
?></style>

<?php else: ?>
<link rel="preload" href="/landing-assets/css/styles.css?v=43.0.4-usecases" as="style" fetchpriority="high"/>
<?php endif; ?>
<?php if ($magicPerfLabStable): ?>
<style id="magic-perf-lab-stable">
#heroHeadline[data-perf-stable]{position:relative}
#heroHeadline .hero-headline-sizing,#heroHeadline .hero-headline-live{display:block;background:none!important;color:inherit;-webkit-background-clip:border-box;background-clip:border-box}
#heroHeadline .hero-headline-sizing{visibility:hidden;pointer-events:none}
#heroHeadline .hero-headline-live{position:absolute;inset:0}
</style>
<?php endif; ?>
<?php if ($magicPerfLabFast || $magicPerfLabPaint): ?>
<style id="magic-perf-lab-fast">
/* Opt-in mobile-only offscreen rendering test. No changes to desktop or default landing. */
@media (max-width:760px) {
  main > section.section-pad:not(#hero) {
    content-visibility:auto;
    contain-intrinsic-size:auto 900px;
  }
  /* The original reveal is retained, but its first-frame arrival no longer waits for deferred JS. */
  #hero .hero-copy.reveal {
    opacity:1;
    transform:none;
    animation:magicPerfHeroArrival .55s cubic-bezier(.2,.7,.2,1) both;
  }
}
@keyframes magicPerfHeroArrival {
  from {opacity:0;transform:translateY(16px)}
  to {opacity:1;transform:none}
}
@media (prefers-reduced-motion:reduce) {
  #hero .hero-copy.reveal {animation:none}
}
</style>
<?php endif; ?>



<meta content="#f7f7fa" name="theme-color"/>
<meta name="description" content="<?= htmlspecialchars($landingSeoDescription, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>"/>
<meta name="keywords" content="<?= htmlspecialchars($landingSeoKeywords, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>"/>
<title><?= htmlspecialchars($landingSeoTitle, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></title>
<!-- MSM GEO/SEO production metadata — localized and refreshed 2026-11-23 -->
<link rel="canonical" href="https://go.magics.site/<?= $landingLanguage==='fa'?'':('?lang='.$landingLanguage) ?>"/>
<link rel="alternate" hreflang="fa-IR" href="https://go.magics.site/"/>
<link rel="alternate" hreflang="en" href="https://go.magics.site/?lang=en"/>
<link rel="alternate" hreflang="ar" href="https://go.magics.site/?lang=ar"/>
<link rel="alternate" hreflang="x-default" href="https://go.magics.site/"/>
<meta name="robots" content="<?= $landingNoIndex ? 'noindex,nofollow' : 'index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1' ?>"/>
<meta name="googlebot" content="<?= $landingNoIndex ? 'noindex,nofollow' : 'index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1' ?>"/>
<meta name="application-name" content="Magic Super Manager"/>
<meta name="author" content="Magics"/>
<meta property="og:type" content="website"/>
<meta property="og:locale" content="<?= $landingLanguage==='en'?'en_US':($landingLanguage==='ar'?'ar_SA':'fa_IR') ?>"/>
<meta property="og:site_name" content="Magic Super Manager"/>
<meta property="og:title" content="<?= htmlspecialchars($landingSeoTitle, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>"/>
<meta property="og:description" content="<?= htmlspecialchars($landingSeoDescription, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>"/>
<meta property="og:url" content="https://go.magics.site/<?= $landingLanguage==='fa'?'':('?lang='.$landingLanguage) ?>"/>
<meta property="og:image" content="https://go.magics.site/landing-assets/images/msm-social-preview.jpg"/>
<meta property="og:image:secure_url" content="https://go.magics.site/landing-assets/images/msm-social-preview.jpg"/>
<meta property="og:image:type" content="image/jpeg"/>
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="630"/>
<meta property="og:image:alt" content="<?= htmlspecialchars($landingSeoTitle, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>"/>
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:title" content="<?= htmlspecialchars($landingSeoTitle, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>"/>
<meta name="twitter:description" content="<?= htmlspecialchars($landingSeoDescription, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>"/>
<meta name="twitter:image" content="https://go.magics.site/landing-assets/images/msm-social-preview.jpg"/>
<meta name="twitter:image:alt" content="<?= htmlspecialchars($landingSeoTitle, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>"/>

<!-- /MSM GEO/SEO production metadata -->
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
<meta http-equiv="Pragma" content="no-cache"/>
<meta http-equiv="Expires" content="0"/>
<link href="/landing-assets/images/logo-mark.svg" rel="icon" type="image/svg+xml"/><!-- Performance: font CSS is non-render-blocking; the same Vazirmatn family and weights load asynchronously. -->
<link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&amp;display=swap" rel="stylesheet" media="print" onload="this.onload=null;this.media='all'" referrerpolicy="no-referrer-when-downgrade"/>
<noscript><link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&amp;display=swap" rel="stylesheet" referrerpolicy="no-referrer-when-downgrade"/></noscript><?php if (!$magicPerfLabInline && !$magicPerfLabCritical): ?><link href="/landing-assets/css/styles.css?v=43.0.4-usecases" rel="stylesheet"/><?php elseif($magicPerfLabFast): ?>
<!-- Responsive experiment: ONE stylesheet request. Render-blocking on desktop, initially async on mobile. -->
<link id="magic-perf-fast-full-css" href="/landing-assets/css/styles.css?v=43.0.4-usecases" rel="stylesheet" media="(min-width:761px)" onload="this.onload=null;if(matchMedia('(max-width:760px)').matches)this.media='all'"/>
<script>
(() => {
  const breakpoint = matchMedia('(max-width:760px)');
  breakpoint.addEventListener('change', event => {
    const style = document.getElementById('magic-perf-fast-full-css');
    if (style && style.sheet) style.media = event.matches ? 'all' : '(min-width:761px)';
  });
})();
</script>
<noscript><link href="/landing-assets/css/styles.css?v=43.0.4-usecases" rel="stylesheet"/></noscript>
<?php elseif($magicPerfLabPaint): ?>
<!-- Opt-in race-free paint experiment: desktop gets blocking CSS; mobile swaps the loaded stylesheet after first render. -->
<link href="/landing-assets/css/styles.css?v=43.0.4-usecases" rel="stylesheet" media="(min-width:761px)"/>
<link href="/landing-assets/css/styles.css?v=43.0.4-usecases" rel="stylesheet" media="print" onload="this.onload=null;const el=this;if(matchMedia('(max-width:760px)').matches){const apply=()=>requestAnimationFrame(()=>requestAnimationFrame(()=>{el.media='all'}));if(document.readyState==='complete')apply();else window.addEventListener('load',apply,{once:true})}"/>
<noscript><link href="/landing-assets/css/styles.css?v=43.0.4-usecases" rel="stylesheet"/></noscript>
<?php elseif($magicPerfLabCritical): ?><link href="/landing-assets/css/styles.css?v=43.0.4-usecases" rel="stylesheet" media="print" onload="this.onload=null;this.media='all'"/><noscript><link href="/landing-assets/css/styles.css?v=43.0.4-usecases" rel="stylesheet"/></noscript><?php endif; ?>
<?php if ($magicPerfLabVisibility): ?>
<style id="magic-perf-lab-visibility">
/* Offscreen containment experiment only. Render every section normally once near viewport. */
#features,#use-cases,#platform,#quick-start,#faq-start,#all-features,#contact{
  content-visibility:auto;
  contain-intrinsic-size:auto 900px;
}
</style>
<?php endif; ?>
<link href="/landing-assets/css/header.css?v=1.0.0" rel="stylesheet"/>
<style id="landingEnglishI18nStyle">
/* English landing: reverse the RTL-only surfaces, while FA and AR remain untouched. */
html[lang="en"]{direction:ltr}
html[lang="en"] body,
html[lang="en"] main,
html[lang="en"] .hero-copy,
html[lang="en"] .quick-trust,
html[lang="en"] .trust-row,
html[lang="en"] .lifecycle-four,
html[lang="en"] .story-steps,
html[lang="en"] .core-feature-grid,
html[lang="en"] .feature-grid,
html[lang="en"] .use-case-grid,
html[lang="en"] .platform-compare,
html[lang="en"] .start-journey-head,
html[lang="en"] .start-journey-steps,
html[lang="en"] .start-journey-bottom,
html[lang="en"] .flow-node,
html[lang="en"] .flow-node-v2,
html[lang="en"] .flow-detail-bar,
html[lang="en"] .node-inspector,
html[lang="en"] .asset-rail,
html[lang="en"] .studio-output,
html[lang="en"] .studio-panel,
html[lang="en"] .chat-list,
html[lang="en"] .chat-window,
html[lang="en"] .contact-panel,
html[lang="en"] .inbox-mobile-tabs,
html[lang="en"] .feature-card-footer>span{
 direction:ltr!important;
}
html[lang="en"] .hero-copy,
html[lang="en"] .hero-copy .eyebrow,
html[lang="en"] .hero-copy h1,
html[lang="en"] .hero-copy .hero-lead,
html[lang="en"] .trust-row,
html[lang="en"] .bullet-stack,
html[lang="en"] .hero-scenario-switch button,
html[lang="en"] .publish-now,
html[lang="en"] .chat-person,
html[lang="en"] .contact-panel dl,
html[lang="en"] .faq article button,
html[lang="en"] .premium-faq article button,
html[lang="en"] .contact-section-head,
html[lang="en"] .contact-method-card b,
html[lang="en"] .studio-publisher-section .product-pair-block>.showcase-copy{
 text-align:left!important;
}
html[lang="en"] .hero-copy .hero-lead{direction:ltr!important}
html[lang="en"] .feature-card-footer>span{unicode-bidi:normal!important}

/* EN typing punctuation: isolate LTR fragments without changing FA/AR or animation timing. */
html[lang="en"] #heroHeadline,
html[lang="en"] #heroHeadline .hero-line{
 direction:ltr!important;text-align:left!important;unicode-bidi:isolate
}
html[lang="en"] #heroHeadline [data-type-text]{
 direction:ltr!important;unicode-bidi:isolate;white-space:pre-wrap
}
/* English typing: intrinsic title height at ALL viewport widths; no absolute overlap. */
html[lang="en"] #heroHeadline[data-perf-stable]{
 display:grid!important;grid-template-columns:minmax(0,1fr)!important;
 grid-template-rows:auto;align-content:start;width:100%;max-width:100%;
 line-height:1.22!important;letter-spacing:-.035em!important;margin-bottom:20px!important
}
html[lang="en"] #heroHeadline[data-perf-stable] .hero-headline-sizing,
html[lang="en"] #heroHeadline[data-perf-stable] .hero-headline-live{
 grid-area:1/1!important;display:block!important;position:relative!important;
 inset:auto!important;align-self:start;min-width:0;width:100%
}
html[lang="en"] #heroHeadline .hero-line{
 display:block!important;min-height:0!important;white-space:normal!important;
 line-height:1.22!important;overflow-wrap:normal;margin:0 0 .05em
}
html[lang="en"] #heroHeadline .hero-headline-sizing [data-type-text],
html[lang="en"] #heroHeadline .hero-headline-live [data-type-text]{
 white-space:pre-wrap!important;direction:ltr!important;unicode-bidi:isolate
}
html[lang="en"] .hero-copy .hero-lead{clear:both;position:relative;margin-top:0!important}
@media (min-width:761px) and (max-width:1100px){
 html[lang="en"] #heroHeadline[data-perf-stable]{font-size:clamp(32px,4vw,45px)!important}
}
@media (max-width:760px){
 html[lang="en"] #heroHeadline[data-perf-stable]{
  font-size:clamp(26px,7.2vw,34px)!important;line-height:1.23!important;
  margin:12px 0 18px!important
 }
 html[lang="en"] #heroHeadline .hero-line{line-height:1.23!important}
}

</style>

<style id="v31-desktop-trust-grid-lower-more">
/* v31: move the desktop 2×2 trust grid a little further down while keeping mobile unchanged. */
.hero.section-pad{padding-bottom:clamp(12px,1.2vw,20px)!important;}
.hero-desktop-trust{
  display:grid;
  grid-template-columns:repeat(2,minmax(0,1fr));
  gap:8px;
  margin-top:70px;
  padding:9px;
  border-radius:22px;
  max-width:650px;
}
.hero-desktop-trust>div{
  min-height:68px;
  padding:10px 11px;
  grid-template-columns:34px minmax(0,1fr);
  gap:8px;
}
.hero-desktop-trust>div>span{width:34px;height:34px;border-radius:11px;}
.hero-desktop-trust b{font-size:11.7px;line-height:1.45;}
.hero-desktop-trust small{font-size:10.1px;line-height:1.5;}
.quick-trust-section.section-pad{display:none!important;}
.quick-trust-section + .product-cycle-section.section-pad{padding-top:clamp(14px,1.5vw,24px)!important;}
@media (max-width:760px){
  .hero.section-pad{padding-bottom:12px!important;}
  .hero-desktop-trust{display:none!important;}
  .quick-trust-section.section-pad{display:block!important;padding-top:0!important;padding-bottom:10px!important;}
  .quick-trust-section .quick-trust{margin-top:0!important;margin-bottom:0!important;}
  .quick-trust-section + .product-cycle-section.section-pad{padding-top:18px!important;}
}
</style>












<style>
.preview-links,.preview-trail{display:flex;flex-wrap:wrap;gap:.65rem;align-items:center}
.preview-links{justify-content:center;margin:1.5rem 0}
.preview-links a,.preview-trail span{border:1px solid var(--line);border-radius:2em;padding:.45em 1em;font-size:.85rem}
.preview-links a:hover,.preview-links a:focus-visible{border-color:var(--violet)}
.preview-pair{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:1rem}
.preview-story{padding:clamp(1.2rem,3vw,2.6rem);border-radius:1.5rem;scroll-margin-top:6rem}
.preview-story h3{font-size:clamp(1.25rem,2vw,1.7rem);margin:0 0 .65rem}
.preview-story p{color:var(--muted);line-height:1.95;margin:0}
.preview-trail{margin-top:1.2rem;color:var(--text)}
.preview-case{margin-top:1rem;border-inline-start:4px solid var(--violet)}
.preview-flow{margin:.8rem 0 0;padding-inline-start:1.4em;line-height:2}
@media(max-width:700px){.preview-pair{grid-template-columns:1fr}}
</style>
<style>
.service-orbit{position:relative;z-index:1;display:flex;justify-content:center;align-items:center;gap:clamp(9px,2vw,22px);margin:clamp(18px,3vw,38px) auto 0;padding:9px 0}
.service-bubble{display:grid;place-items:center;width:clamp(42px,5vw,60px);aspect-ratio:1;border-radius:50%;background:var(--glow-card);border:1px solid var(--line);box-shadow:0 8px 20px rgba(86,64,155,.15);animation:service-float 4s ease-in-out infinite alternate}
.service-bubble:nth-child(even){animation-delay:-3s}.service-bubble:nth-child(3n){animation-delay:-1.5s}
.service-bubble:focus-visible{outline:2px solid var(--violet);outline-offset:4px}
.service-bubble img,.service-bubble svg{width:60%;height:60%}
.integration-card{scroll-margin-top:90px}
@keyframes service-float{from{transform:translateY(-4px)}to{transform:translateY(4px)}}
@media(prefers-reduced-motion:reduce){.service-bubble{animation:none}}
</style>
<style>
/* The icon rail sits below both hero columns. */
#hero{flex-direction:column;justify-content:center}
#hero>.hero-grid{flex:none}
#hero>.service-orbit{flex:none}
.preview-pair{gap:clamp(12px,2vw,24px)}
.preview-story,.integration-card{--integration-tint:#8259dd;position:relative;overflow:hidden;border:1px solid var(--line);background:radial-gradient(ellipse at 8% 0%,color-mix(in srgb,var(--integration-tint) 13%,transparent),transparent 55%),var(--glow-card)}
.preview-story{display:grid;gap:1.15rem;align-content:space-between}
.preview-story .omni-demo{width:100%}
.preview-story .preview-trail{margin:0}
.preview-story .omni-copy p{font-size:clamp(.83rem,1vw,.98rem)}
.preview-story .omni-kicker i svg,.omni-kicker>img,.omni-kicker>svg,.omni-app-head>img{width:23px;height:23px;vertical-align:middle}
#channel-planner,#integration-telegram{--integration-tint:#229ed9}
#sheets-flow,#integration-sheets,#integration-bale{--integration-tint:#0eaa72}
#shop-plus,#integration-rubika{--integration-tint:#d557a4}
.integration-card .core-icon{background:color-mix(in srgb,var(--integration-tint) 10%,var(--surface));border:1px solid color-mix(in srgb,var(--integration-tint) 30%,transparent)}
.integration-card:after{content:"";height:2px;display:block;margin-top:auto;background:linear-gradient(90deg,transparent,var(--integration-tint),transparent)}
.omni-bale .omni-kicker,.omni-rubika .omni-kicker{color:var(--text);background:var(--surface)}
.omni-bale:before,.omni-rubika:before{inset:auto -5rem -7rem auto;background:rgba(69,163,152,.18)}
.omni-bale .tg-message,.omni-rubika .tg-message{margin-top:12px;margin-inline-start:auto}
#channel-mcp,#magic-guide{margin-block:1rem}
.preview-case .preview-flow{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:1rem;padding:0;list-style-position:inside}
.preview-case li{background:var(--surface);border:1px solid var(--line);border-radius:15px;padding:.9rem}
@media(max-width:760px){.preview-case .preview-flow{grid-template-columns:1fr}.preview-story{padding:1rem}}
</style>
<style>
.preview-sheet{width:100%;border-collapse:collapse;font-size:.8rem;text-align:start;font-variant-numeric:tabular-nums}
.preview-sheet th,.preview-sheet td{border:1px solid var(--line);padding:.5rem;text-align:start}
.preview-sheet th{background:color-mix(in srgb,#159267 13%,transparent)}
.preview-schedule{display:flex;align-items:center;gap:.65rem;font-size:.8rem;border-block-start:1px solid var(--line);padding:.45rem 0}
.preview-schedule img,.preview-schedule svg,.preview-story .omni-app-head svg{width:23px;height:23px}
.preview-schedule time{margin-inline-start:auto;direction:ltr;font-variant-numeric:tabular-nums}
.preview-story .tg-message{margin:.5rem 0 0;margin-inline-start:auto}
</style>
<style>
#product-cycle .section-head{container-type:inline-size}
#product-cycle #cycle-title{font-size:min(36px,3.5vw);font-size:var(--cycle-fit,min(36px,3.3cqw));white-space:nowrap}
#cycle-title span{display:inline-block}
@media(max-width:400px){#hero .service-orbit{gap:clamp(4px,2vw,8px)}#hero .service-bubble{width:clamp(32px,11vw,42px)}}
</style>
<style>
#shop-plus,#magic-guide{scroll-margin-top:90px}
.ms-show{border-radius:26px;overflow:hidden}
.ms-menu{display:flex;gap:4px;padding:8px;background:var(--surface-2);border-bottom:1px solid var(--line)}
.ms-menu button{flex:1;display:flex;justify-content:center;align-items:center;gap:.55rem;padding:.78rem .35rem;font:inherit;font-size:.88rem;font-weight:700;color:var(--muted);border:1px solid transparent;border-radius:14px;background:transparent}
.ms-menu button[aria-pressed=true]{color:var(--text);background:var(--surface);border-color:var(--line-strong);box-shadow:0 3px 12px #28134312}
.ms-menu svg,.mg-title svg{color:var(--violet)}
.ms-pane{display:grid;grid-template-columns:1fr 1fr;align-items:center;gap:clamp(1rem,4vw,4rem);padding:clamp(1.2rem,3.5vw,3rem)}
.ms-pane[hidden]{display:none}
.ms-pane .omni-copy h3{font-size:clamp(1.3rem,2.3vw,2rem)}.ms-pane .omni-copy p{font-size:.93rem}
.ms-demo{min-width:0;background:var(--surface);border:1px solid var(--line-strong);border-radius:18px;overflow:hidden;box-shadow:var(--shadow)}
.ms-bar,.ms-item{display:flex;align-items:center;justify-content:space-between;gap:8px;padding:12px 16px}.ms-bar{font-size:.74rem;color:var(--muted);border-bottom:1px solid var(--line)}.ms-item{font-size:.86rem}.ms-item bdi{font:700 .72rem monospace;color:var(--muted)}
.ms-product-photo{display:block;width:100%;height:auto}
.ms-chat,.ms-order,.ms-demo table{margin:16px}.ms-chat p{width:fit-content;padding:9px 14px;border-radius:14px;background:var(--surface-3);font-size:.85rem}.ms-chat p:last-child{margin-inline-start:auto;background:color-mix(in srgb,var(--violet) 16%,var(--surface))}
.ms-order{padding-inline-start:2rem;color:var(--muted)}.ms-order li:nth-child(2){color:var(--text);font-weight:700}.ms-demo table{width:calc(100% - 32px);border-collapse:collapse;font-size:.82rem}.ms-demo td,.ms-demo th{padding:8px;text-align:start;border-bottom:1px solid var(--line)}.ms-item svg,.shop-networks svg,.shop-networks img{height:20px;width:20px;vertical-align:middle}.shop-networks{display:flex;flex-wrap:wrap;gap:12px;margin-block-start:1rem;font-size:.75rem}
.mg-strip{margin-block:1rem;display:grid;grid-template-columns:1fr auto;align-items:center;gap:8px 18px;border-radius:19px;padding:clamp(14px,2vw,24px)}
.mg-title,.mg-links,.mg-links a{display:flex;align-items:center;gap:9px}.mg-title h3,.mg-strip p{margin:0}.mg-title h3{font-size:1.08rem}.mg-strip p{grid-column:1/-1;color:var(--muted);font-size:.82rem}.mg-all,.mg-links a{font-weight:700;font-size:.79rem}.mg-links{flex-wrap:wrap;grid-column:1/-1}.mg-links a{padding:4px 10px;border:1px solid var(--line);border-radius:8px;background:var(--surface)}.mg-strip a:hover{text-decoration:underline}
@media(max-width:700px){.ms-pane{grid-template-columns:1fr}.ms-menu{display:grid;grid-template-columns:1fr 1fr}.ms-menu button{padding:.55rem}.mg-strip{gap:8px}.mg-all{white-space:nowrap}}
</style>
<style>
/* Adjacent landing sections share the space between them. */
#top > .section-pad:not(#hero):not(#trust):not(#product-cycle) {
  padding-block:clamp(16px,2.2vw,30px)!important;
}
#smart-direct .smart-direct-intro {
  display:grid;grid-template-columns:minmax(0,1.35fr) minmax(0,1fr);
  align-items:center;gap:clamp(16px,3vw,36px);
  padding:clamp(15px,2vw,26px);margin:0 0 14px;
  border:1px solid var(--line);border-radius:22px;background:var(--glow-card);
}
#smart-direct .showcase-copy {max-width:65ch;margin:0;text-align:start}
#smart-direct .showcase-copy h2 {font-size:clamp(21px,2.3vw,32px);line-height:1.45;margin:8px 0}
#smart-direct .showcase-copy p {margin:0}
#smart-direct .smart-bullets {margin:0;gap:6px;text-align:start}
#smart-direct .smart-bullets>div {grid-template-columns:28px minmax(0,1fr);gap:10px;padding:7px 10px;background:var(--surface);border:1px solid var(--line);border-radius:12px}
#smart-direct .smart-bullets>div>span {width:28px;height:28px;border-radius:8px}
#smart-direct .smart-bullets p {margin:0;line-height:1.45}
#smart-direct .flow-demo-v2 {min-height:0;height:auto}
@media(max-width:760px){
  #smart-direct .smart-direct-intro {grid-template-columns:minmax(0,1fr);gap:12px}
  #smart-direct .smart-bullets {grid-template-columns:repeat(3,minmax(0,1fr))}
  #smart-direct .smart-bullets>div {display:block;padding:8px}
  #smart-direct .smart-bullets>div>span {display:none}
}
@media(max-width:480px){
  #smart-direct .smart-bullets {grid-template-columns:minmax(0,1fr)}
  #smart-direct .smart-bullets>div {display:grid;grid-template-columns:26px minmax(0,1fr);padding:6px 10px}
  #smart-direct .smart-bullets>div>span {display:grid;width:26px;height:26px}
}
</style>
<style>.ms-cart-preview{display:block}#hengam-cart{scroll-margin-top:90px;background:var(--surface)}#hengam-cart summary{cursor:pointer;font-weight:700;padding:10px 15px;color:var(--text)}#hengam-cart dl{margin:0;padding:0 15px 12px}#hengam-cart dl div{display:flex;justify-content:space-between;border-top:1px solid var(--line);padding:5px 0;font-size:.84rem}#hengam-cart dd{margin:0}#hengam-cart dl div:last-child{font-weight:700}</style>
<style id="landing-typography-unification">
/* Keep recently added landing cards on the same type scale as the established feature cards. */
.preview-story h3,
.preview-story .omni-copy h3,
.omni-card .omni-copy h3,
.preview-case h3 {
  font-size:18px!important;
  line-height:1.65!important;
  margin:0 0 8px!important;
  font-weight:800;
}
.preview-story p,
.preview-story .omni-copy p,
.omni-card .omni-copy p,
.preview-case li {
  font-size:13px!important;
  line-height:1.85!important;
}
.preview-case .preview-flow {font-size:13px;line-height:1.85}
#instagram-ai-mcp .section-head h2 {
  font-size:clamp(27px,3vw,36px)!important;
  line-height:1.4!important;
}
#instagram-ai-mcp .section-head p,
#instagram-ai-mcp .mcp-landing-card p,
#instagram-ai-mcp .mcp-landing-connect p {
  font-size:13px!important;
  line-height:1.9!important;
}
#instagram-ai-mcp .mcp-landing-card h3,
#instagram-ai-mcp .mcp-landing-connect h3 {
  font-size:18px!important;
  line-height:1.65!important;
}
#instagram-ai-mcp .mcp-landing-card.is-green {--mcp-rgb:33,182,111}
#instagram-ai-mcp .mcp-landing-card.is-orange {--mcp-rgb:245,166,55}
.magic-rainbow-text {
  display:inline-block;
  color:var(--violet-2);
  background:linear-gradient(90deg,#ff526f 0%,#ff9b43 15%,#f7d34b 30%,#42c98a 45%,#36bde8 60%,#6477f5 75%,#d45bd9 90%,#ff526f 100%);
  background-size:220% 100%;
  -webkit-background-clip:text;
  background-clip:text;
  -webkit-text-fill-color:transparent;
  animation:magicRainbowShift 7s linear infinite;
}
@keyframes magicRainbowShift {to{background-position:220% 50%}}
@media(max-width:760px) {
  .preview-story h3,.preview-story .omni-copy h3,.omni-card .omni-copy h3,.preview-case h3,
  #instagram-ai-mcp .mcp-landing-card h3,#instagram-ai-mcp .mcp-landing-connect h3 {
    font-size:16px!important;
    line-height:1.65!important;
  }
  .preview-story p,.preview-story .omni-copy p,.omni-card .omni-copy p,.preview-case li,
  #instagram-ai-mcp .mcp-landing-card p,#instagram-ai-mcp .mcp-landing-connect p {
    font-size:12px!important;
    line-height:1.85!important;
  }
  #instagram-ai-mcp .section-head h2 {font-size:clamp(25px,6vw,30px)!important}
}
@media(prefers-reduced-motion:reduce) {
  .magic-rainbow-text {animation:none;background-position:50% 50%}
}

#all-features .feature-icon svg{display:block;width:22px;height:22px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
#all-features .feature-card h3{font-size:17px;line-height:1.7;margin:16px 0 9px}
#all-features .feature-card p{font-size:12.4px;line-height:1.95}
#all-features .feature-card .chips{margin-top:13px}
#messenger-inbox .omni-copy h3{font-size:19px;line-height:1.6}
#messenger-inbox .omni-copy>p{font-size:13px;line-height:1.95}
#messenger-inbox .omni-inbox-platforms{display:flex;flex-wrap:wrap;gap:6px;margin:4px 0 10px}
#messenger-inbox .omni-inbox-platforms span{display:inline-flex;align-items:center;gap:5px;padding:5px 8px;border:1px solid var(--line);border-radius:999px;background:color-mix(in srgb,var(--surface-3) 65%,transparent);font-size:9px;color:var(--muted)}
#messenger-inbox .omni-inbox-platforms svg{width:13px;height:13px;display:block}
#messenger-inbox .omni-inbox-rows{display:grid;gap:7px}
#messenger-inbox .omni-inbox-row{display:grid;grid-template-columns:27px minmax(0,1fr) auto;gap:8px;align-items:center;padding:8px;border:1px solid var(--line);border-radius:12px;background:color-mix(in srgb,var(--surface-2) 80%,transparent)}
#messenger-inbox .omni-inbox-mark{width:25px;height:25px;display:grid;place-items:center;border-radius:8px;font-size:8px;font-weight:900;background:rgba(139,92,246,.12);color:var(--violet-2)}
#messenger-inbox .omni-inbox-mark.tg{background:rgba(42,171,238,.12);color:#2aabee}
#messenger-inbox .omni-inbox-mark.bale{background:rgba(33,182,111,.12);color:var(--green)}
#messenger-inbox .omni-inbox-mark.rubika{background:rgba(240,107,180,.12);color:var(--pink)}
#messenger-inbox .omni-inbox-row b,#messenger-inbox .omni-inbox-row small{display:block;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
#messenger-inbox .omni-inbox-row b{font-size:10px}
#messenger-inbox .omni-inbox-row small{margin-top:2px;font-size:9px;color:var(--muted)}
#messenger-inbox .omni-inbox-row time{font-size:8.5px;color:var(--muted)}
@media(max-width:760px){#all-features .feature-card{padding:20px;min-height:245px}#all-features .feature-card h3{font-size:16px}#all-features .feature-card p{font-size:12px}#messenger-inbox .omni-copy>p{font-size:12px}}

</style>
</head>
<body>
<div aria-hidden="true" class="page-noise"></div>
<div aria-hidden="true" class="ambient ambient-a"></div>
<div aria-hidden="true" class="ambient ambient-b"></div>
<?php $landingHeaderStandalone = false; ob_start(); require __DIR__ . '/shared/landing-header.php';
// Keep language navigation inside this preview.
echo (string)ob_get_clean(); ?>
<main id="top"><section class="hero section-pad" id="hero">
<div class="shell hero-grid">
<div class="hero-copy reveal">
<div class="eyebrow"><span class="live-dot"></span> Magic Super Manager</div>
<h1 aria-label="از انتشار محتوا تا پیگیری مشتری در اینستاگرام و پیام‌رسان‌ها" class="hero-typing" id="heroHeadline" dir="<?= $landingDirection ?>"<?= $magicPerfLabStable ? ' data-perf-stable="1"' : '' ?>>
<span class="hero-line"><em class="hero-key hero-key-charcoal" data-type-text="از انتشار محتوا">از انتشار محتوا</em></span>
<span class="hero-line"><em class="hero-key hero-key-charcoal" data-type-text="تا پیگیری مشتری">تا پیگیری مشتری</em></span>
<span class="hero-line"><em class="hero-key hero-magic-word" data-type-text="اینستاگرام و پیام‌رسان‌ها">اینستاگرام و پیام‌رسان‌ها</em></span>
</h1>
<?php
$magicHeroLead = [
    'fa' => ['در شبکه‌های', 'اینستاگرام', 'تلگرام', 'بله', 'روبیکا', ' منتشر کن. پیام‌ها را از پنل جواب بده و اطلاعات سفارش یا رزرو را از دل گفتگو به گوگل‌شیت برسان.'],
    'en' => ['Publish on', 'Instagram', 'Telegram', 'Bale', 'Rubika', '. Reply to messages from the panel, and send order or booking details from conversations to Google Sheets.'],
    'ar' => ['انشر عبر', 'إنستغرام', 'تيليغرام', 'بله', 'روبيكا', '. أجب عن الرسائل من اللوحة وأرسل بيانات الطلب أو الحجز من المحادثات إلى جداول Google.'],
][$landingLanguage];
?>
<p class="hero-lead hero-lead-networks">
<span class="hero-lead-prefix"><?= htmlspecialchars($magicHeroLead[0], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></span>
<span class="hero-network hero-network-instagram"><?= htmlspecialchars($magicHeroLead[1], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></span><span class="hero-network-sep" aria-hidden="true"> · </span><span class="hero-network hero-network-telegram"><?= htmlspecialchars($magicHeroLead[2], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></span><span class="hero-network-sep" aria-hidden="true"> · </span><span class="hero-network hero-network-bale"><?= htmlspecialchars($magicHeroLead[3], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></span><span class="hero-network-sep" aria-hidden="true"> · </span><span class="hero-network hero-network-rubika"><?= htmlspecialchars($magicHeroLead[4], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></span><span class="hero-lead-tail"><?= htmlspecialchars($magicHeroLead[5], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></span>
</p>
<div class="hero-cta-row">
<a class="btn btn-primary" href="https://go.magics.site/login<?= $landingLanguage==='fa'?'':('?lang='.$landingLanguage) ?>"><span>رایگان شروع کن</span><b>←</b></a>
<a class="btn btn-ghost" href="#demo"><span class="play-dot">▶</span> دموی زنده را ببین</a>
</div>
<div class="trust-row">
<div><b>محتوا بساز</b><span>تصویر، ویدیو و کپشن</span></div>
<div><b>منتشر کن</b><span>فوری یا زمان‌بندی‌شده</span></div>
<div><b>خودکار کن</b><span>گفتگو و مدیریت مخاطب</span></div>
</div>
<div class="hero-desktop-trust quick-trust glow-card" aria-label="اعتماد و مزیت‌های اصلی">
<div><span>✓</span><p><b>اتصال رسمی به Instagram / Meta</b><small>اتصال از مسیر رسمی متا</small><a class="meta-trust-link" href="/meta-verification.php?lang=<?= rawurlencode($landingLanguage) ?>">
<svg class="meta-trust-link-icon" viewBox="0 0 16 16" aria-hidden="true" focusable="false"><path d="M8 1.6 13.4 3.8v3.7c0 3.2-2.1 5.5-5.4 6.8-3.3-1.3-5.4-3.6-5.4-6.8V3.8L8 1.6Z"/><path d="m5.2 7.8 1.8 1.8 3.8-3.9"/></svg>
<span><?= $landingLanguage==='en'?'View official META approval':($landingLanguage==='ar'?'عرض موافقة META الرسمية':'مشاهده تأییدیه رسمی META') ?></span>
<span class="meta-trust-link-arrow" aria-hidden="true">↗</span>
</a></p></div>
<div><span>✓</span><p><b>بدون نیاز به رمز اینستاگرام</b><small>رمز پیج را در سایت ما وارد نمی‌کنی</small></p></div>
<div><span>✓</span><p><b>مدیریت چند پیج از یک محیط</b><small>حساب‌ها را یکجا مدیریت کن</small></p></div>
<div><span>✓</span><p><b>اتوماسیون + هوش مصنوعی + انتشار</b><small>همه در یک سیستم یکپارچه</small></p></div>
</div>
</div>
<div aria-label="دموی تعاملی دایرکت هوشمند" class="hero-demo-wrap reveal delay-1">
<div class="hero-demo-card glow-card hero-demo-v2">
<div class="demo-topline">
<div class="demo-brand-mini"><span>✦</span><div><b>دموی زنده دایرکت هوشمند</b><small>نمونه واقعی از اجرای یک جریان کامل</small></div></div>
<span class="status-pill"><i></i> در حال اجرا</span>
</div>
<div class="phone-stage phone-stage-v2">
<div class="phone-shell phone-shell-v2">
<div class="phone-status"><span>۹:۴۱</span><span>● ● ●</span></div>
<div class="ig-header"><span class="avatar grad-avatar">M</span><div><b>مجیک سوپر منیجر</b><small id="heroScenarioLabel">سناریوی سفارش محصول</small></div><span>•••</span></div>
<div class="mini-entry-card" id="heroEntryCard">
<span class="entry-icon">⌁</span><div><b id="heroEntryTitle">ورود از کامنت</b><small id="heroEntryText">کاربر زیر پست می‌نویسد: «قیمت»</small></div><i>⚡</i>
</div>
<div aria-live="polite" class="hero-chat" id="heroChat"></div>
<div class="hero-chat-footer"><span>＋</span><div>پیام...</div><span>◉</span></div>
</div>
<div class="float-orb orb-1">⚡<small>شروع خودکار</small></div>
<div class="float-orb orb-2">✦<small>هوش مصنوعی</small></div>
<div class="float-orb orb-3">↗<small>انتشار</small></div>
</div>
<div aria-label="انتخاب نمونه جریان" class="hero-scenario-switch" id="heroScenarioSwitch">
<button class="active" data-hero-scenario="order" type="button"><span>🛍</span><b>سفارش محصول</b><small>کامنت تا ثبت سفارش</small></button>
<button data-hero-scenario="consult" type="button"><span>🎙</span><b>مشاوره هوشمند</b><small>ویس، تصویر و پاسخ هوش مصنوعی</small></button>
<button data-hero-scenario="support" type="button"><span>🛟</span><b>پشتیبانی</b><small>تشخیص مشکل تا پاسخ نهایی</small></button>
</div>
<div class="demo-progress"><span id="demoProgress"></span></div>
</div>
<div aria-label="اقدام‌های دموی موبایل" class="hero-mobile-cta-row">
<a class="btn btn-ghost" href="#demo"><span class="play-dot">▶</span> دموی زنده را ببین</a>
<a class="btn btn-primary" href="https://go.magics.site/login<?= $landingLanguage==='fa'?'':('?lang='.$landingLanguage) ?>"><span>رایگان شروع کن</span><b>←</b></a>
</div>
</div>
</div>
<div class="service-orbit" role="group" aria-label="<?= ['fa'=>'اتصال‌های مجیک','en'=>'Magic integrations','ar'=>'تكاملات مجيك'][$landingLanguage] ?>">
<a class="service-bubble" href="#product-cycle" aria-label="Instagram" title="Instagram"><svg width="32" height="32" viewBox="0 0 32 32" aria-hidden="true"><defs><radialGradient id="hero-ig-gradient" cx="25%" cy="100%" r="115%"><stop stop-color="#ffdc80"/><stop offset=".25" stop-color="#f77737"/><stop offset=".58" stop-color="#e1306c"/><stop offset="1" stop-color="#833ab4"/></radialGradient></defs><rect width="32" height="32" rx="8" fill="url(#hero-ig-gradient)"/><g fill="none" stroke="white" stroke-width="2"><rect x="6.5" y="6.5" width="19" height="19" rx="5.5"/><circle cx="16" cy="16" r="4.5"/></g><circle cx="22" cy="10" r="1.3" fill="white"/></svg></a>
<?php foreach ($landingServices as $id => $service): ?>
<a class="service-bubble" href="#integration-<?= $id ?>" aria-label="<?= $service[$landingLanguage][0] ?>" title="<?= $service[$landingLanguage][0] ?>"><?= $landingServiceIcons[$id] ?></a>
<?php endforeach; ?>
</div>
</section>
<?php
// Send the above-the-fold Hero promptly while the unchanged lower sections render.
// This flush changes transport timing only, not HTML, CSS, navigation or demos.
if (ob_get_level() > 0) { @ob_flush(); }
flush();
?>
<!-- Noncritical below-the-fold premium styles, preserved verbatim and parsed after the first hero. -->
<style id="v34-mobile-studio-premium-single-title">
/* v34: remove the repeated studio intro and make the remaining studio/publisher copy feel like premium cards on phones. */
@media (max-width:760px){
  .studio-publisher-section{padding-top:28px!important;padding-bottom:38px!important;}
  .studio-publisher-section .product-pair-block{gap:14px!important;margin-bottom:16px!important;}
  .studio-publisher-section .product-pair-block>.showcase-copy{
    width:100%;
    max-width:none!important;
    margin:0!important;
    padding:18px 16px!important;
    text-align:right!important;
    border:1px solid color-mix(in srgb,var(--line) 86%,transparent);
    border-radius:22px;
    background:
      radial-gradient(120% 100% at 100% 0%,rgba(139,92,246,.11),transparent 56%),
      radial-gradient(100% 90% at 0% 100%,rgba(34,199,217,.09),transparent 55%),
      color-mix(in srgb,var(--surface) 92%,transparent);
    box-shadow:0 14px 34px rgba(17,17,24,.06),inset 0 1px 0 rgba(255,255,255,.34);
    overflow:hidden;
    position:relative;
  }
  [data-theme="dark"] .studio-publisher-section .product-pair-block>.showcase-copy{
    background:
      radial-gradient(120% 100% at 100% 0%,rgba(139,92,246,.13),transparent 58%),
      radial-gradient(100% 90% at 0% 100%,rgba(34,199,217,.08),transparent 56%),
      color-mix(in srgb,var(--surface) 94%,transparent);
    box-shadow:0 16px 38px rgba(0,0,0,.22),inset 0 1px 0 rgba(255,255,255,.04);
  }
  .studio-publisher-section .product-pair-block>.showcase-copy .eyebrow{margin-bottom:10px!important;}
  .studio-publisher-section .product-pair-block>.showcase-copy h2{
    font-size:clamp(18px,5.2vw,23px)!important;
    line-height:1.35!important;
    letter-spacing:-.035em!important;
    margin:0 0 10px!important;
    white-space:nowrap!important;
  }
  .studio-publisher-section .product-pair-block>.showcase-copy p{
    margin:0!important;
    font-size:11.5px!important;
    line-height:1.95!important;
  }
  .studio-publisher-section .studio-points{margin-top:14px!important;gap:6px!important;}
  .studio-publisher-section .studio-points span{font-size:10.5px!important;padding:7px 9px!important;}
  .studio-publisher-section .metric-row{margin-top:14px!important;gap:6px!important;}
  .studio-publisher-section .metric-row div{padding:10px 8px!important;border-radius:12px!important;}
}
@media (max-width:390px){
  .studio-publisher-section .product-pair-block>.showcase-copy{padding:16px 13px!important;}
  .studio-publisher-section .product-pair-block>.showcase-copy h2{font-size:17px!important;}
}
</style>
<style id="v39-usecase-icons-title">
/* v39: premium use-case icons moved beside titles. */
.use-case{
  min-height:126px!important;
  padding:17px 18px!important;
  display:flex!important;
  flex-direction:column;
  align-items:stretch!important;
  justify-content:flex-start;
  gap:11px!important;
}
.use-case-head{display:flex;align-items:center;gap:11px;min-width:0;position:relative;z-index:1}
.use-case-head b{font-size:13.4px!important;line-height:1.45;font-weight:850;margin:0;color:var(--text)}
.use-case-icon{
  width:40px;height:40px;flex:0 0 40px;border-radius:13px;display:grid;place-items:center;
  border:1px solid color-mix(in srgb,currentColor 18%,var(--line));
  box-shadow:inset 0 1px 0 rgba(255,255,255,.55),0 8px 22px rgba(18,18,24,.05);
  background:color-mix(in srgb,currentColor 8%,var(--surface-2));
}
[data-theme="dark"] .use-case-icon{box-shadow:inset 0 1px 0 rgba(255,255,255,.04),0 10px 24px rgba(0,0,0,.16)}
.use-case-icon svg{width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
.use-case small{position:relative;z-index:1;display:block;font-size:11.5px!important;line-height:1.75!important;color:var(--muted);padding-inline-start:51px}
.use-case .icon-violet{color:#8b5cf6}.use-case .icon-cyan{color:#17b7c9}.use-case .icon-pink{color:#e85ca9}.use-case .icon-blue{color:#6488ff}.use-case .icon-orange{color:#f37a45}.use-case .icon-green{color:#20ad72}
.use-case:hover .use-case-icon{transform:translateY(-2px) scale(1.035);transition:transform .2s ease}
@media (max-width:760px){
  .use-case{min-height:112px!important;padding:14px!important;gap:9px!important}
  .use-case-head{gap:9px}.use-case-icon{width:36px;height:36px;flex-basis:36px;border-radius:12px}.use-case-icon svg{width:18px;height:18px}
  .use-case-head b{font-size:12.6px!important}.use-case small{font-size:11px!important;padding-inline-start:45px;line-height:1.7!important}
}
@media (max-width:430px){
  .use-case-grid{grid-template-columns:1fr!important}
  .use-case{min-height:104px!important}
}
</style>
<style id="v40-mobile-usecases-grid-fix">
/* v40: mobile use-cases are always a clean 2-column grid; titles stay on one line. */
@media (max-width:760px){
  #use-cases .use-case-grid{
    display:grid!important;
    grid-template-columns:repeat(2,minmax(0,1fr))!important;
    gap:10px!important;
  }
  #use-cases .use-case{
    min-width:0!important;
    min-height:112px!important;
    padding:12px 10px!important;
    gap:8px!important;
    border-radius:18px!important;
    overflow:hidden!important;
  }
  #use-cases .use-case-head{
    min-width:0!important;
    gap:7px!important;
    align-items:center!important;
  }
  #use-cases .use-case-icon{
    width:30px!important;
    height:30px!important;
    flex:0 0 30px!important;
    border-radius:10px!important;
  }
  #use-cases .use-case-icon svg{width:16px!important;height:16px!important}
  #use-cases .use-case-head b{
    min-width:0!important;
    white-space:nowrap!important;
    overflow:visible!important;
    text-overflow:clip!important;
    font-size:clamp(9.6px,2.75vw,11.8px)!important;
    line-height:1.25!important;
    letter-spacing:-.12px!important;
  }
  #use-cases .use-case small{
    padding-inline-start:0!important;
    font-size:10.2px!important;
    line-height:1.55!important;
    display:-webkit-box!important;
    -webkit-line-clamp:2;
    -webkit-box-orient:vertical;
    overflow:hidden;
  }
}
@media (max-width:390px){
  #use-cases .use-case-grid{gap:8px!important}
  #use-cases .use-case{padding:11px 8px!important;min-height:106px!important}
  #use-cases .use-case-head{gap:6px!important}
  #use-cases .use-case-icon{width:28px!important;height:28px!important;flex-basis:28px!important}
  #use-cases .use-case-head b{font-size:clamp(9px,2.72vw,10.6px)!important;letter-spacing:-.18px!important}
  #use-cases .use-case small{font-size:9.6px!important;line-height:1.5!important}
}
</style>
<style id="v41-mobile-usecase-heading-gradient">
/* v41: compact mobile spacing + two-line use-case heading with hero-style Magic gradient. */
.usecase-heading .usecase-magic{
  background:linear-gradient(90deg,var(--violet-2),var(--pink) 36%,var(--cyan) 70%,var(--orange));
  -webkit-background-clip:text;background-clip:text;color:transparent;
  background-size:180% 100%;
  animation:usecaseMagicShift 5s ease-in-out infinite alternate;
}
@keyframes usecaseMagicShift{0%{background-position:0% 50%}100%{background-position:100% 50%}}
@media (max-width:760px){
  #use-cases{padding-top:16px!important;}
  #use-cases .section-head{margin-bottom:18px!important;}
  #use-cases .section-head .eyebrow{margin-bottom:9px!important;}
  #use-cases .usecase-heading{
    display:flex!important;flex-direction:column!important;align-items:center!important;
    gap:2px!important;margin-top:8px!important;margin-bottom:14px!important;
    font-size:clamp(28px,7.6vw,34px)!important;line-height:1.25!important;letter-spacing:-.035em!important;
  }
  #use-cases .usecase-heading .usecase-magic,
  #use-cases .usecase-heading .usecase-heading-rest{display:block!important;white-space:nowrap!important;}
  #use-cases .section-head>p{margin-top:0!important;}
}
@media (max-width:390px){
  #use-cases{padding-top:12px!important;}
  #use-cases .usecase-heading{font-size:clamp(25px,7.2vw,29px)!important;}
}
</style>
<style id="v42-usecase-interactive-premium">
/* v42: interactive, accessible use-case cards; preserve the existing Magic visual language. */
#use-cases{isolation:isolate}
#use-cases .section-head{max-width:900px;margin-inline:auto;text-align:center}
#use-cases .section-head p{max-width:820px;margin-inline:auto;line-height:2}
#use-cases .use-case-grid{
  display:grid!important;grid-template-columns:repeat(3,minmax(0,1fr))!important;
  gap:12px!important;align-items:stretch!important
}
#use-cases .use-case{
  appearance:none!important;-webkit-appearance:none!important;
  width:100%!important;min-width:0!important;min-height:124px!important;
  padding:16px 15px!important;margin:0!important;
  display:grid!important;grid-template-columns:42px minmax(0,1fr) 26px!important;
  grid-template-rows:1fr!important;align-items:center!important;gap:10px!important;
  border:1px solid var(--line)!important;border-radius:20px!important;
  text-align:start!important;font:inherit!important;color:var(--text)!important;
  background:
    radial-gradient(100% 125% at 0 0,rgba(139,92,246,.13),transparent 64%),
    radial-gradient(85% 110% at 100% 100%,rgba(34,199,217,.08),transparent 62%),
    var(--glow-card)!important;
  box-shadow:0 16px 42px rgba(18,18,24,.065),inset 0 1px 0 rgba(255,255,255,.48)!important;
  cursor:pointer;position:relative;overflow:hidden;
  transition:transform .22s ease,border-color .22s ease,box-shadow .22s ease,background .22s ease!important
}
[data-theme="dark"] #use-cases .use-case{
  box-shadow:0 18px 44px rgba(0,0,0,.22),inset 0 1px 0 rgba(255,255,255,.035)!important
}
#use-cases .use-case-icon{
  width:42px!important;height:42px!important;min-width:42px!important;flex:0 0 42px!important;
  display:grid!important;place-items:center!important;border-radius:14px!important;
  border:1px solid color-mix(in srgb,currentColor 18%,var(--line))!important;
  background:color-mix(in srgb,currentColor 8%,var(--surface-2))!important;
  box-shadow:inset 0 1px 0 rgba(255,255,255,.45),0 8px 22px rgba(18,18,24,.045)!important;
  transition:transform .22s ease!important
}
#use-cases .use-case-icon svg{width:21px!important;height:21px!important;fill:none!important;stroke:currentColor!important;stroke-width:1.8!important;stroke-linecap:round!important;stroke-linejoin:round!important}
#use-cases .use-case .icon-violet{color:#8b5cf6!important}
#use-cases .use-case .icon-cyan{color:#17b7c9!important}
#use-cases .use-case .icon-pink{color:#e85ca9!important}
#use-cases .use-case .icon-orange{color:#ed8848!important}
#use-cases .use-case .icon-green{color:#20ad72!important}
#use-cases .use-case-copy{display:grid!important;gap:6px!important;min-width:0!important;align-content:center!important}
#use-cases .use-case-copy b{display:block!important;margin:0!important;color:var(--text)!important;font-size:13px!important;font-weight:850!important;line-height:1.55!important;white-space:normal!important;overflow-wrap:anywhere!important}
#use-cases .use-case-copy small{display:block!important;padding:0!important;margin:0!important;color:var(--muted)!important;font-size:10.8px!important;line-height:1.65!important;white-space:normal!important;overflow-wrap:anywhere!important}
#use-cases .use-case-meta{display:flex!important;flex-direction:column!important;align-items:center!important;justify-content:space-between!important;align-self:stretch!important;min-width:0!important}
#use-cases .use-case-number{font-family:ui-sans-serif,system-ui,sans-serif!important;font-size:9px!important;font-weight:800!important;letter-spacing:.08em!important;line-height:1!important;color:var(--muted)!important;opacity:.72!important;direction:ltr!important}
#use-cases .use-case-arrow{width:25px!important;height:25px!important;display:grid!important;place-items:center!important;border:1px solid var(--line)!important;border-radius:50%!important;background:color-mix(in srgb,var(--surface) 75%,transparent)!important;color:var(--muted)!important;font-size:20px!important;font-weight:400!important;line-height:1!important;transition:transform .22s ease,color .22s ease,border-color .22s ease,background .22s ease!important}
#use-cases .use-case:hover{transform:translateY(-3px)!important;border-color:color-mix(in srgb,var(--violet) 36%,var(--line))!important}
#use-cases .use-case:hover .use-case-icon{transform:translateY(-2px)!important}
#use-cases .use-case[aria-pressed="true"]{
  border-color:color-mix(in srgb,var(--violet) 54%,var(--line))!important;
  background:
    radial-gradient(100% 130% at 0 0,rgba(139,92,246,.20),transparent 64%),
    radial-gradient(85% 110% at 100% 100%,rgba(34,199,217,.12),transparent 62%),
    var(--glow-card)!important;
  box-shadow:0 18px 48px rgba(92,58,160,.13),inset 0 0 0 1px rgba(139,92,246,.10)!important
}
#use-cases .use-case[aria-pressed="true"] .use-case-icon{transform:scale(1.04)!important}
#use-cases .use-case[aria-pressed="true"] .use-case-arrow{color:#fff!important;border-color:transparent!important;background:linear-gradient(135deg,var(--violet),var(--cyan))!important;transform:rotate(45deg)!important}
#use-cases .use-case:focus-visible{outline:3px solid color-mix(in srgb,var(--violet) 58%,transparent)!important;outline-offset:3px!important}
#use-cases .use-case-details{
  margin-top:14px!important;padding:clamp(18px,2.6vw,28px)!important;
  border-radius:26px!important;position:relative!important;overflow:hidden!important;
  background:
    radial-gradient(80% 130% at 0 0,rgba(139,92,246,.11),transparent 65%),
    radial-gradient(75% 120% at 100% 100%,rgba(34,199,217,.08),transparent 65%),
    var(--glow-card)!important
}
#use-cases .use-case-detail{display:grid;grid-template-columns:minmax(0,.82fr) minmax(0,1.18fr);gap:clamp(18px,3vw,34px);align-items:center;animation:useCasePanelIn .28s ease both}
#use-cases .use-case-detail[hidden]{display:none!important}
#use-cases .use-case-detail-kicker{display:inline-flex;align-items:center;gap:7px;padding:6px 10px;border:1px solid rgba(139,92,246,.22);border-radius:999px;background:rgba(139,92,246,.08);color:var(--violet-2);font-size:10px;font-weight:850}
#use-cases .use-case-detail-intro h3{margin:13px 0 8px!important;font-size:clamp(19px,2.1vw,25px)!important;line-height:1.5!important;font-weight:900!important;letter-spacing:-.025em!important;color:var(--text)!important}
#use-cases .use-case-detail-intro>p{margin:0!important;color:var(--muted)!important;font-size:12px!important;line-height:2!important}
#use-cases .use-case-detail-content{display:grid;gap:10px;min-width:0}
#use-cases .use-case-detail-block{display:grid;grid-template-columns:34px minmax(0,1fr);gap:11px;align-items:start;padding:13px 14px;border:1px solid var(--line);border-radius:16px;background:color-mix(in srgb,var(--surface) 78%,transparent)}
#use-cases .use-case-detail-block.is-outcome{border-color:color-mix(in srgb,var(--green) 24%,var(--line));background:linear-gradient(115deg,rgba(33,182,111,.075),rgba(139,92,246,.055)),color-mix(in srgb,var(--surface) 78%,transparent)}
#use-cases .use-case-detail-symbol{width:32px;height:32px;display:grid;place-items:center;border-radius:11px;background:rgba(139,92,246,.10);color:var(--violet-2);font-size:16px;font-weight:900}
#use-cases .use-case-detail-block.is-outcome .use-case-detail-symbol{background:rgba(33,182,111,.12);color:var(--green)}
#use-cases .use-case-detail-block small{display:block;margin:0 0 4px;color:var(--muted);font-size:10px;font-weight:850;line-height:1.5}
#use-cases .use-case-detail-block p{margin:0;color:var(--text);font-size:11.4px;line-height:1.9}
@keyframes useCasePanelIn{from{opacity:0;transform:translateY(6px)}to{opacity:1;transform:translateY(0)}}
@media (max-width:980px){
  #use-cases .use-case-grid{grid-template-columns:repeat(2,minmax(0,1fr))!important}
  #use-cases .use-case-detail{grid-template-columns:1fr;gap:16px}
}
@media (max-width:760px){
  #use-cases .use-case-grid{grid-template-columns:repeat(2,minmax(0,1fr))!important;gap:9px!important}
  #use-cases .use-case{min-height:108px!important;padding:12px 10px!important;grid-template-columns:32px minmax(0,1fr) 20px!important;gap:8px!important;border-radius:17px!important}
  #use-cases .use-case-icon{width:32px!important;height:32px!important;min-width:32px!important;flex-basis:32px!important;border-radius:11px!important}
  #use-cases .use-case-icon svg{width:17px!important;height:17px!important}
  #use-cases .use-case-copy{gap:4px!important}
  #use-cases .use-case-copy b{font-size:10.9px!important;line-height:1.5!important}
  #use-cases .use-case-copy small{font-size:9.6px!important;line-height:1.5!important}
  #use-cases .use-case-arrow{width:21px!important;height:21px!important;font-size:17px!important}
  #use-cases .use-case-details{margin-top:10px!important;padding:15px!important;border-radius:21px!important}
  #use-cases .use-case-detail-intro h3{font-size:19px!important;margin-top:10px!important}
  #use-cases .use-case-detail-intro>p{font-size:11.2px!important}
  #use-cases .use-case-detail-block{padding:11px!important;grid-template-columns:29px minmax(0,1fr);gap:9px}
  #use-cases .use-case-detail-symbol{width:28px;height:28px;border-radius:9px}
  #use-cases .use-case-detail-block p{font-size:10.8px;line-height:1.85}
}
@media (max-width:390px){
  #use-cases .use-case-grid{grid-template-columns:1fr!important}
  #use-cases .use-case{min-height:92px!important;grid-template-columns:36px minmax(0,1fr) 22px!important;padding:12px 13px!important}
  #use-cases .use-case-icon{width:36px!important;height:36px!important;min-width:36px!important;flex-basis:36px!important}
  #use-cases .use-case-copy b{font-size:11.6px!important}
  #use-cases .use-case-copy small{font-size:10px!important}
}
@media (prefers-reduced-motion:reduce){
  #use-cases .use-case,#use-cases .use-case-arrow,#use-cases .use-case-icon{transition:none!important}
  #use-cases .use-case-detail{animation:none!important}
}
</style>
<style id="v43-usecase-hero-mobile-fix">
/* Restore the legacy card-text dimensions: old .use-case > span sized every span as an icon. */
#use-cases .use-case > span.use-case-copy,
#use-cases .use-case > span.use-case-meta{
  width:auto!important;height:auto!important;grid-row:auto!important;
  border-radius:0!important;background:transparent!important;
  place-items:initial!important;font-size:inherit!important;min-width:0!important
}
#use-cases .use-case > span.use-case-copy{
  width:100%!important;min-height:0!important;max-width:100%!important;
  display:grid!important;justify-items:stretch!important;align-items:stretch!important;
  align-content:center!important
}
#use-cases .use-case .use-case-copy b,
#use-cases .use-case .use-case-copy small{
  white-space:normal!important;word-break:normal!important;overflow-wrap:normal!important
}
#use-cases .use-case > span.use-case-meta{
  display:flex!important;flex-direction:column!important;align-items:center!important;
  justify-content:space-between!important
}
/* Light-touch multicolor platform emphasis, scoped exclusively to the hero subheading. */
#hero .hero-lead-networks .hero-network{
  display:inline-block;font-weight:850;white-space:nowrap;vertical-align:baseline;
  background-clip:text!important;-webkit-background-clip:text!important;
  color:transparent!important;-webkit-text-fill-color:transparent!important;
  text-decoration:none!important
}
#hero .hero-network-instagram{background-image:linear-gradient(90deg,#8b4bd7,#d13c93,#dc7136)!important}
#hero .hero-network-telegram{background-image:linear-gradient(90deg,#089fb9,#4771df)!important}
#hero .hero-network-bale{background-image:linear-gradient(90deg,#148869,#14aca1)!important}
#hero .hero-network-rubika{background-image:linear-gradient(90deg,#8456dd,#bf4bab,#e46e4e)!important}
#hero .hero-lead-networks .hero-network-sep{display:inline;color:var(--muted)!important;opacity:.6}
[data-theme="dark"] #hero .hero-network-instagram{background-image:linear-gradient(90deg,#ad84ff,#fb72be,#ffac6e)!important}
[data-theme="dark"] #hero .hero-network-telegram{background-image:linear-gradient(90deg,#62dce7,#95acff)!important}
[data-theme="dark"] #hero .hero-network-bale{background-image:linear-gradient(90deg,#5ce5a9,#74dad2)!important}
[data-theme="dark"] #hero .hero-network-rubika{background-image:linear-gradient(90deg,#b49aff,#fb8ed3,#ffb78e)!important}
@media(max-width:760px){
  #use-cases .use-case{min-height:126px!important}
  #use-cases .use-case .use-case-copy small{
    display:-webkit-box!important;-webkit-box-orient:vertical!important;
    -webkit-line-clamp:3!important;overflow:hidden!important
  }
  html[lang="fa"] #hero #heroHeadline .hero-line:last-child,
  html[lang="ar"] #hero #heroHeadline .hero-line:last-child{
    white-space:nowrap!important;overflow-wrap:normal!important;word-break:keep-all!important
  }
  html[lang="fa"] #hero #heroHeadline .hero-magic-word,
  html[lang="ar"] #hero #heroHeadline .hero-magic-word{
    display:inline-block!important;white-space:nowrap!important;overflow-wrap:normal!important;
    word-break:keep-all!important;font-size:clamp(21px,6.6vw,29px)!important;
    max-width:100%!important;line-height:1.38!important
  }
  /* Persian only: ~11% larger mobile accent, proportional to viewport.
     Preserve one line without affecting Arabic, desktop, or typewriter timing. */
  html[lang="fa"] #hero #heroHeadline .hero-magic-word{
    font-size:min(32px,7.35vw)!important;
    white-space:nowrap!important;word-break:keep-all!important;overflow-wrap:normal!important;
  }
}
@media(max-width:350px){
  #use-cases .use-case-grid{grid-template-columns:1fr!important}
  #use-cases .use-case{
    grid-template-columns:36px minmax(0,1fr) 24px!important;
    min-height:100px!important;padding:12px 14px!important;gap:10px!important
  }
}
@media(prefers-reduced-motion:reduce){
  #use-cases .use-case{transition:none!important}
}
</style>
<style id="v44-usecase-flow-and-pair-layout">
/* The selected card's explanation is the destination on both desktop and mobile. */
#useCaseDetails{scroll-margin-top:96px!important}
@media(max-width:760px){#useCaseDetails{scroll-margin-top:84px!important}}
/* Keep the publishing and unified-inbox examples content-led, not bottom-aligned. */
.channel-publishing-pair{align-items:start!important}
.channel-publishing-pair>.preview-story{
  align-self:start!important;align-content:start!important;
  grid-auto-rows:max-content;gap:clamp(14px,1.8vw,22px)!important
}
.channel-publishing-pair>.preview-story>.omni-demo{align-self:start!important;margin-top:0!important}
@media(max-width:700px){
  .channel-publishing-pair{grid-template-columns:minmax(0,1fr)!important;align-items:start!important}
}
</style>
<style id="mcpLandingStyles">
/* Magic MCP / scoped 2026-10-28 premium cards: RTL-first, responsive, both themes. */
#instagram-ai-mcp{position:relative;isolation:isolate}
#instagram-ai-mcp:before{content:"";position:absolute;inset:0;z-index:-1;pointer-events:none;background:radial-gradient(42% 52% at 12% 20%,rgba(139,92,246,.09),transparent 80%),radial-gradient(45% 57% at 90% 70%,rgba(34,199,217,.07),transparent 82%)}
#instagram-ai-mcp .section-head{max-width:880px;margin-bottom:clamp(22px,3vw,40px)}
#instagram-ai-mcp .section-head .eyebrow{display:inline-flex;align-items:center;gap:9px;border:1px solid rgba(139,92,246,.22);border-radius:999px;padding:6px 14px;background:rgba(139,92,246,.07);color:var(--violet-2)}
#instagram-ai-mcp .section-head h2{font-size:clamp(27px,3.5vw,46px);line-height:1.45;margin:14px 0;text-wrap:balance}
#instagram-ai-mcp .section-head p{max-width:790px;margin-inline:auto;line-height:2.05}
#instagram-ai-mcp .mcp-landing-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:16px;direction:inherit;align-items:stretch}
#instagram-ai-mcp .mcp-landing-card{--mcp-rgb:139,92,246;position:relative;min-width:0;min-height:245px;padding:23px;border-radius:24px;display:flex;flex-direction:column;gap:12px;overflow:hidden;border:1px solid rgba(var(--mcp-rgb),.24);background:radial-gradient(125% 110% at 100% 0%,rgba(var(--mcp-rgb),.14),transparent 66%),linear-gradient(145deg,var(--surface),var(--surface-2));box-shadow:0 16px 40px rgba(0,0,0,.12),inset 0 1px 0 rgba(255,255,255,.06);transition:transform .2s,border-color .2s,box-shadow .2s}
#instagram-ai-mcp .mcp-landing-card.is-cyan{--mcp-rgb:34,199,217}
#instagram-ai-mcp .mcp-landing-card.is-rose{--mcp-rgb:240,107,180}
#instagram-ai-mcp .mcp-landing-card:before{content:"";position:absolute;inset-block-start:0;inset-inline-start:23px;width:80px;height:3px;background:linear-gradient(90deg,rgba(var(--mcp-rgb),.9),transparent);border-radius:0 0 6px 6px}
#instagram-ai-mcp .mcp-landing-card-head{display:flex;align-items:center;justify-content:space-between;gap:12px}
#instagram-ai-mcp .mcp-landing-icon{flex:0 0 47px;width:47px;height:47px;border-radius:15px;display:grid;place-items:center;color:rgb(var(--mcp-rgb));background:rgba(var(--mcp-rgb),.10);border:1px solid rgba(var(--mcp-rgb),.22)}
#instagram-ai-mcp .mcp-landing-icon svg{display:block;width:23px;height:23px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
#instagram-ai-mcp .mcp-landing-number{direction:ltr;font:800 11px/1.5 'Vazirmatn',sans-serif;letter-spacing:.13em;color:var(--muted);opacity:.7}
#instagram-ai-mcp .mcp-landing-card h3{font-size:clamp(15px,1.3vw,18px);font-weight:850;line-height:1.7;margin:0;color:var(--text);text-wrap:pretty}
#instagram-ai-mcp .mcp-landing-card p{font-size:12.8px;line-height:2.05;margin:0;color:var(--muted);overflow-wrap:anywhere}
@media(hover:hover){#instagram-ai-mcp .mcp-landing-card:hover{transform:translateY(-4px);border-color:rgba(var(--mcp-rgb),.45);box-shadow:0 22px 48px rgba(0,0,0,.17)}}
#instagram-ai-mcp .mcp-landing-connect{margin-top:18px;display:grid;grid-template-columns:minmax(0,1fr) minmax(235px,.6fr);gap:18px 24px;align-items:center;padding:25px 28px;border-radius:26px;border:1px solid color-mix(in srgb,var(--violet) 26%,var(--line));background:radial-gradient(90% 130% at 100% 0%,rgba(139,92,246,.13),transparent 70%),radial-gradient(90% 120% at 0% 100%,rgba(34,199,217,.09),transparent 75%),var(--surface);box-shadow:0 18px 44px rgba(0,0,0,.11),inset 0 1px 0 rgba(255,255,255,.06)}
#instagram-ai-mcp .mcp-connect-copy{min-width:0}
#instagram-ai-mcp .mcp-connect-heading{display:flex;align-items:center;gap:11px;margin-bottom:10px}
#instagram-ai-mcp .mcp-connect-icon{flex:0 0 43px;width:43px;height:43px;display:grid;place-items:center;border-radius:13px;background:rgba(139,92,246,.13);color:var(--violet-2);border:1px solid rgba(139,92,246,.22)}
#instagram-ai-mcp .mcp-connect-icon svg{width:22px;height:22px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
#instagram-ai-mcp .mcp-landing-connect h3{margin:0;font-size:clamp(16px,1.55vw,20px);line-height:1.7}
#instagram-ai-mcp .mcp-landing-connect p{margin:0;color:var(--muted);font-size:12.8px;line-height:2.1}
#instagram-ai-mcp .mcp-connect-flow{display:flex;align-items:center;justify-content:center;gap:6px;direction:ltr;min-width:0;padding:13px 10px;border:1px solid color-mix(in srgb,var(--violet) 17%,var(--line));border-radius:18px;background:color-mix(in srgb,var(--surface-2) 75%,transparent)}
#instagram-ai-mcp .mcp-connect-flow b{display:grid;place-items:center;text-align:center;min-height:43px;flex:1 1 0;min-width:0;border-radius:11px;background:color-mix(in srgb,var(--surface) 90%,transparent);border:1px solid var(--line);font:800 clamp(9px,.85vw,11px)/1.35 'Vazirmatn',sans-serif;padding:6px;color:var(--text);overflow-wrap:anywhere}
#instagram-ai-mcp .mcp-connect-flow i{flex:0 0 auto;font-style:normal;font-size:17px;color:var(--violet-2)}
#instagram-ai-mcp .mcp-landing-actions{grid-column:1/-1;display:flex;align-items:stretch;flex-wrap:wrap;gap:10px;margin:0;padding-top:18px;border-top:1px solid var(--line)}
#instagram-ai-mcp .mcp-landing-actions .btn{min-height:46px;height:auto;max-width:100%;padding:10px 17px;font-size:12.5px;line-height:1.7;white-space:normal;text-align:center;border-radius:14px}
#instagram-ai-mcp .mcp-landing-actions .btn:first-child{box-shadow:0 12px 30px rgba(139,92,246,.22)}
#instagram-ai-mcp .mcp-landing-actions .btn:focus-visible{outline:2px solid var(--violet);outline-offset:3px}
#instagram-ai-mcp .mcp-landing-actions .mcp-guide-link{
 display:inline-flex;flex:1 1 245px;align-items:center;justify-content:center;gap:9px;
 min-width:0;max-width:100%;min-height:46px;padding:10px 16px;position:relative;isolation:isolate;overflow:hidden;
 border:1px solid rgba(255,255,255,.24);border-radius:14px;
 background:linear-gradient(118deg,#8757ef 0%,#7251e8 54%,#22bfd1 100%);
 color:#fff!important;font:800 12.2px/1.75 'Vazirmatn',sans-serif;text-align:center;text-decoration:none!important;white-space:normal;
 box-shadow:0 11px 28px rgba(112,78,220,.25),inset 0 1px 0 rgba(255,255,255,.3);
 text-shadow:0 1px 2px rgba(38,24,72,.16);
 transition:transform .2s ease,box-shadow .2s ease,filter .2s ease;
}
#instagram-ai-mcp .mcp-landing-actions .mcp-guide-link:before{
 content:"";position:absolute;inset:0;z-index:0;pointer-events:none;
 background:linear-gradient(108deg,transparent 18%,rgba(255,255,255,.19) 48%,transparent 78%);
 transform:translateX(-120%);transition:transform .55s ease;
}
#instagram-ai-mcp .mcp-landing-actions .mcp-guide-link>*{position:relative;z-index:1}
#instagram-ai-mcp .mcp-landing-actions .mcp-guide-arrow{font-size:16px;line-height:1;flex:0 0 auto;opacity:.96}
@media(hover:hover){
 #instagram-ai-mcp .mcp-landing-actions .mcp-guide-link:hover{
  transform:translateY(-2px);filter:saturate(1.08);
  box-shadow:0 15px 34px rgba(112,78,220,.32),inset 0 1px 0 rgba(255,255,255,.38);
 }
 #instagram-ai-mcp .mcp-landing-actions .mcp-guide-link:hover:before{transform:translateX(120%)}
}
#instagram-ai-mcp .mcp-landing-actions .mcp-guide-link:active{transform:translateY(0) scale(.985)}
#instagram-ai-mcp .mcp-landing-actions .mcp-guide-link:focus-visible{outline:2px solid var(--cyan);outline-offset:3px}
@media(max-width:760px){
 #instagram-ai-mcp .mcp-landing-actions .mcp-guide-link{flex:1 1 100%;width:100%;min-height:48px;font-size:12px}
}
@media(prefers-reduced-motion:reduce){
 #instagram-ai-mcp .mcp-landing-actions .mcp-guide-link,#instagram-ai-mcp .mcp-landing-actions .mcp-guide-link:before{transition:none}
}
html[data-theme="light"] #instagram-ai-mcp .mcp-landing-card{background:radial-gradient(120% 110% at 100% 0%,rgba(var(--mcp-rgb),.085),transparent 65%),linear-gradient(145deg,#fff,#faf9fe);border-color:rgba(65,44,94,.13);box-shadow:0 15px 38px rgba(68,51,90,.085)}
html[data-theme="light"] #instagram-ai-mcp .mcp-landing-connect{background:radial-gradient(90% 130% at 100% 0%,rgba(139,92,246,.075),transparent 70%),radial-gradient(90% 120% at 0% 100%,rgba(34,199,217,.07),transparent 75%),#fff;border-color:rgba(88,54,125,.16);box-shadow:0 15px 42px rgba(68,51,90,.09)}
html[data-theme="light"] #instagram-ai-mcp .mcp-connect-flow b{background:#fff}
html[data-theme="light"] #instagram-ai-mcp .mcp-landing-card p,html[data-theme="light"] #instagram-ai-mcp .mcp-landing-connect p{color:#5e5869}
@media(max-width:1000px){#instagram-ai-mcp .mcp-landing-grid{gap:10px}#instagram-ai-mcp .mcp-landing-card{padding:18px;min-height:240px}}
@media(max-width:760px){
 #instagram-ai-mcp .mcp-landing-grid{grid-template-columns:1fr;gap:10px}
 #instagram-ai-mcp .mcp-landing-card{min-height:0;padding:18px;gap:9px;border-radius:19px}
 #instagram-ai-mcp .mcp-landing-card h3{font-size:15.4px}
 #instagram-ai-mcp .mcp-landing-icon{flex-basis:40px;width:40px;height:40px;border-radius:13px}
 #instagram-ai-mcp .mcp-landing-connect{grid-template-columns:minmax(0,1fr);gap:13px;padding:18px;border-radius:20px}
 #instagram-ai-mcp .mcp-landing-actions{flex-direction:column;gap:8px;padding-top:14px}
 #instagram-ai-mcp .mcp-landing-actions .btn{width:100%;min-height:46px}
}
@media(prefers-reduced-motion:reduce){#instagram-ai-mcp .mcp-landing-card{transition:none!important}}
#instagram-ai-mcp .mcp-guide-link{display:inline-flex;align-items:center;justify-content:center;text-align:center;min-height:44px;max-width:100%;font-weight:800;font-size:12.4px;line-height:1.65;color:var(--violet-2);text-decoration:underline;text-underline-offset:5px;border-radius:12px;padding:7px 12px}
#instagram-ai-mcp .mcp-guide-link:hover,#instagram-ai-mcp .mcp-guide-link:focus-visible{background:color-mix(in srgb,var(--violet) 12%,transparent);outline-offset:2px}
html[data-theme="light"] #instagram-ai-mcp .mcp-guide-link{color:#6c3dd1}

/* Refined verification chip: a quiet trust cue, not a default text link */
.quick-trust .meta-trust-link{
 display:inline-flex;align-items:center;justify-content:center;gap:6px;
 width:max-content;max-width:100%;margin-top:7px;padding:5px 9px;
 border:1px solid color-mix(in srgb,var(--violet) 19%,transparent);
 border-radius:999px;background:color-mix(in srgb,var(--violet) 7%,transparent);
 color:var(--violet-2);font-size:9.5px;font-weight:800;line-height:1.35;
 text-decoration:none;white-space:nowrap;vertical-align:middle;
 transition:background .2s ease,border-color .2s ease,box-shadow .2s ease,transform .2s ease;
}
.quick-trust .meta-trust-link-icon{
 width:13px;height:13px;flex:0 0 13px;fill:none;stroke:currentColor;
 stroke-width:1.45;stroke-linecap:round;stroke-linejoin:round;opacity:.9;
}
.quick-trust .meta-trust-link-arrow{
 display:inline-flex;align-items:center;justify-content:center;
 width:15px;height:15px;margin-inline-start:1px;border-radius:50%;
 background:color-mix(in srgb,var(--violet) 11%,transparent);
 font-size:10px;line-height:1;opacity:.75;
 transition:transform .2s ease,opacity .2s ease;
}
.quick-trust .meta-trust-link:hover{
 border-color:color-mix(in srgb,var(--violet) 34%,transparent);
 background:color-mix(in srgb,var(--violet) 12%,transparent);
 box-shadow:0 4px 12px color-mix(in srgb,var(--violet) 10%,transparent);
 transform:translateY(-1px);
}
.quick-trust .meta-trust-link:hover .meta-trust-link-arrow{
 opacity:1;transform:translate(1px,-1px);
}
.quick-trust .meta-trust-link:focus-visible{
 outline:2px solid color-mix(in srgb,var(--violet) 48%,transparent);
 outline-offset:3px;
}
html[data-theme="light"] .quick-trust .meta-trust-link{color:#7044c8}
@media(prefers-reduced-motion:reduce){
 .quick-trust .meta-trust-link,.quick-trust .meta-trust-link-arrow{transition:none}
 .quick-trust .meta-trust-link:hover{transform:none}
}

</style>
<section class="section-pad quick-trust-section" id="trust">
<div class="shell">
<div class="quick-trust glow-card reveal">
<div><span>✓</span><p><b>اتصال رسمی به Instagram / Meta</b><small>اتصال از مسیر رسمی متا</small><a class="meta-trust-link" href="/meta-verification.php?lang=<?= rawurlencode($landingLanguage) ?>">
<svg class="meta-trust-link-icon" viewBox="0 0 16 16" aria-hidden="true" focusable="false"><path d="M8 1.6 13.4 3.8v3.7c0 3.2-2.1 5.5-5.4 6.8-3.3-1.3-5.4-3.6-5.4-6.8V3.8L8 1.6Z"/><path d="m5.2 7.8 1.8 1.8 3.8-3.9"/></svg>
<span><?= $landingLanguage==='en'?'View official META approval':($landingLanguage==='ar'?'عرض موافقة META الرسمية':'مشاهده تأییدیه رسمی META') ?></span>
<span class="meta-trust-link-arrow" aria-hidden="true">↗</span>
</a></p></div>
<div><span>✓</span><p><b>بدون نیاز به رمز اینستاگرام</b><small>رمز پیج را در سایت ما وارد نمی‌کنی</small></p></div>
<div><span>✓</span><p><b>مدیریت چند پیج از یک محیط</b><small>حساب‌ها را یکجا مدیریت کن</small></p></div>
<div><span>✓</span><p><b>اتوماسیون + هوش مصنوعی + انتشار</b><small>همه در یک سیستم یکپارچه</small></p></div>
</div>
</div>
</section>
<section class="section-pad use-cases-section" id="use-cases" aria-labelledby="useCasesHeading">
<div class="shell">
  <div class="section-head reveal">
    <div class="eyebrow"><span class="pink-dot"></span> یک مرکز برای مدیریت کسب‌وکار دیجیتال</div>
    <h2 class="usecase-heading" id="useCasesHeading"><span class="usecase-magic">Magic</span><span class="usecase-heading-rest">از انتشار تا فروش</span></h2>
    <p>انتشار چندکاناله، فروشگاه اختصاصی، پیام‌رسان‌ها، CRM و ابزارهای هوشمند را در یک مسیر مدیریتی به هم وصل کن.</p>
  </div>
  <div class="use-case-grid" role="group" aria-label="جزئیات مورد انتخاب‌شده">
    
<button class="use-case glow-card reveal is-active" type="button" data-usecase-trigger="multichannel" aria-controls="useCaseDetails" aria-pressed="true">
  <span class="use-case-icon icon-violet"><svg viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path d="M21 3 10 14"/><path d="m21 3-7 18-4-7-7-4 18-7Z"/></svg></span>
  <span class="use-case-copy"><b>انتشار چندکاناله</b><small>اینستاگرام و کانال‌های تلگرام، بله و روبیکا</small></span>
  <span class="use-case-meta"><span class="use-case-number">01</span><span class="use-case-arrow" aria-hidden="true">+</span></span>
</button>
<button class="use-case glow-card reveal" type="button" data-usecase-trigger="store" aria-controls="useCaseDetails" aria-pressed="false">
  <span class="use-case-icon icon-cyan"><svg viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path d="M3 9h18l-2 12H5L3 9Z"/><path d="M7 9V6a5 5 0 0 1 10 0v3"/><path d="M9 13h6"/></svg></span>
  <span class="use-case-copy"><b>فروشگاه و سفارش‌ها</b><small>ویترین اختصاصی، سبد خرید و مدیریت سفارش</small></span>
  <span class="use-case-meta"><span class="use-case-number">02</span><span class="use-case-arrow" aria-hidden="true">+</span></span>
</button>
<button class="use-case glow-card reveal" type="button" data-usecase-trigger="messaging" aria-controls="useCaseDetails" aria-pressed="false">
  <span class="use-case-icon icon-pink"><svg viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path d="M21 11.5a8.4 8.4 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.4 8.4 0 0 1-3.8-.9L3 21l1.9-5.7a8.4 8.4 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.4 8.4 0 0 1 3.8-.9h.5a8.5 8.5 0 0 1 8 8v.5Z"/><path d="M8 12h.01M12 12h.01M16 12h.01"/></svg></span>
  <span class="use-case-copy"><b>پاسخ‌گویی در پیام‌رسان‌ها</b><small>مدیریت پیام‌ها و جریان پاسخ‌گویی در یک پنل</small></span>
  <span class="use-case-meta"><span class="use-case-number">03</span><span class="use-case-arrow" aria-hidden="true">+</span></span>
</button>
<button class="use-case glow-card reveal" type="button" data-usecase-trigger="sales" aria-controls="useCaseDetails" aria-pressed="false">
  <span class="use-case-icon icon-orange"><svg viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path d="M7 7h10l-1 14H8L7 7Z"/><path d="M9 7V5a3 3 0 0 1 6 0v2"/><path d="M12 11v5m-2-2 2 2 2-2"/></svg></span>
  <span class="use-case-copy"><b>تبدیل تعامل به فرصت فروش</b><small>از کامنت و دایرکت تا پیگیری و ثبت سفارش</small></span>
  <span class="use-case-meta"><span class="use-case-number">04</span><span class="use-case-arrow" aria-hidden="true">+</span></span>
</button>
<button class="use-case glow-card reveal" type="button" data-usecase-trigger="crm" aria-controls="useCaseDetails" aria-pressed="false">
  <span class="use-case-icon icon-green"><svg viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="10" cy="7" r="4"/><path d="M20 21v-2a4 4 0 0 0-3-3.9"/><path d="M17 3.1a4 4 0 0 1 0 7.8"/></svg></span>
  <span class="use-case-copy"><b>CRM و مدیریت مشتریان</b><small>پروفایل، تگ‌ها و سوابق ارتباط با مخاطب</small></span>
  <span class="use-case-meta"><span class="use-case-number">05</span><span class="use-case-arrow" aria-hidden="true">+</span></span>
</button>
<button class="use-case glow-card reveal" type="button" data-usecase-trigger="studio" aria-controls="useCaseDetails" aria-pressed="false">
  <span class="use-case-icon icon-violet"><svg viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path d="m12 3 1.8 5.2L19 10l-5.2 1.8L12 17l-1.8-5.2L5 10l5.2-1.8L12 3Z"/><path d="m19 16 .9 2.1L22 19l-2.1.9L19 22l-.9-2.1L16 19l2.1-.9L19 16Z"/></svg></span>
  <span class="use-case-copy"><b>تولید محتوای هوشمند</b><small>ساخت تصویر، ویدئو و کپشن با هوش مصنوعی</small></span>
  <span class="use-case-meta"><span class="use-case-number">06</span><span class="use-case-arrow" aria-hidden="true">+</span></span>
</button>
<button class="use-case glow-card reveal" type="button" data-usecase-trigger="workspace" aria-controls="useCaseDetails" aria-pressed="false">
  <span class="use-case-icon icon-cyan"><svg viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"/><path d="M14 2v6h6M8 13h8M8 17h8M8 9h2"/></svg></span>
  <span class="use-case-copy"><b>اتصال Google Drive و Sheets</b><small>اتصال فایل‌ها و مدیریت داده در جریان‌ها</small></span>
  <span class="use-case-meta"><span class="use-case-number">07</span><span class="use-case-arrow" aria-hidden="true">+</span></span>
</button>
<button class="use-case glow-card reveal" type="button" data-usecase-trigger="mcp" aria-controls="useCaseDetails" aria-pressed="false">
  <span class="use-case-icon icon-pink"><svg viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path d="M9 3a3 3 0 0 0-3 3v1a3 3 0 0 0 0 6v1a3 3 0 0 0 3 3"/><path d="M15 3a3 3 0 0 1 3 3v1a3 3 0 0 1 0 6v1a3 3 0 0 1-3 3"/><path d="M9 3h6v18H9z"/><path d="M12 7v.01M12 12v.01M12 17v.01"/></svg></span>
  <span class="use-case-copy"><b>اتصال ChatGPT و Claude با MCP</b><small>دسترسی دستیارهای هوشمند به ابزارهای مجیک</small></span>
  <span class="use-case-meta"><span class="use-case-number">08</span><span class="use-case-arrow" aria-hidden="true">+</span></span>
</button>
<button class="use-case glow-card reveal" type="button" data-usecase-trigger="automation" aria-controls="useCaseDetails" aria-pressed="false">
  <span class="use-case-icon icon-orange"><svg viewBox="0 0 24 24" focusable="false" aria-hidden="true"><rect x="3" y="3" width="6" height="6" rx="1"/><rect x="15" y="15" width="6" height="6" rx="1"/><rect x="15" y="3" width="6" height="6" rx="1"/><path d="M9 6h6M18 9v6M6 9v9h9"/></svg></span>
  <span class="use-case-copy"><b>اتوماسیون فرایندهای کسب‌وکار</b><small>محرک‌ها، شرط‌ها، متغیرها و زیرجریان‌ها</small></span>
  <span class="use-case-meta"><span class="use-case-number">09</span><span class="use-case-arrow" aria-hidden="true">+</span></span>
</button>
  </div>
  <div class="use-case-details glow-card reveal" id="useCaseDetails" role="region" aria-live="polite" aria-atomic="true" aria-label="جزئیات مورد انتخاب‌شده">
    
<article class="use-case-detail" data-usecase-panel="multichannel">
  <div class="use-case-detail-intro">
    <span class="use-case-detail-kicker">چالش واقعی</span>
    <h3>انتشار چندکاناله</h3>
    <p>انتشار محتوا در چند شبکه و کانال، وقتی هرکدام پنل جداگانه‌ای دارند، زمان و تمرکز زیادی می‌گیرد.</p>
  </div>
  <div class="use-case-detail-content">
    <div class="use-case-detail-block">
      <span class="use-case-detail-symbol" aria-hidden="true">✦</span>
      <div><small>راهکار مجیک</small><p>مقصدهای اینستاگرام و کانال‌های تلگرام، بله و روبیکا را در پلنر مدیریت کن؛ محتوا را پیش‌نمایش بگیر، فوری منتشر کن یا برای زمان دلخواه برنامه‌ریزی کن.</p></div>
    </div>
    <div class="use-case-detail-block is-outcome">
      <span class="use-case-detail-symbol" aria-hidden="true">✓</span>
      <div><small>نتیجه برای کسب‌وکار</small><p>برنامه انتشار چندکاناله را از یک محیط منسجم مدیریت کن.</p></div>
    </div>
  </div>
</article>
<article class="use-case-detail" data-usecase-panel="store" hidden>
  <div class="use-case-detail-intro">
    <span class="use-case-detail-kicker">چالش واقعی</span>
    <h3>فروشگاه و سفارش‌ها</h3>
    <p>معرفی محصولات، دریافت سفارش و پیگیری موجودی و ارسال معمولاً بین ابزارهای جدا پخش می‌شود.</p>
  </div>
  <div class="use-case-detail-content">
    <div class="use-case-detail-block">
      <span class="use-case-detail-symbol" aria-hidden="true">✦</span>
      <div><small>راهکار مجیک</small><p>فروشگاه عمومی با زیردامنه اختصاصی و ۹ قالب آماده بساز؛ کاتالوگ، سبد خرید، موجودی، سفارش‌ها، تأمین‌کنندگان و روش‌های ارسال را از پنل مدیریت کن.</p></div>
    </div>
    <div class="use-case-detail-block is-outcome">
      <span class="use-case-detail-symbol" aria-hidden="true">✓</span>
      <div><small>نتیجه برای کسب‌وکار</small><p>از ویترین اختصاصی تا ثبت و پیگیری سفارش، یک چرخه کامل داشته باش.</p></div>
    </div>
  </div>
</article>
<article class="use-case-detail" data-usecase-panel="messaging" hidden>
  <div class="use-case-detail-intro">
    <span class="use-case-detail-kicker">چالش واقعی</span>
    <h3>پاسخ‌گویی در پیام‌رسان‌ها</h3>
    <p>مخاطب در شبکه‌های مختلف پیام می‌دهد و جابه‌جایی بین بات‌ها و پنل‌ها پاسخ‌گویی را دشوار می‌کند.</p>
  </div>
  <div class="use-case-detail-content">
    <div class="use-case-detail-block">
      <span class="use-case-detail-symbol" aria-hidden="true">✦</span>
      <div><small>راهکار مجیک</small><p>حساب‌ها و بات‌های اینستاگرام، تلگرام، بله و روبیکا را متصل کن؛ گفتگوها را در مرکز ارتباط ببین و برای هر حساب جریان پاسخ‌گویی بساز.</p></div>
    </div>
    <div class="use-case-detail-block is-outcome">
      <span class="use-case-detail-symbol" aria-hidden="true">✓</span>
      <div><small>نتیجه برای کسب‌وکار</small><p>مدیریت متمرکزتر گفتگوها و پاسخ‌گویی در بسترهای مختلف.</p></div>
    </div>
  </div>
</article>
<article class="use-case-detail" data-usecase-panel="sales" hidden>
  <div class="use-case-detail-intro">
    <span class="use-case-detail-kicker">چالش واقعی</span>
    <h3>تبدیل تعامل به فرصت فروش</h3>
    <p>کامنت یا پیام مخاطب اگر مسیر بعدی نداشته باشد، به‌راحتی به یک تعامل کوتاه ختم می‌شود.</p>
  </div>
  <div class="use-case-detail-content">
    <div class="use-case-detail-block">
      <span class="use-case-detail-symbol" aria-hidden="true">✦</span>
      <div><small>راهکار مجیک</small><p>با محرک‌های کامنت و دایرکت، پاسخ خودکار، دکمه، لینک، شرط و بلوک‌های هوش مصنوعی، ادامه گفتگو را طراحی کن.</p></div>
    </div>
    <div class="use-case-detail-block is-outcome">
      <span class="use-case-detail-symbol" aria-hidden="true">✓</span>
      <div><small>نتیجه برای کسب‌وکار</small><p>از اولین تعامل تا معرفی محصول، دریافت اطلاعات و ثبت سفارش مسیر بساز.</p></div>
    </div>
  </div>
</article>
<article class="use-case-detail" data-usecase-panel="crm" hidden>
  <div class="use-case-detail-intro">
    <span class="use-case-detail-kicker">چالش واقعی</span>
    <h3>CRM و مدیریت مشتریان</h3>
    <p>اطلاعات تماس، سوابق گفتگو و وضعیت پیگیری مشتری ممکن است پراکنده بماند.</p>
  </div>
  <div class="use-case-detail-content">
    <div class="use-case-detail-block">
      <span class="use-case-detail-symbol" aria-hidden="true">✦</span>
      <div><small>راهکار مجیک</small><p>پروفایل مخاطب، تگ‌ها، فیلدهای اختصاصی و تاریخچه تعامل را در CRM مدیریت کن و آن‌ها را به جریان‌های ارتباطی و سفارش‌ها وصل کن.</p></div>
    </div>
    <div class="use-case-detail-block is-outcome">
      <span class="use-case-detail-symbol" aria-hidden="true">✓</span>
      <div><small>نتیجه برای کسب‌وکار</small><p>هر مخاطب با اطلاعات و وضعیت روشن برای پیگیری بعدی.</p></div>
    </div>
  </div>
</article>
<article class="use-case-detail" data-usecase-panel="studio" hidden>
  <div class="use-case-detail-intro">
    <span class="use-case-detail-kicker">چالش واقعی</span>
    <h3>تولید محتوای هوشمند</h3>
    <p>ایده‌پردازی، تولید تصویر و ویدئو و آماده‌سازی کپشن در ابزارهای جداگانه زمان‌بر است.</p>
  </div>
  <div class="use-case-detail-content">
    <div class="use-case-detail-block">
      <span class="use-case-detail-symbol" aria-hidden="true">✦</span>
      <div><small>راهکار مجیک</small><p>در Smart Studio تصویر، ویدئو و کپشن بساز یا ویرایش کن و خروجی را مستقیم به مسیر انتشار بفرست.</p></div>
    </div>
    <div class="use-case-detail-block is-outcome">
      <span class="use-case-detail-symbol" aria-hidden="true">✓</span>
      <div><small>نتیجه برای کسب‌وکار</small><p>از ایده تا محتوای آماده انتشار در یک جریان.</p></div>
    </div>
  </div>
</article>
<article class="use-case-detail" data-usecase-panel="workspace" hidden>
  <div class="use-case-detail-intro">
    <span class="use-case-detail-kicker">چالش واقعی</span>
    <h3>اتصال Google Drive و Sheets</h3>
    <p>ثبت اطلاعات و پیدا کردن داده‌های قبلی در فایل‌های کاری، به کار دستی و تکراری تبدیل می‌شود.</p>
  </div>
  <div class="use-case-detail-content">
    <div class="use-case-detail-block">
      <span class="use-case-detail-symbol" aria-hidden="true">✦</span>
      <div><small>راهکار مجیک</small><p>Google Drive را وصل کن و فایل انتخابی را در جریان استفاده کن؛ با Google Sheets داده‌ها را اضافه، جست‌وجو، به‌روزرسانی یا حذف کن.</p></div>
    </div>
    <div class="use-case-detail-block is-outcome">
      <span class="use-case-detail-symbol" aria-hidden="true">✓</span>
      <div><small>نتیجه برای کسب‌وکار</small><p>فرایندهای مخاطب و سفارش را به داده‌های واقعی فایل‌های انتخابی متصل کن.</p></div>
    </div>
  </div>
</article>
<article class="use-case-detail" data-usecase-panel="mcp" hidden>
  <div class="use-case-detail-intro">
    <span class="use-case-detail-kicker">چالش واقعی</span>
    <h3>اتصال ChatGPT و Claude با MCP</h3>
    <p>دستیار هوش مصنوعی بدون اتصال به ابزارهای واقعی، بیشتر به پیشنهاد و تولید متن محدود می‌ماند.</p>
  </div>
  <div class="use-case-detail-content">
    <div class="use-case-detail-block">
      <span class="use-case-detail-symbol" aria-hidden="true">✦</span>
      <div><small>راهکار مجیک</small><p>Magic MCP را به ChatGPT یا Claude وصل کن تا دستیار سازگار، ابزارها و داده‌های مجاز مجیک را از طریق پروتکل MCP فراخوانی کند.</p></div>
    </div>
    <div class="use-case-detail-block is-outcome">
      <span class="use-case-detail-symbol" aria-hidden="true">✓</span>
      <div><small>نتیجه برای کسب‌وکار</small><p>هوش مصنوعی را از یک پاسخ‌گو به دستیار متصل به ابزارهای واقعی تبدیل کن.</p></div>
    </div>
  </div>
</article>
<article class="use-case-detail" data-usecase-panel="automation" hidden>
  <div class="use-case-detail-intro">
    <span class="use-case-detail-kicker">چالش واقعی</span>
    <h3>اتوماسیون فرایندهای کسب‌وکار</h3>
    <p>فرایندهای کسب‌وکار چندمرحله‌ای‌اند و با شرط‌ها و مسیرهای مختلف پیش می‌روند.</p>
  </div>
  <div class="use-case-detail-content">
    <div class="use-case-detail-block">
      <span class="use-case-detail-symbol" aria-hidden="true">✦</span>
      <div><small>راهکار مجیک</small><p>با Flow Builder محرک‌ها، شرط‌ها، دکمه‌ها، متغیرها، زیرجریان‌ها، نودهای هوش مصنوعی و Google Sheets را کنار هم بچین.</p></div>
    </div>
    <div class="use-case-detail-block is-outcome">
      <span class="use-case-detail-symbol" aria-hidden="true">✓</span>
      <div><small>نتیجه برای کسب‌وکار</small><p>اتوماسیون‌های قابل توسعه و متناسب با عملیات واقعی کسب‌وکار بساز.</p></div>
    </div>
  </div>
</article>
  </div>
</div>
</section>
<section class="section-pad product-cycle-section" id="product-cycle">
<div class="shell">
<div class="section-head reveal">
<div class="eyebrow"><span class="violet-dot"></span> مسیر اصلی محصول</div>
<h2 id="cycle-title"><span>مدیریت پیج اینستاگرام، از تولید محتوا تا اتوماسیون</span></h2>
<p>قبل از جزئیات، کل ماجرا ساده است: محتوا را می‌سازی، منتشر می‌کنی، گفتگوها را خودکار می‌کنی و مخاطبانت را یکجا مدیریت می‌کنی.</p>
</div>
<div class="lifecycle lifecycle-four reveal delay-1">
<div class="life-item"><span>۱</span><i>✦</i><b>بساز</b><small>محتوا، تصویر، ویدیو و کپشن</small></div><em>←</em>
<div class="life-item"><span>۲</span><i>↗</i><b>منتشر کن</b><small>فوری یا در زمان مناسب</small></div><em>←</em>
<div class="life-item"><span>۳</span><i>⌁</i><b>گفتگو را خودکار کن</b><small>کامنت، دایرکت و پاسخ‌ها</small></div><em>←</em>
<div class="life-item"><span>۴</span><i>◎</i><b>مخاطب را مدیریت کن</b><small>اطلاعات، وضعیت و پیگیری</small></div>
</div>
</div>
</section><section class="section-pad story-demo-section" id="demo">
<div class="shell">
<div class="section-head reveal">
<div class="eyebrow"><span class="cyan-dot"></span> دموی تعاملی</div>
<h2>کامنت به دایرکت؛ یک تعامل چطور به مسیر واقعی تبدیل می‌شود؟</h2>
<p>بدون توضیح طولانی؛ مسیر را اجرا کن و ببین Magic از اولین تعامل تا اقدام نهایی چه کاری انجام می‌دهد.</p>
</div>
<div class="story-demo glow-card reveal delay-1" id="storyDemo">
<div class="story-demo-top">
<div><span class="brand-spark">✦</span><p><b>کامنت → دایرکت → اقدام</b><small>نمونه ساده از یک اتوماسیون واقعی</small></p></div>
<button id="storyDemoReplay" type="button">▶ اجرای دمو</button>
</div>
<div aria-live="polite" class="story-steps">
<article data-story-step="0"><span>۱</span><i>💬</i><b>کاربر کامنت می‌گذارد</b><small>«قیمت رو بفرست»</small></article>
<em>←</em>
<article data-story-step="1"><span>۲</span><i>⚡</i><b>Magic تعامل را تشخیص می‌دهد</b><small>شروع خودکار مسیر فروش</small></article>
<em>←</em>
<article data-story-step="2"><span>۳</span><i>✉</i><b>دایرکت هوشمند ارسال می‌شود</b><small>پاسخ مناسب برای همان مخاطب</small></article>
<em>←</em>
<article data-story-step="3"><span>۴</span><i>✦</i><b>گفتگو ادامه پیدا می‌کند</b><small>سؤال، پاسخ و تصمیم هوشمند</small></article>
<em>←</em>
<article data-story-step="4"><span>۵</span><i>↗</i><b>کاربر به اقدام نهایی می‌رسد</b><small>لینک، ثبت‌نام، سفارش یا پیگیری</small></article>
</div>
<div class="story-result" id="storyResult"><span>◎</span><p><b>نتیجه</b><small>یک تعامل ساده، بدون جابه‌جایی بین چند ابزار، به یک مسیر قابل پیگیری تبدیل می‌شود.</small></p></div>
</div>
</div>
</section><section class="section-pad core-features-section" id="features">
<div class="shell">
<div class="section-head reveal">
<div class="eyebrow"><span class="violet-dot"></span> قابلیت‌های اصلی</div>
<h2>ابزارهایی که نتیجه کار را می‌سازند</h2>
<p>به‌جای اصطلاحات فنی، این‌ها همان کارهایی هستند که هر روز برای مدیریت پیج به آن‌ها نیاز داری.</p>
</div>
<div class="preview-links"><a href="#channel-planner">انتشار چندشبکه‌ای</a>
<a href="#messenger-inbox">مرکز ارتباط+</a>
<a href="#sheets-flow">گوگل‌شیت در جریان‌ساز</a>
<a href="#gemini-flow">بلوک Google AI</a>
<a href="#shop-plus">فروشگاه+</a>
<a href="#channel-mcp">مدیریت کانال با MCP</a>
<a href="#magic-guide">راهنمای تعاملی مجیک</a></div>
<div class="core-feature-grid">
<article class="core-feature-card glow-card reveal feature-violet"><span class="core-icon violet">✦</span><h3>استودیوی هوشمند</h3><p>از یک ایده شروع کن و تصویر، ویدیو و کپشن آماده انتشار را در همان مسیر بساز.</p><div class="feature-card-footer" aria-label="خروجی‌های استودیوی هوشمند"><span>تصویر</span><span>ویدیو</span><span>کپشن</span></div></article>
<article class="core-feature-card glow-card reveal feature-cyan"><span class="core-icon cyan">↗</span><h3>انتشار و زمان‌بندی</h3><p>محتوا را فوری منتشر کن یا برای پست، استوری و ریلز در زمان مناسب برنامه‌ریزی کن.</p><div class="feature-card-footer" aria-label="روش‌های انتشار"><span>پست</span><span>استوری</span><span>ریلز</span></div></article>
<article class="core-feature-card glow-card reveal feature-pink"><span class="core-icon pink">✉</span><h3>دایرکت هوشمند</h3><p>تعامل مخاطب را به پاسخ، دایرکت و پیگیری خودکار وصل کن تا گفتگو نیمه‌کاره نماند.</p><div class="feature-card-footer" aria-label="مسیرهای دایرکت هوشمند"><span>کامنت</span><span>دایرکت</span><span>پیگیری</span></div></article>
<article class="core-feature-card glow-card reveal feature-warm"><span class="core-icon warm">⌁</span><h3>جریان‌ساز هوشمند</h3><p>مسیر تعامل را بصری طراحی کن؛ از شروع گفتگو تا اقدام نهایی، بدون پیچیدگی فنی.</p><div class="feature-card-footer feature-flow-footer" aria-label="مراحل جریان هوشمند"><span>شروع</span><i></i><span>مسیر</span><i></i><span>اقدام</span></div></article>
<article class="core-feature-card glow-card reveal feature-green"><span class="core-icon green">◉</span><h3>صندوق گفتگو</h3><p>گفتگوهای مخاطبان را یکجا ببین، سریع پاسخ بده و در صورت نیاز به عضو تیم ارجاع بده.</p><div class="feature-card-footer" aria-label="امکانات صندوق گفتگو"><span>گفتگوها</span><span>پاسخ</span><span>ارجاع</span></div></article>
<article class="core-feature-card glow-card reveal feature-violet"><span class="core-icon violet">◎</span><h3>مدیریت مخاطبان</h3><p>اطلاعات، وضعیت و سابقه تعامل هر مخاطب را کنار هم نگه دار تا ارتباط دقیق‌تری بسازی.</p><div class="feature-card-footer" aria-label="اطلاعات مدیریت مخاطب"><span>اطلاعات</span><span>وضعیت</span><span>تعامل</span></div></article>
<article class="core-feature-card glow-card reveal feature-cyan"><span class="core-icon cyan">◈</span><h3>ابزارهای هوش مصنوعی</h3><p>برای ساخت محتوا، پیشنهاد پاسخ و تصمیم‌گیری داخل گفتگو از هوش مصنوعی کمک بگیر.</p><div class="feature-card-footer" aria-label="کاربردهای هوش مصنوعی"><span>تولید</span><span>پیشنهاد</span><span>پاسخ</span></div></article>
<article class="core-feature-card glow-card reveal feature-pink"><span class="core-icon pink">▦</span><h3>مدیریت چند پیج</h3><p>چند حساب اینستاگرام را از یک پنل کنترل کن و بدون پراکندگی بین پیج‌ها جابه‌جا شو.</p><div class="feature-card-footer" aria-label="مزایای مدیریت چند پیج"><span>چند پیج</span><span>یک پنل</span><span>مدیریت یکجا</span></div></article>
<article class="core-feature-card glow-card reveal feature-telegram"><span class="core-icon telegram">➤</span><h3>اتصال تلگرام به اینستاگرام</h3><p>پیام‌ها و لیدهای جریان را به تلگرام بفرست و در سناریوهای Live Reply ادامه پاسخ‌گویی دایرکت را از تلگرام مدیریت کن.</p><div class="feature-card-footer" aria-label="امکانات اتصال تلگرام و اینستاگرام"><span>تلگرام</span><span>دایرکت</span><span>Live Reply</span></div></article>
<article class="core-feature-card glow-card reveal feature-voice"><span class="core-icon voice">🎙</span><h3>پاسخ هوشمند صوتی</h3><p>ویس و پیام صوتی ورودی را با هوش مصنوعی پردازش کن و پاسخ مناسب را به‌صورت صوتی یا متنی برگردان.</p><div class="feature-card-footer" aria-label="امکانات پاسخ صوتی هوشمند"><span>ویس</span><span>Voice AI</span><span>پاسخ صوتی</span></div></article>
<?php foreach ($landingServices as $id => $service): ?>
<article id="integration-<?= $id ?>" class="core-feature-card glow-card reveal integration-card">
<span class="core-icon"><?= $landingServiceIcons[$id] ?></span><h3><?= $service[$landingLanguage][0] ?></h3>
<p><?= $service[$landingLanguage][1] ?></p>
</article>
<?php endforeach; ?>
</div>
<div class="feature-details-cta reveal" dir="<?= $landingLanguage === 'en' ? 'ltr' : 'rtl' ?>">
  <div class="feature-details-copy">
    <div class="feature-details-kicker"><span class="cyan-dot" aria-hidden="true"></span>
      <?php if ($landingLanguage === 'en'): ?>Explore in detail<?php elseif ($landingLanguage === 'ar'): ?>اكتشف المزيد<?php else: ?>جزئیات بیشتر<?php endif; ?>
    </div>
    <h3>
      <?php if ($landingLanguage === 'en'): ?>
        Explore everything Magic brings together
      <?php elseif ($landingLanguage === 'ar'): ?>
        اكتشف جميع إمكانات مجيك في مكان واحد
      <?php else: ?>
        تمام قابلیت‌های مجیک را یکجا ببین
      <?php endif; ?>
    </h3>
    <p>
      <?php if ($landingLanguage === 'en'): ?>
        From social channels and messaging to commerce and AI tools, explore the full feature set in one place.
      <?php elseif ($landingLanguage === 'ar'): ?>
        من إدارة الشبكات والرسائل إلى المتاجر وأدوات الذكاء الاصطناعي، تعرّف على جميع الميزات.
      <?php else: ?>
        از مدیریت شبکه‌ها و پیام‌رسان‌ها تا فروشگاه‌ساز و ابزارهای هوشمند، همه امکانات را بررسی کن.
      <?php endif; ?>
    </p>
  </div>
  <a class="feature-details-button" href="#all-features">
    <span>
      <?php if ($landingLanguage === 'en'): ?>Explore all features<?php elseif ($landingLanguage === 'ar'): ?>استكشف جميع الميزات<?php else: ?>مشاهده همه قابلیت‌ها<?php endif; ?>
    </span>
    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 5v14m-7-7 7 7 7-7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
  </a>
</div>
</div>
</section><section class="section-pad all-features-section" id="all-features">
<div class="shell">
<div class="section-head reveal">
<div class="eyebrow"><span class="cyan-dot"></span>
<?php if ($landingLanguage === 'en'): ?>Complete feature list<?php elseif ($landingLanguage === 'ar'): ?>قائمة الميزات الكاملة<?php else: ?>فهرست کامل قابلیت‌ها<?php endif; ?>
</div>
<?php if ($landingLanguage === 'en'): ?>
<h2>Magic Features <span class="magic-rainbow-text">Without Limits</span></h2>
<p>Explore the full range of tools and workflows available across Magic.</p>
<?php elseif ($landingLanguage === 'ar'): ?>
<h2>مزايا مجيك <span class="magic-rainbow-text">بلا حدود</span></h2>
<p>استكشف مجموعة الأدوات ومسارات العمل المتاحة في مجيك.</p>
<?php else: ?>
<h2>قابلیت‌های <span class="magic-rainbow-text">بی‌انتهای</span> مجیک</h2>
<p>از قابلیت‌های اصلی تا ابزارهای تخصصی، همه امکانات مجیک را یکجا و مرتب ببین.</p>
<?php endif; ?>
</div>
<svg class="feature-icon-sprite" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" width="0" height="0" style="position:absolute;width:0;height:0;overflow:hidden;pointer-events:none"><symbol id="feature-icon-workflow" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="6" height="6" rx="1"/><rect x="15" y="15" width="6" height="6" rx="1"/><path d="M6 9v3a3 3 0 0 0 3 3h6"/></g></symbol><symbol id="feature-icon-inbox" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v16H4z"/><path d="M4 14h4l2 3h4l2-3h4"/></g></symbol><symbol id="feature-icon-brain" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 4a3 3 0 0 0-5.7 1.4A3.5 3.5 0 0 0 5 12a3.5 3.5 0 0 0 2 6.2A3 3 0 0 0 12 20z"/><path d="M12 4a3 3 0 0 1 5.7 1.4A3.5 3.5 0 0 1 19 12a3.5 3.5 0 0 1-2 6.2A3 3 0 0 1 12 20M12 4v16"/></g></symbol><symbol id="feature-icon-network" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="5" cy="6" r="2"/><circle cx="19" cy="6" r="2"/><circle cx="12" cy="18" r="2"/><path d="M7 7.5 10.5 16M17 7.5 13.5 16M7 6h10"/></g></symbol><symbol id="feature-icon-chart" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="M8 15v-3M13 15V6M18 15V9"/></g></symbol><symbol id="feature-icon-store" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m3 10 2-6h14l2 6"/><path d="M4 10v10h16V10M9 20v-6h6v6"/><path d="M3 10q2 4 5 0 4 4 8 0 3 4 5 0"/></g></symbol><symbol id="feature-icon-wand" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m4 20 11-11"/><path d="m14 5 1.5 1.5M18 3l.8 2.2L21 6l-2.2.8L18 9l-.8-2.2L15 6l2.2-.8z"/></g></symbol><symbol id="feature-icon-calendar" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="17" rx="2"/><path d="M16 2v4M8 2v4M3 10h18M8 14h3M8 17h5"/></g></symbol><symbol id="feature-icon-bot" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="7" width="16" height="13" rx="3"/><path d="M12 3v4M9 13h.01M15 13h.01M9 17h6"/></g></symbol><symbol id="feature-icon-send" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></g></symbol><symbol id="feature-icon-users" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="10" cy="7" r="4"/><path d="M20 21v-2a4 4 0 0 0-3-3.87"/></g></symbol><symbol id="feature-icon-sheet" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3h9l4 4v14H6z"/><path d="M14 3v5h5M8 12h9M8 16h9M12 12v8"/></g></symbol><symbol id="feature-icon-link" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.1 0l2-2a5 5 0 0 0-7.1-7.1l-1.1 1.1"/><path d="M14 11a5 5 0 0 0-7.1 0l-2 2a5 5 0 0 0 7.1 7.1l1.1-1.1"/></g></symbol><symbol id="feature-icon-headset" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 13v-2a9 9 0 0 1 18 0v2"/><rect x="3" y="12" width="4" height="7" rx="2"/><rect x="17" y="12" width="4" height="7" rx="2"/></g></symbol><symbol id="feature-icon-layers" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3 9 5-9 5-9-5z"/><path d="m3 12 9 5 9-5M3 16l9 5 9-5"/></g></symbol><symbol id="feature-icon-message" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.5 8.5 0 0 1-8.5 8.5H8l-5 3 1.5-5A8.5 8.5 0 1 1 21 11.5Z"/><path d="M8 10h8M8 14h5"/></g></symbol><symbol id="feature-icon-timer" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l3 2M9 2h6M12 2v3"/></g></symbol><symbol id="feature-icon-template" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="8" height="8" rx="1"/><rect x="13" y="3" width="8" height="5" rx="1"/><rect x="13" y="10" width="8" height="11" rx="1"/><rect x="3" y="13" width="8" height="8" rx="1"/></g></symbol><symbol id="feature-icon-play" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="m10 8 6 4-6 4z"/></g></symbol><symbol id="feature-icon-shield" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/><path d="m9 12 2 2 4-4"/></g></symbol><symbol id="feature-icon-copy" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="8" width="12" height="13" rx="2"/><path d="M16 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3"/></g></symbol><symbol id="feature-icon-layout" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 9v12"/></g></symbol><symbol id="feature-icon-usersearch" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="8" r="4"/><path d="M2 21a7 7 0 0 1 14 0M17 17l5 5M17 20h5"/></g></symbol><symbol id="feature-icon-mic" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="2" width="6" height="12" rx="3"/><path d="M5 10v2a7 7 0 0 0 14 0v-2M12 19v3M8 22h8"/></g></symbol><symbol id="feature-icon-audio" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 10v4M7 6v12M11 3v18M15 7v10M19 9v6M22 11v2"/></g></symbol><symbol id="feature-icon-library" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h14a2 2 0 0 1 2 2v14H6a2 2 0 0 1-2-2z"/><path d="M4 18a2 2 0 0 1 2-2h14M8 8h8M8 12h6"/></g></symbol><symbol id="feature-icon-wallet" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="15" rx="2"/><path d="M3 8h18M16 14h2"/></g></symbol><symbol id="feature-icon-compass" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="m15.5 8.5-2.5 5-5 2.5 2.5-5z"/></g></symbol><symbol id="feature-icon-story" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="3" width="16" height="18" rx="3"/><circle cx="12" cy="10" r="3"/><path d="M7 18a5 5 0 0 1 10 0"/></g></symbol><symbol id="feature-icon-filter" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 4h18l-7 8v6l-4 2v-8z"/></g></symbol><symbol id="feature-icon-folder" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></g></symbol><symbol id="feature-icon-globe" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18"/></g></symbol><symbol id="feature-icon-palette" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a9 9 0 1 0 0 18h1a2 2 0 0 0 1.7-3.1 1.8 1.8 0 0 1 1.5-2.8H18a3 3 0 0 0 3-3A9 9 0 0 0 12 3Z"/><circle cx="7.5" cy="11" r=".8"/><circle cx="10" cy="7.5" r=".8"/><circle cx="15" cy="8" r=".8"/></g></symbol><symbol id="feature-icon-package" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3 9 5-9 5-9-5zM3 8v9l9 5 9-5V8M12 13v9"/></g></symbol><symbol id="feature-icon-cart" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 4h2l2.5 11h10l3-8H6"/><circle cx="9" cy="19" r="1.5"/><circle cx="17" cy="19" r="1.5"/></g></symbol><symbol id="feature-icon-truck" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h12v12H3zM15 10h4l3 3v5h-7z"/><circle cx="7.5" cy="19" r="1.5"/><circle cx="18.5" cy="19" r="1.5"/></g></symbol><symbol id="feature-icon-ticket" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6h16v4a2 2 0 0 0 0 4v4H4v-4a2 2 0 0 0 0-4z"/><path d="M12 7v2M12 12v2M12 17v1"/></g></symbol><symbol id="feature-icon-creditcard" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20M6 15h4"/></g></symbol><symbol id="feature-icon-route" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="6" r="2"/><circle cx="18" cy="18" r="2"/><path d="M8 6h4a4 4 0 0 1 4 4v4a4 4 0 0 0 4 4"/></g></symbol><symbol id="feature-icon-branch" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3v12a4 4 0 0 0 4 4h8"/><path d="M6 8a4 4 0 0 0 4-4h8M18 15l3 4-3 4"/></g></symbol><symbol id="feature-icon-cloud" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M7 18a5 5 0 1 1 1-9.9A6 6 0 0 1 20 11a3.5 3.5 0 0 1-1 7z"/></g></symbol><symbol id="feature-icon-image" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></g></symbol><symbol id="feature-icon-video" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="13" height="14" rx="2"/><path d="m16 10 5-3v10l-5-3z"/></g></symbol><symbol id="feature-icon-mail" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></g></symbol><symbol id="feature-icon-chartpie" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v9h9A9 9 0 1 1 12 3Z"/><path d="M16 3.5A8.5 8.5 0 0 1 21 9h-9V3"/></g></symbol><symbol id="feature-icon-telegram" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m22 3-7 18-4-7-7-4z"/><path d="m22 3-11 11"/></g></symbol><symbol id="feature-icon-mouse" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a7 7 0 0 0-7 7v6a7 7 0 0 0 14 0V9a7 7 0 0 0-7-7Z"/><path d="M12 2v7"/></g></symbol><symbol id="feature-icon-text" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6h16M12 6v13M8 19h8M7 10h10"/></g></symbol></svg>
<div class="feature-grid" id="featureGrid">
<article class="feature-card glow-card reveal" data-priority="1"><div class="feature-icon cyan" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-workflow"></use></svg></div><span class="feature-num">01</span>

<h3>مسیرهای خودکار برای گفتگو</h3><p>از یک کامنت یا دایرکت، یک مسیر مشخص برای پاسخ، پیگیری و رسیدن به اقدام نهایی بساز.</p>
<div class="chips"><span>کامنت</span><span>دایرکت</span><span>رویداد</span><span>مسیر</span></div>
</article>
<article class="feature-card glow-card reveal" data-priority="2"><div class="feature-icon cyan" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-inbox"></use></svg></div><span class="feature-num">02</span><h3><a href="#messenger-inbox">مرکز ارتباط+</a></h3><p>پیام‌ها و گفتگوهای ورودی حساب‌های متصل اینستاگرام، تلگرام، بله و روبیکا را در یک صندوق واحد ببین. بر اساس شبکه و اکانت فیلتر کن، گفتگوهای خوانده‌نشده و آرشیوشده را جدا کن و تاریخچهٔ هر گفتگو را کنار اطلاعات مخاطب داشته باش. با جست‌وجوی نام نمایشی، نام کاربری و اطلاعات CRM، گفتگو را پیدا کن و تگ‌ها، فیلدهای اختصاصی، مرحلهٔ مشتری و زمان پیگیری را مدیریت کن.</p></article>
<article class="feature-card glow-card reveal" data-priority="3"><div class="feature-icon pink" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-brain"></use></svg></div><span class="feature-num">03</span>

<h3>پاسخ‌گویی و تصمیم‌گیری با هوش مصنوعی</h3><p>هوش مصنوعی پیام را می‌فهمد، پاسخ مناسب می‌دهد و مسیر بعدی گفتگو را انتخاب می‌کند.</p>
<div class="chips"><span>تحلیل</span><span>تصمیم</span><span>پاسخ</span><span>زمینه</span></div>
</article>
<article class="feature-card glow-card reveal" data-priority="4"><div class="feature-icon cyan" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-network"></use></svg></div><span class="feature-num">04</span><h3><a href="#channel-planner">انتشار چندشبکه‌ای</a></h3><p>برای حساب‌ها و مقصدهای متصل، انتشار را از یک پلنر مدیریت کن؛ محتوای اینستاگرام را از Publisher و پست‌های کانال تلگرام، بله و روبیکا را فوری یا زمان‌بندی‌شده منتشر کن.</p></article>
<article class="feature-card glow-card reveal" data-priority="5"><div class="feature-icon orange" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-chart"></use></svg></div><span class="feature-num">05</span><h3>پروفایل+</h3><p>داشبورد آمار و تحلیل حساب اینستاگرام؛ تعداد دنبال‌کنندگان، دنبال‌شوندگان و محتوا را ببین و عملکرد استوری، ریلز، پست و کاروسل را با Views، Reach، تعامل، لایک، کامنت، اشتراک‌گذاری، ذخیره و نرخ تعامل بررسی کن.</p></article>
<article class="feature-card glow-card reveal" data-priority="6"><div class="feature-icon orange" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-store"></use></svg></div><span class="feature-num">06</span><h3><a href="#shop-plus">فروشگاه+</a></h3><p>کاتالوگ محصول و موجودی را مدیریت کن، ویترین عمومی با آدرس اختصاصی بساز، از سایت یا جریان دایرکت سفارش بگیر و جزئیات سفارش، تخفیف، ارسال، پرداخت و وضعیت تحویل را از پنل پیگیری کن.</p></article>
<article class="feature-card glow-card reveal" data-priority="7"><div class="feature-icon pink" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-wand"></use></svg></div><span class="feature-num">07</span>

<h3>ساخت هوشمند محتوا</h3><p>ساخت و آماده‌سازی محتوای تصویری، ویدیویی و متنی در محیط اختصاصی پنل.</p>
<div class="chips"><span>تصویر</span><span>ویدیو</span><span>متن</span><span>خروجی</span></div>
</article>
<article class="feature-card glow-card reveal" data-priority="8"><div class="feature-icon violet" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-calendar"></use></svg></div><span class="feature-num">08</span>

<h3>زمان‌بندی انتشار</h3><p>قرار دادن محتوا در صف انتشار با تاریخ و ساعت مشخص و مدیریت برنامه محتوایی.</p>
<div class="chips"><span>تقویم</span><span>صف</span><span>تاریخ</span><span>ساعت</span></div>
</article>
<article class="feature-card glow-card reveal" data-priority="9"><div class="feature-icon pink" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-brain"></use></svg></div><span class="feature-num">09</span><h3>جریان‌های هوشمند AI برای پیام‌رسان‌ها</h3><p>برای بات‌های تلگرام، بله و روبیکا جریان بساز؛ پیام مخاطب را به AI بسپار تا آن را تحلیل کند، پاسخ مناسب بدهد و مسیر بعدی را انتخاب کند.</p><div class="chips"><span>تلگرام</span><span>بله</span><span>روبیکا</span><span>AI Flow</span></div></article>
<article class="feature-card glow-card reveal" data-priority="10"><div class="feature-icon green" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-bot"></use></svg></div><span class="feature-num">10</span><h3>اتصال بات تلگرام به مجیک</h3><p>بات تلگرام را به‌عنوان یک اکانت متصل اضافه کن و برای پیام‌های ورودی آن جریان‌های پاسخ‌گویی و اتوماسیون بساز.</p><div class="chips"><span>Telegram Bot</span><span>اتصال بات</span><span>جریان هوشمند</span></div></article>
<article class="feature-card glow-card reveal" data-priority="11"><div class="feature-icon orange" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-bot"></use></svg></div><span class="feature-num">11</span><h3>اتصال بات بله و پاسخ‌گویی خودکار</h3><p>بات بله را متصل کن، پیام‌های ورودی را دریافت کن و با جریان‌های هوشمند پاسخ بده یا گفتگو را پیگیری کن.</p><div class="chips"><span>Bale Bot</span><span>پاسخ خودکار</span><span>پیگیری</span></div></article>
<article class="feature-card glow-card reveal" data-priority="12"><div class="feature-icon green" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-bot"></use></svg></div><span class="feature-num">12</span><h3>اتصال بات روبیکا و مدیریت پیام‌ها</h3><p>بات روبیکا را به مجیک وصل کن، پیام‌ها را در مسیرهای تعریف‌شده دریافت کن و پاسخ‌های مناسب را اجرا کن.</p><div class="chips"><span>Rubika Bot</span><span>پیام‌ها</span><span>پاسخ‌گویی</span></div></article>
<article class="feature-card glow-card reveal" data-priority="13"><div class="feature-icon cyan" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-users"></use></svg></div><span class="feature-num">13</span>

<h3>ذخیره اطلاعات و وضعیت هر مخاطب</h3><p>اطلاعات، علایق و وضعیت هر مخاطب را نگه دار تا گفتگو و پیگیری شخصی‌تر شود.</p>
<div class="chips"><span>اطلاعات</span><span>وضعیت</span><span>دسته‌بندی</span><span>پروفایل</span></div>
</article>
<article class="feature-card glow-card reveal" data-priority="14"><div class="feature-icon warm" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-brain"></use></svg></div><span class="feature-num">14</span><h3>بلوک Google AI و Gemini</h3><p>در جریان‌ساز از Gemini برای تحلیل پیام، تولید پاسخ، استخراج اطلاعات و تصمیم‌گیری استفاده کن؛ خروجی را با متغیرهای قابل استفاده به نود بعدی وصل کن و تنظیمات ورودی و خروجی صوتی را در سناریوهای پشتیبانی‌شده به کار بگیر.</p></article>
<article class="feature-card glow-card reveal" data-priority="15"><div class="feature-icon orange" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-link"></use></svg></div><span class="feature-num">15</span><h3><a href="#channel-mcp">اتصال به ChatGPT و Claude با Magic MCP</a></h3><p>دستیار سازگار را به ابزارهای مجاز مجیک وصل کن؛ آمار و اطلاعات قابل‌دسترسی را بخوان، گفتگوها و جریان‌ها را بررسی کن و محتوای موردنیاز را آماده کن. عملیات تغییردهنده فقط با دسترسی و تأیید لازم انجام می‌شود.</p></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="16"><div class="feature-icon violet" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-bot"></use></svg></div><span class="feature-num">16</span><h3>ربات هوشمند و منشی پاسخ‌گو</h3><p>یک ربات پاسخ‌گو برای پرسش‌های پرتکرار، دریافت اطلاعات، راهنمایی مخاطب و ارجاع درخواست‌های خاص به اپراتور بساز.</p><div class="chips"><span>پاسخ‌گویی</span><span>دریافت اطلاعات</span><span>راهنمایی</span><span>ارجاع انسانی</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="17"><div class="feature-icon green" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-sheet"></use></svg></div><span class="feature-num">17</span><h3>نود Google Sheets در جریان‌ساز</h3><p>در جریان‌ها ردیف جدید ثبت کن، ردیف‌های موجود را با کلید دلخواه پیدا کن و ستون‌هایشان را به‌روزرسانی کن؛ نتیجهٔ چند ردیف را به‌صورت متغیر متنی یا JSON به نود AI و مراحل بعدی بده.</p></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="18"><div class="feature-icon pink" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-send"></use></svg></div><span class="feature-num">18</span><h3><a href="#channel-planner">انتشار محتوا در کانال تلگرام</a></h3><p>متن، تصویر و محتوای آماده را به کانال متصل بفرست؛ برای اطلاع‌رسانی و معرفی محصول از انتشار فوری استفاده کن.</p><div class="chips"><span>کانال تلگرام</span><span>متن و تصویر</span><span>انتشار فوری</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="19"><div class="feature-icon violet" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-calendar"></use></svg></div><span class="feature-num">19</span><h3>زمان‌بندی پست‌های کانال تلگرام</h3><p>برای محتوای کانال زمان تعیین کن، پیش‌نمایش را بررسی کن و وضعیت انتشار را از پلنر دنبال کن.</p><div class="chips"><span>زمان‌بندی</span><span>پیش‌نمایش</span><span>پلنر</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="20"><div class="feature-icon warm" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-send"></use></svg></div><span class="feature-num">20</span><h3>انتشار و زمان‌بندی در کانال بله</h3><p>کانال بله را به مقصدهای انتشار اضافه کن و اطلاعیه‌ها و محتوای آماده را فوری یا زمان‌بندی‌شده منتشر کن.</p><div class="chips"><span>کانال بله</span><span>انتشار</span><span>زمان‌بندی</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="21"><div class="feature-icon violet" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-send"></use></svg></div><span class="feature-num">21</span><h3><a href="#channel-planner">انتشار محتوا در کانال روبیکا</a></h3><p>متن، تصویر و لینک را پیش‌نمایش بگیر و برای کانال روبیکا فوری یا در زمان دلخواه منتشر کن.</p><div class="chips"><span>کانال روبیکا</span><span>تصویر</span><span>لینک</span><span>زمان‌بندی</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="22"><div class="feature-icon green" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-headset"></use></svg></div><span class="feature-num">22</span><h3>ارجاع گفتگو به اپراتور انسانی</h3><p>هرجا تصمیم یا پیگیری انسانی لازم است، گفتگو را به مسئول مربوط بسپار و ادامه فرایند را منظم نگه دار.</p><div class="chips"><span>اپراتور</span><span>ارجاع</span><span>پیگیری</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="23"><div class="feature-icon orange" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-telegram"></use></svg></div><span class="feature-num">23</span>

<h3>اتصال تلگرام به جریان اینستاگرام</h3><p>ارسال پیام و لید به تلگرام و ادامه زنده پاسخ‌گویی در جریان‌های دارای Telegram Live Reply Bridge.</p>
<div class="chips"><span>تلگرام</span><span>اینستاگرام</span><span>Live Reply</span><span>پاسخ زنده</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="24"><div class="feature-icon green" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-layers"></use></svg></div><span class="feature-num">24</span>

<h3>تشخیص متن، صوت، تصویر و ویدیو</h3><p>تفکیک ورودی متن، صوت، تصویر، ویدیو و فایل برای هدایت به مسیر مناسب.</p>
<div class="chips"><span>متن</span><span>صوت</span><span>تصویر</span><span>ویدیو</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="25"><div class="feature-icon violet" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-message"></use></svg></div><span class="feature-num">25</span>

<h3>پاسخ خودکار به کامنت</h3><p>تشخیص کامنت هدف و اجرای پاسخ، دایرکت یا ادامه جریان بر اساس قانون تعریف‌شده.</p>
<div class="chips"><span>کلمه کلیدی</span><span>پاسخ</span><span>دایرکت</span><span>قانون</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="26"><div class="feature-icon cyan" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-route"></use></svg></div><span class="feature-num">26</span>

<h3>مسیر متفاوت برای هر نوع گفتگو</h3><p>ساخت چند جریان مستقل برای پیام‌های ورودی و هدایت هر گفتگو به مسیر مناسب.</p>
<div class="chips"><span>پیام ورودی</span><span>کلیدواژه</span><span>مسیر مستقل</span><span>گفتگو</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="27"><div class="feature-icon warm" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-mail"></use></svg></div><span class="feature-num">27</span>

<h3>پاسخ به استوری و منشن</h3><p>ساخت مسیرهای مجزا برای پاسخ استوری، منشن و رویدادهای تعاملی قابل پشتیبانی.</p>
<div class="chips"><span>استوری</span><span>منشن</span><span>رویداد</span><span>پاسخ</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="28"><div class="feature-icon orange" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-branch"></use></svg></div><span class="feature-num">28</span>

<h3>تصمیم‌گیری بر اساس پاسخ مخاطب</h3><p>بر اساس جواب یا وضعیت مخاطب، ادامه گفتگو را به مسیر مناسب هدایت کن.</p>
<div class="chips"><span>پاسخ مخاطب</span><span>مسیر بله</span><span>مسیر خیر</span><span>شرط دلخواه</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="29"><div class="feature-icon cyan" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-layers"></use></svg></div><span class="feature-num">29</span>

<h3>فرآیندهای چندمرحله‌ای قابل استفاده مجدد</h3><p>فرآیندهای تکراری را یک‌بار بساز و در مسیرهای مختلف دوباره استفاده کن.</p>
<div class="chips"><span>فرایند</span><span>قابل استفاده مجدد</span><span>انتقال داده</span><span>بازگشت</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="30"><div class="feature-icon warm" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-mouse"></use></svg></div><span class="feature-num">30</span>

<h3>کارت و دکمه تعاملی</h3><p>ارسال کارت‌های تصویری و دکمه‌های انتخاب برای ساخت تجربه هدایت‌شده در گفتگو.</p>
<div class="chips"><span>کارت</span><span>دکمه</span><span>انتخاب</span><span>اقدام</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="31"><div class="feature-icon orange" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-usersearch"></use></svg></div><span class="feature-num">31</span>

<h3>ادامه مسیر بر اساس دنبال‌کردن پیج</h3><p>بررسی دنبال‌کردن حساب و ادامه مسیر بر اساس نتیجه بررسی کاربر.</p>
<div class="chips"><span>بررسی</span><span>دنبال‌کردن</span><span>تأیید</span><span>ادامه</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="32"><div class="feature-icon cyan" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-timer"></use></svg></div><span class="feature-num">32</span>

<h3>پیگیری زمان‌بندی‌شده</h3><p>ادامه خودکار فرایند با تأخیر و پیگیری مخاطب در زمان تعیین‌شده.</p>
<div class="chips"><span>تأخیر</span><span>پیگیری</span><span>زمان</span><span>ادامه</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="33"><div class="feature-icon warm" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-template"></use></svg></div><span class="feature-num">33</span>

<h3>الگوهای آماده برای شروع سریع</h3><p>با الگوهای آماده شروع کن و آن‌ها را متناسب با کسب‌وکارت شخصی‌سازی کن.</p>
<div class="chips"><span>الگو</span><span>شروع سریع</span><span>ویرایش</span><span>ذخیره</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="34"><div class="feature-icon orange" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-play"></use></svg></div><span class="feature-num">34</span>

<h3>تست مسیر قبل از فعال‌سازی</h3><p>قبل از فعال‌کردن، مسیر را اجرا کن و مطمئن شو تجربه مخاطب درست پیش می‌رود.</p>
<div class="chips"><span>تست</span><span>شبیه‌سازی</span><span>مرحله</span><span>نتیجه</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="35"><div class="feature-icon cyan" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-shield"></use></svg></div><span class="feature-num">35</span>

<h3>بررسی آماده‌بودن اتوماسیون</h3><p>کنترل خطاها، هشدارها و پیشنهادهای ساختاری قبل از فعال‌سازی جریان.</p>
<div class="chips"><span>خطا</span><span>هشدار</span><span>بررسی</span><span>آمادگی</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="36"><div class="feature-icon warm" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-copy"></use></svg></div><span class="feature-num">36</span>

<h3>انتقال و نسخه‌برداری از مسیرها</h3><p>یک مسیر آماده را برای نسخه پشتیبان، انتقال یا استفاده دوباره ذخیره و بازیابی کن.</p>
<div class="chips"><span>نسخه پشتیبان</span><span>انتقال</span><span>استفاده دوباره</span><span>بازیابی</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="37"><div class="feature-icon orange" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-layout"></use></svg></div><span class="feature-num">37</span>

<h3>مرتب‌سازی خودکار مسیرهای گفتگو</h3><p>مسیرهای بزرگ را خودکار مرتب کن تا روند گفتگو خوانا و قابل مدیریت بماند.</p>
<div class="chips"><span>مرتب‌سازی</span><span>مسیرهای بزرگ</span><span>نمای واضح</span><span>مدیریت ساده</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="38"><div class="feature-icon cyan" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-chart"></use></svg></div><span class="feature-num">38</span>

<h3>گزارش اجرای اتوماسیون</h3><p>نمایش اجراها، خطاها، عملکرد مسیرها و رفتار دکمه‌ها برای بررسی اتوماسیون.</p>
<div class="chips"><span>اجرا</span><span>خطا</span><span>دکمه</span><span>گزارش</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="39"><div class="feature-icon warm" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-usersearch"></use></svg></div><span class="feature-num">39</span>

<h3>پروفایل مخاطب کنار تاریخچه گفتگو</h3><p>با بازکردن هر گفتگو، مشخصات و هویت مخاطب، سابقهٔ پیام‌ها، تگ‌ها و اطلاعات CRM را در همان فضای کاری ببین تا برای شناخت و پیگیری مشتری بین چند صفحه جابه‌جا نشوی.</p>
<div class="chips"><span>صندوق گفتگو</span><span>پاسخ زنده</span><span>تاریخچه</span><span>رسانه</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="40"><div class="feature-icon orange" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-mic"></use></svg></div><span class="feature-num">40</span>

<h3>پاسخ هوشمند صوتی در دایرکت</h3><p>پیام صوتی و ویس ورودی را در جریان هوشمند پردازش کن و در صورت فعال بودن Voice AI، پاسخ هوشمند را به‌صورت صوتی یا متنی برگردان.</p>
<div class="chips"><span>ارسال صوت</span><span>دریافت صوت</span><span>پخش</span><span>پاسخ</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="41"><div class="feature-icon cyan" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-send"></use></svg></div><span class="feature-num">41</span>

<h3>انتشار فوری محتوا</h3><p>ارسال محتوای آماده به مسیر انتشار بدون نیاز به جابه‌جایی بین ابزارهای جداگانه.</p>
<div class="chips"><span>پست</span><span>ریلز</span><span>استوری</span><span>انتشار</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="42"><div class="feature-icon warm" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-image"></use></svg></div><span class="feature-num">42</span>

<h3>طراحی و ویرایش تصویر</h3><p>افزودن متن، شکل، لایه، تصویر، استیکر و تنظیمات ظاهری روی خروجی محتوا.</p>
<div class="chips"><span>لایه</span><span>متن</span><span>شکل</span><span>استیکر</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="43"><div class="feature-icon orange" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-text"></use></svg></div><span class="feature-num">43</span>

<h3>ساخت و بازنویسی کپشن</h3><p>تولید یا بازنویسی کپشن فارسی و انتقال مستقیم آن همراه محتوای آماده انتشار.</p>
<div class="chips"><span>کپشن</span><span>بازنویسی</span><span>لحن</span><span>انتقال</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="44"><div class="feature-icon cyan" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-route"></use></svg></div><span class="feature-num">44</span>

<h3>انتقال مستقیم به انتشار</h3><p>بازگشت خروجی استودیو به پنجره انتشار همراه مدیا و کپشن آماده ادامه کار.</p>
<div class="chips"><span>مدیا</span><span>کپشن</span><span>بازگشت</span><span>انتشار</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="45"><div class="feature-icon warm" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-users"></use></svg></div><span class="feature-num">45</span>

<h3>مدیریت حساب‌های اینستاگرام</h3><p>افزودن، انتخاب و مدیریت حساب فعال برای استفاده در بخش‌های مختلف پنل.</p>
<div class="chips"><span>حساب</span><span>انتخاب فعال</span><span>مدیریت</span><span>اتصال</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="46"><div class="feature-icon orange" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-library"></use></svg></div><span class="feature-num">46</span>

<h3>کتابخانه و وضعیت محتوا</h3><p>مشاهده محتوای آماده، پیش‌نویس، زمان‌بندی‌شده و منتشرشده در یک ساختار مدیریتی.</p>
<div class="chips"><span>محتوا</span><span>پیش‌نویس</span><span>زمان‌بندی</span><span>وضعیت</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="47"><div class="feature-icon cyan" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-message"></use></svg></div><span class="feature-num">47</span>

<h3>گفتگو با هوش مصنوعی</h3><p>تعامل متنی و صوتی با هوش مصنوعی داخل پنل برای دریافت پاسخ و اجرای سناریوهای هوشمند.</p>
<div class="chips"><span>متن</span><span>صوت</span><span>هوش مصنوعی</span><span>پاسخ</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="48"><div class="feature-icon warm" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-wallet"></use></svg></div><span class="feature-num">48</span>

<h3>کنترل مصرف ابزارهای هوش مصنوعی</h3><p>مدیریت مصرف سرویس‌های هوش مصنوعی با اعتبار مجیک و کنترل موجودی کاربر.</p>
<div class="chips"><span>مجیک</span><span>مصرف</span><span>اعتبار</span><span>کنترل</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="49"><div class="feature-icon orange" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-audio"></use></svg></div><span class="feature-num">49</span>

<h3>پردازش ویس و پاسخ صوتی AI</h3><p>تشخیص پیام صوتی ورودی، پردازش با هوش مصنوعی و امکان برگرداندن پاسخ به‌صورت Voice یا متن.</p>
<div class="chips"><span>ویس</span><span>Speech-to-Text</span><span>Voice AI</span><span>پاسخ صوتی</span></div>
</article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="50"><div class="feature-icon warm" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-compass"></use></svg></div><span class="feature-num">50</span><h3><a href="#magic-guide">راهنمای تعاملی مجیک</a></h3><p>با تورهای مرحله‌به‌مرحلهٔ داخل پنل، اتصال حساب، آماده‌سازی اولین انتشار و ساخت جریان هوشمند را یاد بگیر؛ راهنما متناسب با همان صفحه و ابزار، نکته‌ها و مسیر بعدی را نشان می‌دهد.</p></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="51"><div class="feature-icon violet" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-story"></use></svg></div><span class="feature-num">51</span><h3>نمایش محتوای پیج و استوری‌ویوئر</h3><p>استوری‌های فعال، ریلزها، پست‌ها و کاروسل‌ها را در تب‌های جدا ببین؛ پیش‌نمایش محتوا، تاریخ انتشار و شاخص‌های در دسترس را کنار هر آیتم بررسی کن و استوری را در نمایشگر تمام‌صفحه مرور کن.</p><div class="chips"><span>Stories</span><span>Reels</span><span>Posts</span><span>Carousels</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="52"><div class="feature-icon cyan" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-chartpie"></use></svg></div><span class="feature-num">52</span><h3>مرکز آمار تفکیکی Profile+</h3><p>بازهٔ ۲۴ ساعت، ۷ روز یا ۳۰ روز را انتخاب کن و آمار همهٔ محتوا، Story، Reels یا Feed را جدا ببین: Views، Reach، Total Interactions، Likes، Comments، Shares، Saves و نرخ تقریبی تعامل به Reach.</p><div class="chips"><span>24h · 7d · 30d</span><span>Views</span><span>Reach</span><span>Interactions</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="53"><div class="feature-icon pink" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-users"></use></svg></div><span class="feature-num">53</span><h3>مدیریت کامل CRM مخاطبان</h3><p>برای هر مخاطب نام دلخواه، ایمیل، تلفن، شرکت و شهر ثبت کن؛ مرحلهٔ لید تا مشتری یا VIP، منبع جذب، اولویت، یادداشت و زمان پیگیری بعدی را در پروفایل همان گفتگو نگه دار.</p><div class="chips"><span>CRM</span><span>Lead</span><span>VIP</span><span>Follow-up</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="54"><div class="feature-icon cyan" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-filter"></use></svg></div><span class="feature-num">54</span><h3>جست‌وجو و فیلتر گفتگوها</h3><p>گفتگوها را بر اساس شبکه و اکانت فیلتر کن و با نام نمایشی، نام کاربری، تگ و اطلاعات CRM پیدا کن؛ فیلترهای خوانده‌نشده، آرشیو و مرحلهٔ مشتری را به کار ببر. جست‌وجوی متن خود پیام‌ها از طریق ابزار Messenger Inbox در Magic MCP در دسترس است.</p><div class="chips"><span>Search</span><span>Unread</span><span>Archived</span><span>CRM</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="55"><div class="feature-icon green" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-mail"></use></svg></div><span class="feature-num">55</span><h3>پاسخ مستقیم متنی و رسانه‌ای به پیام‌رسان‌ها</h3><p>در گفتگوهای بات‌های متصل تلگرام، بله و روبیکا، پاسخ متنی یا رسانه‌ای ارسال کن؛ فایل‌های تصویری، ویدیویی و صوتی پشتیبانی‌شده را با کنترل نوع و حجم بفرست و نتیجهٔ ارسال را در تاریخچهٔ گفتگو نگه دار.</p><div class="chips"><span>Telegram</span><span>Bale</span><span>Rubika</span><span>Media Reply</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="56"><div class="feature-icon violet" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-cloud"></use></svg></div><span class="feature-num">56</span><h3>اتصال ایمن Google Workspace</h3><p>حساب Google را از مسیر OAuth متصل کن و Google Sheets و Drive را به‌صورت اختصاصی برای همان کاربر در اختیار جریان‌ساز قرار بده؛ دسترسی Drive فقط به فایل‌هایی محدود است که خودت انتخاب کرده‌ای.</p><div class="chips"><span>Google OAuth</span><span>Sheets</span><span>Drive</span><span>Owner-scoped</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="57"><div class="feature-icon green" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-sheet"></use></svg></div><span class="feature-num">57</span><h3>نود Google Sheets؛ ثبت، جست‌وجو و به‌روزرسانی</h3><p>در جریان‌ها ردیف جدید ثبت کن، ردیف‌های موجود را با کلید دلخواه پیدا کن و ستون‌هایشان را به‌روزرسانی کن؛ نتیجهٔ چند ردیف را به‌صورت متغیر متنی یا JSON به نود AI و مراحل بعدی بده.</p><div class="chips"><span>Append</span><span>Lookup</span><span>Update</span><span>Multi-row</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="58"><div class="feature-icon orange" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-folder"></use></svg></div><span class="feature-num">58</span><h3>انتخاب و مدیریت فایل‌های Google Drive</h3><p>از Google Picker فایل یا شیت مشخص را انتخاب کن؛ نوع، مالک، آخرین ویرایش و مجوزهای واقعی فایل را ببین و فقط در صورت داشتن اجازه، آن را باز یا دانلود کن.</p><div class="chips"><span>Drive Picker</span><span>File Details</span><span>Permissions</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="59"><div class="feature-icon cyan" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-globe"></use></svg></div><span class="feature-num">59</span><h3>آدرس اختصاصی فروشگاه روی زیردامنه</h3><p>برای هر فروشگاه شناسهٔ یکتای ۵ تا ۸ حرفی انتخاب کن تا ویترین عمومی روی نشانی اختصاصی مانند yourname.magics.site در دسترس باشد؛ مسیر فروشگاه به همان مالک متصل می‌ماند.</p><div class="chips"><span>magics.site</span><span>Wildcard</span><span>Unique Slug</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="60"><div class="feature-icon pink" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-palette"></use></svg></div><span class="feature-num">60</span><h3>۹ قالب آماده برای طراحی ویترین</h3><p>از میان ۹ چیدمان فروشگاه انتخاب کن و ظاهر ویترین را با تصویر جلد، گالری محصول، ترتیب نمایش محصولات و تنظیمات قالب هماهنگ با هویت برندت تنظیم کن.</p><div class="chips"><span>9 Templates</span><span>Theme Preview</span><span>Branding</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="61"><div class="feature-icon violet" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-package"></use></svg></div><span class="feature-num">61</span><h3>کاتالوگ محصول و مدیریت موجودی</h3><p>محصول‌ها را با نام، توضیح، قیمت، کد و تصویر ثبت کن؛ موجودی کالاهای فیزیکی را مدیریت کن تا فروش از ویترین و سفارش‌های گفتگو به یک کاتالوگ مشترک متصل بماند.</p><div class="chips"><span>Products</span><span>SKU</span><span>Stock</span><span>Gallery</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="62"><div class="feature-icon cyan" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-image"></use></svg></div><span class="feature-num">62</span><h3>صفحهٔ اختصاصی محصول و گالری رسانه</h3><p>برای هر محصول صفحهٔ جزئیات مستقل بساز؛ عکس‌ها و ویدئوهای گالری، توضیحات، مشخصات و قیمت را نمایش بده و لینک مستقیم محصول را از ویترین برای مشتری بفرست.</p><div class="chips"><span>Product Page</span><span>Image Gallery</span><span>Video</span><span>SEO</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="63"><div class="feature-icon green" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-cart"></use></svg></div><span class="feature-num">63</span><h3>سبد خرید و ثبت سفارش در ویترین</h3><p>مشتری از فروشگاه عمومی محصول‌ها را به سبد اضافه کند، تعداد و اطلاعات ارسال را وارد کند، کد تخفیف و هزینهٔ ارسال را ببیند و سفارش را با جمع‌بندی نهایی ثبت کند.</p><div class="chips"><span>Storefront</span><span>Cart</span><span>Checkout</span><span>Receipt</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="64"><div class="feature-icon orange" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-cart"></use></svg></div><span class="feature-num">64</span><h3>سبد خرید هوشمند در دایرکت</h3><p>در Flow Builder محصول را به سبد مخاطب اضافه یا تعدادش را تغییر بده؛ سبد را نمایش بده، تخفیف و روش ارسال را اعمال کن، اطلاعات خریدار را ثبت کن و پس از تأیید مشتری سفارش بساز.</p><div class="chips"><span>Smart Direct</span><span>DM Cart</span><span>Shipping</span><span>Checkout</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="65"><div class="feature-icon cyan" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-truck"></use></svg></div><span class="feature-num">65</span><h3>مدیریت تأمین‌کنندگان و روش‌های ارسال</h3><p>اطلاعات تأمین‌کنندگان را جداگانه ثبت و ویرایش کن و روش‌های ارسال دستی داخل ایران را با محدودهٔ استان و شهر، هزینهٔ ثابت و شرط ارسال رایگان تعریف کن؛ گزینهٔ مناسب را هنگام ثبت سفارش و محاسبهٔ هزینهٔ ارسال نمایش بده.</p><div class="chips"><span>Suppliers</span><span>Shipping Methods</span><span>City Rules</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="66"><div class="feature-icon violet" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-package"></use></svg></div><span class="feature-num">66</span><h3>کنترل موجودی، ارسال و مرجوعی سفارش</h3><p>موجودی سفارش‌های فعال به‌صورت رزرو‌شده کنترل می‌شود؛ وضعیت بسته‌بندی، ارسال، تحویل یا مرجوعی را ثبت کن و نام شرکت حمل، کد و لینک رهگیری را دستی نگه دار. درخواست مرجوعی، بازگشت موجودی و ثبت استرداد را از پنل پیگیری کن.</p><div class="chips"><span>Stock Holds</span><span>Tracking</span><span>Returns</span><span>Audit</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="67"><div class="feature-icon pink" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-ticket"></use></svg></div><span class="feature-num">67</span><h3>کد تخفیف و کمپین‌های فروش</h3><p>کدهای تخفیف را با محدودیت زمانی، تعداد مصرف و قوانین اعتبار تعریف کن؛ مبلغ تخفیف و جمع نهایی سفارش سمت سرور محاسبه می‌شود تا قیمت ارسالی مرورگر مبنای محاسبه نباشد.</p><div class="chips"><span>Coupons</span><span>Usage Limits</span><span>Discount</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="68"><div class="feature-icon green" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-creditcard"></use></svg></div><span class="feature-num">68</span><h3>آداپتور پرداخت زرین‌پال؛ غیرفعال به‌صورت پیش‌فرض</h3><p>آداپتور زرین‌پال در کد موجود است، اما درگاه برای فروشگاه‌ها به‌صورت پیش‌فرض خاموش است. فعال‌سازی واقعی نیازمند شناسهٔ پذیرنده، تنظیم اختصاصی فروشگاه و تکمیل تست‌های Sandbox و Production است؛ تا آن زمان سفارش فقط در وضعیت «در انتظار پرداخت» ثبت می‌شود.</p><div class="chips"><span>Zarinpal</span><span>Optional Gateway</span><span>Server Verification</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="69"><div class="feature-icon violet" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-wand"></use></svg></div><span class="feature-num">69</span><h3>ویترین سه‌زبانهٔ فارسی، انگلیسی و عربی</h3><p>فروشگاه عمومی را به فارسی، انگلیسی یا عربی نمایش بده؛ عنوان‌ها، صفحهٔ محصول، گالری، سبد خرید، فرم ثبت سفارش و پیام‌های وضعیت سفارش متناسب با زبان انتخاب‌شدهٔ بازدیدکننده ارائه می‌شوند.</p><div class="chips"><span>Product AI</span><span>Story</span><span>Carousel</span><span>Caption</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="70"><div class="feature-icon orange" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-branch"></use></svg></div><span class="feature-num">70</span><h3>چند مقصد برای یک دکمه و خروجی مستقیم نود</h3><p>یک دکمه را به حداکثر ۸ مسیر مستقل وصل کن؛ در همان نود هم خروجی مستقیم تعریف کن تا بدون کلیک کاربر اجرا شود و شاخه‌های دکمه فقط پس از انتخاب همان دکمه فعال شوند.</p><div class="chips"><span>Multi-output</span><span>Up to 8 Targets</span><span>Direct Edge</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="71"><div class="feature-icon cyan" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-video"></use></svg></div><span class="feature-num">71</span><h3>انتشار چندمرحله‌ای رسانه در کانال‌ها</h3><p>برای تلگرام، بله و روبیکا پیام چندمرحله‌ای شامل متن، تصویر، ویدئو، صوت، سند یا آلبوم بساز؛ ترتیب رسانه، کپشن و دکمهٔ لینک را در پیش‌نویس و پلنر مدیریت کن.</p><div class="chips"><span>Text</span><span>Image</span><span>Video</span><span>Audio</span><span>Album</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="72"><div class="feature-icon green" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-chart"></use></svg></div><span class="feature-num">72</span><h3>گزارش عملکرد Smart Direct با Magic MCP</h3><p>برای جریان‌های Smart Direct اینستاگرام، از طریق ابزار گزارش Magic MCP اجراهای موفق و ناموفق، مخاطبان یکتا و تفکیک هر جریان را بخوان؛ نمایش و Postback دکمه‌های تعاملی را از نمایش، کلیک و نرخ کلیک لینک‌های خروجی جداگانه بررسی کن.</p><div class="chips"><span>Executions</span><span>Unique Contacts</span><span>Button CTR</span><span>Link Clicks</span></div></article>
<article class="feature-card glow-card reveal feature-extra" hidden data-priority="73"><div class="feature-icon violet" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><use href="#feature-icon-usersearch"></use></svg></div><span class="feature-num">73</span><h3>جست‌وجوی متن پیام‌ها و مخاطبان با Magic MCP</h3><p>در ابزار Messenger Inbox از طریق Magic MCP، متن پیام‌ها و اطلاعات مخاطبان یک اکانت متصل را جست‌وجو کن؛ دامنهٔ جست‌وجو را روی پیام‌ها، مخاطبان یا هر دو بگذار و نتایج را بر اساس جهت پیام و بازهٔ زمانی محدود کن.</p><div class="chips"><span>Magic MCP</span><span>Message Search</span><span>Contacts</span><span>Date & Direction</span></div></article>
</div><div class="feature-more-wrap"><button class="btn btn-ghost feature-more-btn" id="previewFeaturesToggle" aria-controls="featureGrid" aria-expanded="false" type="button" data-more="مشاهده بیشتر" data-less="نمایش کمتر"><span>مشاهده بیشتر</span><b>＋</b></button></div></div>
</section>
<section class="section-pad studio-publisher-section" id="studio-publisher">
<div class="shell split split-wide product-pair-block">
<div class="showcase-copy reveal">
<div class="eyebrow"><span class="warm-dot"></span> استودیوی هوشمند</div>
<h2>از ایده تا محتوای آماده انتشار، در یک مسیر</h2>
<p>ایده را وارد کن، تصویر، ویدیو یا کپشن را آماده کن و خروجی را مستقیم به بخش انتشار بفرست؛ بدون دانلود و انتقال دستی بین چند ابزار.</p>
<div class="studio-points"><span>ساخت تصویر با هوش مصنوعی</span><span>ساخت ویدیو</span><span>تولید و بازنویسی کپشن</span><span>طراحی روی تصویر</span><span>کتابخانه محتوای شما</span><span>ارسال مستقیم برای انتشار</span></div>
</div>
<div class="studio-demo glow-card reveal delay-1">
<div class="studio-toolbar"><div><span class="brand-spark">✦</span><p><b>استودیوی هوشمند</b><small>محیط ساخت و آماده‌سازی محتوا</small></p></div><div class="studio-tabs" id="studioTabs"><button class="active" data-tab="image">تصویر</button><button data-tab="caption">کپشن</button><button data-tab="video">ویدیو</button></div></div>
<div class="studio-workspace">
<aside class="asset-rail"><button class="active">✦<span>هوش</span></button><button>▧<span>رسانه</span></button><button>Т<span>متن</span></button><button>◇<span>شکل</span></button></aside>
<div class="studio-canvas">
<div class="canvas-checker"></div>
<div class="studio-output" id="studioOutput"><span class="msm-mini-logo">MSM</span><h3>اتوماسیون،<br/>هوشمندتر از همیشه</h3><p>Magic Super Manager</p><i class="design-ring r1"></i><i class="design-ring r2"></i></div>
<span class="selection-box"><i></i><i></i><i></i><i></i></span>
</div>
<aside class="studio-panel">
<small id="studioPanelKicker">ساخت تصویر با هوش مصنوعی</small><h4 id="studioPanelTitle">ساخت تصویر</h4>
<label>پرامپت<textarea id="studioPrompt" rows="5">پوستر حرفه‌ای برای معرفی اتوماسیون اینستاگرام، مینیمال و پرمیوم</textarea></label>
<div class="mini-select-row"><button>1:1</button><button class="active">4:5</button><button>9:16</button></div>
<button class="generate-btn" id="generateBtn">✦ ساخت نمونه</button>
<button class="send-publisher" id="sendPublisherBtn">ارسال به انتشارگر ←</button>
<div class="studio-toast" id="studioToast">خروجی به انتشارگر منتقل شد ✓</div>
</aside>
</div>
</div>
</div><div class="shell split reverse product-pair-block">
<div class="publisher-demo glow-card reveal">
<div class="panel-bar"><div><span class="brand-spark cyan-bg">↗</span><p><b>انتشارگر</b><small>تقویم و صف انتشار</small></p></div><span class="status-pill"><i></i> آماده انتشار</span></div>
<div class="publisher-layout">
<div class="calendar-card">
<div class="calendar-head"><button>‹</button><div><b>مهر ۱۴۰۵</b><small>برنامه محتوایی</small></div><button>›</button></div>
<div class="weekdays"><span>ش</span><span>ی</span><span>د</span><span>س</span><span>چ</span><span>پ</span><span>ج</span></div>
<div class="days" id="calendarDays"></div>
</div>
<div class="publish-queue">
<article><div class="thumb thumb-a"><span>ریلز</span></div><div><small>امروز · ۲۰:۳۰</small><b>معرفی قابلیت دایرکت هوشمند</b><p>ویدیو + کپشن + کاور</p></div><span class="queue-state scheduled">زمان‌بندی شد</span></article>
<article><div class="thumb thumb-b"><span>پست</span></div><div><small>فردا · ۱۲:۰۰</small><b>آموزش ساخت اولین جریان هوشمند</b><p>پست + کاروسل</p></div><span class="queue-state ready">آماده</span></article>
<article><div class="thumb thumb-c"><span>استوری</span></div><div><small>فردا · ۱۸:۰۰</small><b>معرفی قابلیت‌های هوشمند</b><p>استوری + دعوت به اقدام</p></div><span class="queue-state draft">پیش‌نویس</span></article>
<button class="publish-now" id="publishNowBtn"><span>⚡</span><div><b>انتشار فوری نمونه</b><small id="publishStatus">برای شبیه‌سازی کلیک کنید</small></div></button>
</div>
</div>
</div>
<div class="showcase-copy reveal delay-1">
<div class="eyebrow"><span class="cyan-dot"></span> انتشارگر</div>
<h2>وقتی محتوا آماده شد، مستقیم منتشرش کن یا زمان بده</h2>
<p>خروجی استودیوی هوشمند همان‌جا وارد بخش انتشار می‌شود؛ مدیا و کپشن آماده‌اند و فقط تصمیم می‌گیری الان منتشر شود یا برای زمان مناسب برنامه‌ریزی شود.</p>
<div class="metric-row"><div><b>Post</b><span>تصویر و کپشن</span></div><div><b>Reel</b><span>ویدیو و کاور</span></div><div><b>Story</b><span>انتشار سریع</span></div></div>
</div>
</div></section><section class="section-pad"><div class="shell"><div class="section-head"><h2>انتشار کانال و پیگیری پیام‌ها</h2></div><div class="preview-pair channel-publishing-pair">
<article class="glow-card preview-story" id="channel-planner"><div class="omni-copy"><span class="omni-kicker"><i aria-hidden="true">◷</i><bdi>Planner</bdi></span><h3>انتشار چندشبکه‌ای</h3><p>برای معرفی محصول، ریلز اینستاگرام و پیام کانال‌ها را در یک پلنر بچین. پس از اتصال ربات و افزودن کانال تلگرام، بله یا روبیکا، مقصد را انتخاب کن و پیش‌نمایش را ببین. پیام را فوری منتشر کن، برای زمان دلخواه برنامه‌ریزی کن یا پیش‌نویس نگه دار.</p></div><div class="omni-demo"><div class="omni-app-head"><b><?= ['fa'=>'نمونهٔ برنامهٔ انتشار','en'=>'Sample publishing schedule','ar'=>'مثال لجدول النشر'][$landingLanguage] ?></b></div><div class="preview-schedule"><?= $landingServiceIcons['telegram'] ?><b><?= $landingServices['telegram'][$landingLanguage][0] ?></b><time>10:00</time></div><div class="preview-schedule"><?= $landingServiceIcons['bale'] ?><b><?= $landingServices['bale'][$landingLanguage][0] ?></b><time>12:30</time></div><div class="preview-schedule"><?= $landingServiceIcons['rubika'] ?><b><?= $landingServices['rubika'][$landingLanguage][0] ?></b><time>18:00</time></div></div></article><article class="glow-card preview-story" id="messenger-inbox"><div class="omni-copy"><span class="omni-kicker"><i aria-hidden="true">✉</i><bdi>Communication+</bdi></span><h3>مرکز ارتباط+</h3><p>پیام‌ها و گفتگوهای ورودی حساب‌های متصل اینستاگرام، تلگرام، بله و روبیکا را در یک صندوق واحد ببین. بر اساس شبکه و اکانت فیلتر کن، گفتگوهای خوانده‌نشده و آرشیوشده را جدا کن و تاریخچهٔ هر گفتگو را کنار اطلاعات مخاطب داشته باش. با جست‌وجوی نام نمایشی، نام کاربری و اطلاعات CRM، گفتگو را پیدا کن و تگ‌ها، فیلدهای اختصاصی، مرحلهٔ مشتری و زمان پیگیری را مدیریت کن.</p><div class="omni-tags"><span>Instagram</span><span>Telegram</span><span>Bale</span><span>Rubika</span><span>CRM</span></div></div><div class="omni-demo omni-inbox-demo"><div class="omni-app-head"><span><?= $landingServiceIcons['instagram'] ?></span><b>Communication+</b><i>Unified Inbox</i></div><div class="omni-inbox-platforms"><span><?= $landingServiceIcons['instagram'] ?> Instagram</span><span><?= $landingServiceIcons['telegram'] ?> Telegram</span><span><?= $landingServiceIcons['bale'] ?> Bale</span><span><?= $landingServiceIcons['rubika'] ?> Rubika</span></div><div class="omni-inbox-rows"><div class="omni-inbox-row"><span class="omni-inbox-mark ig">IG</span><div><b>مخاطب اینستاگرام</b><small>دربارهٔ جزئیات محصول سؤال دارم…</small></div><time>09:41</time></div><div class="omni-inbox-row"><span class="omni-inbox-mark tg">TG</span><div><b>مخاطب تلگرام</b><small>لطفاً وضعیت سفارش را بفرستید.</small></div><time>10:12</time></div><div class="omni-inbox-row"><span class="omni-inbox-mark bale">B</span><div><b>مخاطب بله</b><small>اطلاعات بیشتر دربارهٔ خدمات…</small></div><time>11:06</time></div><div class="omni-inbox-row"><span class="omni-inbox-mark rubika">R</span><div><b>مخاطب روبیکا</b><small>می‌خواستم دربارهٔ سفارش بپرسم.</small></div><time>12:24</time></div></div></div></article>
</div></div></section>
<section class="section-pad feature-showcase" id="smart-direct">
<div class="shell">
<div class="smart-direct-intro reveal">
<div class="showcase-copy">
<div class="eyebrow"><span class="violet-dot"></span> دایرکت هوشمند اینستاگرام + جریان‌ساز</div>
<h2>هر تعامل می‌تواند شروع یک مسیر هوشمند باشد</h2>
<p>دایرکت هوشمند اینستاگرام فراتر از یک ربات دایرکت ساده است؛ یک کامنت، دایرکت یا پاسخ می‌تواند گفتگو را شروع کند، پاسخ خودکار مناسب بفرستد، اطلاعات مخاطب را نگه دارد و مسیر فروش یا پشتیبانی را ادامه دهد. در سناریوهای متصل، می‌توان پیام و لید را به تلگرام فرستاد و ادامه پاسخ‌گویی دایرکت را از پل زنده تلگرام مدیریت کرد.</p>
</div>
<div class="bullet-stack smart-bullets">
<div><span>01</span><p><b>فروش در دایرکت</b><small>از کامنت اولیه تا پیشنهاد و ثبت درخواست</small></p></div>
<div><span>02</span><p><b>پشتیبانی هوشمند</b><small>از سؤال کاربر تا پاسخ یا ارجاع مناسب</small></p></div>
<div><span>03</span><p><b>جذب مخاطب</b><small>از درخواست مشاوره تا ثبت اطلاعات و پیگیری</small></p></div>
</div>
</div>
<div class="flow-demo flow-demo-v2 glow-card reveal delay-1" id="flowDemo">
<div class="panel-bar flow-panel-bar">
<div><span class="brand-spark">✦</span><p><b>جریان‌ساز تصویری</b><small id="flowTitle">جریان فروش و ثبت سفارش</small></p></div>
<div class="flow-toolbar">
<div class="scenario-switch scenario-switch-flow" id="scenarioSwitch">
<button class="active" data-scenario="sales" type="button">فروش</button><button data-scenario="support" type="button">پشتیبانی</button><button data-scenario="lead" type="button">جذب مخاطب</button>
</div>
<button class="flow-play" id="flowPlayBtn" type="button">▶ اجرای مسیر</button>
</div>
</div>
<div class="flow-stage-scroll">
<div class="flow-stage" id="flowStage">
<svg aria-hidden="true" class="flow-lines-v2" id="flowSvg" preserveaspectratio="none" viewbox="0 0 1120 540"></svg>
<div id="flowNodes"></div>
</div>
</div>
<div class="flow-detail-bar" id="nodeInspector">
<div class="inspector-title"><span id="inspectorIcon">◎</span><div><b id="inspectorTitle">شروع جریان</b><p id="inspectorSub">ورود کاربر به سناریوی فعال</p></div></div>
<div class="flow-detail-copy"><small>این مرحله چه کاری می‌کند؟</small><strong id="inspectorInput">کامنت شامل «قیمت»</strong></div>
<div class="flow-run-state"><span class="live-dot"></span><p><b id="flowRunLabel">آماده اجرا</b><small>روی «اجرای مسیر» بزن یا سناریو را تغییر بده</small></p></div>
</div>
</div>
</div>

</section>
<section class="section-pad"><div class="shell"><div class="section-head"><h2>از دایرکت مهمان تا دفتر رزرو</h2></div><div class="preview-pair">
<article class="glow-card preview-story" id="gemini-flow"><div class="omni-copy"><span class="omni-kicker"><i aria-hidden="true">✦</i><bdi>Gemini</bdi></span><h3>بلوک Google AI</h3><p>کلید Google API را روی خود بلوک تنظیم کن. Gemini اطلاعات لازم را طی گفتگو می‌گیرد. با تکمیل هدف، جریان به مرحله‌ای که تعیین کرده‌ای می‌رود و برای درخواست اپراتور هم می‌توانی مسیر جداگانه بچینی.</p></div><div class="omni-demo"><div class="preview-trail"><span>درخواست مهمان</span><span>تأیید اطلاعات</span><span>ارجاع به مسئول رزرو</span></div></div></article><article class="glow-card preview-story" id="sheets-flow"><div class="omni-copy"><span class="omni-kicker"><i aria-hidden="true"><?= $landingServiceIcons['sheets'] ?></i><bdi>Google Sheets</bdi></span><h3>گوگل‌شیت در جریان‌ساز</h3><p>فایل را از Google Drive انتخاب کن و هر پاسخ را به ستون خودش وصل کن. برای درخواست تازه یک ردیف بساز یا با شمارهٔ تماس، درخواست قبلی را پیدا و وضعیتش را به‌روز کن. چند ردیف مرتبط را هم می‌توانی برای تحلیل به بلوک AI بدهی.</p></div><div class="omni-demo"><div class="omni-app-head"><?= $landingServiceIcons['sheets'] ?><b>Google Sheets</b></div><table class="preview-sheet"><thead><tr><th>تاریخ ورود</th><th>تعداد مهمان</th><th>وضعیت رزرو</th></tr></thead><tbody><tr><td>۱۴۰۵/۰۹/۰۵</td><td>۲</td><td><?= ['fa'=>'در انتظار بررسی','en'=>'Pending review','ar'=>'قيد المراجعة'][$landingLanguage] ?></td></tr></tbody></table></div></article>
</div><aside class="glow-card preview-story preview-case"><h3>نمونهٔ جریان رزرو اقامتگاه</h3><ol class="preview-flow"><li>مهمان در دایرکت تاریخ ورود و تعداد نفرات را می‌گوید. Gemini خلاصهٔ درخواست را برای تأیید می‌فرستد.</li><li>پس از تأیید مهمان، بلوک گوگل‌شیت یک ردیف برای درخواست رزرو ثبت می‌کند.</li><li>بلوک تلگرام خلاصهٔ درخواست را برای مسئول رزرو می‌فرستد تا پیگیری کند.</li></ol></aside></div></section>
<section class="section-pad omnichannel-section" id="telegram-voice">
<div class="shell">
<div class="section-head reveal omnichannel-head">
<div class="eyebrow"><span class="cyan-dot"></span> ارتباط هوشمند فراتر از متن</div>
<h2>تلگرام، بله و روبیکا را به مجیک وصل کن</h2>
<p>مجیک دستیار هوشمند مدیر کانال است. ربات هر پیام‌رسان را وصل کن و کانال تلگرام، بله یا روبیکا را به مجیک اضافه کن. برای خبرهای روز انتشار فوری را انتخاب کن و برنامهٔ هفته را از قبل در پلنر بچین.</p>
</div>
<div class="omnichannel-grid">
<article class="omni-card omni-telegram glow-card reveal">
<div class="omni-copy">
<span class="omni-kicker"><?= $landingServiceIcons['telegram'] ?> Telegram ↔ Instagram</span>
<h3>پاسخ دایرکت اینستاگرام از تلگرام</h3>
<p>ربات تلگرام را به مجیک وصل کن و کانال تلگرام را اضافه کن. خبر فوری را همان لحظه در کانال منتشر کن یا پست بعدی را زمان‌بندی کن. در جریان‌های متصل، با Live Reply می‌توانی از تلگرام به دایرکت اینستاگرام هم جواب بدهی.</p>
<div class="omni-tags"><span>اتصال تلگرام به اینستاگرام</span><span>پاسخگویی دایرکت در تلگرام</span><span>پاسخ و پیگیری لید</span></div>
</div>
<div class="omni-demo telegram-demo" aria-label="نمایش نمونه اتصال تلگرام و اینستاگرام">
<div class="omni-app-head"><span class="ig-dot">◎</span><b>Instagram</b><i>دایرکت جدید</i></div>
<div class="omni-message ig-message"><small>@customer</small><p>سلام، شرایط مشاوره چیه؟</p></div>
<div class="omni-bridge"><span></span><b>Live Reply Bridge</b><span></span></div>
<div class="omni-app-head tg-head"><span>➤</span><b>Telegram</b><i>متصل</i></div>
<div class="omni-message tg-message"><small>Magic Bot</small><p>پیام جدید از اینستاگرام</p><button type="button" tabindex="-1">پاسخ از تلگرام ↗</button></div>
</div>
</article>
<article class="omni-card omni-bale glow-card reveal"><div class="omni-copy"><span class="omni-kicker"><?= $landingServiceIcons['bale'] ?> <?= $landingServices['bale'][$landingLanguage][0] ?></span><h3>گفتگوهای بله را از پنل پیگیری کن</h3><p>ربات بله را به مجیک وصل کن و کانال بله را اضافه کن. اطلاعیهٔ امروز را فوری منتشر کن و پیام صوتی فردا را زمان‌بندی کن. اگر مخاطب به ربات پیام داد، سابقه‌اش را در مرکز ارتباط+ ببین و همان‌جا جواب بده.</p></div>
<div class="omni-demo"><div class="omni-app-head"><?= $landingServiceIcons['bale'] ?><b>Communication+</b></div>
<div class="omni-message ig-message"><p>این سفارش هنوز موجوده؟</p></div><div class="omni-message tg-message"><p>بله، برای سفارش راهنمایی‌ات می‌کنم.</p></div></div></article>
<article class="omni-card omni-rubika glow-card reveal"><div class="omni-copy"><span class="omni-kicker"><?= $landingServiceIcons['rubika'] ?> <?= $landingServices['rubika'][$landingLanguage][0] ?></span><h3>انتشار در کانال روبیکا را زمان‌بندی کن</h3><p>ربات روبیکا را وصل کن و کانال روبیکا را به پلنر اضافه کن. عکس محصول، متن و لینک را پیش‌نمایش بگیر. محصول تازه را فوری معرفی کن یا انتشارش را برای ساعت شروع فروش زمان‌بندی کن.</p></div>
<div class="omni-demo"><div class="omni-app-head"><?= $landingServiceIcons['rubika'] ?><b>Rubika</b></div>
<div class="omni-message ig-message"><p>مجموعهٔ تازهٔ کارگاه سفال</p></div><div class="omni-message tg-message"><p>امروز، ساعت ۱۸:۳۰</p></div></div></article>
<article class="omni-card omni-voice glow-card reveal delay-1">
<div class="omni-copy">
<span class="omni-kicker voice-kicker"><i>🎙</i> Voice AI</span>
<h3>پاسخ هوشمند به ویس و صوت در دایرکت</h3>
<p>پیام صوتی ورودی را تشخیص بده، محتوای ویس را برای AI قابل فهم کن و در صورت فعال بودن پاسخ صوتی، جواب هوشمند را دوباره به Voice تبدیل کن.</p>
<div class="omni-tags"><span>پاسخ به ویس در دایرکت</span><span>پشتیبانی هوشمند صوتی</span><span>پاسخ صوتی AI</span></div>
</div>
<div class="omni-demo voice-demo" aria-label="نمایش نمونه پاسخ هوشمند صوتی">
<div class="voice-bubble incoming-voice"><span class="voice-play">▶</span><div class="wave-bars"><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div><small>0:12</small></div>
<div class="voice-ai-step"><span>✦</span><div><b>Magic AI</b><small>ویس را می‌فهمد و پاسخ را می‌سازد</small></div></div>
<div class="voice-bubble outgoing-voice"><span class="voice-play">▶</span><div class="wave-bars"><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div><small>0:09</small></div>
<div class="voice-status"><span></span> پاسخ هوشمند صوتی آماده شد</div>
</div>
</article>
</div>
</div>
</section><section class="section-pad" id="instagram-ai-mcp">
<div class="shell">
<div class="section-head">
<div class="eyebrow"><span class="cyan-dot"></span> اتصال هوشمند اینستاگرام و پیام‌رسان‌ها</div>
<h2>اینستاگرام و پیام‌رسان‌هات رو به ChatGPT و Claude وصل کن</h2>
<p>با Magic MCP، حساب اینستاگرام و بات‌ها و کانال‌های متصل تلگرام، بله و روبیکا را از ChatGPT، Claude یا دستیار سازگار با MCP مدیریت کن. آمار را بررسی کن، پیام‌ها را مرور کن و پیش‌نویس محتوا آماده کن؛ در کنار آن، داخل جریان‌ساز مجیک برای پیام‌رسان‌ها پاسخ‌گویی هوشمند بساز.</p>
</div>
<div class="mcp-landing-grid">
<article class="glow-card mcp-landing-card"><div class="mcp-landing-card-head"><span class="mcp-landing-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 19.5V13m5 6.5V9m5 10.5V5m5 14.5V11"/><path d="m4 8 5-3 5 2 6-4"/></svg></span><span class="mcp-landing-number" aria-hidden="true">01</span></div><h3>تحلیل پیج با ChatGPT و Claude</h3><p>از دستیار بخواه عملکرد پست‌ها و ریلزهای حساب خودت را مقایسه کند یا آمار ذخیره‌شدهٔ اینستاگرام را خلاصه کند. زمان آخرین همگام‌سازی را هم بررسی کن.</p></article>
<article class="glow-card mcp-landing-card is-cyan"><div class="mcp-landing-card-head"><span class="mcp-landing-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="4" y="3" width="14" height="18" rx="2.5"/><path d="M8 8h6M8 12h5M19.5 12v8m-4-4h8"/></svg></span><span class="mcp-landing-number" aria-hidden="true">02</span></div><h3>آماده‌سازی و انتشار محتوا با هوش مصنوعی</h3><p>پیش‌نویس پست، استوری یا ریلز بساز و محتوای آماده را برای انتشار یا زمان‌بندی بررسی کن. انتشار واقعی فقط با دسترسی لازم و تأیید تو انجام می‌شود.</p></article>
<article class="glow-card mcp-landing-card is-rose"><div class="mcp-landing-card-head"><span class="mcp-landing-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 7a3 3 0 0 1 3-3h10a3 3 0 0 1 3 3v7a3 3 0 0 1-3 3h-7l-5 4v-5a3 3 0 0 1-1-2z"/><path d="M8 9h8M8 13h5"/></svg></span><span class="mcp-landing-number" aria-hidden="true">03</span></div><h3>دایرکت، مخاطبان و جریان‌های هوشمند</h3><p>گفتگوهای مجاز را بخوان، اطلاعات مخاطبان را بررسی کن و جریان‌های دایرکت هوشمند را مدیریت کن. ارسال پیام و فعال‌سازی جریان، مجوز و تأیید جداگانه می‌خواهد.</p></article>
<article class="glow-card mcp-landing-card is-green"><div class="mcp-landing-card-head"><span class="mcp-landing-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M5 5h6v6H5zM13 13h6v6h-6zM11 8h2a3 3 0 0 1 3 3v2M8 11v5a3 3 0 0 0 3 3h2"/></svg></span><span class="mcp-landing-number" aria-hidden="true">04</span></div><h3>ساخت جریان‌های هوشمند AI در تلگرام، بله و روبیکا</h3><p>بات هر پیام‌رسان را به مجیک وصل کن و در جریان‌ساز، AI را برای تحلیل پیام، ساخت پاسخ مناسب و انتخاب مرحلهٔ بعد به کار بگیر.</p></article>
<article class="glow-card mcp-landing-card is-orange"><div class="mcp-landing-card-head"><span class="mcp-landing-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3a7 7 0 0 0-7 7v3a3 3 0 0 0 3 3h1v-5H7a5 5 0 0 1 10 0h-2v5h1a3 3 0 0 0 3-3v-3a7 7 0 0 0-7-7Z"/><path d="M9 20h6M12 16v4"/></svg></span><span class="mcp-landing-number" aria-hidden="true">05</span></div><h3>ساخت ربات هوشمند و منشی پاسخ‌گو</h3><p>برای پرسش‌های پرتکرار، دریافت اطلاعات، راهنمایی مشتری و پیگیری درخواست‌ها ربات بساز و موارد نیازمند بررسی را به اپراتور انسانی ارجاع بده.</p></article>
<article class="glow-card mcp-landing-card"><div class="mcp-landing-card-head"><span class="mcp-landing-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m3 11 18-8-8 18-2-8-8-2Z"/><path d="m11 13 4-4"/></svg></span><span class="mcp-landing-number" aria-hidden="true">06</span></div><h3>انتشار محتوا در کانال‌های تلگرام</h3><p>متن، تصویر و محتوای آماده را به کانال متصل بفرست؛ انتشار فوری، پیش‌نویس و زمان‌بندی را از پلنر مدیریت کن.</p></article>
</div>
<article class="glow-card preview-story" id="channel-mcp"><div class="omni-copy"><span class="omni-kicker"><i aria-hidden="true">✧</i><bdi>Magic MCP</bdi></span><h3>دستیار هوشمند برای پیام‌رسان‌ها با Magic MCP</h3><p>از ChatGPT یا Claude بخواه آمار مجاز را خلاصه کند، پیام‌های قابل‌دسترسی را بررسی کند یا پیش‌نویس محتوا برای کانال تلگرام آماده کند. برای ارسال یا انتشار واقعی، دسترسی‌های لازم و تأییدهای مربوط رعایت می‌شود.</p></div><div class="omni-demo"><div class="preview-trail"><span>ChatGPT / Claude</span><span>Magic MCP</span><span>Instagram · Telegram · Bale · Rubika</span></div></div></article>
<div class="mcp-landing-connect">
<div class="mcp-connect-copy"><div class="mcp-connect-heading"><span class="mcp-connect-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m8 7-2 2a4 4 0 0 0 6 6l2-2M16 17l2-2a4 4 0 0 0-6-6l-2 2"/><path d="m9.5 14.5 5-5"/></svg></span><h3>اتصال حساب‌ها و انتخاب مجوزها</h3></div>
<p>اینستاگرام و بات‌های تلگرام، بله و روبیکا را در مجیک متصل کن؛ سپس Magic MCP را در دستیار سازگار اضافه کن، وارد حساب مجیک شو و دسترسی‌های موردنیازت را انتخاب کن. ابزارهای در دسترس به نوع اتصال و مجوزهای حساب بستگی دارند.</p></div>
<div class="mcp-connect-flow" aria-hidden="true"><b>Instagram<br>Telegram · Bale · Rubika</b><i>›</i><b>Magic MCP</b><i>›</i><b>ChatGPT / Claude</b></div>
<div class="mcp-landing-actions"><a class="btn btn-primary" href="https://mcp.magics.site/?lang=<?= $landingLanguage ?>#mcp-connect">راهنمای اتصال ChatGPT و Claude</a>
<a class="btn btn-ghost" href="/help/connect-instagram-without-password/<?= $landingLanguage==='fa'?'':('?lang='.$landingLanguage) ?>">اتصال اینستاگرام بدون دادن رمز به مجیک</a>
<a class="mcp-guide-link" href="/help/connect-instagram-to-chatgpt-claude-mcp/<?= $landingLanguage==='fa'?'':('?lang='.$landingLanguage) ?>"><span><?= htmlspecialchars($landingLanguage==='en'?'Step-by-step: Connect Instagram to ChatGPT or Claude':($landingLanguage==='ar'?'دليل ربط إنستغرام بـ ChatGPT وClaude خطوة بخطوة':'آموزش اتصال اینستاگرام به ChatGPT و Claude، قدم‌به‌قدم'),ENT_QUOTES,'UTF-8') ?></span><span class="mcp-guide-arrow" aria-hidden="true">↗</span></a></div>
</div></div></section>
<section id="shop-plus" class="section-pad omnichannel-section"><div class="shell"><div class="section-head omnichannel-head"><div class="eyebrow"><span class="violet-dot"></span>فروشگاه+</div><h2>فروشگاه خودت را بساز و از هر کانال سفارش بگیر</h2><p>محصول را یک‌بار در کاتالوگ مجیک تعریف کن. مشتری می‌تواند از ویترین خرید کند یا در گفتگوی همان شبکه سفارش بدهد. تو جزئیات سفارش، پرداخت و ارسال را از پنل فروشگاه پیگیری می‌کنی.</p></div>
<div class="ms-show glow-card"><div class="ms-menu" role="group" aria-label="فروشگاه+"><button type="button" aria-pressed="true" aria-controls="ms-pane-0"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m3 10 2-6h14l2 6M4 10v10h16V10M8 20v-6h5v6"/><path d="M3 10q2 4 5 0 4 4 8 0 3 4 5 0"/></svg><span>ویترین</span></button><button type="button" aria-pressed="false" aria-controls="ms-pane-1"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 14a3 3 0 0 1-3 3h-6l-6 4v-4a3 3 0 0 1-2-3V7a3 3 0 0 1 3-3h11a3 3 0 0 1 3 3z"/><path d="M7 9h9M7 12h6"/></svg><span>سفارش در گفتگو</span></button><button type="button" aria-pressed="false" aria-controls="ms-pane-2"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m3 7 9-5 9 5-9 5zM3 7v10l9 5 9-5V7M12 12v10"/></svg><span>پیگیری سفارش</span></button><button type="button" aria-pressed="false" aria-controls="ms-pane-3"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 3v17h17M8 16v-4m5 4V7m5 9v-6"/></svg><span>گزارش فروش</span></button></div>
<article id="ms-pane-0" class="ms-pane"><div class="omni-copy"><span class="omni-kicker"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m3 10 2-6h14l2 6M4 10v10h16V10M8 20v-6h5v6"/><path d="M3 10q2 4 5 0 4 4 8 0 3 4 5 0"/></svg> <bdi>Store+</bdi></span><h3>ویترینی با هویت برندت</h3><p>از میان ۹ قالب، چیدمان فروشگاهت را انتخاب کن. عکس جلد، گالری محصول و قیمت را تنظیم کن و لینک زیردامنهٔ اختصاصی فروشگاه را در بیو یا کانال بگذار. اگر دامنهٔ خودت را داری، می‌توانی آن را به آدرس فروشگاه هدایت کنی.</p></div><div class="ms-demo"><div class="ms-bar"><span>نمونهٔ فروشگاه</span><bdi><?= ['fa'=>'فروشگاه هنگام','en'=>'Hengam Store','ar'=>'متجر هنغام'][$landingLanguage] ?></bdi></div><a class="ms-cart-preview" href="#hengam-cart" aria-label="<?= ['fa'=>'مشاهدهٔ سبد خرید نمونه','en'=>'View sample cart','ar'=>'عرض السلّة التجريبية'][$landingLanguage] ?>"><img class="ms-product-photo" src="/landing-assets/images/hengam-shop-template.webp" width="1200" height="800" loading="lazy" decoding="async" alt="<?= ['fa'=>'قالب فروشگاه هنگام با ویترین محصولات و سبد خرید','en'=>'Hengam storefront with product prices and a cart','ar'=>'واجهة متجر هنغام مع أسعار المنتجات والسلّة'][$landingLanguage] ?>"></a><details id="hengam-cart"><summary><?= ['fa'=>'مشاهدهٔ سبد خرید نمونه','en'=>'View sample cart','ar'=>'عرض السلّة التجريبية'][$landingLanguage] ?></summary><dl><div><dt><?= ['fa'=>'لیوان سفالی','en'=>'Ceramic mug','ar'=>'كوب خزفي'][$landingLanguage] ?></dt><dd><?= ['fa'=>'۳۸۰٬۰۰۰ تومان','en'=>'380,000 toman','ar'=>'380,000 تومان'][$landingLanguage] ?></dd></div><div><dt><?= ['fa'=>'سبد حصیری','en'=>'Woven basket','ar'=>'سلّة منسوجة'][$landingLanguage] ?></dt><dd><?= ['fa'=>'۶۲۰٬۰۰۰ تومان','en'=>'620,000 toman','ar'=>'620,000 تومان'][$landingLanguage] ?></dd></div><div><dt><?= ['fa'=>'جمع سفارش','en'=>'Order total','ar'=>'إجمالي الطلب'][$landingLanguage] ?></dt><dd><?= ['fa'=>'۱٬۰۰۰٬۰۰۰ تومان','en'=>'1,000,000 toman','ar'=>'1,000,000 تومان'][$landingLanguage] ?></dd></div></dl></details></div></article>
<article id="ms-pane-1" class="ms-pane"><div class="omni-copy"><span class="omni-kicker"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 14a3 3 0 0 1-3 3h-6l-6 4v-4a3 3 0 0 1-2-3V7a3 3 0 0 1 3-3h11a3 3 0 0 1 3 3z"/><path d="M7 9h9M7 12h6"/></svg> <bdi>Store+</bdi></span><h3>سفارش‌گیری داخل گفتگو</h3><p>در جریان‌ساز اینستاگرام، تلگرام، بله یا روبیکا، مرحلهٔ سفارش را به کاتالوگ وصل کن. مشتری از دایرکت یا ربات وارد مسیر خرید می‌شود، محصول و تعداد را انتخاب می‌کند و مشخصات سفارش را می‌فرستد.</p><div class="shop-networks"><span>Instagram</span><?php foreach (['telegram','bale','rubika'] as $channel): ?><span><?= $landingServiceIcons[$channel] ?><?= $landingServices[$channel][$landingLanguage][0] ?></span><?php endforeach; ?></div></div><div class="ms-demo"><div class="ms-bar"><span>نمونهٔ فروشگاه</span><bdi>سفارش در گفتگو</bdi></div><div class="ms-chat"><b>Telegram</b><p><?= ['fa'=>'یک لیوان سفالی می‌خواهم.','en'=>'I would like one ceramic mug.','ar'=>'أريد كوباً خزفياً واحداً.'][$landingLanguage] ?></p><p><?= ['fa'=>'یک لیوان سفالی به سبدت اضافه شد.','en'=>'One ceramic mug was added to your cart.','ar'=>'أُضيف كوب خزفي إلى سلّتك.'][$landingLanguage] ?></p></div></div></article>
<article id="ms-pane-2" class="ms-pane"><div class="omni-copy"><span class="omni-kicker"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m3 7 9-5 9 5-9 5zM3 7v10l9 5 9-5V7M12 12v10"/></svg> <bdi>Store+</bdi></span><h3>از سبد خرید تا تحویل</h3><p>مشتری تصاویر محصول را می‌بیند، سبد را تکمیل می‌کند و با روش‌های پرداخت و ارسال فعال فروشگاه سفارش می‌دهد. در پنل، مبلغ، تخفیف، رسید و وضعیت هر سفارش را ببین و مراحل آماده‌سازی و ارسال را پیگیری کن.</p></div><div class="ms-demo"><div class="ms-bar"><span>نمونهٔ فروشگاه</span><bdi>پیگیری سفارش</bdi></div><div class="ms-item"><strong><?= ['fa'=>'لیوان سفالی','en'=>'Ceramic mug','ar'=>'كوب خزفي'][$landingLanguage] ?></strong><bdi>HG–021</bdi></div><ol class="ms-order"><li>سفارش ثبت شد</li><li>در حال آماده‌سازی</li><li>ارسال به مشتری</li></ol></div></article>
<article id="ms-pane-3" class="ms-pane"><div class="omni-copy"><span class="omni-kicker"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 3v17h17M8 16v-4m5 4V7m5 9v-6"/></svg> <bdi>Store+</bdi></span><h3>گزارش سفارش برای مدیر فروشگاه</h3><p>در ادامهٔ جریان سفارش، خلاصهٔ خرید را به پیام‌رسان متصل مدیر بفرست یا شمارهٔ سفارش، کالا، تعداد و مبلغ را در ستون‌های Google Sheets ثبت کن. فایل گزارش را از Google Drive خودت انتخاب کن تا سفارش‌ها در همان فایل جمع شوند.</p></div><div class="ms-demo"><div class="ms-bar"><span>نمونهٔ فروشگاه</span><bdi>گزارش فروش</bdi></div><div class="ms-item"><strong><?= $landingServiceIcons['sheets'] ?> Google Sheets</strong><?= $landingServiceIcons['drive'] ?></div><table><thead><tr><th>سفارش</th><th>تعداد</th><th>کانال</th></tr></thead><tbody><tr><td><bdi>HG–021</bdi></td><td>۱</td><td>Telegram</td></tr></tbody></table></div></article></div></div></section>
<section class="section-pad start-journey-section" id="quick-start">
<div class="shell">
<div class="start-journey-card glow-card reveal">
<div class="start-journey-head">
<div class="start-journey-copy">
<div class="eyebrow"><span class="violet-dot"></span> شروع ساده با Magic</div>
<h2>Magic Super Manager را <span>رایگان امتحان کن</span></h2>
<p>با شماره موبایل یا جیمیلت وارد شو، پیجت را از مسیر رسمی Meta متصل کن و شروع کن.</p>
</div>
<div class="start-trust-panel">
<div><span>✓</span><p><b>اتصال رسمی از مسیر Meta</b><small>دسترسی از طریق اپلیکیشن رسمی، بدون دریافت رمز پیج</small></p></div>
<div><span>⚡</span><p><b>شروع سریع و ساده</b><small>اتصال پیج و ورود به پنل بدون پیچیدگی فنی</small></p></div>
<div><span>✦</span><p><b>همه‌چیز در یک مسیر</b><small>محتوا، انتشار، گفتگو و مخاطب کنار هم</small></p></div>
</div>
</div>
<div class="start-journey-steps">
<article class="start-step"><span class="step-no">۰۱</span><i>⌁</i><h3>پیجت را متصل کن</h3><p>از مسیر رسمی Instagram / Meta حساب موردنظرت را به پنل وصل کن.</p></article>
<article class="start-step is-cyan"><span class="step-no">۰۲</span><i>✦</i><h3>یک جریان هوشمند بساز</h3><p>یک سناریوی ساده برای کامنت، دایرکت یا پاسخ مخاطب آماده کن.</p></article>
<article class="start-step is-pink"><span class="step-no">۰۳</span><i>◈</i><h3>با هوش مصنوعی تست کن</h3><p>یک دایرکت واقعی را امتحان کن و پاسخ‌گویی هوشمند را ببین.</p></article>
<article class="start-step is-warm"><span class="step-no">۰۴</span><i>▧</i><h3>محتوا بساز</h3><p>تصویر، ویدیو یا کپشن را در همان محیط آماده کن.</p></article>
<article class="start-step is-green"><span class="step-no">۰۵</span><i>↗</i><h3>منتشر یا زمان‌بندی کن</h3><p>خروجی آماده را مستقیم منتشر کن یا برای زمان مناسب در صف بگذار.</p></article>
<article class="start-step is-blue"><span class="step-no">۰۶</span><i>◎</i><h3>نتیجه را برای کسب‌وکارت ببین</h3><p>فروش، پشتیبانی و ارتباط با مخاطب را در یک سیستم واقعی امتحان کن.</p></article>
</div>
<div class="start-journey-bottom">
<div class="start-message">
<span class="start-message-icon">✦</span>
<div><b>اینستاگرام قرار نیست فقط یک پیج باشه.</b><p>می‌تونه یک سیستم فروش، پشتیبانی و ارتباط با مشتری باشه. اگر به کارت اومد ادامه بده؛ اگر نه، چیزی رو از دست ندادی.</p></div>
</div>
<div class="start-actions">
<a class="btn btn-primary" href="https://go.magics.site/login<?= $landingLanguage==='fa'?'':('?lang='.$landingLanguage) ?>"><span>رایگان شروع کن</span><b>←</b></a>
<a class="btn btn-ghost" href="#demo"><span class="play-dot">▶</span> دموی زنده را ببین</a>
<div class="start-notes"><span>بدون پیچیدگی</span><i></i><span>بدون تعهد اولیه</span><i></i><span>شروع سریع</span></div>
</div>
</div>
</div>
<article id="magic-guide" class="mg-strip glow-card"><div class="mg-title"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 5q5-1 9 2 4-3 9-2v14q-5-1-9 2-4-3-9-2zM12 7v14"/></svg><h3>راهنمای تعاملی مجیک</h3></div><a class="mg-all" href="/help/<?= $landingLanguage==='fa'?'':('?lang='.$landingLanguage) ?>">همهٔ آموزش‌ها <span aria-hidden="true">↗</span></a><p>برای اولین انتشار یا ساخت جریان، آموزش مربوط را باز کن. داخل پنل هم راهنمای مجیک قدم‌به‌قدم همراهت است.</p><div class="mg-links"><a href="/help/schedule-vs-publish-now/<?= $landingLanguage==='fa'?'':('?lang='.$landingLanguage) ?>">انتشار فوری یا زمان‌بندی<span aria-hidden="true">↗</span></a><a href="/help/flow-builder-basics/<?= $landingLanguage==='fa'?'':('?lang='.$landingLanguage) ?>">آموزش ساخت اولین جریان<span aria-hidden="true">↗</span></a></div></article></div>
</section>
<section class="section-pad faq-section" id="faq-start">
<div class="shell narrow">
<div class="section-head reveal">
<div class="eyebrow"><span class="violet-dot"></span> سوال‌های متداول</div>
<h2>قبل از شروع، این‌ها را بدان</h2>
<p>چند جواب کوتاه برای سوال‌هایی که معمولاً قبل از ساخت اولین جریان هوشمند پیش می‌آید.</p>
</div>
<div class="faq premium-faq" id="faq">
<article><button type="button"><span>چطور اینستاگرام و پیام‌رسان‌ها را به ChatGPT و Claude وصل کنم؟</span><i>＋</i></button><div><p>اینستاگرام و بات‌های تلگرام، بله و روبیکا را در مجیک متصل کن. سپس Magic MCP را در ChatGPT یا Claude سازگار اضافه کن، با حساب مجیک وارد شو و مجوزهای موردنیازت را انتخاب کن. دستیار فقط به امکاناتی دسترسی دارد که برای حساب تو فعال و مجاز شده‌اند.</p></div></article>
<article><button type="button"><span>آیا این امکانات فقط برای اینستاگرام است؟</span><i>＋</i></button><div><p>خیر. علاوه بر اینستاگرام، بات‌ها و کانال‌های تلگرام، بله و روبیکا هم در مجیک پشتیبانی می‌شوند. امکانات هر شبکه به نوع اتصال و مجوزهای همان حساب بستگی دارد.</p></div></article>
<article><button type="button"><span>آیا می‌توانم با هوش مصنوعی برای تلگرام، بله و روبیکا ربات پاسخ‌گو بسازم؟</span><i>＋</i></button><div><p>بله. بات موردنظر را به مجیک وصل کن و در جریان‌ساز از بلوک‌های AI استفاده کن تا پیام را تحلیل کند، پاسخ مناسب بدهد و در صورت نیاز درخواست را به اپراتور انسانی ارجاع دهد.</p></div></article>
<article class="open"><button type="button"><span>آیا برای استفاده نیاز به دانش فنی دارم؟</span><i>＋</i></button><div><p>نه. بخش زیادی از سیستم با جریان‌های هوشمند و تنظیمات قابل ساخت و مدیریت است و برای شروع لازم نیست برنامه‌نویس باشی.</p></div></article>
<article><button type="button"><span>می‌تونم جریان هوشمند مخصوص کسب‌وکار خودم بسازم؟</span><i>＋</i></button><div><p>بله. منطق و مسیر تعامل را می‌توانی متناسب با سناریوی کسب‌وکارت طراحی و شخصی‌سازی کنی؛ از فروش و جذب مخاطب تا پشتیبانی و پیگیری.</p></div></article>
<article><button type="button"><span>آیا فقط برای فروشگاه‌هاست؟</span><i>＋</i></button><div><p>خیر. می‌توان از سیستم برای فروش، لیدگیری، پشتیبانی، خدمات، املاک، تولیدکنندگان محتوا و سناریوهای مختلف ارتباط با مخاطب استفاده کرد.</p></div></article>
<article><button type="button"><span>آیا هوش مصنوعی خودش با مشتری صحبت می‌کند؟</span><i>＋</i></button><div><p>بله. می‌توانی پاسخ‌گویی، تحلیل پیام و جمع‌آوری اطلاعات موردنیاز را در جریان‌های هوشمند مبتنی بر هوش مصنوعی تعریف کنی.</p></div></article>
<article><button type="button"><span>آیا می‌توانم تیمم را هم وارد فرآیند کنم؟</span><i>＋</i></button><div><p>بله. در سناریوهای مربوط به مخاطب و لید می‌توان مسیر ارجاع به نیروی انسانی را تعریف کرد تا در نقطه مناسب، ادامه گفتگو به تیم سپرده شود.</p></div></article>
<article><button type="button"><span>چطور شروع کنم؟</span><i>＋</i></button><div><p>وارد پنل شو، رایگان شروع کن و اولین جریان هوشمند خودت را بساز. بعد می‌توانی محتوا، انتشار و گفتگوهای خودکار را قدم‌به‌قدم به همان سیستم اضافه کنی.</p></div></article>
<article><button type="button"><span>مرکز ارتباط+ چه شبکه‌هایی را یکجا نمایش می‌دهد؟</span><i>＋</i></button><div><p>گفتگوهای حساب‌های متصل اینستاگرام، تلگرام، بله و روبیکا در یک صندوق یکپارچه نمایش داده می‌شوند. می‌توانی گفتگوها را بر اساس شبکه، اکانت، خوانده‌نشده و آرشیو فیلتر کنی و مشخصات و اطلاعات CRM مخاطب را کنار تاریخچهٔ گفتگو ببینی.</p></div></article>
<article><button type="button"><span>پروفایل+ چه آمارهایی را نمایش می‌دهد؟</span><i>＋</i></button><div><p>پروفایل+ آمار حساب و محتوا را نمایش می‌دهد؛ از دنبال‌کنندگان و تعداد محتوا تا Views، Reach، تعامل، لایک، کامنت، اشتراک‌گذاری، ذخیره و نرخ تعامل در بازه‌های ۲۴ ساعت، ۷ روز و ۳۰ روز و تفکیک Story، Reels و Feed. دسترس‌پذیری هر شاخص به داده‌ای بستگی دارد که Meta برای آن نوع محتوا ارائه می‌کند.</p></div></article>
<article><button type="button"><span>آیا مجیک فروشگاه‌ساز چندکاناله برای اینستاگرام، تلگرام، بله و روبیکا دارد؟</span><i>＋</i></button><div><p>بله. می‌توانی یک ویترین عمومی با زیردامنه اختصاصی و یکی از ۹ قالب آماده بسازی. محصولات را در کاتالوگ مشترک ثبت کن و سفارش‌ها را از ویترین یا جریان‌های دایرکت و ربات‌های متصل بگیر؛ مدیریت موجودی و پیگیری سفارش‌ها از پنل انجام می‌شود.</p></div></article>
<article><button type="button"><span>چطور برای تلگرام، بله و روبیکا پاسخ‌گوی هوشمند بسازم؟</span><i>＋</i></button><div><p>بات هر پیام‌رسان را به مجیک وصل کن و در جریان‌ساز برای آن مسیر پاسخ‌گویی بساز. بلوک‌های هوش مصنوعی پیام را پردازش می‌کنند و می‌توانند پاسخ متناسب بدهند یا گفتگو را به اپراتور انسانی ارجاع دهند.</p></div></article>
<article><button type="button"><span>اتصال Google Drive و Google Sheets در مجیک چه کاربردی دارد؟</span><i>＋</i></button><div><p>حساب Google را با OAuth متصل کن، فایل موردنیاز را از Google Drive انتخاب کن و در جریان‌ساز از نود Google Sheets برای ثبت پاسخ‌ها، جست‌وجوی ردیف قبلی و به‌روزرسانی اطلاعات مخاطب یا سفارش استفاده کن. دسترسی Drive به فایل‌هایی محدود است که خودت انتخاب کرده‌ای.</p></div></article>
<article><button type="button"><span>آیا می‌توانم انتشار محتوا در اینستاگرام، تلگرام، بله و روبیکا را یکجا مدیریت کنم؟</span><i>＋</i></button><div><p>بله. در پلنر مقصدهای انتشار را مدیریت کن؛ برای کانال‌های تلگرام، بله و روبیکا می‌توانی پیام چندرسانه‌ای را پیش‌نویس نگه داری، فوری منتشر کنی یا زمان‌بندی کنی. امکانات هر مقصد به نوع حساب و دسترسی API همان شبکه بستگی دارد.</p></div></article>
</div>
<div class="faq-final-cta reveal">
<div><span>✦</span><p><b>آماده‌ای اولین جریان هوشمندت را بسازی؟</b><small>چند دقیقه برای شروع کافیه.</small></p></div>
<a class="btn btn-primary" href="https://go.magics.site/login<?= $landingLanguage==='fa'?'':('?lang='.$landingLanguage) ?>"><span>رایگان شروع کن</span><b>←</b></a>
</div>
</div>
</section>


<section class="section-pad final-cta-section" id="start">
<div class="shell">
<div class="final-cta-card glow-card reveal">
<span class="final-spark">✦</span>
<div>
<h2>رایگان شروع کن</h2>
<p>پیجت را متصل کن و اولین اتوماسیونت را بساز.</p>
</div>
<div class="final-cta-actions">
<a class="btn btn-primary" href="https://go.magics.site/login<?= $landingLanguage==='fa'?'':('?lang='.$landingLanguage) ?>"><span>رایگان شروع کن</span><b>←</b></a>
<a class="btn btn-ghost" href="#demo"><span class="play-dot">▶</span> دموی زنده را ببین</a>
</div>
</div>
</div>
</section>
<section class="section-pad contact-section" id="contact">
<div class="shell">
<div class="section-head reveal contact-section-head">
<div class="eyebrow"><span class="cyan-dot"></span> ارتباط مستقیم</div>
<h2>سؤالی داری؟ مستقیم با ما در ارتباط باش.</h2>
<p>پیامت را همین‌جا بفرست؛ درخواست مستقیماً به تلگرام ما می‌رسد. برای ارتباط سریع‌تر هم می‌توانی از تلگرام، واتساپ یا تماس مستقیم استفاده کنی.</p>
</div>
<div class="contact-premium-grid">
<form class="contact-form-card glow-card reveal" id="contactForm" novalidate>
<div class="contact-card-head">
<span class="contact-card-icon">✦</span>
<div><b>پیام مستقیم</b><small>معمولاً سریع‌ترین راه برای شروع گفتگو</small></div>
</div>
<div class="contact-form-grid">
<label class="contact-field"><span>نام / مجموعه</span><input autocomplete="name" maxlength="120" name="name" placeholder="نام یا نام مجموعه" required></label>
<label class="contact-field"><span>شماره موبایل یا ایمیل</span><input autocomplete="email" maxlength="160" name="contact" placeholder="راه ارتباطی با شما" required></label>
<label class="contact-field contact-field-wide"><span>موضوع پیام</span><select name="need" required><option value="product_question">سؤال درباره Magic Super Manager</option><option value="getting_started">راهنمای شروع و اتصال پیج</option><option value="collaboration">همکاری یا پیشنهاد</option><option value="other">سایر</option></select></label>
<label class="contact-field contact-field-wide"><span>پیام شما</span><textarea maxlength="2500" name="message" placeholder="کوتاه بگو چه چیزی نیاز داری یا چه سؤالی داری…" required></textarea></label>
<label class="contact-honeypot" aria-hidden="true"><span>Website</span><input autocomplete="off" name="website" tabindex="-1"></label>
<input name="lang" type="hidden" value="<?= $landingLanguage ?>">
</div>
<div class="contact-form-bottom">
<p class="contact-form-status" id="contactFormStatus" aria-live="polite"></p>
<button class="btn btn-primary contact-submit-btn" id="contactSubmitBtn" type="submit"><span>ارسال پیام</span><b>←</b></button>
</div>
</form>
<div class="contact-methods reveal">
<a class="contact-method-card telegram" href="https://t.me/MagicsLine" rel="noopener" target="_blank">
<span class="contact-method-icon" aria-hidden="true">➤</span><div><small>تلگرام</small><b>@MagicsLine</b><p>گفتگوی مستقیم در تلگرام</p></div><i>↗</i>
</a>
<a class="contact-method-card whatsapp" href="https://wa.me/<?= $landingWhatsappNumber ?>" rel="noopener" target="_blank">
<span class="contact-method-icon" aria-hidden="true">◉</span><div><small>واتساپ</small><b dir="ltr"><?= $landingLanguage==='fa'?'0935 455 4125':$landingContactNumber ?></b><p>ارسال پیام در واتساپ</p></div><i>↗</i>
</a>
<a class="contact-method-card phone" href="tel:<?= $landingContactNumber ?>">
<span class="contact-method-icon" aria-hidden="true">☎</span><div><small>تماس مستقیم</small><b dir="ltr"><?= $landingLanguage==='fa'?'09354554125':$landingContactNumber ?></b><p>برای تماس، روی این باکس بزن</p></div><i>←</i>
</a>
<div class="contact-method-note glow-card"><span>✦</span><p><b>یک مسیر، چند راه ارتباطی</b><small>هر روشی که راحت‌تری انتخاب کن؛ پیام فرم هم بدون نمایش اطلاعات فنی، مستقیم از سمت سرور ارسال می‌شود.</small></p></div>
</div>
</div>
</div>
</section></main>
<?php $landingFooterStandalone = false; ob_start(); require __DIR__ . '/shared/landing-footer.php';
// Keep language navigation inside this preview.
echo (string)ob_get_clean(); ?>
<script>
window.MSM_LANDING_LANG=<?= json_encode($landingLanguage) ?>;
window.MSM_LANDING_DICT=<?= json_encode($landingTranslations,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_HEX_TAG|JSON_HEX_AMP|JSON_HEX_APOS|JSON_HEX_QUOT) ?>;
</script>
<script>
/* Landing i18n: presentation only. Persian source and existing demos stay intact. */
(()=>{
 'use strict';
 const language=String(window.MSM_LANDING_LANG||'fa');
 const dict=window.MSM_LANDING_DICT||{};
 if(language==='fa')return;
 // Existing page markup has already been translated on the server for SEO
 // and first paint. Observe ONLY newly rendered demo messages and statuses.
 const escapes=s=>[...s].map(ch=>'.?*+^$[](){}|\\'.includes(ch)?String.fromCharCode(92)+ch:ch).join('');
 const keys=Object.keys(dict).filter(key=>key.length>=3 && /[\u0600-\u06ff]/.test(key))
  .sort((a,b)=>b.length-a.length);
 const phrases=new RegExp(keys.map(escapes).join('|'),'g');
 const translate=s=>{
  if(typeof s!=='string'||!/[\u0600-\u06ff]/.test(s))return s;
  const translated=Object.prototype.hasOwnProperty.call(dict,s)?dict[s]:s.replace(phrases,token=>dict[token]||token);
  const digits=language==='en'?'0123456789':'٠١٢٣٤٥٦٧٨٩';
  return translated.replace(/[۰-۹]/g,d=>digits['۰۱۲۳۴۵۶۷۸۹'.indexOf(d)]);
 };
 const ignore=new Set(['SCRIPT','STYLE','TEXTAREA','NOSCRIPT','INPUT','SELECT','OPTION','SVG']);
 function translateText(node){
  if(node.nodeType!==3 || ignore.has(node.parentElement?.tagName))return;
  const old=node.nodeValue||'';
  const next=translate(old);
  if(next!==old)node.nodeValue=next;
 }
 const translatedAttributes=['aria-label','title','placeholder','alt'];
 function translateAttributes(element){
  if(element.nodeType!==1||ignore.has(element.tagName))return;
  for(const attr of translatedAttributes){
   if(!element.hasAttribute(attr))continue;
   const original=element.getAttribute(attr)||'';
   const translated=translate(original);
   if(translated!==original)element.setAttribute(attr,translated);
  }
 }
 function scan(element){
  if(element.nodeType===3){translateText(element);return}
  if(element.nodeType!==1||ignore.has(element.tagName))return;
  translateAttributes(element);
  element.querySelectorAll('[aria-label],[title],[placeholder],[alt]').forEach(translateAttributes);
  const walker=document.createTreeWalker(element,NodeFilter.SHOW_TEXT);
  let node;
  while((node=walker.nextNode()))translateText(node);
 }
 // No rewriting links, structure, user input or the working animations.
 const observer=new MutationObserver(records=>{
  for(const mutation of records){
   if(mutation.type==='characterData')translateText(mutation.target);
   else if(mutation.type==='attributes')translateAttributes(mutation.target);
   else for(const child of mutation.addedNodes)scan(child);
  }
 });
 observer.observe(document.body,{subtree:true,characterData:true,childList:true,attributes:true,attributeFilter:translatedAttributes});
 scan(document.body);
 window.MSM_LANDING_TRANSLATE=translate;
})();

</script>
<script src="/landing-assets/js/header.js?v=1.0.0" defer></script>
<script src="/landing-assets/js/config.js?v=43.0.0"<?= ($magicPerfLabInline || $magicPerfLabCritical) ? ' defer' : '' ?>></script>
<script src="/landing-assets/js/app.js?v=43.0.3-usecases"<?= ($magicPerfLabInline || $magicPerfLabCritical) ? ' defer' : '' ?>></script>
<script src="/landing-assets/js/analytics.js?v=43.0.0" defer></script>
<?php if($landingLanguage==='fa'): ?>
<?php if ($magicPerfLabIdle): ?>
<script>
/* Isolated test: defer only the noncritical third-party support widget. */
(() => {
  let attached = false;
  const attach = () => {
    if (attached) return;
    attached = true;
    const script = document.createElement('script');
    script.src = 'https://ai.magics.site/support-embed.js?v=hf28212';
    script.dataset.brain = 'msm-landing-guide';
    script.dataset.site = 'magics-go';
    script.dataset.mode = 'floating';
    script.dataset.theme = 'auto';
    script.dataset.label = 'سؤالی داری؟ از من بپرس ✦';
    document.body.appendChild(script);
  };
  window.addEventListener('load', () => {
    window.setTimeout(() => {
      if ('requestIdleCallback' in window) {
        window.requestIdleCallback(attach, {timeout: 750});
      } else {
        attach();
      }
    }, 1900);
  }, {once: true});
})();
</script>
<?php else: ?>
<script
  src="https://ai.magics.site/support-embed.js?v=hf28212"<?= ($magicPerfLabInline || $magicPerfLabCritical) ? ' defer' : '' ?>
  data-brain="msm-landing-guide"
  data-site="magics-go"
  data-mode="floating"
  data-theme="auto"
  data-label="سؤالی داری؟ از من بپرس ✦">
</script>
<?php endif; ?>
<?php endif; ?>
<!-- Localized structured data for each public landing locale. -->
<?php
$landingSchemaLanguage = $landingLanguage === 'fa' ? 'fa-IR' : $landingLanguage;
$landingSchemaCanonical = 'https://go.magics.site/'.($landingLanguage === 'fa' ? '' : '?lang='.$landingLanguage);
$landingSchemaLocalesJson = <<<'MAGIC_LANDING_SCHEMA_LOCALES'
{"en":{"subCategory":"Instagram management, messaging automation and multichannel commerce","features":["Automated conversation workflows","Unified Communication+ inbox","AI-powered message analysis and replies","Instagram content publishing and scheduling","Telegram, Bale and Rubika channel publishing","Multichannel storefront and shared product catalog","Customer relationship management and conversation history","Google Drive file selection","Google Sheets row lookup and updates","Reusable multi-step subflows","Voice message processing and AI voice replies","Image and caption creation with Smart Studio","Human-agent handoff","Audience and profile analytics","Order, inventory and shipping management","Interactive cards and buttons","Comment and Story reply automation","Multi-network publishing planner","Dedicated storefront subdomains and nine ready-made themes","Magic MCP integration with ChatGPT and Claude"],"faq":[{"q":"How do I connect Instagram and messaging apps to ChatGPT and Claude?","a":"Connect your Instagram account and Telegram, Bale and Rubika bots to Magic. Add Magic MCP to a compatible ChatGPT or Claude client, sign in with your Magic account, and grant only the permissions you need. The assistant can access only features enabled and authorized for your account."},{"q":"Is Magic limited to Instagram?","a":"No. In addition to Instagram, Magic supports Telegram, Bale and Rubika bots and channels. Available features depend on the connection type and permissions of each account."},{"q":"Can I build AI-powered bots for Telegram, Bale and Rubika?","a":"Yes. Connect the bot to Magic, create a workflow in Flow Builder, and use AI blocks to analyze messages, prepare replies and hand conversations to a human agent when needed."},{"q":"Do I need technical skills to use Magic?","a":"No. You can configure and manage most operations through visual workflows and settings. You do not need to write code to get started."},{"q":"Can I create workflows for my own business?","a":"Yes. Design the interaction logic and steps around your business needs, from sales and lead capture to customer support and follow-up."},{"q":"Is Magic only for online stores?","a":"No. Magic can support sales, lead generation, customer service, professional services, real estate, creators and many other audience-engagement workflows."},{"q":"Can AI reply to customers automatically?","a":"Yes. Configure AI-powered workflows to analyze incoming messages, collect the information you need and send replies according to your rules."},{"q":"Can I involve my team in conversations?","a":"Yes. Add a human handoff step so a team member can take over a conversation whenever personal attention is needed."},{"q":"How do I get started?","a":"Sign in to the dashboard and start for free. Create your first smart workflow, then add content creation, publishing and automated conversations step by step."},{"q":"Which networks appear in Communication+?","a":"Communication+ brings conversations from connected Instagram, Telegram, Bale and Rubika accounts into one inbox. Filter by network, account, read status or archive, and view CRM details alongside conversation history."},{"q":"What does Profile+ analytics show?","a":"Profile+ displays account and content metrics such as followers, views, reach, interactions, likes, comments, shares and saves across supported time ranges and content types. Metric availability depends on the data Meta provides."},{"q":"Does Magic include a multichannel store builder?","a":"Yes. Create a public storefront on a dedicated subdomain and choose one of nine templates. Add products to a shared catalog, accept orders from the storefront or connected messaging flows, and manage inventory and orders from the dashboard."},{"q":"How do I build an AI responder for Telegram, Bale and Rubika?","a":"Connect each platform bot to Magic and create a reply workflow in Flow Builder. AI blocks process incoming messages and can generate a suitable reply or hand the conversation to a human agent."},{"q":"What can Google Drive and Google Sheets integrations do?","a":"Connect your Google account with OAuth, select a file from Google Drive, and use the Google Sheets block to add responses, find existing rows and update customer or order data. Drive access is limited to files you select."},{"q":"Can I manage publishing across Instagram, Telegram, Bale and Rubika in one place?","a":"Yes. Manage publishing destinations in Planner. For Telegram, Bale and Rubika channels, keep multimedia messages as drafts, publish immediately or schedule them. Available options depend on each network's account type and API permissions."}]},"ar":{"subCategory":"إدارة إنستغرام وأتمتة المراسلات والتجارة متعددة القنوات","features":["تدفقات آلية للمحادثات","صندوق وارد موحد في مركز التواصل+","تحليل الرسائل والردود بالذكاء الاصطناعي","نشر محتوى إنستغرام وجدولته","النشر في قنوات تيليغرام وBale وRubika","واجهة متجر متعددة القنوات وكتالوج منتجات موحد","إدارة علاقات العملاء وسجل المحادثات","اختيار الملفات من Google Drive","البحث عن الصفوف وتحديثها في Google Sheets","مسارات فرعية متعددة الخطوات قابلة لإعادة الاستخدام","معالجة الرسائل الصوتية والردود الصوتية بالذكاء الاصطناعي","إنشاء الصور والنصوص باستخدام Smart Studio","إحالة المحادثة إلى موظف","إحصاءات الجمهور والحساب","إدارة الطلبات والمخزون والشحن","بطاقات وأزرار تفاعلية","الرد الآلي على التعليقات والقصص","مخطط نشر متعدد الشبكات","متاجر على نطاقات فرعية مخصصة وتسعة قوالب جاهزة","تكامل Magic MCP مع ChatGPT وClaude"],"faq":[{"q":"كيف أربط إنستغرام وتطبيقات المراسلة بـ ChatGPT وClaude؟","a":"اربط حساب إنستغرام وبوتات تيليغرام وBale وRubika بمجيك. ثم أضف Magic MCP إلى ChatGPT أو Claude المتوافق، وسجّل الدخول بحساب مجيك، واختر الأذونات التي تحتاج إليها فقط. لا يصل المساعد إلا إلى الميزات المفعّلة والمصرّح بها لحسابك."},{"q":"هل يقتصر مجيك على إنستغرام؟","a":"لا. يدعم مجيك، إلى جانب إنستغرام، بوتات وقنوات تيليغرام وBale وRubika. وتعتمد الميزات المتاحة على نوع الاتصال والأذونات الخاصة بكل حساب."},{"q":"هل يمكنني إنشاء بوتات ذكاء اصطناعي لتيليغرام وBale وRubika؟","a":"نعم. اربط البوت المطلوب بمجيك، ثم أنشئ مساراً في منشئ التدفقات واستخدم وحدات الذكاء الاصطناعي لتحليل الرسائل وصياغة الردود وإحالة المحادثة إلى موظف عند الحاجة."},{"q":"هل أحتاج إلى مهارات تقنية لاستخدام مجيك؟","a":"لا. يمكنك إعداد معظم العمليات وإدارتها من خلال التدفقات الذكية والإعدادات المرئية، ولا تحتاج إلى كتابة التعليمات البرمجية للبدء."},{"q":"هل يمكنني إنشاء تدفقات تناسب نشاطي التجاري؟","a":"نعم. صمّم منطق التفاعل وخطواته بما يناسب عملك، من المبيعات وجمع العملاء المحتملين إلى الدعم والمتابعة."},{"q":"هل مجيك مخصص للمتاجر فقط؟","a":"لا. يمكنك استخدامه للمبيعات وجمع العملاء المحتملين والدعم والخدمات والعقارات وصنّاع المحتوى ومختلف حالات التواصل مع الجمهور."},{"q":"هل يستطيع الذكاء الاصطناعي التحدث مع العملاء تلقائياً؟","a":"نعم. يمكنك إعداد التدفقات الذكية لتحليل الرسائل وجمع المعلومات المطلوبة وإرسال ردود تلقائية وفق القواعد التي تحددها."},{"q":"هل يمكنني إشراك فريقي في المحادثات؟","a":"نعم. يمكنك إضافة خطوة لإحالة المحادثة إلى موظف، كي يتولى أحد أعضاء الفريق المتابعة عندما يتطلب الأمر تدخلاً بشرياً."},{"q":"كيف أبدأ باستخدام مجيك؟","a":"سجّل الدخول إلى اللوحة وابدأ مجاناً، ثم أنشئ أول تدفق ذكي. بعد ذلك أضف المحتوى والنشر والردود الآلية تدريجياً."},{"q":"ما الشبكات التي يعرضها مركز التواصل+؟","a":"يعرض مركز التواصل+ محادثات حسابات إنستغرام وتيليغرام وBale وRubika المتصلة في صندوق موحد. يمكنك تصفية المحادثات حسب الشبكة والحساب وحالة القراءة والأرشفة، مع عرض بيانات العميل وسجل المحادثة."},{"q":"ما الإحصاءات التي يعرضها Profile+؟","a":"يعرض Profile+ بيانات الحساب والمحتوى، مثل المتابعين والمشاهدات والوصول والتفاعل والإعجابات والتعليقات والمشاركات والحفظ، مع فترات زمنية وأنواع محتوى مختلفة. وتعتمد إتاحة كل مؤشر على البيانات التي توفرها Meta."},{"q":"هل يوفر مجيك منشئ متجر متعدد القنوات؟","a":"نعم. يمكنك إنشاء واجهة متجر عامة على نطاق فرعي خاص واختيار أحد تسعة قوالب. أضف المنتجات إلى كتالوج موحد واستقبل الطلبات من المتجر أو من تدفقات الرسائل والبوتات المتصلة، ثم أدر المخزون والطلبات من اللوحة."},{"q":"كيف أنشئ مساعداً ذكياً لتيليغرام وBale وRubika؟","a":"اربط بوت كل منصة بمجيك، ثم أنشئ له مسار رد في منشئ التدفقات. تعالج وحدات الذكاء الاصطناعي الرسائل وتولّد الردود المناسبة أو تحيل المحادثة إلى موظف."},{"q":"ما فائدة ربط Google Drive وGoogle Sheets بمجيك؟","a":"اربط حساب Google عبر OAuth، واختر الملف المطلوب من Google Drive، ثم استخدم وحدة Google Sheets في التدفق لإضافة الردود والبحث عن صفوف وتحديث بيانات العملاء أو الطلبات. يقتصر الوصول إلى Drive على الملفات التي تختارها."},{"q":"هل يمكنني إدارة النشر على إنستغرام وتيليغرام وBale وRubika من مكان واحد؟","a":"نعم. استخدم المخطط لإدارة وجهات النشر. ويمكنك الاحتفاظ بالرسائل متعددة الوسائط كمسودات أو نشرها فوراً أو جدولتها لقنوات تيليغرام وBale وRubika. وتعتمد الميزات المتاحة لكل وجهة على نوع الحساب وصلاحيات واجهة API الخاصة بالشبكة."}]}}
MAGIC_LANDING_SCHEMA_LOCALES;
$landingSchemaLocales = json_decode($landingSchemaLocalesJson, true, 512, JSON_THROW_ON_ERROR);
$landingSchemaBaseJson = <<<'MAGIC_LANDING_SCHEMA_BASE'
{"@context":"https://schema.org","@graph":[{"@type":"Organization","@id":"https://magics.site/#organization","name":"Magics","url":"https://magics.site/","logo":{"@type":"ImageObject","url":"https://go.magics.site/assets/images/magic-super-manager-light.webp"},"sameAs":["https://t.me/MagicsLine"],"contactPoint":[{"@type":"ContactPoint","telephone":"+989354554125","contactType":"customer support","availableLanguage":["fa"]}]},{"@type":"WebSite","@id":"https://go.magics.site/#website","url":"https://go.magics.site/","name":"Magic Super Manager","inLanguage":"fa-IR","publisher":{"@id":"https://magics.site/#organization"}},{"@type":"WebPage","@id":"https://go.magics.site/#webpage","url":"https://go.magics.site/","name":"مدیریت اینستاگرام و پیام‌رسان‌ها | فروشگاه‌ساز مجیک","description":"اینستاگرام، تلگرام، بله و روبیکا را یکجا مدیریت کن؛ فروشگاه‌ساز چندکاناله، پاسخ‌گوی هوشمند، مرکز ارتباط+ و اتصال Google Drive و Google Sheets با هوش مصنوعی.","inLanguage":"fa-IR","isPartOf":{"@id":"https://go.magics.site/#website"},"about":{"@id":"https://go.magics.site/#software"},"primaryImageOfPage":{"@type":"ImageObject","url":"https://go.magics.site/landing-assets/images/msm-social-preview.jpg","width":1200,"height":630},"dateModified":"2026-11-23","keywords":["مدیریت اینستاگرام","فروشگاه‌ساز چندکاناله","فروشگاه‌ساز اینستاگرام","فروشگاه‌ساز تلگرام","فروشگاه‌ساز بله","فروشگاه‌ساز روبیکا","پاسخگوی هوشمند تلگرام","پاسخگوی هوشمند بله","پاسخگوی هوشمند روبیکا","مرکز ارتباط یکپارچه","اتوماسیون دایرکت","اتصال Google Drive","اتصال Google Sheets","Google Workspace","Magic MCP","ChatGPT","Claude"]},{"@type":"SoftwareApplication","@id":"https://go.magics.site/#software","name":"Magic Super Manager","url":"https://go.magics.site/","applicationCategory":"BusinessApplication","applicationSubCategory":"مدیریت اینستاگرام، اتوماسیون پیام‌رسان‌ها و فروشگاه‌ساز چندکاناله","operatingSystem":"Web","inLanguage":"fa-IR","description":"اینستاگرام، تلگرام، بله و روبیکا را یکجا مدیریت کن؛ فروشگاه‌ساز چندکاناله، پاسخ‌گوی هوشمند، مرکز ارتباط+ و اتصال Google Drive و Google Sheets با هوش مصنوعی.","brand":{"@id":"https://magics.site/#organization"},"featureList":["مسیرهای خودکار برای گفتگو","مرکز ارتباط+","پاسخ‌گویی و تصمیم‌گیری با هوش مصنوعی","انتشار چندشبکه‌ای","پروفایل+","فروشگاه+","ساخت هوشمند محتوا","زمان‌بندی انتشار","جریان‌های هوشمند AI برای پیام‌رسان‌ها","اتصال بات تلگرام به مجیک","اتصال بات بله و پاسخ‌گویی خودکار","اتصال بات روبیکا و مدیریت پیام‌ها","ذخیره اطلاعات و وضعیت هر مخاطب","بلوک Google AI و Gemini","اتصال به ChatGPT و Claude با Magic MCP","ربات هوشمند و منشی پاسخ‌گو","نود Google Sheets در جریان‌ساز","انتشار محتوا در کانال تلگرام","زمان‌بندی پست‌های کانال تلگرام","انتشار و زمان‌بندی در کانال بله","انتشار محتوا در کانال روبیکا","ارجاع گفتگو به اپراتور انسانی","اتصال تلگرام به جریان اینستاگرام","تشخیص متن، صوت، تصویر و ویدیو","پاسخ خودکار به کامنت","مسیر متفاوت برای هر نوع گفتگو","پاسخ به استوری و منشن","تصمیم‌گیری بر اساس پاسخ مخاطب","فرآیندهای چندمرحله‌ای قابل استفاده مجدد","کارت و دکمه تعاملی","ادامه مسیر بر اساس دنبال‌کردن پیج","پیگیری زمان‌بندی‌شده","الگوهای آماده برای شروع سریع","تست مسیر قبل از فعال‌سازی","بررسی آماده‌بودن اتوماسیون","انتقال و نسخه‌برداری از مسیرها","مرتب‌سازی خودکار مسیرهای گفتگو","گزارش اجرای اتوماسیون","پروفایل مخاطب کنار تاریخچه گفتگو","پاسخ هوشمند صوتی در دایرکت","انتشار فوری محتوا","طراحی و ویرایش تصویر","ساخت و بازنویسی کپشن","انتقال مستقیم به انتشار","مدیریت حساب‌های اینستاگرام","کتابخانه و وضعیت محتوا","گفتگو با هوش مصنوعی","کنترل مصرف ابزارهای هوش مصنوعی","پردازش ویس و پاسخ صوتی AI","راهنمای تعاملی مجیک","نمایش محتوای پیج و استوری‌ویوئر","مرکز آمار تفکیکی Profile+","مدیریت کامل CRM مخاطبان","جست‌وجو و فیلتر گفتگوها","پاسخ مستقیم متنی و رسانه‌ای به پیام‌رسان‌ها","اتصال ایمن Google Workspace","نود Google Sheets؛ ثبت، جست‌وجو و به‌روزرسانی","انتخاب و مدیریت فایل‌های Google Drive","آدرس اختصاصی فروشگاه روی زیردامنه","۹ قالب آماده برای طراحی ویترین","کاتالوگ محصول و مدیریت موجودی","صفحهٔ اختصاصی محصول و گالری رسانه","سبد خرید و ثبت سفارش در ویترین","سبد خرید هوشمند در دایرکت","مدیریت تأمین‌کنندگان و روش‌های ارسال","کنترل موجودی، ارسال و مرجوعی سفارش","کد تخفیف و کمپین‌های فروش","آداپتور پرداخت زرین‌پال؛ غیرفعال به‌صورت پیش‌فرض","ویترین سه‌زبانهٔ فارسی، انگلیسی و عربی","چند مقصد برای یک دکمه و خروجی مستقیم نود","انتشار چندمرحله‌ای رسانه در کانال‌ها","گزارش عملکرد Smart Direct با Magic MCP","جست‌وجوی متن پیام‌ها و مخاطبان با Magic MCP","فروشگاه‌ساز چندکاناله برای اینستاگرام، تلگرام، بله و روبیکا","ساخت ویترین عمومی با زیردامنه اختصاصی و ۹ قالب آماده","سفارش‌گیری از ویترین و جریان‌های دایرکت و ربات‌های متصل","پاسخ‌گوی هوشمند تلگرام با جریان‌ساز و بلوک‌های AI","پاسخ‌گوی هوشمند بله با جریان‌ساز و بلوک‌های AI","پاسخ‌گوی هوشمند روبیکا با جریان‌ساز و بلوک‌های AI","صندوق یکپارچه پیام‌های اینستاگرام، تلگرام، بله و روبیکا","اتصال Google Drive برای انتخاب فایل‌های اختصاصی","اتصال Google Sheets برای ثبت، جست‌وجو و به‌روزرسانی داده‌ها","مدیریت کاتالوگ، موجودی، سفارش‌ها، تأمین‌کنندگان و ارسال","انتشار چندشبکه‌ای و زمان‌بندی کانال‌های تلگرام، بله و روبیکا"],"keywords":["مدیریت اینستاگرام","فروشگاه‌ساز چندکاناله","فروشگاه‌ساز اینستاگرام","فروشگاه‌ساز تلگرام","فروشگاه‌ساز بله","فروشگاه‌ساز روبیکا","پاسخگوی هوشمند تلگرام","پاسخگوی هوشمند بله","پاسخگوی هوشمند روبیکا","مرکز ارتباط یکپارچه","اتوماسیون دایرکت","اتصال Google Drive","اتصال Google Sheets","Google Workspace","Magic MCP","ChatGPT","Claude"]},{"@type":"FAQPage","@id":"https://go.magics.site/#faq","mainEntity":[{"@type":"Question","name":"چطور اینستاگرام و پیام‌رسان‌ها را به ChatGPT و Claude وصل کنم؟","acceptedAnswer":{"@type":"Answer","text":"اینستاگرام و بات‌های تلگرام، بله و روبیکا را در مجیک متصل کن. سپس Magic MCP را در ChatGPT یا Claude سازگار اضافه کن، با حساب مجیک وارد شو و مجوزهای موردنیازت را انتخاب کن. دستیار فقط به امکاناتی دسترسی دارد که برای حساب تو فعال و مجاز شده‌اند."}},{"@type":"Question","name":"آیا این امکانات فقط برای اینستاگرام است؟","acceptedAnswer":{"@type":"Answer","text":"خیر. علاوه بر اینستاگرام، بات‌ها و کانال‌های تلگرام، بله و روبیکا هم در مجیک پشتیبانی می‌شوند. امکانات هر شبکه به نوع اتصال و مجوزهای همان حساب بستگی دارد."}},{"@type":"Question","name":"آیا می‌توانم با هوش مصنوعی برای تلگرام، بله و روبیکا ربات پاسخ‌گو بسازم؟","acceptedAnswer":{"@type":"Answer","text":"بله. بات موردنظر را به مجیک وصل کن و در جریان‌ساز از بلوک‌های AI استفاده کن تا پیام را تحلیل کند، پاسخ مناسب بدهد و در صورت نیاز درخواست را به اپراتور انسانی ارجاع دهد."}},{"@type":"Question","name":"آیا برای استفاده نیاز به دانش فنی دارم؟","acceptedAnswer":{"@type":"Answer","text":"نه. بخش زیادی از سیستم با جریان‌های هوشمند و تنظیمات قابل ساخت و مدیریت است و برای شروع لازم نیست برنامه‌نویس باشی."}},{"@type":"Question","name":"می‌تونم جریان هوشمند مخصوص کسب‌وکار خودم بسازم؟","acceptedAnswer":{"@type":"Answer","text":"بله. منطق و مسیر تعامل را می‌توانی متناسب با سناریوی کسب‌وکارت طراحی و شخصی‌سازی کنی؛ از فروش و جذب مخاطب تا پشتیبانی و پیگیری."}},{"@type":"Question","name":"آیا فقط برای فروشگاه‌هاست؟","acceptedAnswer":{"@type":"Answer","text":"خیر. می‌توان از سیستم برای فروش، لیدگیری، پشتیبانی، خدمات، املاک، تولیدکنندگان محتوا و سناریوهای مختلف ارتباط با مخاطب استفاده کرد."}},{"@type":"Question","name":"آیا هوش مصنوعی خودش با مشتری صحبت می‌کند؟","acceptedAnswer":{"@type":"Answer","text":"بله. می‌توانی پاسخ‌گویی، تحلیل پیام و جمع‌آوری اطلاعات موردنیاز را در جریان‌های هوشمند مبتنی بر هوش مصنوعی تعریف کنی."}},{"@type":"Question","name":"آیا می‌توانم تیمم را هم وارد فرآیند کنم؟","acceptedAnswer":{"@type":"Answer","text":"بله. در سناریوهای مربوط به مخاطب و لید می‌توان مسیر ارجاع به نیروی انسانی را تعریف کرد تا در نقطه مناسب، ادامه گفتگو به تیم سپرده شود."}},{"@type":"Question","name":"چطور شروع کنم؟","acceptedAnswer":{"@type":"Answer","text":"وارد پنل شو، رایگان شروع کن و اولین جریان هوشمند خودت را بساز. بعد می‌توانی محتوا، انتشار و گفتگوهای خودکار را قدم‌به‌قدم به همان سیستم اضافه کنی."}},{"@type":"Question","name":"مرکز ارتباط+ چه شبکه‌هایی را یکجا نمایش می‌دهد؟","acceptedAnswer":{"@type":"Answer","text":"گفتگوهای حساب‌های متصل اینستاگرام، تلگرام، بله و روبیکا در یک صندوق یکپارچه نمایش داده می‌شوند. می‌توانی گفتگوها را بر اساس شبکه، اکانت، خوانده‌نشده و آرشیو فیلتر کنی و مشخصات و اطلاعات CRM مخاطب را کنار تاریخچهٔ گفتگو ببینی."}},{"@type":"Question","name":"پروفایل+ چه آمارهایی را نمایش می‌دهد؟","acceptedAnswer":{"@type":"Answer","text":"پروفایل+ آمار حساب و محتوا را نمایش می‌دهد؛ از دنبال‌کنندگان و تعداد محتوا تا Views، Reach، تعامل، لایک، کامنت، اشتراک‌گذاری، ذخیره و نرخ تعامل در بازه‌های ۲۴ ساعت، ۷ روز و ۳۰ روز و تفکیک Story، Reels و Feed. دسترس‌پذیری هر شاخص به داده‌ای بستگی دارد که Meta برای آن نوع محتوا ارائه می‌کند."}},{"@type":"Question","name":"آیا مجیک فروشگاه‌ساز چندکاناله برای اینستاگرام، تلگرام، بله و روبیکا دارد؟","acceptedAnswer":{"@type":"Answer","text":"بله. می‌توانی یک ویترین عمومی با زیردامنه اختصاصی و یکی از ۹ قالب آماده بسازی. محصولات را در کاتالوگ مشترک ثبت کن و سفارش‌ها را از ویترین یا جریان‌های دایرکت و ربات‌های متصل بگیر؛ مدیریت موجودی و پیگیری سفارش‌ها از پنل انجام می‌شود."}},{"@type":"Question","name":"چطور برای تلگرام، بله و روبیکا پاسخ‌گوی هوشمند بسازم؟","acceptedAnswer":{"@type":"Answer","text":"بات هر پیام‌رسان را به مجیک وصل کن و در جریان‌ساز برای آن مسیر پاسخ‌گویی بساز. بلوک‌های هوش مصنوعی پیام را پردازش می‌کنند و می‌توانند پاسخ متناسب بدهند یا گفتگو را به اپراتور انسانی ارجاع دهند."}},{"@type":"Question","name":"اتصال Google Drive و Google Sheets در مجیک چه کاربردی دارد؟","acceptedAnswer":{"@type":"Answer","text":"حساب Google را با OAuth متصل کن، فایل موردنیاز را از Google Drive انتخاب کن و در جریان‌ساز از نود Google Sheets برای ثبت پاسخ‌ها، جست‌وجوی ردیف قبلی و به‌روزرسانی اطلاعات مخاطب یا سفارش استفاده کن. دسترسی Drive به فایل‌هایی محدود است که خودت انتخاب کرده‌ای."}},{"@type":"Question","name":"آیا می‌توانم انتشار محتوا در اینستاگرام، تلگرام، بله و روبیکا را یکجا مدیریت کنم؟","acceptedAnswer":{"@type":"Answer","text":"بله. در پلنر مقصدهای انتشار را مدیریت کن؛ برای کانال‌های تلگرام، بله و روبیکا می‌توانی پیام چندرسانه‌ای را پیش‌نویس نگه داری، فوری منتشر کنی یا زمان‌بندی کنی. امکانات هر مقصد به نوع حساب و دسترسی API همان شبکه بستگی دارد."}}]}]}
MAGIC_LANDING_SCHEMA_BASE;
$landingSchema = json_decode($landingSchemaBaseJson, true, 512, JSON_THROW_ON_ERROR);
$landingSchemaLocale = $landingSchemaLocales[$landingLanguage] ?? null;
$landingSchemaKeywords = array_values(array_filter(
    array_map('trim', preg_split('/[،,]/u', $landingSeoKeywords) ?: []),
    static fn($value) => $value !== ''
));
foreach ($landingSchema['@graph'] as &$node) {
    switch ($node['@type'] ?? '') {
        case 'Organization':
            if (isset($node['contactPoint'][0])) {
                $node['contactPoint'][0]['telephone'] = $landingContactNumber;
                $node['contactPoint'][0]['availableLanguage'] = [$landingSchemaLanguage];
                $node['contactPoint'][0]['contactType'] = $landingLanguage === 'ar'
                    ? 'دعم العملاء'
                    : ($landingLanguage === 'fa' ? 'پشتیبانی مشتریان' : 'customer support');
            }
            break;
        case 'WebSite':
            $node['inLanguage'] = $landingSchemaLanguage;
            break;
        case 'WebPage':
            $node['@id'] = $landingSchemaCanonical.'#webpage';
            $node['url'] = $landingSchemaCanonical;
            $node['name'] = $landingSeoTitle;
            $node['description'] = $landingSeoDescription;
            $node['inLanguage'] = $landingSchemaLanguage;
            $node['keywords'] = $landingSchemaKeywords;
            $node['dateModified'] = '2026-11-23';
            if (isset($node['primaryImageOfPage'])) {
                $node['primaryImageOfPage']['caption'] = $landingSeoTitle;
            }
            break;
        case 'SoftwareApplication':
            $node['inLanguage'] = $landingSchemaLanguage;
            $node['description'] = $landingSeoDescription;
            $node['keywords'] = $landingSchemaKeywords;
            if (is_array($landingSchemaLocale)) {
                $node['applicationSubCategory'] = $landingSchemaLocale['subCategory'];
                $node['featureList'] = $landingSchemaLocale['features'];
            }
            break;
        case 'FAQPage':
            $node['@id'] = $landingSchemaCanonical.'#faq';
            if (is_array($landingSchemaLocale)) {
                $node['mainEntity'] = array_map(
                    static fn(array $faq): array => [
                        '@type' => 'Question',
                        'name' => $faq['q'],
                        'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
                    ],
                    $landingSchemaLocale['faq']
                );
            }
            break;
    }
}
unset($node);
?>
<script type="application/ld+json">
<?= json_encode($landingSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>
</script>
<script>
const previewToggle = document.getElementById('previewFeaturesToggle');
previewToggle.addEventListener('click', () => {
  const expanded = previewToggle.getAttribute('aria-expanded') !== 'true';
  document.querySelectorAll('#featureGrid .feature-extra').forEach(card => {
    card.hidden = !expanded;
    card.classList.toggle('is-opening', expanded);
  });
  previewToggle.setAttribute('aria-expanded', String(expanded));
  previewToggle.querySelector('span').textContent = expanded ? previewToggle.dataset.less : previewToggle.dataset.more;
  previewToggle.querySelector('b').textContent = expanded ? '−' : '＋';
});
</script>
<script>
(() => {
  const title = document.getElementById('cycle-title');
  const text = title.firstElementChild;
  function fit() {
    const available = title.clientWidth;
    if (!available || !text.offsetWidth) return;
    const size = parseFloat(getComputedStyle(title).fontSize);
    const fitted = Math.min(36, Math.floor(size * (available - 2) / text.getBoundingClientRect().width * 10) / 10);
    title.style.setProperty('--cycle-fit', fitted + 'px');
  }
  fit();
  if (window.ResizeObserver) {
    new ResizeObserver(fit).observe(title.parentElement);
  } else {
    window.addEventListener('resize', fit);
  }
  if (document.fonts) {
    document.fonts.ready.then(fit);
    document.fonts.addEventListener('loadingdone', fit);
  }
})();
</script>
<script>
(() => {
  const section = document.getElementById('shop-plus');
  section.querySelector('.ms-cart-preview').addEventListener('click', () => { document.getElementById('hengam-cart').open = true; });
  const buttons = section.querySelectorAll('.ms-menu button');
  function select(current) {
    for (const button of buttons) {
      const active = button === current;
      document.getElementById(button.getAttribute('aria-controls')).hidden = !active;
      button.setAttribute('aria-pressed', String(active));
    }
  }
  for (const button of buttons) button.addEventListener('click', () => select(button));
  select(buttons[0]);
})();
</script>
<!-- Magic deploy bundle 2026-11-22 landing-flow + profile-queue release -->
</body>
</html>