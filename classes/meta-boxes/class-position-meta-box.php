<?php

/**
 * Class Position Meta Box
 * 
 * Class for creating position meta box for displaying
 * a person's position in the organization
 * 
 * @since      1.0.0
 * 
 * @subpackage People/classes/metaboxes
 * @package    People
 */

class Position_Meta_Box {

	public function __construct() {
		add_action( 'add_meta_boxes', 'position_meta_box' );
	}

	public function position_meta_box() {

		add_meta_box(
			'people-position',
			'Position',
			'position_meta_box_content',
			'ppl-people',
			'advanced',
			'high'
		);

	}

	public function position_meta_box_content() {
		echo "hey there";
	}

	public function position_field_data() {}

}