<?php
/**
 * Amal Malki Legal Theme Functions
 *
 * @package AmalMalki
 * @version 1.0.0
 */

defined('ABSPATH') || exit;

// ─── Constants ──────────────────────────────────────────────────────────────
define('AMAL_VERSION', '1.0.0');
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
		'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'front-page.php']]],
		'fields' => [
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
		'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'front-page.php']]],
		'fields' => [
			['key' => 'field_vision_text', 'label' => __('رؤيتنا', 'amal-malki'), 'name' => 'vision_text', 'type' => 'textarea'],
			['key' => 'field_mission_text', 'label' => __('رسالتنا', 'amal-malki'), 'name' => 'mission_text', 'type' => 'textarea'],
			['key' => 'field_about_image', 'label' => __('صورة القسم', 'amal-malki'), 'name' => 'about_image', 'type' => 'image'],
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

// ─── Include Files ────────────────────────────────────────────────────────────
$includes = [
	'/inc/template-tags.php',    // custom template helpers
	'/inc/customizer.php',       // WordPress Customizer options
	'/inc/contact-form.php',     // AJAX contact form handler
];

foreach ($includes as $file) {
	$path = AMAL_DIR . $file;
	if (file_exists($path)) {
		require_once $path;
	}
}
