<?php
$conn = mysqli_connect('localhost', 'root', '') or die("Connection Failed");
mysqli_select_db($conn,'poll') or die(mysqli_error($conn));

session_start();
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}
?>
<?php
	$lga=mysqli_query($conn,"SELECT * FROM `polling_unit`")
or die("There are no records to display ... \n" . mysqli_error($conn)); 
?>
<?php
if (isset($_POST['Submit']))
{
	$unit_name = addslashes( $_POST['unit_name'] );
	$result = mysqli_query($conn,"SELECT * FROM `polling_unit` WHERE polling_unit_name='$unit_name'")
or die(" There are no records at the moment ... \n"); 
}
else
?>
<!DOCTYPE html>
<html>
<head>
	<title> Bincom Polling System</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/user_styles.css" rel="stylesheet" type="text/css" />   
	<script language="JavaScript" src="js/user.js"></script>
	<script language="JavaScript" src="js/jquery-1.2.6.min.js"></script>
<script type="text/javascript">
function getVote(int)
{
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.open("GET","save.php?vote="+int,true);
xmlhttp.send();
}

function getlga_name(String)
{
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.open("GET","total.php?lga_name="+String,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">
$(document).ready(function(){
   var $ = jQuery.noConflict();
    $(document).ready(function()
    {
       // setInterval(function(i){
       //      $.ajax({
       //        url: "admin/refresh.php",
       //        cache: false,
       //        success: function(html){
       //          $(".refresh").html(html);
       //        }
       //      })
       //  },1000)
        
    });
   $('.refresh').css({color:"green"});
});
</script>
</head>
<body bgcolor="tan">    
<center><b><font color="#000" size="6">Bincom Polling System</font></b></center><br><br>
<div id="page">
	<div id="header">
		<h1>CURRENT POLLS</h1><hr/>
		<ul class="nav navbar-nav" style="font-size="9px><li><a href="student.php"><h1>Home</h1></a></li><li><a href="vote.php"><h1>Display Result</h1></a></li><li><a href="total.php"><h1>Summed Total Result</h1></a></li><li><a href="manage-profile.php"><h1>Manage My Profile</h1></a></li><li><a href="logout.php"><h1>Logout</h1></a></li></ul>
	</div>
	<div class="refresh"></div>
	<div id="container">
		<table width="420" align="center">
		<form name="fmNames" id="fmNames" method="post" action="total.php" onsubmit="return positionValidate(this)">
		<tr>
			<td>Choose polling unit name</td>
			<td><SELECT NAME="unit_name" id="unit_name" onclick="getlga_name(this.value)">
	 		<OPTION VALUE="select">select
		<?php 
		while ($row=mysqli_fetch_array($lga)){
		echo "<OPTION ".( isset($_POST['lga'] ) && $row['polling_unit_name'] == $_POST['polling_unit_name'] ? 'selected' : '').">$row[polling_unit_name]"; 
		}
		?>
				</SELECT></td>
			<td><input type="submit" name="Submit" value="Polling Result" /></td>
		</tr>
		</form> 
		</table>
		<table width="270" align="center">
		<form>
		<tr>
			<th>Individual Polling Unit:</th>
		</tr>
		<?php
		if (isset($_POST['Submit'])){
		while ($row=mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<tr>";
            echo"<h5>Unique Id</h5>";
        echo "<td>" . $row['uniqueid']."</td>";echo "</tr>";
        echo "<tr>";
        echo"<h5>Polling_unit</h5>";
        echo "<td>" . $row['polling_unit_id']."  "."</td>";echo "</tr>";
        echo "<tr>";
        echo"<h5>Ward Id</h5>";
        echo "<td>" . $row['ward_id']."\n"."</td>";
        echo "</tr>";
        echo "<tr>";
        echo"<h5>LGA Id</h5>";
        echo "<td>" . $row['lga_id']."\n"."</td>";
        echo "</tr>";
        echo "<tr>";
        echo"<h5>Uniqueward Id</h5>";
        echo "<td>" . $row['uniquewardid']."</td>";
		echo "</tr>";
        echo "<tr>";
        echo"<h5>Polling_unit_description</h5>";
        echo "<td>" . $row['polling_unit_description']."</td>";
		echo "</tr>";
        echo "<tr>";
        echo"<h5>lat</h5>";
        echo "<td>" . $row['lat']."\n"."</td>";
		echo "</tr>";
        echo "<tr>";
        echo"<h5>long</h5>";
        echo "<td>" . $row['long']."</td>";
		echo "</tr>";
        echo "<td><input type='radio' name='vote' value='$row[polling_unit_name]' onclick='getVote(this.value)' /></td>";
		echo "</tr>";
		}
		mysqli_free_result($result);
		mysqli_close($conn);
		  }
		else
		?>
		</form>
		</table>
</div>
	<div id="footer"> 
		<div class="bottom_addr">Alabi Olayinka Roqeeb &copy; @2021</div>
	</div>
</body>
</html>