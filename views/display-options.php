<?php 

?>

<div class="wrap">

	<h2>People Settings</h2>

	<?php settings_errors(); ?>

	<form method="post" action="options.php">

		<?php

			settings_fields( 'people_group' );
			do_settings_section( 'people' );
			submit_button();

		?>

	</form>

</div> <!-- /.wrap -->