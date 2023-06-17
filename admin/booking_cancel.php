<?php require_once('include/header.php'); ?>
<?php require_once('include/sidebar.php'); ?>


<?php
  $where['id']=$_GET['id'];
  $rs=$mysqli->common_delete('tbl_booking',$where);
    if(!$rs['error']){
      echo "<script>window.location='booking_list.php'</script>";
    }else{
        echo $rs['error'];
    }
  
?>

<?php require_once('include/footer.php'); ?>
