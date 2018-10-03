<?php include_once("../inc-global.php");

date_default_timezone_set('Asia/Kolkata');

$referrer = $_SERVER['HTTP_REFERER'];

if(isset($_POST) && !empty($_POST)) {

	include 'db.php';
	$name = (isset($_POST['name'])) ? mysqli_real_escape_string($connection, $_POST['name']) : '';
	$age = (isset($_POST['age'])) ? mysqli_real_escape_string($connection, $_POST['age']) : '';
	$course = (isset($_POST['course'])) ? mysqli_real_escape_string($connection, $_POST['course']) : '';
	$college = (isset($_POST['college'])) ? mysqli_real_escape_string($connection, $_POST['college']) : '';
	$pincode = (isset($_POST['pincode'])) ? mysqli_real_escape_string($connection, $_POST['pincode']) : '';
	$address = (isset($_POST['address'])) ? mysqli_real_escape_string($connection, $_POST['address']) : '';
	$email = (isset($_POST['email'])) ? mysqli_real_escape_string($connection, $_POST['email']) : '';
	$phone = (isset($_POST['phone'])) ? mysqli_real_escape_string($connection, $_POST['phone']) : '';
	$twitter = (isset($_POST['twitter'])) ? mysqli_real_escape_string($connection, $_POST['twitter']) : '';
	$facebook = (isset($_POST['facebook'])) ? mysqli_real_escape_string($connection, $_POST['facebook']) : '';
	if(isset($_POST['careerinterest']))
	{
		$careerinterest = array();
			foreach($_POST['careerinterest'] as $val)
		{
			$careerinterest[] = $val;
		}
		$careerinterest = implode(', ', $careerinterest);
	}
	$achievements = (isset($_POST['achievements'])) ? mysqli_real_escape_string($connection, $_POST['achievements']) : '';
	$joinprogram = (isset($_POST['joinprogram'])) ? mysqli_real_escape_string($connection, $_POST['joinprogram']) : '';
	$womensrights = (isset($_POST['womensrights'])) ? mysqli_real_escape_string($connection, $_POST['womensrights']) : '';

	//UTM Source Data
	$utm_source = (isset($_POST['USOURCE'])) ? mysqli_real_escape_string($connection, trim($_POST['USOURCE'])) : '';
	$utm_medium = (isset($_POST['UMEDIUM'])) ? mysqli_real_escape_string($connection, trim($_POST['UMEDIUM'])) : '';
	$utm_campaign = (isset($_POST['UCAMPAIGN'])) ? mysqli_real_escape_string($connection, trim($_POST['UCAMPAIGN'])) : '';
	$utm_content = (isset($_POST['UCONTENT'])) ? mysqli_real_escape_string($connection, trim($_POST['UCONTENT'])) : '';
	$utm_term = (isset($_POST['UTERM'])) ? mysqli_real_escape_string($connection, trim($_POST['UTERM'])) : '';
	$utm_initial_referrer = (isset($_POST['IREFERRER'])) ? mysqli_real_escape_string($connection, trim($_POST['IREFERRER'])) : '';
	$utm_last_referrer = (isset($_POST['LREFERRER'])) ? mysqli_real_escape_string($connection, trim($_POST['LREFERRER'])) : '';
	$utm_landing_page = (isset($_POST['ILANDPAGE'])) ? mysqli_real_escape_string($connection, trim($_POST['ILANDPAGE'])) : '';
	$utm_visits = (isset($_POST['VISITS'])) ? mysqli_real_escape_string($connection, trim($_POST['VISITS'])) : '';

	//Validation begins



	$errorStatus = 0;

	$errmsg = '';

	

	if($name == "") {
		$errorStatus = 1;
		$errmsg .= 'Name is required. ';
	} else if(!preg_match("/^[A-Za-z\-'., ]+$/", $name)) {
		$errorStatus = 1;
		$errmsg .= 'Enter a valid name. Only Alphabets accepted. ';
	}



	if($phone == "") {

		$errorStatus = 1;

		$errmsg .= 'Mobile Number is required. ';

	} else if(!ctype_digit($phone)) {

		$errorStatus = 1;

		$errmsg .= 'Mobile Number should be numberic. ';

	} else if(strlen($phone) != 10) {

		$errorStatus = 1;

		$errmsg .= 'Mobile Number should contain 10 digits. ';

	} else if(!preg_match("/^[0]?[789]\d{9}$/", $phone)) {

		$errorStatus = 1;

		$errmsg .= 'Provide proper mobile number. ';

	}



	if($email == "") {

		$errorStatus = 1;

		$errmsg .= 'Email Address is required. ';

	} else if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)) {

		$errorStatus = 1;

		$errmsg .= 'Enter a valid Email Address.'; 

	}

	if($errorStatus == 0) {		

		function getBrowser() {

			$u_agent = $_SERVER['HTTP_USER_AGENT'];

			$bname = 'Unknown';

			$platform = 'Unknown';

			$version= "";

			if (preg_match('/linux/i', $u_agent)) {

				$platform = 'linux';

			} elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {

				$platform = 'mac';

			} elseif (preg_match('/windows|win32/i', $u_agent)) {

				$platform = 'windows';

			} if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) {

				$bname = 'Internet Explorer';

				$ub = "MSIE";

			} elseif(preg_match('/Firefox/i',$u_agent)) {

				$bname = 'Mozilla Firefox';

				$ub = "Firefox";

			} elseif(preg_match('/Chrome/i',$u_agent)) {

				$bname = 'Google Chrome'; 

				$ub = "Chrome";

			} elseif(preg_match('/Safari/i',$u_agent)) {

				$bname = 'Apple Safari';

				$ub = "Safari";

			} elseif(preg_match('/Opera/i',$u_agent)) {

				$bname = 'Opera';

				$ub = "Opera";

			} elseif(preg_match('/Netscape/i',$u_agent)) {

				$bname = 'Netscape';

				$ub = "Netscape";

			}

			$known = array('Version', $ub, 'other');

			$pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';



			if (!preg_match_all($pattern, $u_agent, $matches)) { }



			$i = count($matches['browser']);



			if ($i != 1) {

				if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){

					$version= $matches['version'][0];

				} else { 

					$version= $matches['version'][1];

				}

			} else {

				$version= $matches['version'][0];

			}

			if ($version==null || $version=="") { $version="?"; }



			return array(

				'userAgent' => $u_agent,

				'name'      => $bname,

				'version'   => $version,

				'platform'  => $platform,

				'pattern'    => $pattern

			);

		}


		$ua=getBrowser();

			$browsername=$ua['name'];

			$browserversion=$ua['version'];

			$browserplatform=$ua['platform'];

			$ip_address=$_SERVER['REMOTE_ADDR'];

			

			$dateofreg = date('d-m-Y H:i:s');



				$sql = "INSERT INTO apply (name,age,course,college,pincode,address,email,phone,twitter,facebook,careerinterest,achievements,joinprogram,womensrights,utm_source,utm_medium,utm_campaign,utm_content,utm_term,utm_initial_referrer,utm_last_referrer,utm_landing_page,utm_visits,browsername,browserversion,browserplatform,ip_address,dateofreg) values('$name','$age','$course','$college','$pincode','$address','$email','$phone','$twitter','$facebook','$careerinterest','$achievements','$joinprogram','$womensrights','$utm_source','$utm_medium','$utm_campaign','$utm_content','$utm_term','$utm_initial_referrer','$utm_last_referrer','$utm_landing_page','$utm_visits','$browsername','$browserversion','$browserplatform','$ip_address','$dateofreg')";



			if($connection->query($sql)) {

				require_once('phpmailer/class.phpmailer.php');

				require_once('phpmailer/PHPMailerAutoload.php');

				$mail = new PHPMailer();

				$mail->isSMTP();

				$mail->Host = $emailHostName;  // Specify main and backup server

				$mail->SMTPDebug  = 0;

				$mail->SMTPAuth = true; // Enable SMTP authentication

				$mail->Username = $emailUserName; // SMTP username

				$mail->Password = $emailUserPassword; // SMTP password

				$mail->SMTPSecure = $emailSMTPSecure;   

				$mail->Port = $emailPort;

				

				$subject = $emailsendername.' | ' . $emailSubject;



				$toemail =  $email;



				$toname = $name;



				$mail->setFrom($sendemailid,$emailsendername);



				$mail->addAddress($toemail,$toname);



				if($bcc1 != '') { $mail->addBCC($bcc1,$emailsendername); }

				if($bcc2 != '') { $mail->addBCC($bcc2,$emailsendername); }



				$mail->Subject = $subject;



				$name = isset($name) ? "$name" : '';
				$age = isset($age) ? "$age" : '';
				$course = isset($course) ? "$course" : '';
				$college = isset($college) ? "$college" : '';
				$pincode = isset($pincode) ? "$pincode" : '';
				$address = isset($address) ? "$address" : '';
				$email = isset($email) ? "$email" : '';
				$phone = isset($phone) ? "$phone" : '';
				$twitter = isset($twitter) ? "$twitter" : '';
				$facebook = isset($facebook) ? "$facebook" : '';
				$careerinterest = isset($careerinterest) ? "$careerinterest" : '';
				$achievements = isset($achievements) ? "$achievements" : '';
				$joinprogram = isset($joinprogram) ? "$joinprogram" : '';
				$womensrights = isset($womensrights) ? "$womensrights" : '';

				$body = "<table width='100%' border='0'>

				  <tr>

					<td align='center'><table style='max-width:600px;margin:0 auto;width:100%; background-color:#f4f4f4; padding:13px;' cellpadding='0' cellspacing='0' border='0' width='600px'>

						<tbody style='background-color:#fff;'>

						  <tr>

							<a href='".$siteurl."' style='text-decoration:none;vertical-align:top;' target='_blank'>

									<img src='".$emailimg."newbanner.jpg' width='600' alt='".$emailsendername."' style='border-bottom: 12px solid #f4f4f4;'>

								</a>

						  </tr>

						  <tr>

							<td style='padding:30px;'><div style='font-size:26px;font-weight:bold;text-align:center;color:#000000;margin-bottom:20px;font-family:Tahoma, Geneva, sans-serif;'> Thank You, ".$name.".</div></td>

						  </tr>

						  <tr>

							<td>

								<table width='100%' border='0' cellspacing='0' cellpadding='0' style='max-width: 420px;margin: 0 auto;'>

									<tr>

									  <td style='border-bottom:1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;font-weight: bold;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>Name</td>
									  <td style='border-bottom: 1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>".$name."</td>
									</tr>
									<tr style='height: 5px;line-height: 0;'>
									  <td colspan='2'>&nbsp;</td>
									</tr>

									<tr>
									  <td style='border-bottom:1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;font-weight: bold;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>Age</td>
									  <td style='border-bottom: 1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>".$age."</td>
									</tr>

									<tr style='height: 5px;line-height: 0;'>

									  <td colspan='2'>&nbsp;</td>

									</tr>

									<tr>
									  <td style='border-bottom:1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;font-weight: bold;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>Course</td>
									  <td style='border-bottom: 1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>".$course."</td>
									</tr>
									<tr style='height: 5px;line-height: 0;'>
									  <td colspan='2'>&nbsp;</td>
									</tr>
									<tr>
									  <td style='border-bottom:1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;font-weight: bold;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>College</td>
									  <td style='border-bottom: 1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>".$college."</td>
									</tr>
									<tr style='height: 5px;line-height: 0;'>
									  <td colspan='2'>&nbsp;</td>
									</tr>
									<tr>
									  <td style='border-bottom:1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;font-weight: bold;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>PIN Code</td>
									  <td style='border-bottom: 1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>".$pincode."</td>
									</tr>
									<tr style='height: 5px;line-height: 0;'>
									  <td colspan='2'>&nbsp;</td>
									</tr>
									
									<tr>
									  <td style='border-bottom:1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;font-weight: bold;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>Address</td>
									  <td style='border-bottom: 1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>".$address."</td>
									</tr>
									<tr style='height: 5px;line-height: 0;'>
									  <td colspan='2'>&nbsp;</td>
									</tr>
									
									<tr>
									  <td style='border-bottom:1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;font-weight: bold;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>Email ID</td>
									  <td style='border-bottom: 1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>".$email."</td>
									</tr>
									<tr style='height: 5px;line-height: 0;'>
									  <td colspan='2'>&nbsp;</td>
									</tr>
									<tr>
									  <td style='border-bottom:1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;font-weight: bold;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>Mobile</td>
									  <td style='border-bottom: 1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>".$phone."</td>
									</tr>
									<tr style='height: 5px;line-height: 0;'>
									  <td colspan='2'>&nbsp;</td>
									</tr>
									<tr>
									  <td style='border-bottom:1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;font-weight: bold;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>Twitter</td>
									  <td style='border-bottom: 1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>".$twitter."</td>
									</tr>
									<tr style='height: 5px;line-height: 0;'>
									  <td colspan='2'>&nbsp;</td>
									</tr>
									<tr>
									  <td style='border-bottom:1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;font-weight: bold;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>Facebook</td>
									  <td style='border-bottom: 1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>".$facebook."</td>
									</tr>
									<tr style='height: 5px;line-height: 0;'>
									  <td colspan='2'>&nbsp;</td>
									</tr>
									<tr>
									  <td style='border-bottom:1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;font-weight: bold;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>Career Interest</td>
									  <td style='border-bottom: 1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>".$careerinterest."</td>
									</tr>
									<tr style='height: 5px;line-height: 0;'>
									  <td colspan='2'>&nbsp;</td>
									</tr>
									<tr>
									  <td style='border-bottom:1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;font-weight: bold;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>Achievements</td>
									  <td style='border-bottom: 1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>".$achievements."</td>
									</tr>
									<tr style='height: 5px;line-height: 0;'>
									  <td colspan='2'>&nbsp;</td>
									</tr>
									<tr>
									  <td style='border-bottom:1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;font-weight: bold;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>Why do you want to join this program?</td>
									  <td style='border-bottom: 1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>".$joinprogram."</td>
									</tr>
									<tr style='height: 5px;line-height: 0;'>
									  <td colspan='2'>&nbsp;</td>
									</tr>
									<tr>
									  <td style='border-bottom:1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;font-weight: bold;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>Your passion for women’s rights in India</td>
									  <td style='border-bottom: 1px solid #E4E4E4;font-size: 15px;padding-top: 9px;padding-bottom:9px;width: 50%;color: #999999;font-family: Tahoma,Geneva,sans-serif;'>".$womensrights."</td>
									</tr>
									<tr style='height: 5px;line-height: 0;'>
									  <td colspan='2'>&nbsp;</td>
									</tr>
							  </table>

							</td>

						  </tr>

						  <tr>

							<td style='padding:30px;'><div style='font-size:14px;text-align:center;color:#000000;margin-bottom:20px;font-family:Tahoma, Geneva, sans-serif;'>".$mailmessage."</div></td>

						  </tr>

						  <tr>

							<td><table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#F4F4F4' style='padding-bottom:17px;'>

								<tbody>

								  <tr>

									<td><table width='100%' cellspacing='0' cellpadding='0' border='0' style='padding:30px 4% 0px 4%;'>

										<tbody>

										  <tr>

											<td width='100%' align='center' style='padding-bottom: 15px;font-family: Tahoma,Geneva,sans-serif;'>&copy; ".date("Y")." ".$copyrightname."</td>

										  </tr>";

										if($facebookurl == "" && $twitterurl == "" && $linkedinurl == "" && $googleurl == "" && $youtubeurl == "" && $instagramurl == ""){}else{

										$body .= "

										  <tr>

											<td width='100%' align='center'>";

												if($facebookurl != ""){ 

												$body .= "<a href='".$facebookurl."' style='text-decoration:none;margin-left:0;display:inline-block; vertical-align:top;' target='_blank'><img src='".$emailimg."facebook.png' width='32' alt='Like us on Facebook'></a>";

												 }

												if($twitterurl != ""){ 

												$body .= "<a href='".$twitterurl."' style='text-decoration:none;margin-left:6px;display:inline-block;vertical-align:top;' target='_blank'><img src='".$emailimg."twitter.png' width='32' alt='Follow us on Twitter'></a>";

												}

												if($instagramurl != ""){ 

												$body .= "<a href='".$instagramurl."' style='text-decoration:none;margin-left:6px;display:inline-block;vertical-align:top;' target='_blank'><img src='".$emailimg."instagram.png' width='32' alt='Follow us on Instagram'></a>";

												}

												if($youtubeurl != ""){ 

												$body .= "<a href='".$youtubeurl."' style='text-decoration:none;margin-left:6px;display:inline-block;vertical-align:top;' target='_blank'><img src='".$emailimg."youtube.png' width='32' alt='Subscribe on Youtube'></a>";

												}

												if($linkedinurl != ""){ 

												$body  .= "<a href='".$linkedinurl."' style='text-decoration:none;margin-left:6px;display:inline-block;vertical-align:top;' target='_blank'><img src='".$emailimg."linkedin.png' width='32' alt='Join us on Linkedin'></a>";

												}

												if($googleurl != ""){ 

												$body .= "<a href='".$googleurl."' style='text-decoration:none;margin-left:6px;display:inline-block;vertical-align:top;' target='_blank'><img src='".$emailimg."google.png' width='32' alt='Join us on Google+'></a>";

												}

											$body .= "</td>

										  </tr>";

										}

										$body .= "</tbody>

									  </table>

									</td>

								  </tr>

								</tbody>

							  </table>

							 </td>

						  </tr>

						</tbody>

					  </table>

					 </td>

				  </tr>

				</table>";

				$mail->MsgHTML($body);

				$sendEmail = $mail->Send();

				if( $sendEmail == true ) {

					if($mode != 'test') {

						echo '<script>window.location="'.$thankyou.'?reg=success"</script>';

					} else {

						echo 'Success';

					}

				} else {

					if($mode != 'test') {

						echo '<script>window.location="'.$referrer.'?reg=email-error"</script>';

					} else {

						echo 'Email Fails <br/>';

						echo $mail->ErrorInfo;

					}

				}

			} else {

				if($mode != 'test') {

					echo '<script>window.location="'.$referrer.'?reg=data-insertion-error"</script>';

				} else {

					echo 'Data fails to insert into DB <br/>';

					echo $connection->error;

				}

			}

		} else {

		if($mode != 'test') {

			echo '<script>window.location="'.$referrer.'?reg=validation-error"</script>';

		} else {

			echo 'Validation fails<br/>'.$errmsg;

		}

	}

} else  {

	if($mode != 'test') {

		echo '<script>window.location="'.$referrer.'?reg=fail"</script>';

	} else {

		echo 'Fails totally';

	}

} ?>