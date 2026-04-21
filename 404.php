<?php
/**
 * 404 Template
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>

<main id="primary" class="site-main error-404-main" role="main">
	<div class="container error-404-wrap">
		<div class="error-404-content">
			<h1 class="error-404-code">404</h1>
			<h2 class="error-404-title"><?php _e( 'الصفحة غير موجودة', 'amal-malki' ); ?></h2>
			<p class="error-404-text">
				<?php _e( 'عذراً، الصفحة التي تبحث عنها غير موجودة أو تم نقلها.', 'amal-malki' ); ?>
			</p>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--gold">
				<?php _e( 'العودة للرئيسية', 'amal-malki' ); ?>
			</a>
		</div>
	</div>
</main>

<?php get_footer(); ?>
