<?php
/**
 * Created by PhpStorm.
 * User: stephen
 * Date: 2016-03-18
 * Time: 4:00 PM
 */

add_action( 'init', 'create_taxonomy' );
function create_taxonomy() {
	$labels = array(
		'name' => _x( 'Categories', 'taxonomy general name' ),
		'singular_name' => _x( 'Category', 'taxonomy singular name' ),
		'all_items' => __( 'All Categories' ),
		'edit_item' => __( 'Edit Category' ),
		'update_item' => __( 'Update Category' ),
		'add_new_item' => __( 'Add New Category' ),
		'new_item_name' => __( 'New Category Name' ),
		'menu_name' => __( 'Categories' )
	);

	register_taxonomy( 'page_category', 'page', array(
		'hierarchical' => true,
		'labels' => $labels
	));

}
