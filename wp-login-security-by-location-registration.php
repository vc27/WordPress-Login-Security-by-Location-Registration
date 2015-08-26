<?php
/**
 * Plugin Name: WP login security by location registration (WPLSLR)
 * Plugin URI: https://github.com/vc27/wp-login-security-by-location-registration
 * Description: Block your WordPress login to all IP address that have not been white-listed. White list IP's by completing custom phrases that meet zxcvbn crack time of centuries.
 * Version: 1.0.0
 * Author: Randy Hicks
 * Author URI: http://vc27.com
 * License: GPLv2 or later
 * Text Domain: wplslr
 *
 * @package wplslr
 *
 * Note: Please reference WP Coding standards and update any issues you find
 * https://codex.wordpress.org/WordPress_Coding_Standards
 **/
#################################################################################################### */



// Make sure we don't expose any info if called directly
if ( ! defined('ABSPATH') ) {
	wp_die('Hold your horses there pal!');
}



// Make sure this file is only being called once.
if ( defined('WPLSLS_INIT') ) {
	return;
}



// Require settings class
require_once( 'settings-wpslsr.class.php' );

// Require logging class
require_once( 'log-wpslsr.class.php' );

// Class for handing phrase for display and submission handling
// require_once( 'phrase_form_display_submission_handling_wplslr.class.php' );



/**
 * WPLSLS class
 * Core administration and functionality.
 **/
class WPLSLS {

	/**
	 * settings
	 *
	 * @access public
	 * @var mix
	 * @since 1.0.0
	 **/
	var $settings = null;



	/**
	 * construct
	 *
	 * @since 1.0.0
	 **/
	function __construct() {

		$this->set( 'settings', new Settings_WPLSLR() );

	} // end function __construct



	/**
	 * init the plugin
	 *
	 * @since 1.0.0
	 **/
	function init_plugin() {

		// init -> if ! post_type_exists( $post_type ) register custom post type = login-phrases
		// init -> add_rewrite_rule
		// init -> accept custom urls & process the associated data

	} // end function init_plugin



	/**
	 * The register_activation_hook function registers a
	 * plugin function to be run when the plugin is activated.
	 *
	 * @since 1.0.0
	 **/
	function register_activation_hook() {

		// register custom post type = login-phrases
		// flush rewrite rules
		// save current users IP as a safe location

	} // end function register_activation_hook



	/**
	 * The function register_deactivation_hook (introduced in
	 * WordPress 2.0) registers a plugin function to be run
	 * when the plugin is deactivated.
	 *
	 * @since 1.0.0
	 **/
	function register_deactivation_hook() {

		// flush rewrite rules

	} // end function register_deactivation_hook



	####################################################################################################
	/**
	 * Set Get
	 **/
	####################################################################################################



	/**
	 * Set a variable with in the class. Use to avoid empty
	 * variable and ensure that all values are fully set
	 *
	 * @since 1.0.0
	 * @param $key the name of the variable
	 * @param $val the value of the variable defaults to false
	 **/
	function set( $key, $val = false ) {

		if ( isset( $key ) AND ! empty( $key ) ) {
			$this->$key = $val;
		}

	} // end function set

} // end class WPLSLS



/**
 * Instantiate WPLSLS
 * @since 1.0.0
 **/
$WPLSLS = new WPLSLS();



/**
 * The register_activation_hook function registers a
 * plugin function to be run when the plugin is activated.
 *
 * @since 1.0.0
 **/
register_activation_hook( __file__, array( $WPLSLS, 'register_activation_hook' ) );



/**
 * The function register_deactivation_hook (introduced in
 * WordPress 2.0) registers a plugin function to be run
 * when the plugin is deactivated.
 *
 * @since 1.0.0
 **/
register_deactivation_hook( __file__, array( $WPLSLS, 'register_deactivation_hook' ) );



/**
 * Define a plugin constant to ensure that the plugin
 * is only being called once.
 *
 * @since 1.0.0
 **/
define( 'WPLSLS_INIT', true );
