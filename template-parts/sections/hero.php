<?php
/**
 * Hero Section
 *
 * @package AmalMalki
 */

$show_hero = function_exists('get_field') && get_field('show_hero_section') !== null ? get_field('show_hero_section') : true;
if (!$show_hero) {
	return;
}

// ACF fields with fallback defaults
$hero_title = function_exists('get_field') ? get_field('hero_title') : null;
$hero_subtitle = function_exists('get_field') ? get_field('hero_subtitle') : null;
$hero_btn_text = function_exists('get_field') ? get_field('hero_btn_text') : null;
$hero_btn_url = function_exists('get_field') ? get_field('hero_btn_url') : null;
$hero_bg = function_exists('get_field') ? get_field('hero_bg') : null;

// Defaults
$title = $hero_title ?: __('هنا تُدار الحلول', 'amal-malki');
$subtitle = $hero_subtitle ?: __('من الاستشارة إلى الحل، نرافقك قانونياً برؤية دقيقة واحتراف يصنع الفارق', 'amal-malki');
$btn_text = $hero_btn_text ?: __('اطلب استشارة', 'amal-malki');
$btn_url = $hero_btn_url ?: 'https://wa.me/9660541415099';

// Background URL logic: First ACF, then Customizer, then default fallback.
$customizer_bg = get_theme_mod('hero_default_bg', '');
$default_bg = AMAL_ASSETS . '/images/hero-bg.jpg';

if ($hero_bg && isset($hero_bg['sizes']['hero-bg'])) {
	$bg_url = esc_url($hero_bg['sizes']['hero-bg']);
} elseif ($hero_bg && isset($hero_bg['url'])) {
	$bg_url = esc_url($hero_bg['url']);
} elseif ($customizer_bg) {
	$bg_id = attachment_url_to_postid($customizer_bg);
	if ($bg_id) {
		$resized_url = wp_get_attachment_image_url($bg_id, 'hero-bg');
		$bg_url = $resized_url ? esc_url($resized_url) : esc_url($customizer_bg);
	} else {
		$bg_url = esc_url($customizer_bg);
	}
} else {
	$bg_url = esc_url($default_bg);
}

$social_instagram = get_theme_mod('social_instagram', '#');
$social_tiktok = get_theme_mod('social_tiktok', '#');
?>

<section id="hero" class="hero-section" style="background-image: url('<?php echo esc_url($bg_url); ?>');"
	aria-label="<?php esc_attr_e('القسم الرئيسي', 'amal-malki'); ?>">

	<!-- Dark overlay -->
	<div class="hero-overlay" aria-hidden="true"></div>

	<!-- Social Pills (top left) -->
	<!-- <div class="hero-social" aria-label="<?php esc_attr_e('روابط التواصل الاجتماعي', 'amal-malki'); ?>">
		<a href="<?php echo esc_url($social_instagram); ?>" class="social-pill" target="_blank"
			rel="noopener noreferrer" aria-label="Instagram">
			<?php echo amal_get_social_icon('instagram'); ?>
		</a>
		<a href="<?php echo esc_url($social_tiktok); ?>" class="social-pill" target="_blank" rel="noopener noreferrer"
			aria-label="TikTok">
			<?php echo amal_get_social_icon('tiktok'); ?>
		</a>
	</div> -->

	<!-- Hero Content -->
	<div class="hero-content container">
		<h1 class="hero-title">
			<?php echo esc_html($title); ?>
		</h1>
		<p class="hero-subtitle">
			<?php echo esc_html($subtitle); ?>
		</p>
		<a href="<?php echo esc_url($btn_url); ?>" class="btn btn--primary hero-cta">
			<?php echo esc_html($btn_text); ?>
		</a>
	</div>

</section><!-- #hero -->