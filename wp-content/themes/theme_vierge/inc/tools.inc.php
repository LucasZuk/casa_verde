<?php

/**
 * Chemin vers le dossier images
 */
function get_image_url($filename){
	return get_template_directory_uri() . '/assets/dist/img/' . $filename;
}

/**
 * Chemin vers le dossier svg
 */
function get_svg_url($filename){
	return get_template_directory_uri() . '/assets/dist/svg/' . $filename . '.svg';
}

/**
 * Display SVG
 */
function display_svg($icon) {
    $svg_content = file_get_contents( get_template_directory() . '/assets/dist/svg/' . $icon . '.svg' );
    return $svg_content;
}


/*
 * Afficher les images depuis un champ ACF
 */
function display_acf_image($image, $size = null, $class = null) {
    $url_full = $image['icon'];
    $full_width = $image['width'];
    $full_height = $image['height'];

	$title = $image['title'];
	$alt = $image['alt'];

	if(isset($size) and !empty($size)) {
		$url = $image['sizes'][ $size ];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];
	} else {
		$url = $url_full;
		$width = $full_width;
		$height = $full_height;
	}

	$img = '';
	$img .= '<img src="'.$url.'" alt="'.$alt.'" title="'.$title.'" width="'.$width.'" height="'.$height.'" ';
	if(isset($class) && !empty($class)) {
		$img .= 'class="'.$class.'" ';
	}
	$img .= '/>';

	return $img;
}


/**
 * Display ACF link field
 */
function display_acf_link($link, $class = null) {
	return '<a href="' . $link['url'] . '" target="' . $link['target'] . '" class="' . $class . '">' . $link['title'] . '</a>';
}


function get_acf_image_url($image, $size = null) {
	$bkg = '';
	if( isset($image) and !empty($image) ) {
		if( isset($size) and !empty($size) ) {
			if( isset($image['sizes'][$size]) and !empty($image['sizes'][$size]) ) {
				$bkg = $image['sizes'][$size];
			} elseif( isset($image['url']) and !empty($image['url']) ) {
				$bkg = $image['url'];
			}
		} else {
			$bkg = $image['url'];
		}
	}
	return $bkg;
}

/**
 * Recursively sort an array of taxonomy terms hierarchically. Child categories will be
 * placed under a 'children' member of their parent term.
 * @param Array   $cats     taxonomy term objects to sort
 * @param Array   $into     result array to put them in
 * @param integer $parentId the current parent ID to put them in
 */
function sort_terms_hierarchicaly(Array &$cats, Array &$into, $parentId = 0) {
    foreach ($cats as $i => $cat) {
        if ($cat->parent == $parentId) {
            $into[$cat->term_id] = $cat;
            unset($cats[$i]);
        }
    }

    foreach ($into as $topCat) {
        $topCat->children = array();
        sort_terms_hierarchicaly($cats, $topCat->children, $topCat->term_id);
    }
}

/**
 * Require Blocks
 * @blockName : Nom du block à inclure ( blocks/block-{nom_block}.php )
 * @args : Variables à passer au block
 * @echo : Définir à false pour récupérer le résultat dans une variable au lieu de l'afficher
 */
function requireBlock( $blockName, $args = array(), $echo = true ) {

	if( is_array( $args ) ){
		extract($args);
	}

	if( ! $echo ){
		ob_start();
	}

	$filename = get_template_directory() . '/blocks/_' . $blockName . '.block.php';

	require $filename;

	if( ! $echo ){
		return ob_get_clean();
	}
}

/**
 * Convertisseur de date en français
 */

function dateToFrench($date, $format) 
{
    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
}