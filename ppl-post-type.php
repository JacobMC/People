<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Register People custom post type
function people_post_type() {

	$labels = array(
				'name' => 'People',
				'singular_name' => 'People',
				'add_new' => 'Add People',
				'all_items' => 'All People',
				'add_new_item' => 'Add People',
				'edit_item' => 'Edit People',
				'new_item' => 'New People',
				'view_item' => 'View People',
				'search_items' => 'Search People',
				'not_found' => 'No People Found',
				'not_found_in_trash' => 'No People were hiding in the trash'
				);

	$supports = array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' );

	$args = array(
			'labels' => $labels,
			'public' => true,
			'rewrite' => array( 'slug' => 'people' ),
			'menu_icon' => 'dashicons-id-alt',
			'supports' => $supports
			);

	register_post_type( 'ppl_people', $args );
}

add_action( 'init', 'people_post_type' );
