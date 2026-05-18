<?php
require_once dirname(__FILE__, 5) . '/wp-load.php';

$args = [
    'post_type'      => 'partner',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
];
$query = new WP_Query($args);

echo "Found: " . $query->found_posts . " posts\n";
while ($query->have_posts()) {
    $query->the_post();
    echo "- " . get_the_title() . " (ID: " . get_the_ID() . ")\n";
    echo "  Has Thumbnail: " . (has_post_thumbnail() ? "Yes" : "No") . "\n";
}
