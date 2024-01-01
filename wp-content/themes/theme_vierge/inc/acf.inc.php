<?php

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Paramètres du site',
        'menu_title'    => 'Paramètres du site',
        'menu_slug'     => 'parametre_site',
        'capability'    => 'edit_posts',
        'redirect'        => false,
        'position'        => '5.1',
        'post_id' => 'parametre_site'
    ));
}