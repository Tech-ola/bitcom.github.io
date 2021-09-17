<!DOCTYPE html>
<html>
<head>
	<title>PHP Polling System</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="tan">   
<center><b><font color="#000" size="6">PHP Polling System</font></b></center><br><br>
<body>
<div id="page">
	<div id="header">
		<h1>Invalid Credentials Provided </h1>
		<p align="center">&nbsp;</p>
	</div>
	<div id="container">
<?php
ini_set ("display_errors", "1");
error_reporting(E_ALL);
ob_start();
session_start();
	$host="localhost";
	$username="root";
	$password="";
	$db_name="poll";
	$tbl_name="tbMembers";

$conn = mysqli_connect("$host", "$username", "$password")or die("cannot connect");
mysqli_select_db($conn,"$db_name")or die("cannot select DB");
	$myusername=$_POST['myusername'];
	$mypassword=$_POST['mypassword'];
	$encrypted_mypassword=md5($mypassword);
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysqli_real_escape_string($conn,$myusername);
	$mypassword = mysqli_real_escape_string($conn,$mypassword);
	$sql="SELECT * FROM $tbl_name WHERE email='$myusername' and password='$encrypted_mypassword'" or die(mysqli_error($conn));
	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$count=mysqli_num_rows($result);

if($count==1){
	$user = mysqli_fetch_assoc($result);
	$_SESSION['member_id'] = $user['member_id'];
	header("location:student.php");
}
else {
	echo "Wrong Username or Password<br><br>Return to <a href=\"login.html\">login</a>";
}
ob_end_flush();
?>
	</div>
	<div id="footer"> 
		<div class="bottom_addr">Sourcecodester &copy; @2016</div>
	</div>
</div>
</body>
</html>