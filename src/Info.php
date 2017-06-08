<?php
namespace Php_Info;

/**
* 
*/
class Info {
	function __construct() {
		// Hook our plugins_loaded function
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		// Add plugin options page to main settings
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
	}

	/**
	 * Load language files
	 * @action plugins_loaded
	 */
	public function load_textdomain() {
		// initialize translations
		load_plugin_textdomain( 'php-info', false, PHP_INFO_DIR . '/languages' );
	}

	/**
	 * Get the title of the submenu item page.
	 *
	 * @access public
	 *
	 * @return string $menu_title The title of the submenu item.
	 */
	public function get_menu_title() {
		// allow filtering the title of the submenu page
		$menu_title = apply_filters('php_info_menu_item_title', __( 'Php Info', 'php-info' ) );

		return $menu_title;
	}

	/**
	 * Add plugin settings page.
	 *
	 * @access public
	 */
	public function add_options_page() {
		// Get menu title
		$menu_title = $this->get_menu_title();

		// register the submenu page - child of the Settings parent menu item
		add_submenu_page(
			'options-general.php',
			$menu_title,
			$menu_title,
			'publish_posts',
			'phpinfo',
			array( $this, 'render' )
		);
	}

	/**
	 * Callabck function for options page.
	 *
	 * @access public
	 */
	public function render() {
		include_once( PHP_INFO_DIR . '/templates/options.php' );
	}
}
