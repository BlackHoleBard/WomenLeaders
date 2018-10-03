<?php
    ob_start();
    session_start();
    include_once("../inc-global.php");
	$fail = isset($_GET['fail']) ? $_GET['fail'] : '';
	$page = "adminlogin";
	if(isset($_SESSION['username']))
	{
		header("Location:dashboard.php");
	}
	if(isset($_POST['submit']))
	{
		include '../include/db.php';
		$res=mysqli_query($connection,"SELECT * FROM login WHERE username = '".$_POST['login-form-username']."' AND password = '".$_POST['login-form-password']."'");
		$row=mysqli_fetch_array($res);
		//print_r($row);
		
		$fail=0;
		$success="fail";
		if($_POST['login-form-username'] == $row['username'] && $_POST['login-form-password'] == $row['password']) {
			$success="success";
			$_SESSION['username'] = $row['username'];
			$_SESSION['role'] = $row['role'];
			$userRole = '';
			header('location:dashboard.php');
		} else {
			$success="fail";
			if(!isset($_GET['fail']) && $_GET['fail'] != '') { 
				$fail = 1;
			} else {
				if(ctype_digit($_GET['fail'])) {
					$fail = $_GET['fail'] + 1;
				} else {
					$fail = 1;
				}
			}
			if($fail > 3) {
				header('location:../index.php');
			} else {
				header('location:index.php?fail='.$fail.'');
			}
		}
	}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head><?php include_once("../inc-head.php") ?>
<?php include_once("inc-head-admin.php") ?>
<title>Admin Panel Login</title>
</head>
<!-- Document Title -->
<body id="<?php echo $page;?>" class="stretched admin">
<!-- Document Wrapper -->
<div id="wrapper" class="clearfix"> 
	<?php include_once("inc-header-admin.php") ?>
	<!-- Content --> 
	<div id="data">
		<div class="container clearfix">
		  <div class="row clearfix">
			<div class="col-lg-12 col-md-12 center">
			  <h1>Admin Login</h1>
			  <div class="show-form clearfix">
				<div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-12 form-wrapper">
				  <form class="leadform nomargin clearfix" id="login-form" name="login-form" action="#" method="post">
					<div class="register-wrap">
					  <?php
						if ($fail==1) {
							echo '<h5 class="message-fail">Please try again.</h5>';
						}
					  ?>
					  <div class="row clearfix">
						<div class="col-sm-12">
						  <div class="form-group required">
							<label for="login-form-username" class="capitalize t600">Username*</label>
							<input type="text" id="login-form-username" name="login-form-username" value="" class="sm-form-control" required />
						  </div>
						</div>
						<div class="col-sm-12">
						  <div class="form-group required">
							<label for="login-form-password" class="capitalize t600">Password*</label>
							<input class="sm-form-control" type="password" id="login-form-password" name="login-form-password" value="" required />
						  </div>
						</div>
						<div class="col-sm-12">
						  <div class="btn-wrap center">
							<button type="submit" class="t400 capitalize button button-border button-reveal schedule-btn tright" name="submit" value="login" id="login-form-submit"><i class="icon-line2-key"></i><span>Login</span></button>
						  </div>
						</div>
					  </div>
					</div>
				  </form>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	</div>
	<?php include_once("inc-foot-admin.php") ?>	
</div>
<!-- #wrapper end --> 
<?php include_once("inc-foot-scripts-admin.php") ?>
</body>
</html>