<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class People_Meta_Boxes
 *
 * Class for managing meta boxes associated with the people post type
 *
 * @since      1.0.0
 *
 * @subpackage People/admin
 * @package    People
 */

class People_Meta_Boxes {

    /**
     * The single plugin instance
     *
     * @var People_Meta_Boxes
     */
    protected static $_instance = null;

    /**
     * Hooks into WordPress
     */
    public function init() {
        add_action( 'add_meta_boxes', [ $this, 'add_meta_boxes' ] );
        add_action( 'save_post', [ $this, 'save_meta_boxes' ] );
    }

    /**
     * Adds meta boxes to people post type
     */
    public function add_meta_boxes() {
        add_meta_box(
            'people_contact_information',
            'Contact Information',
            [ $this, 'render_contact_meta_box' ],
            people_post_type()->slug,
            'normal',
            'high'
        );

        add_meta_box(
            'people_social_accounts',
            'Social Accounts',
            [ $this, 'render_social_meta_box' ],
            people_post_type()->slug,
            'normal',
            'high'
        );

        add_meta_box(
            'people_user_settings',
            'User Settings',
            [ $this, 'render_user_meta_box' ],
            people_post_type()->slug,
            'normal',
            'high'
        );
    }

    /**
     * Renders the contact information meta box
     */
    public function render_contact_meta_box() {
        ?>
        <p class="form-field">
            <label for="phone_number">Phone:</label>
            <input type="tel" name="phone_number" />
        </p>

        <p class="form-field">
            <label for="email_address">Email:</label>
            <input type="email" name="email_address" />
        </p>

        <p class="form-field">
            <label for="street_address">Street Address:</label>
            <textarea name="street_address"></textarea>
        </p>
        <?php
    }

    /**
     * Renders the social accounts meta box
     */
    public function render_social_meta_box() {

        $social_accounts = apply_filters( 'people_social_accounts', [
            'Twitter',
            'Facebook',
            'LinkedIn',
            'Instagram',
            'YouTube',
            'Pinterest',
            'Github',
            'Reddit'
        ] );

        foreach( $social_accounts as $social_account ) : ?>
            <p class="form-field">
                <label for="<?php echo strtolower( $social_account ); ?>"><?php echo $social_account; ?>:</label>
                <input type="text" name="<?php echo strtolower( $social_account ); ?>" />
            </p>
        <?php endforeach;
    }

    /**
     * Renders the user settings meta box
     */
    public function render_user_meta_box() {
        echo 'here';
        ?>
        <p class="form-field">
            <label for="">Label</label>
            <input type="text" name="" value="" />
        </p>
        <?php
    }

    /**
     * Saves meta box data
     */
    public function save_meta_boxes() {}

    /**
     * Main Plugin Instance.
     *
     * Ensures only one instance of plugin is loaded or can be loaded.
     *
     * @static
     * @see   people_meta_boxes()
     * @return People_Meta_Boxes - Main instance.
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
 * @return People_Meta_Boxes
 */
function people_meta_boxes() {
    return People_Meta_Boxes::instance();
}

people_meta_boxes()->init();