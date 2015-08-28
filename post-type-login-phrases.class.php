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
 * Post_Type_Login_Phrases
 **/
class Post_Type_Login_Phrases {



	/**
	 * post type query variable
	 * @var array
	 * @since 1.0.0
	 **/
	var $query_var = null;



	/**
	 * post type options
	 * @var array
	 * @since 1.0.0
	 **/
	var $options = null;



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
	 * register_post_type
	 * @since 1.0.0
	 **/
	function register_post_type() {

		if ( $this->query_var AND $this->options ) {
			register_post_type( $this->query_var, apply_filters( "register_post_type-$this->query_var", $this->options ) );
		}

	} // end function register_post_type



} // end class Post_Type_Login_Phrases
