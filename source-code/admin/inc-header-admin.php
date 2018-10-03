<header id="header" class="full-header no-sticky">
  <div id="header-wrap">
    <div class="container clearfix">
      <div id="primary-menu-trigger"><i class="icon-line-menu"></i></div>
      
      <!-- Logo -->
      
      <div id="logo"> <a href="<?php echo $siteurl; ?>admin/dashboard.php" class="standard-logo" data-dark-logo="<?php echo $siteurl; ?>image/logo.png"><img src="<?php echo $siteurl; ?>images/logo.png" alt="Logo"></a> <a href="<?php echo $siteurl; ?>admin/dashboard.php" class="retina-logo" data-dark-logo="<?php echo $siteurl; ?>image/logo@2x.png"><img src="<?php echo $siteurl; ?>images/logo@2x.png" alt="Logo"></a> </div>
      
      <!-- #logo end --> 
      
      <!-- Primary Navigation -->
      
      <nav id="primary-menu">
        <ul>
          <?php if($userRole != "") { ?>
          <li><a href="#">
            <div>Welcome
              <?php if($userRole == 1) echo 'Super '; ?>
              Admin</div>
            </a></li>
          <li class="col-menu"> <a href="<?php echo $siteurl; ?>admin/dashboard.php">
            <div>Dashboard</div>
            </a> </li>
          <li class="col-menu"> <a href="<?php echo $siteurl; ?>admin/logout.php">
            <div>Logout</div>
            </a> </li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>
</header>

<!-- #header end -->