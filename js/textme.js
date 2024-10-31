(function ($) {

    $(document).ready(function () {

        var elements = ['first name', 'last name', 'order number', 'address', 'city', 'email'];

        $('#ssip_new_order_customer_content , #ssip_on_hold_order_customer_content ,#ssip_order_complete_sms , #ssip_order_pending_sms , #ssip_order_pending_sms_customer, #ssip_order_cancel_sms , #ssip_order_cancel_sms_customer,#ssip_order_fail_sms_customer').textcomplete([
            { // html
                mentions: elements,
                match: /\B@(\w*)$/,
                search: function (term, callback) {
                    callback($.map(this.mentions, function (mention) {
                        return mention.indexOf(term) === 0 ? mention : null;
                    }));
                },
                index: 1,
                replace: function (mention) {
                    return '[' + mention + ']';
                }
            }
        ]);

    $("#ssip_acount_form").on("submit", function (event) {
            event.preventDefault();
            $('.spinner').addClass('is-active');
            var data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: ajaxurl,
                data: {
                    'action': 'ssip_update_account',
                    'data': data
                },
				
                success: function (response) {
                   // var obj = jQuery.parseJSON(response);
                     console.log(response);
                     if(response == '0'){
                        $('.notice').removeClass('hidden notice-success').addClass('notice-error');
                        $('.textme-success p').text("Userid or Api Key is missing");
                     }

                    else if(response == '-1'){
                        $('.notice').removeClass('hidden notice-success').addClass('notice-error');
                        $('.textme-success p').text("The Userid or Api Key you supplied is either invalid or disabled");
                     }
                        else {
                         $('.notice').removeClass('hidden notice-success').addClass('notice-success');
                        $('.textme-success p').text(response);
                        //$('.textme-balance').text(obj.Balance);
                    }
					  

                   $('.spinner').removeClass('is-active');
                }
            });
        });
        

        $("#ssip_option_form").on("submit", function (event) {
            event.preventDefault();
            $('.spinner').addClass('is-active');
            var data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: ajaxurl,
                data: {
                    'action': 'ssip_update_option_page',
                    'data': data
                },
                success: function (response) {
					console.log(response);
                    $('.spinner').removeClass('is-active');
                    $('.notice').removeClass('hidden');
                }
            });
        });
  $('#ssip_order_pending').click(function () {
            var $this = $(this);
            // $this will contain a reference to the checkbox
            if ($this.is(':checked')) {
                // the checkbox was checked
                $('.ssip_order_pending_content').show();
            } else {
                // the checkbox was unchecked
                $('.ssip_order_pending_content').hide();
            }
        });


        $('#ssip_order_cancel').click(function () {
            var $this = $(this);
            // $this will contain a reference to the checkbox
            if ($this.is(':checked')) {
                // the checkbox was checked
                $('.ssip_order_cancel_content').show();
            } else {
                // the checkbox was unchecked
                $('.ssip_order_cancel_content').hide();
            }
        });

		
        $('#ssip_on_hold_order').click(function () {
            var $this = $(this);
            // $this will contain a reference to the checkbox
            if ($this.is(':checked')) {
                // the checkbox was checked
                $('.ssip_on_hold_order_content').show();
            } else {
                // the checkbox was unchecked
                $('.ssip_on_hold_order_content').hide();
            }
        });
		
		
        $('#ssip_new_order').click(function () {
            var $this = $(this);
            // $this will contain a reference to the checkbox
            if ($this.is(':checked')) {
                // the checkbox was checked
                $('.ssip_new_order_content').show();
            } else {
                // the checkbox was unchecked
                $('.ssip_new_order_content').hide();
            }
        });

        $('#ssip_order_complete').click(function () {
            var $this = $(this);
            // $this will contain a reference to the checkbox
            if ($this.is(':checked')) {
                // the checkbox was checked
                $('.ssip_order_complete_content').show();
            } else {
                // the checkbox was unchecked
                $('.ssip_order_complete_content').hide();
            }
        });

        $('#ssip_order_failed').click(function () {
            var $this = $(this);
            // $this will contain a reference to the checkbox
            if ($this.is(':checked')) {
                // the checkbox was checked
                $('.ssip_order_fail_content').show();
            } else {
                // the checkbox was unchecked
                $('.ssip_order_fail_content').hide();
            }
        });
    });
})(jQuery);