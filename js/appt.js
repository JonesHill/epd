(function() {
	var states = [ "Alabama","Alaska","Arizona","Arkansas","California",
		"Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii",
		"Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana",
		"Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi",
		"Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey",
		"New Mexico","New York","North Carolina","North Dakota","Ohio","Oklahoma",
		"Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota",
		"Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia",
		"Wisconsin","Wyoming"
	];

	$("#state").typeahead({
		source: states
	});

	// Setup our validation. 
	var $form = $("#appointment-form");

	// Bind Events
	$("#reset-button").on("click", function(){
		$form.trigger('reset');
	});

	$(".help-inline").each(function(){
		$(this).css({
			display:"none"
		});
	});

	// Phone number formatting. 
	$("input[type=tel]").on("keyup", function ( e ) {
	    var $input   = $(this), 
			value    = $input.val(),
			deleting = false;

	    if(e.keyCode == 8 || e.keyCode == 46) {
	    	deleting = true;
	    }

	    if(!deleting) {
	    	if(value.length == 3) {
	        	$input.val("(" + value + ") ");
	      	}
	      	else if(value.length == 9) {
	        	$input.val(value + "-");
	      	}
	    }
	});

	$('input').each(function() {
		$(this).attr("required", false);
	});

	$form.validate({
		submitHandler: function( form ) {
			var $submit = $('#submit-button');

			$("#error-message").html("&nbsp;");
			$submit.button('loading');
			// send via ajax...
			$.ajax({
				url: $form.attr('action') + "?ajax=true",
				type: $form.attr("method"),
				data: $form.serialize(),
				success: function ( data ) {
					// change spinner to message sent or something...
					if(typeof data == "string" && data == "success") {
						$submit.button('complete');
						$('#sent-message').html("Thanks for your message! We'll get back to you soon.");
						$submit.attr('disabled', '');
					}
					else {
						$('#sent-message').html("There was a problem sending your message. Please try again.");
					}
				},

				error: function () {
					$('#sent-message').html("There was a problem sending your message. Please try again.");
					$submit.attr('disabled', 'false');
				}
			});

			return false;
		},

		errorPlacement: function( error, element ){
			element.siblings('.help-inline').append(error);

			element.parents('.control-group')
				   .addClass("error");

		},

		success: function( element ){
			element.parents('.control-group')
				   .removeClass("error");
		},

		showErrors: function( errorMap, errorList ) {
			$.map(errorMap, function( val, element ){
				var $element = $("#" + element);

				$element.parents(".control-group")
						.addClass("error");

				if(val == "Please enter a valid email address.") {
					$element.siblings('.help-inline').css("display", "inline-block");
				}
				$("#error-message").text("Please fill in the required fields.");
			});

			this.defaultShowErrors();
		},

		rules: {
			first_name: "required",
			last_name: "required",
			street_address: "required",
			city: "required",
			state: "required",
			zip: "required",
			phone: "required",
			email: {
				required: true,
				email: true
			}
		},
	});

})();