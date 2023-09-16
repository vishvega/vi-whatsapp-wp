<?php

/**
 * The Whatsapp WP bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/vishvega/vi-whatsapp-wp
 * @since             1.0.0
 * @package           Vi_Whatsapp_WP
 *
 * @wordpress-plugin
 * Plugin Name:       Whatsapp WP
 * Plugin URI:        https://github.com/vishvega/vi-whatsapp-wp
 * Description:       Whatsapp for WordPress is a highly customizable, actively updated, WordPress plugin for integrating Whatsapp into WordPress..
 * Version:           1.0.0
 * Author:            Vishwa LiyanaArachchi
 * Author URI:        https://github.com/vishvega/vi-whatsapp-wp
 * License:           GNU GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       vi-whatsapp-wp
 * Domain Path:       /languages
 */


// vi_whatsapp_wp

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Current plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions. | Given a version number MAJOR.MINOR.PATCH.
 */
define( 'VI_WHATSAPP_WP_VERSION', '1.0.11' );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-vi-whatsapp-wp-activator.php
 */
function activate_vi_whatsapp_wp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vi-whatsapp-wp-activator.php';
	Vi_Whatsapp_Wp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-vi-whatsapp-wp-deactivator.php
 */
function deactivate_vi_whatsapp_wp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vi-whatsapp-wp-deactivator.php';
	Vi_Whatsapp_Wp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_vi_whatsapp_wp' );
register_deactivation_hook( __FILE__, 'deactivate_vi_whatsapp_wp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-vi-whatsapp-wp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_vi_whatsapp_wp() {

	$plugin = new Vi_Whatsapp_Wp();
	$plugin->run();

}
run_vi_whatsapp_wp();
