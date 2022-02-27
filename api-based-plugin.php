<?php
/**
 * Plugin Name: API Based Plugin
 * Plugin URI: https://affiliatewp.com/
 * Description: A simple plugin to get users list.
 * Version: 1.0.0
 * Author: Affiliate WP
 * Author URI: https://affiliatewp.com/
 * Text Domain: api-based-plugin
 * Domain Path: languages/
 *
 * WP Requirement & Test
 * Requires at least: 4.4
 * Tested up to: 5.8
 * Requires PHP: 5.6
 *
 * @package API_BP
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'ABP_VERSION' ) ) {
    /**
     * Plugin Version
     * @var string
     * @since 1.0.0
     */
    define( 'ABP_VERSION', '1.0.0' );
}

if ( ! defined( 'ABP_FILE' ) ) {
    define( 'ABP_FILE', __FILE__ );
}

if ( ! defined( 'ABP_BASENAME' ) ) {
    define( 'ABP_BASENAME', plugin_basename(__FILE__) );
}

if ( ! defined( 'ABP_FILE_DIR' ) ) {
    define( 'ABP_FILE_DIR', dirname( __FILE__ ) );
}

if ( ! defined( 'ABP_PLUGIN_URL' ) ) {
    define( 'ABP_PLUGIN_URL', plugins_url( '', ABP_FILE ) );
}

require 'vendor/autoload.php';

$ABP = new ABP\Library\ABP();