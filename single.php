<?php
/**
 * Single Post Template
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>

<main id="primary" class="site-main single-main" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<!-- Post Hero -->
		<div class="page-hero">
			<div class="page-hero__overlay" aria-hidden="true"></div>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="page-hero__bg" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( null, 'full' ) ); ?>')"></div>
			<?php else : ?>
				<div class="page-hero__bg" style="background-image: url('<?php echo esc_url( AMAL_ASSETS . '/images/hero-bg.jpg' ); ?>')"></div>
			<?php endif; ?>
			<div class="container page-hero__content">
				<h1 class="page-hero__title"><?php the_title(); ?></h1>
				<div class="single-meta" style="color: rgba(255,255,255,0.8); margin-top: 15px;">
					<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
						<?php echo esc_html( get_the_date() ); ?>
					</time>
				</div>
			</div>
		</div>

		<!-- Post Content -->
		<div class="container single-container" style="margin-top: 50px;">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>

				<div class="single-content entry-content">
					<?php the_content(); ?>
				</div>

				<footer class="single-footer">
					<div class="single-tags">
						<?php the_tags( '<span class="tags-label">' . __( 'الوسوم:', 'amal-malki' ) . '</span> ', ', ' ); ?>
					</div>
					<nav class="post-navigation">
						<?php the_post_navigation( [
							'prev_text' => '&#8592; %title',
							'next_text' => '%title &#8594;',
						] ); ?>
					</nav>
				</footer>

			</article>
		</div>

	<?php endwhile; ?>

</main>

<?php get_footer(); ?>
