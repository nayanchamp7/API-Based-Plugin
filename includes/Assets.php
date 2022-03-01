<?php
/**
 * Assets class
 *
 * @package AMU\Assets
 * @version 1.0.0
 */

namespace AMU\Library;

/**
 * AMU Assets Class.
 */
class Assets {

    /**
     * Hook in tabs.
     */
    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'amu_scripts' ), 9999 );
        add_action( 'admin_enqueue_scripts', array( $this, 'amu_scripts' ),9999  );
    }

    /**
     * Enqueue styles.
     */
    public function amu_scripts($needle) {

        // Register admin styles.
        wp_register_style( 'amu_styles', AMU_PLUGIN_URL . '/assets/css/amu.min.css', array(), AMU_VERSION );

        // enqueue CSS.
        if( "toplevel_page_awesome-users" === $needle || ! is_admin() ) {
            wp_enqueue_style( 'amu_styles' );
        }

        // Register scripts.
        wp_register_script( 'amu_admin_js', AMU_PLUGIN_URL . '/assets/js/amu.min.js', array( 'jquery' ), AMU_VERSION, true );
        wp_localize_script( 'amu_admin_js', 'amu_js_data', [
            'ajaxurl'  => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce( 'amu_admin' ),
        ] );

        //Enqueue scripts
        if( "toplevel_page_awesome-users" === $needle || ! is_admin() ) {
            wp_enqueue_script( 'amu_admin_js' );
        }
    }

}

