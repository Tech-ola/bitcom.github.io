<?php
$conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
mysqli_select_db($conn,'poll') or die(mysqli_error($conn));

session_start();
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bincom Polling System</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="tan">  
<center><b><font color="#000" size="6">Bincom Polling System</font></b></center>
<div id="page">
	<div id="header">
		<h1>HOME-PAGE</h1><hr/>
		<ul class="nav navbar-nav" style="font-size="9px><li><a href="student.php"><h1>Home</h1></a></li><li><a href="vote.php"><h1>Display Result</h1></a></li><li><a href="total.php"><h1>Summed Total Result</h1></a></li><li><a href="manage-profile.php"><h1>Manage My Profile</h1></a></li><li><a href="logout.php"><h1>Logout</h1></a></li></ul>
	</div>
	<div id="container">
		<p align="center">Click a link above to do some stuff.</p>
		<img src="images/welcome.png" style="width: 480px;">
	</div>
	<div id="footer">
		<div class="bottom_addr">Alabi Olayinka Roqeeb &copy; @2021</div>
	</div>
</div>
</body>
</html>