<?php
/**
 * Register a custom post type called "product".
 *
 * @see get_post_type_labels() for label keys.
 */
function register_post_type_member() {
	$labels = array(
		'name'                  => _x( 'Members', 'Post type general name', 'wptheme' ),
		'singular_name'         => _x( 'Member', 'Post type singular name', 'wptheme' ),
		'menu_name'             => _x( 'Members', 'Admin Menu text', 'wptheme' ),
		'name_admin_bar'        => _x( 'Member', 'Add New on Toolbar', 'wptheme' ),
		'add_new'               => __( 'Add New', 'wptheme' ),
		'add_new_item'          => __( 'Add New Member', 'wptheme' ),
		'new_item'              => __( 'New Member', 'wptheme' ),
		'edit_item'             => __( 'Edit Member', 'wptheme' ),
		'view_item'             => __( 'View Member', 'wptheme' ),
		'all_items'             => __( 'All Members', 'wptheme' ),
		'search_items'          => __( 'Search Members', 'wptheme' ),
		'parent_item_colon'     => __( 'Parent Members:', 'wptheme' ),
		'not_found'             => __( 'No products found.', 'wptheme' ),
		'not_found_in_trash'    => __( 'No products found in Trash.', 'wptheme' ),
		'archives'              => _x( 'Member archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'wptheme' ),
		'insert_into_item'      => _x( 'Insert into product', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'wptheme' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this product', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'wptheme' ),
		'filter_items_list'     => _x( 'Filter products list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'wptheme' ),
		'items_list_navigation' => _x( 'Members list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'wptheme' ),
		'items_list'            => _x( 'Members list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'wptheme' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'member'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'menu_icon'			 => 'dashicons-groups',
	);

	register_post_type('member', $args );
}

add_action( 'init', 'register_post_type_member' );