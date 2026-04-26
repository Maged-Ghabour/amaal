<?php
/**
 * Main Index Template (fallback)
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>

	<?php if ( have_posts() ) : ?>

	<!-- Blog Hero -->
	<div class="page-hero blog-hero">
		<div class="page-hero__bg"></div>
		<div class="page-hero__overlay"></div>
		<div class="page-hero__content container">
			<?php the_archive_title( '<h1 class="page-hero__title">', '</h1>' ); ?>
			<?php the_archive_description( '<div class="page-hero__desc">', '</div>' ); ?>
		</div>
	</div>

<main id="primary" class="site-main archive-main" role="main">
	<div class="container">

			<div class="posts-grid modern-grid">
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'article-card modern-card' ); ?>>

						<?php if ( has_post_thumbnail() ) : ?>
							<div class="article-card__thumb">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'article-thumb', [ 'loading' => 'lazy' ] ); ?>
								</a>
								<?php
								$categories = get_the_category();
								if ( ! empty( $categories ) ) {
									echo '<span class="article-card__badge">' . esc_html( $categories[0]->name ) . '</span>';
								}
								?>
							</div>
						<?php endif; ?>

						<div class="article-card__body">
							<div class="article-meta">
								<span class="meta-date">
									<svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
									<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
										<?php echo esc_html( get_the_date() ); ?>
									</time>
								</span>
							</div>

							<h2 class="article-card__title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							
							<div class="article-excerpt"><?php the_excerpt(); ?></div>
							
							<div class="article-footer">
								<a href="<?php the_permalink(); ?>" class="article-card__readmore">
									<?php _e( 'اقرأ المزيد', 'amal-malki' ); ?>
									<svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 5 12 12 19"></polyline></svg>
								</a>
							</div>
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
