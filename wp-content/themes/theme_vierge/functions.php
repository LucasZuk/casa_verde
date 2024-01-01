<?php

/**
** activation theme
**/
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
 wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

require dirname(__FILE__) .  '/inc/init.inc.php';
require dirname(__FILE__) .  '/inc/tools.inc.php';
require dirname(__FILE__) .  '/inc/clean.inc.php';
require dirname(__FILE__) .  '/inc/acf.inc.php';
require dirname(__FILE__) .  '/inc/cpt.inc.php';
