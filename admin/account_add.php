<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>
		

		
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title mt-5">Account Head</h3> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form method='post' action="">
							<div class="row formtype">
								<div class="col-md-6">
									<div class="form-group">
										<label>Head Name</label>
										<input class="form-control" type="text" name='head_name'> </div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label>Head Code</label>
										<input type="text" class='form-control' name='head_code'>
									</div>
								</div>
								
								<button type="submit" class="btn btn-primary buttonedit1"  >SAVE AC</button>
						</form>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>


	<?php
		if($_POST){
			$rs=$mysqli->common_create('tbl_ac_head',$_POST);
			if(!$rs['error']){
				echo "<script>window.location='account_list.php'</script>";
				
			}else{
				echo $rs['error'];
			}
		}
	?>






	
</body>
</html>


<?php require_once('include/footer.php') ?>