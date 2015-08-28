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
 * Settings_WPLSLR
 *
 * Description:
 **/
class Settings_WPLSLR {



	/**
	 * Define plugin version
	 * @var string
	 * @since 1.0.0
	 **/
	const WPLSLR_VERSION = '1.0.0';

	/**
	 * Define plugin minimum version
	 * @var string
	 * @since 1.0.0
	 **/
	const MINIMUM_WP_VERSION = '4.0.0';

	/**
	 * Define plugin text domain for translatable strings
	 * @var string
	 * @since 1.0.0
	 **/
	const TEXT_DOMAIN = 'wpslsr';

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
	 * options for post type login phrases
	 * @var array
	 * @since 1.0.0
	 **/
	var $post_type_options = array();



	/**
	 * post type name
	 * @var string
	 * @since 1.0.0
	 **/
	static $post_type_name = 'Login Phrases';



	/**
	 * post type query_var
	 * @var string
	 * @since 1.0.0
	 **/
	static $post_type_query_var = 'login-phrases';



	/**
	 * construct
	 *
	 * @since 1.0.0
	 **/
	function __construct() {

		$this->set( 'plugin_dir_url', plugin_dir_url( __FILE__ ) );
		$this->set( 'plugin_dir_path', plugin_dir_path( __FILE__ ) );

		$this->set( 'post_type_options', array(
			'labels' => array(
				'name' => __( self::$post_type_name, self::TEXT_DOMAIN ),
				'singular_name' => __( self::$post_type_name, self::TEXT_DOMAIN ),
				'add_new' => __( 'Add New', self::TEXT_DOMAIN ),
				'add_new_item' => __( 'Add New', self::TEXT_DOMAIN ),
				'edit_item' => __( "Edit " . self::$post_type_name, self::TEXT_DOMAIN ),
				'new_item' => __( "New " . self::$post_type_name, self::TEXT_DOMAIN ),
				'view_item' => __( "View " . self::$post_type_name, self::TEXT_DOMAIN ),
				'search_items' => __( "Search " . self::$post_type_name, self::TEXT_DOMAIN ),
				'not_found' => __( "No " . self::$post_type_name . " found", self::TEXT_DOMAIN ),
				'not_found_in_trash' => __( "No " . self::$post_type_name . " found in Trash", self::TEXT_DOMAIN ),
				'parent_item_colon' => '',
				'menu_name' => __( self::$post_type_name, self::TEXT_DOMAIN )
			),
			'public' => false,
			'show_ui' => true,
			'show_in_menu' => 'users.php',
			'capability_type' => 'post', // requires 'page' to call in post_parent
			'supports' => array(
				'title',
				'editor'
			),
			'query_var' => self::$post_type_query_var, // This goes to the WP_Query schema
			'can_export' => true,
			'_builtin' => false,

		) );

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



} // end class Settings_WPLSLR
