<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Register People custom post type
function people_post_type() {
	register_post_type( 
		'ppl_people',
		array(
			'labels' => array(
				'name' => __( 'People' ),
				'singular_name' => __( 'Person' )
				),
			'public' => true,
			'rewrite' => array( 'slug' => 'people' ),
			'menu_icon' => 'dashicons-id-alt',
			'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' )
			) 
		);
}

add_action( 'init', 'people_post_type' );
