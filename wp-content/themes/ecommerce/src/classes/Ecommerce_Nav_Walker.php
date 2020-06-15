<?php


class Ecommerce_Nav_Walker extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = [])
    {
        $output .= "<div class='b-dropdown_content sub-holder dropdown-left'><div class='dropdown-inner'><div class='menu-item'>";
        $output .= "<ul>";
    }

    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        $classes = empty($item->classes) ? [] : (array)$item->classes;

        if (isset($args->walker->has_children) && $args->walker->has_children) {
            if ($depth == 0) {
                $classes [] = 'b-has_sub b-dropdown_wrapper from-bottom';
            }
            if ($depth != 0) {
                $classes[] = 'b-has_sub b-dropdown_wrapper';
            }
        }

        if (in_array('current-menu-item', $classes, true) || in_array('current-menu-parent', $classes, true) || in_array('current-menu-ancestor', $classes, true)) {
            if ($depth == 0) {
                $classes[] = 'active';
            }
        }

        $output .= "<li class='" . implode(' ', $classes) . "'>";

        $output .= "<a href='" . $item->url . "' class='p-relative description'>";
        $output .= "<span class='top'>";
        $output .= $item->title;
        $output .= "</span>";

        if ($args->walker->has_children) {
            if ($depth == 0) {
                $output .= " <i class='fa fa-angle-down'></i>";
            }
            if ($depth > 0) {
                $output .= " <i class='fa fa-angle-right float-right'></i>";
            }
        }

        $output .= "</a>";
    }
}