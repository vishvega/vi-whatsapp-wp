<?php

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @link       https://github.com/vishvega/vi-whatsapp-wp
 * @package    Vi_Whatsapp_WP
 * @subpackage Vi_Whatsapp_WP/includes
 * @author     Vishwa LiyanaArachchi
 */

class Vi_Whatsapp_Wp_Activator{

	/**
	 * Activates the plugin
	 * @since    1.0.0
	 */
	
	public static function activate() {
		// Set activator option
		add_option('vi_whatsapp_wp_redirect_on_first_activation_option', 'true');

		// Set option, not deactivated
		// add_option('vi_whatsapp_wp_redirect_on_deactivate_option', 'true');
	}

}
