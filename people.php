<?php

/**
 * @link       http://jacobmckinney.com/people/
 * @since      1.0.0
 * @package    People
 * 
 * Plugin Name: People
 * Plugin URI: http://jacobmckinney.com/people/
 * Description: Create elegant member directories.
 * Author: Jacob McKinney
 * Author URI: http://jacobmckinney.com/
 * Version: 1.0.0
 * License: GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * 
 * Copyright 2016 Jacob McKinney
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Define constant for plugin file path
define( 'PEOPLE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );


/**
 * Begins execution of plugin dashboard
 *
 * Initializes settings pages and settings if user is logged in 
 * and accessing the admin area of the site.
 *
 * @since  1.0.0
 * 
 */
if ( is_admin() ) {

	require_once( PEOPLE_PLUGIN_PATH . 'classes/class-people-dashboard.php' );
	require_once( PEOPLE_PLUGIN_PATH . 'interfaces/interface-people-setting.php' );
	require_once( PEOPLE_PLUGIN_PATH . 'classes/settings/class-people-display.php' );

	function run_people_dashboard() {
		$plugin = new People_Dashboard();
		$plugin->run();
	}

	run_people_dashboard();

}

/**
 * Instantiates the People post-type
 *
 * @since  1.0.0
 * 
 */
require_once( PEOPLE_PLUGIN_PATH . 'classes/class-people-post-type.php' );
$post_type = new People_Post_Type();
