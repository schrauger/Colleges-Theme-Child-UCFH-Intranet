<?php
/**
 * Created by PhpStorm.
 * User: stephen
 * Date: 2018-08-20
 * Time: 12:56 PM
 */

// Custom shortcodes
get_template_part( 'includes/shortcodes/functions' );

function include_child_styles() {
    wp_enqueue_style( 'colleges-theme-child-ucfh-intranet', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'include_child_styles' );

?>