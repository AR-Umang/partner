   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/report/css/style.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/report/css/responsive.css">
   <!-- .topbar-wrap -->
   <div id="print-report" class="content-page content-bg-body">
     <div class="darry-master-wrapper">
       <div class="container custom-container">
         <div class="paper-trail-investment-body">
           <div class="row">
             <div class="col-md-6 d-flex justify-content-between mb-3">
               <div class="heading"><?php echo $report->companySummary->businessName; ?></div>
               <div class="user-id"><?php echo $profile['partner_id']; ?></div>
             </div>
           </div>
           <div class="row">
             <div class="col-lg-6 col-md-7">
               <div class="paper-trail-investment">
                 <div class="row three-div-score">
                   <?php if (isset($report->companySummary->creditRating->providerValue->value)) { ?>
                     <div class="col-sm-4">
                       <div class="risk-score">
                         <div class="paper-trail-value"><?php echo $report->companySummary->creditRating->providerValue->value; ?></div>
                         <div class="paper-trail-key">Risk Score</div>
                       </div>
                     </div>
                   <? } ?>
                   <div class="col-sm-4">
                     <div class="international-score">
                       <div class="paper-trail-value">B</div>
                       <div class="paper-trail-key">International-Score</div>
                     </div>
                   </div>
                   <div class="col-sm-4">
                     <div class="dbt">
                       <div class="paper-trail-value"><?php echo $report->paymentData->dbt->dbt; ?></div>
                       <div class="paper-trail-key">DBT</div>
                     </div>
                   </div>
                 </div>
                 <div class="row three-div-score-second-data">
                   <div class="col-sm-4">
                     <div class="credit-limit">
                       <div class="paper-trail-value">$<?php echo $report->companySummary->creditRating->creditLimit->value; ?></div>
                       <div class="paper-trail-key">Credit Limit</div>
                     </div>
                   </div>
                   <div class="col-sm-4">
                     <div class="derogatory-legal">
                       <div class="paper-trail-value">0 (-)</div>
                       <div class="paper-trail-key">Derogatory Legal</div>
                     </div>
                   </div>
                   <div class="col-sm-4">
                     <div class="possible-ofac">
                       <div class="paper-trail-value"><?php if ($report->negativeInformation->possibleOfac == true) {
                                                        echo 'Yes';
                                                      } else {
                                                        echo 'No';
                                                      } ?></div>
                       <div class="paper-trail-key">Possible OFAC</div>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="row d-flex justify-content-between mt-4">
                 <div class="col-6 text-center">
                   <div class="download-btn">
                     <button class="btn download-btn-bg-color">Download</button>
                   </div>
                 </div>
                 <div class="col-6 text-center">
                   <div class="request-btn">
                     <button class="btn request-btn-bg-color">Request</button>
                   </div>
                 </div>
               </div>
             </div>
             <div class="col-lg-3 col-md-4 ms-lg-3 payment-trend-max-height">
               <div class="row d-flex flex-md-column payment-trend-min-height">
                 <div class="col-md-12 col-sm-6 mb-md-4 js-mr-bottom">
                   <div class="payment-trend-doughnut-chart custom-box-shadow">
                     <h5 class="trend-heading text-center">Payment Trend</h5>
                     <div class="speedometer-parent">
                       <canvas class="trend-chart" id="paymentTrendDoughnutChart"></canvas>
                       <span class="speedo-meter"></span>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-12 col-sm-6">
                   <div class="Inquiries-trend-doughnut-chart custom-box-shadow">
                     <h5 class="trend-heading text-center">Inquiries Trend</h5>
                     <div class="speedometer-parent">
                       <canvas class="trend-chart" id="InquiriesTrendDoughnutChart"></canvas>
                       <span class="speedo-meter"></span>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="three-box-section-body">
           <ul class="d-flex">
             <li class="score-list">Score</li>
             <li class="payment-data-list">Payment Data</li>
             <li class="inquiries-list">Inquiries Trend</li>
           </ul>
           <div class="row">
             <div class="col-lg-4 col-xxl-4 col-12">
               <div class="key-information-box custom-box-shadow">
                 <h6 class="heading">Key Information</h6>
                 <div class="company-name d-flex justify-content-between key-information-mr-class">
                   <div class="key-information-key">Company Name</div>
                   <div class="key-information-value"><?php echo $report->companyIdentification->basicInformation->businessName; ?></div>
                 </div>
                 <div class="other-legal-name d-flex justify-content-between">
                   <div class="key-information-key">Other legal Name</div>
                   <div class="key-information-value"><?php echo $report->companyIdentification->basicInformation->registeredCompanyName; ?></div>
                 </div>
                 <div class="charter-number d-flex justify-content-between key-information-mr-class">
                   <div class="key-information-key">Charter Number</div>
                   <div class="key-information-value">G04124900324</div>
                 </div>
                 <div class="establishment-date d-flex justify-content-between">
                   <div class="key-information-key">Establishment Date</div>
                   <div class="key-information-value"><?php echo substr($report->companyIdentification->basicInformation->companyRegistrationDate, 0, 10); ?></div>
                 </div>
                 <div class="company-type d-flex justify-content-between key-information-mr-class">
                   <div class="key-information-key">Company Type</div>
                   <div class="key-information-value">.....</div>
                 </div>
                 <div class="sic-description d-flex justify-content-between">
                   <div class="key-information-key">SIC Description</div>
                   <div class="key-information-value">Investors, NEC</div>
                 </div>
               </div>
             </div>
             <div class="col-lg-4 col-xxl-3 col-12">
               <div class="contact-information custom-box-shadow">
                 <h6 class="heading">Contact Information</h6>
                 <div class="address">
                   <div class="d-flex justify-content-between">
                     <div class="contact-information-key address-mr-bottom">Address</div>
                     <div class="map-icon"><span class="fa fa-map-marker"></span>View on map</div>
                   </div>
                   <div class="contact-information-value"><?php echo $report->companyIdentification->basicInformation->contactAddress->simpleValue; ?></div>
                 </div>
                 <div class="d-flex justify-content-between contact-information-mr-class">
                   <div class="location-type">
                     <div class="contact-information-key address-mr-bottom">Location Type</div>
                     <div class="contact-information-value"><?php echo $report->additionalInformation->misc->locationType; ?></div>
                   </div>
                   <?php if (isset($report->contactInformation->websites[0])) { ?>
                     <div class="websites">
                       <div class="contact-information-key address-mr-bottom">Websites</div>
                       <div class="contact-information-value"><a href="http://<?php echo $report->contactInformation->websites[0]; ?>"><?php echo $report->contactInformation->websites[0]; ?></a></div>
                     </div>
                   <?php } ?>
                   <?php if (isset($report->companyIdentification->basicInformation->contactAddress->telephone)) { ?>
                     <div class="phone-number">
                       <div class="contact-information-key address-mr-bottom">Phone Number</div>
                       <div class="contact-information-value"><?php echo $report->companyIdentification->basicInformation->contactAddress->telephone; ?></div>
                     </div>
                   <?php } ?>
                 </div>
                 <?php if (isset($report->additionalInformation->misc->corporatePrimaryAddress)) { ?>
                   <div class="corporate-primary-address">
                     <div class="contact-information-key address-mr-bottom">Corporate Primary Address</div>
                     <div class="contact-information-value"><?php echo $report->additionalInformation->misc->corporatePrimaryAddress; ?></div>
                   </div>
                 <?php } ?>
                 <div class="other-information">
                   <div class="other-address">Other Know Addresses and Corporate Information</div>
                 </div>
               </div>
             </div>
             <div class="col-lg-4 col-xxl-5 col-sm-12">
               <div class="score-history-line-chart custom-box-shadow">
                 <div class="d-flex justify-content-between align-items-center">
                   <div class="heading">Score History</div>
                   <div class="current-score">69 Current Score</div>
                 </div>
                 <div class="row my-3">
                   <div class="col-xl-10 col-11 d-flex justify-content-between ms-4">
                     <div class="score-history-interval-label d-flex align-items-center">
                       <div class="first-score-history-color-box interval-color-box"></div>
                       <div class="score-history-label">Trend Line</div>
                     </div>
                     <div class="score-history-interval-label d-flex align-items-center">
                       <div class="second-score-history-color-box interval-color-box"></div>
                       <div class="score-history-label">Current Company</div>
                     </div>
                     <div class="score-history-interval-label d-flex align-items-center">
                       <div class="third-score-history-color-box interval-color-box"></div>
                       <div class="score-history-label">Indusry Average</div>
                     </div>
                   </div>
                 </div>
                 <canvas id="scoreHistoryChart"></canvas>
               </div>
             </div>
           </div>
         </div>
         <div class="trade-payment-dashboard-body custom-box-shadow">
           <h6 class="heading">Trade Payment Dashboard</h6>
           <div class="row box-gap tradePaymentDashboardBox">
             <div class="col-xl-9 col-md-8">
               <div class="row mt-md-4 box-gap">
                 <div class="col-xl-2 col-sm-4 col-6 tradePaymentDashboardBox tradePaymentDashboardBox">
                   <div class="dashboard-border-box">
                     <div class="trade-payment-dashboard-value"><?php echo $report->paymentData->dbt->dbt; ?></div>
                     <div class="trade-payment-dashboard-key">Days beyond Terms</div>
                   </div>
                 </div>
                 <div class="col-xl-2 col-sm-4 col-6 tradePaymentDashboardBox">
                   <div class="dashboard-border-box">
                     <div class="trade-payment-dashboard-value"><?php echo $report->additionalInformation->extendedPaymentData->miniDashBoard->pastDuePercent; ?>%</div>
                     <div class="trade-payment-dashboard-key">% Past Due</div>
                   </div>
                 </div>
                 <div class="col-xl-2 col-sm-4 col-6 tradePaymentDashboardBox third-box-mr-top">
                   <div class="dashboard-border-box">
                     <div class="trade-payment-dashboard-value">03</div>
                     <div class="trade-payment-dashboard-key">Total Trade Lines</div>
                   </div>
                 </div>
                 <div class="col-xl-2 col-sm-4 col-6 tradePaymentDashboardBox responsive-mr-top">
                   <div class="dashboard-border-box">
                     <div class="trade-payment-dashboard-value">$<?php echo $report->additionalInformation->extendedPaymentData->miniDashBoard->pastDueTotal; ?></div>
                     <div class="trade-payment-dashboard-key">Past Due</div>
                   </div>
                 </div>
                 <div class="col-xl-2 col-sm-4 col-6 tradePaymentDashboardBox responsive-mr-top">
                   <div class="dashboard-border-box">
                     <div class="trade-payment-dashboard-value"><?php echo $report->additionalInformation->extendedPaymentData->miniDashBoard->activeTradeLines; ?></div>
                     <div class="trade-payment-dashboard-key">Active Trade Lines</div>
                   </div>
                 </div>
                 <div class="col-xl-2 col-sm-4 col-6 tradePaymentDashboardBox responsive-mr-top">
                   <div class="dashboard-border-box">
                     <div class="trade-payment-dashboard-value">$0</div>
                     <div class="trade-payment-dashboard-key">Severely Past Due</div>
                   </div>
                 </div>
               </div>
             </div>
             <div class="col-xl-3 mt-xl-4 col-md-4 industry-performance">
               <div class="dashboard-border-box dashboard-chart-gap row">
                 <div class="trade-payment-dashboard-value col-xl-5 col-md-12 col-6">
                   <div class="dashboard-speedometer-parent">
                     <canvas class="dashboard-chart" id="industryPerformanceChart"></canvas>
                     <span class="speedo-meter"></span>
                   </div>
                 </div>
                 <div class="trade-payment-dashboard-chart-key col-xl-7 col-md-12 col-6">Industry Performance</div>
               </div>
             </div>
           </div>
           <div class="row box-gap tradePaymentDashboardBox">
             <div class="col-xl-9 col-md-8">
               <div class="row mt-md-4 box-gap">
                 <div class="col-xl-2 col-sm-4 col-6 tradePaymentDashboardBox">
                   <div class="dashboard-border-box">
                     <div class="trade-payment-dashboard-value">$<?php echo $report->additionalInformation->extendedPaymentData->miniDashBoard->totalBalance; ?></div>
                     <div class="trade-payment-dashboard-key key-font-size">Total Balance</div>
                   </div>
                 </div>
                 <div class="col-xl-2 col-sm-4 col-6 tradePaymentDashboardBox">
                   <div class="dashboard-border-box">
                     <div class="trade-payment-dashboard-value">$<?php echo $report->additionalInformation->extendedPaymentData->miniDashBoard->highestPastDue; ?></div>
                     <div class="trade-payment-dashboard-key key-font-size">Highest & Past Due</div>
                   </div>
                 </div>
                 <div class="col-xl-2 col-sm-4 col-6 tradePaymentDashboardBox third-box-mr-top">
                   <div class="dashboard-border-box">
                     <div class="trade-payment-dashboard-value"><?php echo substr($report->additionalInformation->extendedPaymentData->miniDashBoard->lastUpdated, 0, 10); ?></div>
                     <div class="trade-payment-dashboard-key key-font-size">Last Updated</div>
                   </div>
                 </div>
                 <div class="col-xl-2 col-sm-4 col-6 tradePaymentDashboardBox responsive-mr-top">
                   <div class="dashboard-border-box">
                     <div class="trade-payment-dashboard-value">$<?php echo $report->additionalInformation->extendedPaymentData->miniDashBoard->pastDueSevereTotal; ?></div>
                     <div class="trade-payment-dashboard-key key-font-size">Highest & Severely Past Due</div>
                   </div>
                 </div>
                 <div class="col-xl-2 col-sm-4 col-6 tradePaymentDashboardBox responsive-mr-top">
                   <div class="dashboard-border-box">
                     <div class="trade-payment-dashboard-value">$<?php echo $report->additionalInformation->extendedPaymentData->miniDashBoard->recentHighCredit; ?></div>
                     <div class="trade-payment-dashboard-key key-font-size">Recent High Credit</div>
                   </div>
                 </div>
                 <div class="col-xl-2 col-sm-4 col-6 tradePaymentDashboardBox responsive-mr-top">
                   <div class="dashboard-border-box">
                     <div class="trade-payment-dashboard-value">$<?php echo $report->additionalInformation->extendedPaymentData->miniDashBoard->activeCreditAmount; ?></div>
                     <div class="trade-payment-dashboard-key key-font-size">Average Credit Amount</div>
                   </div>
                 </div>
               </div>
             </div>
             <div class="col-xl-3 mt-xl-4 col-md-4 cradit-ratio">
               <div class="dashboard-border-box dashboard-chart-gap row">
                 <div class="trade-payment-dashboard-value col-xl-5 col-md-12 col-6">
                   <div class="dashboard-speedometer-parent">
                     <canvas class="dashboard-chart" id="CreditRatioChart"></canvas>
                     <span class="speedo-meter"></span>
                   </div>
                 </div>
                 <div class="trade-payment-dashboard-chart-key col-xl-7 col-md-12 col-6">Credit Ratio</div>
               </div>
             </div>
           </div>
         </div>

         <div class="trade-information-body">
           <div class="row">
             <div class="col-lg-6 col-sm-12">
               <div class="trade-payment-information trade-payment-information-height custom-box-shadow">
                 <h6 class="heading">Trade Payment Information</h6>
                 <?php if (isset($report->additionalInformation->extendedPaymentData->groupTradePaymentInformation)) { ?>
                   <div class="row mt-3">
                     <div class="col-4">
                       <div class="trade-payment-information-key">Current</div>
                     </div>
                     <?php if (isset($report->additionalInformation->extendedPaymentData->groupTradePaymentInformation->balanceCurrent)) { ?>
                       <div class="col-4 text-center">
                         <div class="trade-payment-information-key">$<?php echo $report->additionalInformation->extendedPaymentData->groupTradePaymentInformation->balanceCurrent; ?></div>
                       </div>
                     <?php } ?>
                     <?php if (isset($report->additionalInformation->extendedPaymentData->groupTradePaymentInformation->balanceCurrent)) { ?>
                       <div class="col-4 text-end">
                         <div class="trade-payment-information-key"><?php echo $report->additionalInformation->extendedPaymentData->groupTradePaymentInformation->pctBalanceCurrent; ?>%</div>
                       </div>
                     <?php } ?>
                   </div>
                   <div class="row my-3">
                     <div class="col-4">
                       <div class="trade-payment-information-value">1-30</div>
                     </div>
                     <div class="col-4 text-center">
                       <div class="currency">$<?php echo $report->additionalInformation->extendedPaymentData->groupTradePaymentInformation->balance130; ?></div>
                     </div>
                     <div class="col-4">
                       <div class="trade-payment-information-value text-end"><?php echo $report->additionalInformation->extendedPaymentData->groupTradePaymentInformation->pctBalance130; ?>%</div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-4">
                       <div class="trade-payment-information-value">31-60</div>
                     </div>
                     <div class="col-4 text-center">
                       <div class="currency">$<?php echo $report->additionalInformation->extendedPaymentData->groupTradePaymentInformation->balance3160; ?></div>
                     </div>
                     <div class="col-4 text-end">
                       <div class="trade-payment-information-value"><?php echo $report->additionalInformation->extendedPaymentData->groupTradePaymentInformation->pctBalance3160; ?>%</div>
                     </div>
                   </div>
                   <div class="row my-3">
                     <div class="col-4">
                       <div class="trade-payment-information-value">61-90</div>
                     </div>
                     <div class="col-4 text-center">
                       <div class="currency">$<?php echo $report->additionalInformation->extendedPaymentData->groupTradePaymentInformation->balance6190; ?></div>
                     </div>
                     <div class="col-4 text-end">
                       <div class="trade-payment-information-value"><?php echo $report->additionalInformation->extendedPaymentData->groupTradePaymentInformation->pctBalance6190; ?>%</div>
                     </div>
                   </div>
                   <div class="row hr-line">
                     <div class="col-4">
                       <div class="trade-payment-information-value">90+</div>
                     </div>
                     <div class="col-4 text-center">
                       <div class="currency">$<?php echo $report->additionalInformation->extendedPaymentData->groupTradePaymentInformation->balance91plus; ?></div>
                     </div>
                     <div class="col-4 text-end">
                       <div class="trade-payment-information-value"><?php echo $report->additionalInformation->extendedPaymentData->groupTradePaymentInformation->pctBalanceCurrent; ?>%</div>
                     </div>
                   </div>
                   <div class="row mt-3">
                     <div class="col-4">
                       <div class="trade-payment-information-total-value">Total</div>
                     </div>
                     <div class="col-4 text-center">
                       <div class="trade-payment-information-total-value">$<?php echo $report->additionalInformation->extendedPaymentData->groupTradePaymentInformation->balanceTotal; ?></div>
                     </div>
                     <div class="col-4 text-end">
                       <div class="trade-payment-information-total-value"><?php echo $report->additionalInformation->extendedPaymentData->groupTradePaymentInformation->pctBalanceCurrent; ?>%</div>
                     </div>
                   </div>
                 <?php } else { ?>
                   <div class="msg-upper-blur-div">N/A</div>
                 <?php } ?>
               </div>
             </div>
             <div class="col-lg-6 col-sm-12">
               <div class="historical-trade-information-bar-chart custom-box-shadow">
                 <h6 class="heading">Historical Trade Information</h6>
                 <div class="row">
                   <div class="col-11 d-flex justify-content-between mt-2 ms-3">
                     <div class="historical-interval-label d-flex align-items-center">
                       <div class="first-historical-color-box interval-color-box"></div>
                       <div class="historical-label">Trend Line</div>
                     </div>
                     <div class="historical-interval-label d-flex align-items-center">
                       <div class="second-historical-color-box interval-color-box"></div>
                       <div class="historical-label">Current</div>
                     </div>
                     <div class="historical-interval-label d-flex align-items-center">
                       <div class="third-historical-color-box interval-color-box"></div>
                       <div class="historical-label">1-30</div>
                     </div>
                     <div class="historical-interval-label d-flex align-items-center">
                       <div class="forth-historical-color-box interval-color-box"></div>
                       <div class="historical-label">31-60</div>
                     </div>
                     <div class="historical-interval-label d-flex align-items-center">
                       <div class="fifth-historical-color-box interval-color-box"></div>
                       <div class="historical-label">61-90</div>
                     </div>
                     <div class="historical-interval-label d-flex align-items-center">
                       <div class="six-historical-color-box interval-color-box"></div>
                       <div class="historical-label">91+</div>
                     </div>
                   </div>
                 </div>
                 <canvas id="historicalTradeInformationChart"></canvas>
               </div>
             </div>
           </div>
         </div>
         <div class="credit-extended-payments-body custom-box-shadow">
           <div class="row">
             <div class="col-md-12">
               <div class="trade-payments-credit-extended">
                 <h6 class="heading">Trade Payments By Credit Extended</h6>
                 <div class="credit-extended-box d-flex justify-content-between mt-3">
                   <div class="credit-box">
                     <div class="credit-extended-key">Credit Extended</div>
                     <div class="credit-extended-value">Over $1M</div>
                     <div class="credit-extended-value">$100k-$1M</div>
                     <div class="credit-extended-value">$50K-$100K</div>
                     <div class="credit-extended-value">$25k-$50K</div>
                     <div class="credit-extended-value">$5K-$25K</div>
                     <div class="credit-extended-value">$1k-$5K</div>
                     <div class="credit-extended-value">Under $1k</div>

                   </div>
                   <div class="credit-box">
                     <div class="credit-extended-key">Trade Lines</div>
                     <div class="credit-extended-value"><?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->credit1kTo5k->tradeLines; ?></div>
                     <div class="credit-extended-value"><?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->credit100kTo1m->tradeLines; ?></div>
                     <div class="credit-extended-value"><?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->credit50kTo100k->tradeLines; ?></div>
                     <div class="credit-extended-value"><?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->credit25kTo50k->tradeLines; ?></div>
                     <div class="credit-extended-value"><?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->credit5kTo25k->tradeLines; ?></div>
                     <div class="credit-extended-value"><?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->credit1kTo5k->tradeLines; ?></div>
                     <div class="credit-extended-value"><?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->tradeLines; ?></div>
                   </div>
                   <div class="credit-box">
                     <div class="credit-extended-key">Total Amout</div>
                     <div class="credit-extended-value">$<?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->totalAmount; ?></div>
                     <div class="credit-extended-value">$<?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->totalAmount; ?></div>
                     <div class="credit-extended-value">$<?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->totalAmount; ?></div>
                     <div class="credit-extended-value">$<?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->totalAmount; ?></div>
                     <div class="credit-extended-value">$<?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->totalAmount; ?></div>
                     <div class="credit-extended-value">$<?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->totalAmount; ?></div>
                     <div class="credit-extended-value">$<?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->totalAmount; ?></div>
                   </div>
                   <div class="credit-box">
                     <div class="credit-extended-key">Past Due</div>
                     <div class="credit-extended-value">$<?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->pastDue; ?></div>
                     <div class="credit-extended-value">$<?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->pastDue; ?></div>
                     <div class="credit-extended-value">$<?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->pastDue; ?></div>
                     <div class="credit-extended-value">$<?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->pastDue; ?></div>
                     <div class="credit-extended-value">$<?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->pastDue; ?></div>
                     <div class="credit-extended-value">$<?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->pastDue; ?></div>
                     <div class="credit-extended-value">$<?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->pastDue; ?></div>
                   </div>
                   <div class="credit-box">
                     <div class="credit-extended-key">Within Terms</div>
                     <div class="credit-extended-value"><?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->tradeLines; ?>%</div>
                     <div class="credit-extended-value"><?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->tradeLines; ?>%</div>
                     <div class="credit-extended-value"><?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->tradeLines; ?>%</div>
                     <div class="credit-extended-value"><?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->tradeLines; ?>%</div>
                     <div class="credit-extended-value"><?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->tradeLines; ?>%</div>
                     <div class="credit-extended-value"><?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->tradeLines; ?>%</div>
                     <div class="credit-extended-value"><?php echo $report->additionalInformation->extendedPaymentData->tradePaymentsByCreditExtended->creditUnder1k->tradeLines; ?>%</div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>

       </div>
     </div>
   </div>
   </div>
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   <!-- <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script> -->
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script> -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
   <script src="<?= base_url() ?>assets/report/js/chart.js"></script>
   <script src="<?= base_url() ?>assets/report/js/dom.js"></script>

   <script>
     //  function generatePDF(){
     //         let invoice = document.getElementById("print-report");

     //         html2pdf()
     //         .from(invoice)
     //         .save();

     //     }
     $(document).ready(function() {
       $(document).on("click", ".download-btn", function(event) {
         event.preventDefault();

         var element = document.getElementById("print-report");

         html2pdf().set({
           filename: 'report.pdf'
         }).from(element).save();


         var opt = {
           margin: 1,
           filename: 'pageContent_' + js.AutoCode() + '.pdf',
           image: {
             type: 'jpeg',
             quality: 0.98
           },
           html2canvas: {
             scale: 1
           },
           jsPDF: {
             unit: 'in',
             format: 'letter',
             orientation: 'potrait'
           }
         };
       })
     })
   </script>