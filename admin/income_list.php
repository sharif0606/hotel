<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>

<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				
				<div class="col">
					<div class="mt-5">
						<h4 class="card-title float-left mt-2">Income List</h4> 
						<a href="income_add.php" class="btn btn-primary float-right veiwbutton">Add Income</a> </div>
				</div>
			</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card card-table">
					<div class="card-body booking_card">
						<div class="table-responsive">
							<table class="datatable table table-stripped table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>#SL</th>
										<th>Particular</th>
										<th>Transaction Date</th>
										<th>Amount</th>
									</tr>
								</thead>
								<tbody>
								<?php
									
									$rs=$mysqli->common_select_query("SELECT tbl_journal.*,tbl_ac_head.head_name,tbl_ac_head.head_code FROM `tbl_journal` 
									join tbl_ac_head on tbl_ac_head.id=tbl_journal.tbl_ac_head_id
									WHERE tbl_journal.head_type=2");
									if($rs['data']){
										foreach($rs['data'] as $i=>$d){
								?>
				
				<tr>
					<td><?= ++$i ?></td>
					<td><?= $d->head_name ?> - <?= $d->head_code ?></td>
					<td><?= $d->trans_date ?></td>
					<td><?= $d->amount ?></td>
					<td class="text-right">
						<a href="<?= $base_url ?>income_edit.php?id=<?= $d->id ?>"><i class="fa fa-edit"></i></a>
					</td>

				</tr>
				<?php }
					}
				?>
									
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

									
								
										
<?php require_once('include/footer.php') ?>