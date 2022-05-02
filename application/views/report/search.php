<div class="page-content">
  <div class="container">
    <div class="card content-area">
      <div class="card-innr">

        <h4 class="card-title mb-0">Search Result</h4>
        <div class="company-card-wrapper container-fluid">
          <div class="card-box row">

            <?php foreach ($companies as $company) { ?>

              <div class="col-md-4 card-box-col" onclick="location.href=`<?php echo base_url(); ?>report/report/<?php echo $profile['partner_id']; ?>/<?php echo $company->id; ?>`" style="cursor: pointer;">
                <div class="card">
                  <div class="card-company-name"><?php echo $company->name; ?></div>
                  <!-- <span class="company-status">Active</span> -->

                

                  <div class="company-content">
                    <div class="company-key">ID1</div>
                    <div class="separator">:</div>
                    <div class="company-value"><?php echo $company->id; ?></div>
                  </div>

                  <?php if (isset($company->regNo)) { ?>
                    <div class="company-content">
                      <div class="company-key">Reg. No.</div>
                      <div class="separator">:</div>
                      <div class="company-value"><?php echo $company->regNo; ?></div>
                    </div>
                  <?php } ?>

                  <div class="company-content">
                    <div class="company-key">Office Type</div>
                    <div class="separator">:</div>
                    <div class="company-value"><?php echo $company->officeType; ?></div>
                  </div>

                  <div class="company-content">
                    <div class="company-key">Address</div>
                    <div class="separator">:</div>
                    <div class="company-value"><?php echo $company->address->simpleValue; ?></div>
                  </div>

                  <div class="company-content">
                    <div class="company-key">Status</div>
                    <div class="separator">:</div>
                    <div class="company-value"><?php echo $company->status; ?></div>
                  </div>

                  <div class="company-content">
                    <div class="company-key">Safe No.</div>
                    <div class="separator">:</div>
                    <div class="company-value"><?php echo $company->safeNo; ?></div>
                  </div>
                </div>
              </div>

            <?php } ?>

          </div>
        </div>

      </div>
      <!-- .card-innr -->
    </div>
    <!-- .card -->
  </div>
  <!-- .container -->
</div>