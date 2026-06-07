<?php
/**
 * Register ACF fields for all service templates.
 * Includes default values so new pages are pre-filled.
 */

defined('ABSPATH') || exit;

function amal_register_service_acf_fields() {
	if (!function_exists('acf_add_local_field_group')) {
		return;
	}

	// ---------------------------------------------------------
	// 1. Contract Drafting Template
	// ---------------------------------------------------------
	$contract_fields = [
		['key' => 'field_cd_hero_tab', 'label' => 'Hero Section', 'type' => 'tab'],
		['key' => 'field_cd_hero_title', 'label' => 'العنوان الرئيسي', 'name' => 'hero_title', 'type' => 'textarea', 'rows' => 2, 'default_value' => "أفضل محامي صياغة عقود تجارية\nوتدقيقها في السعودية"],
		['key' => 'field_cd_hero_subtitle', 'label' => 'النص الفرعي', 'name' => 'hero_subtitle', 'type' => 'textarea', 'default_value' => 'تُعد صياغة العقود حجر الزاوية في حماية الحقوق وضمان استدامة الأعمال في المملكة. وفي مكتب المستشار القانوني آمال المالكي نقدم خدمة صياغة عقد شراكة في السعودية بمهنية عالية تضمن لك ولشركائك الوضوح التام والالتزام بالأنظمة المعمول بها'],
		['key' => 'field_cd_hero_btn_text', 'label' => 'نص الزر', 'name' => 'hero_btn_text', 'type' => 'text', 'default_value' => 'اطلب الخدمة الان'],
		['key' => 'field_cd_hero_btn_url', 'label' => 'رابط الزر', 'name' => 'hero_btn_url', 'type' => 'url', 'default_value' => 'https://wa.me/9660541415099'],
		['key' => 'field_cd_hero_bg', 'label' => 'صورة الخلفية', 'name' => 'hero_bg', 'type' => 'image', 'return_format' => 'url'],

		['key' => 'field_cd_stats_tab', 'label' => 'Stats Section', 'type' => 'tab'],
	];
	$default_stats = [
		1 => ['num' => '+200', 'title' => 'عميل راضٍ', 'desc' => 'من الشركات والأفراد'],
		2 => ['num' => '%98', 'title' => 'نسبة النجاح', 'desc' => 'في حسم النزاعات العمالية'],
		3 => ['num' => '+15', 'title' => 'خبير قانوني', 'desc' => 'متخصصون في القضايا العمالية'],
		4 => ['num' => '+10', 'title' => 'سنوات خبرة', 'desc' => 'في تقديم الاستشارات القانونية']
	];
	for ($i = 1; $i <= 4; $i++) {
		$contract_fields[] = ['key' => "field_cd_stat_{$i}_icon", 'label' => "إحصائية {$i} - أيقونة", 'name' => "stat_{$i}_icon", 'type' => 'image', 'return_format' => 'url'];
		$contract_fields[] = ['key' => "field_cd_stat_{$i}_number", 'label' => "إحصائية {$i} - الرقم", 'name' => "stat_{$i}_number", 'type' => 'text', 'default_value' => $default_stats[$i]['num']];
		$contract_fields[] = ['key' => "field_cd_stat_{$i}_title", 'label' => "إحصائية {$i} - العنوان", 'name' => "stat_{$i}_title", 'type' => 'text', 'default_value' => $default_stats[$i]['title']];
		$contract_fields[] = ['key' => "field_cd_stat_{$i}_desc", 'label' => "إحصائية {$i} - الوصف", 'name' => "stat_{$i}_desc", 'type' => 'text', 'default_value' => $default_stats[$i]['desc']];
	}

	$contract_fields[] = ['key' => 'field_cd_why_tab', 'label' => 'Why Us Section', 'type' => 'tab'];
	$contract_fields[] = ['key' => 'field_cd_why_img', 'label' => 'صورة القسم', 'name' => 'why_us_image', 'type' => 'image', 'return_format' => 'url'];
	$contract_fields[] = ['key' => 'field_cd_why_title', 'label' => 'العنوان', 'name' => 'why_us_title', 'type' => 'text', 'default_value' => 'أهمية صياغة العقود التجارية بدقة؟'];
	$contract_fields[] = ['key' => 'field_cd_why_subtitle', 'label' => 'النص الفرعي 1', 'name' => 'why_us_subtitle', 'type' => 'text', 'default_value' => 'العقود ليست مجرد أوراق، بل هي حماية لاستثماراتك ومستقبلك التجاري. من خلال صياغة احترافية، نضمن لك:'];
	$contract_fields[] = ['key' => 'field_cd_why_desc', 'label' => 'النص الفرعي 2', 'name' => 'why_us_desc', 'type' => 'textarea'];
	
	$default_why_lists = [
		'حماية قانونية كاملة للحقوق والالتزامات.',
		'تجنب الثغرات التي قد تؤدي إلى نزاعات مستقبلية.',
		'الامتثال التام للأنظمة والقوانين السعودية المستحدثة.'
	];
	for ($i = 1; $i <= 5; $i++) {
		$def_val = isset($default_why_lists[$i-1]) ? $default_why_lists[$i-1] : '';
		$contract_fields[] = ['key' => "field_cd_why_list_{$i}", 'label' => "نقطة {$i}", 'name' => "why_us_list_{$i}", 'type' => 'text', 'default_value' => $def_val];
	}
	$contract_fields[] = ['key' => 'field_cd_why_btn', 'label' => 'نص الزر', 'name' => 'why_us_btn_text', 'type' => 'text', 'default_value' => 'اعرف المزيد عن خدماتنا'];
	$contract_fields[] = ['key' => 'field_cd_why_url', 'label' => 'رابط الزر', 'name' => 'why_us_btn_url', 'type' => 'url', 'default_value' => '#'];

	$contract_fields[] = ['key' => 'field_cd_types_tab', 'label' => 'Specialization Types', 'type' => 'tab'];
	$contract_fields[] = ['key' => 'field_cd_types_title', 'label' => 'عنوان القسم', 'name' => 'types_title', 'type' => 'text', 'default_value' => 'أنواع العقود التي نصيغها'];
	$contract_fields[] = ['key' => 'field_cd_types_sub', 'label' => 'النص الفرعي', 'name' => 'types_subtitle', 'type' => 'text', 'default_value' => 'نغطي كافة احتياجاتك القانونية من خلال صياغة عقود متنوعة تشمل:'];
	
	$default_types = [
		1 => ['title' => 'صياغة عقود تجارية', 'desc' => 'تشمل عقود البيع، التوريد، التوزيع، والوكالات التجارية بما يضمن سير أعمالك بسلاسة.'],
		2 => ['title' => 'عقود الشركات والتأسيس', 'desc' => 'صياغة عقود التأسيس، ملاحق التعديل، وقرارات الشركاء.'],
		3 => ['title' => 'عقود العمل والموظفين', 'desc' => 'صياغة عقود العمل بما يتوافق مع نظام العمل السعودي لحفظ حقوق الطرفين.']
	];
	for ($i = 1; $i <= 3; $i++) {
		$contract_fields[] = ['key' => "field_cd_type_{$i}_img", 'label' => "نوع {$i} - صورة", 'name' => "type_{$i}_image", 'type' => 'image', 'return_format' => 'url'];
		$contract_fields[] = ['key' => "field_cd_type_{$i}_title", 'label' => "نوع {$i} - العنوان", 'name' => "type_{$i}_title", 'type' => 'text', 'default_value' => $default_types[$i]['title']];
		$contract_fields[] = ['key' => "field_cd_type_{$i}_desc", 'label' => "نوع {$i} - الوصف", 'name' => "type_{$i}_desc", 'type' => 'textarea', 'default_value' => $default_types[$i]['desc']];
	}

	$contract_fields[] = ['key' => 'field_cd_steps_tab', 'label' => 'Steps Section', 'type' => 'tab'];
	$contract_fields[] = ['key' => 'field_cd_steps_title', 'label' => 'عنوان القسم', 'name' => 'steps_title', 'type' => 'text', 'default_value' => 'لماذا تختارنا لـ صياغة ومراجعة العقود؟'];
	$contract_fields[] = ['key' => 'field_cd_steps_sub', 'label' => 'النص الفرعي', 'name' => 'steps_subtitle', 'type' => 'textarea', 'default_value' => 'نحن في مكتب المستشار القانوني آمال المالكي نتبع منهجية واضحة وموثوقة:'];
	
	$default_steps = [
		1 => ['title' => 'الاستشارة الأولية ودراسة المتطلبات', 'desc' => 'نجتمع معك لفهم طبيعة الصفقة التجارية والأهداف المرجوة من العقد.'],
		2 => ['title' => 'تحديد المخاطر والالتزامات', 'desc' => 'نحلل الجوانب القانونية والتجارية لتحديد المخاطر المحتملة والالتزامات الضرورية.'],
		3 => ['title' => 'صياغة المسودة الأولى', 'desc' => 'يقوم خبراؤنا بصياغة المسودة الأولى للعقد مع مراعاة كافة الأنظمة المعمول بها.'],
		4 => ['title' => 'المراجعة والتعديل المشترك', 'desc' => 'نناقش المسودة معك لإبداء الملاحظات والتعديلات اللازمة قبل الاعتماد النهائي.'],
		5 => ['title' => 'التدقيق النهائي والتسليم', 'desc' => 'مراجعة لغوية وقانونية أخيرة لضمان خلو العقد من أي ثغرات وتسليمه جاهزاً للتوقيع.']
	];
	for ($i = 1; $i <= 5; $i++) {
		$contract_fields[] = ['key' => "field_cd_step_{$i}_icon", 'label' => "خطوة {$i} - أيقونة", 'name' => "step_{$i}_icon", 'type' => 'image', 'return_format' => 'url'];
		$st_title = isset($default_steps[$i]) ? $default_steps[$i]['title'] : '';
		$st_desc = isset($default_steps[$i]) ? $default_steps[$i]['desc'] : '';
		$contract_fields[] = ['key' => "field_cd_step_{$i}_title", 'label' => "خطوة {$i} - العنوان", 'name' => "step_{$i}_title", 'type' => 'text', 'default_value' => $st_title];
		$contract_fields[] = ['key' => "field_cd_step_{$i}_desc", 'label' => "خطوة {$i} - الوصف", 'name' => "step_{$i}_desc", 'type' => 'textarea', 'default_value' => $st_desc];
	}

	$contract_fields[] = ['key' => 'field_cd_faq_tab', 'label' => 'FAQ Section', 'type' => 'tab'];
	$contract_fields[] = ['key' => 'field_cd_faq_title', 'label' => 'عنوان القسم', 'name' => 'faq_title', 'type' => 'text', 'default_value' => 'الأسئلة الشائعة حول صياغة العقود'];
	$contract_fields[] = ['key' => 'field_cd_faq_sub', 'label' => 'النص الفرعي', 'name' => 'faq_subtitle', 'type' => 'text', 'default_value' => 'إجابات على أكثر الأسئلة شيوعاً حول خدماتنا'];
	
	$default_faqs = [
		1 => ['q' => 'كم تستغرق عملية صياغة العقد؟', 'a' => 'تختلف المدة حسب تعقيد العقد، ولكننا نلتزم بإنجاز المهام في أسرع وقت ممكن دون المساس بالجودة.'],
		2 => ['q' => 'هل يمكنكم مراجعة عقد مكتوب مسبقاً؟', 'a' => 'نعم، نقدم خدمة المراجعة والتدقيق للعقود لضمان صحتها القانونية.'],
		3 => ['q' => 'هل تصيغون عقوداً باللغتين العربية والإنجليزية؟', 'a' => 'نعم، نوفر صياغة عقود ثنائية اللغة تتسم بالدقة والاحترافية.']
	];
	for ($i = 1; $i <= 5; $i++) {
		$q_val = isset($default_faqs[$i]) ? $default_faqs[$i]['q'] : '';
		$a_val = isset($default_faqs[$i]) ? $default_faqs[$i]['a'] : '';
		$contract_fields[] = ['key' => "field_cd_faq_{$i}_q", 'label' => "سؤال {$i}", 'name' => "faq_{$i}_question", 'type' => 'text', 'default_value' => $q_val];
		$contract_fields[] = ['key' => "field_cd_faq_{$i}_a", 'label' => "إجابة {$i}", 'name' => "faq_{$i}_answer", 'type' => 'textarea', 'default_value' => $a_val];
	}

	acf_add_local_field_group([
		'key' => 'group_contract_drafting',
		'title' => 'إعدادات صفحة صياغة العقود',
		'location' => [
			[['param' => 'page_template', 'operator' => '==', 'value' => 'template-contract-drafting.php']]
		],
		'fields' => $contract_fields,
	]);

	// ---------------------------------------------------------
	// 2. Company Formation Template
	// ---------------------------------------------------------
	$company_fields = [
		['key' => 'field_cf_hero_tab', 'label' => 'Hero Section', 'type' => 'tab'],
		['key' => 'field_cf_hero_title', 'label' => 'العنوان الرئيسي', 'name' => 'hero_title', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'خطوات تأسيس شركة في السعودية'],
		['key' => 'field_cf_hero_subtitle', 'label' => 'النص الفرعي', 'name' => 'hero_subtitle', 'type' => 'textarea', 'default_value' => 'نقدم لك خدمة شاملة لتأسيس شركتك في المملكة العربية السعودية، بدءاً من اختيار الشكل القانوني الأنسب وحتى إصدار التراخيص اللازمة، لضمان انطلاقة قوية وقانونية لأعمالك.'],
		['key' => 'field_cf_hero_btn_text', 'label' => 'نص الزر', 'name' => 'hero_btn_text', 'type' => 'text', 'default_value' => 'اطلب الخدمة الان'],
		['key' => 'field_cf_hero_btn_url', 'label' => 'رابط الزر', 'name' => 'hero_btn_url', 'type' => 'url', 'default_value' => 'https://wa.me/9660541415099'],
		['key' => 'field_cf_hero_bg', 'label' => 'صورة الخلفية', 'name' => 'hero_bg', 'type' => 'image', 'return_format' => 'url'],

		['key' => 'field_cf_why_tab', 'label' => 'Why Us Section', 'type' => 'tab'],
		['key' => 'field_cf_why_img', 'label' => 'صورة القسم', 'name' => 'why_us_image', 'type' => 'image', 'return_format' => 'url'],
		['key' => 'field_cf_why_title', 'label' => 'العنوان', 'name' => 'why_us_title', 'type' => 'text', 'default_value' => 'لماذا تختارنا لتأسيس شركتك؟'],
		['key' => 'field_cf_why_subtitle', 'label' => 'النص الفرعي 1', 'name' => 'why_us_subtitle', 'type' => 'text', 'default_value' => 'تأسيس الشركات يتطلب دقة وخبرة لضمان الامتثال للأنظمة، نحن نضمن لك:'],
		['key' => 'field_cf_why_desc', 'label' => 'النص الفرعي 2', 'name' => 'why_us_desc', 'type' => 'textarea'],
	];
	
	$default_cf_lists = [
		'سرعة وإنجاز في كافة الإجراءات الحكومية.',
		'استشارات قانونية متخصصة لاختيار الكيان الأنسب.',
		'شفافية تامة في التكاليف والرسوم النظامية.'
	];
	for ($i = 1; $i <= 5; $i++) {
		$def_val = isset($default_cf_lists[$i-1]) ? $default_cf_lists[$i-1] : '';
		$company_fields[] = ['key' => "field_cf_why_list_{$i}", 'label' => "نقطة {$i}", 'name' => "why_us_list_{$i}", 'type' => 'text', 'default_value' => $def_val];
	}
	$company_fields[] = ['key' => 'field_cf_why_btn', 'label' => 'نص الزر', 'name' => 'why_us_btn_text', 'type' => 'text', 'default_value' => 'اعرف المزيد عن خدماتنا'];
	$company_fields[] = ['key' => 'field_cf_why_url', 'label' => 'رابط الزر', 'name' => 'why_us_btn_url', 'type' => 'url', 'default_value' => '#'];

	$company_fields[] = ['key' => 'field_cf_types_tab', 'label' => 'Specialization Types', 'type' => 'tab'];
	$company_fields[] = ['key' => 'field_cf_types_title', 'label' => 'عنوان القسم', 'name' => 'types_title', 'type' => 'text', 'default_value' => 'انواع الشركات التي نؤسسها لك'];
	$company_fields[] = ['key' => 'field_cf_types_sub', 'label' => 'النص الفرعي', 'name' => 'types_subtitle', 'type' => 'text', 'default_value' => 'نقدم خدمات تأسيس لمختلف أنواع الشركات، منها:'];
	
	$default_cf_types = [
		1 => ['title' => 'شركة ذات مسؤولية محدودة', 'desc' => 'الخيار المفضل للشركات الصغيرة والمتوسطة، حيث تقتصر مسؤولية الشركاء على حصصهم.'],
		2 => ['title' => 'شركة مساهمة مبسطة', 'desc' => 'شكل مرن يناسب المشاريع الريادية والشركات العائلية بمتطلبات حوكمة أقل.'],
		3 => ['title' => 'تأسيس شركات اجنبية', 'desc' => 'دعم كامل للمستثمرين الأجانب لتأسيس كياناتهم وفق نظام الاستثمار الأجنبي.']
	];
	for ($i = 1; $i <= 3; $i++) {
		$company_fields[] = ['key' => "field_cf_type_{$i}_img", 'label' => "نوع {$i} - صورة", 'name' => "type_{$i}_image", 'type' => 'image', 'return_format' => 'url'];
		$company_fields[] = ['key' => "field_cf_type_{$i}_title", 'label' => "نوع {$i} - العنوان", 'name' => "type_{$i}_title", 'type' => 'text', 'default_value' => $default_cf_types[$i]['title']];
		$company_fields[] = ['key' => "field_cf_type_{$i}_desc", 'label' => "نوع {$i} - الوصف", 'name' => "type_{$i}_desc", 'type' => 'textarea', 'default_value' => $default_cf_types[$i]['desc']];
	}

	$company_fields[] = ['key' => 'field_cf_steps_tab', 'label' => 'Steps Section', 'type' => 'tab'];
	$company_fields[] = ['key' => 'field_cf_steps_title', 'label' => 'عنوان القسم', 'name' => 'steps_title', 'type' => 'text', 'default_value' => 'ما هي خطوات تأسيس الشركة؟'];
	$company_fields[] = ['key' => 'field_cf_steps_sub', 'label' => 'النص الفرعي', 'name' => 'steps_subtitle', 'type' => 'textarea', 'default_value' => 'عملية تأسيس سلسة وواضحة نرافقك فيها خطوة بخطوة:'];
	
	$default_cf_steps = [
		1 => ['title' => 'الاستشارة واختيار الكيان', 'desc' => 'دراسة نشاطك وتحديد الشكل القانوني المناسب.'],
		2 => ['title' => 'صياغة عقد التأسيس', 'desc' => 'إعداد العقد وتوثيقه لدى الجهات المختصة.'],
		3 => ['title' => 'إصدار السجل التجاري', 'desc' => 'استخراج السجل والتراخيص وبدء مزاولة العمل.']
	];
	for ($i = 1; $i <= 3; $i++) {
		$company_fields[] = ['key' => "field_cf_step_{$i}_icon", 'label' => "خطوة {$i} - أيقونة", 'name' => "step_{$i}_icon", 'type' => 'image', 'return_format' => 'url'];
		$company_fields[] = ['key' => "field_cf_step_{$i}_title", 'label' => "خطوة {$i} - العنوان", 'name' => "step_{$i}_title", 'type' => 'text', 'default_value' => $default_cf_steps[$i]['title']];
		$company_fields[] = ['key' => "field_cf_step_{$i}_desc", 'label' => "خطوة {$i} - الوصف", 'name' => "step_{$i}_desc", 'type' => 'textarea', 'default_value' => $default_cf_steps[$i]['desc']];
	}

	$company_fields[] = ['key' => 'field_cf_faq_tab', 'label' => 'FAQ Section', 'type' => 'tab'];
	$company_fields[] = ['key' => 'field_cf_faq_title', 'label' => 'عنوان القسم', 'name' => 'faq_title', 'type' => 'text', 'default_value' => 'الأسئلة الشائعة حول تأسيس الشركات'];
	$company_fields[] = ['key' => 'field_cf_faq_sub', 'label' => 'النص الفرعي', 'name' => 'faq_subtitle', 'type' => 'text', 'default_value' => 'إجابات على الأسئلة المتكررة'];
	
	$default_cf_faqs = [
		1 => ['q' => 'هل يجب أن يكون هناك شريك سعودي لتأسيس شركة؟', 'a' => 'لا، يمكن للمستثمر الأجنبي تأسيس شركة بملكية 100% في العديد من الأنشطة وفق نظام الاستثمار.'],
		2 => ['q' => 'ما هو الحد الأدنى لرأس المال؟', 'a' => 'ألغى نظام الشركات الجديد الحد الأدنى لرأس المال للشركات ذات المسؤولية المحدودة، باستثناء بعض الأنشطة المحددة.'],
		3 => ['q' => 'كم تستغرق عملية التأسيس؟', 'a' => 'عادةً تكتمل الإجراءات خلال أيام معدودة بعد استيفاء كافة المستندات المطلوبة.']
	];
	for ($i = 1; $i <= 5; $i++) {
		$q_val = isset($default_cf_faqs[$i]) ? $default_cf_faqs[$i]['q'] : '';
		$a_val = isset($default_cf_faqs[$i]) ? $default_cf_faqs[$i]['a'] : '';
		$company_fields[] = ['key' => "field_cf_faq_{$i}_q", 'label' => "سؤال {$i}", 'name' => "faq_{$i}_question", 'type' => 'text', 'default_value' => $q_val];
		$company_fields[] = ['key' => "field_cf_faq_{$i}_a", 'label' => "إجابة {$i}", 'name' => "faq_{$i}_answer", 'type' => 'textarea', 'default_value' => $a_val];
	}

	acf_add_local_field_group([
		'key' => 'group_company_formation',
		'title' => 'إعدادات صفحة تأسيس الشركات',
		'location' => [
			[['param' => 'page_template', 'operator' => '==', 'value' => 'template-company-formation.php']]
		],
		'fields' => $company_fields,
	]);

	// ---------------------------------------------------------
	// 3. Lawsuits Preparation Template
	// ---------------------------------------------------------
	$lawsuits_fields = [
		['key' => 'field_lp_hero_tab', 'label' => 'Hero Section', 'type' => 'tab'],
		['key' => 'field_lp_hero_title', 'label' => 'العنوان الرئيسي', 'name' => 'hero_title', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'صياغة الدعاوى القضائية'],
		['key' => 'field_lp_hero_subtitle', 'label' => 'النص الفرعي', 'name' => 'hero_subtitle', 'type' => 'textarea', 'default_value' => 'تعد صياغة الدعاوى القضائية الخطوة الأولى والأهم في مسار أي نزاع قانوني. نحن في مكتب المستشار القانوني آمال المالكي نضمن لك صياغة دقيقة واحترافية لدعواك، مما يعزز فرص نجاحها أمام المحاكم بمختلف درجاتها.'],
		['key' => 'field_lp_hero_btn_text', 'label' => 'نص الزر', 'name' => 'hero_btn_text', 'type' => 'text', 'default_value' => 'اطلب الخدمة الان'],
		['key' => 'field_lp_hero_btn_url', 'label' => 'رابط الزر', 'name' => 'hero_btn_url', 'type' => 'url', 'default_value' => 'https://wa.me/9660541415099'],
		['key' => 'field_lp_hero_bg', 'label' => 'صورة الخلفية', 'name' => 'hero_bg', 'type' => 'image', 'return_format' => 'url'],

		['key' => 'field_lp_why_tab', 'label' => 'Why Us Section', 'type' => 'tab'],
		['key' => 'field_lp_why_img', 'label' => 'صورة القسم', 'name' => 'why_us_image', 'type' => 'image', 'return_format' => 'url'],
		['key' => 'field_lp_why_title', 'label' => 'العنوان', 'name' => 'why_us_title', 'type' => 'text', 'default_value' => 'أهمية صياغة الدعوى القضائية بشكل صحيح'],
		['key' => 'field_lp_why_subtitle', 'label' => 'النص الفرعي 1', 'name' => 'why_us_subtitle', 'type' => 'text', 'default_value' => 'صياغة الدعوى هي الأساس الذي تبنى عليه المحاكمة، وأي خطأ قد يؤدي إلى رفض الدعوى، لذا نضمن لك:'],
		['key' => 'field_lp_why_desc', 'label' => 'النص الفرعي 2', 'name' => 'why_us_desc', 'type' => 'textarea'],
	];
	
	$default_lp_lists = [
		'تكييف قانوني دقيق للوقائع وفقاً للأنظمة.',
		'تحديد الطلبات بشكل واضح وحاسم.',
		'إبراز الأدلة والأسانيد التي تدعم موقفك بقوة.'
	];
	for ($i = 1; $i <= 5; $i++) {
		$def_val = isset($default_lp_lists[$i-1]) ? $default_lp_lists[$i-1] : '';
		$lawsuits_fields[] = ['key' => "field_lp_why_list_{$i}", 'label' => "نقطة {$i}", 'name' => "why_us_list_{$i}", 'type' => 'text', 'default_value' => $def_val];
	}
	$lawsuits_fields[] = ['key' => 'field_lp_why_btn', 'label' => 'نص الزر', 'name' => 'why_us_btn_text', 'type' => 'text', 'default_value' => 'اعرف المزيد عن خدماتنا'];
	$lawsuits_fields[] = ['key' => 'field_lp_why_url', 'label' => 'رابط الزر', 'name' => 'why_us_btn_url', 'type' => 'url', 'default_value' => '#'];

	$lawsuits_fields[] = ['key' => 'field_lp_types_tab', 'label' => 'Specialization Types', 'type' => 'tab'];
	$lawsuits_fields[] = ['key' => 'field_lp_types_title', 'label' => 'عنوان القسم', 'name' => 'types_title', 'type' => 'text', 'default_value' => 'أنواع الدعاوى التي نقوم بصياغتها'];
	$lawsuits_fields[] = ['key' => 'field_lp_types_sub', 'label' => 'النص الفرعي', 'name' => 'types_subtitle', 'type' => 'text', 'default_value' => 'نمتلك خبرة واسعة في صياغة مختلف أنواع الدعاوى القضائية:'];
	
	$default_lp_types = [
		1 => ['title' => 'الدعاوى التجارية', 'desc' => 'تشمل المطالبات المالية، النزاعات بين الشركاء، ودعاوى الإفلاس.'],
		2 => ['title' => 'الدعاوى العمالية', 'desc' => 'صياغة دعاوى الفصل التعسفي، المطالبة بالمستحقات، وإصابات العمل.'],
		3 => ['title' => 'الدعاوى الإدارية', 'desc' => 'دعاوى التعويض ضد الجهات الحكومية، وإلغاء القرارات الإدارية.']
	];
	for ($i = 1; $i <= 3; $i++) {
		$lawsuits_fields[] = ['key' => "field_lp_type_{$i}_img", 'label' => "نوع {$i} - صورة", 'name' => "type_{$i}_image", 'type' => 'image', 'return_format' => 'url'];
		$lawsuits_fields[] = ['key' => "field_lp_type_{$i}_title", 'label' => "نوع {$i} - العنوان", 'name' => "type_{$i}_title", 'type' => 'text', 'default_value' => $default_lp_types[$i]['title']];
		$lawsuits_fields[] = ['key' => "field_lp_type_{$i}_desc", 'label' => "نوع {$i} - الوصف", 'name' => "type_{$i}_desc", 'type' => 'textarea', 'default_value' => $default_lp_types[$i]['desc']];
	}

	$lawsuits_fields[] = ['key' => 'field_lp_steps_tab', 'label' => 'Steps Section', 'type' => 'tab'];
	$lawsuits_fields[] = ['key' => 'field_lp_steps_title', 'label' => 'عنوان القسم', 'name' => 'steps_title', 'type' => 'text', 'default_value' => 'لماذا نحن الأفضل في صياغة الدعاوى؟'];
	$lawsuits_fields[] = ['key' => 'field_lp_steps_sub', 'label' => 'النص الفرعي', 'name' => 'steps_subtitle', 'type' => 'textarea', 'default_value' => 'نحرص على تقديم خدمة متكاملة تبدأ من دراسة القضية وحتى تقديم الدعوى:'];
	
	$default_lp_steps = [
		1 => ['title' => 'دراسة متعمقة', 'desc' => 'نحلل كافة تفاصيل ومستندات القضية قبل البدء بالصياغة.'],
		2 => ['title' => 'صياغة محكمة', 'desc' => 'نستخدم لغة قانونية دقيقة ومباشرة لضمان وضوح الطلبات.'],
		3 => ['title' => 'متابعة وتحديث', 'desc' => 'نواكب أي تحديثات في الأنظمة لضمان توافق الدعوى مع أحدث التشريعات.']
	];
	for ($i = 1; $i <= 3; $i++) {
		$lawsuits_fields[] = ['key' => "field_lp_step_{$i}_icon", 'label' => "خطوة {$i} - أيقونة", 'name' => "step_{$i}_icon", 'type' => 'image', 'return_format' => 'url'];
		$lawsuits_fields[] = ['key' => "field_lp_step_{$i}_title", 'label' => "خطوة {$i} - العنوان", 'name' => "step_{$i}_title", 'type' => 'text', 'default_value' => $default_lp_steps[$i]['title']];
		$lawsuits_fields[] = ['key' => "field_lp_step_{$i}_desc", 'label' => "خطوة {$i} - الوصف", 'name' => "step_{$i}_desc", 'type' => 'textarea', 'default_value' => $default_lp_steps[$i]['desc']];
	}

	$lawsuits_fields[] = ['key' => 'field_lp_faq_tab', 'label' => 'FAQ Section', 'type' => 'tab'];
	$lawsuits_fields[] = ['key' => 'field_lp_faq_title', 'label' => 'عنوان القسم', 'name' => 'faq_title', 'type' => 'text', 'default_value' => 'الأسئلة الشائعة حول إعداد الدعاوى'];
	$lawsuits_fields[] = ['key' => 'field_lp_faq_sub', 'label' => 'النص الفرعي', 'name' => 'faq_subtitle', 'type' => 'text', 'default_value' => 'إجابات وافية لاستفساراتكم'];
	
	$default_lp_faqs = [
		1 => ['q' => 'هل يمكنكم صياغة دعوى إلكترونياً لتقديمها عبر منصة ناجز؟', 'a' => 'نعم، نحن نصيغ الدعوى بشكل يتوافق تماماً مع متطلبات التقديم الإلكتروني عبر ناجز.'],
		2 => ['q' => 'ما هي المستندات المطلوبة للبدء في صياغة الدعوى؟', 'a' => 'نحتاج إلى كافة العقود، المراسلات، والمستندات ذات الصلة بموضوع النزاع.'],
		3 => ['q' => 'هل تضمنون كسب القضية بعد صياغة الدعوى؟', 'a' => 'النتيجة بيد القضاء، لكننا نضمن تقديم دعوى قوية ومحكمة قانونياً لتعزيز فرص نجاحك بأقصى درجة.']
	];
	for ($i = 1; $i <= 5; $i++) {
		$q_val = isset($default_lp_faqs[$i]) ? $default_lp_faqs[$i]['q'] : '';
		$a_val = isset($default_lp_faqs[$i]) ? $default_lp_faqs[$i]['a'] : '';
		$lawsuits_fields[] = ['key' => "field_lp_faq_{$i}_q", 'label' => "سؤال {$i}", 'name' => "faq_{$i}_question", 'type' => 'text', 'default_value' => $q_val];
		$lawsuits_fields[] = ['key' => "field_lp_faq_{$i}_a", 'label' => "إجابة {$i}", 'name' => "faq_{$i}_answer", 'type' => 'textarea', 'default_value' => $a_val];
	}

	acf_add_local_field_group([
		'key' => 'group_lawsuits_preparation',
		'title' => 'إعدادات صفحة إعداد الدعاوى القضائية',
		'location' => [
			[['param' => 'page_template', 'operator' => '==', 'value' => 'template-lawsuits-preparation.php']]
		],
		'fields' => $lawsuits_fields,
	]);

	// ---------------------------------------------------------
	// 4. Memos Template
	// ---------------------------------------------------------
	$memos_fields = [
		['key' => 'field_mm_hero_tab', 'label' => 'Hero Section', 'type' => 'tab'],
		['key' => 'field_mm_hero_title', 'label' => 'العنوان الرئيسي', 'name' => 'hero_title', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'كتابة المذكرات القانونية بجميع أنواعها'],
		['key' => 'field_mm_hero_subtitle', 'label' => 'النص الفرعي', 'name' => 'hero_subtitle', 'type' => 'textarea', 'default_value' => 'المذكرات القانونية هي صوتك أمام القضاء، وصياغتها باحترافية هي الفاصل بين كسب القضية أو خسارتها. نحن في مكتب المستشار القانوني آمال المالكي نقدم خدمة صياغة المذكرات القانونية بدقة متناهية تستند إلى أقوى الأسانيد الشرعية والنظامية.'],
		['key' => 'field_mm_hero_btn_text', 'label' => 'نص الزر', 'name' => 'hero_btn_text', 'type' => 'text', 'default_value' => 'اطلب الخدمة الان'],
		['key' => 'field_mm_hero_btn_url', 'label' => 'رابط الزر', 'name' => 'hero_btn_url', 'type' => 'url', 'default_value' => 'https://wa.me/9660541415099'],
		['key' => 'field_mm_hero_bg', 'label' => 'صورة الخلفية', 'name' => 'hero_bg', 'type' => 'image', 'return_format' => 'url'],

		['key' => 'field_mm_why_tab', 'label' => 'Why Us Section', 'type' => 'tab'],
		['key' => 'field_mm_why_img', 'label' => 'صورة القسم', 'name' => 'why_us_image', 'type' => 'image', 'return_format' => 'url'],
		['key' => 'field_mm_why_title', 'label' => 'العنوان', 'name' => 'why_us_title', 'type' => 'text', 'default_value' => 'أهمية صياغة المذكرات القانونية بشكل احترافي'],
		['key' => 'field_mm_why_subtitle', 'label' => 'النص الفرعي 1', 'name' => 'why_us_subtitle', 'type' => 'text', 'default_value' => 'المذكرات هي حجر الزاوية في بناء قناعة القاضي، ومن خلالها نضمن لك:'],
		['key' => 'field_mm_why_desc', 'label' => 'النص الفرعي 2', 'name' => 'why_us_desc', 'type' => 'textarea'],
	];
	
	$default_mm_lists = [
		'الرد المفحم على ادعاءات الخصوم وتفنيد أدلتهم.',
		'إبراز النصوص النظامية والسوابق القضائية المؤيدة لموقفك.',
		'تسليط الضوء على النقاط الجوهرية التي قد تغير مسار القضية.'
	];
	for ($i = 1; $i <= 5; $i++) {
		$def_val = isset($default_mm_lists[$i-1]) ? $default_mm_lists[$i-1] : '';
		$memos_fields[] = ['key' => "field_mm_why_list_{$i}", 'label' => "نقطة {$i}", 'name' => "why_us_list_{$i}", 'type' => 'text', 'default_value' => $def_val];
	}
	$memos_fields[] = ['key' => 'field_mm_why_btn', 'label' => 'نص الزر', 'name' => 'why_us_btn_text', 'type' => 'text', 'default_value' => 'اعرف المزيد عن خدماتنا'];
	$memos_fields[] = ['key' => 'field_mm_why_url', 'label' => 'رابط الزر', 'name' => 'why_us_btn_url', 'type' => 'url', 'default_value' => '#'];

	$memos_fields[] = ['key' => 'field_mm_types_tab', 'label' => 'Specialization Types', 'type' => 'tab'];
	$memos_fields[] = ['key' => 'field_mm_types_title', 'label' => 'عنوان القسم', 'name' => 'types_title', 'type' => 'text', 'default_value' => 'أنواع المذكرات التي نقوم بصياغتها'];
	$memos_fields[] = ['key' => 'field_mm_types_sub', 'label' => 'النص الفرعي', 'name' => 'types_subtitle', 'type' => 'text', 'default_value' => 'نقدم خدمات صياغة المذكرات لكافة درجات التقاضي، ومنها:'];
	
	$default_mm_types = [
		1 => ['title' => 'مذكرة تحرير دعوى', 'desc' => 'صياغة متكاملة للدعوى تتضمن تحرير الوقائع والأسانيد والطلبات الختامية بدقة واحترافية.'],
		2 => ['title' => 'المذكرة الجوابية', 'desc' => 'الرد القانوني الرصين على لائحة الدعوى أو مذكرات الخصم لتفنيد الادعاءات.'],
		3 => ['title' => 'لائحة اعتراضية (استئناف)', 'desc' => 'صياغة أسباب الاستئناف على الأحكام الابتدائية لطلب نقضها أو تعديلها.']
	];
	for ($i = 1; $i <= 3; $i++) {
		$memos_fields[] = ['key' => "field_mm_type_{$i}_img", 'label' => "نوع {$i} - صورة", 'name' => "type_{$i}_image", 'type' => 'image', 'return_format' => 'url'];
		$memos_fields[] = ['key' => "field_mm_type_{$i}_title", 'label' => "نوع {$i} - العنوان", 'name' => "type_{$i}_title", 'type' => 'text', 'default_value' => $default_mm_types[$i]['title']];
		$memos_fields[] = ['key' => "field_mm_type_{$i}_desc", 'label' => "نوع {$i} - الوصف", 'name' => "type_{$i}_desc", 'type' => 'textarea', 'default_value' => $default_mm_types[$i]['desc']];
	}

	$memos_fields[] = ['key' => 'field_mm_steps_tab', 'label' => 'Steps Section', 'type' => 'tab'];
	$memos_fields[] = ['key' => 'field_mm_steps_title', 'label' => 'عنوان القسم', 'name' => 'steps_title', 'type' => 'text', 'default_value' => 'لماذا نحن الأفضل في صياغة المذكرات؟'];
	$memos_fields[] = ['key' => 'field_mm_steps_sub', 'label' => 'النص الفرعي', 'name' => 'steps_subtitle', 'type' => 'textarea', 'default_value' => 'نتميز بمنهجية عمل دقيقة تضمن تحقيق أفضل النتائج:'];
	
	$default_mm_steps = [
		1 => ['title' => 'دراسة شاملة', 'desc' => 'قراءة متأنية لكافة أوراق القضية وملفاتها لاستخراج نقاط القوة والضعف.'],
		2 => ['title' => 'صياغة رصينة', 'desc' => 'استخدام لغة قانونية قوية ومقنعة تركز على جوهر النزاع.'],
		3 => ['title' => 'سرعة الإنجاز', 'desc' => 'نلتزم بتسليم المذكرات قبل المواعيد المحددة لضمان تقديمها في الوقت المناسب.']
	];
	for ($i = 1; $i <= 3; $i++) {
		$memos_fields[] = ['key' => "field_mm_step_{$i}_icon", 'label' => "خطوة {$i} - أيقونة", 'name' => "step_{$i}_icon", 'type' => 'image', 'return_format' => 'url'];
		$memos_fields[] = ['key' => "field_mm_step_{$i}_title", 'label' => "خطوة {$i} - العنوان", 'name' => "step_{$i}_title", 'type' => 'text', 'default_value' => $default_mm_steps[$i]['title']];
		$memos_fields[] = ['key' => "field_mm_step_{$i}_desc", 'label' => "خطوة {$i} - الوصف", 'name' => "step_{$i}_desc", 'type' => 'textarea', 'default_value' => $default_mm_steps[$i]['desc']];
	}

	$memos_fields[] = ['key' => 'field_mm_faq_tab', 'label' => 'FAQ Section', 'type' => 'tab'];
	$memos_fields[] = ['key' => 'field_mm_faq_title', 'label' => 'عنوان القسم', 'name' => 'faq_title', 'type' => 'text', 'default_value' => 'الأسئلة الشائعة حول المذكرات القانونية'];
	$memos_fields[] = ['key' => 'field_mm_faq_sub', 'label' => 'النص الفرعي', 'name' => 'faq_subtitle', 'type' => 'text', 'default_value' => 'إجابات على استفساراتكم'];
	
	$default_mm_faqs = [
		1 => ['q' => 'ما الفرق بين مذكرة تحرير الدعوى والمذكرة الجوابية؟', 'a' => 'تحرير الدعوى يقدمها المدعي لبيان طلباته، بينما المذكرة الجوابية يقدمها المدعى عليه للرد على تلك الطلبات.'],
		2 => ['q' => 'هل تصيغون مذكرات لتقديمها أمام المحكمة العليا؟', 'a' => 'نعم، نمتلك الخبرة اللازمة لصياغة لوائح الاعتراض بطريق النقض أمام المحكمة العليا.'],
		3 => ['q' => 'كم أحتاج من الوقت للحصول على المذكرة جاهزة؟', 'a' => 'ننجز المذكرات في وقت قياسي بناءً على حجم القضية والموعد المحدد للجلسة القادمة.']
	];
	for ($i = 1; $i <= 5; $i++) {
		$q_val = isset($default_mm_faqs[$i]) ? $default_mm_faqs[$i]['q'] : '';
		$a_val = isset($default_mm_faqs[$i]) ? $default_mm_faqs[$i]['a'] : '';
		$memos_fields[] = ['key' => "field_mm_faq_{$i}_q", 'label' => "سؤال {$i}", 'name' => "faq_{$i}_question", 'type' => 'text', 'default_value' => $q_val];
		$memos_fields[] = ['key' => "field_mm_faq_{$i}_a", 'label' => "إجابة {$i}", 'name' => "faq_{$i}_answer", 'type' => 'textarea', 'default_value' => $a_val];
	}

	acf_add_local_field_group([
		'key' => 'group_memos',
		'title' => 'إعدادات صفحة المذكرات الجوابية',
		'location' => [
			[['param' => 'page_template', 'operator' => '==', 'value' => 'template-memos.php']]
		],
		'fields' => $memos_fields,
	]);

	// ---------------------------------------------------------
	// 5. Legal Consultant Template
	// ---------------------------------------------------------
	$consultant_fields = [
		['key' => 'field_lc_hero_tab', 'label' => 'Hero Section', 'type' => 'tab'],
		['key' => 'field_lc_hero_title', 'label' => 'العنوان الرئيسي', 'name' => 'hero_title', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'مستشار قانوني معتمد لتأسيس الشركات في السعودية'],
		['key' => 'field_lc_hero_subtitle', 'label' => 'النص الفرعي', 'name' => 'hero_subtitle', 'type' => 'textarea', 'default_value' => 'نلتزم بتقديم استشارات قانونية متميزة لتأسيس الشركات بأنواعها وفق الأنظمة واللوائح المعمول بها في المملكة، من خلال فريق قانوني متخصص يقدم لك الدعم المتكامل لضمان نجاح أعمالك.'],
		['key' => 'field_lc_hero_btn_text', 'label' => 'نص الزر', 'name' => 'hero_btn_text', 'type' => 'text', 'default_value' => 'اطلب الخدمة الان'],
		['key' => 'field_lc_hero_btn_url', 'label' => 'رابط الزر', 'name' => 'hero_btn_url', 'type' => 'url', 'default_value' => 'https://wa.me/9660541415099'],
		['key' => 'field_lc_hero_bg', 'label' => 'صورة الخلفية', 'name' => 'hero_bg', 'type' => 'image', 'return_format' => 'url'],

		['key' => 'field_lc_why_tab', 'label' => 'Why Us Section', 'type' => 'tab'],
		['key' => 'field_lc_why_img', 'label' => 'صورة القسم', 'name' => 'why_us_image', 'type' => 'image', 'return_format' => 'url'],
		['key' => 'field_lc_why_title', 'label' => 'العنوان', 'name' => 'why_us_title', 'type' => 'text', 'default_value' => 'لماذا تحتاج إلى مستشار قانوني معتمد لتأسيس الشركات؟'],
		['key' => 'field_lc_why_subtitle', 'label' => 'النص الفرعي 1', 'name' => 'why_us_subtitle', 'type' => 'text', 'default_value' => 'الإدارة القانونية الصحيحة هي التي تحمي استثماراتك مستقبلا، دورنا كفريق متخصص يشمل:'],
		['key' => 'field_lc_why_desc', 'label' => 'النص الفرعي 2', 'name' => 'why_us_desc', 'type' => 'textarea'],
	];
	
	$default_lc_lists = [
		'تحديد الهيكل القانوني الأمثل للشركة (ذات مسؤولية محدودة، مساهمة مبسطة، إلخ).',
		'صياغة مذكرات التفاهم وعقود التأسيس بما يحفظ حقوق جميع الأطراف.',
		'توفير الاستشارة القانونية للشركات فيما يخص متطلبات وزارة الاستثمار ووزارة التجارة.'
	];
	for ($i = 1; $i <= 5; $i++) {
		$def_val = isset($default_lc_lists[$i-1]) ? $default_lc_lists[$i-1] : '';
		$consultant_fields[] = ['key' => "field_lc_why_list_{$i}", 'label' => "نقطة {$i}", 'name' => "why_us_list_{$i}", 'type' => 'text', 'default_value' => $def_val];
	}
	$consultant_fields[] = ['key' => 'field_lc_why_btn', 'label' => 'نص الزر', 'name' => 'why_us_btn_text', 'type' => 'text', 'default_value' => 'اعرف المزيد عن خدماتنا'];
	$consultant_fields[] = ['key' => 'field_lc_why_url', 'label' => 'رابط الزر', 'name' => 'why_us_btn_url', 'type' => 'url', 'default_value' => '#'];

	$consultant_fields[] = ['key' => 'field_lc_types_tab', 'label' => 'Specialization Types', 'type' => 'tab'];
	$consultant_fields[] = ['key' => 'field_lc_types_title', 'label' => 'عنوان القسم', 'name' => 'types_title', 'type' => 'text', 'default_value' => 'خدماتنا في الاستشارة القانونية للشركات'];
	$consultant_fields[] = ['key' => 'field_lc_types_sub', 'label' => 'النص الفرعي', 'name' => 'types_subtitle', 'type' => 'text', 'default_value' => 'نقدم استشارات قانونية تغطي كافة احتياجاتك، ومنها:'];
	
	$default_lc_types = [
		1 => ['title' => 'حوكمة الشركات', 'desc' => 'إعداد لوائح الحوكمة وتطبيق القواعد المنظمة للشركات.'],
		2 => ['title' => 'صياغة العقود التجارية', 'desc' => 'صياغة ومراجعة كافة العقود التجارية بشكل احترافي.'],
		3 => ['title' => 'السجل التجاري', 'desc' => 'متابعة إصدار وتعديل وتجديد السجلات التجارية للشركات.']
	];
	for ($i = 1; $i <= 3; $i++) {
		$consultant_fields[] = ['key' => "field_lc_type_{$i}_img", 'label' => "نوع {$i} - صورة", 'name' => "type_{$i}_image", 'type' => 'image', 'return_format' => 'url'];
		$consultant_fields[] = ['key' => "field_lc_type_{$i}_title", 'label' => "نوع {$i} - العنوان", 'name' => "type_{$i}_title", 'type' => 'text', 'default_value' => $default_lc_types[$i]['title']];
		$consultant_fields[] = ['key' => "field_lc_type_{$i}_desc", 'label' => "نوع {$i} - الوصف", 'name' => "type_{$i}_desc", 'type' => 'textarea', 'default_value' => $default_lc_types[$i]['desc']];
	}

	$consultant_fields[] = ['key' => 'field_lc_trust_tab', 'label' => 'Trust Section', 'type' => 'tab'];
	$consultant_fields[] = ['key' => 'field_lc_trust_title', 'label' => 'عنوان القسم', 'name' => 'trust_title', 'type' => 'text', 'default_value' => 'كيف نحقق معايير الثقة والخبرة؟'];
	$consultant_fields[] = ['key' => 'field_lc_trust_sub', 'label' => 'النص الفرعي', 'name' => 'trust_subtitle', 'type' => 'textarea', 'default_value' => 'نلتزم بتقديم أعلى مستويات الجودة والاحترافية في العمل.'];
	$consultant_fields[] = ['key' => 'field_lc_trust_icon', 'label' => 'صورة/أيقونة الثقة', 'name' => 'trust_icon', 'type' => 'image', 'return_format' => 'url'];
	$consultant_fields[] = ['key' => 'field_lc_trust_desc', 'label' => 'وصف الثقة', 'name' => 'trust_desc', 'type' => 'textarea', 'default_value' => 'عندما تتعامل مع مستشار قانوني معتمد لتأسيس الشركات من فريقنا، فأنت تحصل على خبرة ممتدة في السوق السعودي مع الالتزام التام بالسرية والاحترافية التي تفرضها هوية المحاماة والاستشارات القانونية.'];

	$consultant_fields[] = ['key' => 'field_lc_faq_tab', 'label' => 'FAQ Section', 'type' => 'tab'];
	$consultant_fields[] = ['key' => 'field_lc_faq_title', 'label' => 'عنوان القسم', 'name' => 'faq_title', 'type' => 'text', 'default_value' => 'الأسئلة الشائعة حول الاستشارة القانونية للشركات'];
	$consultant_fields[] = ['key' => 'field_lc_faq_sub', 'label' => 'النص الفرعي', 'name' => 'faq_subtitle', 'type' => 'text', 'default_value' => 'إجابات على أكثر الأسئلة شيوعاً حول خدماتنا'];
	
	$default_lc_faqs = [
		1 => ['q' => 'ما هي أهمية وجود مستشار قانوني عند التأسيس؟', 'a' => 'المستشار القانوني يضمن اختيار الكيان القانوني الصحيح وتجنب أي ثغرات قد تكلف الشركة مبالغ طائلة مستقبلاً.'],
		2 => ['q' => 'هل تقدمون استشارات دورية للشركات؟', 'a' => 'نعم، نقدم عقود استشارات قانونية سنوية أو شهرية تلبي كافة احتياجات الشركات التجارية.'],
		3 => ['q' => 'أفضل خيار لتأسيس شركة الآن؟', 'a' => 'يعتمد الخيار الأفضل على حجم استثمارك وعدد الشركاء ونوع النشاط، ولذلك نقوم بدراسة حالتك وتقديم التوصية الأنسب.']
	];
	for ($i = 1; $i <= 5; $i++) {
		$q_val = isset($default_lc_faqs[$i]) ? $default_lc_faqs[$i]['q'] : '';
		$a_val = isset($default_lc_faqs[$i]) ? $default_lc_faqs[$i]['a'] : '';
		$consultant_fields[] = ['key' => "field_lc_faq_{$i}_q", 'label' => "سؤال {$i}", 'name' => "faq_{$i}_question", 'type' => 'text', 'default_value' => $q_val];
		$consultant_fields[] = ['key' => "field_lc_faq_{$i}_a", 'label' => "إجابة {$i}", 'name' => "faq_{$i}_answer", 'type' => 'textarea', 'default_value' => $a_val];
	}

	acf_add_local_field_group([
		'key' => 'group_legal_consultant',
		'title' => 'إعدادات صفحة مستشار قانوني لتأسيس الشركات',
		'location' => [
			[['param' => 'page_template', 'operator' => '==', 'value' => 'template-legal-consultant.php']]
		],
		'fields' => $consultant_fields,
	]);

	// ---------------------------------------------------------
	// 6. Notarization Services Template
	// ---------------------------------------------------------
	$notarization_fields = [
		['key' => 'field_ns_hero_tab', 'label' => 'Hero Section', 'type' => 'tab'],
		['key' => 'field_ns_hero_title', 'label' => 'العنوان الرئيسي', 'name' => 'hero_title', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'محامي توثيق عقود الشركات في جدة والسعودية'],
		['key' => 'field_ns_hero_subtitle', 'label' => 'النص الفرعي', 'name' => 'hero_subtitle', 'type' => 'textarea', 'default_value' => 'توثيق العقود القانونية هو الخطوة الأولى في حماية حقوقك. نحن في مكتب المستشار القانوني آمال المالكي نقدم خدمة التوثيق القانوني بأسلوب دقيق يحفظ حقوق الشركات ورجال الأعمال.'],
		['key' => 'field_ns_hero_btn_text', 'label' => 'نص الزر', 'name' => 'hero_btn_text', 'type' => 'text', 'default_value' => 'اطلب الخدمة الان'],
		['key' => 'field_ns_hero_btn_url', 'label' => 'رابط الزر', 'name' => 'hero_btn_url', 'type' => 'url', 'default_value' => 'https://wa.me/9660541415099'],
		['key' => 'field_ns_hero_bg', 'label' => 'صورة الخلفية', 'name' => 'hero_bg', 'type' => 'image', 'return_format' => 'url'],

		['key' => 'field_ns_why_tab', 'label' => 'Why Us Section', 'type' => 'tab'],
		['key' => 'field_ns_why_img', 'label' => 'صورة القسم', 'name' => 'why_us_image', 'type' => 'image', 'return_format' => 'url'],
		['key' => 'field_ns_why_title', 'label' => 'العنوان', 'name' => 'why_us_title', 'type' => 'text', 'default_value' => 'أهمية الاستعانة بـ محامي توثيق عقود الشركات في جدة؟'],
		['key' => 'field_ns_why_subtitle', 'label' => 'النص الفرعي 1', 'name' => 'why_us_subtitle', 'type' => 'text', 'default_value' => 'التوثيق ليس مجرد ختم بل هو إقرار بصحة الأوراق القانونية للشركات. نحن نساعدك في:'],
		['key' => 'field_ns_why_desc', 'label' => 'النص الفرعي 2', 'name' => 'why_us_desc', 'type' => 'textarea'],
	];
	
	$default_ns_lists = [
		'إثبات صحة التوقيعات على الاتفاقيات والعقود الخاصة.',
		'توثيق الوكالات التجارية وتصريحات الإدارة.'
	];
	for ($i = 1; $i <= 5; $i++) {
		$def_val = isset($default_ns_lists[$i-1]) ? $default_ns_lists[$i-1] : '';
		$notarization_fields[] = ['key' => "field_ns_why_list_{$i}", 'label' => "نقطة {$i}", 'name' => "why_us_list_{$i}", 'type' => 'text', 'default_value' => $def_val];
	}
	$notarization_fields[] = ['key' => 'field_ns_why_btn', 'label' => 'نص الزر', 'name' => 'why_us_btn_text', 'type' => 'text', 'default_value' => 'اعرف المزيد عن خدماتنا'];
	$notarization_fields[] = ['key' => 'field_ns_why_url', 'label' => 'رابط الزر', 'name' => 'why_us_btn_url', 'type' => 'url', 'default_value' => '#'];

	$notarization_fields[] = ['key' => 'field_ns_types_tab', 'label' => 'Specialization Types', 'type' => 'tab'];
	$notarization_fields[] = ['key' => 'field_ns_types_title', 'label' => 'عنوان القسم', 'name' => 'types_title', 'type' => 'text', 'default_value' => 'خدماتنا في توثيق عقود الشركات'];
	$notarization_fields[] = ['key' => 'field_ns_types_sub', 'label' => 'النص الفرعي', 'name' => 'types_subtitle', 'type' => 'text', 'default_value' => 'نغطي كافة احتياجات الشركات في جدة والمملكة بشكل عام.'];
	
	$default_ns_types = [
		1 => ['title' => 'توثيق عقود التأسيس', 'desc' => 'إصدار وتوثيق العقود وتعديلاتها قانونياً.'],
		2 => ['title' => 'أعمال الملكية', 'desc' => 'ضمان انتقال الملكية وتوثيق السندات لضمان الحقوق.'],
		3 => ['title' => 'التوثيق التجاري للشركات', 'desc' => 'إقرار واعتماد وتوثيق العقود التجارية للشركات الكبرى.']
	];
	for ($i = 1; $i <= 3; $i++) {
		$notarization_fields[] = ['key' => "field_ns_type_{$i}_img", 'label' => "نوع {$i} - صورة", 'name' => "type_{$i}_image", 'type' => 'image', 'return_format' => 'url'];
		$notarization_fields[] = ['key' => "field_ns_type_{$i}_title", 'label' => "نوع {$i} - العنوان", 'name' => "type_{$i}_title", 'type' => 'text', 'default_value' => $default_ns_types[$i]['title']];
		$notarization_fields[] = ['key' => "field_ns_type_{$i}_desc", 'label' => "نوع {$i} - الوصف", 'name' => "type_{$i}_desc", 'type' => 'textarea', 'default_value' => $default_ns_types[$i]['desc']];
	}

	$notarization_fields[] = ['key' => 'field_ns_steps_tab', 'label' => 'Steps Section', 'type' => 'tab'];
	$notarization_fields[] = ['key' => 'field_ns_steps_title', 'label' => 'عنوان القسم', 'name' => 'steps_title', 'type' => 'text', 'default_value' => 'لماذا مكتب المستشار القانوني آمال المالكي للتوثيق القانوني؟'];
	$notarization_fields[] = ['key' => 'field_ns_steps_sub', 'label' => 'النص الفرعي', 'name' => 'steps_subtitle', 'type' => 'textarea', 'default_value' => 'إعداد قانوني دقيق يضمن قوة الدعوى بشكل يضمن حقوقك خلال التنفيذ.'];
	
	$default_ns_steps = [
		1 => ['title' => 'إنجاز قانوني باحترافية عالية', 'desc' => 'سرعة ودقة في التعامل مع توثيق عقود وتعديلات الشركات في وقت قياسي.'],
		2 => ['title' => 'مرونة في إجراءات التوثيق', 'desc' => 'القدرة على إنهاء الإجراءات حضورياً أو إلكترونياً بما يناسب وقت العميل.'],
		3 => ['title' => 'توثيق متوافق مع الأنظمة السعودية', 'desc' => 'التأكد من مطابقة جميع المواد وتوثيقها لكافة الأنظمة المعمول بها في السعودية.']
	];
	for ($i = 1; $i <= 3; $i++) {
		$notarization_fields[] = ['key' => "field_ns_step_{$i}_icon", 'label' => "خطوة {$i} - أيقونة", 'name' => "step_{$i}_icon", 'type' => 'image', 'return_format' => 'url'];
		$notarization_fields[] = ['key' => "field_ns_step_{$i}_title", 'label' => "خطوة {$i} - العنوان", 'name' => "step_{$i}_title", 'type' => 'text', 'default_value' => $default_ns_steps[$i]['title']];
		$notarization_fields[] = ['key' => "field_ns_step_{$i}_desc", 'label' => "خطوة {$i} - الوصف", 'name' => "step_{$i}_desc", 'type' => 'textarea', 'default_value' => $default_ns_steps[$i]['desc']];
	}

	$notarization_fields[] = ['key' => 'field_ns_faq_tab', 'label' => 'FAQ Section', 'type' => 'tab'];
	$notarization_fields[] = ['key' => 'field_ns_faq_title', 'label' => 'عنوان القسم', 'name' => 'faq_title', 'type' => 'text', 'default_value' => 'الأسئلة الشائعة حول توثيق العقود'];
	$notarization_fields[] = ['key' => 'field_ns_faq_sub', 'label' => 'النص الفرعي', 'name' => 'faq_subtitle', 'type' => 'text', 'default_value' => 'إجابات على أكثر الأسئلة شيوعاً حول خدماتنا'];
	
	$default_ns_faqs = [
		1 => ['q' => 'هل التوثيق الإلكتروني معتمد؟', 'a' => 'نعم، التوثيق الإلكتروني عبر منصة الموثق معتمد رسمياً من وزارة العدل وله نفس الحجية القانونية.'],
		2 => ['q' => 'ما هي الأوراق المطلوبة لتوثيق عقد شركة؟', 'a' => 'يطلب السجل التجاري، وهويات الشركاء، وعقد التأسيس المراد توثيقه أو تعديله، وأي قرارات جمعية عمومية إن وجدت.'],
		3 => ['q' => 'هل يمكن توثيق عقود التأسيس إلكترونياً؟', 'a' => 'نعم، يمكن توثيق عقود تأسيس الشركات وملحق التعديل إلكترونياً عبر خدمة الموثق بكل سهولة وموثوقية.']
	];
	for ($i = 1; $i <= 5; $i++) {
		$q_val = isset($default_ns_faqs[$i]) ? $default_ns_faqs[$i]['q'] : '';
		$a_val = isset($default_ns_faqs[$i]) ? $default_ns_faqs[$i]['a'] : '';
		$notarization_fields[] = ['key' => "field_ns_faq_{$i}_q", 'label' => "سؤال {$i}", 'name' => "faq_{$i}_question", 'type' => 'text', 'default_value' => $q_val];
		$notarization_fields[] = ['key' => "field_ns_faq_{$i}_a", 'label' => "إجابة {$i}", 'name' => "faq_{$i}_answer", 'type' => 'textarea', 'default_value' => $a_val];
	}

	acf_add_local_field_group([
		'key' => 'group_notarization_services',
		'title' => 'إعدادات صفحة خدمات التوثيق',
		'location' => [
			[['param' => 'page_template', 'operator' => '==', 'value' => 'template-notarization.php']]
		],
		'fields' => $notarization_fields,
	]);

	// ---------------------------------------------------------
	// 7. Hearings / Representation Template
	// ---------------------------------------------------------
	$hearings_fields = [
		['key' => 'field_hr_hero_tab', 'label' => 'Hero Section', 'type' => 'tab'],
		['key' => 'field_hr_hero_title', 'label' => 'العنوان الرئيسي', 'name' => 'hero_title', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'محامي ترافع وتمثيل قانوني للشركات والأفراد'],
		['key' => 'field_hr_hero_subtitle', 'label' => 'النص الفرعي', 'name' => 'hero_subtitle', 'type' => 'textarea', 'default_value' => 'الترافع والمثول أمام المحاكم واللجان القضائية وشبه القضائية يمثل الجزء الأهم من نجاح القضية. نحن في مكتب المستشار القانوني آمال المالكي نضمن لك تمثيلاً قانونياً قوياً من خلال فريق محامين متخصصين في كافة أنواع القضايا التجارية.'],
		['key' => 'field_hr_hero_btn_text', 'label' => 'نص الزر', 'name' => 'hero_btn_text', 'type' => 'text', 'default_value' => 'اطلب الخدمة الان'],
		['key' => 'field_hr_hero_btn_url', 'label' => 'رابط الزر', 'name' => 'hero_btn_url', 'type' => 'url', 'default_value' => 'https://wa.me/9660541415099'],
		['key' => 'field_hr_hero_bg', 'label' => 'صورة الخلفية', 'name' => 'hero_bg', 'type' => 'image', 'return_format' => 'url'],

		['key' => 'field_hr_why_tab', 'label' => 'Why Us Section', 'type' => 'tab'],
		['key' => 'field_hr_why_img', 'label' => 'صورة القسم', 'name' => 'why_us_image', 'type' => 'image', 'return_format' => 'url'],
		['key' => 'field_hr_why_title', 'label' => 'العنوان', 'name' => 'why_us_title', 'type' => 'text', 'default_value' => 'دور محامي ترافع وتمثيل قانوني'],
		['key' => 'field_hr_why_subtitle', 'label' => 'النص الفرعي 1', 'name' => 'why_us_subtitle', 'type' => 'text', 'default_value' => 'دورنا لا يقتصر على الحضور الشكلي، بل نقود استراتيجية التقاضي من خلال:'],
		['key' => 'field_hr_why_desc', 'label' => 'النص الفرعي 2', 'name' => 'why_us_desc', 'type' => 'textarea'],
	];
	
	$default_hr_lists = [
		'تمثيل الموكلين أمام كافة المحاكم التجارية، العامة، العمالية، والإدارية.',
		'إعداد الموقف القانوني والرد على استفسارات القضاة بشكل قوي ومقنع.',
		'تقديم الدفوع الشفهية والمكتوبة أثناء الجلسات ببراعة.'
	];
	for ($i = 1; $i <= 5; $i++) {
		$def_val = isset($default_hr_lists[$i-1]) ? $default_hr_lists[$i-1] : '';
		$hearings_fields[] = ['key' => "field_hr_why_list_{$i}", 'label' => "نقطة {$i}", 'name' => "why_us_list_{$i}", 'type' => 'text', 'default_value' => $def_val];
	}
	$hearings_fields[] = ['key' => 'field_hr_why_btn', 'label' => 'نص الزر', 'name' => 'why_us_btn_text', 'type' => 'text', 'default_value' => 'اعرف المزيد عن خدماتنا'];
	$hearings_fields[] = ['key' => 'field_hr_why_url', 'label' => 'رابط الزر', 'name' => 'why_us_btn_url', 'type' => 'url', 'default_value' => '#'];

	$hearings_fields[] = ['key' => 'field_hr_types_tab', 'label' => 'Specialization Types', 'type' => 'tab'];
	$hearings_fields[] = ['key' => 'field_hr_types_title', 'label' => 'عنوان القسم', 'name' => 'types_title', 'type' => 'text', 'default_value' => 'تمثيل الشركات في القضايا التجارية'];
	$hearings_fields[] = ['key' => 'field_hr_types_sub', 'label' => 'النص الفرعي', 'name' => 'types_subtitle', 'type' => 'text', 'default_value' => 'تتعرض الشركات لنزاعات معقدة تتطلب محامي ترافع وتمثيل قانوني يفهم لغة الأرقام والسوق:'];
	
	$default_hr_types = [
		1 => ['title' => 'قضايا المطالبات المالية', 'desc' => 'إثبات الحقوق والمطالبة بالديون والتعويضات المالية.'],
		2 => ['title' => 'نزاعات الشركاء', 'desc' => 'التدخل القانوني لتسوية الخلافات وحماية حصص الشركاء.'],
		3 => ['title' => 'قضايا الملكية الفكرية', 'desc' => 'الترافع في قضايا العلامات التجارية وحقوق الملكية الفكرية.']
	];
	for ($i = 1; $i <= 3; $i++) {
		$hearings_fields[] = ['key' => "field_hr_type_{$i}_img", 'label' => "نوع {$i} - صورة", 'name' => "type_{$i}_image", 'type' => 'image', 'return_format' => 'url'];
		$hearings_fields[] = ['key' => "field_hr_type_{$i}_title", 'label' => "نوع {$i} - العنوان", 'name' => "type_{$i}_title", 'type' => 'text', 'default_value' => $default_hr_types[$i]['title']];
		$hearings_fields[] = ['key' => "field_hr_type_{$i}_desc", 'label' => "نوع {$i} - الوصف", 'name' => "type_{$i}_desc", 'type' => 'textarea', 'default_value' => $default_hr_types[$i]['desc']];
	}

	$hearings_fields[] = ['key' => 'field_hr_steps_tab', 'label' => 'Steps Section', 'type' => 'tab'];
	$hearings_fields[] = ['key' => 'field_hr_steps_title', 'label' => 'عنوان القسم', 'name' => 'steps_title', 'type' => 'text', 'default_value' => 'لماذا تثق بالتمثيل القانوني؟'];
	$hearings_fields[] = ['key' => 'field_hr_steps_sub', 'label' => 'النص الفرعي', 'name' => 'steps_subtitle', 'type' => 'textarea', 'default_value' => 'تمثيل قانوني احترافي يحمي حقوقك ويعزز موقفك الدعوى:'];
	
	$default_hr_steps = [
		1 => ['title' => 'محامون مرخصون وإجراءات ناجز', 'desc' => 'فريقنا يضم نخبة من المحامين والمستشارين مرخصين ومسجلين بنظام ناجز.'],
		2 => ['title' => 'خبرة في القضايا التجارية الكبرى', 'desc' => 'تاريخ طويل من تمثيل الشركات في قضايا تجارية كبرى في المملكة.'],
		3 => ['title' => 'متابعة مستمرة وتحديثات فورية للقضايا', 'desc' => 'نحيط العميل بكافة مستجدات الجلسات ومسار القضية أولاً بأول.']
	];
	for ($i = 1; $i <= 3; $i++) {
		$hearings_fields[] = ['key' => "field_hr_step_{$i}_icon", 'label' => "خطوة {$i} - أيقونة", 'name' => "step_{$i}_icon", 'type' => 'image', 'return_format' => 'url'];
		$hearings_fields[] = ['key' => "field_hr_step_{$i}_title", 'label' => "خطوة {$i} - العنوان", 'name' => "step_{$i}_title", 'type' => 'text', 'default_value' => $default_hr_steps[$i]['title']];
		$hearings_fields[] = ['key' => "field_hr_step_{$i}_desc", 'label' => "خطوة {$i} - الوصف", 'name' => "step_{$i}_desc", 'type' => 'textarea', 'default_value' => $default_hr_steps[$i]['desc']];
	}

	$hearings_fields[] = ['key' => 'field_hr_faq_tab', 'label' => 'FAQ Section', 'type' => 'tab'];
	$hearings_fields[] = ['key' => 'field_hr_faq_title', 'label' => 'عنوان القسم', 'name' => 'faq_title', 'type' => 'text', 'default_value' => 'الأسئلة الشائعة حول التمثيل القضائي'];
	$hearings_fields[] = ['key' => 'field_hr_faq_sub', 'label' => 'النص الفرعي', 'name' => 'faq_subtitle', 'type' => 'text', 'default_value' => 'إجابات على أكثر الأسئلة شيوعاً حول خدماتنا'];
	
	$default_hr_faqs = [
		1 => ['q' => 'هل يمكن لمحامي تمثيلي دون حضوري؟', 'a' => 'نعم، بموجب وكالة شرعية يمكننا الترافع والحضور نيابة عنك في كافة الجلسات.'],
		2 => ['q' => 'ما هي أهمية تمثيل الشركات محلياً؟', 'a' => 'تمثيل الشركات يضمن التزامها بالأنظمة المحلية ويحميها من الغرامات أو المساءلة القانونية.'],
		3 => ['q' => 'جلسات الدعوى تبدأ من متى؟', 'a' => 'تبدأ الجلسات فور قيد الدعوى وإحالتها للدائرة القضائية وتحديد موعد الجلسة الأولى.']
	];
	for ($i = 1; $i <= 5; $i++) {
		$q_val = isset($default_hr_faqs[$i]) ? $default_hr_faqs[$i]['q'] : '';
		$a_val = isset($default_hr_faqs[$i]) ? $default_hr_faqs[$i]['a'] : '';
		$hearings_fields[] = ['key' => "field_hr_faq_{$i}_q", 'label' => "سؤال {$i}", 'name' => "faq_{$i}_question", 'type' => 'text', 'default_value' => $q_val];
		$hearings_fields[] = ['key' => "field_hr_faq_{$i}_a", 'label' => "إجابة {$i}", 'name' => "faq_{$i}_answer", 'type' => 'textarea', 'default_value' => $a_val];
	}

	acf_add_local_field_group([
		'key' => 'group_hearings',
		'title' => 'إعدادات صفحة حضور الجلسات القضائية',
		'location' => [
			[['param' => 'page_template', 'operator' => '==', 'value' => 'template-hearings.php']]
		],
		'fields' => $hearings_fields,
	]);

	// ---------------------------------------------------------
	// 8. Appeals / Cassation Template
	// ---------------------------------------------------------
	$appeals_fields = [
		['key' => 'field_ap_hero_tab', 'label' => 'Hero Section', 'type' => 'tab'],
		['key' => 'field_ap_hero_title', 'label' => 'العنوان الرئيسي', 'name' => 'hero_title', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'نقض واستئناف في السعودية من مكتب المستشار القانوني آمال المالكي'],
		['key' => 'field_ap_hero_subtitle', 'label' => 'النص الفرعي', 'name' => 'hero_subtitle', 'type' => 'textarea', 'default_value' => 'صدور حكم ابتدائي ليس نهاية المطاف! الاعتراض على الأحكام والمطالبة بالنقض في السعودية من أبرز ما يقدمه مكتب المستشار القانوني آمال المالكي متخصص في تحليل الأحكام واستنباط الأخطاء القانونية لتقديم لوائح اعتراضية قوية تضمن إعادة النظر في الحكم.'],
		['key' => 'field_ap_hero_btn_text', 'label' => 'نص الزر', 'name' => 'hero_btn_text', 'type' => 'text', 'default_value' => 'اطلب الخدمة الان'],
		['key' => 'field_ap_hero_btn_url', 'label' => 'رابط الزر', 'name' => 'hero_btn_url', 'type' => 'url', 'default_value' => 'https://wa.me/9660541415099'],
		['key' => 'field_ap_hero_bg', 'label' => 'صورة الخلفية', 'name' => 'hero_bg', 'type' => 'image', 'return_format' => 'url'],

		['key' => 'field_ap_why_tab', 'label' => 'Why Us Section', 'type' => 'tab'],
		['key' => 'field_ap_why_img', 'label' => 'صورة القسم', 'name' => 'why_us_image', 'type' => 'image', 'return_format' => 'url'],
		['key' => 'field_ap_why_title', 'label' => 'العنوان', 'name' => 'why_us_title', 'type' => 'text', 'default_value' => 'لماذا تحتاج إلى محامي نقض واستئناف في السعودية؟'],
		['key' => 'field_ap_why_subtitle', 'label' => 'النص الفرعي 1', 'name' => 'why_us_subtitle', 'type' => 'text', 'default_value' => 'مرحلة الاستئناف والنقض تتطلب دقة متناهية وفهماً عميقاً لنصوص النظام، حيث نقوم بـ:'],
		['key' => 'field_ap_why_desc', 'label' => 'النص الفرعي 2', 'name' => 'why_us_desc', 'type' => 'textarea'],
	];
	
	$default_ap_lists = [
		'مراجعة دقيقة للحكم الصادر والتأكد من مطابقته للأنظمة الشرعية والنظامية.',
		'رصد الأخطاء الإجرائية أو في تطبيق القانون التي وقعت فيها محكمة الدرجة الأولى.',
		'صياغة لوائح اعتراضية قوية ترتكز على أسانيد قانونية وشرعية متينة.'
	];
	for ($i = 1; $i <= 5; $i++) {
		$def_val = isset($default_ap_lists[$i-1]) ? $default_ap_lists[$i-1] : '';
		$appeals_fields[] = ['key' => "field_ap_why_list_{$i}", 'label' => "نقطة {$i}", 'name' => "why_us_list_{$i}", 'type' => 'text', 'default_value' => $def_val];
	}
	$appeals_fields[] = ['key' => 'field_ap_why_btn', 'label' => 'نص الزر', 'name' => 'why_us_btn_text', 'type' => 'text', 'default_value' => 'اعرف المزيد عن خدماتنا'];
	$appeals_fields[] = ['key' => 'field_ap_why_url', 'label' => 'رابط الزر', 'name' => 'why_us_btn_url', 'type' => 'url', 'default_value' => '#'];

	$appeals_fields[] = ['key' => 'field_ap_types_tab', 'label' => 'Specialization Types', 'type' => 'tab'];
	$appeals_fields[] = ['key' => 'field_ap_types_title', 'label' => 'عنوان القسم', 'name' => 'types_title', 'type' => 'text', 'default_value' => 'خدماتنا في قضايا الاستئناف والنقض'];
	$appeals_fields[] = ['key' => 'field_ap_types_sub', 'label' => 'النص الفرعي', 'name' => 'types_subtitle', 'type' => 'text', 'default_value' => 'خبرة قانونية دقيقة تضمن لموكلينا أقوى أداء أمام محكمة النقض.'];
	
	$default_ap_types = [
		1 => ['title' => 'محكمة الاستئناف', 'desc' => 'الاعتراض على الأحكام الابتدائية في قضايا تجارية وعمالية وأحوال شخصية أمام المحاكم.'],
		2 => ['title' => 'المحكمة العليا (النقض)', 'desc' => 'رفع دعوى نقض للمحكمة العليا إذا شاب الحكم مخالفة للنظام أو خطأ في تطبيقه.'],
		3 => ['title' => 'التماس إعادة النظر', 'desc' => 'تقديم طلب إعادة النظر في الأحكام النهائية بناءً على وقائع جديدة.']
	];
	for ($i = 1; $i <= 3; $i++) {
		$appeals_fields[] = ['key' => "field_ap_type_{$i}_img", 'label' => "نوع {$i} - صورة", 'name' => "type_{$i}_image", 'type' => 'image', 'return_format' => 'url'];
		$appeals_fields[] = ['key' => "field_ap_type_{$i}_title", 'label' => "نوع {$i} - العنوان", 'name' => "type_{$i}_title", 'type' => 'text', 'default_value' => $default_ap_types[$i]['title']];
		$appeals_fields[] = ['key' => "field_ap_type_{$i}_desc", 'label' => "نوع {$i} - الوصف", 'name' => "type_{$i}_desc", 'type' => 'textarea', 'default_value' => $default_ap_types[$i]['desc']];
	}

	$appeals_fields[] = ['key' => 'field_ap_steps_tab', 'label' => 'Steps Section', 'type' => 'tab'];
	$appeals_fields[] = ['key' => 'field_ap_steps_title', 'label' => 'عنوان القسم', 'name' => 'steps_title', 'type' => 'text', 'default_value' => 'مميزات التعامل في قضايا النقض'];
	$appeals_fields[] = ['key' => 'field_ap_steps_sub', 'label' => 'النص الفرعي', 'name' => 'steps_subtitle', 'type' => 'textarea', 'default_value' => 'مكتب المستشار القانوني آمال المالكي خيارك الأفضل في قضايا الاستئناف والنقض في السعودية للأسباب التالية:'];
	
	$default_ap_steps = [
		1 => ['title' => 'خبرة قانونية متخصصة', 'desc' => 'فريقنا يضم نخبة من المستشارين متخصصين في صياغة اللوائح الاعتراضية ومذكرات النقض.'],
		2 => ['title' => 'الالتزام بالمواعيد النظامية', 'desc' => 'الالتزام التام بالمدة المحددة للاعتراض لتجنب رفض الدعوى.'],
		3 => ['title' => 'الشفافية في تقييم القضايا', 'desc' => 'الشفافية التامة في تقييم مدى توافر أي أسباب لقبول النقض أو الاستئناف.']
	];
	for ($i = 1; $i <= 3; $i++) {
		$appeals_fields[] = ['key' => "field_ap_step_{$i}_icon", 'label' => "خطوة {$i} - أيقونة", 'name' => "step_{$i}_icon", 'type' => 'image', 'return_format' => 'url'];
		$appeals_fields[] = ['key' => "field_ap_step_{$i}_title", 'label' => "خطوة {$i} - العنوان", 'name' => "step_{$i}_title", 'type' => 'text', 'default_value' => $default_ap_steps[$i]['title']];
		$appeals_fields[] = ['key' => "field_ap_step_{$i}_desc", 'label' => "خطوة {$i} - الوصف", 'name' => "step_{$i}_desc", 'type' => 'textarea', 'default_value' => $default_ap_steps[$i]['desc']];
	}

	$appeals_fields[] = ['key' => 'field_ap_faq_tab', 'label' => 'FAQ Section', 'type' => 'tab'];
	$appeals_fields[] = ['key' => 'field_ap_faq_title', 'label' => 'عنوان القسم', 'name' => 'faq_title', 'type' => 'text', 'default_value' => 'الأسئلة الشائعة حول الاستئناف والنقض'];
	$appeals_fields[] = ['key' => 'field_ap_faq_sub', 'label' => 'النص الفرعي', 'name' => 'faq_subtitle', 'type' => 'text', 'default_value' => 'إجابات على أكثر الأسئلة شيوعاً حول خدماتنا'];
	
	$default_ap_faqs = [
		1 => ['q' => 'كم مدة الاستئناف في السعودية؟', 'a' => 'مدة الاستئناف هي 30 يوماً من تاريخ استلام الصك، وتتقلص إلى 10 أيام في القضايا المستعجلة.'],
		2 => ['q' => 'هل يمكن تقديم أدلة جديدة في مرحلة الاستئناف؟', 'a' => 'نعم، يجوز تقديم أدلة أو دفوع جديدة لم يسبق تقديمها في محكمة الدرجة الأولى.'],
		3 => ['q' => 'متى يكون الحكم نهائياً؟', 'a' => 'يصبح الحكم نهائياً إذا لم يتم تقديم اعتراض خلال المدة النظامية، أو بعد تأييده من محكمة الاستئناف.']
	];
	for ($i = 1; $i <= 5; $i++) {
		$q_val = isset($default_ap_faqs[$i]) ? $default_ap_faqs[$i]['q'] : '';
		$a_val = isset($default_ap_faqs[$i]) ? $default_ap_faqs[$i]['a'] : '';
		$appeals_fields[] = ['key' => "field_ap_faq_{$i}_q", 'label' => "سؤال {$i}", 'name' => "faq_{$i}_question", 'type' => 'text', 'default_value' => $q_val];
		$appeals_fields[] = ['key' => "field_ap_faq_{$i}_a", 'label' => "إجابة {$i}", 'name' => "faq_{$i}_answer", 'type' => 'textarea', 'default_value' => $a_val];
	}

	acf_add_local_field_group([
		'key' => 'group_appeals',
		'title' => 'إعدادات صفحة متابعة قضايا الاستئناف',
		'location' => [
			[['param' => 'page_template', 'operator' => '==', 'value' => 'template-appeals.php']]
		],
		'fields' => $appeals_fields,
	]);
}
add_action('acf/init', 'amal_register_service_acf_fields');
