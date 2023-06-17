<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>
		
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title mt-5">Customer Edit</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<form  action="" method="post">
					<div class="row formtype">
						<div class="col-md-4">
							<div class="form-group">
								<label>First Name <span class="text-danger">*</span></label>
								<input required type="text" class="form-control" id="first_name" name="first_name"/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Last Name</label>
								<input required type="text" class="form-control" id="last_name" name="last_name"/>
								
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Email</label>
								<input required type="text" class="form-control" id="email" name="email"/>
									
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Nationality</label>
								<input required type="text" class="form-control" id="nationality" name="nationality"/>
								
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>NID No</label>
								<input required type="text" class="form-control" id="nid_no" name="nid_no"/>
								
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Contact No</label>
								<input type="text" class="form-control" id="contact_no" name="contact_no">
							</div>
						</div>
						
						
						<div class="col-12">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</div>
				</form>
				<?php
					if($_POST){
						
						$_POST['created_at']=date('Y-m-d H:i:s');
						$_POST['created_by']=$_SESSION['userid'];
						$rs=$mysqli->common_create('tbl_room_type',$_POST);
						if(!$rs['error']){
							echo "<script>window.location='customer_list.php'</script>";
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