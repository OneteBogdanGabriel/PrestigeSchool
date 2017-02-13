<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    wave_woo_admin
 * @subpackage wave_woo_admin/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    wave_woo_admin
 * @subpackage wave_woo_admin/public
 * @author     Your Name <email@example.com>
 */
class wave_woo_admin_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $wave_woo_admin    The ID of this plugin.
	 */
	private $wave_woo_admin;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $wave_woo_admin       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $wave_woo_admin, $version ) {

		$this->wave_woo_admin = $wave_woo_admin;
		$this->version = $version;

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
		 * defined in wave_woo_admin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The wave_woo_admin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->wave_woo_admin, plugin_dir_url( __FILE__ ) . 'css/wave-woo-admin-public.css', array(), $this->version, 'all' );

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
		 * defined in wave_woo_admin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The wave_woo_admin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->wave_woo_admin, plugin_dir_url( __FILE__ ) . 'js/wave-woo-admin-public.js', array( 'jquery' ), $this->version, false );

	}

}
