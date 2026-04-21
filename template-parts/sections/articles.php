<?php
/**
 * Articles Section
 *
 * @package AmalMalki
 */

$args = [
	'post_type'      => 'post',
	'posts_per_page' => 5,
	'post_status'    => 'publish',
];
$articles = new WP_Query( $args );
?>

<section id="articles" class="articles-section" aria-label="<?php esc_attr_e( 'المقالات', 'amal-malki' ); ?>">
	<div class="container">

		<h2 class="section-title"><?php _e( 'مقالات ذات صله', 'amal-malki' ); ?></h2>

		<?php if ( $articles->have_posts() ) : ?>
			<div class="articles-grid">
				<?php while ( $articles->have_posts() ) : $articles->the_post(); ?>
					<article class="article-card">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="article-card__thumb">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'article-thumb', [ 'loading' => 'lazy' ] ); ?>
								</a>
							</div>
						<?php else : ?>
							<div class="article-card__thumb article-card__thumb--placeholder"></div>
						<?php endif; ?>
						<div class="article-card__body">
							<h3 class="article-card__title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
						</div>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		<?php else : ?>
			<p class="no-content"><?php _e( 'لا توجد مقالات حتى الآن.', 'amal-malki' ); ?></p>
		<?php endif; ?>

	</div>
</section><!-- #articles -->
