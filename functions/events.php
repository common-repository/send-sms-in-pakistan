<?php
/**
 * Security check
 *
 * Prevent direct access to the file.
 *
 * @since 1.3
 */
if (!defined('ABSPATH')) {
    exit;
}
/**
 * WooCommerce TextMe fields
 *
 * Add WooCommerce fields to Send settings page.
 *
 * @param $ssip_option
 *
 * @since 1.4
 */
function sms_woocommerce_fields($ssip_option)
{
    ?>
    <div class="postbox">
     <h2 class="hndle">
                <?php esc_html_e('WooCommerce Events', 'send_sms'); ?>
            </h2>
            <div class="inside">
                <fieldset>
                    <label for="ssip_new_order">
                        <input type="checkbox" id="ssip_new_order" name="ssip_new_order"
                               value="1" <?php if(isset($ssip_option['ssip_new_order']))
                            if ($ssip_option['ssip_new_order'] == "1") {
                            echo esc_html('checked');
                        } ?> />
                        <span><?php esc_html_e('Send SMS when new order created', 'send_sms'); ?></span>
                    </label>
                </fieldset>
                <div class="ssip_new_order_content <?php  if(isset($ssip_option['ssip_new_order'])) if ($ssip_option['ssip_new_order'] != "1") {
                    echo esc_html('hidden');
                } ?>">
                    <table>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <textarea id="ssip_new_order_customer_content"
                                          name="ssip_new_order_customer_content" cols="80" rows="3"
                                          class="all-options"><?php if(isset($ssip_option['ssip_new_order_customer_content'])) if ($ssip_option['ssip_new_order_customer_content']) {
                                        echo esc_html($ssip_option['ssip_new_order_customer_content']);
                                    } ?></textarea>
                            </td>
                        </tr>                  
                    </table>
                </div>
                <hr>
                <fieldset>
                    <label for="ssip_order_pending">
                        <input name="ssip_order_pending" type="checkbox"
                               id="ssip_order_pending" <?php 
                                       if(isset($ssip_option['ssip_order_pending']))
                                           if ($ssip_option['ssip_order_pending'] == "1") {
                                        echo esc_html('checked');
                                    }

                         ?>
                               value="1"/>
                        <span><?php esc_html_e('Send SMS when order status is pending ', 'send_sms'); ?></span>
                    </label>
                </fieldset>

                <div class="ssip_order_pending_content <?php 
                if(isset($ssip_option['ssip_order_pending']))
                if ($ssip_option['ssip_order_pending'] != '1') {
                    echo esc_html('hidden');
                } ?>">
                    <table>
                        <tr>
                            <td></td>
                            <td><textarea id="ssip_order_pending_sms_customer" name="ssip_order_pending_sms_customer"
                                          cols="80" rows="3"
                                          class="all-options"><?php 
                                          if(isset($ssip_option['ssip_order_pending_sms_customer']))
                                          if ($ssip_option['ssip_order_pending_sms_customer']) {
                                        echo esc_html($ssip_option['ssip_order_pending_sms_customer']);
                                    } ?></textarea>
                            </td>
                        </tr>
                    </table>

                </div>
