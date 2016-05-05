<?php

/**
 * Class People_Dashboard
 * 
 * Class for creating admin settings and pages related
 * to the People plugin
 * 
 * @since      1.0.0
 * 
 * @subpackage People/classes
 * @package    People
 */

class People_Dashboard {

	protected $views;

	public function __construct() {
		// set filepath for $views
		$this->views = trailingslashit( PEOPLE_PLUGIN_PATH . 'views' );
	}

	/**
	 * Create Admin Menu pages and settings
	 */
	public function run() {

		add_action( 'admin_menu', array( $this, 'add_menu_items' ) );

		$this->create_settings();

	}

	/**
	 * Function for adding menu pages
	 */
	public function add_menu_items() {
		
		add_menu_page( 
			'People', 
			'People', 
			'manage_options', 
			'people', 
			array( $this, 'display_people_options' ), 
			false, 
			26 
		);

	}

	/**
	 * Function to display output of menu page.
	 */
	public function display_people_options() {
		include_once $this->views . 'display-options.php';
	}

	/**
	 * Function to instantiate new Settings Classes, call class function 
	 * to register new settings, and register settings defaults upon
	 * plugin activation.
	 */
	private function create_settings() {
		
		$display = new People_Display();

		add_action( 'admin_init', array( $display, 'register' ) );
		register_activation_hook( '/people/people.php', $display->add_defaults() );

	}

}
