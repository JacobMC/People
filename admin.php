<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

//Render admin page
function ppl_render_admin() {
	echo 'Sample admin area';
}

//Add menu to dashboard
function ppl_add_menu() {
	add_menu_page( 'People', 'PPL', '', 'ppl', 'ppl_render_admin', false, 26 );
}

add_action( 'admin_menu', 'ppl_add_menu' );
