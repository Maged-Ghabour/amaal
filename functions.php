<?php
/**
 * Amal Malki Legal Theme Functions
 *
 * @package AmalMalki
 * @version 1.0.0
 */

defined('ABSPATH') || exit;

// ─── Constants ──────────────────────────────────────────────────────────────
define('AMAL_VERSION', time());
define('AMAL_DIR', get_template_directory());
define('AMAL_URI', get_template_directory_uri());
define('AMAL_ASSETS', AMAL_URI . '/assets');

// ─── Theme Setup ─────────────────────────────────────────────────────────────
function amal_setup()
{
	// Translation support (i18n ready for Arabic + English)
	load_theme_textdomain('amal-malki', AMAL_DIR . '/languages');

	// Title tag handled by WordPress
	add_theme_support('title-tag');

	// Featured images
	add_theme_support('post-thumbnails');
	add_image_size('service-thumb', 400, 300, true);
	add_image_size('article-thumb', 350, 250, true);
	add_image_size('hero-bg', 1920, 900, true);

	// HTML5 markup
	add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);

	// Register nav menus
	register_nav_menus([
		'primary' => __('القائمة الرئيسية', 'amal-malki'),
		'footer-1' => __('روابط مهمة', 'amal-malki'),
		'footer-services' => __('خدماتنا (الفوتر)', 'amal-malki'),
	]);

	// Gutenberg wide/full alignment
	add_theme_support('align-wide');

	// Custom logo
	add_theme_support('custom-logo', [
		'height' => 80,
		'width' => 200,
		'flex-height' => true,
		'flex-width' => true,
	]);
}
add_action('after_setup_theme', 'amal_setup');

// ─── Enqueue Scripts & Styles ────────────────────────────────────────────────
function amal_enqueue_assets()
{
	// Google Fonts – Noto Serif Arabic (elegant for legal)
	wp_enqueue_style(
		'amal-fonts',
		'https://fonts.googleapis.com/css2?family=Noto+Serif+Arabic:wght@400;500;600;700&family=Noto+Sans+Arabic:wght@300;400;500&display=swap',
		[],
		null
	);

	// Swiper CSS
	wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', [], '10.0.0');

	// Main stylesheet
	wp_enqueue_style(
		'amal-main',
		AMAL_ASSETS . '/css/main.css',
		['amal-fonts'],
		AMAL_VERSION
	);

	// Inner pages stylesheet
	wp_enqueue_style(
		'amal-inner',
		AMAL_ASSETS . '/css/inner-pages.css',
		['amal-main'],
		AMAL_VERSION
	);

	// RTL stylesheet (auto-loaded for RTL languages)
	if (is_rtl()) {
		wp_enqueue_style(
			'amal-rtl',
			AMAL_ASSETS . '/css/rtl.css',
			['amal-main'],
			AMAL_VERSION
		);
	}

	// Swiper JS
	wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', [], '10.0.0', ['strategy' => 'defer', 'in_footer' => true]);

	// Main JS (defer)
	wp_enqueue_script(
		'amal-main',
		AMAL_ASSETS . '/js/main.js',
		[],
		AMAL_VERSION,
		['strategy' => 'defer', 'in_footer' => true]
	);

	// Pass PHP data to JS
	wp_localize_script('amal-main', 'amalData', [
		'ajaxUrl' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('amal_nonce'),
		'isRtl' => is_rtl() ? 'true' : 'false',
		'lang' => get_locale(),
	]);

	// Comment reply script
	if (is_singular() && comments_open()) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'amal_enqueue_assets');

// ─── Custom Post Types ────────────────────────────────────────────────────────
function amal_register_post_types()
{

	// Services CPT
	register_post_type('service', [
		'labels' => [
			'name' => __('الخدمات', 'amal-malki'),
			'singular_name' => __('خدمة', 'amal-malki'),
			'add_new_item' => __('إضافة خدمة جديدة', 'amal-malki'),
			'edit_item' => __('تعديل الخدمة', 'amal-malki'),
		],
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
		'menu_icon' => 'dashicons-hammer',
		'rewrite' => ['slug' => 'services'],
	]);

	// Partners CPT
	register_post_type('partner', [
		'labels' => [
			'name' => __('شركاء النجاح', 'amal-malki'),
			'singular_name' => __('شريك', 'amal-malki'),
			'add_new_item' => __('إضافة شريك جديد', 'amal-malki'),
			'edit_item' => __('تعديل الشريك', 'amal-malki'),
		],
		'public' => false,
		'show_ui' => true,
		'show_in_nav_menus' => false,
		'supports' => ['title', 'thumbnail'],
		'menu_icon' => 'dashicons-groups',
	]);

}
add_action('init', 'amal_register_post_types');

