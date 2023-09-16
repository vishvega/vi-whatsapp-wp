<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/vishvega/vi-whatsapp-wp
 * @since      1.0.0
 *
 * @package    Vi_Whatsapp_WP
 * @subpackage Vi_Whatsapp_WP/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Vi_Whatsapp_WP
 * @subpackage Vi_Whatsapp_WP/public
 * @author     Vishwa LiyanaArachchi
 */
class Vi_Whatsapp_Wp_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The options name of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $option_name = "vi_whatsapp_wp_settings";

	/**
	 * The text domain / slug of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $txt_domain = "vi-whatsapp-wp";

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		// $this->option_name = $option_name;
		$this->txt_domain = $txt_domain;

	}

	public function vi_whatsapp_wp_show_wa_wrapper(){
		// if ( ( !is_admin() ) && ( ( $GLOBALS['pagenow'] === 'wp-login.php' && ! empty( $_REQUEST['action'] ) && $_REQUEST['action'] === 'register' ) ) ) :
		if ( !is_admin() ) :
			include_once 'partials/vi-whatsapp-wp-public-display.php';
		endif;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Whatsapp_For_Wordpress_Vi_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Whatsapp_For_Wordpress_Vi_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/vi-whatsapp-wp-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Whatsapp_For_Wordpress_Vi_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Whatsapp_For_Wordpress_Vi_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/vi-whatsapp-wp-public.js', array( 'jquery' ), $this->version, false );

	}

}
