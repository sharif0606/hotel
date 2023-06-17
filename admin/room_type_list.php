﻿<?php require_once('include/header.php') ?>

<link href="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
<?php require_once('include/sidebar.php') ?>
		
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<div class="mt-5">
						<h4 class="card-title float-left mt-2">All Room Type</h4> 
						<a href="room_type_add.php" class="btn btn-primary float-right veiwbutton">Add Room</a> </div>
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
										<th>Room Type</th>
										<th>AC / Non AC</th>
										<th>Food</th>
										<th>Bed</th>
										<th>Cancel Charge</th>
										<th>Rent</th>
										<th>Note</th>
										<th>Image</th>
										<th class="text-right">Actions</th>
									</tr>
								</thead>
								<tbody>
				<?php
					$rs=$mysqli->common_select('tbl_room_type');
					$food=array('','Free Breakfast','Free Lunch','Free Dinner','Free Breakfast & Dinner','No Free Food');
					$cancel=array('Free',5=>'5% Before 24Hours',100=>'No Cancellation Allow');
					if($rs['data']){
						foreach($rs['data'] as $i=>$d){
				?>
				<tr>
					<td><?= ++$i ?></td>
					<td><?= $d->room_type ?></td>
					<td><?= $d->aircondition?"AC":"Non AC" ?></td>
					<td><?= $food[$d->food] ?></td>
					<td><?= $d->bed_count ?></td>
					<td><?= $cancel[(int)$d->cancel_charge] ?></td>
					<td><?= $d->rent ?></td>
					<td><?= $d->remarks ?></td>
					<td><img src="<?= $base_url?>../upload/room/<?= $d->image ?>" width="100px" alt=""></td>
					<td class="text-right">
						<a href="<?= $base_url ?>room_type_edit.php?id=<?= $d->id ?>"><i class="fa fa-edit"></i></a>
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

<script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.js"></script>
<script>
	$(document).ready(function () {
    $('.datatable').DataTable();
});
</script>