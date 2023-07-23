<?php
/**
 * A 3rd Party Addon for Breakdance.
 * 
 * @wordpress-plugin
 * Plugin Name: 	Upadans
 * Plugin URI: 		https://www.bricksultimate.com
 * Description: 	Providing handy custom elements for the Breakdance builder. A time saver extension.
 * Author: 		Paul Chinmoy
 * Author URI: 		https://www.paulchinmoy.com
 * Tested up to:    	6.2.2
 * Version: 		0.2
 *
 * License: 		GPLv2 or later
 * License URI: 	http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Text Domain: 	upadans
 * Domain Path: 	languages
 */

/**
 * Copyright (c) 2023 Paul Chinmoy. All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

require_once __DIR__ . '/includes/Plugin.php';
require_once __DIR__ . "/includes/ueacrdmenuwalker.php";

new Upadans\Plugin( __FILE__, __DIR__ );
