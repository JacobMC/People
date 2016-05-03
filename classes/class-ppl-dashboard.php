<?php

class People_Dashboard {

	protected $views

	public function __construct() {
		$this->views = trailingslashit( PPL_PLUGIN_PATH . 'views' );
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
			'ppl_options_page', 
			false, 
			26 
		);

	}

	public function display_ppl_options() {
		// include display file
	}

	private function create_settings() {
		// add settings to create
	}

}