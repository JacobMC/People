<?php 

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