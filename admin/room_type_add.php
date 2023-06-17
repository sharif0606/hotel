<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>
		
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title mt-5">Add Room Type</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<form enctype="multipart/form-data" action="" method="post">
					<div class="row formtype">
						<div class="col-md-4">
							<div class="form-group">
								<label>Room Type <span class="text-danger">*</span></label>
								<input required type="text" class="form-control" id="room_type" name="room_type"/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>AC/NON-AC</label>
								<select class="form-control" id="aircondition" name="aircondition">
									<option value="1">AC</option>
									<option value="0">NON-AC</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Food</label>
									<?php
										$food=array(1=>'Free Breakfast','Free Lunch','Free Dinner','Free Breakfast & Dinner','No Free Food');
									?>
									<label>Food</label>
									<select class="form-control" id="food" name="food">
										<?php
											foreach($food as $k=>$l){
										?>
											<option value="<?= $k ?>"><?= $l?></option>
										<?php } ?>
									</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Bed Count</label>
								<select class="form-control" id="bed_count" name="bed_count">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Charges For cancellation</label>
								<select class="form-control" id="cancel_charge" name="cancel_charge">
									<option value="0">Free</option>
									<option value="5">5% Before 24Hours</option>
									<option value="100">No Cancellation Allow</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Rent</label>
								<input type="text" class="form-control" id="rent" name="rent">
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
						<div class="col-md-8">
							<div class="form-group">
								<label>Note</label>
								<input type="text" class="form-control" id="remarks" name="remarks">
							</div>
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-primary">Save</button>
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
						$rs=$mysqli->common_create('tbl_room_type',$_POST);
						if(!$rs['error']){
							echo "<script>window.location='room_type_list.php'</script>";
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