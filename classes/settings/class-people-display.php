<?php

/**
 * Class People_Display
 * 
 * Class for creating settings to determine what properties are 
 * displayed with each person on the front-end
 * 
 * @since      1.0.0
 * 
 * @subpackage People/classes/settings
 * @package    People
 */

class People_Display extends People_Dashboard implements People_Setting {

	/**
	 * Register Setting, Section, and Fields
	 */
	public function register() {

		register_setting(
			'people_display_options',
			'people_display'
		);

		add_settings_section(
			'people-display',
			'People Display Settings',
			array( $this, 'display' ),
			'people'
		);

		add_settings_field(
			'people-profile-image',
			'Avatar',
			array( $this, 'display_profile_image' ),
			'people',
			'people-display'
		);

		add_settings_field(
			'people-name',
			'Name',
			array( $this, 'display_name' ),
			'people',
			'people-display'
		);

		add_settings_field(
			'people-bio',
			'Bio',
			array( $this, 'display_bio' ),
			'people',
			'people-display'
		);

	}

	/**
	 * Display description text for Section
	 */
	public function display() {

		echo '<p>Select which properties will be displayed for each person.</p>';

	}

	/**
	 * Create defaults to be loaded when plugin is activated.
	 * 
	 * Called by register_activation_hook within 
	 * create_setting() in class-people-dashboard.php
	 */
	public function add_defaults() {

		$defaults = array(
			'profile_image' => 1,
			'name' => 1,
			'bio' => 1
		);

		add_option( 'people_display', $defaults );

	}

	/**
	 * Creates checkbox for displaying person's avatar
	 */
	public function display_profile_image() {

		$people_options = get_option( 'people_display' );

		include_once $this->views . 'partials/profile-image.php';

	}

	/**
	 * Creates checkbox for displaying person's name
	 */
	public function display_name() {

		$people_options = get_option( 'people_display' );

		include_once $this->views . 'partials/name.php';

	}

	/**
	 * Creates checkbox for displaying person's bio
	 */
	public function display_bio() {

		$people_options = get_option( 'people_display' );

		include_once $this->views . 'partials/bio.php';

	}

	/**
	 * Function to sanitize input
	 * 
	 * Empty due to use of checkboxes 
	 * Required by interface-people.php
	 */
	public function sanitize( $input ) {
		// nothing to sanitize...yet
	}

}
