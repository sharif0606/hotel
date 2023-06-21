<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>

<?php
// Initialize the total sum variable
$totalInc = $totalexp= 0;
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-5">
                        <h4 class="card-title float-left mt-2">Monthly Report</h4>
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
                                    <td style="vertical-align:top">
                                        <table class="table">
                                            <tr>
                                                <td>#SL</td>
                                                <td>Date</td>
                                                <td>Amount</td>
                                            </tr>
                                            <?php
                                                $rs = $mysqli->common_select_query("SELECT date(`created_at`) as dt, sum(`total`) as total FROM `tbl_invoice` where year(created_at)=$year and month(created_at)=$month group by date(`created_at`)");
                                                if ($rs['data']) {
                                                    foreach ($rs['data'] as $i => $d) {
                                                        $totalInc += $d->total; // Update the total sum variable

                                            ?>
                                                <tr>
                                                    <td><?= ++$i ?></td>
                                                    <td><?= $d->dt ?></td>
                                                    <td><?= $d->total ?></td>
                                                </tr>
                                            <?php } } ?>
                                        </table>
                                    </td>
                                    <td style="vertical-align:top">
                                    <table class="table">
                                            <tr>
                                                <td>#SL</td>
                                                <td>Date</td>
                                                <td>Amount</td>
                                            </tr>
                                            <?php
                                                $rs = $mysqli->common_select_query("SELECT date(`trans_date`) as dt, sum(`amount`) as total FROM `tbl_journal` where year(trans_date)=$year and month(trans_date)=$month group by date(`trans_date`)");
                                                if ($rs['data']) {
                                                    foreach ($rs['data'] as $i => $d) {
                                                        $totalexp += $d->total; // Update the total sum variable

                                            ?>
                                                <tr>
                                                    <td><?= ++$i ?></td>
                                                    <td><?= $d->dt ?></td>
                                                    <td><?= $d->total ?></td>
                                                </tr>
                                            <?php } } ?>
                                        </table>
                                    </td>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td class="text-right">Total Income: <?= $totalInc ?></td>
                                    <td class="text-right">Total Expense: <?= $totalexp ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-right">Profit <?= ($totalInc - $totalexp) ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Display the total sum -->


<?php include_once('include/footer.php') ?>
