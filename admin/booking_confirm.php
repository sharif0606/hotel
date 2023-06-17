<?php require_once('include/header.php') ?>
<?php require_once('include/sidebar.php') ?>
<?php

    $where['id']=$_GET['id'];
    $data=$mysqli->common_select_single('tbl_booking','*',$where);
    if(!$data['error'])
        $d=$data['data'];
    else
        echo "<h2 class='text-danger text-center'>This url is not correct</h2>";


    /* check if customer is old or new */
    $custwhere['nid_no']=$d->nid_no;
    $data=$mysqli->common_select_single('tbl_customer','*',$custwhere);
    if(!$data['error'])
        $oldcust=$data['data'];

?>
<?php
    if($_POST){
        if(isset($oldcust) and empty($oldcust)){
            $pdata['first_name']=$_POST['first_name'];
            $pdata['last_name']=$_POST['last_name'];
            $pdata['email']=$_POST['email'];
            $pdata['nationality']=$_POST['nationality'];
            $pdata['nid_no']=$_POST['nid_no'];
            $pdata['contact_no']=$_POST['contact_no'];
            $pdata['created_at']=date('Y-m-d H:i:s');
            $rs=$mysqli->common_create('tbl_customer',$pdata);
            if(!$rs['error'])
                $customer_id=$rs['data'];
        }else{
            $customer_id=$oldcust->id;
        }
        if($customer_id){
            $appdata['customer_id']=$customer_id;
            $appdata['room_id']=$_POST['room_id'];
            $appdata['check_in']=$_POST['check_in'];
            $appdata['check_out']=$_POST['check_out'];
            $appdata['status']=1;
            $appdata['created_at']=date('Y-m-d H:i:s');
            $rs=$mysqli->common_create('tbl_reservation',$appdata);
            $mysqli->common_delete('tbl_booking',$where);
            echo "<script>window.location='reservation_list.php'</script>";
        }else{
            echo "something is wrong. Please try again";
        }
    }
?>       
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-5">
                        <h4 class="card-title float-left mt-2">Booking Confirm</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body booking_card">
                        <?php $read=""; if(isset($oldcust) and !empty($oldcust)){
                            echo "<h4 class='text-success pb-3'>This customer already is in customer list</h4>";
                            $read="readonly";
                        } ?>
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input <?= $read ?> name="first_name" class="form-control" value="<?= $d->first_name; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input <?= $read ?> name="last_name" class="form-control" value="<?= $d->last_name; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input <?= $read ?> name="email" type="email" class="form-control" value="<?= $d->email; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nationality </label>
                                        <input <?= $read ?> value="<?= $d->nationality; ?>" type="text" name='nationality' class='form-control'>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>NID/Passport No</label>
                                        <input <?= $read ?> type="text" name='nid_no' class='form-control' value="<?= $d->nid_no; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input <?= $read ?> name="contact_no" type ="text" class="form-control" value="<?= $d->contact_no; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Check-In</label>
                                        <input name="check_in" type ="date" class="form-control" value="<?= $d->check_in; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Check-Out</label>
                                        <input name="check_out" type ="date" class="form-control" value="<?= $d->check_out; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Room No</label>
                                        <select type ="text" name="room_id" class="form-control">
                                            <option value="">Select Room</option>
                                            <?php
                                                $roomcon['room_type_id']=$d->room_type_id;
                                                $rs=$mysqli->common_select('tbl_room','*',$roomcon);
                                                if($rs['data']){
                                                    foreach($rs['data'] as $d){
                                            ?>
                                                <option value="<?= $d->id ?>"><?= $d->room_no ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <input type="submit" value='Confirm' class='text-black btn btn-primary form-control p-2'>
                                </div>
                            </div>
                                    
                            
                            
                            
                               
			            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	
</body>
</html>
<?php require_once('include/footer.php') ?>