// ─── ACF Fields (if ACF active) ───────────────────────────────────────────────
function amal_acf_fields()
{
	if (!function_exists('acf_add_local_field_group'))
		return;

	// Hero Section Fields
	acf_add_local_field_group([
		'key' => 'group_hero',
		'title' => __('Hero Section', 'amal-malki'),
		'location' => [
			[['param' => 'page_type', 'operator' => '==', 'value' => 'front_page']],
			[['param' => 'page_template', 'operator' => '==', 'value' => 'front-page.php']]
		],
		'fields' => [
			['key' => 'field_show_hero', 'label' => __('إظهار القسم؟', 'amal-malki'), 'name' => 'show_hero_section', 'type' => 'true_false', 'default_value' => 1, 'ui' => 1],
			['key' => 'field_hero_title', 'label' => __('العنوان الرئيسي', 'amal-malki'), 'name' => 'hero_title', 'type' => 'text'],
			['key' => 'field_hero_subtitle', 'label' => __('النص الفرعي', 'amal-malki'), 'name' => 'hero_subtitle', 'type' => 'textarea'],
			['key' => 'field_hero_btn_text', 'label' => __('نص الزر', 'amal-malki'), 'name' => 'hero_btn_text', 'type' => 'text'],
			['key' => 'field_hero_btn_url', 'label' => __('رابط الزر', 'amal-malki'), 'name' => 'hero_btn_url', 'type' => 'url'],
			['key' => 'field_hero_bg', 'label' => __('صورة الخلفية', 'amal-malki'), 'name' => 'hero_bg', 'type' => 'image'],
		],
	]);

	// About Section Fields
	acf_add_local_field_group([
		'key' => 'group_about',
		'title' => __('About Section', 'amal-malki'),
		'location' => [
			[['param' => 'page_type', 'operator' => '==', 'value' => 'front_page']],
			[['param' => 'page_template', 'operator' => '==', 'value' => 'front-page.php']]
		],
		'fields' => [
			['key' => 'field_show_about', 'label' => __('إظهار القسم؟', 'amal-malki'), 'name' => 'show_about_section', 'type' => 'true_false', 'default_value' => 1, 'ui' => 1],
			['key' => 'field_about_title_1', 'label' => __('العنوان الرئيسي (السطر الأول)', 'amal-malki'), 'name' => 'about_main_title_1', 'type' => 'text'],
			['key' => 'field_about_title_2', 'label' => __('العنوان الرئيسي (السطر الثاني)', 'amal-malki'), 'name' => 'about_main_title_2', 'type' => 'text'],
			['key' => 'field_vision_title', 'label' => __('عنوان الرؤية', 'amal-malki'), 'name' => 'vision_title', 'type' => 'text'],
			['key' => 'field_vision_text', 'label' => __('نص الرؤية', 'amal-malki'), 'name' => 'vision_text', 'type' => 'textarea'],
			['key' => 'field_mission_title', 'label' => __('عنوان الرسالة', 'amal-malki'), 'name' => 'mission_title', 'type' => 'text'],
			['key' => 'field_mission_text', 'label' => __('نص الرسالة', 'amal-malki'), 'name' => 'mission_text', 'type' => 'textarea'],
			['key' => 'field_about_image', 'label' => __('صورة القسم', 'amal-malki'), 'name' => 'about_image', 'type' => 'image'],
		],
	]);

	// Services Section Fields
	acf_add_local_field_group([
		'key' => 'group_services',
		'title' => __('Services Section', 'amal-malki'),
		'location' => [
			[['param' => 'page_type', 'operator' => '==', 'value' => 'front_page']],
			[['param' => 'page_template', 'operator' => '==', 'value' => 'front-page.php']]
		],
		'fields' => [
			['key' => 'field_show_services', 'label' => __('إظهار القسم؟', 'amal-malki'), 'name' => 'show_services_section', 'type' => 'true_false', 'default_value' => 1, 'ui' => 1],
			['key' => 'field_services_title', 'label' => __('عنوان القسم', 'amal-malki'), 'name' => 'services_section_title', 'type' => 'text'],
			['key' => 'field_services_count', 'label' => __('عدد الخدمات المعروضة', 'amal-malki'), 'name' => 'services_post_count', 'type' => 'number', 'default_value' => 8],
		],
	]);

	// Why Us Section Fields
	$why_us_fields = [
		['key' => 'field_show_why_us', 'label' => __('إظهار القسم؟', 'amal-malki'), 'name' => 'show_why_us_section', 'type' => 'true_false', 'default_value' => 1, 'ui' => 1],
		['key' => 'field_why_us_title', 'label' => __('العنوان', 'amal-malki'), 'name' => 'why_us_title', 'type' => 'text'],
		['key' => 'field_why_us_subtitle', 'label' => __('النص الفرعي', 'amal-malki'), 'name' => 'why_us_subtitle', 'type' => 'textarea'],
		['key' => 'field_why_us_bg_color', 'label' => __('لون خلفية القسم', 'amal-malki'), 'name' => 'why_us_bg_color', 'type' => 'color_picker'],
		['key' => 'field_why_us_text_color', 'label' => __('لون النصوص', 'amal-malki'), 'name' => 'why_us_text_color', 'type' => 'color_picker'],
		['key' => 'field_why_us_card_bg_1', 'label' => __('لون البطاقات (تدرج 1)', 'amal-malki'), 'name' => 'why_us_card_bg_1', 'type' => 'color_picker'],
		['key' => 'field_why_us_card_bg_2', 'label' => __('لون البطاقات (تدرج 2)', 'amal-malki'), 'name' => 'why_us_card_bg_2', 'type' => 'color_picker'],
		['key' => 'field_why_us_card_text', 'label' => __('لون نصوص البطاقات', 'amal-malki'), 'name' => 'why_us_card_text', 'type' => 'color_picker'],
		['key' => 'field_why_us_top_row', 'label' => __('عدد الكروت في الصف الأول', 'amal-malki'), 'name' => 'why_us_top_row', 'type' => 'number', 'default_value' => 4, 'min' => 1, 'max' => 6],
		['key' => 'field_why_us_bottom_row', 'label' => __('عدد الكروت في الصف الثاني', 'amal-malki'), 'name' => 'why_us_bottom_row', 'type' => 'number', 'default_value' => 3, 'min' => 1, 'max' => 6],
	];
	for ($i = 1; $i <= 10; $i++) {
		$why_us_fields[] = ['key' => 'field_why_us_f'.$i.'_title', 'label' => "ميزة $i - العنوان", 'name' => "why_us_f{$i}_title", 'type' => 'text'];
		$why_us_fields[] = ['key' => 'field_why_us_f'.$i.'_text', 'label' => "ميزة $i - النص", 'name' => "why_us_f{$i}_text", 'type' => 'textarea'];
	}

	acf_add_local_field_group([
		'key' => 'group_why_us',
		'title' => __('Why Us Section', 'amal-malki'),
		'location' => [
			[['param' => 'page_type', 'operator' => '==', 'value' => 'front_page']],
			[['param' => 'page_template', 'operator' => '==', 'value' => 'front-page.php']]
		],
		'fields' => $why_us_fields,
	]);

	// Articles Section Fields
	acf_add_local_field_group([
		'key' => 'group_articles',
		'title' => __('Articles Section', 'amal-malki'),
		'location' => [
			[['param' => 'page_type', 'operator' => '==', 'value' => 'front_page']],
			[['param' => 'page_template', 'operator' => '==', 'value' => 'front-page.php']]
		],
		'fields' => [
			['key' => 'field_show_articles', 'label' => __('إظهار القسم؟', 'amal-malki'), 'name' => 'show_articles_section', 'type' => 'true_false', 'default_value' => 1, 'ui' => 1],
			['key' => 'field_articles_title', 'label' => __('عنوان القسم', 'amal-malki'), 'name' => 'articles_section_title', 'type' => 'text'],
			['key' => 'field_articles_count', 'label' => __('عدد المقالات المعروضة', 'amal-malki'), 'name' => 'articles_post_count', 'type' => 'number', 'default_value' => 5],
		],
	]);

	// Contact Section Fields
	acf_add_local_field_group([
		'key' => 'group_contact',
		'title' => __('Contact Section', 'amal-malki'),
		'location' => [
			[['param' => 'page_type', 'operator' => '==', 'value' => 'front_page']],
			[['param' => 'page_template', 'operator' => '==', 'value' => 'front-page.php']]
		],
		'fields' => [
			['key' => 'field_show_contact', 'label' => __('إظهار القسم؟', 'amal-malki'), 'name' => 'show_contact_section', 'type' => 'true_false', 'default_value' => 1, 'ui' => 1],
			['key' => 'field_contact_title', 'label' => __('عنوان القسم', 'amal-malki'), 'name' => 'contact_section_title', 'type' => 'text'],
			['key' => 'field_contact_subtitle', 'label' => __('النص الفرعي', 'amal-malki'), 'name' => 'contact_section_subtitle', 'type' => 'textarea'],
			['key' => 'field_contact_btn_text', 'label' => __('نص زر الإرسال', 'amal-malki'), 'name' => 'contact_btn_text', 'type' => 'text'],
		],
	]);

	// Certifications Section Fields – اعتماداتنا القانونية
	acf_add_local_field_group([
		'key' => 'group_certifications',
		'title' => __('Certifications Section – اعتماداتنا القانونية', 'amal-malki'),
		'location' => [
			[['param' => 'page_type', 'operator' => '==', 'value' => 'front_page']],
			[['param' => 'page_template', 'operator' => '==', 'value' => 'front-page.php']]
		],
		'fields' => [
			['key' => 'field_show_certs', 'label' => __('إظهار القسم؟', 'amal-malki'), 'name' => 'show_certifications_section', 'type' => 'true_false', 'default_value' => 1, 'ui' => 1],
			['key' => 'field_certs_title', 'label' => __('عنوان القسم', 'amal-malki'), 'name' => 'certifications_title', 'type' => 'text', 'default_value' => 'اعتماداتنا القانونية'],
			['key' => 'field_certs_subtitle', 'label' => __('النص الفرعي', 'amal-malki'), 'name' => 'certifications_subtitle', 'type' => 'textarea', 'default_value' => 'نفتخر بحصولنا على عدة اعتمادات وشهادات تعزز مصداقيتنا أمام عملائنا وشركائنا'],

			// Card 1
			['key' => 'field_cert_card1_image', 'label' => __('البطاقة 1 – الصورة / الشعار', 'amal-malki'), 'name' => 'cert_card1_image', 'type' => 'image', 'return_format' => 'array'],
			['key' => 'field_cert_card1_label', 'label' => __('البطاقة 1 – التسمية (مثل: رقم العضوية)', 'amal-malki'), 'name' => 'cert_card1_label', 'type' => 'text', 'default_value' => 'رقم العضوية:'],
			['key' => 'field_cert_card1_number', 'label' => __('البطاقة 1 – الرقم', 'amal-malki'), 'name' => 'cert_card1_number', 'type' => 'text', 'default_value' => '692595'],
			['key' => 'field_cert_card1_text', 'label' => __('البطاقة 1 – النص الوصفي', 'amal-malki'), 'name' => 'cert_card1_text', 'type' => 'textarea', 'default_value' => 'عضوية أساسية فعّالة تابعة للمحامية أمل سعيد أحمد المالكي، تتيح تقديم الخدمات القانونية والاستشارات باحترافية وموثوقية، مع عضوية سارية حتى عام 2027 وترخيص مهني معتمد حتى عام 2030.'],

			// Card 2
			['key' => 'field_cert_card2_image', 'label' => __('البطاقة 2 – الصورة / الشعار', 'amal-malki'), 'name' => 'cert_card2_image', 'type' => 'image', 'return_format' => 'array'],
			['key' => 'field_cert_card2_label', 'label' => __('البطاقة 2 – التسمية (مثل: رقم الترخيص)', 'amal-malki'), 'name' => 'cert_card2_label', 'type' => 'text', 'default_value' => 'رقم الترخيص:'],
			['key' => 'field_cert_card2_number', 'label' => __('البطاقة 2 – الرقم', 'amal-malki'), 'name' => 'cert_card2_number', 'type' => 'text', 'default_value' => '472438'],
			['key' => 'field_cert_card2_text', 'label' => __('البطاقة 2 – النص الوصفي', 'amal-malki'), 'name' => 'cert_card2_text', 'type' => 'textarea', 'default_value' => 'محامية مرخصة رسميًا من وزارة العدل بالمملكة العربية السعودية لمزاولة مهنة المحاماة وتقديم الاستشارات القانونية، بخبرة قانونية معتمدة وترخيص ساري حتى عام 2030 في مجال التمثيل القانوني والاستشارات.'],
		],
	]);

	// Partners Section Fields
	acf_add_local_field_group([
		'key' => 'group_partners',
		'title' => __('Partners Section – شركاء النجاح', 'amal-malki'),
		'location' => [
			[['param' => 'page_type', 'operator' => '==', 'value' => 'front_page']],
			[['param' => 'page_template', 'operator' => '==', 'value' => 'front-page.php']]
		],
		'fields' => [
			['key' => 'field_show_partners', 'label' => __('إظهار القسم؟', 'amal-malki'), 'name' => 'show_partners_section', 'type' => 'true_false', 'default_value' => 1, 'ui' => 1],
			['key' => 'field_partners_title', 'label' => __('عنوان القسم', 'amal-malki'), 'name' => 'partners_section_title', 'type' => 'text', 'default_value' => 'شركاء النجاح'],
			['key' => 'field_partners_subtitle', 'label' => __('النص الفرعي', 'amal-malki'), 'name' => 'partners_section_subtitle', 'type' => 'textarea', 'default_value' => 'نعتز بثقة شركائنا الذين نرافقهم في رحلة نجاحهم'],
		],
	]);

	// Related Articles for Services
	acf_add_local_field_group([
		'key' => 'group_service_articles',
		'title' => __('مقالات ذات صلة بالخدمة', 'amal-malki'),
		'location' => [
			[['param' => 'post_type', 'operator' => '==', 'value' => 'service']]
		],
		'fields' => [
			[
				'key' => 'field_service_related_articles',
				'label' => __('اختر المقالات المرتبطة بهذه الخدمة', 'amal-malki'),
				'name' => 'service_related_articles',
				'type' => 'relationship',
				'post_type' => ['post'],
				'return_format' => 'object',
				'ui' => 1,
			],
		],
	]);
}
add_action('acf/init', 'amal_acf_fields');

