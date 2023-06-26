
<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>


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
                    <th>Rent</th>
                    <th>Discount(%)</th>
                    <th>VAT(%)</th>
                    <th>Service Charge(%)</th>
                    <th>Total</th>
                    
                    
                    
                    <th class="text-right">Actions</th>
                </tr>

                <?php
					$rs=$mysqli->common_select_query("SELECT * FROM `tbl_invoice`");
					
					if($rs['data']){
						foreach($rs['data'] as $i=>$d){
				?>
				<tr>
					<td><?= ++$i ?></td>
					<td><?= $d->invoice_number ?></td>
					<td><?= $d->customer_id ?></td>
					<td><?= $d->amount ?></td>
					<td><?= $d->discount ?></td>
					<td><?= $d->vat ?></td>
					<td><?= $d->service_charge ?></td>
					<td><?= $d->total ?></td>
					<td class="text-right">
						
						<a href="<?= $base_url ?>invoice-view.php?id=<?= $d->id ?>"><i class='fas fa-file-export'></i></a>

					</td>
				</tr>
				<?php }
					}
				?>
								
               </thead>
        </table>
    </div>
  </div>
 </div>
</div>
</div>
        </div>
        </div>

</div>


<?php include_once('include/footer.php')  ?>