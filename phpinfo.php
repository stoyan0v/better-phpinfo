<?php
/*
 * Plugin Name: Better PHP Info
 * Description: Better PHP Info
 * Author: Stanimir Stoyanov
 * Text Domain: better-php-info
*/

namespace Php_Info;
use Php_Info\Info;

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'PHPINFO_DIR' ) ) {
	define( 'PHP_INFO_DIR' , dirname( __FILE__ ) );
}

require( PHP_INFO_DIR . '/vendor/autoload.php' );

new Info();