<?php 
     // Enqueue scripts and style files 
    function enqueue_files(){
        //  Main Style file
        wp_enqueue_style('stylesheet',get_theme_file_uri('/style.css'));
        // main script file
        wp_enqueue_script('Script_file',get_theme_file_uri('/assets/js/script.js'));
        wp_enqueue_script('slick_js',get_theme_file_uri('/assets/js/slick.min.js'));    
        wp_enqueue_script('Kit_font',get_theme_file_uri('/assets/js/kitfont.js'));
    }
    // add action for enqueue files
    add_action('wp_enqueue_scripts','enqueue_files');
    add_theme_support('custom-header');
    add_theme_support('custom-background');
    add_post_type_support('page','excerpt');
    add_theme_support('post-thumbnails');
?>
