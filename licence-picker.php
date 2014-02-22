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
 * Description:       Defines a licence taxonomy, so editors can set licences on a post-by-post basis. Prints the licencing meta tag. Use it for Creative Commons, GNU etc.
 * Version:           0.0.1
 * Author:            Júlio Reis / A Rocha International
 * Author URI:        http://www.tintazul.com.pt/julio.reis/
 * Text Domain:       licence-picker
 * License:           GPL-3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/Tintazul/licence-picker
 * Requires at least: 3.0.0
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
define( 'LP_VERSION', '0.0.1' );                      // plugin version
define( 'LP_MIN_WP_VERSION', '3.0.0');                // required minimum WP version

load_plugin_textdomain( 'licence-picker', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/**
 * Initialize LP admin functionality
 * @return void
 */
function lp_admin_init() {
	require LP_PATH . 'admin/class-lp-base.php';
	require LP_PATH . 'admin/class-lp-admin.php';
}

/**
 * Initialize LP frontend functionality
 * @return void
 */
function lp_frontend_init() {
	require LP_PATH . 'admin/class-lp-base.php';
	require LP_PATH . 'public/class-lp-frontend.php';
}

if ( is_admin() ) {
	if ( defined('DOING_AJAX') && DOING_AJAX ) {  // if we had ajax, we’d load it here
	}
	else add_action( 'plugins_loaded', 'lp_admin_init', 0 );
} else {	
	add_action( 'plugins_loaded', 'lp_frontend_init', 0 );
}
add_action( 'init', 'lp_create_taxonomy', 0 );

/* create the custom taxonomy
 * kudos to http://www.wpbeginner.com/wp-tutorials/create-custom-taxonomies-wordpress/
 * @return bool True if the taxonomy was created, false if not
 */
function lp_create_taxonomy() {
	// do nothing if taxonomy already exists
	if( taxonomy_exists( 'licence' ) )
		return false;
	// Add new taxonomy, make it hierarchical like categories
	// first do the translations part for GUI
	$labels = array(
		'name' => _x( 'Licence picker', 'taxonomy general name', 'licence-picker'),
		'singular_name' => _x( 'Licence picker', 'taxonomy singular name', 'licence-picker'),
		'search_items' =>  __( 'Search licences', 'licence-picker'),
		'all_items' => __( 'All licences', 'licence-picker'),
		'parent_item' => __( 'Parent licence', 'licence-picker'),
		'parent_item_colon' => __( 'Parent licence:', 'licence-picker'),
		'edit_item' => __( 'Edit licence', 'licence-picker'),
		'update_item' => __( 'Update licence', 'licence-picker'),
		'add_new_item' => __( 'Add New licence', 'licence-picker'),
		'new_item_name' => __( 'New licence', 'licence-picker'),
		'menu_name' => __( 'Licences', 'licence-picker'),
	);
	// Register the taxonomy
	register_taxonomy( 'licence', array('post'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'licence' ),
	));
	// taxonomy was created
	return true;
}
