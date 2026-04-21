<?php
/**
 * Single Service Template
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>

<main id="primary" class="site-main service-single-main" role="main">

	<!-- Service Hero -->
	<div class="service-hero">
		<div class="service-hero__overlay" aria-hidden="true"></div>
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="service-hero__bg" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( null, 'hero-bg' ) ); ?>')"></div>
		<?php endif; ?>
		<div class="container service-hero__content">
			<h1 class="service-hero__title"><?php the_title(); ?></h1>
		</div>
	</div>

	<!-- Service Content -->
	<div class="container service-content-wrap">
		<div class="service-content entry-content">
			<?php the_content(); ?>
		</div>

		<!-- CTA Box -->
		<div class="service-cta-box">
			<h3><?php _e( 'هل تحتاج هذه الخدمة؟', 'amal-malki' ); ?></h3>
			<p><?php _e( 'تواصل معنا الآن للحصول على استشارتك القانونية.', 'amal-malki' ); ?></p>
			<a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="btn btn--gold">
				<?php _e( 'اطلب استشارة', 'amal-malki' ); ?>
			</a>
		</div>
	</div>

</main>

<?php get_footer(); ?>
