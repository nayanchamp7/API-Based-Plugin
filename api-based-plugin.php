<?php
/**
 * Plugin Name: Awesome Users
 * Plugin URI: https://affiliatewp.com/
 * Description: A simple plugin to get users list.
 * Version: 1.0.0
 * Author: Affiliate WP
 * Author URI: https://affiliatewp.com/
 * Text Domain: awesome-users
 * Domain Path: languages/
 *
 * WP Requirement & Test
 * Requires at least: 4.4
 * Tested up to: 5.8
 * Requires PHP: 5.6
 *
 * @package AMU
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'AMU_VERSION' ) ) {
    /**
     * Plugin Version
     * @var string
     * @since 1.0.0
     */
    define( 'AMU_VERSION', '1.0.0' );
}

if ( ! defined( 'AMU_FILE' ) ) {
    define( 'AMU_FILE', __FILE__ );
}

if ( ! defined( 'AMU_BASENAME' ) ) {
    define( 'AMU_BASENAME', plugin_basename(__FILE__) );
}

if ( ! defined( 'AMU_FILE_DIR' ) ) {
    define( 'AMU_FILE_DIR', dirname( __FILE__ ) );
}

if ( ! defined( 'AMU_PLUGIN_URL' ) ) {
    define( 'AMU_PLUGIN_URL', plugins_url( '', AMU_FILE ) );
}

require 'vendor/autoload.php';

//calling main class
new AMU\Library\AMU();