<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           wave_woo_admin
 *
 * @wordpress-plugin
 * Plugin Name:       Wave WOO ADMIN
 * Plugin URI:        http://www.webmasterbulletin.net/software/wordpress-plugin/full-woo-commerce-admin
 * Description:       Full category product hierarchy for woocommerce.
 * Version:           0.2
 * Author:            BREIZHWAVE
 * Author URI:        http://wave.bzh/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wave-woo-admin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wave-woo-admin-activator.php
 */
function activate_wave_woo_admin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wave-woo-admin-activator.php';
	wave_woo_admin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wave-woo-admin-deactivator.php
 */
function deactivate_wave_woo_admin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wave-woo-admin-deactivator.php';
	wave_woo_admin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wave_woo_admin' );
register_deactivation_hook( __FILE__, 'deactivate_wave_woo_admin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wave-woo-admin.php';
 
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wave_woo_admin() {

	$plugin = new wave_woo_admin();
	$plugin->run();

}
run_wave_woo_admin();
