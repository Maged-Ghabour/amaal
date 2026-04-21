<?php
/**
 * Articles Section
 *
 * @package AmalMalki
 */

$show_articles = function_exists('get_field') && get_field('show_articles_section') !== null ? get_field('show_articles_section') : true;
if ( ! $show_articles ) { return; }

$articles_title = function_exists('get_field') ? get_field('articles_section_title') : null;
$articles_count = function_exists('get_field') ? get_field('articles_post_count') : 5;

$sec_title = $articles_title ?: __( 'مقالات ذات صله', 'amal-malki' );

$args = [
	'post_type'      => 'post',
	'posts_per_page' => $articles_count ? (int)$articles_count : 5,
	'post_status'    => 'publish',
];
$articles = new WP_Query( $args );
?>

<section id="articles" class="articles-section" aria-label="<?php esc_attr_e( 'المقالات', 'amal-malki' ); ?>">
	<div class="container">

		<h2 class="section-title"><?php echo esc_html( $sec_title ); ?></h2>

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
