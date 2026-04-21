<?php
/**
 * Front Page Template
 * Template Name: Front Page
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>

<main id="primary" class="site-main front-page-main" role="main">

	<?php get_template_part( 'template-parts/sections/hero' ); ?>
	<?php get_template_part( 'template-parts/sections/about' ); ?>
	<?php get_template_part( 'template-parts/sections/services' ); ?>
	<?php get_template_part( 'template-parts/sections/why-us' ); ?>
	<?php get_template_part( 'template-parts/sections/articles' ); ?>
	<?php get_template_part( 'template-parts/sections/contact-cta' ); ?>

</main><!-- #primary -->

<?php get_footer(); ?>
