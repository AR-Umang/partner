<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="author" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <!-- Fav Icon -->
  <!-- <link rel="shortcut icon" href="<? base_url() ?>assets/images/favicon.png" /> -->
  <link rel="icon" href="https://www.artechnity.com/wp-content/uploads/2019/07/cropped-logo-180x180.jpg" />
  <!-- Site Title  -->
  <title>Partner Panel :: KAPED Inc.</title>
  <!-- Vendor Bundle CSS -->
  <link rel="stylesheet" type="text/css" href="https://artechnity.in/partner/assets/css/vendor.bundle49f7.css?ver=104" />
  <!-- Custom styles for this template -->
  <link rel="stylesheet" type="text/css" href="https://artechnity.in/partner/assets/css/style49f7.css?ver=104" id="layoutstyle" />

  <link type="text/css" href="https://artechnity.in/partner/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
  <link type="text/css" href="https://artechnity.in/partner/assets/plugins/node-waves/waves.css" rel="stylesheet" />

</head>

<body class="page-ath">
  <div class="page-ath-wrap">
    <div class="page-ath-content">
      <div class="page-ath-header kaped-partner-logo">
      </div>
      <div class="page-ath-form">
        <h2 class="page-ath-heading">
          Sign in <small>with your Account</small>
        </h2>
        <form method="POST" id="sign_in">
          <div class="input-item">
            <input type="email" placeholder="Your Email" id="username" name="username" class="input-bordered" />
          </div>
          <div class="input-item">
            <input type="password" placeholder="Password" id="password" name="password" class="input-bordered" />
            <input type="hidden" placeholder="token" id="token" name="token" class="input-bordered" value="<?php echo $this->uri->segment(2); ?>" />
          </div>
          <!-- <div class="input-item">
            <input type="password" placeholder="Your API Key" id="api-key" name="api-key" class="input-bordered" />
          </div> -->
          <div class="d-flex justify-content-between align-items-center">
            <div class="input-item text-left">
              <!-- <input class="input-checkbox input-checkbox-md" id="remember-me" type="checkbox" /> -->
              <!-- <label for="remember-me">Remember Me</label> -->
            </div>
            <div>
              <!-- <a href="forgot.html">Forgot password?</a>
                <div class="gaps-2x"></div> -->
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </form>
        <div class="gaps-2x"></div>
        <div class="gaps-2x"></div>

      </div>
      <div class="page-ath-footer">
        <ul class="footer-links">
          <!-- <li><a href="">Privacy Policy</a></li>
          <li><a href="">Terms</a></li> -->
          <li>&copy; <?php echo date("Y"); ?> Powered By KAPED.</li>
        </ul>
      </div>
    </div>
    <div class="page-ath-gfx">
      <div class="w-100 d-flex justify-content-center">
        <div class="col-md-8 col-xl-5">
          <img src="https://artechnity.in/partner/assets/images/kapedLogo.png" alt="image" />
        </div>
      </div>
    </div>
  </div>
  <script>
    var baseURL = `<?php echo base_url(); ?>`;
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="application/javascript"></script>
  <!-- <script src="https://artechnity.in/partner/assets/js/script49f7.js?ver=104"></script> -->
  <script src="https://artechnity.in/partner/assets/plugins/node-waves/waves.js" type="application/javascript"></script>
  <!-- Sweet Alert Plugin Js -->
  <script src="https://artechnity.in/partner/assets/plugins/sweetalert/sweetalert.min.js" type="application/javascript"></script>
  <script src="https://artechnity.in/partner/assets/plugins/bootstrap-notify/bootstrap-notify.js" type="application/javascript"></script>
  <script src="https://artechnity.in/partner/assets/custom/auth.js"></script>
</body>

</html>