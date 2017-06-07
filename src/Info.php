<?php
namespace Php_Info;

/**
* 
*/
class Info {
	function __construct() {
		phpinfo();
		exit;
	}
}
