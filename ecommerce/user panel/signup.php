<?php 
require_once '../config/config.php';
if(isset($_POST['signup'])){
// $username=$_POST['username'];
// \<\?php
//preventing sql injection
$username=mysqli_real_escape_string($conn, $_POST['username']);
$email=mysqli_real_escape_string($conn, $_POST['email']);
$password=mysqli_real_escape_string($conn, $_POST['password']);
// Hashing /encrypting password
// 123 ---> 498rhfriy83Fuiyt43y4rify836784578y4erhfreh
$securePassword= password_hash($password,PASSWORD_BCRYPT);
// $securePassword= md5($password);
// echo $securePassword;

$query ="INSERT INTO `users`( `username`, `email`, `password`) VALUES ('$username','$email','$securePassword')";
$result = mysqli_query($conn,$query);
if($result){
	echo "<script>alert('Signup Success')
location.href ='./login.php'

</script>";
}else{
	echo "<script>alert('Failed to register user')


</script>";
}




}


?>





<!doctype html>
<html lang="en">
	<head>
		<title>Title</title>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, shrink-to-fit=no"
		/>

		<!-- Bootstrap CSS v5.2.1 -->
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="./css/style.css">
	</head>

	<body>
		<header>
			<!-- place navbar here -->
		</header>
		<main>


<div class="container my-5">
<form action="#" method="post">
<div class="row">


    <!-- Order Details -->
					<div class="mx-auto my-5 col-md-6 order-details">
						<div class="section-title text-center">
							<h3 class="title">Signup</h3>
						</div>
					
							<div class="form-group my-3">
								<input class="input" type="text" name="username" placeholder="Username">
							</div>
							
							<div class="form-group my-3">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group my-3">
								<input class="input" type="password" name="password" placeholder="Password">
							</div>
						
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>
						<button type="submit" name="signup" class="primary-btn order-submit">Signup</button>
					</div>
					</div>
					</form>
					</div>

		</main>
		<footer>
			<!-- place footer here -->
		</footer>
		<!-- Bootstrap JavaScript Libraries -->
		<script
			src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
			integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
			crossorigin="anonymous"
		></script>

		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
			integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
			crossorigin="anonymous"
		></script>
	</body>
</html>




					<!-- /Order Details -->

    
</body>
</html>