<?php
session_start(); 
require_once('connectdb.php');
if(isset($_POST) & !empty($_POST)){
	
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$sql = "SELECT * FROM `users` WHERE username = '$username'";
	$res = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){
		echo "Send email to user with password";
	}else{
		echo "User name does not exist in database";
	}
}
?>
<!DOCTYPE HTML>  
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="styles.css" >

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>  
<form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Forgot Password</h2>
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">Enter</span>
	  <input type="text" name="username" class="form-control" placeholder="Username" required>
	</div>
	<br />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Restore Password</button>
        <li class="active"><a href="login.php">Log in</a></li>
    </form>
</body>
</html>
