<?php
    ob_start();
    session_start();
    include_once("../inc-global.php");
	if(!isset($_SESSION['username']))
	{
		header("Location:index.php");
	}
	$page = "admin-contact";
	$userRole =  $_SESSION['role'];
?>

<!DOCTYPE html>

<html dir="ltr" lang="en-US">
<head>
<?php include_once("../inc-head.php") ?>
<?php include_once("inc-head-admin.php") ?>
<title>Admin Dashboard</title>
</head>

<body id="<?php echo $page;?>" class="stretched admin">
<div id="wrapper" class="clearfix">
  <?php include_once("inc-header-admin.php") ?>
  <div id="data">
    <div class="container clearfix">
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 center">
          <h1>
            <?php if($userRole == 1) echo 'Super '; ?>
            Admin Dashboard</h1>
          <?php
				include '../include/db.php';
				$applyQuery = "SELECT count(*) AS count FROM `apply`";
				$applyCount = mysqli_fetch_assoc(mysqli_query($connection, $applyQuery));
			 ?>
          <div class="row dashboard clearfix">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-export">
              <div class="export-detail">
                <h2 class="huge"><a href="<?php echo $siteurl; ?>admin/apply/view.php"><?php echo $applyCount['count']; ?></a></h2>
                <h3 class="export-page-name"><a href="<?php echo $siteurl; ?>admin/apply/view.php">Apply</a></h3>
                <h5 class="export-link"><a href="<?php echo $siteurl; ?>admin/export-apply.php">Export</a></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once("inc-foot-admin.php") ?>
</div>
<?php include_once("inc-foot-scripts-admin.php") ?>
</body>
</html>