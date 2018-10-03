<?php

    ob_start();

    session_start();

    include_once("../../inc-global.php");



if(!isset($_SESSION['username']) || $_SESSION['username'] == '' || $_SESSION['role'] == '' )

{

	header("Location:../index.php");

}

$page = "admin-register";

$userRole =  $_SESSION['role'];

?>

<!DOCTYPE html>

<html dir="ltr" lang="en-US">
<head>
<?php include_once("../../inc-head.php") ?>
<?php include_once("../inc-head-admin.php") ?>
<title><?php echo $sitename;?> Apply Data</title>
</head>

<!-- Document Title -->

<body id="<?php echo $page;?>" class="stretched admin">

<!-- Document Wrapper -->

<div id="wrapper" class="clearfix">
  <?php include_once("../inc-header-admin.php") ?>
  
  <!-- Content -->
  
  <div id="data" class="clearfix">
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 center">
        <h1><?php echo $sitename;?> Apply</h1>
        <?php



				include '../../include/db.php';	



				$res=mysqli_query($connection,"select * from apply"); ?>
        <div class='data-table-wrapper'>
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark"> </div>
              <div class="tools"> </div>
            </div>
            <div class="portlet-body">
              <table class="table table-striped table-bordered table-hover" id="table-contact">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>College</th>
                    <th>Course</th>
                    <th>Address</th>
                    <th>PIN Code</th>
                    <th>Email ID</th>
                    <th>Mobile</th>
                    <th>Twitter</th>
                    <th>Facebook</th>
                    <th>Career Interest</th>
                    <th>Achievements</th>
                    <th>Why do you want to join this program?</th>
                    <th>Your passion for women’s rights in India</th>
                    <th>UTM Source</th>
                    <th>UTM Medium</th>
                    <th>UTM Campaign</th>
                    <th>UTM Content</th>
                    <th>UTM Term</th>
                    <th>UTM Initial Referrer</th>
                    <th>UTM Last Referrer</th>
                    <th>UTM Landing Page</th>
                    <th>UTM Visits</th>
                    <th>Date of Registration</th>
                  </tr>
                </thead>
                <?php if($res)

					{ 

						$sno = 1;

					?>
                <tbody>
                  <?php while($row=mysqli_fetch_array($res)) 



						{ ?>
                  <tr>
                    <td><?php echo $sno; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['college']; ?></td>
                    <td><?php echo $row['course']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['pincode']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['twitter']; ?></td>
                    <td><?php echo $row['facebook']; ?></td>
                    <td><?php echo $row['careerinterest']; ?></td>
                    <td><?php echo $row['achievements']; ?></td>
                    <td><?php echo $row['joinprogram']; ?></td>
                    <td><?php echo $row['womensrights']; ?></td>
                    <td><?php echo $row['utm_source']; ?></td>
                    <td><?php echo $row['utm_medium']; ?></td>
                    <td><?php echo $row['utm_campaign']; ?></td>
                    <td><?php echo $row['utm_content']; ?></td>
                    <td><?php echo $row['utm_term']; ?></td>
                    <td><?php echo $row['utm_initial_referrer']; ?></td>
                    <td><?php echo $row['utm_last_referrer']; ?></td>
                    <td><?php echo $row['utm_landing_page']; ?></td>
                    <td><?php echo $row['utm_visite']; ?></td>
                    <td><?php echo $row['dateofreg']; ?></td>
                  </tr>
                  <?php

						$sno++;

						} ?>
                </tbody>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!--46-->
  
  <?php include_once("../inc-foot-admin.php") ?>
</div>

<!-- #wrapper end -->

<?php include_once("../inc-foot-scripts-admin.php") ?>
</body>
</html>