<div class="page-content">
    <div class="container">
        <div class="card content-area">
            <div class="card-innr">
                <div class="card-head">
                    <h4 class="card-title">API Transactions</h4>
                </div>
                <table class="data-table dt-init user-tnx">
                    <thead>
                        <tr class="data-item data-head">
                            <th class="data-col dt-tnxno">Transaction ID</th>
                            <th class="data-col dt-token">Company ID</th>
                            <th class="data-col dt-amount">Company Name</th>
                            <th class="data-col dt-usd-amount">Charge</th>
                            <th class="data-col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($trans){
                         foreach ($trans as $row) { ?>
                            <tr class="data-item">
                                <td class="data-col dt-tnxno">
                                    <div class="d-flex align-items-center">
                                        <div class="fake-class"><span class="lead tnx-id"><?php echo $row['request_id']; ?></span><span class="sub sub-date"><?php echo $row['request_created_at']; ?></span></div>
                                    </div>
                                </td>
                                <td class="data-col dt-token"><span class="lead token-amount"><?php echo $row['request_report_id']; ?></span></td>
                                <td class="data-col dt-amount"><span class="lead amount-pay"><?php echo json_decode($row['request_report'])->companySummary->businessName; ?></span></td>
                                <td class="data-col dt-usd-amount"><span class="lead amount-pay">$ <?php echo $row['request_charges']; ?></span></td>
                                <td class="data-col text-right"><a href="javascript:void(0)" onclick="location.href=`<?php echo base_url(); ?>report/reportHistory/<?php echo $user_id;?>/<?php echo $row['request_id']; ?>`" class="btn btn-light-alt btn-xs btn-icon"><em class="ti ti-eye"></em></a></td>
                            </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div><!-- .card-innr -->
        </div><!-- .card -->
    </div><!-- .container -->
</div><!-- .page-content -->