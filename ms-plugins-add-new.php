<?php
/*
 * Plugin Name: Multi Site Plugins Add New
 * Plugin URI: http://pippinsplugins.com
 * Description: Enables an Add New link under the Plugins menu for Network admins
 * Author: Pippin Williamson
 * Author URI: http://pippinsplugins.com
 * Contributors: mordauk
 * Version: 1.0
 */

class MS_Plugins_Add_New {

	function __construct() {

		if( is_network_admin() || ! is_multisite() )
			return;

		add_action( 'init', array( $this, 'load_textdomain' ) );

		add_action( 'admin_menu', array( $this, 'menu_page' ) );

	}

	public function load_textdomain() {
		load_plugin_textdomain( 'mspan', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}

	public function menu_page() {

		add_plugins_page( __( 'Add New', 'mspan' ), __( 'Add New' ), 'manage_network', 'plugin-install.php' );

	}

}
new MS_Plugins_Add_New();