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
                <?php
                        $year=$_GET['s_year']??date('Y');
                        $month=$_GET['s_month']??date('m');
                    ?>
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for=""> Year</label>
                                    <select class="form-control" name="s_year">
                                        <?php for($i=2022; $i <= date('Y'); $i++){ ?>
                                        <option value="<?= $i ?>" <?= $year==$i?"selected":"" ?>><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for=""> Month</label>
                                    <select class="form-control" name="s_month">
                                        <?php for($i=1; $i <= 12; $i++){ ?>
                                        <option value="<?= $i ?>" <?= $month==$i?"selected":"" ?>><?= date('F', mktime(0, 0, 0, $i, 10)); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group"><br>
                                    <button class="btn btn-primary" type="submit">Get Report</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
                                $rs = $mysqli->common_select_query("SELECT * FROM `tbl_invoice`  where year(created_at)=$year and month(created_at)=$month");

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
                        <hr class="font-weight-bold">
                        <div class="text-right ml-4 col-md-10 font-weight-bold">Total Sum: <?= $totalSum ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Display the total sum -->


<?php include_once('include/footer.php') ?>
