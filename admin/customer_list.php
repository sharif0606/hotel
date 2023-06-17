<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
		

		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<div class="mt-5">
								<h4 class="card-title float-left mt-2">Customers</h4>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
								<div class="table-responsive">
									<table  class="datatable table table-stripped table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>#SL</th>
												<th>First Name</th>
												<th>Last Name</th>
												<th>Email</th>
												<th>Nationality</th>
												<th>NID No</th>
												<th>Contact No</th>
												<th class="text-right">Actions</th>
											</tr>
										</thead>

										
										<?php
											$rs=$mysqli->common_select("tbl_customer");
											if(!$rs['error']){
												foreach($rs['data'] as $i => $d){
										?>
                                    <tbody id="myTable">
										<tr>
												<td><?= ++$i ?></td>
												<td><?= $d->first_name ?></td>
												<td><?= $d->last_name?></td>
												<td><?= $d->email ?></td>
												<td><?= $d->nationality ?></td>
												<td><?= $d->nid_no ?></td>
												<td><?= $d->contact_no ?></td>
												<td class="text-right">
													<a href="<?= $base_url ?>customer_edit.php?id=<?= $d->id ?>"><i class="fa fa-edit"></i></a>
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

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>