<?php
/**
 * @package wplslr
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since 1.0.0
 *
 * Description: Class for post type functionality
 *
 * Note: Please reference WP Coding standards and update any issues you find
 * https://codex.wordpress.org/WordPress_Coding_Standards
 **/
#################################################################################################### */





/**
 * Login_Form_WPSLSR
 **/
class Login_Form_WPSLSR {



	/**
	 * post type query variable
	 * @var array
	 * @since 1.0.0
	 **/
	var $query_var = null;



	/**
	 * __construct
	 **/
	function __construct() {



	} // end function __construct



	/**
	 * set
	 * @param $key string
	 * @param $val mix
	 * @since 1.0.0
	 **/
	function set( $key, $val = false ) {

		if ( isset( $key ) AND ! empty( $key ) ) {
			$this->$key = $val;
		}

	} // end function set



	/**
	 * login_init
	 * @since 1.0.0
	 **/
	function login_init() {

		// check if IP is safe
		// display form
		// handle form submission
		// allow for bypass

	} // end function login_init



} // end class Login_Form_WPSLSR
