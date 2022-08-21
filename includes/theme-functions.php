<?php if (!defined('ABSPATH')) exit;

add_filter('wp_nav_menu_objects', 'add_nav_menu_item_class');

function add_nav_menu_item_class($items)
{
    foreach ($items as $item) {
        if (is_single() && stripos($item->title, 'proje') !== false) {
            $item->classes[] = 'current-menu-item';
        }
    }
    return $items;
}
