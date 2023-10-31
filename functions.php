<?php
/**
 * Theme functions
 * 
 * @package custom-theme
 */

function custom_theme_scripts() {
    // Register Styles
    wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime( get_template_directory_uri() . '/style.css' ), 'all' );
    wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/assets/src/library/scss/styles.scss', [], false , 'all' );

    // Register Scripts
    wp_register_script( 'main-js', get_template_directory_uri() . '/assets/main.js', [], filemtime( get_template_directory() . '/assets/main.js' ), true );
    wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/assets/src/library/bootstrap.min.js', ['jquery'], filemtime( get_template_directory() . '/assets/main.js' ), true );
    
    // Enqueue Styles
    wp_enqueue_style( 'style-css' );
    wp_enqueue_style( 'bootstrap-css' );

    // Enqueue Scripts
    wp_enqueue_script( 'main-js' );
    wp_enqueue_script( 'bootstrap-js' );
}

add_action( 'wp_enqueue_scripts', 'custom_theme_scripts' );

?>