<hr>
                 <fieldset>
                    <label for="ssip_new_order">
                        <input type="checkbox" id="ssip_on_hold_order" name="ssip_on_hold_order"
                               value="1" <?php 
                                if(isset($ssip_option['ssip_on_hold_order']))
                               if ($ssip_option['ssip_on_hold_order'] == "1") {
                            echo esc_html('checked');
                        } ?> />
                        <span><?php esc_html_e('Send SMS when order is on hold', 'send_sms'); ?></span>
                    </label>
                </fieldset>
                <div class="ssip_on_hold_order_content <?php 
                if(isset($ssip_option['ssip_on_hold_order']))
                if ($ssip_option['ssip_on_hold_order'] != "1") {
                    echo esc_html('hidden');
                } ?>">
                    <table>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <textarea id="ssip_on_hold_order_customer_content"
                                          name="ssip_on_hold_order_customer_content" cols="80" rows="3"
                                          class="all-options"><?php 
                                    if(isset($ssip_option['ssip_on_hold_order_customer_content']))
                                          if ($ssip_option['ssip_on_hold_order_customer_content']) {
                                        echo esc_html($ssip_option['ssip_on_hold_order_customer_content']);
                                    } ?></textarea>
                            </td>
                        </tr>                  
                    </table>
                </div>
                <hr>
                <fieldset>
                    <label for="ssip_order_complete">
                        <input name="ssip_order_complete" type="checkbox"
                               id="ssip_order_complete" <?php 
                            if(isset($ssip_option['ssip_order_complete']))
                               if ($ssip_option['ssip_order_complete'] == "1") {
                            echo esc_html('checked');
                        } ?>
                               value="1"/>
                        <span><?php esc_html_e('Send SMS when order status is completed', 'send_sms'); ?></span>
                    </label>
                </fieldset>

                <div class="ssip_order_complete_content <?php 
                if(isset($ssip_option['ssip_order_complete']))
                if ($ssip_option['ssip_order_complete'] != '1') {
                    echo esc_html('hidden');
                } ?>">
                    <table>
                        <tr>
                        <td></td>
                            <td><textarea id="ssip_order_complete_sms" name="ssip_order_complete_sms"
                                          cols="80" rows="3"
                                          class="all-options"><?php 
                                            if(isset($ssip_option['ssip_order_complete_sms']))
                                          if ($ssip_option['ssip_order_complete_sms']) {
                                        echo esc_html($ssip_option['ssip_order_complete_sms']);
                                    } ?></textarea>
                            </td>
                        </tr>
                    </table>

                </div>

                <hr>
                <fieldset>
                    <label for="ssip_order_cancel">
                        <input name="ssip_order_cancel" type="checkbox"
                               id="ssip_order_cancel" <?php 
                            if(isset($ssip_option['ssip_order_cancel']))

                               if ($ssip_option['ssip_order_cancel'] == "1") {
                            echo esc_html('checked');
                            
                        } ?>
                               value="1"/>
                        <span><?php esc_html_e('Send SMS when order status is cancelled ', 'send_sms'); ?></span>
                    </label>
                </fieldset>

                <div class="ssip_order_cancel_content <?php 
                if(isset($ssip_option['ssip_order_cancel']))
                if ($ssip_option['ssip_order_cancel'] != '1') {
                    echo esc_html('hidden');
                } ?>">
                    <table>
                        <tr>
                            <td></td>
                            <td><textarea id="ssip_order_cancel_sms_customer" name="ssip_order_cancel_sms_customer"
                                          cols="80" rows="3"
                                          class="all-options"><?php 
                                    if(isset($ssip_option['ssip_order_cancel_sms_customer']))
                                          if ($ssip_option['ssip_order_cancel_sms_customer']) {
                                        echo esc_html($ssip_option['ssip_order_cancel_sms_customer']);
                                    } ?></textarea>
                            </td>
                        </tr>
                    </table>

                </div>
<hr>

<fieldset>
                    <label for="ssip_order_failed">
                        <input name="ssip_order_failed" type="checkbox"
                               id="ssip_order_failed" <?php 
                        if(isset($ssip_option['ssip_order_failed']))
                               if ($ssip_option['ssip_order_failed'] == "1") {
                            echo esc_html('checked');
                            
                        } ?>
                               value="1"/>
                        <span><?php esc_html_e('Send SMS when order status is failed ', 'send_sms'); ?></span>
                    </label>
                </fieldset>

                <div class="ssip_order_fail_content <?php 

                if(isset($ssip_option['ssip_order_failed']))
                if ($ssip_option['ssip_order_failed'] != '1') {
                    echo esc_html('hidden');
                } ?>">
                    <table>
                        <tr>
                            <td></td>
                            
                                <td><textarea id="ssip_order_fail_sms_customer" name="ssip_order_fail_sms_customer"
                                          cols="80" rows="3"
                                          class="all-options"><?php 

                                        if(isset($ssip_option['ssip_order_fail_sms_customer']))
                                          if ($ssip_option['ssip_order_fail_sms_customer']) {
                                        echo esc_html($ssip_option['ssip_order_fail_sms_customer']);
                                    } ?></textarea>
                            </td>
                        </tr>
                    </table>

                </div>

            </div>
        </div>
        <?php
   
}
add_action('text_sms_form_fields', 'sms_woocommerce_fields', 10, 1);
/**
 * WooCommerce new order
 *
 * Send SMS on WooCommerce new order.
 *
 * @param $order_id
 *
 * @since 1.0
 */

