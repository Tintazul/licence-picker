<?php 
/**
 * @package   Licence Picker
 * @author    Júlio Reis <webmaster@arocha.org>
 * @license   GPL-3.0
 * @link      http://arocha.org
 * @copyright 2014 A Rocha International
 *
 * @wordpress-plugin
 * Plugin Name:       Licence Picker
 * Plugin URI:        @TODO
 * Description:       Prints a licencing meta tag. Lets post editors pick a Creative Commons licence on a post-by-post basis.
 * Version:           0.0.0
 * Author:            Júlio Reis
 * Author URI:        http://www.tintazul.com.pt/julio.reis/
 * Text Domain:       licence-picker
 * License:           GPL-3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/Tintazul/licence-picker
 * Requires at least: 2.8.0
 */

// If this file is called directly, abort
if ( !defined('DB_NAME') ) {
	header('HTTP/1.0 403 Forbidden');
	die;
}

define( 'LP_MAINFILE', __FILE__ );                    // absolute path to this file
define( 'LP_BASENAME', plugin_basename( __FILE__ ) ); // relative path to this file
define( 'LP_PATH', plugin_dir_path( __FILE__ ) );     // absolute path to plugin dir
define( 'LP_URL', plugin_dir_url( __FILE__ ) );       // URL to plugin dir
define( 'LP_VERSION', '0.0.0' );                      // plugin version
define( 'LP_MIN_WP_VERSION', '2.8.0');                // required minimum WP version

load_plugin_textdomain( 'licence-picker', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/**
 * Initialize LP admin functionality
 * @return void
 */
function lp_admin_init() {
	require LP_PATH.'admin/class-lp-admin.php';
}

/**
 * Initialize LP frontend functionality
 * @return void
 */
function lp_frontend_init() {
}

if ( is_admin() ) {
	add_action( 'plugins_loaded', 'lp_admin_init', 0 );
} else {	
	add_action( 'plugins_loaded', 'lp_frontend_init', 0 );
}
