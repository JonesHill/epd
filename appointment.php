<?php
 // Start of a contact form page. 
?>
<head>
<link href="css/styles.css" rel="stylesheet" media="screen">
<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/vendor/jquery.validate.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/appointment.js"></script>

</head>
<div class="error-message" id="error-message">&nbsp;</div>
<form class="form-horizontal" id="appointment-form" method="post" action="mail.php">
  	<div class="control-group">
    	<label class="control-label" for="first_name">Name:</label>
    	<div class="controls">
    		<input type="text" id="first_name" name="first_name" placeholder="First" required />
    		<input type="text" id="last_name" name="last_name" placeholder="Last" required  />
    		<span class="help-inline"></span>
    	</div>
    </div>
    <div class="control-group">
    	<label class="control-label">Address:</label>
    	<div class="controls">
    		<input type="text" id="street_address" name="street_address" placeholder="Street" required />
    		<span class="help-inline"></span>
    	</div>
    </div>
    <div class="control-group">
    	<label class="control-label">City</label>
    	<div class="controls">
    		<input type="text" id="city" name="city" placeholder="City" required />
    		<span class="help-inline"></span>
    	</div>
    </div>
    <div class="control-group">
	    <label class="control-label">State</label>
	    <div class="controls">
	    	<input type="text" id="state" name="state" autocomplete="off" placeholder="State" required  />
	    	<span class="help-inline"></span>
	    </div>
	</div>
	<div class="control-group">
    	<label class="control-label">Zip Code</label>
    	<div class="controls">
    		<input type="text" id="zip" name="zip" placeholder="Zip" required />
    		<span class="help-inline"></span>
    	</div>
    </div>
    <div class="control-group">
	    <label class="control-label">Phone:</label>
	    <div class="controls">
		    <input type="tel" id="phone" name="phone" placeholder="(555) 555-5555" required />
		    <span class="help-inline"></span>
		</div>
	</div>
	<div class="control-group">
	    <label class="control-label">Email:</label>
	    <div class="controls">
	    	<input type="email" id="email" name="email" placeholder="email@address.com" required />
	    	<span class="help-inline"></span>
	    </div>
	</div>
	<div class="control-group">
    	<label class="control-label">Comments:</label>
    	<div class="controls">
    		<textarea rows="3" id="comments" name="Comments"></textarea>
    		<span class="help-inline"></span>
    	</div>
    </div>
    
    <div class="controls">
    	<button type="submit" id="submit-button" class="btn btn-primary">Submit</button>
    	<button type="button" id="reset-button" class="btn">Reset</button>
    </div>

</form>