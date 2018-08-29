<?php
/**
 * Created by PhpStorm.
 * User: stephen
 * Date: 2018-08-29
 * Time: 2:34 PM
 */
add_action( 'wp_enqueue_scripts', 'ucf_health_intranet_main_scripts');
/**
 * Enqueues scripts and styles (javascript and css) used by the theme on every page.
 */
function ucf_health_intranet_main_scripts() {

	/*
	 * Styles (css)
	 */
	// the theme's main style.css file
	wp_enqueue_style(
		'colleges-theme-child-ucfh-intranet',
		get_stylesheet_uri(), // this will load the current theme's style.css file, not necessarily the parent theme style.
		false,
		filemtime( get_stylesheet_directory().'/style.css'),
		false
	);
	
	/*
	 * Scripts (javascript)
	 */
	// jQuery - load in header
	wp_enqueue_script(
		'jquery'
	);
	// Internet Explorer hacks for older versions
	wp_register_script(
		'google-svn-old-ie',
		'//ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js',
		array(),
		null,
		true
	);

	wp_enqueue_script('google-svn-old-ie');
	wp_script_add_data('google-svn-old-ie', 'conditional', 'lte IE 9');
	// TypeKit. requires loading after being included.
	wp_enqueue_script(
		'ucf-health-typekit',
		'//use.typekit.net/kga4teb.js',
		array(),
		null,
		true
	);

	// Google analytics
	wp_enqueue_script(
		'ucf_health_google_analytics',
		get_template_directory_uri() . '/js/google-analytics.js',
		array(),
		filemtime( get_template_directory() . '/js/google-analytics.js'), // force cache invalidate if md5 changes
		false // load in header explicitly - google analytics says to load it in <head> or beginning of <body>
	);

	// Google tag manager
	wp_enqueue_script(
		'ucf_health_google_tag_manager',
		get_template_directory_uri() . '/js/google-tag-manager.js',
		array(),
		filemtime( get_template_directory() . '/js/google-tag-manager.js'), // force cache invalidate if md5 changes
		false // load in header explicitly - google tag manager says to load it in <head>
	);

	// JQuery UI scripts - used for accordion
	wp_register_style(
		'jquery-ui-style',
		'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css',
		array('jquery'),
		null
	);
	wp_enqueue_style('wpb-jquery-ui-style');

	wp_enqueue_script(
		'jquery-ui-script',
		'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js',
		array('jquery'),
		null,
		false
	);

	// Skeleton CSS code. copy, paste, and replace css name
	/*
	wp_enqueue_style(
		'ucf_UNIQUE_NAME',
		get_stylesheet_directory_uri() . '/UNIQUE_NAME.css',
		array('dependency'),
		filemtime( get_stylesheet_directory() . '/UNIQUE_NAME.css'), // force cache invalidate if md5 changes
		false
	);
	*/

	// Skeleton JS code. copy, paste, and replace js name
	/*
	wp_enqueue_script(
		'ucf_UNIQUE_NAME',
		get_template_directory_uri() . '/js/UNIQUE_NAME.js',
		array('dependency'),
		filemtime( get_template_directory() . '/js/UNIQUE_NAME.js'), // force cache invalidate if md5 changes
		true // load in footer
	);
	*/
}
