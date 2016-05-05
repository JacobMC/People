<?php
/**
 * Represents the partial view for users to select whether or not to display a person's bio.
 *
 * @since  1.0.0
 *
 * @subpackage  People/views/partials
 * @package     People
 * 
 */

$html = '<input type="checkbox" id="people-bio" name="people_display[bio]" value="1"' . checked( 1, $people_options['bio'], false ) . '/>';

echo $html;