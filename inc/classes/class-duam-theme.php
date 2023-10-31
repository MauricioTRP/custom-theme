<?php
/**
 * Bootstraps the Theme.
 *
 * @package Duam
 */

namespace DUAM_THEME\Inc;

use DUAM_THEME\Inc\Traits\Singleton;

class DUAM_THEME {
	use Singleton;

	protected function __construct() {
		// classes load
		Assets::get_instance();
		Menus::get_instance();

		$this->setup_hooks();
	}

	protected function setup_hooks() {
		/**
		 * Actions
		 */

		add_action( 'after_setup_theme', [ $this, 'setup_theme' ]);
	}

	public function setup_theme() {
		// TODO pendiente Localización
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo', [
			'height'    	=> 100,
			'width'			=> 400,
			'flex-heigth'	=> true,
			'flex-width'	=> true,
			'header-text'	=> [ 'site-title', 'site-description' ]
		] );
		add_theme_support( 'custom-background', [
			'default-color' => '#f5f7fa',
			'default-image' => ''
		] );
		add_theme_support( 'post_thumbnail' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style'
		] );
		add_editor_style();
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );

		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1240;
		}
	}
}
