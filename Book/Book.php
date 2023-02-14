<?php
/**
 * Plugin Name: Book Store
 * Version: 1.0
 * Author: Minat
 */

    define('PLUGIN_URL',plugin_dir_url(__FILE__));
    function enqueue_plugin_files(){
        wp_enqueue_script('script_enqueue', plugin_dir_url( __FILE__ ).'js/script.js',array( 'jquery' ), false, true );
        wp_enqueue_script('slick', plugin_dir_url( __FILE__ ).'js/slick.min.js',array(), '1.0.0', true);
        wp_enqueue_style('slick_css', plugin_dir_url( __FILE__ ).'css/slick.css');
    }
    add_action('wp_enqueue_scripts','enqueue_plugin_files');

include_once('inc/custom-post-types.php');
include_once('inc/trending_week_shortcode.php');
include_once('inc/category_shortcode.php');
include_once('inc/top_rated_book_shortcode.php');
include_once('inc/feature_book_shortcode.php');
include_once('inc/book_grid_section.php');
include_once('inc/homepage_shortcode.php');


?>


