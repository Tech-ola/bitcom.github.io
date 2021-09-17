<?php
$conn = mysqli_connect('localhost', 'root', '') or die("Connection Failed");
mysqli_select_db($conn,'poll') or die(mysqli_error($conn));

session_start();
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
} 
	$result=mysqli_query($conn,"SELECT * FROM tbMembers WHERE member_id = '$_SESSION[member_id]'")
or die("There are no records to display ... \n" . mysqli_error($conn)); 
if (mysqli_num_rows($result)<1){
    $result = null;
}
	$row = mysqli_fetch_array($result);
if($row)
{
	$stdId = $row['member_id'];
	$firstName = $row['first_name'];
	$lastName = $row['last_name'];
	$email = $row['email'];
}
?>
<?php
if (isset($_POST['update'])){
	$myId = addslashes($_GET['id']);
	$myFirstName = addslashes( $_POST['firstname'] );
	$myLastName = addslashes( $_POST['lastname'] );
	$myEmail = $_POST['email'];
	$myPassword = $_POST['password'];
	$newpass = md5($myPassword);
	$sql = mysqli_query($conn, "UPDATE tbMembers SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail', password='$newpass' WHERE member_id = '$myId'" )
        or die( mysqli_error($conn) );
header("Location: manage-profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bincom Polling System</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
	<script language="JavaScript" src="js/user.js"></script>
</head>
<body bgcolor="tan">
<center><b><font color="#000" size="6">Bincom Polling System</font></b></center><br><br>
<div id="page">
	<div id="header">
		<h1>MANAGE MY PROFILE</h1><hr/>
		<ul class="nav navbar-nav" style="font-size="9px><li><a href="student.php"><h1>Home</h1></a></li><li><a href="vote.php"><h1>Display Result</h1></a></li><li><a href="vote.php"><h1>Summed Total Result</h1></a></li><li><a href="manage-profile.php"><h1>Manage My Profile</h1></a></li><li><a href="logout.php"><h1>Logout</h1></a></li></ul>
	</div>
	<div id="container">
	<td>
	<table width="380" align="center">
	<CAPTION><h3>MY PROFILE</h3></CAPTION>
		<tr>
			<td>Student Id:</td>
			<td><?php echo $stdId; ?></td>
		</tr>
		<tr>
			<td>First Name:</td>
			<td><?php echo $firstName; ?></td>
		</tr>
		<tr>
			<td>Last Name:</td>
			<td><?php echo $lastName; ?></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><?php echo $email; ?></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td>Encrypted</td>
		</tr>
	</table>
	</td>
	<CAPTION><hr/><h3>UPDATE PROFILE</h3></CAPTION>
	<form action="manage-profile.php?id=<?php echo $_SESSION['member_id']; ?>" method="post" onsubmit="return updateProfile(this)">
		<div class="form-group">
			<label for="name">First Name:</label>
			<input type="text" class="form-control" name="firstname">
		</div>
		<div class="form-group">
			<label for="name">Last Name:</label>
			<input type="text" class="form-control" name="lastname">
		</div>
		<div class="form-group">
			<label>Email Address:</label>
			<input type="text" class="form-control" name="email">
		</div>
		<div class="form-group">
			<label>New Password:</label>
			<input type="password" class="form-control" name="password">
		</div>
		<div class="form-group">
			<label>Confirm New Password:</label>
			<input type="password" class="form-control" name="ConfirmPassword">
		</div>
			<button type="submit" name="update" class="btn btn-default">Update Profile</button>
	</form>
	<hr>
	</div>
	<div id="footer"> 
	<div class="bottom_addr">Alabi Olayinka Roqeeb &copy; @2021</div>
	</div>
</div>
</body>
</html>