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
		<?php
		$custom_link = function_exists('get_field') ? get_field('custom_service_link') : '';
		$svc_link = $custom_link ? esc_url($custom_link) : get_permalink();
		
		$title = get_the_title();
		if ( strpos( $title, 'متابعه قضايا الاستئناف' ) !== false || strpos( $title, 'متابعة قضايا الاستئناف' ) !== false ) {
			$svc_link = str_replace( '/services/', '/', $svc_link );
		}
		?>
		<h3 class="service-card__title">
			<a href="<?php echo $svc_link; ?>"><?php the_title(); ?></a>
		</h3>
		<p class="service-card__excerpt"><?php the_excerpt(); ?></p>
		<a href="<?php echo $svc_link; ?>" class="service-card__link">
			<?php _e( 'اقرأ المزيد', 'amal-malki' ); ?>
			<span class="service-card__arrow" aria-hidden="true">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<line x1="17" y1="7" x2="7" y2="17"/>
					<polyline points="7 7 7 17 17 17"/>
				</svg>
			</span>
		</a>
	</div>

</article>
