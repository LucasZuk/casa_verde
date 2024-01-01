<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

/**
 * Config WP
 */
add_action('init', function(){

	/**
	 * Ajout du support des "Images à la une"
	 */
	add_theme_support('post-thumbnails');

	/**
	 * Activation du support du HTML5 pour le form de recherche
	 */
	add_theme_support('html5', array('search-form')); 

	/**
	 * Custom Image Sizes
	 */
	if( function_exists('add_image_size') ){
		add_image_size('banner', 1800);
		add_image_size('half', 800);
	}

	/**
	 * Menus
	 */
	add_theme_support('menus');
	register_nav_menus(array(
		'header-main-nav' => 'Menu header',
		'menu-footer-1' => 'Menu footer 1',
		'menu-footer-2' => 'Menu footer 2',
		'menu-footer-3' => 'Menu footer 3',
		'menu-footer-bottom' => 'Menu footer bottom',
	));

	/*
	 * Activation de la page d'options d'ACF
	 */
	if(function_exists('acf_add_options_page')) {
		acf_add_options_page();
	}
	
});

/**
 * Register Assets
 */
add_action('init', function(){

	$templateDirectory = get_stylesheet_directory_uri() . '/assets/dist/';

	/**
	 * STYLES
	 */
	wp_register_style('main', $templateDirectory . 'css/main.min.css', false, '1.0.0');

	/**
	 * SCRIPTS
	 */

	wp_register_script('vendors-js', $templateDirectory . 'js/vendors.min.js', array('jquery'), '1.0.5', true);
	wp_register_script('main', $templateDirectory . 'js/scripts.min.js', array('gmap', 'jquery'), '1.0.0', true);
	wp_localize_script('main', 'themeVars', array(
		'ajaxUrl' => admin_url('admin-ajax.php'),
	));
	

});

/**
 * Google Fonts
 */
add_action( 'wp_enqueue_scripts', 'cp_enqueue_google_fonts' );
function cp_enqueue_google_fonts() {
	$query_args = [
		'family' => 'Chewy:400'
	];

	wp_register_style( 
		'googlefonts', 
		add_query_arg( $query_args, '//fonts.googleapis.com/css' ), 
		[], 
		null 
	);
	wp_enqueue_style( 'googlefonts' );
}

//Enqueue the Dashicons script
add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
function load_dashicons_front_end() {
wp_enqueue_style( 'dashicons' );
}

/**
 * Enqueue Assets
 */
add_action('wp_enqueue_scripts', function(){

	/**
	 * Styles
	 */
	wp_enqueue_style('main');

	/**
	 * Scripts
	 */
	wp_enqueue_script('vendors-js');
	wp_enqueue_script('main');

});

/**
 * Autoriser les fichiers SVG
 */
function wpc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types');

/**
 * Responsive embed videos
 */
function prepare_embed($content) {
	// match any iframes
	$pattern = '~<iframe.*</iframe>|<embed.*</embed>~';
	preg_match_all($pattern, $content, $matches);
   
	foreach ($matches[0] as $match) {
		// wrap matched iframe with div
		$wrappedframe = '<div class="video-container">' . $match . '</div>';
	
		//replace original iframe with new in content
		$content = str_replace($match, $wrappedframe, $content);
	}
   
	return $content; 
}
