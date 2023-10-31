<?php
/**
 * Register Menus
 * 
 * @package Duam
 */

namespace DUAM_THEME\Inc;
use DUAM_THEME\Inc\Traits\Singleton;


 class Menus {
    use Singleton;

    protected function __construct() {
        // load class
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
         */

        add_action( 'init', [ $this, 'register_menus'] );
    }

    public function register_menus() {
        register_nav_menus([
            'duam-header-menu'   => esc_html__( 'Header Menu', 'duam' ),
            'duam-footer-menu'   => esc_html__( 'Footer Menu', 'duam' )
        ]);
    }
 }