<?php
/**
 * Partners Section
 */

defined('ABSPATH') || exit;

$show_partners = function_exists('get_field') && get_field('show_partners_section') !== null ? get_field('show_partners_section') : true;

if (!$show_partners) {
    return;
}

$title = function_exists('get_field') && get_field('partners_section_title') ? get_field('partners_section_title') : 'شركاء النجاح';
$subtitle = function_exists('get_field') && get_field('partners_section_subtitle') ? get_field('partners_section_subtitle') : 'نعتز بثقة شركائنا الذين نرافقهم في رحلة نجاحهم';

$args = [
    'post_type'      => 'partner',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
];
$partners_query = new WP_Query($args);

if ($partners_query->have_posts()) :
?>
<section id="partners" class="partners-section section-padding">
    <div class="container">
        <div class="section-header text-center">
            <?php if ($title) : ?>
                <h2 class="section-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            <?php if ($subtitle) : ?>
                <p class="section-subtitle"><?php echo esc_html($subtitle); ?></p>
            <?php endif; ?>
        </div>

        <div class="swiper partners-swiper">
            <div class="swiper-wrapper" style="align-items: center;">
                <?php while ($partners_query->have_posts()) : $partners_query->the_post(); ?>
                    <div class="swiper-slide partner-slide">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium', ['class' => 'partner-logo', 'alt' => get_the_title()]); ?>
                        <?php else: ?>
                            <h4 class="partner-name"><?php the_title(); ?></h4>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>
<?php
endif;
wp_reset_postdata();
?>
