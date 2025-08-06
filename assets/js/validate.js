$(document).ready(function(){
	$('.unique_email').hide();

	$("#sign-in-form").validate({
		rules:{
			signinemail:{
				required: true,
				email: true
			},
			password:{
				required: true
			}
		},
		messages:{
			signinemail:{
				required:"Please enter your email",
				email: "Please enter valid email"
			},
			password:{
				required:"Please enter your password"
			}
		},
		submitHandler: function(form) {
		    // do other things for a valid form
		    $("img.loading_icon").css('display', 'inline-block');
		    $(".btn-signin").prop('disabled',true);
		    form.submit();
		},
	}); 

	jQuery.validator.addMethod('linkedinurl', function (value, element) {
        var linkedin = $("#linkedin_address").val();
		if ( /(http|https):\/\/?(?:www\.)?linkedin.com(\w+:{0,1}\w*@)?(\S+)(:([0-9])+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/.test(linkedin) ) {
			return true;
		} else {
			return false;
		}
    }, '');

	$("#sign-up-form").validate({
		rules:{
			firstname:{
				required: true
			},
			lastname:{
				required: true
			},
			signupemail:{
				required: true,
				// unique_email: true,
				email: true,
				remote: {
                    url: "unique_mail_check.php",
                    type: "POST",
                },
			},
			linkedin_address:{
				required: true,
				linkedinurl: true,
			},
			referred_by:{
				required: true,
			},
			country:{
				required:true
			},
			password:{
				required: true
			},			
            confirm_password: {
	            required: true,	           
	            equalTo: "#password"
	        }
		},
		messages:{
			firstname:{
				required:"Please enter your first name"
			},
			lastname:{
				required:"Please enter your last name"
			},
			signupemail:{
				required:"Please enter your email",
				remote: "Email already exists",
				email: "Please enter valid email"
			},
			linkedin_address:{
				required:"Please enter your linkedin profile url",
				linkedinurl: "Please enter valid url"
			},
			referred_by:{
				required:"Please enter referred by"
			},
			country:{
				required:"Please select your country"
			},
			password:{
				required:"Please enter your password"
			},
			confirm_password:{
				required:"Please re-enter your password",
				equalTo: "Passwords does not match"
			}
		},
		submitHandler: function(form) {
		    // do other things for a valid form
			var response = grecaptcha.getResponse();
			if(response!="") {
				$("img.loading_icon").css('display', 'inline-block');
	    		$(".btn-signup").prop('disabled',true);
	   			form.submit();
				return true;
			} else {
				return false;
				$( '.msg-error').text( "reCAPTCHA is mandatory" );
			}
		},
	});

	$("#forget-form").validate({
		rules:{
			forget_email:{
				required: true,
				email: true
			}
		},
		messages:{
			forget_email:{
				required:"Please enter your email",
				email: "Please enter valid email"
			}
		},
	});

	$("#contact_form").validate({
		rules:{
			contact_name:{
				required: true,
			},
			contact_email:{
				required: true,
				email: true
			},
			contact_msg:{
				required: true,
			},
			captcha_text:{
				required: true,
				remote: {
                    url: "captcha_valid.php",
                    type: "POST",
                },
			}
		},
		messages:{
			contact_name:{
				required: "Please enter your name",
			},
			contact_email:{
				required: "Please enter your email",
				email: "Please enter valid email"
			},
			captcha_text:{
				required: "Please enter captcha text",
				remote: "Please enter valid captcha text"
			}
		},
		submitHandler: function(form) {
		    // do other things for a valid form
			var response = grecaptcha.getResponse();
			if(response!="") {
				$("img.loading_icon").css('display', 'inline-block');
	    		$(".contact_btn").prop('disabled',true);
	   			form.submit();
				return true;
			} else {
				return false;
				$( '.msg-error').text( "reCAPTCHA is mandatory" );
			}
		},
	});

	$('#contact_form').on('submit', function(e) {
		var $captcha = $( '#recaptcha' ),
		response = grecaptcha.getResponse();
		if(response.length === 0) {
			e.preventDefault();
			$( '.msg-error').text( "reCAPTCHA is mandatory" );
			return false;
		} else {
			$captcha.removeClass( "error" );
			form.submit();
			return true;
		}
	});

	$('#sign-up-form').on('submit', function(e) {
		var $captcha = $( '#recaptcha' ),
		response = grecaptcha.getResponse();
		if(response.length === 0) {
			e.preventDefault();
			$( '.msg-error').text( "reCAPTCHA is mandatory" );
			return false;
		} else {
			$captcha.removeClass( "error" );
			form.submit();
			return true;
		}
	});
});