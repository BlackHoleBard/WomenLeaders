<?php
	$page = "home";
?>

<!DOCTYPE html>

<html dir="ltr" lang="en-US">
<head>
<?php include_once("inc-head.php") ?>
</head>

<body id="<?php echo $page; ?>" class="stretched">
<div id="wrapper" class="clearfix">
  <section id="content" class="clearfix">
    <div class="content-wrap">
		<div class="banner">
        	<img class="hidden-xs hidden-sm" src="<?php echo $siteurl;?>images/banner.jpg" alt="Banner"/>
            <img class="hidden-md hidden-lg" src="<?php echo $siteurl;?>images/banner-res.jpg" alt="Banner"/>
        </div>
        <div class="container">
        	<?php if(isset($_POST['reg']) && $_POST['reg'] != ''){ ?>
			<?php if($_POST['reg'] == 'validation-error') { ?>
            
            <div id="toast">Your data could not be validated.Please try again.</div>
            <?php }	if($_POST['reg'] == 'file-upload-error') { ?>
            <div id="toast">Resume could not be uploaded. Please try again.</div>
            <?php } 	if($_POST['reg'] == 'data-insertion-error') { ?>
            <div id="toast">Your data could not be submitted. Please try again.</div>
            <?php } 	if($_POST['reg'] == 'email-error') { ?>
            <div id="toast" data-class="suc">Thank you, we successfully received your data, but unfortunately confirmation email could not be sent.</div>
            <?php }} ?>
            
            <form action="<?php echo $siteurl; ?>include/apply.php" method="post" enctype="multipart/form-data" novalidate class="" name="contact-form" id="contact-form">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-form">
                        <input type="text" id="" name="name" value="" class="sm-form-control name" autocomplete="off" required placeholder="Name*">
                        <span class="errmsg serrmsg"></span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-form">
                        <input type="number" id="" name="age" value="" class="sm-form-control age" autocomplete="off" required placeholder="Age*">
                        <span class="errmsg serrmsg"></span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-form">
                        <input type="text" id="" name="course" value="" class="sm-form-control course" autocomplete="off" required placeholder="Course*">
                        <span class="errmsg serrmsg"></span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-form">
                        <input type="text" id="" name="college" value="" class="sm-form-control college" autocomplete="off" required placeholder="College*">
                        <span class="errmsg serrmsg"></span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-form">
                        <input type="text" id="" name="pincode" value="" class="sm-form-control numeric pincode" autocomplete="off" required placeholder="PIN Code*" maxlength="6" />
                        <span class="errmsg serrmsg"></span>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-form">
                        <textarea class="sm-form-control address" name="address" placeholder="Address*" required></textarea>	
                        <span class="errmsg serrmsg"></span>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-form">
                      <input type="email" id="" name="email" value="" class="sm-form-control email" autocomplete="off" required placeholder="Email Address*">
                      <span class="errmsg serrmsg"></span> </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-form">
                      <input type="tel" id="phone" name="phone" value="" class="sm-form-control numeric phone" placeholder="Phone No.*" autocomplete="off" pattern="^[0-9]{6,14}$" required maxlength="10" />
                      <span class="errmsg serrmsg"></span> </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-form">
                        <input type="text" id="" name="twitter" value="" class="sm-form-control twitter" autocomplete="off" placeholder="Twitter">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-form">
                        <input type="text" id="" name="facebook" value="" class="sm-form-control facebook" autocomplete="off" placeholder="Facebook">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-form">
                        <span class="form-label">Career Interest</span>
                        <div class="form-checkbox">
                            <input id="media" class="checkbox-style" name="careerinterest[]" value="Media" type="checkbox" checked />
                            <label for="media" class="checkbox-style-3-label">Media</label>
                            <input id="politics" class="checkbox-style" name="careerinterest[]" value="Politics" type="checkbox" />
                            <label for="politics" class="checkbox-style-3-label">Politics</label>
                            <input id="law" class="checkbox-style" name="careerinterest[]" value="Law" type="checkbox" />
                            <label for="law" class="checkbox-style-3-label">Law</label>
                            <input id="activism" class="checkbox-style" name="careerinterest[]" value="Activism" type="checkbox" />
                            <label for="activism" class="checkbox-style-3-label">Activism</label>
                            <input id="aculture" class="checkbox-style" name="careerinterest[]" value="Arts & Culture" type="checkbox" />
                            <label for="aculture" class="checkbox-style-3-label">Arts &amp; Culture</label>
                            <input id="centrepreneurship" class="checkbox-style" name="careerinterest[]" value="Commerce & Entrepreneurship" type="checkbox" />
                            <label for="centrepreneurship" class="checkbox-style-3-label">Commerce &amp; Entrepreneurship</label>
                            <input id="cservices" class="checkbox-style" name="careerinterest[]" value="Civil Services" type="checkbox" />
                            <label for="cservices" class="checkbox-style-3-label">Civil Services</label>
                            <input id="hdecided" class="checkbox-style" name="careerinterest[]" value="Haven’t Decided" type="checkbox" />
                            <label for="hdecided" class="checkbox-style-3-label">Haven’t Decided</label>
                            <input id="other" class="checkbox-style" name="careerinterest[]" value="Other" type="checkbox" />
                            <label for="other" class="checkbox-style-3-label">Other</label>
                        </div>
                        <?php /*?><div class="col-form-input">
                            <input type="text" id="" name="careerinterest[]" value="" class="sm-form-control ciother" autocomplete="off"  placeholder="Other">
                        </div><?php */?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-form">
                        <input type="text" id="" name="achievements" value="" class="sm-form-control achievements" autocomplete="off"  placeholder="Achievements (if any)">
                        <span class="errmsg serrmsg"></span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-form">
                        <textarea name="joinprogram" value="" class="sm-form-control joinprogram" placeholder="Why do you want to join this program? (400 words)"></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-form">
                        <textarea name="womensrights" value="" class="sm-form-control womensrights" placeholder="Your passion for women’s rights in India"></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-form-btn">
                      <button id="apply_submit" class="theme-btn contact-submit" value="submit" type="submit"><span>Submit</span></button>
                    </div>
                </div>
            </form>

        </div>
    </div>
  </section>
  <?php include_once("inc-footer.php") ?>
</div>
<?php include_once("inc-foot-scripts.php") ?>
</body>
</html>