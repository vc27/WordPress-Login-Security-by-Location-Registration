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



	/**
	 * Add scripts to wp-admin
	 * @since 1.0.0
	 **/
	function admin_enqueue_scripts() {
		global $post_type;

		if ( 'login-phrases' != $post_type ) {
			return $settings;
		}

		wp_register_script( 'passphrase-admin', plugin_dir_url( __FILE__ ) . 'js/admin-js.js', array('jquery','password-strength-meter'), null );

		wp_localize_script(
			'passphrase-admin',
			Settings_WPLSLR::$localize_obj_name,
			array(
				'active' => 1,
				'empty' => __( 'Strength indicator', $this->text_domain ),
				'short' => __( 'Very weak', $this->text_domain ),
				'bad' => __( 'Weak', $this->text_domain ),
				'good' => __( 'Medium', $this->text_domain ),
				'strong' => __( 'Strong', $this->text_domain ),
				'mismatch' => __( 'Mismatch', $this->text_domain ),
				'random_phrase_strings' => Settings_WPLSLR::$random_phrase_strings
			)
		);

		wp_enqueue_script( 'passphrase-admin' );

	} // end function admin_enqueue_scripts



	/**
	 * Filter the post wp_editor settings to output a simple text editor
	 * @since 1.0.0
	 * @param $settings array
	 * @param $editor_id string
	 **/
	function filter_wp_editor_settings( $settings, $editor_id ) {
		global $post_type;

		if ( 'login-phrases' != $post_type ) {
			return $settings;
		}

		$settings['media_buttons'] = false;
		$settings['textarea_rows'] = 6;
		$settings['tinymce'] = false;

		// do cool stuff
		// remove media buttons
		// remove visual editor
		// all that should be left is a plain text editor

		return $settings;

	} // end function filter_wp_editor_settings



	/**
	 * Add desription just above the wp_editor
	 * @since 1.0.0
	 * @param $post object
	 **/
	function wp_editor_description( $post ) {
		global $post_type;

		if ( 'login-phrases' != $post_type ) {
			return $settings;
		}

		echo wpautop(Settings_WPLSLR::$wp_editor_description);

	} // end function wp_editor_description



	/**
	 * Add passphras action buttons for checking passphrase strengh and validity.
	 * @since 1.0.0
	 * @param $post object
	 **/
	function add_passphrase_action_buttons( $post ) {
		global $post_type;

		if ( 'login-phrases' != $post_type ) {
			return $settings;
		}

		?>
		<hr />
		<style type="text/css">
			.default {
				background:#fff;
				line-height:24px;
				padding:3px 10px;
				border-left:solid 4px red;
				font-weight:800;
				width:70px;
				display:inline-block;
			}
			.bad { border-left-color:red; }
			.good { border-left-color:orange; }
			.strong { border-left-color:green; }
			.short { border-left-color:red; }
			#ed_toolbar {
				display:none;
			}
			#content {
				margin-top:0 !important;
			}
		</style>
		<p><span id="wplslr-password-strength" class="default">Checking...</span> <button id="wplslr-set-random-phrase" class="button">Set random phrase</button></p>
		<?php

	} // end function add_passphrase_action_buttons



} // end class Post_Type_Login_Phrases
