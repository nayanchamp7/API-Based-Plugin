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
    }

    /**
     * Initialize Main class
     */
    public function init() {
        $admin = new Admin();
        $assets = new Assets();

    }
}