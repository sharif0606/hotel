<?php 
  session_start();
  if(isset($_SESSION['userid'])){
    echo "<script>window.location='dashboard.php'</script>";
    exit;
  }
  $base_url="http://localhost:8080/hotel/admin/";
  require_once('../class/crud.php');
  $mysqli= new crud;
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Hotel Dashboard Template</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?= $base_url?>../assets/img/favicon.png">
	<link rel="stylesheet" href="<?= $base_url?>../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= $base_url?>../assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= $base_url?>../../assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="<?= $base_url?>../assets/css/feathericon.min.css">
	<link rel="stylesheet" href="<?= $base_url?>../assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="<?= $base_url?>../assets/css/style.css"> </head>

<body>
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
				<div class="login-left"> <img class="img-fluid" src="../assets/img/main_logo.jpg" alt="Logo"> </div>
					<div class="login-right">
						<div class="login-right-wrap">
							<h1>Login</h1>
							<p class="account-subtitle">Access to our dashboard</p>
							<form action="" method="post">
								<div class="form-group">
									<input class="form-control"  name="email" type="text" placeholder="Email"> </div>
								<div class="form-group">
									<input class="form-control" name="password" type="text" placeholder="Password"> </div>
								<div class="form-group">
									<button class="btn btn-primary btn-block" type="submit">Login</button>
								</div>
							</form>


	<?php
        if($_POST){
          $where['email']=$_POST['email'];
          $where['password']=sha1(md5($_POST['password']));
          
          $rs=$mysqli->common_select('tbl_users','*',$where);
          if(!$rs['error']){
            session_start();
            if(isset($rs['data'][0])){
              $_SESSION['userid']=$rs['data'][0]->id;
              $_SESSION['username']=$rs['data'][0]->name;
              $_SESSION['contact']=$rs['data'][0]->contact_no;
              $_SESSION['email']=$rs['data'][0]->email;
              $_SESSION['image']=$rs['data'][0]->image;
            }
            echo "<script>window.location='dashboard.php'</script>";
          }else{
            echo $rs['error'];
          }
        }

	?>

							<div class="text-center forgotpass"><a href="forgot-password.php">Forgot Password?</a> </div>
							<div class="login-or"> <span class="or-line"></span> <span class="span-or">or</span> </div>
							<div class="social-login"> <span>Login with</span> <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a><a href="#" class="google"><i class="fab fa-google"></i></a> </div>
							<div class="text-center dont-have">Don’t have an account? <a href="register.php">Register</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= $base_url?>../assets/js/jquery-3.5.1.min.js"></script>
	<script src="<?= $base_url?>../assets/js/popper.min.js"></script>
	<script src="<?= $base_url?>../assets/js/bootstrap.min.js"></script>
	<script src="<?= $base_url?>../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?= $base_url?>../assets/js/script.js"></script>
</body>

</html>