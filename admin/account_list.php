<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>
		

		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<div class="mt-5">
								<h4 class="card-title float-left mt-2">Account Head List</h4>
								 <a href="account_add.php" class="btn btn-primary float-right veiwbutton">Add AC Head</a> </div>
						</div>
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
												<th>Head Name</th>
												<th>Head Code</th>
												<th>Head Type</th>
												<th class="text-right">Actions</th>
											</tr>
										</thead>

										<?php
											$rs=$mysqli->common_select("tbl_ac_head");
											if(!$rs['error']){
												foreach($rs['data'] as $d){
										?>

										<tr>
												<td><?= $d->id ?></td>
												<td><?= $d->head_name ?></td>
												<td><?= $d->head_code?></td>
												<td><?= $d->head_type==1?"Expense":"income" ?></td>
												
												
												<td class="text-right">
													<a href="<?= $base_url ?>account_edit.php?id=<?= $d->id ?>"><i class="fa fa-edit"></i></a>
												</td>
										</tr>

										<?php }
					}
				?>
										
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="delete_asset" class="modal fade delete-modal" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body text-center"> <img src="assets/img/sent.png" alt="" width="50" height="46">
							<h3 class="delete_class">Are you sure want to delete this Asset?</h3>
							<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>
<?php require_once('include/footer.php') ?>