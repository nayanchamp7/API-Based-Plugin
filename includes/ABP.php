<?php
/**
 * ABP Main
 *
 * @class    ABP
 * @version  1.0.0
 */

namespace ABP\Library;

/**
 * ABP class.
 */
class ABP {
    /**
     * Constructor.
     */
    public function __construct() {
        add_action( 'init', array( $this, 'init' ) );
        add_shortcode( 'am_users', array( $this, 'show_users_front' ) );
    }

    /**
     * Initialize Main class
     */
    public function init() {
        $admin = new Admin();
        $assets = new Assets();

    }

    /**
     * Shortcode to show users in front
     */
    public function show_users_front() {
        ob_start();

        include  ABP_FILE_DIR . '/templates/admin/abp-lists.php';

        return ob_get_clean();
    }
}