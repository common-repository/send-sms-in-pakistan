<?php
/*
Plugin Name: Send SMS in Pakistan
Plugin URI:  https://hatinco.com/
Description: Send custom SMS messages from your WordPress site to your customers.
Version:     3.0.4
Author:      HAT INC
Author URI:  https://www.hatinco.com
Text Domain: send_sms
*/

/**
 * Security check
 *
 * Prevent direct access to the file.
 *
 * @since 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include plugin files
 */
include_once ( plugin_dir_path( __FILE__ ) . 'includes/i18n.php' );
include_once ( plugin_dir_path( __FILE__ ) . 'includes/scripts-styles.php' );
include_once ( plugin_dir_path( __FILE__ ) . 'includes/admin.php' );

/**
 * Include external addons and extensions
 */
include_once ( plugin_dir_path( __FILE__ ) . 'functions/sms-geteway.php' );
include_once ( plugin_dir_path( __FILE__ ) . 'functions/events.php' );
