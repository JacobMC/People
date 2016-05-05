<?php 

/**
 * Displays Settings for People plugin
 * 
 * Called by display_people_options() in class-people-dashboard.php
 * 
 * @since      1.0.0
 * 
 * @subpackage People/views
 * @package    People
 */

?>

<div class="wrap">

	<h2>People</h2>

	<?php settings_errors(); ?>

	<form method="post" action="options.php">

		<?php

			settings_fields( 'people_display_options' );
			do_settings_sections( 'people' );
			submit_button();

		?>

	</form>

</div> <!-- /.wrap -->