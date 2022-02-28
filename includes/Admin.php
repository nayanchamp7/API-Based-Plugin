<?php
/**
 * ABP Admin
 *
 * @class    Admin
 * @version  1.0.0
 */

namespace ABP\Library;

/**
 * ABP Admin class.
 */
class Admin {
    /**
     * Constructor.
     */
    public function __construct() {
        //add_action( 'admin_init', array( $this, 'admin_init' ) );
        $menus = new Menus();
    }

    /**
     * Initialize admin classes
     */
    public function admin_init() {
        $menus = new Menus();
    }
}