<?php
/**
 * @package wplslr
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * Note: Please reference WP Coding standards and update any issues you finde
 * https://codex.wordpress.org/WordPress_Coding_Standards
 **/
#################################################################################################### */

// Make sure we don't expose any info if called directly
if ( ! defined('ABSPATH') ) {
	wp_die('Hold your horses there pal!');
}

// Make sure this file is only bing called once.
if ( defined('WPLSLS_INIT') ) {
	return;
}

/**
 * Define plugin settings
 **/
class WPLSLS {

	/**
	 * Define plugin version
	 * @var string
	 **/
	const WPLSLS_VERSION = '1.0.0';

	/**
	 * Define plugin minimum version
	 * @var string
	 **/
	const MINIMUM_WP_VERSION = '4.0.0';

	/**
	 * URL (with trailing slash) for the plugin __FILE__ passed in
	 * @var string
	 **/
	var $plugin_dir_url = false;

	/**
	 * filesystem directory path (with trailing slash) for the file passed in
	 * @var string
	 **/
	var $plugin_dir_path = false;

	/**
	 * construct
	 **/
	function __construct() {

		$plugin_dir_url = plugin_dir_url( __FILE__ );
		$plugin_dir_path = plugin_dir_path( __FILE__ );

	} // end function __construct



	/**
	 * init the plugin
	 **/
	function init_plugin() {

		// nothing yet

	} // end function init_plugin



	/**
	 * The register_activation_hook function registers a
	 * plugin function to be run when the plugin is activated.
	 **/
	function register_activation_hook() {

		// nothing yet

	} // end function register_activation_hook



	/**
	 * The function register_deactivation_hook (introduced in
	 * WordPress 2.0) registers a plugin function to be run
	 * when the plugin is deactivated.
	 **/
	function register_deactivation_hook() {

		// nothing yet

	} // end function register_deactivation_hook



	/**
	 * Set a variable with in the class. Use to avoid empty
	 * variable and ensure that all values are fully set
	 *
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
 * Define a plugin constant to ensure that the plugin
 * is only being called once.
 **/
define( 'WPLSLS_INIT', true );
