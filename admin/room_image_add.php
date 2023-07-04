<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>
		
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title mt-5">Add Room Image</h3> </div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<form action="" method="post" enctype='multipart/form-data'>
					<div class="row formtype">
						<div class="col-md-4">
							<div class="form-group">
								<label>Room Type</label>
								<select class="form-control" id="room_type_id" name="room_type_id">
									<?php
										$rs=$mysqli->common_select('tbl_room_type');
										if($rs['data']){
											foreach($rs['data'] as $d){
									?>
										<option value="<?= $d->id ?>"><?= $d-> room_type ?> (<?= $d->aircondition?"AC":"Non AC" ?>)</option>
									<?php } } ?>
								</select>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label>Room Image</label>
								<div class="custom-file mb-3">
									<input type="file" class="form-control" id="image" name="image">
								</div>
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<br>
								<button type="submit" class="btn btn-primary buttonedit ml-2">Save</button>
							</div>
						</div>
						
					</div>
				</form>
				<?php
					if($_POST){
						if($_FILES['image']['name']){
							$imgname=time().rand(1111,9999).'.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
							$rs=move_uploaded_file($_FILES['image']['tmp_name'],"../upload/room/$imgname");
							if($rs)
								$_POST['image']=$imgname;
						}

						$_POST['created_at']=date('Y-m-d H:i:s');
						$_POST['created_by']=$_SESSION['userid'];
						$rs=$mysqli->common_create('tbl_room_image',$_POST);
						if(!$rs['error']){
							echo "<script>window.location='room_image_list.php'</script>";
						}else{
							echo $rs['error'];
						}
					}
				?>
			</div>
		</div>
		
	</div>
</div>

<?php require_once('include/footer.php') ?>