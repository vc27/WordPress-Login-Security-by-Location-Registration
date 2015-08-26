<?php
/**
 * @package wplslr
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since 1.0.0
 *
 * Description: Basic class for holding all settings related to the plugin.
 *
 * Note: Please reference WP Coding standards and update any issues you find
 * https://codex.wordpress.org/WordPress_Coding_Standards
 **/
#################################################################################################### */





/**
 * Settings_WPLSLS
 *
 * Description:
 **/
class Settings_WPLSLS {



	/**
	 * Define plugin version
	 * @var string
	 * @since 1.0.0
	 **/
	const WPLSLS_VERSION = '1.0.0';

	/**
	 * Define plugin minimum version
	 * @var string
	 * @since 1.0.0
	 **/
	const MINIMUM_WP_VERSION = '4.0.0';

	/**
	 * URL (with trailing slash) for the plugin __FILE__ passed in
	 * @var string
	 * @since 1.0.0
	 **/
	var $plugin_dir_url = false;

	/**
	 * filesystem directory path (with trailing slash) for the file passed in
	 * @var string
	 * @since 1.0.0
	 **/
	var $plugin_dir_path = false;



	/**
	 * construct
	 *
	 * @since 1.0.0
	 **/
	function __construct() {

		$this->set( 'plugin_dir_url', plugin_dir_url( __FILE__ ) );
		$this->set( 'plugin_dir_path', plugin_dir_path( __FILE__ ) );

	} // end function __construct



} // end class Settings_WPLSLS
