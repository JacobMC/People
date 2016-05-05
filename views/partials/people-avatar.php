<?php
/**
 * Represents the partial view for users to select whether or not to display a person's avatar.
 *
 * @since  1.0.0
 *
 * @subpackage  People/views/partials
 * @package     People
 * 
 */

$html = '<input type="checkbox" id="people-avatar" name="people_display[avatar]" value="1"' . checked( 1, $people_options['avatar'], false ) . '/>';

echo $html;