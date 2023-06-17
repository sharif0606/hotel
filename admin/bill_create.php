<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>


<?php
	$con['id']=$_GET['id'];
	$data=$mysqli->common_select_query("SELECT tbl_room_type.rent,tbl_reservation.*,tbl_room.room_no,tbl_customer.first_name,tbl_customer.last_name,tbl_customer.contact_no FROM `tbl_reservation` 
	JOIN tbl_customer on tbl_reservation.customer_id=tbl_customer.id
	JOIN tbl_room on tbl_reservation.room_id=tbl_room.id
	JOIN tbl_room_type on tbl_room.room_type_id=tbl_room_type.id
	WHERE tbl_reservation.deleted_at is null and tbl_reservation.id=".$con['id']."");
	if($data){
		$d=$data['data'][0];
	}
	$check_in=date_create($d->check_in);
	$check_out=date_create($d->check_out);
	$diff=date_diff($check_in,$check_out);
	$staydate=$diff->format("%a");
?>



		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title mt-5">Customer Bill</h3> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form method="post" action="">
							<div class="row formtype">
								<div class="col-md-3">
									<div class="form-group">
										<label>First Name</label>
										<input readonly  class="form-control" type="text" value="<?= $d->first_name ?>">
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label>Last Name</label>
										<input  readonly class="form-control" type="text" value="<?= $d->last_name ?>">
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label>Check-in Date</label>
										<input readonly class="form-control" type="date"  value="<?= $d->check_in ?>"> </div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Check-out Date</label>
										<input readonly class="form-control" type="date" value="<?= $d->check_out ?>"> </div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<table class="table">
										<tr>
											<td>Check-in Date:</td>
											<td class="text-right"><?= $d->check_in ?></td>
										</tr>
										<tr>
											<td>Check-out Date:</td>
											<td class="text-right"><?= $d->check_out ?></td>
										</tr>
										<tr>
											<td style="font-weight:bold" class="text-right">Total (Days) :</td>
											<td style="font-weight:bold" class="text-right">
												<input type="hidden" name="num_days" value="<?= $staydate ?>">
												<?= $staydate ?>
											</td>
										</tr>
									</table>
									<table class="table">
										<tr>
											<td>Room Rent:</td>
											<td class="text-right"><?= $d->rent ?></td>
										</tr>
										<tr>
											<td style="font-weight:bold" class="text-right">Total (Amount) :</td>
											<td style="font-weight:bold" class="text-right">BDT <?= $d->rent*$staydate ?> </td>
										</tr>
									</table>
								</div>
								<div class="col-sm-6">
									<table class="table">
										<tr>
											<td>Amount</td>
											<td width="100px"><input class="form-control" type="hidden" name="amount" value="<?= $d->rent*$staydate ?>"></td>
											<td><?= $d->rent*$staydate ?></td>
										</tr>
										<tr>
											<td>Discount (%)</td>
											<td><input class="form-control" onkeyup="chek_total()" id="discount" type="text" name="discount" value=""></td>
											<td class="discount"></td>
										</tr>
										<tr>
											<td>VAT (%)</td>
											<td><input class="form-control" onkeyup="chek_total()" id="vat" type="text" name="vat"  value=""></td>
											<td class="vat"></td>
										</tr>
										<tr>
											<td>Service Charge (%)</td>
											<td><input class="form-control" onkeyup="chek_total()" id="service_charge" type="text" name="service_charge" value=""></td>
											<td class="service_charge"></td>
										</tr>
										<tr>
											<td>Total</td>
											<td><input class="form-control" type="hidden" name="total" id="total" value=""></td>
											<td class="total"></td>
										</tr>
										<input type="hidden" name="customer_id" value="<?= $d->customer_id ?>">
									</table>
								</div>
							</div>
							<button type="submit" class="btn btn-primary">Save</button>
						</form>
						<?php

							if($_POST){
								$_POST['created_at']=date('Y-m-d H:i:s');
								$rs=$mysqli->common_create("tbl_invoice",$_POST);
								if(!$rs['error']){
									$pudata['invoice_number']="INV_".$rs['data'];
									$upwhere['id']=$rs['data'];
									$mysqli->common_update("tbl_invoice",$pudata,$upwhere);
									$resup['status']=2;
									$mysqli->common_update("tbl_reservation",$resup,$con);
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
	</div>

	<?php require_once('include/footer.php') ?>
	<script>
		function chek_total(){
			let rent=<?= $d->rent*$staydate ?>;
			let discount=$("#discount").val()?parseFloat($("#discount").val()):0;
			let vat=$("#vat").val()?parseFloat($("#vat").val()):0;
			let service_charge=$("#service_charge").val()?parseFloat($("#service_charge").val()):0;
			
			if(discount>0){
				discount=(rent*(discount/100))
			}
			if(vat>0){
				vat=(rent*(vat/100))
			}
			if(service_charge>0){
				service_charge=(rent*(service_charge/100))
			}
			$(".discount").text("BDT "+discount);
			$(".vat").text("BDT "+vat);
			$(".service_charge").text("BDT "+service_charge);

			let total=((rent + service_charge + vat) -discount)
			$(".total").text("BDT "+total);
			$("#total").val(total);

		}
	</script>