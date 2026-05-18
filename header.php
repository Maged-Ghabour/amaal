<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="<?php echo is_rtl() ? 'rtl' : 'ltr'; ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<style>
		:root {
			--container-max: <?php echo esc_attr( get_theme_mod( 'container_max_width', 1400 ) ); ?>px;
		}
	</style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Preloader -->
<?php if ( get_theme_mod( 'enable_preloader', true ) ) : ?>
<div id="preloader">
	<div class="preloader-content">
		<?php 
			$preloader_img = get_theme_mod('preloader_image', 'https://aamal-sa.com/wp-content/uploads/2026/04/image-13-Picsart-AiImageEnhancer.png'); 
			$preloader_size = get_theme_mod('preloader_image_size', 400);
			$preloader_id = attachment_url_to_postid($preloader_img);
			
			if ( $preloader_id ) {
				echo wp_get_attachment_image($preloader_id, 'medium', false, [
					'alt' => 'Aamal Preloader',
					'style' => 'max-width: min(70vw, ' . esc_attr($preloader_size) . 'px);',
					'loading' => 'eager'
				]);
			} else {
		?>
		<img src="<?php echo esc_url($preloader_img); ?>" alt="Aamal Preloader" style="max-width: min(70vw, <?php echo esc_attr($preloader_size); ?>px);" loading="eager" />
		<?php } ?>
	</div>
</div>
<script>
	// Inline script for robust preloader hiding to prevent stuck states
	window.addEventListener('load', function() {
		var preloader = document.getElementById('preloader');
		if (preloader) {
			preloader.classList.add('fade-out');
			setTimeout(function() {
				preloader.style.display = 'none';
			}, 500);
		}
	});
</script>
<?php endif; ?>

<div id="page" class="site">

	<!-- ═══════════════════════════════════════════
	     HEADER
	═══════════════════════════════════════════ -->
	<header id="masthead" class="site-header" role="banner">
		<div class="header-inner container">

			<!-- Hamburger (mobile) -->
			<button class="nav-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'فتح القائمة', 'amal-malki' ); ?>">
				<span class="hamburger-line"></span>
				<span class="hamburger-line"></span>
				<span class="hamburger-line"></span>
			</button>



			<!-- Logo -->
			<div class="site-branding">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-name-link" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				<?php endif; ?>
			</div>

		</div><!-- .header-inner -->

		<!-- Mobile nav drawer -->
		<nav id="primary-menu" class="nav-drawer" aria-label="<?php esc_attr_e( 'القائمة الرئيسية', 'amal-malki' ); ?>" role="navigation">
			<?php
			wp_nav_menu( [
				'theme_location' => 'primary',
				'menu_id'        => 'nav-menu-list',
				'container'      => false,
				'menu_class'     => 'nav-menu-list',
				'fallback_cb'    => false,
			] );
			?>
		</nav>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
