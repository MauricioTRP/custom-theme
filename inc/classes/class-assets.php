<?php
/**
 * Enqueue theme assets
 * 
 * @package Duam
 */

namespace DUAM_THEME\Inc;
use DUAM_THEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;

	protected function __construct() {
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		/**
		 * Actions
		 */

		 add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
		 add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );

	}

	public function register_styles() {
	    // Register Styles
		wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime( DUAM_DIR_URI . '/style.css' ), 'all' );
		wp_register_style( 'bootstrap-css', DUAM_DIR_URI . '/assets/src/library/main.css', [], false , 'all' );
	
		// Enqueue Styles
		wp_enqueue_style( 'style-css' );
		wp_enqueue_style( 'bootstrap-css' );
	}

	public function register_scripts() {
		// Register Scripts
		wp_register_script( 'main-js', DUAM_DIR_URI . '/assets/main.js', [], filemtime( get_template_directory() . '/assets/main.js' ), true );
		wp_register_script( 'bootstrap-js', DUAM_DIR_URI . '/assets/src/library/bootstrap.min.js', ['jquery'], filemtime( get_template_directory() . '/assets/main.js' ), true );

		// Enqueue Scripts
		wp_enqueue_script( 'main-js' );
		wp_enqueue_script( 'bootstrap-js' );
	}
}