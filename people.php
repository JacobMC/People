<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Plugin Name: People
 * Description: Simple directory management
 * Plugin URI: https://jacobmckinney.com/people
 * Author: Jacob McKinney
 * Version: 0.0.1
 * Author URI: https://jacobmckinney.com/
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: people
 *
 */
class People {

    /**
     * The single plugin instance
     *
     * @var People
     */
    protected static $_instance = null;

    /**
     * People constructor
     */
    public function __construct() {
        $this->define_constants();
        $this->includes();
    }

    /**
     * Defines plugin constants
     */
    private function define_constants() {
        define( 'PEOPLE_DIR', plugin_dir_path( __FILE__ ) );
        define( 'PEOPLE_URL', plugin_dir_url( __FILE__ ) );
    }

    /**
     * Includes necessary plugin files
     */
    private function includes() {
        include_once( 'includes/class-people-post-type.php' );
        include_once( 'admin/class-people-dashboard.php' );
        include_once( 'admin/class-people-meta-boxes.php' );
    }

    public function get_template( $template ) {
        include_once PEOPLE_DIR . 'templates/' . $template . '.php';
    }

    /**
     * Main Plugin Instance.
     *
     * Ensures only one instance of plugin is loaded or can be loaded.
     *
     * @static
     * @see   people()
     * @return People - Main instance.
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
 * @return People
 */
function people() {
    return People::instance();
}

people();