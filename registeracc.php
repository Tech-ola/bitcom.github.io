<!DOCTYPE html>
<html>
<head>
	<title>PHP Polling System</title>
	<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<script language="JavaScript" src="js/user.js"></script>
</head>
<body bgcolor="tan"> 
<center><b><font color = "brown" size="6">PHP Polling System</font></b></center>
<div id="page">
	<div id="header">
		<h1>Student Registration</h1><hr/>
	</div>
	<div id="container">
<?php
@$conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
mysqli_select_db($conn,'poll') or die(mysqli_error($conn));

if (isset($_POST['submit']))
{
	$myFirstName = addslashes( $_POST['firstname'] );
	$myLastName = addslashes( $_POST['lastname'] );
	$myEmail = $_POST['email'];
	$myPassword = $_POST['password'];
	$newpass = md5($myPassword);
	$sql = mysqli_query($conn, "INSERT INTO tbMembers(first_name, last_name, email, password) VALUES ('$myFirstName','$myLastName', '$myEmail', '$newpass')" )
		or die( mysqli_error($conn) );
die( "You have registered for an account.<br><br>Go to <a href=\"login.html\">Login</a>" );
}
echo "
<center><h3>Register An Account By Filling Up All The Information Below</h3></center><hr/>
 <form action='registeracc.php' method='post' onsubmit='return registerValidate(this)'>
  <div class='form-group'>
	<label for='name'>First Name:</label>
	<input type='text' class='form-control' name='firstname'>
  </div>
  <div class='form-group'>
	<label for='name'>Last Name:</label>
	<input type='text' class='form-control' name='lastname'>
  </div>
  <div class='form-group'>
	<label>Email Address:</label>
	<input type='text' class='form-control' name='email'>
  </div>
  <div class='form-group'>
	<label>New Password:</label>
	<input type='password' class='form-control' name='password'>
  </div>
  <div class='form-group'>
	<label>Confirm New Password:</label>
	<input type='password' class='form-control' name='ConfirmPassword'>
  </div>
  <button type='submit' name='submit' class='btn btn-default'>Register Account</button>
  <p align='center'>Already have an account? <a href='login.html'><b>Login Here</b></a>
</form>";
?>
	</div> 
	<div id="footer">
		<div class="bottom_addr">Sourcecodester &copy; @2016</div>
	</div>
</div>
</body>
</html>