<?php session_start(); ?>
<!DOCTYPE html>
<?php 
include('config.php');
include('header.php');

	if(isset($_POST['submit'])){
		$un= $_POST['uname'];
		$ps= $_POST['pass'];

			$q= "SELECT * FROM user WHERE username='$un' and password='$ps' ";
			$query=mysqli_query($conn,$q);
        	$row=mysqli_fetch_array($query);
        
        if($row['username']==$un && $row['password']==$ps){
          $_SESSION['semail']=$row['email'];
         echo "<script> window.location.href='index.php'</script>";
        }
        else{
          echo "<script type='text/javascript'> alert('wrong email and password');</script>";
        }
	}
?>
<html lang="en">
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>

				<form class="login100-form validate-form" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="uname" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<button type="submit" name = "submit" class="login100-form-btn">
							Login
						</button>
					</div>
					<div >
						Create a new account
							<a href="register.php" class="txt1">
							register
							</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>