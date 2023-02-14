<?php
/**
 * Registers a new post type for Books
 */
add_theme_support('post-thumbnails');
add_post_type_support( 'book_store', 'thumbnail' ); 
add_action('init', 'register_book_store');
function register_book_store() {
    $labels = array(
    	'name'               => __( 'Book Store', 'book_store' ),
		'menu_name'          => _x('Book Store', 'book_store'),
		'add_new'            => _x( 'Add New Book', 'book_store' ),
		'add_new_item'       => __( 'Add New Book', 'book_store' ),
		'edit_item'          => __( 'Edit Book', 'book_store' ),
		'view_item'          => __( 'View Book', 'book_store' ),
		'view_items'         => __( 'View Books', 'book_store' ),
		'not_found'          => __( 'No Book found', 'book_store' ),
		'not_found_in_trash' => __( 'No Book found in Trash', 'book_store' ),
    );
    $args = array(
       'labels' => $labels,
       'hierarchical' => true,
       'description' => 'Book store',
       'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
       'public' => true,
       'show_ui' => true,
       'show_in_menu' => true,
       'show_in_nav_menus' => true,
       'publicly_queryable' => true,
       'exclude_from_search' => false,
       'has_archive' => 'books',
       'query_var' => true,
       'can_export' => true,
       'rewrite' => array( 'slug' => 'book' ),
       'capability_type' => 'post'
    );
    register_post_type('book_store', $args);

    /*Custom Author taxonomies*/
	$catLabels = array(
		'name'              => _x( 'Author', 'taxonomy general name' ),
		'singular_name'     => _x( 'Author', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Book Author' ),
		'all_items'         => __( 'All Books Author' ),
		'parent_item'       => __( 'Parent Books Author' ),
		'parent_item_colon' => __( 'Parent Books Author:' ),
		'edit_item'         => __( 'Edit Book Author' ),
		'update_item'       => __( 'Update Book Author' ),
		'add_new_item'      => __( 'Add New Book Author' ),
		'new_item_name'     => __( 'New Book Author Name' ),
		'menu_name'         => __( 'Author' ),
	);
	register_taxonomy( 'book_store_author', array( 'book_store' ), array(
		'hierarchical'      => true,
		'labels'            => $catLabels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'book_author' ),
	) );

	/*Custom Publisher taxonomies*/
	$catLabels = array(
		'name'              => _x( 'Publisher', 'taxonomy general name' ),
		'singular_name'     => _x( 'Publisher', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Book Publisher' ),
		'all_items'         => __( 'All Books Publisher' ),
		'parent_item'       => __( 'Parent Books Publisher' ),
		'parent_item_colon' => __( 'Parent Books Publisher:' ),
		'edit_item'         => __( 'Edit Book Publisher' ),
		'update_item'       => __( 'Update Book Publisher' ),
		'add_new_item'      => __( 'Add New Book Publisher' ),
		'new_item_name'     => __( 'New Book Publisher Name' ),
		'menu_name'         => __( 'Publisher' ),
	);
	register_taxonomy( 'book_store_publisher', array( 'book_store' ), array(
		'hierarchical'      => true,
		'labels'            => $catLabels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'book_publisher' ),
	) );
	/*Custom category taxonomies*/
	$catLabels = array(
		'name'              => _x( 'category', 'taxonomy general name' ),
		'singular_name'     => _x( 'category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Book category' ),
		'all_items'         => __( 'All Books category' ),
		'parent_item'       => __( 'Parent Books category' ),
		'parent_item_colon' => __( 'Parent Books category:' ),
		'edit_item'         => __( 'Edit Book category' ),
		'update_item'       => __( 'Update Book category' ),
		'add_new_item'      => __( 'Add New Book category' ),
		'new_item_name'     => __( 'New Book category Name' ),
		'menu_name'         => __( 'category' ),
	);
	register_taxonomy( 'book_store_category', array( 'book_store' ), array(
		'hierarchical'      => true,
		'labels'            => $catLabels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'book_category' ),
	) );

	/*Custom Year taxonomies*/
	$yearLabels = array(
		'name'              => _x( 'year', 'taxonomy general name' ),
		'singular_name'     => _x( 'year', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Book year' ),
		'all_items'         => __( 'All Books year' ),
		'parent_item'       => __( 'Parent Books year' ),
		'parent_item_colon' => __( 'Parent Books year:' ),
		'edit_item'         => __( 'Edit Book year' ),
		'update_item'       => __( 'Update Book year' ),
		'add_new_item'      => __( 'Add New Book year' ),
		'new_item_name'     => __( 'New Book year Name' ),
		'menu_name'         => __( 'year' ),
	);
	register_taxonomy( 'book_store_year', array( 'book_store' ), array(
		'hierarchical'      => true,
		'labels'            => $yearLabels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'book_year' ),
	) );
}
?>