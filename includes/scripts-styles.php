<?php
/**
 * Security check
 *
 * Prevent direct access to the file.
 *
 * @since 1.2
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/**
 * Plugin Styles
 *
 * Register and Enqueues plugin styles
 *
 * @since 1.2
 */
function ssip_styles() {

	// Register Styles
	wp_register_style( 'ssip_sms_style', plugins_url( '../css/textme.css', __FILE__ ) );

	// Enqueue Styles
	wp_enqueue_style( 'ssip_sms_style' );

}
add_action( 'admin_enqueue_scripts', 'ssip_styles' );



/**
 * Plugin Scripts
 *
 * Register and Enqueues plugin scripts
 *
 * @since 1.2
 */
function ssip_scripts() {

	// Register Scripts
	wp_register_script( 'jquery_text_complete', plugins_url( '../js/jquery.textcomplete.min.js', __FILE__ ), array( 'jquery' ), true );
	wp_register_script( 'ssip_sms_sctipt', plugins_url( '../js/textme.js', __FILE__ ), array( 'jquery' ), true );

	// Enqueue Scripts
	wp_enqueue_script( 'jquery_text_complete' );
	wp_enqueue_script( 'ssip_sms_sctipt' );

}
add_action( 'admin_enqueue_scripts', 'ssip_scripts' );
