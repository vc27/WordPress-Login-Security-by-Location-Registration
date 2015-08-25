<?php
/**
 * @package WordPress
 * @subpackage ProjectName
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * Description:
 **/
####################################################################################################





/**
 * Class_Name_WP
 *
 * Description:
 **/
class Class_Name_WP {



	/**
	 * optionName
	 *
	 * @access public
	 * @var string
	 * @since 0.0.0
	 **/
	var $optionName = false;



	/**
	 * errors
	 *
	 * @access public
	 * @var array
	 * @since 0.0.0
	 **/
	var $errors = array();



	/**
	 * haveErrors
	 *
	 * @access public
	 * @var bool
	 * @since 0.0.0
	 **/
	var $haveErrors = 0;



	/**
	 * logDestination
	 *
	 * @access public
	 * @var bool
	 * @since 0.0.0
	 **/
	var $logDestination = 'Class_Name_WP.log';






	/**
	 * __construct
	 *
	 * Description:
	 **/
	function __construct() {

		// add_action( 'after_setup_theme', array( &$this, 'after_setup_theme' ) );
		// add_action( 'init', array( &$this, 'init' ) );
		// add_action( 'admin_init', array( &$this, 'admin_init' ) );

	} // end function __construct






	/**
	 * after_setup_theme
	 *
	 * Description:
	 **/
	function after_setup_theme() {

		//

	} // end function after_setup_theme






	/**
	 * init
	 *
	 * Description:
	 **/
	function init() {

        //

	} // end function init






	/**
	 * admin_init
	 *
	 * Description:
	 **/
	function admin_init() {

		//

	} // end function admin_init






	/**
	 * set
	 *
	 * Description:
	 **/
	function set( $key, $val = false ) {

		if ( isset( $key ) AND ! empty( $key ) ) {
			$this->$key = $val;
		}

	} // end function set






	/**
	 * error
	 *
	 * Description:
	 **/
	function error( $errorKey ) {

		$this->errors[] = $errorKey;

	} // end function error






	/**
	 * get
	 *
	 * Description:
	 **/
	function get( $key ) {

		if ( isset( $key ) AND ! empty( $key ) AND isset( $this->$key ) AND ! empty( $this->$key ) ) {
			return $this->$key;
		} else {
			return false;
		}

	} // end function get






	/**
	 * log
	 * @since 0.0.0
	 **/
	function log( $message, $line, $message_type = 3, $destination = false ) {

		if ( ! $destination AND $this->logDestination ) {
			$destination = $this->logDestination;
		}

		$output = array(
			'date' => date('Y-m-d H:i:s')
			,"message" => $message
			,"line" => $line
			,"path" => realpath(__FILE__)
		);
		$message = "\n" . json_encode($output);

		error_log( $message, $message_type, $destination );

	} // end function log






	####################################################################################################
	/**
	 * Functionality
	 **/
	####################################################################################################






	/**
	 * exampleFunction
	 *
	 * Description:
	 **/
	function exampleFunction() {

		// exampleFunction

	} // end function exampleFunction






	####################################################################################################
	/**
	 * Conditionals
	 **/
	####################################################################################################






	/**
	 * haveErrors
	 *
	 * Description:
	 **/
	function haveErrors() {

		if ( isset( $this->errors ) AND ! empty( $this->errors ) AND is_array( $this->errors ) ) {
			$this->set( 'haveErrors', 1 );
		} else {
			$this->set( 'haveErrors', 0 );
		}

		return $this->haveErrors;

	} // end function haveErrors



} // end class Class_Name_WP
