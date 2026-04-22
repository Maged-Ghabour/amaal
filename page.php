<?php
/**
 * The template for displaying all pages
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main page-main" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<!-- Page Hero -->
		<div class="page-hero">
			<div class="page-hero__overlay" aria-hidden="true"></div>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="page-hero__bg" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( null, 'full' ) ); ?>')"></div>
			<?php else : ?>
				<div class="page-hero__bg" style="background-image: url('<?php echo esc_url( AMAL_ASSETS . '/images/hero-bg.jpg' ); ?>')"></div>
			<?php endif; ?>
			<div class="container page-hero__content">
				<h1 class="page-hero__title"><?php the_title(); ?></h1>
			</div>
		</div>

		<!-- Page Content -->
		<div class="container page-content-wrap">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-article entry-content' ); ?>>
				<?php the_content(); ?>
			</article>
		</div>

	<?php endwhile; ?>

</main>

<?php get_footer(); ?>
