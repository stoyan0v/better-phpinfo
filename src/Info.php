<?php
namespace Php_Info;

/**
* 
*/
class Info {
	function __construct() {
		// Hook our plugins_loaded function
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
	}

	/**
	 * Load language files
	 * @action plugins_loaded
	 */
	public function load_textdomain() {
		// initialize translations
		load_plugin_textdomain( 'php-info', false, PHP_INFO_DIR . '/languages' );
	}
}
