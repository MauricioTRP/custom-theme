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

		$this->setup_hooks();
	}

	protected function setup_hooks() {
		/**
		 * Actions
		 */
	}
}