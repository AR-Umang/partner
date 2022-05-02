<!-- .topbar-wrap -->
<div class="page-content">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="token-statistics card card-token height-auto">
          <div class="card-innr">
            <div class="token-balance token-balance-with-icon">
              <div class="token-balance-icon">
                <img src="<?php echo base_url('assets/'); ?>images/logo-light-sm.png" alt="logo" />
              </div>
              <div class="token-balance-text">
                <h6 class="card-sub-title">Total API Hits</h6>
                <span class="lead"><?php if ($trans) {
                                      echo count($trans);
                                    } else {
                                      echo 0;
                                    }; ?> <span>Hits</span></span>
              </div>
            </div>
            <div class="token-balance token-balance-s2">
              <h6 class="card-sub-title">Your Monthly Contribution</h6>
              <ul class="token-balance-list">
                <li class="token-balance-sub">
                  <span class="lead"><?php if ($trans) {
                                        echo count($trans);
                                      } else {
                                        echo 0;
                                      }; ?> PULLS</span>
                </li>
                <li class="token-balance-sub">
                  <span class="lead">$ <?php if ($trans) {
                                          echo count($trans) * $profile['partner_charges'];
                                        } else {
                                          echo 0;
                                        } ?></span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- .col -->
      <div class="col-lg-8">
        <div class="token-information card card-full-height">
          <div class="row no-gutters height-100">
            <div class="col-md-6 text-center">
              <div class="token-info">
                <img class="token-info-icon" src="<?php echo base_url('assets/'); ?>images/logo-sm.png" alt="logo-sm" />
                <div class="gaps-2x"></div>
                <h1 class="token-info-head text-light">Amount = $ <? echo $profile['partner_charges']; ?> Per API Hit</h1>
              </div>
            </div>
            <div class="col-md-6">
              <div class="token-info bdr-tl">
                <div class="label-value-wrapper token-calculator">

                  <div class="label-value-wrapper-child">
                    <div class="invoive-id d-flex">
                      <div class="label">Prev. Amount</div>
                      <div class="separator">:</div>
                      <div class="label-value">$0</div>
                    </div>
                    <div class="invoive-date d-flex">
                      <div class="label">Prev. Date</div>
                      <div class="separator">:</div>
                      <div class="label-value">N/A</div>
                    </div>
                  </div>


                  <button class="btn btn-blue" style="cursor: not-allowed;" disabled><em class="fas fa-download mr-3"></em>Download
                    Invoice</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- .card -->
      </div>
      <!-- .col -->
      <div class="col-xl-8 col-lg-7">
        <div class="token-transaction card card-full-height">
          <div class="card-innr">
            <div class="card-head has-aside">
              <h4 class="card-title">Transaction</h4>
              <div class="card-opt">
                <a href="<?php echo base_url('transaction/'); ?><? echo $profile['partner_id']; ?>" class="link ucap">View ALL <em class="fas fa-angle-right ml-2"></em></a>
              </div>
            </div>
            <div class="table-overflow-x">
              <table class="table tnx-table">
                <thead>
                  <tr>
                    <th>Transaction ID</th>
                    <th>Company ID</th>
                    <th>Company Name</th>
                    <th class="tnx-type">
                      <div class="tnx-type-text"></div>
                    </th>
                  </tr>
                  <!-- tr -->
                </thead>
                <!-- thead -->
                <tbody>
                  <?php $i = 0;
                  if ($trans) {
                    foreach ($trans as $row) {
                      if ($i < 3) {
                  ?>
                        <tr class="data-item">
                          <td class="data-col dt-tnxno">
                            <div class="d-flex align-items-center">
                              <div class="fake-class"><span class="lead tnx-id"><?php echo $row['request_id']; ?></span><span class="sub sub-date"><?php echo $row['request_created_at']; ?></span></div>
                            </div>
                          </td>
                          <td class="data-col dt-token"><span class="lead token-amount"><?php echo $row['request_report_id']; ?></span></td>
                          <td class="data-col dt-amount"><span class="lead amount-pay"><?php echo json_decode($row['request_report'])->companySummary->businessName; ?></span></td>
                          <td class="data-col text-right"><a href="javascript:void(0)" onclick="location.href=`<?php echo base_url(); ?>report/reportHistory/<? echo $profile['partner_id']; ?>/<?php echo $row['request_id']; ?>`" class="btn btn-light-alt btn-xs btn-icon"><em class="ti ti-eye"></em></a></td>
                        </tr>
                  <?php $i = $i + 1;
                      } else {
                        break;
                      }
                    }
                  } ?>
                </tbody>
                <!-- tbody -->
              </table>
            </div>
            <!-- .table -->
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-5">
        <div class="token-calculator card card-full-height">
          <div class="card-innr">
            <div class="card-head">
              <h4 class="card-title">Invoice Payment</h4>
              <div class="label-value-wrapper">
                <div class="invoive-id d-flex">
                  <div class="label">Invoice ID</div>
                  <div class="separator">:</div>
                  <div class="label-value">-------</div>
                </div>
                <div class="invoive-date d-flex">
                  <div class="label">Invoice Date</div>
                  <div class="separator">:</div>
                  <div class="label-value">--/--/----</div>
                </div>
                <div class="invoive-amount d-flex">
                  <div class="label">Invoice Amount</div>
                  <div class="separator">:</div>
                  <div class="label-value">Nill</div>
                </div>
              </div>
              <div class="token-buy">
                <button href="#" class="btn btn-blue" style="cursor: not-allowed;" disabled>Payment</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- .row -->
      <!-- <div class="col-xl-8 col-lg-7">
        <div class="token-sale-graph card card-full-height">
          <div class="card-innr">
            <div class="card-head has-aside">
              <h4 class="card-title">Tokens Sale Graph</h4>
              <div class="card-opt">
                <div class="toggle-class dropdown-content">
                  <ul class="dropdown-list">
                    <li><a href="#">30 days</a></li>
                    <li><a href="#">1 years</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="chart-tokensale">
              <canvas id="tknSale"></canvas>
            </div>
          </div>
        </div>
      </div> -->

      <!--===============--=========== score history chart starts here ==============--==============-->



      <!-- <div class="col-xl-4 col-lg-5">
        <div class="score-history-line-graph custom-box-shadow">
          <div class="d-flex justify-content-between align-items-center">
            <div class="history-line-chart-heading">Score History</div>
          </div>
          <canvas id="scoreHistoryGraph"></canvas>
        </div>
      </div> -->



      <!--===============--=========== score history chart starts here ==============--==============-->

      <!-- .row -->
    </div>
    <!-- .container -->
  </div>
  <!-- .page-content -->

  <script src="<?= base_url() ?>assets/report/js/chart.js"></script>
  <script src="<?= base_url() ?>assets/custom/dashboard.js"></script>