<?php
/**
 * Certifications Section – اعتماداتنا القانونية
 *
 * @package AmalMalki
 */

defined('ABSPATH') || exit;

// Check visibility toggle
$show_certs = function_exists('get_field') && get_field('show_certifications_section') !== null
	? get_field('show_certifications_section')
	: true;

if (!$show_certs) {
	return;
}

// Section heading
$certs_title = function_exists('get_field') && get_field('certifications_title')
	? get_field('certifications_title')
	: __('اعتماداتنا القانونية', 'amal-malki');

$certs_subtitle = function_exists('get_field') && get_field('certifications_subtitle')
	? get_field('certifications_subtitle')
	: __('نفتخر بحصولنا على عدة اعتمادات وشهادات تعزز مصداقيتنا أمام عملائنا وشركائنا', 'amal-malki');

// Card 1 – Right card (Saudi Bar Association)
$card1_image = function_exists('get_field') && get_field('cert_card1_image')
	? get_field('cert_card1_image')
	: null;
$card1_image_url = $card1_image ? $card1_image['url'] : AMAL_ASSETS . '/public/certificate1.png';

$card1_label = function_exists('get_field') && get_field('cert_card1_label')
	? get_field('cert_card1_label')
	: __('رقم العضوية:', 'amal-malki');

$card1_number = function_exists('get_field') && get_field('cert_card1_number')
	? get_field('cert_card1_number')
	: '692595';

$card1_text = function_exists('get_field') && get_field('cert_card1_text')
	? get_field('cert_card1_text')
	: __('عضوية أساسية فعّالة تابعة للمحامية أمل سعيد أحمد المالكي، تتيح تقديم الخدمات القانونية والاستشارات باحترافية وموثوقية، مع عضوية سارية حتى عام 2027 وترخيص مهني معتمد حتى عام 2030.', 'amal-malki');

// Card 2 – Left card (Ministry of Justice)
$card2_image = function_exists('get_field') && get_field('cert_card2_image')
	? get_field('cert_card2_image')
	: null;
$card2_image_url = $card2_image ? $card2_image['url'] : AMAL_ASSETS . '/public/certificate2.png';

$card2_label = function_exists('get_field') && get_field('cert_card2_label')
	? get_field('cert_card2_label')
	: __('رقم الترخيص:', 'amal-malki');

$card2_number = function_exists('get_field') && get_field('cert_card2_number')
	? get_field('cert_card2_number')
	: '472438';

$card2_text = function_exists('get_field') && get_field('cert_card2_text')
	? get_field('cert_card2_text')
	: __('محامية مرخصة رسميًا من وزارة العدل بالمملكة العربية السعودية لمزاولة مهنة المحاماة وتقديم الاستشارات القانونية، بخبرة قانونية معتمدة وترخيص ساري حتى عام 2030 في مجال التمثيل القانوني والاستشارات.', 'amal-malki');
?>

<section id="certifications" class="certifications-section" aria-label="<?php esc_attr_e('اعتماداتنا القانونية', 'amal-malki'); ?>">
	<div class="container">

		<!-- Section Header -->
		<div class="certifications-header">
			<h2 class="section-title"><?php echo esc_html($certs_title); ?></h2>
			<p class="certifications-subtitle"><?php echo esc_html($certs_subtitle); ?></p>
		</div>

		<!-- Cards Grid -->
		<div class="certifications-grid">

			<!-- Card 1 -->
			<div class="cert-card">
				<div class="cert-card__badge">
					<img src="<?php echo esc_url($card1_image_url); ?>"
						alt="<?php esc_attr_e('شعار الهيئة السعودية للمحامين', 'amal-malki'); ?>"
						loading="lazy">
				</div>
				<p class="cert-card__label">
					<?php echo esc_html($card1_label); ?>
					<strong><?php echo esc_html($card1_number); ?></strong>
				</p>
				<p class="cert-card__text"><?php echo esc_html($card1_text); ?></p>
			</div>

			<!-- Card 2 -->
			<div class="cert-card">
				<div class="cert-card__badge">
					<img src="<?php echo esc_url($card2_image_url); ?>"
						alt="<?php esc_attr_e('شعار وزارة العدل', 'amal-malki'); ?>"
						loading="lazy">
				</div>
				<p class="cert-card__label">
					<?php echo esc_html($card2_label); ?>
					<strong><?php echo esc_html($card2_number); ?></strong>
				</p>
				<p class="cert-card__text"><?php echo esc_html($card2_text); ?></p>
			</div>

		</div><!-- .certifications-grid -->

	</div><!-- .container -->
</section><!-- #certifications -->
