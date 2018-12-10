<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class People_Post_Type
 *
 * Class for creating People custom post type
 *
 * @since      1.0.0
 *
 * @subpackage People/includes
 * @package    People
 */

class People_Post_Type {

    /**
     * The single plugin instance
     *
     * @var People_Post_Type
     */
    protected static $_instance = null;

    /**
     * Sets POST_TYPE constant
     * Used by register_post_type() in custom_post_type()
     *
     * @var        string
     */
    const POST_TYPE = 'people';

    /**
     * Hooks into WordPress
     */
    public function init() {
        add_action( 'init', array( $this, 'custom_post_type' ) );
    }

    /**
     * Creates and registers People custom post-type
     */
    public function custom_post_type() {

        $labels = array(
            'name' => 'People',
            'singular_name' => 'Person',
            'add_new' => 'Add New',
            'all_items' => 'All People',
            'add_new_item' => 'Add New Person',
            'edit_item' => 'Edit Person',
            'new_item' => 'New Person',
            'view_item' => 'View Person',
            'search_items' => 'Search People',
            'not_found' => 'No People Found',
            'not_found_in_trash' => 'No People were hiding in the trash',
            'archives' => 'People Archives',
            'insert_into_item' => 'Add to person',
            'uploaded_to_this_item' => 'Uploaded to this person',
            'featured_image' => 'Profile Image',
            'set_featured_image' => 'Set profile image',
            'remove_featured_image' => 'Remove profile image',
            'use_featured_image' => 'Use as profile image',
        );

        $supports = array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'custom-fields'
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'rewrite' => array( 'slug' => 'people' ),
            'menu_icon' => 'dashicons-groups',
            'supports' => $supports
        );

        register_post_type( $this::POST_TYPE, $args );
    }

    /**
     * Main Plugin Instance.
     *
     * Ensures only one instance of plugin is loaded or can be loaded.
     *
     * @static
     * @see   people_post_type()
     * @return People_Post_Type - Main instance.
     */
    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

}

/**
 * Global function call for the plugin
 * @return People_Post_Type
 */
function people_post_type() {
    return People_Post_Type::instance();
}

people_post_type()->init();