(function() {
    
    // Setup our validation. 
    var $form = $("#contact-form");

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

    $form.validate({
        submitHandler: function( form ) {
            var $submit = $('#submit-button');
            
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
            name: "required",
            phone: "required",
            location: "required",
            email: {
                required: true,
                email: true
            }
        },
    });

})();