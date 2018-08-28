<?php
/**
 * Created by PhpStorm.
 * User: stephen
 * Date: 2016-03-18
 * Time: 4:00 PM
 */

add_action( 'init', 'create_taxonomy' );

function create_taxonomy() {

	register_taxonomy( 'page_shortcode_taxonomy', 'page', array(
		'hierarchical' => true,
		'labels' => array(
			'name' => _x( 'Shortcode Taxonomy', 'taxonomy general name'),
			'menu_name' => __('Shortcode Taxonomy')
		)
	));


}
