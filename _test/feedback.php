<?php
 /*
 	Feedback Form. 
 */

?>
<head>
<link href="css/styles.css" rel="stylesheet" media="screen">
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen"><script src="http://code.jquery.com/jquery.js"></script>
<script src="js/vendor/jquery.validate.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/feedback.js"></script>

</head>
<div class="error-message" id="error-message">&nbsp;</div>
<form class="form-horizontal" id="feedback-form" method="post" action="processFeedback.php">
  	<div class="control-group">
    	<label class="control-label" for="patient_name">Patient Name:</label>
    	<div class="controls">
    		<input type="text" id="patient_name" name="patient_name" placeholder="Name" required />
    		<span class="help-inline"></span>
    	</div>
    </div>
    <div class="control-group">
    	<label class="control-label">How would you rate your overall visit?</label>
    	<div class="controls">
            <label class="radio">
    		  <input type="radio" id="overall-rating-very" name="overall-rating" value="very-satisfied" checked />
              Very Satisfied
            </label>
            <label class="radio">
              <input type="radio" id="overall-rating-middle" name="overall-rating" value="satisfied" />
             Satisfied
            </label>
            <label class="radio">
              <input type="radio" id="overall-rating-somewhat" name="overall-rating" value="somewhat-satisfied" />
              Somewhat Satisfied
            </label>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label">Did the staff treat you professionally on the phone?</label>
        <div class="controls">
            <label class="radio">
              <input type="radio" id="professional-phone-yes" name="professional-phone" value="yes" checked />
              Yes
            </label>
            <label class="radio">
              <input type="radio" id="professional-phone-no" name="professional-phone" value="no" />
              No
            </label>
            <label class="radio">
              <input type="radio" id="professional-phone-recall" name="professional-phone" value="I do not recall" />
              I do not recall
            </label>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Did the staff greet you properly?</label>
        <div class="controls">
            <label class="radio">
              <input type="radio" id="properly-greet-yes" name="properly-greet" value="yes" checked />
              Yes
            </label>
            <label class="radio">
              <input type="radio" id="properly-greet-no" name="properly-greet" value="no" />
              No
            </label>
        </div>
    </div>

     <div class="control-group">
        <label class="control-label">Were the assistants and hygienist's friendly 
            and professional to you and your child?
        </label>
        <div class="controls">
            <label class="radio">
              <input type="radio" id="hygienist-friendly-yes" name="hygienist-friendly" value="yes" checked />
              Yes
            </label>
            <label class="radio">
              <input type="radio" id="hygienist-friendly-no" name="hygienist-friendly" value="no" />
              No
            </label>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Was the doctor professional and courteous to you and your child?</label>
        <div class="controls">
            <label class="radio">
              <input type="radio" id="doctor-friendly-yes" name="doctor-friendly" value="yes" checked />
              Yes
            </label>
            <label class="radio">
              <input type="radio" id="doctor-friendly-no" name="doctor-friendly" value="no" />
              No
            </label>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Did cleanliness of our practice meet your expectations?</label>
        <div class="controls">
            <label class="radio">
              <input type="radio" id="cleanliness-practice-yes" name="cleanliness-practice" value="yes" checked />
              Yes
            </label>
            <label class="radio">
              <input type="radio" id="cleanliness-practice-no" name="cleanliness-practice" value="no" />
              No
            </label>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Were your financial matters handled in a timely and well addressed manner?</label>
        <div class="controls">
            <label class="radio">
              <input type="radio" id="financial-matters-yes" name="financial-matters" value="yes" checked />
              Yes
            </label>
            <label class="radio">
              <input type="radio" id="financial-matters-no" name="financial-matters" value="no" />
              No
            </label>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Would you refer your friends and family to us?</label>
        <div class="controls">
            <label class="radio">
              <input type="radio" id="refer-friend-yes" name="refer-friend" value="yes" checked />
              Yes
            </label>
            <label class="radio">
              <input type="radio" id="refer-friend-no" name="refer-friend" value="no" />
              No
            </label>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label">How could we make your visit better?</label>
        <div class="controls">
            <textarea rows="4" id="helpful-comments" name="helpful-comments"></textarea>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Please feel free to share positive comments here</label>
        <div class="controls">
            <textarea rows="4" id="positive-comments" name="positive-comments"></textarea>
        </div>
    </div>

    <div class="controls">
        <button type="submit" id="submit-button" class="btn btn-primary">Submit</button>
        <button type="button" id="reset-button" class="btn">Reset</button>
    </div>

</form>