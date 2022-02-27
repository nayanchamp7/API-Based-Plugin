<?php
/**
 * ABP Menus
 *
 * @class    Menus
 * @since   1.0.0
 */

namespace ABP\Library;

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
        add_menu_page(__('API Based Plugin', 'api-based-plugin'), __('API Based Plugin', 'api-based-plugin'), 'manage_options', 'api-based-plugin', array( $this, 'abp_pages' ), 'dashicons-admin-users' );
    }

    /**
     * ABP Pages
     */
    public function abp_pages() {
        include ABP_FILE_DIR . '/templates/admin/abp-lists.php';
    }
}