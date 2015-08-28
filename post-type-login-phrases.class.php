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
	var $options = array();



	/**
	 * translation text domain
	 * @var string
	 * @since 1.0.0
	 **/
	var $text_domain = null;



	/**
	 * __construct
	 **/
	function __construct() {

		$this->set( 'name', Settings_WPLSLR::$post_type_name );
		$this->set( 'query_var', Settings_WPLSLR::$post_type_query_var );
		$this->set( 'text_domain', Settings_WPLSLR::TEXT_DOMAIN );

		$this->set( 'options', array(
			'labels' => array(
				'name' => __( $this->name, $this->text_domain ),
				'singular_name' => __( $this->name, $this->text_domain ),
				'add_new' => __( 'Add New', $this->text_domain ),
				'add_new_item' => __( 'Add New', $this->text_domain ),
				'edit_item' => __( "Edit " . $this->name, $this->text_domain ),
				'new_item' => __( "New " . $this->name, $this->text_domain ),
				'view_item' => __( "View " . $this->name, $this->text_domain ),
				'search_items' => __( "Search " . $this->name, $this->text_domain ),
				'not_found' => __( "No " . $this->name . " found", $this->text_domain ),
				'not_found_in_trash' => __( "No " . $this->name . " found in Trash", $this->text_domain ),
				'parent_item_colon' => '',
				'menu_name' => __( $this->name, $this->text_domain )
			),
			'public' => false,
			'show_ui' => true,
			'show_in_menu' => 'users.php',
			'capability_type' => 'post', // requires 'page' to call in post_parent
			'supports' => array(
				'title',
				'editor'
			),
			'query_var' => $this->query_var, // This goes to the WP_Query schema
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



	/**
	 * register_post_type
	 * @since 1.0.0
	 **/
	function register_post_type() {

		register_post_type( $this->query_var, apply_filters( "register_post_type-$this->query_var", $this->options ) );

	} // end function register_post_type



} // end class Post_Type_Login_Phrases
