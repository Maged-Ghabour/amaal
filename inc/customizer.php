<?php
/**
 * WordPress Customizer Settings
 *
 * @package AmalMalki
 */

defined('ABSPATH') || exit;

add_action('customize_register', function (WP_Customize_Manager $wp_customize) {

	/* ── Panel: Theme Options ─────────────────────────────────── */
	$wp_customize->add_panel('amal_options', [
		'title' => __('إعدادات الثيم', 'amal-malki'),
		'priority' => 160,
	]);

	// ── Section: Social Media ──────────────────────────────────
	$wp_customize->add_section('amal_social', [
		'title' => __('روابط التواصل الاجتماعي', 'amal-malki'),
		'panel' => 'amal_options',
	]);

	$socials = ['instagram', 'tiktok', 'twitter', 'facebook', 'snapchat'];
	$labels = [
		'instagram' => 'Instagram',
		'tiktok' => 'TikTok',
		'twitter' => 'Twitter / X',
		'facebook' => 'Facebook',
		'snapchat' => 'Snapchat',
	];

	foreach ($socials as $s) {
		$wp_customize->add_setting("social_{$s}", ['default' => '#', 'sanitize_callback' => 'esc_url_raw']);
		$wp_customize->add_control("social_{$s}", [
			'label' => $labels[$s],
			'section' => 'amal_social',
			'type' => 'url',
		]);
	}

	// ── Section: Footer Info ───────────────────────────────────
	$wp_customize->add_section('amal_footer', [
		'title' => __('بيانات التذييل', 'amal-malki'),
		'panel' => 'amal_options',
	]);

	$footer_fields = [
		'footer_address' => ['label' => __('العنوان', 'amal-malki'), 'default' => 'برج الرياض، الرياض', 'type' => 'text'],
		'footer_phone' => ['label' => __('الجوال', 'amal-malki'), 'default' => '+966 00000000', 'type' => 'text'],
		'footer_email' => ['label' => __('البريد الإلكتروني', 'amal-malki'), 'default' => 'mail@mail.com', 'type' => 'email'],
	];

	foreach ($footer_fields as $key => $opts) {
		$wp_customize->add_setting($key, ['default' => $opts['default'], 'sanitize_callback' => 'sanitize_text_field']);
		$wp_customize->add_control($key, [
			'label' => $opts['label'],
			'section' => 'amal_footer',
			'type' => $opts['type'],
		]);
	}

	// ── Section: General Settings ──────────────────────────────
	$wp_customize->add_section('amal_general', [
		'title' => __('الإعدادات العامة', 'amal-malki'),
		'panel' => 'amal_options',
	]);

	$wp_customize->add_setting('enable_preloader', [
		'default' => true,
		'sanitize_callback' => 'rest_sanitize_boolean',
	]);

	$wp_customize->add_control('enable_preloader', [
		'label' => __('تفعيل شاشة التحميل (Preloader)', 'amal-malki'),
		'section' => 'amal_general',
		'type' => 'checkbox',
	]);

	// ── Section: Maintenance Mode ──────────────────────────────
	$wp_customize->add_section('amal_maintenance', [
		'title' => __('وضع الصيانة', 'amal-malki'),
		'panel' => 'amal_options',
	]);

	$wp_customize->add_setting('enable_maintenance_mode', [
		'default' => false,
		'sanitize_callback' => 'rest_sanitize_boolean',
	]);

	$wp_customize->add_control('enable_maintenance_mode', [
		'label' => __('تفعيل وضع الصيانة', 'amal-malki'),
		'section' => 'amal_maintenance',
		'type' => 'checkbox',
	]);

	// ── Section: Hero Section ──────────────────────────────
	$wp_customize->add_section('amal_hero', [
		'title' => __('القسم الرئيسي (Hero)', 'amal-malki'),
		'panel' => 'amal_options',
	]);

	$wp_customize->add_setting('hero_default_bg', [
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	]);

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_default_bg', [
		'label' => __('صورة خلفية القسم الرئيسي', 'amal-malki'),
		'section' => 'amal_hero',
		'settings' => 'hero_default_bg',
	]));

});
