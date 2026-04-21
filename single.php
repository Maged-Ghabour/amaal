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
	<div class="container single-container">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>

				<header class="single-header">
					<h1 class="single-title"><?php the_title(); ?></h1>
					<div class="single-meta">
						<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
							<?php echo esc_html( get_the_date() ); ?>
						</time>
					</div>
				</header>

				<?php if ( has_post_thumbnail() ) : ?>
					<div class="single-thumb">
						<?php the_post_thumbnail( 'large', [ 'loading' => 'eager' ] ); ?>
					</div>
				<?php endif; ?>

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

		<?php endwhile; ?>

	</div>
</main>

<?php get_footer(); ?>
