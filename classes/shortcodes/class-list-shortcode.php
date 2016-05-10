<?php

/**
 * Class List Shortcode
 * 
 * Class for creating shortcode to display lists
 * 
 * @since      1.0.0
 * 
 * @subpackage People/classes/shortcodes
 * @package    People
 */

class List_Shortcode {

	/**
	 * Constructor
	 * 
	 * Hooks add_list_shortcode into add_shortcode()
	 */
	public function __construct() {
		add_shortcode( 'list', array( $this, 'add_list_shortcode' ) );
	}

	public function add_list_shortcode( $atts ) {

		$attributes = shortcode_atts( array(
			'name' => ''
		), $atts );

		$list_query_args = array(
			'post_type'	=> 'ppl-people',
			'tax_query'	=> array(
				array(
					'taxonomy'	=>	'list',
					'field'		=>	'slug',
					'terms'		=>	$attributes[ 'name' ]
				),
			),
		);

		echo $attributes[ 'name' ] . '?<br /><br />';

		$list_query = new WP_Query( $list_query_args );

		ob_start();

		if( $list_query->have_posts() ) {

			echo '<div class="people-list">';

			while( $list_query->have_posts() ) {

				$list_query->the_post();

				/**
				 * Grab data for plugin settings
				 */
				$people_options = get_option( 'people_display' );

				echo '<div class="person">';

				/**
				 * Check if profile image is set to display, display if true
				 */
				if( $people_options[ 'profile_image' ] == true ) {
					echo '<div class="people-profile-image">' . get_the_post_thumbnail() . '</div>';
				}

				/**
				 * Check if name is set to display, display if true
				 */
				if( $people_options[ 'name' ] == true ) {
					echo '<div class="people-name">' . get_the_title() . '</div>';
				}

				/**
				 * Check if bio is set to display, display if true
				 */
				if( $people_options[ 'bio' ] == true ) {
					echo '<div class="people-bio">' . get_the_content() . '</div>';
				}

				echo '</div>';

			}

			echo '</div>';

		} else {

			echo '<p>' . _e( 'Sorry, no lists by that name were found.' ) . '</p>';

		}

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

		wp_reset_postdata();

	}
}