<?php
/**
 * A 3rd Party Addon for Breakdance.
 * 
 * @wordpress-plugin
 * Plugin Name: 	Power Elements for Breakdance
 * Plugin URI: 		https://www.bricksultimate.com
 * Description: 	PowerElements is a 3rd party add-on of the Breakdance builder which is booting the Breakdance power.
 * Author: 			Paul Chinmoy
 * Author URI: 		https://www.paulchinmoy.com
 * Tested up to:    6.2.2
 * Version: 		0.3
 *
 * License: 		GPLv2 or later
 * License URI: 	http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Text Domain: 	powerelements
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

new PowerElements\Plugin( __FILE__, __DIR__ );