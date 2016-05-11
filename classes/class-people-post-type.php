<?php

/**
 * Class People_Post_Type
 * 
 * Class for creating People custom post type
 * 
 * @since      1.0.0
 * 
 * @subpackage People/classes
 * @package    People
 */

class People_Post_Type {

	/**
	 * Sets POST_TYPE constant
	 * Used by register_post_type() in custom_post_type()
	 *
	 * @var        string
	 */
	const POST_TYPE = 'ppl-people';

	/**
	 * Constructor
	 * 
	 * Hooks custom_post_type() into 'init'
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'custom_post_type' ) );
	}

	/**
	 * Creates and registers People custom post-type
	 */
	public function custom_post_type() {

		/**
		 * Defines Labels for People custom post-type
		 *
		 * @var        array
		 */
		$labels = array(
			'name'					=> 'People',
			'singular_name'			=> 'Person',
			'add_new'				=> 'Add New',
			'all_items'				=> 'All People',
			'add_new_item'			=> 'Add New Person',
			'edit_item'				=> 'Edit Person',
			'new_item'				=> 'New Person',
			'view_item'				=> 'View Person',
			'search_items'			=> 'Search People',
			'not_found'				=> 'No People Found',
			'not_found_in_trash'	=> 'No People were hiding in the trash',
			'archives'				=> 'People Archives',
			'insert_into_item'		=> 'Insert into profile',
			'uploaded_to_this_item'	=> 'Uploaded to this profile',
			'featured_image'		=> 'Profile Image',
			'set_featured_image'	=> 'Set profile image',
			'remove_featured_image' => 'Remove profile image',
			'use_featured_image'	=> 'Use as profile image',
		);

		/**
		 * Registers what WordPress features People custom post-type supports
		 *
		 * @var        array
		 */
		$supports = array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'custom-fields'
		);

		/**
		 * Registers meta boxes
		 */
		function people_meta_boxes() {

			include PEOPLE_PLUGIN_PATH . 'classes/meta-boxes/class-position-meta-box.php';

			$position = new Position_Meta_Box();

		}

		/**
		 * Defines arguments for registering People custom post-type
		 *
		 * @var        array
		 */
		$args = array(
			'labels' 	=> $labels,
			'public' 	=> true,
			'rewrite' 	=> array( 'slug' => 'people' ),
			'menu_icon' => 'dashicons-id-alt',
			'supports' 	=> $supports,
			'register_meta_box_cb'	=> 'people_meta_boxes'
		);

		register_post_type( $this::POST_TYPE, $args );
	}

}
