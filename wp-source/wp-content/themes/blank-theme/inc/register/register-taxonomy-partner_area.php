<?php
function register_taxonomy_area() {

    $labels = array(
		'name'              => __( 'Regions', 'taxonomy general name', 'ansas' ),
		'singular_name'     => __( 'Region', 'taxonomy singular name', 'ansas' ),
		'search_items'      => __( 'Search Regions', 'ansas' ),
		'all_items'         => __( 'All Regions', 'ansas' ),
		'view_item'         => __( 'View Region', 'ansas' ),
		'parent_item'       => __( 'Parent Region', 'ansas' ),
		'parent_item_colon' => __( 'Parent Region:', 'ansas' ),
		'edit_item'         => __( 'Edit Region', 'ansas' ),
		'update_item'       => __( 'Update Region', 'ansas' ),
		'add_new_item'      => __( 'Add New Region', 'ansas' ),
		'new_item_name'     => __( 'New Region Name', 'ansas' ),
		'not_found'         => __( 'No Regions Found', 'ansas' ),
		'back_to_items'     => __( 'Back to Regions', 'ansas' ),
		'menu_name'         => __( 'Regions', 'ansas' )
	);

    $args = array(
       'labels'        => $labels,
       'public'       => true,
       'rewrite'      => false,
       'hierarchical' => true
   );

   register_taxonomy( 'area', 'partner', $args );
}
add_action( 'init', 'register_taxonomy_area', 0 );