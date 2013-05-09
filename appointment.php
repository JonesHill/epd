<?php
 // Start of a contact form page. 
?>
<head>
<link href="css/styles.css" rel="stylesheet" media="screen">

</head>

<form class="form-horizontal" method="post" action="mail.php">
  	<div class="control-group">
    	<label class="control-label" for="first_name">First Name</label>
    	<div class="controls">
    		<input type="text" id="first_name" name="first_name" placeholder="" />
    		<span class="help-inline">An error would go here...</span>
    	</div>
    </div>
    <div class="control-group">
    	<label class="control-label">Last Name</label>
    	<div class="controls">
    		<input type="text" id="" name="" placeholder="">
    		<span class="help-inline">An error would go here...</span>
    	</div>
    </div>
    <div class="control-group">
    	<label class="control-label">Street Address</label>
    	<div class="controls">
    		<input type="text" id="" name="" placeholder="">
    		<span class="help-inline">An error would go here...</span>
    	</div>
    </div>
    <div class="control-group">
    	<label class="control-label">City</label>
    	<div class="controls">
    		<input type="text" id="" name="" placeholder="">
    		<span class="help-inline">An error would go here...</span>
    	</div>
    </div>
    <div class="control-group">
	    <label class="control-label">State</label>
	    <div class="controls">
	    	<input type="text" id="" name="" placeholder="" data-provide="typeahead">
	    	<span class="help-inline">An error would go here...</span>
	    </div>
	</div>
	<div class="control-group">
    	<label class="control-label">Zip Code</label>
    	<div class="controls">
    		<input type="text" id="" name="" placeholder="">
    	</div>
    </div>
    <div class="control-group">
	    <label class="control-label">Phone Number</label>
	    <div class="controls">
		    <input type="text" id="" name="" placeholder="" class="input-mini" />
		    <input type="text" id="" name="" placeholder="" class="input-mini">
		    <input type="text" id="" name="" placeholder="" class="input-mini">
		    <span class="help-inline">An error would go here...</span>
		</div>
	</div>
	<div class="control-group">
	    <label class="control-label">Email Address</label>
	    <div class="controls">
	    	<input type="text" id="" name="" placeholder="">
	    	<span class="help-inline">An error would go here...</span>
	    </div>
	</div>
	<div class="control-group">
    	<label class="control-label">Comments</label>
    	<div class="controls">
    		<textarea rows="3" id="" name="" placeholder=""></textarea>
    		<span class="help-inline">An error would go here...</span>
    	</div>
    </div>
    
    <div class="controls">
    	<button type="submit" id="" name="" class="btn btn-primary">Submit</button>
    	<button type="button" id="" name="" class="btn">Reset</button>
    </div>

</form>