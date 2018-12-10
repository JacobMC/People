<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Interface for use with WordPress Settings API
 *
 *@since      1.0.0
 *
 *@subpackage People/interfaces
 *@package    People
 */

interface People_Setting {

	public function register();
	public function display();
	public function sanitize( $input );
	
}