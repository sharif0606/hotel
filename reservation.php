<?php
include('include/header.php');
$roomid=$_GET['roomid'];
?>
	<div class="banner-bottom">
		<div class="container">	
			<div class="agileits_banner_bottom">
				<h3><span>RESERVATION</span> Fill all of your information.</h3>
                <?php
                    if($_POST){
                        $rs=$mysqli->common_create('tbl_booking',$_POST);
                        if(!$rs['error']){ ?>
                            <span style="font-weight:bold; font-size:26px; color:#0f2453">Your reservation request has been submitted. We will contact you soon.<a href="index.php">Visit Site</a></span>
                <?php }else{
                            echo $rs['error'];
                        }
                    }
                ?>
			</div>
			<div class="w3ls_banner_bottom_grids">
            <form name="form" method="post">
                <div class="row mb-5">
                    <div class="col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                PERSONAL INFORMATION
                            </div>
                            <div class="panel-body">
                            
							    <div class="form-group">
                                    <label>First Name</label>
                                    <input name="first_name" class="form-control" required>
                               </div>
							   <div class="form-group">
                                    <label>Last Name</label>
                                    <input name="last_name" class="form-control" required>
                               </div>
							   <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="email" class="form-control" required>
                               </div>
							   <div class="form-group">
                                    <label>Nationality <span class='text-danger'>*</span></label>
                                    <input requered type="text" name='nationality' class='form-control'>
                                </div>
								
								<div class="form-group">
                                    <label>NID/Passport No <span class='text-danger'>*</span></label>
                                    <input type="text" name='nid_no' class='form-control'>
								</div>
								<div class="form-group">
                                    <label>Phone Number</label>
                                    <input name="contact_no" type ="text" class="form-control" required>
                               </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-6 col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading" >
                                RESERVATION INFORMATION
                            </div>
                            <div class="panel-body">
                            <?php 
                                
                                $rs=$mysqli->common_select_query("SELECT * FROM `tbl_room_type` where tbl_room_type.id=$roomid");
                                if($rs['data']){
                                    $d=$rs['data'][0];
                                }
                                $food=array('','Free Breakfast','Free Lunch','Free Dinner','Free Breakfast & Dinner','No Free Food');
					            $cancel=array('Free',5=>'5% Before 24Hours',100=>'No Cancellation Allow');
                                
                            ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12 text-left">
                                        <p><img style="float:left; margin-right:5px;" src="<?= $base_url?>upload/room/<?= $d->image ?>" width="50%" style="margin:auto;" alt=" " class="img-responsive" />
                                        
                                            <?= $d->remarks ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 text-left">
                                            <b>Room Type :</b> <?= $d->room_type ?> <br>
                                            <b>Cancel Charge :</b> <?= $cancel[(int)$d->cancel_charge] ?> <br>
                                            <b>Rent :</b> <?= $d->rent ?> <br>
                                        </div>
                                        <div class="col-md-6 text-left">
                                            <b>Air-Condition :</b> <?= $d->aircondition?"AC":"Non AC" ?> <br>
                                            <b>Food :</b> <?= $food[$d->food] ?> <br>
                                            <b>Bed :</b> <?= $d->bed_count ?> <br>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="room_type_id" value="<?= $roomid ?>">
                                <div class="form-group">
                                    <label>Check-In</label>
                                    <input name="check_in" type ="date" class="form-control">
                                    
                                </div>
                                <div class="form-group">
                                    <label>Check-Out</label>
                                    <input name="check_out" type ="date" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" value='SUBMIT' class='text-black btn btn-primary form-control p-5'>
			</form>
            
			</div>
		</div>
	</div>	
	<!-- reservation -->
    
   <!-- test -->
   
<?php

 



$Name = '';

$LessonDate = '';

$StartTime = '';

$EndTime = '';

if (isset($_POST['submit'])) {

if(isset($_POST['firstName'])){ $Name = $_POST['firstName']; }

if(isset($_POST['LessonDate'])){ $LessonDate = $_POST['LessonDate']; }

if(isset($_POST['check_in'])){ $StartTime = $_POST['check_in']; }

if(isset($_POST['check_out'])){ $EndTime = $_POST['check_out']; }

 

 

$result = mysql_query("SELECT * FROM tbl_reservation WHERE LessonDate = '".mysql_real_escape_string($LessonDate)."' AND (StartTime >= '".mysql_real_escape_string($StartTime)."' AND StartTime <= '".mysql_real_escape_string($EndTime)."')");

if(!$result)

{

die(mysql_error());

}

 

if(mysql_num_rows($result) > 0)

{

die('<p>This date and time have already been booked. <a href="booking1.php">Please try another time</a>.</p>');

}

else

{

//insert new user data into Users table

$sql = "INSERT INTO `booking` ( `Name`, `LessonDate` , `StartTime` , `EndTime` ) VALUES( '{$Name}', '{$LessonDate}' , '{$StartTime}' , '{$EndTime}') ";

mysql_query($sql) or die(mysql_error());

echo "Booking Successful.<br />";

echo "<a href='text.php'> Send reminder text </a>";

}

 

} ?>
    
  <!-- test -->


<?php include('include/footer.php') ?>