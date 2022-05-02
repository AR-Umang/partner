    <!-- .page-header -->
    <div class="page-content">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10 col-xl-9">
            <div class="kyc-form-steps card mx-lg-4">
              <div class="form-step form-step1">
                <div class="form-step-head card-innr">
                  <div class="step-head">
                    <div class="step-number">01</div>
                    <div class="step-head-text">
                      <h4>Search Business Credit Report</h4>
                      <!-- <p>
                        Your simple personal information required for
                        identification
                      </p> -->
                    </div>
                  </div>
                </div>
                <!-- .step-head -->
                <div class="form-step-fields card-innr">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-item input-with-label">
                        <!-- <label class="input-item-label"></label> -->
                        <input class="input-bordered" name="business-name" id="business-name" type="text" placeholder="Search Business Name" />
                        <input class="input-bordered" name="partner-id" id="partner-id" type="hidden" value="<?php echo $profile['partner_id']?>" />
                      </div>
                      <!-- .input-item -->
                    </div>

                    <!-- .col -->
                  </div>

                  <!-- .row -->
                </div>
                <!-- .step-fields -->
              </div>


              <div class="form-step form-step-final">
                <div class="form-step-fields card-innr card-innr-btn">

                  <div class="gaps-1x"></div>
                  <button class="btn btn-primary" id="search-business-button">Search</button>
                </div>
                <!-- .step-fields -->
              </div>
            </div>
            <!-- .card -->
          </div>
        </div>
      </div>
      <!-- .container -->
    </div>
    <!-- .page-content -->