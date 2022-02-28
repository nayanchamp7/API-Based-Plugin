<?php
/**
 * Assets class
 *
 * @package ABP\Assets
 * @version 1.0.0
 */

namespace ABP\Library;

/**
 * ABP Assets Class.
 */
class Assets {

    /**
     * Hook in tabs.
     */
    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'abp_scripts' ), 9999 );
        add_action( 'admin_enqueue_scripts', array( $this, 'abp_scripts' ),9999  );
    }

    /**
     * Enqueue styles.
     */
    public function abp_scripts($needle) {

        // Register admin styles.
        wp_register_style( 'abp_styles', ABP_PLUGIN_URL . '/assets/css/abp.min.css', array(), ABP_VERSION );

        // enqueue CSS.
        if( "toplevel_page_api-based-plugin" === $needle || ! is_admin() ) {
            wp_enqueue_style( 'abp_styles' );
        }

        // Register scripts.
        wp_register_script( 'abp_admin_js', ABP_PLUGIN_URL . '/assets/js/abp.min.js', array( 'jquery' ), ABP_VERSION, true );
        wp_localize_script( 'abp_admin_js', 'abp_js_data', [
            'ajaxurl'  => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce( 'abp_admin' ),
        ] );

        //Enqueue scripts
        if( "toplevel_page_api-based-plugin" === $needle || ! is_admin() ) {
            wp_enqueue_script( 'abp_admin_js' );
        }
    }

}

