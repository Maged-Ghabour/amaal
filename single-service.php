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

	<!-- Service Hero (Banner) -->
	<div class="service-hero">
		<div class="service-hero__overlay" aria-hidden="true"></div>
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="service-hero__bg" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( null, 'hero-bg' ) ); ?>')"></div>
		<?php else : ?>
			<div class="service-hero__bg" style="background-image: url('<?php echo esc_url( AMAL_ASSETS . '/images/hero-bg.jpg' ); ?>')"></div>
		<?php endif; ?>
		<div class="container service-hero__content">
			<h1 class="service-hero__title"><?php the_title(); ?></h1>
		</div>
	</div>

	<!-- Service Content Section -->
	<div class="container service-content-wrap">
		
		<!-- Main Content Area -->
		<div class="service-main-content">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'service-article entry-content' ); ?>>
				<?php the_content(); ?>
			</article>
		</div>

		<!-- Sidebar Area -->
		<aside class="service-sidebar">
			
			<!-- Contact Widget -->
			<div class="service-widget service-cta-widget">
				<h3 class="widget-title"><?php _e( 'احصل على استشارة', 'amal-malki' ); ?></h3>
				<p><?php _e( 'نحن هنا لمساعدتك في كافة الأمور القانونية المتعلقة بهذه الخدمة.', 'amal-malki' ); ?></p>
				<a href="https://wa.me/9660541415099" target="_blank" rel="noopener noreferrer" class="btn btn--gold btn--full">
					<?php _e( 'تواصل معنا الآن', 'amal-malki' ); ?>
				</a>
			</div>

			<!-- Other Services Widget -->
			<div class="service-widget service-list-widget">
				<h3 class="widget-title"><?php _e( 'خدماتنا الأخرى', 'amal-malki' ); ?></h3>
				<ul class="sidebar-services-list">
					<?php
					$other_services = new WP_Query([
						'post_type'      => 'service',
						'posts_per_page' => 5,
						'post__not_in'   => [ get_the_ID() ],
						'orderby'        => 'rand'
					]);
					if ( $other_services->have_posts() ) :
						while ( $other_services->have_posts() ) : $other_services->the_post(); ?>
							<li>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
									<span class="icon-arrow">←</span>
								</a>
							</li>
						<?php endwhile; wp_reset_postdata();
					endif; ?>
				</ul>
			</div>

		</aside>
	</div>

</main>

<?php get_footer(); ?>
