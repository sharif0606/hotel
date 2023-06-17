<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>
		

		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<div class="mt-5">
								<h4 class="card-title float-left mt-2">Booking List</h4> 
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
												<th>First Name</th>
												<th>Last Name</th>
												<th>Email</th>
												<th>Nationality</th>
												<th>NID</th>
												<th>Phone Number</th>
												<th>Type Of Room</th>
												<th class="text-right">Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$rs=$mysqli->common_select_query("SELECT tbl_booking.*,tbl_room_type.room_type FROM `tbl_booking`
												join tbl_room_type on tbl_room_type.id=tbl_booking.room_type_id");
												if($rs['data']){
													foreach($rs['data'] as $i=>$d){
											?>
											<tr>
												<td><?= ++$i ?></td>
												<td><?= $d->first_name	?></td>
												<td><?= $d->last_name?"AC":"Non AC" ?></td>
												<td><?= $d->email ?></td>
												<td><?= $d->nationality ?></td>
												<td><?=$d->nid_no ?></td>
												<td><?= $d->contact_no ?></td>
												<td><?= $d->room_type ?></td>
												<td class="text-right">
													<a href="<?= $base_url ?>booking_confirm.php?id=<?= $d->id ?>"><i class="fa fa-check"></i></a>
													<a href="<?= $base_url ?>booking_cancel.php?id=<?= $d->id ?>"><i class="fa fa-times"></i></a>
												</td>
											</tr>
											<?php }} ?>
										
										
										</tbody>
									</table>
								</div>
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

<script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.js"></script>
<script>
	$(document).ready(function () {
    $('.datatable').DataTable();
});
</script>