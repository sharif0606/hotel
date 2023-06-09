﻿<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>
		
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<div class="mt-5">
						<h4 class="card-title float-left mt-2">All Photos</h4> 
						<a href="gallery_add.php" class="btn btn-primary float-right veiwbutton">Add Picture</a> </div>
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
										<th>Title</th>
										<th>Image</th>
										
										<th class="text-right">Actions</th>
									</tr>
								</thead>
								<tbody>
								<?php
					$rs=$mysqli->common_select_query("SELECT * FROM `tbl_gallery`");
					
					if($rs['data']){
						foreach($rs['data'] as $i=>$d){
				?>
				<tr>
					<td><?= ++$i ?></td>
					<td><?= $d->title ?></td>
					<td><img src="<?= $base_url?>../upload/gallery/<?= $d->image ?>" width="100px" alt=""></td>
					<td class="text-right">
						<a href="<?= $base_url ?>gallery_edit.php?id=<?= $d->id ?>"><i class="fa fa-edit"></i></a>
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
<tr>
										
<?php require_once('include/footer.php') ?>