// ─── Sidebars / Widget Areas ──────────────────────────────────────────────────
function amal_register_sidebars()
{
	register_sidebar([
		'name' => __('الشريط الجانبي', 'amal-malki'),
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	]);

	register_sidebar([
		'name' => __('تذييل الصفحة', 'amal-malki'),
		'id' => 'footer-widgets',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="footer-widget-title">',
		'after_title' => '</h4>',
	]);
}
add_action('widgets_init', 'amal_register_sidebars');

// ─── Body Classes ─────────────────────────────────────────────────────────────
function amal_body_classes($classes)
{
	if (is_front_page())
		$classes[] = 'front-page';
	if (is_rtl())
		$classes[] = 'rtl';
	return $classes;
}
add_filter('body_class', 'amal_body_classes');

// ─── Excerpt Length ───────────────────────────────────────────────────────────
function amal_excerpt_length($length)
{
	return is_admin() ? $length : 20;
}
add_filter('excerpt_length', 'amal_excerpt_length');

function amal_excerpt_more($more)
{
	return '...';
}
add_filter('excerpt_more', 'amal_excerpt_more');

// ─── Security Headers ─────────────────────────────────────────────────────────
function amal_security_headers()
{
	header('X-Content-Type-Options: nosniff');
	header('X-Frame-Options: SAMEORIGIN');
	header('Referrer-Policy: strict-origin-when-cross-origin');
}
add_action('send_headers', 'amal_security_headers');

