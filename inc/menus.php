<?php
function kz_register_menus()
{
    register_nav_menus([
        'main_menu' => 'Ana Menü',
        'top_menu'  => 'Üst Menü',
    ]);
}
add_action('after_setup_theme', 'kz_register_menus');
