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
 *  Options Page
 *
 * Add options page for the plugin.
 *
 * @since 1.0
 */
function ssip_options_page() {

	add_options_page(
		__( 'Send SMS', 'send_sms' ),
		__( 'Send SMS', 'send_sms' ),
		'manage_options',
		'send_sms',
		'ssip_options_page_ui'
	);
}
add_action( 'admin_menu', 'ssip_options_page' );
/**
 * Options Page UI
 *
 * The view of the options page.
 *
 * @since 1.0
 */
function ssip_options_page_ui() {
	include 'admin-ui.php';
}

function ssip_update_option_page() {
	$ssip_option = array();
	parse_str( $_POST['data'], $ssip_option );
	$ssip_option_param = array();
	foreach ( $ssip_option as $key => $input ) {
		$ssip_option_param[ $key ] = sanitize_text_field( $input );
	}
	update_option( 'sms_option', $ssip_option_param );
	die();
}

add_action( 'wp_ajax_ssip_update_option_page', 'ssip_update_option_page' );

function ssip_update_account() {
	$ssip_account = array();
	parse_str( $_POST['data'], $ssip_account );
	
    $sms_user_name        = sanitize_text_field( $ssip_account['sms_user_name'] );  
	$sms_pass             = sanitize_text_field( $ssip_account['sms_pass'] );
	$sms_from             = sanitize_text_field( $ssip_account['sms_from'] );

	if(empty($sms_user_name) || empty($sms_pass)){
		echo esc_html("0");
		die();
	}
	
	$ssip_account_param = array(
		'sms_user_id' => $sms_user_name,
		'sms_api'      => $sms_pass,
		'sms_from'      => $sms_from
	);

	update_option( 'sms_account', $ssip_account_param );

	$sms     = new \SendSmsInPakistan\SSIP_gateway();
    $balance =  $sms->get_balance();
    $balance = json_decode($balance , true);
    
    if(isset( $balance['user']))
    	echo esc_html("Hi , ".$balance['user']. " Your account has been connected . Your current balance is ".$balance['balance']);
    else
    	echo esc_html("-1");

	die();
}
add_action( 'wp_ajax_ssip_update_account', 'ssip_update_account' );

 function send_sms_shortcode(){
		$sms_section_from	= 'shortcode';
		include('sms_client_widget.php');	
	}

	 add_shortcode('SEND_SMS',  'send_sms_shortcode');