// ─── Maintenance Mode ───────────────────────────────────────────────────────────
function amal_maintenance_mode()
{
	if (get_theme_mod('enable_maintenance_mode', false)) {
		if (!current_user_can('edit_themes') || !is_user_logged_in()) {
			if (file_exists(AMAL_DIR . '/maintenance.php')) {
				require_once AMAL_DIR . '/maintenance.php';
				exit();
			}
		}
	}
}
add_action('template_redirect', 'amal_maintenance_mode');

// ─── Custom Login Page ────────────────────────────────────────────────────────
function amal_login_stylesheet() {
    wp_enqueue_style('amal-login-style', AMAL_ASSETS . '/css/login.css', [], AMAL_VERSION);
    
    // Inject the custom logo dynamically if it exists
    $custom_logo_id = get_theme_mod('custom_logo');
    if ($custom_logo_id) {
        $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
        echo '<style type="text/css">
            #login h1 a, .login h1 a {
                background-image: url(' . esc_url($logo_url) . ');
                background-size: contain;
                background-repeat: no-repeat;
                background-position: center;
                width: 100%;
                height: 100px;
                display: block;
                margin-bottom: 20px;
            }
        </style>';
    }
}
add_action('login_enqueue_scripts', 'amal_login_stylesheet');

function amal_login_logo_url() {
    return home_url();
}
add_filter('login_headerurl', 'amal_login_logo_url');

