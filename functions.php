<?php
/**
 * Theme functions
 * 
 * @package duam-theme
 */


//  Defines root directory as DUAM_DIR_PATH
if ( ! defined( 'DUAM_DIR_PATH' ) ) {
    define('DUAM_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'DUAM_DIR_URI' ) ) {
    define('DUAM_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}


 require_once DUAM_DIR_PATH . '/inc/helpers/autoloader.php';
 require_once DUAM_DIR_PATH . '/inc/helpers/template-tags.php';

 function duam_get_theme_instance() {
    \DUAM_THEME\Inc\DUAM_THEME::get_instance();
 }

 duam_get_theme_instance();

