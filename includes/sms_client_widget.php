<?php

	$body = "";

	if (isset($_POST['sms_send'])){
	       	$account = get_option('sms_account');
         	$user_id  =  $account['sms_user_id'];
	 	    $api = 		 $account['sms_api'];
			$to			= sanitize_text_field($_POST['sms_mob_number']);
		    $from = 	 $account['sms_from'];
			$Message	= urlencode(substr(sanitize_text_field($_POST['sms_mob_msg']),0,120));
			$sms_send_response ="https://api.hatinco.com/sms/pro_sms.php?api=".$api."&user_id=" .$user_id.
			"&to=" .$to. "&from=" .rawurlencode($from). "&message=" .$Message."";
		     $response = wp_remote_get( $sms_send_response );
	         $body    = wp_remote_retrieve_body( $response );
	         $body = json_decode($body , TRUE);
	     }
	?>
<div id="send_sms">
	<?php  if (isset($_POST['sms_send'])): ?>
    	<div id="sms_msg_box">
        	<?php
			    if($body['status'] == 1)
			    	echo esc_html("Message Sent Successfully");
			    else
			    	echo esc_html($body['message']);
			?>
        </div>
	<?php  endif; ?>
    <form action="" method="post">
    <ul class="sms_form" style="list-style-type:none">
    	<li>
        	<label>Mobile Number</label>
            <input type="text" class="required number" value="" name="sms_mob_number" />
            
        </li>
        
        <li>
        	<label>Message</label>
            <textarea class="required" name="sms_mob_msg" maxlength="120"></textarea>
            <em>160 Characters Allowed</em>
        </li>
        
        <li>
        	<input type="submit" name="sms_send" value="Send" />
        </li>        
    </ul>
    </form>
</div>