function amal_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter('login_headertext', 'amal_login_logo_url_title');

// ─── Include Files ────────────────────────────────────────────────────────────
$includes = [
	'/inc/template-tags.php',    // custom template helpers
	'/inc/customizer.php',       // WordPress Customizer options
	'/inc/contact-form.php',     // AJAX contact form handler
	'/inc/acf-services.php',     // ACF fields for service pages
];

foreach ($includes as $file) {
	$path = AMAL_DIR . $file;
	if (file_exists($path)) {
		require_once $path;
	}
}

// ─── Performance & SEO ────────────────────────────────────────────────────────
function amal_performance_headers() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action('wp_head', 'amal_performance_headers', 1);

function amal_preload_fonts() {
    echo '<link rel="preload" href="' . esc_url(AMAL_ASSETS) . '/fonts/DINNextLTArabic-Regular-3.ttf" as="font" type="font/ttf" crossorigin="anonymous">' . "\n";
    echo '<link rel="preload" href="' . esc_url(AMAL_ASSETS) . '/fonts/DINNextLTArabic-Heavy2-2.ttf" as="font" type="font/ttf" crossorigin="anonymous">' . "\n";
}
add_action('wp_head', 'amal_preload_fonts', 1);

function amal_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles'); 
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji'); 
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'amal_disable_emojis');

