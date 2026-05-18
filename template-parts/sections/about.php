<?php
/**
 * About Section (Vision & Mission)
 *
 * @package AmalMalki
 */

$show_about = function_exists('get_field') && get_field('show_about_section') !== null ? get_field('show_about_section') : true;
if (!$show_about) {
	return;
}

$vision_text = function_exists('get_field') ? get_field('vision_text') : null;
$mission_text = function_exists('get_field') ? get_field('mission_text') : null;
$about_image = function_exists('get_field') ? get_field('about_image') : null;

$about_title_1 = function_exists('get_field') ? get_field('about_main_title_1') : null;
$about_title_2 = function_exists('get_field') ? get_field('about_main_title_2') : null;
$vision_title = function_exists('get_field') ? get_field('vision_title') : null;
$mission_title = function_exists('get_field') ? get_field('mission_title') : null;

$title_1 = $about_title_1 ?: __('الاستشارات القانونية', 'amal-malki');
$title_2 = $about_title_2 ?: __('للأفراد والشركات', 'amal-malki');
$v_title = $vision_title ?: __('رؤيتنا', 'amal-malki');
$m_title = $mission_title ?: __('رسالتنا', 'amal-malki');

$vision = $vision_text ?: __('أن نكون المعايير الجديدة للخدمات القانونية الرقمية، ومنصة تُدار من خلالها الحلول القانونية فارقاً حقيقياً في جودة وكفاءة التجربة القانونية.', 'amal-malki');
$mission = $mission_text ?: __('نلتزم بتقديم خدمات قانونية استشارية تقوم على الاحتراف والدقة والسرية، مع توظيف التقنية لتبسيط الإجراءات وتسريع الإنجاز، وتمكين عملائنا من اتخاذ قرارات قانونية واضحة وقوية بثقة تامة.', 'amal-malki');
$img_url = $about_image ? esc_url($about_image['url']) : AMAL_ASSETS . '/images/about-placeholder.jpg';
$img_alt = $about_image ? esc_attr($about_image['alt']) : '';
?>

<section id="about" class="about-section" aria-label="<?php esc_attr_e('من نحن', 'amal-malki'); ?>">
	<div class="container about-inner">


		<!-- Image Column -->
		<div class="about-image">
			<?php if ($about_image && isset($about_image['ID'])) : ?>
				<?php echo wp_get_attachment_image($about_image['ID'], 'large', false, ['loading' => 'lazy']); ?>
			<?php else : ?>
				<img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>" loading="lazy" width="500" height="600">
			<?php endif; ?>
		</div>
		<!-- Text Column -->
		<div class="about-text">
			<h2 class="section-title about-main-title">
				<?php echo esc_html($title_1); ?><br>
				<?php echo esc_html($title_2); ?>
			</h2>

			<div class="about-block">
				<h3 class="about-block-label"><?php echo esc_html($v_title); ?></h3>
				<p class="about-block-text"><?php echo esc_html($vision); ?></p>
			</div>

			<div class="about-block">
				<h3 class="about-block-label"><?php echo esc_html($m_title); ?></h3>
				<p class="about-block-text"><?php echo esc_html($mission); ?></p>
			</div>
		</div>



	</div>
</section><!-- #about -->