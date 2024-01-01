<?php 

// function btpst_register_post_types() {
	
//     // CPT Documents
//     $labels = array(
//         'name' => 'Documents',
//         'all_items' => 'Tous les documents', 
//         'singular_name' => 'Document',
//         'add_new_item' => 'Ajouter un document',
//         'edit_item' => 'Modifier le document',
//         'menu_name' => 'Documents'
//     );

// 	$args = array(
//         'labels' => $labels,
//         'public' => true,
//         'show_in_rest' => true,
//         'has_archive' => true,
//         'supports' => array( 'title', 'revisions','custom-fields' ),
//         'menu_position' => 5, 
//         'menu_icon' => 'dashicons-media-document',
// 	);

// 	register_post_type( 'Documents', $args );

//     // CPT Evenements
//     $labels = array(
//         'name' => 'Evenements',
//         'all_items' => 'Tous les évènements', 
//         'singular_name' => 'Évènement',
//         'add_new_item' => 'Ajouter un évènement',
//         'edit_item' => 'Modifier le évènement',
//         'menu_name' => 'Évènements'
//     );

// 	$args = array(
//         'labels' => $labels,
//         'public' => true,
//         'show_in_rest' => true,
//         'has_archive' => true,
//         'supports' => array( 'title', 'revisions','custom-fields' ),
//         'menu_position' => 5, 
//         'menu_icon' => 'dashicons-calendar-alt',
// 	);

// 	register_post_type( 'Evenements', $args );

//     // CPT Centres
//     $labels = array(
//         'name' => 'Centres',
//         'all_items' => 'Tous les Centres', 
//         'singular_name' => 'Centre',
//         'add_new_item' => 'Ajouter un centre',
//         'edit_item' => 'Modifier le centre',
//         'menu_name' => 'Centres'
//     );

// 	$args = array(
//         'labels' => $labels,
//         'public' => true,
//         'show_in_rest' => true,
//         'has_archive' => true,
//         'supports' => array('title', 'revisions','custom-fields' ),
//         'menu_position' => 5, 
//         'menu_icon' => 'dashicons-building',
// 	);

// 	register_post_type( 'Centres', $args );
// }
// add_action( 'init', 'btpst_register_post_types' );

// function cpt_taxonomies() {

//     // DOCUMENTS - CATÉGORIES
//     register_taxonomy(
//         'categorie_de_document',
//         'documents',
//         array(
//             'labels' => array(
//                 'name' => 'Catégories de document',
//                 'add_new_item' => 'Ajouter une nouvelle catégorie',
//                 'new_item_name' => "Nouvelle catégorie"
//             ),
//             'show_ui' => true,
//             'show_tagcloud' => true,
//             'hierarchical' => false,
//             'query_var' => true,
//             'show_in_rest' => true,
//         )
//     );

//     // DOCUMENTS - TYPE
//     register_taxonomy(
//         'type_de_document',
//         'documents',
//         array(
//             'labels' => array(
//                 'name' => 'Type de document',
//                 'add_new_item' => 'Ajouter un nouveau type',
//                 'new_item_name' => "Nouveau type"
//             ),
//             'show_ui' => true,
//             'show_tagcloud' => true,
//             'hierarchical' => false,
//             'query_var' => true,
//             'show_in_rest' => true,
//         )
//     );

//     // ÉVÈNEMENTS - CATÉGORIES
//     register_taxonomy(
//         'categorie_d_evenement',
//         'evenements',
//         array(
//             'labels' => array(
//                 'name' => 'Catégories d\'évènement',
//                 'add_new_item' => 'Ajouter une nouvelle catégorie',
//                 'new_item_name' => "Nouvelle catégorie"
//             ),
//             'show_ui' => true,
//             'show_tagcloud' => true,
//             'hierarchical' => false,
//             'query_var' => true,
//             'show_in_rest' => true,
//         )
//     );
// }

// add_action( 'init', 'cpt_taxonomies', 0 );