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

		if( is_network_admin() || ! is_multisite() || ! current_user_can( 'manage_network' ) )
			return;

		add_action( 'admin_menu', array( $this, 'menu_page' ) );

	}

	public function menu_page() {

		add_plugins_page( __( 'Add New' ), __( 'Add New' ), 'manage_network', 'plugin-install.php' );

	}

}
new MS_Plugins_Add_New();