<?php
$file = 'inc/acf-services.php';
$text = file_get_contents($file);
$text = str_replace(
    "$default_types[$i, 'placeholder' => $default_types[$i]['title']",
    "$default_types[$i]['title'], 'placeholder' => $default_types[$i]['title']",
    $text
);
$text = str_replace(
    "$default_types[$i, 'placeholder' => $default_types[$i]['desc']",
    "$default_types[$i]['desc'], 'placeholder' => $default_types[$i]['desc']",
    $text
);

$text = str_replace(
    "$default_cf_types[$i, 'placeholder' => $default_cf_types[$i]['title']",
    "$default_cf_types[$i]['title'], 'placeholder' => $default_cf_types[$i]['title']",
    $text
);
$text = str_replace(
    "$default_cf_types[$i, 'placeholder' => $default_cf_types[$i]['desc']",
    "$default_cf_types[$i]['desc'], 'placeholder' => $default_cf_types[$i]['desc']",
    $text
);

$text = str_replace(
    "$default_cf_steps[$i, 'placeholder' => $default_cf_steps[$i]['title']",
    "$default_cf_steps[$i]['title'], 'placeholder' => $default_cf_steps[$i]['title']",
    $text
);
$text = str_replace(
    "$default_cf_steps[$i, 'placeholder' => $default_cf_steps[$i]['desc']",
    "$default_cf_steps[$i]['desc'], 'placeholder' => $default_cf_steps[$i]['desc']",
    $text
);

$text = str_replace(
    "$default_lp_types[$i, 'placeholder' => $default_lp_types[$i]['title']",
    "$default_lp_types[$i]['title'], 'placeholder' => $default_lp_types[$i]['title']",
    $text
);
$text = str_replace(
    "$default_lp_types[$i, 'placeholder' => $default_lp_types[$i]['desc']",
    "$default_lp_types[$i]['desc'], 'placeholder' => $default_lp_types[$i]['desc']",
    $text
);

$text = str_replace(
    "$default_lp_steps[$i, 'placeholder' => $default_lp_steps[$i]['title']",
    "$default_lp_steps[$i]['title'], 'placeholder' => $default_lp_steps[$i]['title']",
    $text
);
$text = str_replace(
    "$default_lp_steps[$i, 'placeholder' => $default_lp_steps[$i]['desc']",
    "$default_lp_steps[$i]['desc'], 'placeholder' => $default_lp_steps[$i]['desc']",
    $text
);

file_put_contents($file, $text);
