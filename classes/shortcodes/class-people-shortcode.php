<?php

/**
 * Class People_Shortcode
 * 
 * Class for creating shortcode to display People
 * 
 * @since      1.0.0
 * 
 * @subpackage People/classes/shortcodes
 * @package    People
 */

class People_Shortcode {

	/**
	 * Constructor
	 * 
	 * Hooks add_people_shortcode() into add_shortcode()
	 */
	public function __construct() {
		add_shortcode( 'people', array( $this, 'add_people_shortcode') );
	}

	/**
	 * Creates shortcode output from custom WP_Query of People 
	 * post-type by searching by post name
	 *
	 * @param      array  $atts   Set by user when shortcode is called.
	 */
	public function add_people_shortcode( $atts ) {

		/**
		 * Sets valid attributes
		 */
		$attributes = shortcode_atts( array(
			'name' => ''
		), $atts );

		/**
		 * Converts $attributes[ 'name' ] to all lowercase and replaces
		 * whitespace with '-' to be compared to post name in query
		 */
		$attributes[ 'name' ] = strtolower( $attributes[ 'name' ] );
		$attributes[ 'name' ] = preg_replace( '/[\s_]/', '-', $attributes[ 'name' ] );

		/**
		 * Defines arguments for custom WP_Query
		 */
		$people_query_args = array(
			'post_type' => 'ppl-people',
			'name' => $attributes[ 'name' ]
		);

		/**
		 * Instanstiates new WP_query and passes $people_query_args
		 * to define arguments
		 */
		$people_query = new WP_Query( $people_query_args );

		ob_start();

		/**
		 * Start WordPress Loop
		 */
		if( $people_query->have_posts() ) {

			echo '<div class="person">';

			while( $people_query->have_posts() ) {

				$people_query->the_post();

				/**
				 * Grab data for plugin settings
				 */
				$people_options = get_option( 'people_display' );

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

			}

			echo '</div>';

		} else {

			 echo '<p>' . _e( 'Sorry, no people by that name were found' ) . '</p>';

		}

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

		/**
		 * Restore original post data
		 */
		wp_reset_postdata();

	}

}