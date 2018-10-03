<?php /*?><div id="gotoTop" class="icon-angle-up"></div><?php */?>
<script type="text/javascript" src="<?php echo $siteurl; ?>js/all-js.js"></script>

<?php /*?><script type="text/javascript" src="<?php echo $siteurl; ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $siteurl; ?>js/plugins.js"></script>
<script type="text/javascript" src="<?php echo $siteurl; ?>js/functions.js"></script>
<script type="text/javascript" src="<?php echo $siteurl; ?>js/utm_form-1.0.4.min.js"></script><?php */?>



<script>

$(document).keydown( function(eventObject) {

	if(eventObject.which==37) {//left arrow

	$('.owl-prev').click();//emulates click on prev button

	} else if(eventObject.which==39) {//right arrow

	$('.owl-next').click();//emulates click on next button

	}

} );

</script>
<script>

$('.form-icon').on('click', function() {

   $('body').addClass('show-form-overlay');

   $('.form-close-icon').addClass('expand');

   $('.form-icon').addClass('expand');

   $('#form-content').addClass('expand');

   $('#form-container').addClass('expand');

}); 

$('#form-close').on('click', function() {

   $('body').removeClass('show-form-overlay');

   $('.form-close-icon').removeClass('expand');

   $('.form-icon').removeClass('expand');

   $('#form-content').removeClass('expand');

   $('#form-container').removeClass('expand');

}); 

</script>
<script type="text/javascript">

/*Validation for numeric field inputs*/

$(".numeric").keydown(function (e) {

	if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||

		(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||	

		(e.keyCode >= 35 && e.keyCode <= 40)) {

		return;

	}

	if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {

		e.preventDefault();

	}

});
$('#apply_submit').click(function() {
	var name = $('.name');
	var age = $('.age');
	var college = $('.college');
	var course = $('.course');
	var address = $('.address');
	var pincode = $('.pincode');
	var email = $('.email');
	var phone = $('.phone');
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	var userNameReg = /^[A-Za-z\-'., ]+$/;
	var mobileNoReg = /^[0]?[789]\d{9}$/;
	var errorStatus = 1;

	if (phone.val().length == 0) {
		$(phone).next().html('Enter Phone Number');
		$(phone).focus();
		errorStatus = 0;
	} else if (!($.isNumeric(phone.val()))) {
		$(phone).next().html('Enter only numbers');
		$(phone).focus();
		errorStatus = 0;
	} else if (phone.val().length != 10) {
		$(phone).next().html('Mobile Phone requires 10 digit');
		$(phone).focus();
		errorStatus = 0;
	} else if (!(mobileNoReg.test(phone.val()))) {
		$(phone).next().html('Provide proper Phone number');
		$(phone).focus();
		errorStatus = 0;
	} else {
		$(phone).next().html('');
	}

	if (email.val().length == 0) {
		$(email).next().html('Enter Email Address');
		$(email).focus();
		errorStatus = 0;
	} else if (!(emailReg.test(email.val()))) {
		$(email).next().html('Enter a valid Email Address');
		$(email).focus();
		errorStatus = 0;
	} else {
		$(email).next().html('');
	}
	
	if (pincode.val().length == 0) {
		$(pincode).next().html('Enter PIN Code');
		$(pincode).focus();
		errorStatus = 0;
	} else if (!($.isNumeric(pincode.val()))) {
		$(pincode).next().html('Enter only numbers');
		$(pincode).focus();
		errorStatus = 0;
	} else if (pincode.val().length != 6) {
		$(pincode).next().html('PIN Code requires 6 digit');
		$(pincode).focus();
		errorStatus = 0;
	}  else {
		$(pincode).next().html('');
	}


	if (address.val().length == 0) {
		$(address).next().html('Enter Address');
		$(address).focus();
		errorStatus = 0;
	}  else {
		$(address).next().html('');
	}
	
	if (course.val().length == 0) {
		$(course).next().html('Enter Course Name');
		$(course).focus();
		errorStatus = 0;
	}  else {
		$(course).next().html('');
	}
	
	if (college.val().length == 0) {
		$(college).next().html('Enter College Name');
		$(college).focus();
		errorStatus = 0;
	}  else {
		$(college).next().html('');
	}
	
	if (age.val().length == 0) {
		$(age).next().html('Enter Age');
		$(age).focus();
		errorStatus = 0;
	}  else {
		$(age).next().html('');
	}
	
	if (name.val().length == 0) {
		$(name).next().html('Enter Name');
		$(name).focus();
		errorStatus = 0;
	} else if (!(userNameReg.test(name.val()))) {
		$(name).next().html('Name should contain only alphabets');
		$(name).focus();
		errorStatus = 0;
	} else {
		$(name).next().html('');
	}

	if(errorStatus == 0) {
		return false;
	} else {
		return true;
	}
});

</script>
<?php if ($site=="live") {

	include("include/inc-trackingcodes.php");

} ?>