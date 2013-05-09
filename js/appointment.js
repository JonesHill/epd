$(function() {
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
	var form = $("#appointment-form");

	// Bind Events
	$("#reset-button").on("click", function(){
		form.trigger('reset');
	});

	

	form.validate({
		//onfocusout: true,
		submitHandler: submitAppointmentForm,

		errorPlacement: function( error, element ){
			element.next('.help-inline').append(error);
			element.parents('.control-group')
				   .addClass("error");
		},

		success: function( element ){
			console.log(element)
			console.log(this)
			element.parents('.control-group')
			       .removeClass("error")
				   .addClass("success");
		},

		rules: {
			first_name: "required",
			last_name: "required",
			street_address: "required",
			city: "required",
			state: "required",
			zip: "required",
			area_code: {
				required: true,
				minLength: 3
			},
			phone_1: {
				required: true,
				minLength: 3
			},
			phone_2: {
				required: true,
				minLength: 3
			},
			email: {
				required: true,
				email: true
			}

		},

		messages: {

		}
	});

	function submitAppointmentForm() {
		console.log("submit...")
	}

});