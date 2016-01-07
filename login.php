<?php

	include 'inc/db_connect.php';


// for(i=0; i<count($dictory); i++){
// 	if(md5($dictory[$i]) == 'whatever your userpassword in hash format is'){
// 		print "I got you. $dictory[$i] is your password. Eat it loser.";
// 	}
// }

// print md5('x');
// print "<br />";
// print md5('xthisisalittlesalt');
// print "<br />";

// print md5(md5('xthisisalittlesalt').'gofalcons!!');
// exit;


	if(isset($_POST['email'])){

		$hashed_password = md5($_POST['password'] . "thisisalittlesalt");

		//USER SUBMITTED SOMETHING.
		//NOW WHAT?
		//Check to see if this user is in the DB!!
		$query = "SELECT * FROM users 
			WHERE email = '" . $_POST['email']."' 
				AND password = '".$hashed_password."' 
				AND access_level = 1";

		$result = mysql_query($query);
		if(mysql_num_rows($result) == 1){
			//We have a match!!
			//Set up a session var
			$_SESSION['username'] = $_POST['email'];
			header('Location: /admin.php');
		}else{
			//we do not have a match. Goodbye.
			header('Location: http://local-phpland.com/login.php?result=failure');
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<style type="text/css" media="screen">
			.form-signin{
				max-width: 330px;
				padding: 15px;
				margin: 0 auto;						
			}
	</style>
</head>
<body>

<?php 
	if($_GET['result'] == "failure"){
		print "<h1>Your login information does not match any record in our system. Please retry or contact Stephen.";
	}
?>
	<form class="form-signin" method="post" action="login.php">
		<h2 class="form-signin-heading">Please sign in</h2>
		<label for="inputEmail" class="sr-only">Email address</label>
		<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
		<div class="checkbox">
			<label>
			<input type="checkbox" value="remember-me"> Remember me
			</label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		</form>
}

</body>
</html>


