<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
   <meta charset="utf-8" />
   <meta name="author" content="" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <meta name="description" content="" />
   <!-- Fav Icon -->
   <!-- <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png" /> -->
   <link rel="icon" href="https://www.artechnity.com/wp-content/uploads/2019/07/cropped-logo-180x180.jpg" />
   <!-- Site Title  -->
   <title><?php echo $title; ?></title>
   <!-- Vendor Bundle CSS -->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendor.bundle49f7.css?ver=104" />

   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" id="layoutstyle" />
   <!-- Custom styles for this template -->

   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" id="layoutstyle" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/responsive.css" id="layoutstyle" />

   <!--font awesome CDN -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
   

   <!-- material icon cdn -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">




</head>
<?php if (isset($type)) {
} else {
   $type = 0;
} ?>

<body class="page-user">
   <?php if ($type == 0) { ?>
      <div class="topbar-wrap">
         <div class="topbar is-sticky topbar-nav">
            <div class="container">
               <div class="d-flex justify-content-between align-items-center">
                  <ul class="topbar-nav d-lg-none">
                     <li class="topbar-nav-item relative">
                        <a class="toggle-nav" href="#">
                           <div class="toggle-icon">
                              <span class="toggle-line"></span><span class="toggle-line"></span><span class="toggle-line"></span><span class="toggle-line"></span>
                           </div>
                        </a>
                     </li>
                     <!-- .topbar-nav-item -->
                  </ul>
                  <ul class="navbar-menu">
                     <li>
                        <a href="<?php echo base_url('dashboard/'); ?><? echo $profile['partner_id']; ?>"><em class="ikon ikon-dashboard"></em> Dashboard</a>
                     </li>
                     <li>
                        <a href="<?php echo base_url('credit-card-application/'); ?><? echo $profile['partner_id']; ?>"><em class="ikon ikon-transactions"></em> Apply Credit Card</a>
                     </li>
                     <!-- <li>
                     <a href="<?php echo base_url('credit-card-application/insurance/'); ?><? echo $profile['partner_id']; ?>"><em class="ikon ikon-transactions"></em> Insurance Application</a>
                  </li> -->
                     <!-- <li>
                     <a href="<?php echo base_url('report/'); ?><? echo $profile['partner_id']; ?>"><em class="ikon ikon-transactions"></em> CreditSafe Reports</a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('transaction/'); ?><? echo $profile['partner_id']; ?>"><em class="ikon ikon-transactions"></em> CreditSafe History</a>
                  </li> -->
                  <!-- <li>
                        <a href="<?php echo base_url('settings/'); ?><? echo $profile['partner_id']; ?>"><em class="ikon ikon-exchange"></em> Customize Card</a>
                     </li> -->
                     <li>
                        <a href="<?php echo base_url('customize_credit_card/'); ?><? echo $profile['partner_id']; ?>"><em class="ikon ikon-exchange"></em> Customize Card</a>
                     </li>
                     <li>
                        <a href="<?php echo base_url('settings/'); ?><? echo $profile['partner_id']; ?>"><em class="ikon ikon-exchange"></em> Settings</a>
                     </li>

                  </ul>
                  <ul class="topbar-nav">
                     <li class="topbar-nav-item relative">
                        <span class="user-welcome d-none d-lg-inline-block">Welcome! <? echo $profile['partner_first_name']; ?></span><a class="toggle-tigger user-thumb" href="#"><em class="ti ti-user"></em></a>
                        <div class="toggle-class dropdown-content dropdown-content-right dropdown-arrow-right user-dropdown">
                           <div class="user-status">
                              <h6 class="user-status-title">API Hits</h6>
                              <div class="user-status-balance">
                                 <?php if ($kapedCCA) {
                                    echo count($kapedCCA);
                                 } else {
                                    echo 0;
                                 }; ?> <small>Application</small>
                              </div>
                           </div>
                           <ul class="user-links">
                              <li>
                                 <a href="<?php echo base_url('settings/'); ?><? echo $profile['partner_id']; ?>"><i class="ti ti-id-badge"></i>My Profile</a>
                              </li>
                           </ul>
                           <ul class="user-links bg-light">
                              <li>
                                 <a href="javascript:void(0)" id="logout-button-partner"><i class="ti ti-power-off"></i>Logout</a>
                              </li>
                           </ul>
                        </div>
                     </li>
                     <!-- .topbar-nav-item -->
                  </ul>
                  <!-- .topbar-nav -->
               </div>
            </div>
            <!-- .container -->
         </div>
      </div>
   <?php } else { ?>
      <br /><br />
   <?php } ?>