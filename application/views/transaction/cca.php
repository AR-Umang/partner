<div class="page-content">
    <div class="container">
        <div class="card content-area">
            <div class="card-innr">
                <div class="card-head">
                    <h4 class="card-title">List of Applications</h4>
                </div>
                <table class="data-table dt-init user-tnx">
                    <thead>
                        <tr class="data-item data-head">
                            <th class="data-col dt-tnxno">Application ID</th>
                            <th class="data-col dt-amount">User Name</th>
                            <th class="data-col dt-usd-amount">Business Name</th>
                            <th class="data-col dt-token">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($kapedCCA) {
                            foreach ($kapedCCA as $row) { ?>
                                <tr class="data-item">
                                    <td class="data-col dt-tnxno">
                                        <div class="d-flex align-items-center">
                                            <div class="fake-class"><span class="lead tnx-id"><?php echo $row['applicationID']; ?></span><span class="sub sub-date"><?php echo $row['created_at']; ?></span></div>
                                        </div>
                                    </td>
                                    <td class="data-col dt-token"><span class="lead token-amount"><?php echo json_decode($row['formData'])->partnerCustomerInformationFirstName; ?></span></td>
                                    <td class="data-col dt-token"><span class="lead token-amount"><?php echo json_decode($row['formData'])->partnerBusinessName; ?></td>
                                    <td class="data-col dt-token"><span class="lead token-amount"><?php
                                                                                                    if ($row['status'] == 0) { ?>
                                                Pending
                                            <?php }
                                                                                                    if ($row['status'] == 1) { ?>
                                                Approved
                                            <?php }
                                                                                                    if ($row['status'] == 2) { ?>
                                                Rejected
                                            <?php } ?></span></td>

                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div><!-- .card-innr -->
        </div><!-- .card -->
    </div><!-- .container -->
</div><!-- .page-content -->