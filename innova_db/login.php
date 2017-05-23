<?php 
session_start();
 require('connectdb.php');
if( isset($_POST['btn-login']) ) { 
    // Assign values to variables.
    $user = $_POST['username'];
    $pass = $_POST['password'];
    //checking value in database
    $stmt = $connection->prepare("SELECT * FROM `users` WHERE username=? and password=?");
    $stmt ->bind_param("ss", $username, $password);
     
    $username = $user;
    $password = $pass;
    $stmt ->execute();
     
    $result = $stmt->get_result();
    $rowNum = $result->num_rows;
     
    //session created for user
    if ($rowNum == 1){
    $_SESSION['username'] = $user;
    }else{
	$fmsg = "Invalid Login Credentials.";
		}
	}
	//User logs in
	if (isset($_SESSION['username'])){
	$username = $_SESSION['username'];
		header("Location: home.php");
	}
?>

<!DOCTYPE HTML>  
<html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
<link rel="stylesheet" href="styles.css" >

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>  
      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Login</h2>
        <div class="input-group">
     <span class="input-group-addon" id="basic-addon1">Enter</span>
	  <input type="text" name="username" class="form-control" placeholder="Username" required>
	</div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-login">Login</button>
        <a class="btn btn-lg btn-primary btn-block" href="register.php">Register</a>
         <li class="active"><a href="forgotpass.php">Forgot password?</a></li>
      </form>


</body>
</html>
