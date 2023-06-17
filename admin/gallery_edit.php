<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>
		
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title mt-5">Add Pictures</h3> </div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<form action="" method="post" enctype='multipart/form-data'>
					<div class="row formtype">
						<div class="col-md-4">
							<div class="form-group">
								<label>Title</label>
								<input type="text" name='title' class='form-control'>
								
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Image</label>
								<input type="file" class="form-control"  name="image">
							</div>
						</div>
						<div class="col-md-4">
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
							$rs=move_uploaded_file($_FILES['image']['tmp_name'],"../upload/gallery/$imgname");
							if($rs)
								$_POST['image']=$imgname;
						}

						$_POST['created_at']=date('Y-m-d H:i:s');
						$_POST['created_by']=$_SESSION['userid'];
						$rs=$mysqli->common_create('tbl_gallery',$_POST);
						if(!$rs['error']){
							echo "<script>window.location='gallery_list.php'</script>";
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