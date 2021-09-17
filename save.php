<?php
	$vote = $_REQUEST['vote'];
	$conn = mysqli_connect("localhost","root","");
if (!$conn)
  {
  die('Could not connect: ' . mysqli_error($conn));
  }
mysqli_select_db($conn,"poll");
mysqli_query($conn,"UPDATE tbCandidates SET candidate_cvotes=candidate_cvotes+1 WHERE candidate_name='$vote'");
mysqli_close($conn);
?> 