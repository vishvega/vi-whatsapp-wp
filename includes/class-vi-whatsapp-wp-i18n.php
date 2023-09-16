<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/vishvega/vi-whatsapp-wp
 * @since      1.0.0
 *
 * @package    Vi_Whatsapp_WP
 * @subpackage Vi_Whatsapp_WP/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Vi_Whatsapp_WP
 * @subpackage Vi_Whatsapp_WP/includes
 * @author     Vishwa LiyanaArachchi
 */
class Vi_Whatsapp_Wp_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'vi-whatsapp-wp',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
