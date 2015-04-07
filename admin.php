<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

//Add menu to dashboard
function ppl_add_menu() {
	add_menu_page( 'People', 'People', 'manage_options', 'people', 'ppl_options_page', false, 26 );
}

add_action( 'admin_menu', 'ppl_add_menu' );
?>

<?php 
//Render admin page
function ppl_options_page() {
?>

<div class="wrap">
	<h2>People User Settings</h2>
	<p>Options related to the people plugin.</p>
</div>


<?php } ?>
