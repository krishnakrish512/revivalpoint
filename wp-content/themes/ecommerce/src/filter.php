<?php

//remove contact form 7 js and css
add_filter('wpcf7_load_js', '__return_false');
add_filter('wpcf7_load_css', '__return_false');

/**
 * update wordpress tag cloud args
 *
 * @param $args
 *
 * @return array
 */
function ecommerce_widget_tag_cloud_args($args)
{

    $my_args = array(
        'smallest' => '14',
        'unit' => 'px'
    );
    $args = wp_parse_args($args, $my_args);

    return $args;
}

add_filter('widget_tag_cloud_args', 'ecommerce_widget_tag_cloud_args');

function ecommerce_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->li_class)) {
        $classes[] = $args->li_class;
    }
    return $classes;
}

add_filter('nav_menu_css_class', 'ecommerce_additional_class_on_li', 1, 3);