function sms_woocommerce_new_order($order_id)
{
         $option = get_option('sms_option');
    if (1 == $option['ssip_new_order']) {
        $sms = new SendSmsInPakistan\SSIP_gateway();
        $billing_phone = get_post_meta($order_id, '_billing_phone', true);
        $sms_customer = $option['ssip_new_order_customer_content'];
        $sms_content = $sms->create_sms_content($order_id, $sms_customer);
        $sms->send_sms($billing_phone,$sms_content );   
    }
}
add_action('woocommerce_order_status_processing', 'sms_woocommerce_new_order');
/**
 * WooCommerce new order
 *
 * Send SMS on WooCommerce new order.
 *
 * @param $order_id
 *
 * @since 1.0
 */

function sms_woocommerce_order_onhold($order_id)
{

         $option = get_option('sms_option');
    if (1 == $option['ssip_on_hold_order']) {
        $sms = new SendSmsInPakistan\SSIP_gateway();
        $billing_phone = get_post_meta($order_id, '_billing_phone', true);
        $sms_customer = $option['ssip_on_hold_order_customer_content'];
        $sms_content = $sms->create_sms_content($order_id, $sms_customer);
        $sms->send_sms($billing_phone,$sms_content );   
    }
}
add_action('woocommerce_order_status_on-hold', 'sms_woocommerce_order_onhold');
/**
 * WooCommerce order pending
 *
 * Send SMS on WooCommerce order payment pending.
 *
 * @param $order_id
 *
 * @since 1.0
 */
function sms_woocommerce_order_pending($order_id)
{
     $option = get_option('sms_option');
    if (1 == $option['ssip_order_pending']) {
        $sms = new SendSmsInPakistan\SSIP_gateway();
        $billing_phone = get_post_meta($order_id, '_billing_phone', true);
        $sms_customer = $option['ssip_order_pending_sms_customer'];
        $sms_content = $sms->create_sms_content($order_id, $sms_customer);
        $sms->send_sms($billing_phone,$sms_content );
    }
    
    
}
add_action('woocommerce_order_status_pending', 'sms_woocommerce_order_pending');

/**
 * WooCommerce order cancellation
 *
 * Send SMS on WooCommerce order cancellation.
 *
 * @param $order_id
 *
 * @since 1.0
 */
function sms_woocommerce_order_cancel($order_id)
{
     $option = get_option('sms_option');
    if (1 == $option['ssip_order_cancel']) {
        $sms = new SendSmsInPakistan\SSIP_gateway();
        $billing_phone = get_post_meta($order_id, '_billing_phone', true);
        $sms_customer = $option['ssip_order_cancel_sms_customer'];
        $sms_content = $sms->create_sms_content($order_id, $sms_customer);
        $sms->send_sms($billing_phone,$sms_content );
    }   
}
add_action('woocommerce_order_status_cancelled', 'sms_woocommerce_order_cancel');
/**
 * WooCommerce order complete
 *
 * Send SMS on WooCommerce order completion.
 *
 * @param $order_id
 *
 * @since 1.0
 */
function sms_woocommerce_order_complete($order_id)
{
    $option = get_option('sms_option');
    if (1 == $option['ssip_order_complete']) {
        $sms = new SendSmsInPakistan\SSIP_gateway();
        $billing_phone = get_post_meta($order_id, '_billing_phone', true);
        $sms_customer = $option['ssip_order_complete_sms'];
        $sms_content = $sms->create_sms_content($order_id, $sms_customer);
        $sms->send_sms($billing_phone,$sms_content );
    }
}
add_action('woocommerce_order_status_completed', 'sms_woocommerce_order_complete');
/**
 * WooCommerce order complete
 *
 * Send SMS on WooCommerce order failure.
 *
 * @param $order_id
 *
 * @since 1.0
 */
function sms_woocommerce_order_failed($order_id)
{   
    $option = get_option('sms_option');
    if (1 == $option['ssip_order_failed']) {
        $sms = new SendSmsInPakistan\SSIP_gateway();
        $billing_phone = get_post_meta($order_id, '_billing_phone', true);
        $sms_customer = $option['ssip_order_fail_sms_customer'];
        $sms_content = $sms->create_sms_content($order_id, $sms_customer);
        $sms->send_sms($billing_phone,$sms_content );
    }
}
add_action('woocommerce_order_status_failed', 'sms_woocommerce_order_failed');