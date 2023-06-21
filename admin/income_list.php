<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>

<?php
// Initialize the total sum variable
$totalSum = 0;
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-5">
                        <h4 class="card-title float-left mt-2">Invoices</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body booking_card">
                    <div class="table-responsive">
                        <table class="datatable table table-stripped table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Invoice Number</th>
                                    <th>Customer ID</th>
                                    <th>Income</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rs = $mysqli->common_select_query("SELECT * FROM `tbl_invoice`");

                                if ($rs['data']) {
                                    foreach ($rs['data'] as $i => $d) {
                                        $totalSum += $d->total; // Update the total sum variable

                                        ?>
                                        <tr>
                                            <td><?= ++$i ?></td>
                                            <td><?= $d->invoice_number ?></td>
                                            <td><?= $d->customer_id ?></td>
                                            <td><?= $d->total ?></td>
                                          
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                         
                        </table>
                        <div class="text-right mr-3">Total Sum: <?= $totalSum ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Display the total sum -->


<?php include_once('include/footer.php') ?>
