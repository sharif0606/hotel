﻿<?php 
   $protocol = isset($_SERVER['HTTPS']) ? 'https' : 'http';
   $base_url="$protocol://".$_SERVER['SERVER_NAME']."/".explode('/',$_SERVER['SCRIPT_NAME'])[1]."/admin/";
  require_once('../class/crud.php');
  $mysqli= new crud;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Hotel Dashboard Template</title>
	<link rel="shortcut icon" type="image/x-icon" href="/img/favicon.png">
	<link rel="stylesheet"  href="<?= $base_url?>/../assets/css/bootstrap.min.css">
	<link rel="stylesheet"  href="<?= $base_url?>/../assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet"  href="<?= $base_url?>/../assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet"  href="<?= $base_url?>/../assets/css/feathericon.min.css">
	<link rel="stylesheet"  href="<?= $base_url?>/../assets/plugins/morris/morris.css">
	<link rel="stylesheet"  href="<?= $base_url?>/../assets/css/style.css"> </head>

<body>
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left"> <img class="img-fluid" src="../assets/img/main_logo.jpg" alt="Logo"> </div>
					<div class="login-right">
						<div class="login-right-wrap">
							<h1 class="mb-3">Register</h1>
							<form action="" method="post">
								<div class="form-group">
									<input class="form-control" name="name" type="text" placeholder="Name"> </div>
								<div class="form-group">
									<input class="form-control" name="email" type="text" placeholder="Email"> </div>
								<div class="form-group">
									<input class="form-control" name="password" type="text" placeholder="Password"> </div>
								<div class="form-group">
									<input class="form-control" name="cpassword" type="text" placeholder="Confirm Password"> </div>
								<div class="form-group mb-0">
									<button class="btn btn-primary btn-block" type="submit">Register</button>
								</div>
							</form>
		<?php
        if($_POST){
          $pass=trim($_POST['password']);
          $cpass=trim($_POST['cpassword']);
          if($pass !== $cpass){
            echo "Both password are not same";
            exit;
          }
          $_POST['password']=sha1(md5($_POST['password']));
          unset($_POST['cpassword']);
          $rs=$mysqli->common_create('tbl_users',$_POST);
          if(!$rs['error']){
            echo "<script>window.location='login.php'</script>";
          }else{
              echo $rs['error'];
          }
        }
      ?>

							<div class="login-or"> <span class="or-line"></span> <span class="span-or">or</span> </div>
							<div class="social-login"> <span>Register with</span> <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a><a href="#" class="google"><i class="fab fa-google"></i></a> </div>
							<div class="text-center dont-have">Already have an account? <a href="login.php">Login</a> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= $base_url?>assets/js/jquery-3.5.1.min.js"></script>
	<script src="<?= $base_url?>assets/js/popper.min.js"></script>
	<script src="<?= $base_url?>assets/js/bootstrap.min.js"></script>
	<script src="<?= $base_url?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?= $base_url?>assets/js/script.js"></script>
</body>

</html>