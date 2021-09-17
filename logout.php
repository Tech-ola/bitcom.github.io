<!DOCYPE html>
<html>
<head>
	<title>PHP Polling System</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="tan">
<center><b><font color="#000" size="6">PHP Polling System</font></b></center><br><br>
<div id="page">
	<div id="header">
		<h1>Logged Out Successfully</h1><hr/>
		<p align="center">&nbsp;</p>
	</div>
<?php
session_start();
session_destroy();
?>
	<h1 align="center">You have been successfully logged out.</h1>
	<p align="center">Return To <a href="login.html">Login</p></a>
	<div id="footer">
		<div class="bottom_addr">Sourcecodester &copy; @2016</div>
	</div>
</div>
</body>
</html>