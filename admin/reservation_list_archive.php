<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>
		
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<div class="mt-5">
						<h4 class="card-title float-left mt-2">Reservation List</h4> 
						
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
										<th>Phone Number</th>
										<th>Room</th>
										<th>Check In</th>
										<th>Check Out</th>
									</tr>
								</thead>
								<tbody>
				<?php
					$rs=$mysqli->common_select_query("SELECT tbl_reservation.*,tbl_room.room_no,tbl_customer.first_name,tbl_customer.last_name,tbl_customer.contact_no FROM `tbl_reservation` 
					JOIN tbl_customer on tbl_reservation.customer_id=tbl_customer.id
					JOIN tbl_room on tbl_reservation.room_id=tbl_room.id
					WHERE tbl_reservation.deleted_at is null");
					if($rs['data']){
						foreach($rs['data'] as $i=>$d){
				?>
				<tr>
					<td><?= ++$i ?></td>
					<td><?= $d->first_name	?></td>
					<td><?= $d->last_name ?></td>
					<td><?= $d->contact_no ?></td>
					<td><?= $d->room_no ?></td>
					<td><?= $d->check_in ?></td>
					<td><?= $d->check_out ?></td>
				
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