<?php
/**
 * Security check
 *
 * Prevent direct access to the file.
 *
 * @since 1.0
 */
if (!defined('ABSPATH')) {
    exit;
}
$sms = new \SendSmsInPakistan\SSIP_gateway();
$balance = $sms->get_balance();
$balance = isset($balance->balance) ? $balance->balance : '';
$ssip_option = get_option('sms_option');
$ssip_account = get_option('sms_account');
?>
<div class="wrap ssip_wrap">
   <h1><?php esc_html_e('SEND SMS IN PAKISTAN', 'send_sms'); ?></h1>
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <!-- sidebar -->
            <div id="postbox-container-1" class="postbox-container">
                <div class="meta-box-sortables">
                    <div class="postbox">                    
                        <!-- .inside -->
                        <h2 class="hndle">
                            <span><?php esc_html_e('Guidelines:', 'send_sms'); ?></span>
                        </h2>
                        <div class="inside">
						
						<ul>
                            <li>To get credentials for sms api.Please Register <a href="https://hatinco.com/smspackage.php"
                                  target="_blank"><?php esc_html_e(' here.', 'send_sms'); ?></a>
                            </li>	
							<li>Checked require field before using it.</li>
<li>Use these variables to customize your message.<br><b> [first name],[last name],[order number],[address],[city],
[email],[postcode],[billing_country], [billing_state], [billing_phone] , [total amount]

</b>.</li>							
                         <li>Go to Apperance > Wigets and drag and drop SMS widget to your sidebar.</li><li>You can also use shortcode [SEND_SMS] to keep in post and pages.
                            </li>
							
							<li>Click <a href="https://hatinco.com/sms-api-documentation.html" target="_blank">here </a> for  Api Documentation.
                       </li></ul> </div>
                    </div>
                    <!-- .postbox -->

                </div>
                <!-- .meta-box-sortables -->

            </div>

            <!-- main content -->
            <div id="post-body-content">
                <div class="meta-box-sortables ui-sortable">
			 <form action="" method="post" id="ssip_acount_form">
                        <div class="postbox">
                            <div class="notice textme-success is-dismissible hidden">
                                <p><?php esc_html_e('Successfully updated.', 'send_sms'); ?></p>
                            </div>
                            <h2 class="hndle">
                                <span><?php esc_html_e('Account details', 'send_sms'); ?></span></h2>

                            <div class="inside">
                                <table>
                                    <tr>
                                        <td>
                                            <label for="sms_user_name"><?php esc_html_e('Acount User ID:', 'send_sms'); ?></label>
                                        </td>
                                        <td>
                                            <input type="text" name="sms_user_name" id="sms_user_name"
                                                   value="<?php if ($ssip_account['sms_user_id']) {
                                                       echo esc_html($ssip_account['sms_user_id']);
                                                   } ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="sms_pass"><?php esc_html_e('Acount API KEY:', 'send_sms'); ?></label>
                                        </td>
                                        <td>
                                            <input type="password" name="sms_pass" id="sms_pass"
                                                   value="<?php if ($ssip_account['sms_api']) {
                                                       echo esc_html($ssip_account['sms_api']);
                                                   } ?>"/>
                                        </td>
                                    </tr>
                                  
                                        <td>
                                            <label for="sms_from"><?php esc_html_e('SMS name or number:', 'send_sms'); ?></label>
                                        </td>
                                        <td>
                                            <input type="text" name="sms_from" id="sms_from"
                                                   value="<?php if ($ssip_account['sms_from']) {
                                                       echo esc_html($ssip_account['sms_from']);
                                                   } ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="button-primary" type="submit" id="ssip_acount" name="save"
                                                   value="<?php esc_attr_e('Save', 'send_sms'); ?>">
                                        </td>
                                        <td>
                                            <div class="spinner"
                                                 style="float:none;width:auto;height:auto;padding:10px 0 10px 50px;background-position:20px 0;"></div>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                            <!-- .inside -->

                        </div>

                    </form>
         

                 <?php $plugin_name = 'woocommerce/woocommerce.php';
                $active_plugins = apply_filters('active_plugins', get_option('active_plugins'));
                if (in_array($plugin_name, $active_plugins)) { ?>
                    <form id="ssip_option_form" action="" method="post">

                        <?php do_action('text_sms_form_fields', $ssip_option); ?>

                        <input class="button-primary" type="submit" id="ssip_submit" name="save"
                               value="<?php esc_attr_e('Save Changes', 'send_sms'); ?>"/>

                        <div class="spinner"
                             style="float:none;width:auto;height:auto;padding:10px 0 10px 50px;background-position:20px 0;"></div>

                    </form>
                <?php } ?>

                </div>
                <!-- post-body-content -->

            </div>
            <!-- #post-body .metabox-holder .columns-2 -->

            <br class="clear">

        </div>
        <!-- #poststuff -->

    </div>
    <!-- .wrap -->
