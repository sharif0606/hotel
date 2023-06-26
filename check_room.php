<?php
    require_once('class/crud.php');
    $mysqli=new crud;
    $room_type=$_GET['room_type'];
    $checkin=$_GET['checkin'];
    $checkout=$_GET['checkout'];
    $data=$mysqli->common_select_query("SELECT count(*) as bookroom,
     (select count(*) from tbl_room where tbl_room.room_type_id=1) as total_room
      FROM `tbl_reservation` WHERE room_id in (select id from tbl_room
       where tbl_room.room_type_id=$room_type) and `status`=1
        and `check_in` <= '$checkin' and `check_out` >= '$checkin'");
    if(!$data['error'])
        $d=array("error"=>false,"data"=>$data['data'][0]);
    else
        $d=array("error"=>true,"data"=>"No room available");
    
    echo json_encode($d);

?>