<?php
/**
 * AMU Menus
 *
 * @class    Menus
 * @since   1.0.0
 */

namespace AMU\Library;

/**
 * Menus class.
 */
class Menus {

    /**
     * Constructor.
     */
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    /**
     * Menu Page.
     */
    public function admin_menu() {
        add_menu_page(__('Awesome Users', 'awesome-users'), __('Awesome Users', 'awesome-users'), 'manage_options', 'awesome-users', array( $this, 'amu_pages' ), 'dashicons-admin-users' );
    }

    /**
     * AMU Pages
     */
    public function amu_pages() {
        include AMU_FILE_DIR . '/templates/amu-lists.php';
    }
}