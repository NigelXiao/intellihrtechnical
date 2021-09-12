<?php
   include('config.php');

   session_start();
   
   $user_check = $_SESSION['login_user'];
   $sql = "SELECT SubjectID FROM GLaDOS WHERE SubjectID = '$user_check'";
	  if (mysqli_query($db,$sql)) {
		  $row = mysqli_fetch_array(mysqli_query($db,$sql),MYSQLI_ASSOC);
	   
	   $login_session = $row['SubjectID'];
	  } else {
	   $ses_sql = mysqli_query($db,"select SubjectID from Subjects where SubjectID = '$user_check' ");
	   
	   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
	   
	   $login_session = $row['SubjectID'];
	  }
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>