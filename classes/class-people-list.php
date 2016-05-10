<?php

/**
 * Class People_List
 * 
 * Class for creating List custom taxonomy
 * 
 * @since      1.0.0
 * 
 * @subpackage People/classes
 * @package    People
 */

class People_List {

	public function __construct() {
		add_action( 'init', array( $this, 'custom_taxonomy' ) );
	}

	public function custom_taxonomy() {

		$labels = array(
			'name' 							=> 'Lists',
			'singular_name' 				=> 'List',
			'all_items' 					=> 'All Lists',
			'edit_item' 					=> 'Edit List',
			'view_item' 					=> 'View List',
			'update_item' 					=> 'Update List',
			'add_new_item' 					=> 'Add New List',
			'new_item_name' 				=> 'New List Name',
			'parent_item' 					=> 'Parent List',
			'parent_item_colon' 			=> __( 'Parent List:' ),
			'search_items' 					=> 'Search Lists',
			'popular_items' 				=> 'Popular Lists',
			'separate_items_with_commas' 	=> 'Separate lists with commas',
			'add_or_remove_items' 			=> 'Add or remove lists',
			'choose_from_most_used' 		=> 'Choose from the most used lists',
			'not_found' 					=> 'No lists found'
		);

		$args = array(
			'labels' 				=> $labels,
			'public' 				=> true,
			'show_ui'				=> true,
			'show_in_menu' 			=> true,
			'show_in_nav_menus' 	=> true,
			'show_tagcloud' 		=> false,
			'show_in_quick_edit' 	=> true,
			'description' 			=> '',
			'hierarchical' 			=> true
		);

		register_taxonomy( 'list', 'ppl-people', $args );

		register_taxonomy_for_object_type( 'list', 'ppl-people' );

	}

}