<?php

class People_Display extends People_Dashboard implements People_Setting {

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
			'people-avatar',
			'Avatar',
			array( $this, 'display_avatar' ),
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

	public function display() {

		echo '<p>Select which properties will be displayed for each person.</p>';

	}

	public function display_avatar() {

		$people_options = get_option( 'people_display' );
		$avatar = isset( $people_options[ 'avatar' ] ) ? $people_options[ 'avatar' ] : '';

		include_once $this->views . 'partials/people-avatar.php';

	}

	public function display_name() {

		$people_options = get_option( 'people_display' );
		$name = isset( $people_options[ 'name' ] ) ? $people_options[ 'name' ] : '';

		include_once $this->views . 'partials/people-name.php';

	}

	public function display_bio() {

		$people_options = get_option( 'people_display' );
		$bio = isset( $people_options[ 'bio' ] ) ? $people_options[ 'bio' ] : '';

		include_once $this->views . 'partials/people-bio.php';

	}

	public function sanitize( $input ) {

	}

}
