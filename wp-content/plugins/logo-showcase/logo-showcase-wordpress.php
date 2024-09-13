<?php
/**
 * Plugin Name: Logo Showcase
 * Plugin URI: https://www.themepoints.com/shop/logo-showcase-pro
 * Description: Logo Showcase plugin allow to Display a list of clients, supporters, partners or sponsors logos in your WordPress website easily.
 * Version: 3.0.0
 * Author: Themepoints
 * Author URI: https://themepoints.com
 * TextDomain: logoshowcase
 * License: GPLv2
 */


if ( ! defined( 'ABSPATH' ) ) {
	die( "Can't load this file directly" );
}

// Define constants for plugin paths
define( 'LOGO_SHOWCASE_VERSION', '3.0.0' );
define( 'LOGO_SHOWCASE_WP_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'logo_showcase_wp_plugin_dir', plugin_dir_path( __FILE__ ) );
add_filter( 'widget_text', 'do_shortcode' );

// Include necessary files
require_once( plugin_dir_path( __FILE__ ) . 'inc/logo-showcase-postytpe.php' );
require_once( plugin_dir_path( __FILE__ ) . 'inc/logo-showcase-metabox.php' );
require_once( plugin_dir_path( __FILE__ ) . 'shortcode/logo-showcase-shortcode.php' );

// Load translation for the plugin
function logo_showcase_wordpress_load_textdomain(){
	load_plugin_textdomain( 'logoshowcase', false, dirname( plugin_basename( __FILE__ ) ) .'/languages/' );
}
add_action( 'plugins_loaded', 'logo_showcase_wordpress_load_textdomain' );

// logo showcase WordPress Admin enqueue scripts
function logo_showcase_wordpress_post_script(){
	wp_enqueue_script( "jquery-ui-sortable" );
	wp_enqueue_script( "jquery-ui-draggable" );
	wp_enqueue_script( "jquery-ui-droppable" );
	wp_enqueue_style( 'logo-showcase-style', plugins_url( 'frontend/css/logo-showcase-wordpress.css' , __FILE__ ) );
	wp_enqueue_style( 'logo-showcase-owl', plugins_url( 'frontend/css/owl.carousel.css' , __FILE__ ) );
	wp_enqueue_style( 'logo-showcase-tipso', plugins_url( 'frontend/css/tipso.css' , __FILE__ ) );
	wp_enqueue_style( 'logo-showcase-awesome-css', plugins_url( 'admin/css/font-awesome.css' , __FILE__ ) );
	wp_enqueue_script( 'logo-showcase-owl-js', plugins_url( 'frontend/js/owl.carousel.js', __FILE__ ), array( 'jquery' ), '2.4', true );	
	wp_enqueue_script( 'logo-showcase-tipso-js', plugins_url( 'frontend/js/tipso.js', __FILE__ ), array( 'jquery' ), '1.0.8', true );
}
add_action( 'wp_enqueue_scripts', 'logo_showcase_wordpress_post_script' );

// logo showcase WordPress Admin enqueue scripts
function logo_showcase_wordpress_admin_enqueue_scripts() {
	global $typenow;
	if ( ( $typenow == 'tplogoshowcase' ) ) {
		wp_enqueue_style( 'logo-showcase-menu-style', plugins_url( 'admin/css/logo-showcase-menu-style.css' , __FILE__ ) );
		wp_enqueue_script( 'logo-showcase-admin-js', plugins_url('admin/js/logo-showcase-backend-admin.js', __FILE__), array('jquery'), '1.0.0', true);
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'logo_showcase_color_picker', plugins_url( 'admin/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		wp_enqueue_script( "jquery-ui-sortable" );
		wp_enqueue_script( "jquery-ui-draggable" );
		wp_enqueue_script( "jquery-ui-droppable" );
		wp_enqueue_media();
		wp_enqueue_style( 'logo-showcase-awesome-css', plugins_url( 'admin/css/font-awesome.css' , __FILE__ ) );
	}
}
add_action( 'admin_enqueue_scripts', 'logo_showcase_wordpress_admin_enqueue_scripts' );

// Add Plugin Submenu Page
function themepoints_logo_showcase_submenu_pages() {
	add_submenu_page( 'edit.php?post_type=tplogoshowcase', __( 'Support & Doc', 'logoshowcase' ), __( 'Support & Doc', 'logoshowcase' ), 'manage_options', 'support', 'themepoints_logo_showcase_support_callback' );
}

// Require Plugin Callback File
function themepoints_logo_showcase_support_callback() {
	require_once( plugin_dir_path( __FILE__ ) . '/inc/logo-showcase-admin-info.php' );
}
add_action( 'admin_menu', 'themepoints_logo_showcase_submenu_pages' );

// Activation hook actions for the frontend
function themepoints_logo_showcase_activation_for_backend(){
    $installed = get_option( 'tlsw_logoshowcase_activation_time' );
    // Check if this is the first activation
    if (! $installed ) {
        // If so, set the installation time
        update_option('tlsw_logoshowcase_activation_time', time() );
    }
}
register_activation_hook( __FILE__, 'themepoints_logo_showcase_activation_for_backend' );

// Activation hook
function logo_showcase_wordpress_get_version_link( $links ) {
   $links[] = '<a style="color:red;font-weight:bold;" href="https://www.themepoints.com/shop/logo-showcase-pro" target="_blank">Upgrade to Pro!</a>';
   return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'logo_showcase_wordpress_get_version_link' );