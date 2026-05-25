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
$hero_title    = function_exists('get_field') ? get_field('hero_title')    : null;
$hero_subtitle = function_exists('get_field') ? get_field('hero_subtitle') : null;
$hero_btn_text = function_exists('get_field') ? get_field('hero_btn_text') : null;
$hero_btn_url  = function_exists('get_field') ? get_field('hero_btn_url')  : null;
$hero_bg       = function_exists('get_field') ? get_field('hero_bg')       : null;

// Defaults
$title    = $hero_title    ?: __('هنا تُدار الحلول', 'amal-malki');
$subtitle = $hero_subtitle ?: __('من الاستشارة إلى الحل، نرافقك قانونياً برؤية دقيقة واحتراف يصنع الفارق', 'amal-malki');
$btn_text = $hero_btn_text ?: __('اطلب استشارة', 'amal-malki');
$btn_url  = $hero_btn_url  ?: 'https://wa.me/9660541415099';

// Background URL logic
$customizer_bg = get_theme_mod('hero_default_bg', '');
$default_bg    = AMAL_ASSETS . '/images/hero-bg.jpg';

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

$banner_url = esc_url(get_template_directory_uri() . '/assets/public/aamal-sa.png');
?>

<!-- ═══════════════════════════════════════════════════════════
     HERO SWIPER  –  كلا السلايدين مستقلان تماماً
════════════════════════════════════════════════════════════ -->
<div class="hero-swiper-outer" aria-label="<?php esc_attr_e('القسم الرئيسي', 'amal-malki'); ?>">
	<div class="swiper hero-swiper">
		<div class="swiper-wrapper">

			<!-- ── Slide 1 : Banner (aamal-sa.png) ────────────────── -->
			<div class="swiper-slide hs-slide hs-slide--banner">
				<div class="hs-banner-inner">
					<img
						src="<?php echo $banner_url; ?>"
						alt="<?php esc_attr_e('أعمال السعودية', 'amal-malki'); ?>"
						class="hs-banner-img"
						loading="eager"
					>
				</div>
			</div>

			<!-- ── Slide 2 : Hero Section الأصلية ─────────────────── -->
			<div class="swiper-slide hs-slide hs-slide--hero"
				style="background-image: url('<?php echo $bg_url; ?>');">
				<!-- Overlay -->
				<div class="hs-overlay" aria-hidden="true"></div>
				<!-- Content -->
				<div class="hs-content container">
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
			</div>

		</div><!-- .swiper-wrapper -->

		<!-- Pagination dots -->
		<div class="swiper-pagination hero-pagination"></div>

	</div><!-- .hero-swiper -->
</div><!-- .hero-swiper-outer -->