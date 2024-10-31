<?php
namespace SendSmsInPakistan;
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
 * SMS Gateway
 *
 * ...
 *
 * @since 1.0
 */
    class SSIP_gateway {

    private function user_access() {
        $account = get_option('sms_account');
        return $xml = '<user>
        <user_id>' . $account['sms_user_id'] . '</user_id>
        <api>' . $account['sms_api'] . '</api>
        <from>' . $account['sms_from'] . '</from>
        </user>';
    } 
    private function sms_content( $content, $phone_num ) {
        return $xml = '<destinations>
        <phone id="TextMe">' . $phone_num . '</phone>
        </destinations>
        <message>' . $content . '</message>';
    }
    public function send_sms($billing_phone,$sms_content ) {
        
    $account = get_option('sms_account');
         $user_id = $account['sms_user_id'];
         $api = $account['sms_api'];
        $from = $account['sms_from'];
       $url = "https://api.hatinco.com/sms/pro_sms.php?user_id=".$user_id."&api=" .$api.
       "&to=" .$billing_phone. "&from=" .urlencode($from)."&message=" .urlencode($sms_content)."";
        $response = wp_remote_get( $url );
        $body     = wp_remote_retrieve_body( $response );
       return $body;
      // die();
    }
    public function get_balance() {
        $account = get_option('sms_account');
        $user_id  = $account['sms_user_id'];
        $api = $account['sms_api'];     
        $url = "https://sms.hatinco.com/sms/api?action=check-balance&api_key=" .$api."&response=json";
        $response = wp_remote_get( $url );
        $body     = wp_remote_retrieve_body( $response );
        return $body;
    }
    
    public function create_sms_content( $order_id, $sms_customer ) {
       $order = new \WC_Order( $order_id );
       $billing_first_name = get_post_meta( $order_id, '_billing_first_name', true );
       $billing_last_name  = get_post_meta( $order_id, '_billing_last_name',  true );
       $billing_address    = get_post_meta( $order_id, '_billing_address_1',  true );
       $billing_city       = get_post_meta( $order_id, '_billing_city',       true );
       $billing_email      = get_post_meta( $order_id, '_billing_email',      true );
       $billing_order_product      = get_post_meta( $order_id, '_order_product',      true );
       $billing_order_total      = get_post_meta( $order_id, '_order_total',      true );
       $billing_postcode      = get_post_meta( $order_id, '_billing_postcode',      true );
       $billing_country      = get_post_meta( $order_id, '_billing_country',      true );
       $billing_state      = get_post_meta( $order_id, '_billing_state',      true );
       $billing_phone      = get_post_meta( $order_id, '_billing_phone',      true );
       $sms_customer = str_replace( "[order number]",   $order_id, $sms_customer );
       $sms_customer = str_replace( "[first name]",   $billing_first_name, $sms_customer );
       $sms_customer = str_replace( "[last name]",    $billing_last_name, $sms_customer  );
       $sms_customer = str_replace( "[order number]", $order_id, $sms_customer           );
       $sms_customer = str_replace( "[address]",      $billing_address, $sms_customer    );
       $sms_customer = str_replace( "[city]",         $billing_city, $sms_customer       );
       $sms_customer = str_replace( "[email]",        $billing_email, $sms_customer      );
       $sms_customer = str_replace( "[order product]",        $billing_order_product, $sms_customer      );
       $sms_customer = str_replace( "[total amount]",        $billing_order_total, $sms_customer      );
       $sms_customer = str_replace( "[postcode]",        $billing_postcode, $sms_customer      );
       $sms_customer = str_replace( "[billing_country]",        $billing_country, $sms_customer      );
       $sms_customer = str_replace( "[billing_state]",        $billing_state, $sms_customer      );
       $sms_customer = str_replace( "[billing_phone]",        $billing_phone, $sms_customer      );
       return $sms_customer;
    }
}
