<?php
/**
 * Main Index Template (fallback)
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>

<main id="primary" class="site-main archive-main" role="main">
	<div class="container">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php the_archive_title( '<h1 class="page-title section-title">', '</h1>' ); ?>
				<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
			</header>

			<div class="posts-grid">
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'article-card' ); ?>>

						<?php if ( has_post_thumbnail() ) : ?>
							<div class="article-card__thumb">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'article-thumb', [ 'loading' => 'lazy' ] ); ?>
								</a>
							</div>
						<?php endif; ?>

						<div class="article-card__body">
							<h2 class="article-card__title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<div class="article-meta">
								<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
									<?php echo esc_html( get_the_date() ); ?>
								</time>
							</div>
							<div class="article-excerpt"><?php the_excerpt(); ?></div>
						</div>

					</article>
				<?php endwhile; ?>
			</div>

			<div class="pagination">
				<?php the_posts_pagination( [
					'mid_size'  => 2,
					'prev_text' => __( 'السابق', 'amal-malki' ),
					'next_text' => __( 'التالي', 'amal-malki' ),
				] ); ?>
			</div>

		<?php else : ?>

			<div class="no-results">
				<p><?php _e( 'لا توجد نتائج.', 'amal-malki' ); ?></p>
			</div>

		<?php endif; ?>

	</div>
</main>

<?php get_footer(); ?>
