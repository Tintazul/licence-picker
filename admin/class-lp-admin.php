<?php
/**
 * class-lp-admin.php
 * Admin class for plugin licence-picker
 */

// If this file is called directly, abort
if ( !defined('DB_NAME') ) {
	header('HTTP/1.0 403 Forbidden');
	die;
}

/**
 * Class that holds most of the admin functionality.
 */
class LP_Admin {

	public function __construct() {
		add_action( 'admin_init', array( $this, 'requires_wordpress_version') );
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
	}
	
	/**
	 * To be run when the plugin is activated
	 * @return void
	 */
	static function activate() {
	}

	/**
	 * To be run when the plugin is deactivated
	 * @return void
	 */
	static function deactivate() {
	}

	/**
	 * Checks if the current WP install is newer than $wp_version
	 * Must test every time it's run, not just upon activation,
	 * because we don't know if the plugin code has been upgraded
	 * @return void
	 */
	public function requires_wordpress_version() {
		global $wp_version;
		$plugin = LP_BASENAME;
		$plugin_data = get_plugin_data( LP_MAINFILE, false );

printf( "<h1>\$wp_version = '%s' - LP_MIN_WP_VERSION = '%s'</h1>", $wp_version, LP_MIN_WP_VERSION );

		if ( version_compare($wp_version, LP_MIN_WP_VERSION, "<" ) ) {
			if( is_plugin_active( $plugin ) ) {
				// deactivate plugin, print error message
				deactivate_plugins( $plugin );
				// TRANSLATORS: first placeholder for plugin name, second for version number
				$msg_title = sprintf( __( '%1$s %2$s not activated', 'licence-picker' ), $plugin_data['Name'], $plugin_data['Version'] );
				// TRANSLATORS: first placeholder for current WordPress version, second for required version
				$msg_para = sprintf( __( 'You are running WordPress version %1$s. This plugin requires version %2$s or higher, and has been deactivated! Please upgrade WordPress and try again.', 'licence-picker' ), $wp_version, LP_MIN_WP_VERSION );
				$msg_back = __( 'Back to WordPress admin', 'licence-picker' );
				wp_die(  sprintf( '<h1>%s</h1><p>%s</p><p><a href="%s">%s</a></p>' , $msg_title, $msg_para, admin_url(), $msg_back ) );
			}
		}
	}
}

// Globalize the var first as it's needed globally
global $lp_admin;
$lp_admin = new LP_Admin();

// Register activation/deactivation
register_activation_hook( LP_MAINFILE, array( 'LP_Admin', 'activate' ) );
register_deactivation_hook( LP_MAINFILE, array( 'LP_Admin', 'deactivate' ) );
