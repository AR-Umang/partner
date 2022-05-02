<?php
$us_state_options = '<option value="">Select State</option>';
$state = $profile['partner_state'];
foreach (US_STATE_CODE_TO_NAMES as $code => $name) {
  if ($state == $code) {
    $us_state_options .= '<option value="' . $code . '" selected>' . $name . '</option>';
  } else {
    $us_state_options .= '<option value="' . $code . '">' . $name . '</option>';
  }
}
?>

<!-- .topbar-wrap -->
<div class="page-content">
  <div class="container">
    <div class="row">
      <div class="main-content col-lg-8">
        <div class="content-area card">
          <div class="card-innr">
            <div class="card-head">
              <h4 class="card-title">Profile Details</h4>
            </div>
            <ul class="nav nav-tabs nav-tabs-line" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#personal-data">Business Information</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#settings">Business Contact Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#password">Change Password</a>
              </li>
            </ul>
            <!-- .nav-tabs-line -->
            <div class="tab-content" id="profile-details">
              <div class="tab-pane fade show active" id="personal-data">
                <form method="POST" id="business-info">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="input-item input-with-label">
                        <label for="full-name" class="input-item-label">Business Name</label>
                        <input class="input-bordered" type="text" id="business-name" name="business-name" placeholder="Business Name" value="<?php echo $profile['partner_business_name'] ?>" disabled />
                      </div>
                      <!-- .input-item -->
                    </div>

                    <div class="col-md-6">
                      <div class="input-item input-with-label">
                        <label for="full-name" class="input-item-label">Street Address</label>
                        <input class="input-bordered" type="text" id="street-address" name="street-address" placeholder="Street Address" value="<?php echo $profile['partner_address_street'] ?>" />
                      </div>
                      <!-- .input-item -->
                    </div>

                    <div class="col-md-6">
                      <div class="input-item input-with-label">
                        <label for="full-name" class="input-item-label">Postal Code</label>
                        <input class="input-bordered number-input" type="text" id="postal-code" name="postal-code" placeholder="Postal Code" maxlength="6" value="<?php echo $profile['partner_postal_code'] ?>" />
                      </div>
                      <!-- .input-item -->
                    </div>

                    <div class="col-md-6">
                      <div class="input-item input-with-label">
                        <label for="full-name" class="input-item-label">City</label>
                        <input class="input-bordered" type="text" id="city" name="city" placeholder="City" value="<?php echo $profile['partner_city'] ?>" />
                      </div>
                      <!-- .input-item -->
                    </div>

                    <div class="col-md-6">
                      <div class="input-item input-with-label">
                        <label for="full-name" class="input-item-label">State</label>
                        <select name="state" id="state" class="input-bordered">
                          <?php echo $us_state_options; ?>
                        </select>
                      </div>
                      <!-- .input-item -->
                    </div>


                    <!-- .col -->
                    <div class="col-md-6">
                      <div class="input-item input-with-label">
                        <label for="full-name" class="input-item-label">Country</label><input class="input-bordered" type="text" id="country" name="country" value="United State" value="<?php echo $profile['partner_country'] ?>" readonly />
                      </div>
                      <!-- .input-item -->
                    </div>
                    <!-- .col -->
                  </div>
                  <!-- .row -->
                  <div class="gaps-1x"></div>
                  <!-- 10px gap -->
                  <div class="d-sm-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">Update Info</button>
                    <div class="gaps-2x d-sm-none"></div>
                    <!-- <span class="text-success"><em class="ti ti-check-box"></em> All Changes are
                      saved</span> -->
                  </div>
                </form>
                <!-- form -->
              </div>
              <!-- .tab-pane -->
              <div class="tab-pane fade" id="settings">

                <form method="POST" id="business-contact">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="input-item input-with-label">
                        <label for="full-name" class="input-item-label">First Name</label>
                        <input class="input-bordered" type="text" id="first-name" name="first-name" placeholder="First Name" value="<?php echo $profile['partner_first_name'] ?>" />
                      </div>
                      <!-- .input-item -->
                    </div>

                    <div class="col-md-6">
                      <div class="input-item input-with-label">
                        <label for="full-name" class="input-item-label">Last Name</label>
                        <input class="input-bordered" type="text" id="last-name" name="last-name" placeholder="Last Name" value="<?php echo $profile['partner_last_name'] ?>" />
                      </div>
                      <!-- .input-item -->
                    </div>

                    <div class="col-md-6">
                      <div class="input-item input-with-label">
                        <label for="email-address" class="input-item-label">Email Address</label>
                        <input class="input-bordered" type="email" id="email" name="email" placeholder="info@abc.com" value="<?php echo $profile['partner_email'] ?>" disabled />
                      </div>
                      <!-- .input-item -->
                    </div>
                    <div class="col-md-6">
                      <div class="input-item input-with-label">
                        <label for="mobile-number" class="input-item-label">Mobile Number</label>
                        <input class="input-bordered number-input" type="text" id="contact" name="contact" maxlength="10" value="<?php echo $profile['partner_contact'] ?>" />
                      </div>
                      <!-- .input-item -->
                    </div>

                    <!-- .col -->

                    <!-- .col -->
                  </div>
                  <!-- .row -->
                  <div class="gaps-1x"></div>
                  <!-- 10px gap -->
                  <div class="d-sm-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                    <div class="gaps-2x d-sm-none"></div>
                  </div>
                </form>
              </div>
              <!-- .tab-pane -->
              <div class="tab-pane fade" id="password">
                <form method="POST" id="business-password">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="input-item input-with-label">
                        <label for="old-pass" class="input-item-label">Old Password</label>
                        <input class="input-bordered" type="password" id="old_pass" name="old_pass" />
                      </div>
                      <!-- .input-item -->
                    </div>
                    <!-- .col -->
                  </div>
                  <!-- .row -->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="input-item input-with-label">
                        <label for="new-pass" class="input-item-label">New Password</label>
                        <input class="input-bordered" type="password" id="new_pass" name="new_pass" />
                      </div>
                      <!-- .input-item -->
                    </div>
                    <!-- .col -->
                    <div class="col-md-6">
                      <div class="input-item input-with-label">
                        <label for="confirm-pass" class="input-item-label">Confirm New Password</label>
                        <input class="input-bordered" type="password" id="confirm_pass" name="confirm_pass" />
                      </div>
                      <!-- .input-item -->
                    </div>
                    <!-- .col -->
                  </div>
                  <!-- .row -->
                  <div class="note note-plane note-info pdb-1x">
                    <em class="fas fa-info-circle"></em>
                    <p>
                      Password should be minmum 8 letter and include lower and
                      uppercase letter.
                    </p>
                  </div>
                  <div class="gaps-1x"></div>
                  <!-- 10px gap -->
                  <div class="d-sm-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">Update Password</button>
                    <div class="gaps-2x d-sm-none"></div>
                  </div>
                </form>
              </div>
              <!-- .tab-pane -->
            </div>
            <!-- .tab-content -->
          </div>
          <!-- .card-innr -->
        </div>
        <!-- .card -->

        <!-- .card -->
      </div>
      <!-- .col -->
      <div class="aside sidebar-right col-lg-4">
        <div class="row">
          <div class="col-12">
            <div class="referral-info card">
              <div class="card-innr">
                <h6 class="card-title card-title-sm">Your API Key</h6>
                <!-- <p class="pdb-0-5x">
                    <strong><span class="text-primary">Click to Copy!</strong>
                  </p> -->
                <div class="copy-wrap mgb-0-5x">
                  <span class="copy-feedback"></span><em class="fas fa-link"></em>
                  <input type="text" class="copy-address" value="<?php echo base64_decode($profile['partner_api_key']); ?>" disabled /><button class="copy-trigger copy-clipboard" data-clipboard-text="<?php echo base64_decode($profile['partner_api_key']); ?>">
                    <em class="ti ti-files"></em>
                  </button>
                </div>
                <!-- .copy-wrap -->
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="referral-info card">
              <div class="card-innr">
                <h6 class="card-title card-title-sm">Your Affiliate Embeddable Code</h6>
                <div class="copy-wrap mgb-0-5x embeded-code-div-wrapper">
                  <div class="embeded-code-div">
                    <!-- <div id="embedded-code-one"></div>
                    <br/>
                    <div id="embedded-code-two"></div>
                  </div> -->
                  <div id="embedded-code-affiliate-one"></div>
                    <br/>
                    <div id="embedded-code-affiliate-two"></div>
                  </div>
                  <span></span>
                </div>
                <!-- .copy-wrap -->
              </div>
            </div>
          </div>
          <!-- <div class="col-12">
            <div class="referral-info card">
              <div class="card-innr">
                <h6 class="card-title card-title-sm">Your Affilate Embeded Code</h6>
                <div class="copy-wrap mgb-0-5x embeded-code-div-wrapper">
                  <div class="embeded-code-div">
                    <div id="embedded-code-affiliate-one"></div>
                    <br/>
                    <div id="embedded-code-affiliate-two"></div>
                  </div>
                  <span></span>
                </div>
              </div>
            </div>
          </div> -->

        </div>

      </div>
      <!-- .col -->
    </div>
    <!-- .container -->
  </div>
  <!-- .container -->
</div>
<!-- .page-content -->

