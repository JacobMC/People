<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class People_Display_Settings
 *
 * Class for creating settings to determine what properties are
 * displayed with each person on the front-end
 *
 * @since      1.0.0
 *
 * @subpackage People/classes/settings
 * @package    People
 */

class People_Display_Settings implements People_Setting {

    /**
     * The single plugin instance
     *
     * @var People_Display_Settings
     */
    protected static $_instance = null;

    public function init() {
        add_action( 'admin_init', [ $this, 'register' ] );
        register_activation_hook( '/people/people.php', [ $this, 'add_defaults' ] );
    }

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
		people()->get_template( 'partials/people-profile-image' );
	}

	/**
	 * Creates checkbox for displaying person's name
	 */
	public function display_name() {
		people()->get_template( 'partials/people-name' );
	}

	/**
	 * Creates checkbox for displaying person's bio
	 */
	public function display_bio() {
		people()->get_template( 'partials/people-bio' );
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

    /**
     * Main Plugin Instance.
     *
     * Ensures only one instance of plugin is loaded or can be loaded.
     *
     * @static
     * @see   people_display_settings()
     * @return People_Display_Settings - Main instance.
     */
    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

}

/**
 * Global function call for the plugin
 * @return People_Display_Settings
 */
function people_display_settings() {
    return People_Display_Settings::instance();
}

people_display_settings()->init();
