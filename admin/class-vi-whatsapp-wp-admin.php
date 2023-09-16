<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/vishvega/vi-whatsapp-wp
 * @since      1.0.0
 *
 * @package    Vi_Whatsapp_WP
 * @subpackage Vi_Whatsapp_WP/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Vi_Whatsapp_WP
 * @subpackage Vi_Whatsapp_WP/admin
 * @author     Vishwa LiyanaArachchi
 */
class Vi_Whatsapp_Wp_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		// $this->option_name = $option_name;
		$this->txt_domain = $txt_domain;

	}


	/**
	 * Register the stylesheets for the admin area.
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

		//jQuery nice select : css
		wp_enqueue_style( $this->plugin_name . '_nscss', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css' , array(), $this->version, 'all' );

		// plugin admin css
		wp_enqueue_style( $this->plugin_name . '_admincss', plugin_dir_url( __FILE__ ) . 'css/vi-whatsapp-wp-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		//jQuery nice select : js
		wp_enqueue_script( $this->plugin_name . '_nsjs' , 'https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js', array( 'jquery' ), $this->version, false );

		// plugin admin js 
		wp_enqueue_script( $this->plugin_name . '_adminjs' , plugin_dir_url( __FILE__ ) . 'js/vi-whatsapp-wp-admin.js', array( 'jquery' ), $this->version, false );

	}


	/**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.1
	 */
	public function vi_whatsapp_wp_add_menu_page() {

		include_once 'partials/vi-whatsapp-wp-admin-assets.php';
		
		$get_icon = get_assets("dashboard_icon");

		$this->plugin_screen_hook_suffix = add_menu_page(
			__( 'Whatsapp WP', $this->txt_domain ),
			__( 'Whatsapp WP', $this->txt_domain ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'vi_whatsapp_wp_display_options_page' ),
			'data:image/svg+xml;base64,' . base64_encode( $get_icon ),
			96
		);
	
	}


	/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function vi_whatsapp_wp_display_options_page() {
		if ( !current_user_can( 'manage_options' ) ):
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		else:
			include_once 'partials/vi-whatsapp-wp-admin-display.php';
		endif;
	}

	/**
	 * Render custom footer elements inside options page for plugin
	 *
	 * @since  1.0.0
	*/

	public function vi_whatsapp_wp_custm_pg_footer(){

		$screen = get_current_screen();
		
		// check the plugin admin page
		if( is_admin() && ($screen->parent_file == $this->plugin_name)  ) { 
			// replace the footer with empty string
			return "<span id='footer-thankyou'>&copy; ".date('Y'). " Vishwa LiyanaArachchi. Whatsapp for WordPress, version ".$this->version." </span>";

		}
		else{
			$text = sprintf(
				/* translators: %s: https://wordpress.org/ */
				__( 'Thank you for creating with <a href="%s">WordPress</a>.' ),
				__( 'https://wordpress.org/' )
			);
			return "<span id='footer-thankyou'>" . $text . "</span>";
		}
	}


	/**
	 * Render plugin settings and user preferences
	 *
	 * @since  1.0.0
	*/
	public function vi_whatsapp_wp_registr_settings(){

		// Vars
		$plugin_slug 	= $this->plugin_name;
		
		// 1. Render settings section
		add_settings_section(
			$this->option_name . '_general',
			__ ('General Config', $this->txt_domain ),
			array( $this, $this->option_name . '_general_cb' ),
			$this->plugin_name
		);

		// 2. Settings Fields

		// 2.1 Contact Number
		add_settings_field(
			$this->option_name . '_contact_num',
			__( 'Whatsapp Number' , $this->txt_domain ),
			array( $this, $this->option_name . '_contact_num_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array('label_for' => $this->option_name . '_contact_num')
		);

		// 2.2 Integrated option for show on frontend
		add_settings_field(
			$this->option_name . '_frontview',
			__( 'View as ', $this->txt_domain ),
			array( $this, $this->option_name . '_frontview_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array('label_for' => $this->option_name . '_frontview')
		);




		// 3. Register fields
		register_setting( $this->option_name. '_general' , $this->option_name . '_contact_num' );
		register_setting( $this->option_name. '_general' , $this->option_name . '_frontview' );


	}


	/**
	 * Render general callback for plugin settings 
	 *
	 * @since  1.0.0
	*/
	public function vi_whatsapp_wp_settings_general_cb(){
		// echo "<p>" . __ ('Plugin Options', $this->txt_domain ) . "</p>";
	}

	/**
	 * Render input fields for plugin settings 
	 * --- All inputs are rendered here
	 * @since  1.0.0
	*/

	// 1. Contcat number
	public function vi_whatsapp_wp_settings_contact_num_cb(){ ?>
		<fieldset class="wa_for_wp_vi_settings_inputs">
			<input 
				type="text" 
				name="<?php echo $this->option_name . '_contact_num' ?>" 
				id="<?php echo $this->option_name . '_contact_num' ?>"
				value="<?php echo (!empty( get_option( $this->option_name . '_contact_num' ) )) ? get_option( $this->option_name . '_contact_num' )  : ""   ?>"
				placeholder="Ex : +1 555-555-555 ">
		</fieldset>
	<?php }

	// 2. View as option
	public function vi_whatsapp_wp_settings_frontview_cb(){ 
		
		$view_as_options = array(
			"1"=>"Icon Only",
			"2"=>"Chat Box",
			"3"=>"Full Integration",
		);
		
		?>
		<fieldset>
			<select 
				name="<?php echo $this->option_name . '_frontview' ?>" 
				id="<?php echo $this->option_name . '_frontview' ?>"
				class="niced wide" >
				
				<?php  foreach ($view_as_options as $keyViewAs => $viewOption): ?>
				<option 
					value="<?php echo $keyViewAs ?>"
					<?php echo ( (!empty( get_option( $this->option_name . '_frontview' ) ) ) && ( get_option( $this->option_name . '_frontview' ) == $keyViewAs )  ) ? "class='selected' selected='selected' " : "" ?> >
						<?php echo $viewOption ?>
				</option>
				<?php endforeach ?>
			</select>
		</fieldset>

		<?php /* <!-- <script>$('select.niced').niceSelect('update');</script> -->  */ ?>
		
		
	<?php }




}
