<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class People_Dashboard
 *
 * Class for creating admin settings and pages related
 * to the People plugin
 *
 * @since      1.0.0
 *
 * @subpackage People/includes
 * @package    People
 */

class People_Dashboard {

    /**
     * The single plugin instance
     *
     * @var People_Dashboard
     */
    protected static $_instance = null;

    public function __construct() {
        include_once PEOPLE_DIR . 'admin/settings/interface-people-setting.php';
        include_once PEOPLE_DIR . 'admin/settings/class-people-display.php';
    }

    /**
     * Hooks into WordPress
     */
    public function init() {
        add_action( 'admin_menu', array( $this, 'add_menu_items' ) );
    }

    /**
     * Function for adding menu pages
     */
    public function add_menu_items() {

        add_submenu_page(
            'edit.php?post_type=people',
            'People Settings',
            'People Settings',
            'manage_options',
            'people_settings',
            [ $this, 'display_people_options' ]
        );

    }

    /**
     * Function to display output of menu page.
     */
    public function display_people_options() {
        people()->get_template( 'display-options' );
    }

    /**
     * Main Plugin Instance.
     *
     * Ensures only one instance of plugin is loaded or can be loaded.
     *
     * @static
     * @see   people_dashboard()
     * @return People_Dashboard - Main instance.
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
 * @return People_Dashboard
 */
function people_dashboard() {
    return People_Dashboard::instance();
}

people_dashboard()->init();