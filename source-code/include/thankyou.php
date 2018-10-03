<?php 

	$page = "thankyou";

?>

<!DOCTYPE html>

<html dir="ltr" lang="en-US">

<head>

<?php include_once("../inc-head.php") ?>

<meta http-equiv="refresh" content="5;URL='<?php echo $siteurl; ?>'" />

<title>Thank You | <?php echo $sitename; ?></title>

</head>



<body id="<?php echo $page; ?>" class="stretched">

	<div id="wrapper" class="clearfix">
	<?php include_once("../inc-header.php") ?>
        <div class="inner-page-banner center clearfix">
            <h1 class="inner-page-title message-success">
            <?php
                if ($reg=="success") {	
                echo 'We have successfully received your information and one of our representative shall get back to you with more information.';
                }
            ?>
        </h1>
            <span class="inner-page-banner-block"></span>	
        </div>
	<?php include_once("../inc-footer.php") ?>
</div>
<?php include_once("../inc-foot-scripts.php") ?>

</body>

</html>