function amal_dequeue_dashicons() {
    if (!is_user_logged_in()) {
        wp_dequeue_style('dashicons');
        wp_deregister_style('dashicons');
    }
}
add_action('wp_enqueue_scripts', 'amal_dequeue_dashicons', 100);

add_filter( 'get_the_archive_title', function ( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_home() ) {
        $title = get_the_title( get_option('page_for_posts', true) );
        if ( ! $title ) $title = __('المدونة', 'amal-malki');
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
    return $title;
});

function amal_deregister_scripts(){
    wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'amal_deregister_scripts');

function amal_cleanup_head() {
    remove_action('wp_head', 'wp_generator'); // Remove WP version
    remove_action('wp_head', 'rsd_link'); // Remove RSD link
    remove_action('wp_head', 'wlwmanifest_link'); // Remove wlwmanifest
    remove_action('wp_head', 'wp_shortlink_wp_head'); // Remove shortlink
    remove_action('wp_head', 'rest_output_link_wp_head'); // Remove REST API link
    remove_action('wp_head', 'wp_oembed_add_discovery_links'); // Remove oEmbed discovery
    remove_action('wp_head', 'wp_oembed_add_host_js'); // Remove oEmbed JS
}
add_action('init', 'amal_cleanup_head');

function amal_remove_unneeded_styles() {
    wp_dequeue_style('classic-theme-styles');
    if (is_front_page()) {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wc-blocks-style'); // If WooCommerce is there
        wp_dequeue_style('global-styles');
    }
}
add_action('wp_enqueue_scripts', 'amal_remove_unneeded_styles', 100);

function amal_remove_jquery_migrate($scripts) {
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        if ($script->deps) {
            $script->deps = array_diff($script->deps, ['jquery-migrate']);
        }
    }
}
add_action('wp_default_scripts', 'amal_remove_jquery_migrate');
