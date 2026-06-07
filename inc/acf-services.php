<?php
/**
 * ACF Fields for Service Pages (Contract Drafting, Company Formation, Lawsuits Preparation)
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
		// Hero Section
		['key' => 'field_cd_hero_tab', 'label' => 'Hero Section', 'type' => 'tab'],
		['key' => 'field_cd_hero_title', 'label' => 'العنوان الرئيسي', 'name' => 'hero_title', 'type' => 'text'],
		['key' => 'field_cd_hero_subtitle', 'label' => 'النص الفرعي', 'name' => 'hero_subtitle', 'type' => 'textarea'],
		['key' => 'field_cd_hero_btn_text', 'label' => 'نص الزر', 'name' => 'hero_btn_text', 'type' => 'text'],
		['key' => 'field_cd_hero_btn_url', 'label' => 'رابط الزر', 'name' => 'hero_btn_url', 'type' => 'url'],
		['key' => 'field_cd_hero_bg', 'label' => 'صورة الخلفية', 'name' => 'hero_bg', 'type' => 'image', 'return_format' => 'url'],

		// Stats Section
		['key' => 'field_cd_stats_tab', 'label' => 'Stats Section', 'type' => 'tab'],
	];
	for ($i = 1; $i <= 4; $i++) {
		$contract_fields[] = ['key' => "field_cd_stat_{$i}_icon", 'label' => "إحصائية {$i} - الأيقونة", 'name' => "stat_{$i}_icon", 'type' => 'image', 'return_format' => 'url'];
		$contract_fields[] = ['key' => "field_cd_stat_{$i}_num", 'label' => "إحصائية {$i} - الرقم", 'name' => "stat_{$i}_number", 'type' => 'text'];
		$contract_fields[] = ['key' => "field_cd_stat_{$i}_title", 'label' => "إحصائية {$i} - العنوان", 'name' => "stat_{$i}_title", 'type' => 'text'];
		$contract_fields[] = ['key' => "field_cd_stat_{$i}_desc", 'label' => "إحصائية {$i} - الوصف", 'name' => "stat_{$i}_desc", 'type' => 'text'];
	}

	$contract_fields[] = ['key' => 'field_cd_why_tab', 'label' => 'Why Us Section', 'type' => 'tab'];
	$contract_fields[] = ['key' => 'field_cd_why_img', 'label' => 'صورة القسم', 'name' => 'why_us_image', 'type' => 'image', 'return_format' => 'url'];
	$contract_fields[] = ['key' => 'field_cd_why_title', 'label' => 'العنوان', 'name' => 'why_us_title', 'type' => 'text'];
	$contract_fields[] = ['key' => 'field_cd_why_desc', 'label' => 'الوصف', 'name' => 'why_us_desc', 'type' => 'textarea'];
	for ($i = 1; $i <= 5; $i++) {
		$contract_fields[] = ['key' => "field_cd_why_list_{$i}", 'label' => "نقطة {$i}", 'name' => "why_us_list_{$i}", 'type' => 'text'];
	}
	$contract_fields[] = ['key' => 'field_cd_why_btn', 'label' => 'نص الزر', 'name' => 'why_us_btn_text', 'type' => 'text'];
	$contract_fields[] = ['key' => 'field_cd_why_url', 'label' => 'رابط الزر', 'name' => 'why_us_btn_url', 'type' => 'url'];

	$contract_fields[] = ['key' => 'field_cd_types_tab', 'label' => 'Contract Types', 'type' => 'tab'];
	$contract_fields[] = ['key' => 'field_cd_types_title', 'label' => 'عنوان القسم', 'name' => 'types_title', 'type' => 'text'];
	$contract_fields[] = ['key' => 'field_cd_types_badge', 'label' => 'الوسم (Badge)', 'name' => 'types_badge', 'type' => 'text'];
	for ($i = 1; $i <= 3; $i++) {
		$contract_fields[] = ['key' => "field_cd_type_{$i}_img", 'label' => "نوع {$i} - صورة", 'name' => "type_{$i}_image", 'type' => 'image', 'return_format' => 'url'];
		$contract_fields[] = ['key' => "field_cd_type_{$i}_title", 'label' => "نوع {$i} - العنوان", 'name' => "type_{$i}_title", 'type' => 'text'];
		$contract_fields[] = ['key' => "field_cd_type_{$i}_desc", 'label' => "نوع {$i} - الوصف", 'name' => "type_{$i}_desc", 'type' => 'textarea'];
	}

	$contract_fields[] = ['key' => 'field_cd_steps_tab', 'label' => 'Steps Section', 'type' => 'tab'];
	$contract_fields[] = ['key' => 'field_cd_steps_title', 'label' => 'عنوان القسم', 'name' => 'steps_title', 'type' => 'text'];
	$contract_fields[] = ['key' => 'field_cd_steps_sub', 'label' => 'النص الفرعي', 'name' => 'steps_subtitle', 'type' => 'textarea'];
	for ($i = 1; $i <= 5; $i++) {
		$contract_fields[] = ['key' => "field_cd_step_{$i}_title", 'label' => "خطوة {$i} - العنوان", 'name' => "step_{$i}_title", 'type' => 'text'];
		$contract_fields[] = ['key' => "field_cd_step_{$i}_desc", 'label' => "خطوة {$i} - الوصف", 'name' => "step_{$i}_desc", 'type' => 'textarea'];
	}

	$contract_fields[] = ['key' => 'field_cd_faq_tab', 'label' => 'FAQ Section', 'type' => 'tab'];
	$contract_fields[] = ['key' => 'field_cd_faq_title', 'label' => 'عنوان القسم', 'name' => 'faq_title', 'type' => 'text'];
	$contract_fields[] = ['key' => 'field_cd_faq_sub', 'label' => 'النص الفرعي', 'name' => 'faq_subtitle', 'type' => 'text'];
	for ($i = 1; $i <= 5; $i++) {
		$contract_fields[] = ['key' => "field_cd_faq_{$i}_q", 'label' => "سؤال {$i}", 'name' => "faq_{$i}_question", 'type' => 'text'];
		$contract_fields[] = ['key' => "field_cd_faq_{$i}_a", 'label' => "إجابة {$i}", 'name' => "faq_{$i}_answer", 'type' => 'textarea'];
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
		['key' => 'field_cf_hero_title', 'label' => 'العنوان الرئيسي', 'name' => 'hero_title', 'type' => 'text'],
		['key' => 'field_cf_hero_subtitle', 'label' => 'النص الفرعي', 'name' => 'hero_subtitle', 'type' => 'textarea'],
		['key' => 'field_cf_hero_btn_text', 'label' => 'نص الزر', 'name' => 'hero_btn_text', 'type' => 'text'],
		['key' => 'field_cf_hero_btn_url', 'label' => 'رابط الزر', 'name' => 'hero_btn_url', 'type' => 'url'],
		['key' => 'field_cf_hero_bg', 'label' => 'صورة الخلفية', 'name' => 'hero_bg', 'type' => 'image', 'return_format' => 'url'],

		['key' => 'field_cf_services_tab', 'label' => 'Services Section', 'type' => 'tab'],
		['key' => 'field_cf_services_title', 'label' => 'عنوان القسم', 'name' => 'services_title', 'type' => 'text'],
	];
	for ($i = 1; $i <= 6; $i++) {
		$company_fields[] = ['key' => "field_cf_srv_{$i}_icon", 'label' => "خدمة {$i} - الأيقونة", 'name' => "srv_{$i}_icon", 'type' => 'image', 'return_format' => 'url'];
		$company_fields[] = ['key' => "field_cf_srv_{$i}_title", 'label' => "خدمة {$i} - العنوان", 'name' => "srv_{$i}_title", 'type' => 'text'];
		$company_fields[] = ['key' => "field_cf_srv_{$i}_desc", 'label' => "خدمة {$i} - الوصف", 'name' => "srv_{$i}_desc", 'type' => 'textarea'];
	}

	$company_fields[] = ['key' => 'field_cf_why_tab', 'label' => 'Why Us Section', 'type' => 'tab'];
	$company_fields[] = ['key' => 'field_cf_why_img', 'label' => 'صورة القسم', 'name' => 'why_us_image', 'type' => 'image', 'return_format' => 'url'];
	$company_fields[] = ['key' => 'field_cf_why_title', 'label' => 'العنوان', 'name' => 'why_us_title', 'type' => 'text'];
	$company_fields[] = ['key' => 'field_cf_why_desc', 'label' => 'الوصف', 'name' => 'why_us_desc', 'type' => 'textarea'];
	for ($i = 1; $i <= 5; $i++) {
		$company_fields[] = ['key' => "field_cf_why_list_{$i}", 'label' => "نقطة {$i}", 'name' => "why_us_list_{$i}", 'type' => 'text'];
	}
	$company_fields[] = ['key' => 'field_cf_why_btn', 'label' => 'نص الزر', 'name' => 'why_us_btn_text', 'type' => 'text'];
	$company_fields[] = ['key' => 'field_cf_why_url', 'label' => 'رابط الزر', 'name' => 'why_us_btn_url', 'type' => 'url'];

	$company_fields[] = ['key' => 'field_cf_types_tab', 'label' => 'Company Types', 'type' => 'tab'];
	$company_fields[] = ['key' => 'field_cf_types_title', 'label' => 'عنوان القسم', 'name' => 'types_title', 'type' => 'text'];
	$company_fields[] = ['key' => 'field_cf_types_badge', 'label' => 'الوسم', 'name' => 'types_badge', 'type' => 'text'];
	for ($i = 1; $i <= 3; $i++) {
		$company_fields[] = ['key' => "field_cf_type_{$i}_img", 'label' => "نوع {$i} - صورة", 'name' => "type_{$i}_image", 'type' => 'image', 'return_format' => 'url'];
		$company_fields[] = ['key' => "field_cf_type_{$i}_title", 'label' => "نوع {$i} - العنوان", 'name' => "type_{$i}_title", 'type' => 'text'];
		$company_fields[] = ['key' => "field_cf_type_{$i}_desc", 'label' => "نوع {$i} - الوصف", 'name' => "type_{$i}_desc", 'type' => 'textarea'];
	}

	$company_fields[] = ['key' => 'field_cf_faq_tab', 'label' => 'FAQ Section', 'type' => 'tab'];
	$company_fields[] = ['key' => 'field_cf_faq_title', 'label' => 'عنوان القسم', 'name' => 'faq_title', 'type' => 'text'];
	$company_fields[] = ['key' => 'field_cf_faq_sub', 'label' => 'النص الفرعي', 'name' => 'faq_subtitle', 'type' => 'text'];
	for ($i = 1; $i <= 5; $i++) {
		$company_fields[] = ['key' => "field_cf_faq_{$i}_q", 'label' => "سؤال {$i}", 'name' => "faq_{$i}_question", 'type' => 'text'];
		$company_fields[] = ['key' => "field_cf_faq_{$i}_a", 'label' => "إجابة {$i}", 'name' => "faq_{$i}_answer", 'type' => 'textarea'];
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
	$lawsuit_fields = [
		['key' => 'field_lp_hero_tab', 'label' => 'Hero Section', 'type' => 'tab'],
		['key' => 'field_lp_hero_title', 'label' => 'العنوان الرئيسي', 'name' => 'hero_title', 'type' => 'text'],
		['key' => 'field_lp_hero_subtitle', 'label' => 'النص الفرعي', 'name' => 'hero_subtitle', 'type' => 'textarea'],
		['key' => 'field_lp_hero_btn_text', 'label' => 'نص الزر', 'name' => 'hero_btn_text', 'type' => 'text'],
		['key' => 'field_lp_hero_btn_url', 'label' => 'رابط الزر', 'name' => 'hero_btn_url', 'type' => 'url'],
		['key' => 'field_lp_hero_bg', 'label' => 'صورة الخلفية', 'name' => 'hero_bg', 'type' => 'image', 'return_format' => 'url'],

		['key' => 'field_lp_why_tab', 'label' => 'Why Us Section', 'type' => 'tab'],
		['key' => 'field_lp_why_img', 'label' => 'صورة القسم', 'name' => 'why_us_image', 'type' => 'image', 'return_format' => 'url'],
		['key' => 'field_lp_why_title', 'label' => 'العنوان', 'name' => 'why_us_title', 'type' => 'text'],
		['key' => 'field_lp_why_subtitle', 'label' => 'النص الفرعي 1', 'name' => 'why_us_subtitle', 'type' => 'text'],
		['key' => 'field_lp_why_desc', 'label' => 'النص الفرعي 2', 'name' => 'why_us_desc', 'type' => 'textarea'],
	];
	for ($i = 1; $i <= 5; $i++) {
		$lawsuit_fields[] = ['key' => "field_lp_why_list_{$i}", 'label' => "نقطة {$i}", 'name' => "why_us_list_{$i}", 'type' => 'text'];
	}
	$lawsuit_fields[] = ['key' => 'field_lp_why_btn', 'label' => 'نص الزر', 'name' => 'why_us_btn_text', 'type' => 'text'];
	$lawsuit_fields[] = ['key' => 'field_lp_why_url', 'label' => 'رابط الزر', 'name' => 'why_us_btn_url', 'type' => 'url'];

	$lawsuit_fields[] = ['key' => 'field_lp_types_tab', 'label' => 'Specialization Types', 'type' => 'tab'];
	$lawsuit_fields[] = ['key' => 'field_lp_types_title', 'label' => 'عنوان القسم', 'name' => 'types_title', 'type' => 'text'];
	$lawsuit_fields[] = ['key' => 'field_lp_types_sub', 'label' => 'النص الفرعي', 'name' => 'types_subtitle', 'type' => 'text'];
	for ($i = 1; $i <= 3; $i++) {
		$lawsuit_fields[] = ['key' => "field_lp_type_{$i}_img", 'label' => "نوع {$i} - صورة", 'name' => "type_{$i}_image", 'type' => 'image', 'return_format' => 'url'];
		$lawsuit_fields[] = ['key' => "field_lp_type_{$i}_title", 'label' => "نوع {$i} - العنوان", 'name' => "type_{$i}_title", 'type' => 'text'];
		$lawsuit_fields[] = ['key' => "field_lp_type_{$i}_desc", 'label' => "نوع {$i} - الوصف", 'name' => "type_{$i}_desc", 'type' => 'textarea'];
	}

	$lawsuit_fields[] = ['key' => 'field_lp_steps_tab', 'label' => 'Steps Section', 'type' => 'tab'];
	$lawsuit_fields[] = ['key' => 'field_lp_steps_title', 'label' => 'عنوان القسم', 'name' => 'steps_title', 'type' => 'text'];
	$lawsuit_fields[] = ['key' => 'field_lp_steps_sub', 'label' => 'النص الفرعي', 'name' => 'steps_subtitle', 'type' => 'textarea'];
	for ($i = 1; $i <= 3; $i++) {
		$lawsuit_fields[] = ['key' => "field_lp_step_{$i}_title", 'label' => "خطوة {$i} - العنوان", 'name' => "step_{$i}_title", 'type' => 'text'];
		$lawsuit_fields[] = ['key' => "field_lp_step_{$i}_desc", 'label' => "خطوة {$i} - الوصف", 'name' => "step_{$i}_desc", 'type' => 'textarea'];
	}

	$lawsuit_fields[] = ['key' => 'field_lp_faq_tab', 'label' => 'FAQ Section', 'type' => 'tab'];
	$lawsuit_fields[] = ['key' => 'field_lp_faq_title', 'label' => 'عنوان القسم', 'name' => 'faq_title', 'type' => 'text'];
	$lawsuit_fields[] = ['key' => 'field_lp_faq_sub', 'label' => 'النص الفرعي', 'name' => 'faq_subtitle', 'type' => 'text'];
	for ($i = 1; $i <= 5; $i++) {
		$lawsuit_fields[] = ['key' => "field_lp_faq_{$i}_q", 'label' => "سؤال {$i}", 'name' => "faq_{$i}_question", 'type' => 'text'];
		$lawsuit_fields[] = ['key' => "field_lp_faq_{$i}_a", 'label' => "إجابة {$i}", 'name' => "faq_{$i}_answer", 'type' => 'textarea'];
	}

	acf_add_local_field_group([
		'key' => 'group_lawsuits_preparation',
		'title' => 'إعدادات صفحة إعداد الدعاوى',
		'location' => [
			[['param' => 'page_template', 'operator' => '==', 'value' => 'template-lawsuits-preparation.php']]
		],
		'fields' => $lawsuit_fields,
	]);
}
add_action('acf/init', 'amal_register_service_acf_fields');
