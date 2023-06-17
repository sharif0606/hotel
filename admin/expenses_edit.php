<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>
		
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title mt-5">Edit Expenses</h3> </div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<form  method='post' action="">
					<div class="row formtype">
						<div class="col-md-4">
							<div class="form-group">
								<label>Particular</label>
								<select name="tbl_ac_head_id" id="" class="form-control">
									<?php
									$accw['head_type']=1;
										$rs=$mysqli->common_select('tbl_ac_head','*',$accw);
										if($rs['data']){
											foreach($rs['data'] as $d){
									?>
										<option value="<?= $d->id ?>"><?= $d-> head_name ?>-<?= $d->head_code ?></option>
									<?php } } ?>
								</select>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label>Date</label>
								<input type="date" class="form-control datetimepicker" name='trans_date'>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label>Amount</label>
								<input class="form-control" type="text" name='amount'>
							</div>
						</div>
						<button type="submit" class="btn btn-primary buttonedit mt-5">SAVE</button>
					</div>
				</form>
			</div>
		</div>
		
	</div>
</div>

<?php
		if($_POST){
			
			$_POST['head_type']=1;
			$rs=$mysqli->common_create('tbl_journal',$_POST);
			if(!$rs['error']){
				echo "<script>window.location='expenses_list.php'</script>";
			}else{
				echo $rs['error'];
			}
		}
	?>

<?php require_once('include/footer.php') ?>