<?php

	$url = "http://example.com/formfolder/";

	$site = "live";

	$mode ='live';/*'test'*/

	$sitename="National Students Union of India";

	$utmsource="National Students Union of India";

	$user="db_user_name_goes_here";

	$password="db_password_goes_here";

	$database="db_name_goes_here";

	$whatsappurl="";

	$facebookurl="";

	$twitterurl="";

	$twitterhandle="";

	$linkedinurl="";

	$googleurl="";

	$youtubeurl="";

	$instagramurl="";

	$pinteresturl="";

	$sendemailid="noreply@example.com";

	$emailsendername="National Students Union of India";

	$copyrightname="National Students Union of India";

	/*$gmapsapi="AIzaSyDZJFcTFP6f0sgvuE54Zrnt3ePoVe3dBj0";*//*AIzaSyDMxJ92oBkSnVNHFX3R8XhtYQPEgk1_IiI*/

	$gatype="";/*new / old*/

	$ga="";/*UA-XXXXXXXXX-1*/

	$grmid="";/*111111111*/

	$grmlabel="";/*XXXXXXXXXXXXXX*/

	$glcid="";/*111111111*/

	$glclabel="";/*XXXXXXXXXXXXXX*/

	$fbpixel="";/*111111111111111*/

	$tcampaign="";/*XXXX*/

	$timg="";/*//trc.taboola.com/XXXXXXXXXXX/log/3/mark?marking-type=XXXX&item-url=*/

	$tcimg="";/*//trc.taboola.com/XXXXXXXXXXX/log/3/action?name=XXXX&item-url=*/

	$tfa="";/*//cdn.taboola.com/libtrc/XXXXXXXXXXX/tfa.js*/

	/*email*/

	$bcc1="nsuiwomenleadership@gmail.com";

	$bcc2="email@example.com";

	$testbcc1="email@example.com";

	$testbcc2="email@example.com";

	$emailSubject = 'Information Received Successfully';

	/*email configuration*/

	$emailHostName = 'mail.example.com';

	$emailUserName = 'noreply@example.com';

	$emailUserPassword = 'password';

	$emailSMTPSecure = ''; /*TLS / SSL*/

	$emailPort = 25; /*25 / 465 / 587*/

	$mailmessage="We have received your information and one of our representative shall get back to you.";

	$thankyoupagemessage="We have successfully received your information and one of our representative shall get back to you with more information.";

	$reg = isset($_GET['reg']) ? $_GET['reg'] : '';

	if ($site == "live"){

		$siteurl = $url;
		
		}

		else {

			$siteurl = $url.$site."/";

			$bcc1 = $testbcc1;

			$ga = "";

			$grmid="";

			$grmlabel="";

			$glcid="";

			$glclabel="";

			$fbpixel="";

			$tcampaign="";

			$timg="";

			$tcimg="";

			$tfa="";

		}

		$thankyou = $siteurl."include/thankyou.php";

		$emailimg = $siteurl."images/email/";

?>