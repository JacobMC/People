<?php
/**
 * Represents the partial view for users to select whether or not to display a person's profile image.
 * 
 * Called by display_profile_image() in class-people-display.php
 *
 * @since  1.0.0
 *
 * @subpackage  People/views/partials
 * @package     People
 * 
 */

$html = '<input type="checkbox" id="people-profile-image" name="people_display[profile_image]" value="1"' . checked( 1, $people_options['profile_image'], false ) . '/>';

echo $html;