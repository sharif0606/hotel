<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>
<style>
	    @media print {
      button{
        display: none;
      }
    }
</style>
<?php
	$rs=$mysqli->common_select_single("tbl_invoice");
	$d=$rs['data'];
	$where['id']=$d->customer_id;
	$rs=$mysqli->common_select_single("tbl_customer","*",$where);
	$custd=$rs['data'];
?>
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col-sm-5 col-4">
					<div class="mt-5">
						<h4 class="card-title float-left mt-2">Invoice: <?= $d->invoice_number ?></h4>
					</div>
				</div>
				<div class="col-sm-7 col-8 text-right">
					<div class="mt-5">
						<div class="btn-group btn-group-sm">
							<button class="btn btn-white"><i class="fas fa-print fa-lg"></i> Print</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="row custom-invoice">
							<div class="col-6 col-sm-6 m-b-20">
								<img src="assets/img/logo-dark.png" class="inv-logo" alt="">
								<ul class="list-unstyled">
									<li>PreClinic</li>
									<li>3864 Quiet Valley Lane,</li>
									<li>Sherman Oaks, CA, 91403</li>
									<li>GST No:</li>
								</ul>
							</div>
							<div class="col-6 col-sm-6 m-b-20">
								<div class="invoice-details">
									<h3 class="text-uppercase"></h3>
									<ul class="list-unstyled">
										<li>Date: <span><?= date("F d, Y",strtotime($d->created_at)) ?></span></li>
									</ul>
								</div>
								<h5>Invoice to:</h5>
								<ul class="list-unstyled">
									<li>
										<h5><strong></strong></h5>
									</li>
									<li><span><?= $custd->first_name ?> <?= $custd->last_name ?></span></li>
									<li><?= $custd->nationality ?></li>
									<li><?= $custd->contact_no ?></li>
									<li><?= $custd->email ?></li>
								</ul>
							</div>
						</div>

						<div class="table-responsive">
						<div class="row">
								<div class="col-sm-6">
									
									<table class="table">
										<tr>
											<td>Total (Days) :</td>
											<td class="text-right"><?= $d->num_days ?></td>
										</tr>
										<tr>
											<td>Room Rent:</td>
											<td class="text-right"><?= $d->amount/$d->num_days ?></td>
										</tr>
										<tr>
											<td style="font-weight:bold" class="text-right">Total (Amount) :</td>
											<td style="font-weight:bold" class="text-right">BDT <?= $d->amount/$d->num_days ?> </td>
										</tr>
									</table>
								</div>
								<div class="col-sm-6">
									<table class="table">
										<tr>
											<td>Amount</td>
											<td>BDT <?= $d->amount ?></td>
										</tr>
										<tr>
											<td>Discount (<?= $d->discount ?>%)</td>
											<td class="discount"> BDT <?= $d->amount*($d->discount/100) ?> </td>
										</tr>
										<tr>
											<td>VAT (<?= $d->vat ?>%)</td>
											<td class="vat">  BDT <?= $d->amount*($d->vat/100) ?> </td>
										</tr>
										<tr>
											<td>Service Charge (<?= $d->service_charge ?>%)</td>
											<td class="service_charge"> BDT <?= $d->amount*($d->service_charge/100) ?></td>
										</tr>
										<tr>
											<td>Total</td>
											<td class="text-right text-primary"><h5>BDT <?= $d->total ?></h5></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<div>
							<div class="invoice-info">
								<h5>Terms & Conditions</h5>
								<p>
									
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once('include/footer.php') ?>