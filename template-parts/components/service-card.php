<?php
/**
 * Service Card Component
 *
 * @package AmalMalki
 */
?>
<article class="service-card" id="service-<?php the_ID(); ?>">

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="service-card__thumb">
			<?php the_post_thumbnail( 'service-thumb', [ 'loading' => 'lazy' ] ); ?>
		</div>
	<?php else : ?>
		<div class="service-card__thumb service-card__thumb--placeholder"></div>
	<?php endif; ?>

	<div class="service-card__body">
		<h3 class="service-card__title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
		<p class="service-card__excerpt"><?php the_excerpt(); ?></p>
		<a href="<?php the_permalink(); ?>" class="service-card__link">
			<?php _e( 'تواصل معنا', 'amal-malki' ); ?>
			<span class="service-card__arrow" aria-hidden="true">&#8592;</span>
		</a>
	</div>

</article>
