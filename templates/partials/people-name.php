<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Represents the partial view for users to select whether or not to display a person's name.
 * 
 * Called by display_name() in class-people-display.php
 *
 * @since  1.0.0
 *
 * @subpackage  People/views/partials
 * @package     People
 * 
 */

$people_options = get_option( 'people_display' );
?>

<input type="checkbox" id="people-name" name="people_display[name]" value="1" <?php echo checked( 1, $people_options['name'], false ); ?> />