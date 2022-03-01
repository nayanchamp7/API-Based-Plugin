<?php
/**
 * AMU Main
 *
 * @class    AMU
 * @version  1.0.0
 */

namespace AMU\Library;

/**
 * AMU class.
 */
class AMU {
    private CLI $cli_object;
    /**
     * Constructor.
     */
    public function __construct() {
        add_action( 'init', array( $this, 'init' ) );
        add_shortcode( 'am_users', array( $this, 'show_users_front' ) );
        add_action( 'cli_init', array($this, 'amu_register_commands') );
    }

    /**
     * Initialize Main class
     */
    public function init() {
        if( is_admin() ) {
            new Menus();
        }
        new Assets();
        $this->cli_object = new CLI();
    }

    /**
     * Shortcode to show users in front
     *
     * @since  1.0.0
     */
    public function show_users_front() {
        ob_start();

        include  AMU_FILE_DIR . '/templates/amu-lists.php';

        return ob_get_clean();
    }

    /**
     * Registers cli custom command.
     *
     * @since  1.0.0
     */
    function amu_register_commands() {
        if( defined( 'WP_CLI' ) && class_exists('WP_CLI') ) {
            WP_CLI::add_command( 'amu_list', $this->cli_object );
        }
    }
}