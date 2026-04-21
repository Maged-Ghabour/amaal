<?php
/**
 * About Section (Vision & Mission)
 *
 * @package AmalMalki
 */

$vision_text  = function_exists( 'get_field' ) ? get_field( 'vision_text' )  : null;
$mission_text = function_exists( 'get_field' ) ? get_field( 'mission_text' ) : null;
$about_image  = function_exists( 'get_field' ) ? get_field( 'about_image' )  : null;

$vision  = $vision_text  ?: __( 'أن نكون المعايير الجديدة للخدمات القانونية الرقمية، ومنصة تُدار من خلالها الحلول القانونية فارقاً حقيقياً في جودة وكفاءة التجربة القانونية.', 'amal-malki' );
$mission = $mission_text ?: __( 'نلتزم بتقديم خدمات قانونية استشارية تقوم على الاحتراف والدقة والسرية، مع توظيف التقنية لتبسيط الإجراءات وتسريع الإنجاز، وتمكين عملائنا من اتخاذ قرارات قانونية واضحة وقوية بثقة تامة.', 'amal-malki' );
$img_url = $about_image  ? esc_url( $about_image['url'] ) : AMAL_ASSETS . '/images/about-placeholder.jpg';
$img_alt = $about_image  ? esc_attr( $about_image['alt'] ) : '';
?>

<section id="about" class="about-section" aria-label="<?php esc_attr_e( 'من نحن', 'amal-malki' ); ?>">
	<div class="container about-inner">

		<!-- Text Column -->
		<div class="about-text">
			<h2 class="section-title about-main-title">
				<?php _e( 'الاستشارات القانونية', 'amal-malki' ); ?><br>
				<?php _e( 'للأفراد والشركات', 'amal-malki' ); ?>
			</h2>

			<div class="about-block">
				<h3 class="about-block-label"><?php _e( 'رؤيتنا', 'amal-malki' ); ?></h3>
				<p class="about-block-text"><?php echo esc_html( $vision ); ?></p>
			</div>

			<div class="about-block">
				<h3 class="about-block-label"><?php _e( 'رسالتنا', 'amal-malki' ); ?></h3>
				<p class="about-block-text"><?php echo esc_html( $mission ); ?></p>
			</div>
		</div>

		<!-- Image Column -->
		<div class="about-image">
			<img
				src="<?php echo esc_url( $img_url ); ?>"
				alt="<?php echo esc_attr( $img_alt ); ?>"
				loading="lazy"
				width="500"
				height="600"
			>
		</div>

	</div>
</section><!-- #about -->
