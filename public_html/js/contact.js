$(document).ready(function(){
    
    (function($) {
        "use strict";

    
    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");

    // validate contactForm form
    $(function() {
        $('#contactForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                subject: {
                    required: true,
                    minlength: 4
                },
                number: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 20
                }
            },
            messages: {
                name: {
                    required: "Please Enter your name",
                    minlength: "your name must consist of at least 2 characters"
                },
                subject: {
                    required: "You can't proceed without a subject",
                    minlength: "your subject must consist of at least 4 characters"
                },
                email: {
                    required: "no email, no message"
                },
                message: {
                    required: "um...yea, you have to write something to send this form.",
                    minlength: "That's too small, Please enter atleast 20 characters"
                }
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:"POST",
                    data: $(form).serialize(),
                    url:"mailer/query-mailer.php",
                    beforeSend: function() {
                        $('#contactForm :input').attr('disabled', 'disabled');
                        $('#submitContact').html('Sending....');
                    },
                    success: function(data) {
                        document.getElementById("contactForm").reset();
                        $('#submitContact').html('Send');
                        $('#contactForm :input').removeAttr('disabled');
                        if(data == 'sent') {
                            $("#success-msg").removeAttr('style');
                            setTimeout(function() {
                                $("#success-msg").attr('style','display: none');
                            }, 5000);
                        } else {
                            $("#error-msg").removeAttr('style');
                            setTimeout(function() {
                                $("#error-msg").attr('style','display: none');
                            }, 5000);
                        }
                        // $('#contactForm :input').attr('disabled', 'disabled');
                        // $('#contactForm').fadeTo( "slow", 1, function() {
                        //     $(this).find(':input').attr('disabled', 'disabled');
                        //     $(this).find('label').css('cursor','default');
                        //     $('#success').fadeIn()
                        //     $('.modal').modal('hide');
		                // 	$('#success').modal('show');
                        // })
                    },
                    error: function() {
                        document.getElementById("contactForm").reset();
                        $("#serror-msg").removeAttr('style');
                            setTimeout(function() {
                                $("#error-msg").attr('style','display: none');
                            }, 5000);
                    }
                })
            }
        })
    })
        
 })(jQuery)
})