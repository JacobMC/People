<?php

class People_Dashboard {

	protected $views;

	public function __construct() {
		// set filepath for $views
		$this->views = trailingslashit( PEOPLE_PLUGIN_PATH . 'views' );
	}

	public function run() {

		add_action( 'admin_menu', array( $this, 'add_menu_items' ) );

		$this->create_settings();

	}

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

	public function display_people_options() {
		include_once $this->views . 'display-options.php';
	}

	private function create_settings() {
		
		$display = new People_Display();

		add_action( 'admin_init', array( $display, 'register' ) );

	}

}
