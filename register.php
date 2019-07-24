<!DOCTYPE html>
<?php
include('config.php');
include('header.php');
?>
<html lang="en">
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Registation
					</span>
				</div>
				<form class="login100-form validate-form" method="POST" action="">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Firstname is required">
						<span class="label-input100">Firstname</span>
						<input class="input100" type="text" name="fname" placeholder="Enter Firstname">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Lastname is required">
						<span class="label-input100">Lastname</span>
						<input class="input100" type="text" name="lname" placeholder="Enter Lastname">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="uname" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Enter Email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">

						<button type="submit" name="submit" class="login100-form-btn">
							Sign Up
						</button>
					</div>
					<div >
						if you have already account 
							<a href="login.php" class="txt1">
							Login
							</a>
					</div>
				</form>
			</div>
<?php
    if(isset($_POST['submit']))
          {          
           $fn=$_POST['fname'];
           $ln=$_POST['lname'];
           $un=$_POST['uname'];
            $e=$_POST['email'];
            $p=$_POST['password'];
           
        $q= "INSERT INTO user (fname,lname,username,email,password) VALUES ('$fn','$ln','$un','$e','$p')";
        $query=mysqli_query($conn,$q); 
           print_r($q);
        if (!$query) {
          echo " data not inserted";
        }
        else{
          echo "<script> window.location.href='login.php'</script>";

        }
      }
?>
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