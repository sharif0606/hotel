<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>
<?php
	$con['id']=$_GET['id'];
	$data=$mysqli->common_select_query("SELECT tbl_reservation.*,tbl_room.room_no,tbl_customer.first_name,tbl_customer.last_name,tbl_customer.contact_no FROM `tbl_reservation` 
	JOIN tbl_customer on tbl_reservation.customer_id=tbl_customer.id
	JOIN tbl_room on tbl_reservation.room_id=tbl_room.id
	WHERE tbl_reservation.deleted_at is null and tbl_reservation.id=".$con['id']."");
	if($data){
		$d=$data['data'][0];
	}
?>	
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title mt-5">Update Room</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<form method="post" action="">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>First Name</label>
								<input readonly class="form-control" value="<?= $d->first_name; ?>">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Last Name</label>
								<input readonly class="form-control" value="<?= $d->last_name; ?>">
							</div>
						</div>
						
						<div class="col-sm-4">
							<div class="form-group">
								<label>Phone Number</label>
								<input readonly type ="text" class="form-control" value="<?= $d->contact_no; ?>">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Check-In</label>
								<input readonly name="check_in" type ="date" class="form-control" value="<?= $d->check_in; ?>">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Check-Out</label>
								<input readonly name="check_out" type ="date" class="form-control" value="<?= $d->check_out; ?>">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Room No</label>
								<select type ="text" name="room_id" class="form-control">
									<option value="">Select Room</option>
									<?php
										$rs=$mysqli->common_select('tbl_room');
										if($rs['data']){
											foreach($rs['data'] as $room){
									?>
										<option <?= $d->room_id==$room->id?"selected":"" ?> value="<?= $room->id ?>"><?= $room->room_no ?></option>
									<?php } } ?>
								</select>
							</div>
						</div>
						<div class="col-sm-12">
							<input type="submit" value='Confirm' class='text-black btn btn-primary form-control p-2'>
						</div>
					</div>
				</form>
				<?php
					if($_POST){
						$_POST['updated_at']=date('Y-m-d H:i:s');
						$_POST['updated_by']=$_SESSION['userid'];
						$rs=$mysqli->common_update('tbl_reservation',$_POST,$con);
						//print_r($rs);
						if(!$rs['error']){
							echo "<script>window.location='reservation_list.php'</script>";
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