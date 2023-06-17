<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>
<?php
	$con['id']=$_GET['id'];
	$data=$mysqli->common_select_single('tbl_room_type','*',$con);
	if($data){
		$data=$data['data'];
	}
?>
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title mt-5">Update Room Type</h3>
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
								<input required value="<?= $data->room_type ?>" type="text" class="form-control" id="room_type" name="room_type"/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>AC/NON-AC</label>
								<select class="form-control" id="aircondition" name="aircondition">
									<option value="1" <?= $data->aircondition?"selected":"" ?>>AC</option>
									<option value="0" <?= $data->aircondition?"":"selected" ?>>NON-AC</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<?php
									$food=array(1=>'Free Breakfast','Free Lunch','Free Dinner','Free Breakfast & Dinner','No Free Food');
								?>
								<label>Food</label>
								<select class="form-control" id="food" name="food">
									<?php foreach($food as $k=>$l){ ?>
										<option <?= $data->food==$k?"selected":"" ?> value="<?= $k ?>"><?= $l?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Bed Count</label>
								<select class="form-control" id="bed_count" name="bed_count">
									<option <?= $data->bed_count==1?"selected":"" ?> value="1">1</option>
									<option <?= $data->bed_count==2?"selected":"" ?> value="2">2</option>
									<option <?= $data->bed_count==3?"selected":"" ?> value="3">3</option>
									<option <?= $data->bed_count==4?"selected":"" ?> value="4">4</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<?php
									$cancel=array('Free',5=>'5% Before 24Hours',100=>'No Cancellation Allow');
								?>
								<label>Charges For cancellation</label>
								<select class="form-control" id="cancel_charge" name="cancel_charge">
									<?php foreach($cancel as $k=>$l){ ?>
										<option <?= $data->cancel_charge==$k?"selected":"" ?> value="<?= $k ?>"><?= $l?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Rent</label>
								<input type="text" value="<?= $data->rent ?>" class="form-control" id="rent" name="rent">
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
								<input type="text" value="<?= $data->remarks ?>" class="form-control" id="remarks" name="remarks">
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
						$_POST['updated_at']=date('Y-m-d H:i:s');
						$_POST['updated_by']=$_SESSION['userid'];
						$rs=$mysqli->common_update('tbl_room_type',$_POST,$con);
						//print_r($rs);
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