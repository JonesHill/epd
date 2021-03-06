(function() {
    // Setup our validation. 
    var $form = $("#feedback-form");

    // Bind Events
    $("#reset-button").on("click", function(){
        $form.trigger('reset');
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
                        $('#sent-message').html("Thanks for your feedback!");
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

        rules: {
            name: "required"
        }
    });

})();