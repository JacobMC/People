<?php
/**
 * Represents the partial view for users to select whether or not to display a person's name.
 *
 * @since  1.0.0
 *
 * @subpackage  People/views/partials
 * @package     People
 * 
 */
?>

<input type="checkbox" id="people-name" name="people_display[name]" value="1" <?php checked( 1, $people_options['name'], false ); ?> />