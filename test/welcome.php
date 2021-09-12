<?php
include('config.php');
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $sql = "SELECT true FROM admin WHERE SubjectID = '$myusername' and Password = '$mypassword'";
	  if (mysqli_query($db,$sql)) {
		$_SESSION['login_user'] = $myusername;
		header("Location: welcome.php");
	  } else {
		$error = "Your Login Name or Password is invalid";
	  }
   }
      include('session.php');
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
	  
	  <?php if ($login_session == 'admin') {
		  ?> 
		<a href="editQuestion.phpuser=<?php
		  	echo $myusername;
		  ?>"><input type="button" value='Edit Question'></a>
		<a href="viewTestData.php?user=<?php
		  	echo $myusername;
		  ?>"><input type="button" value='View Test Data'></a>
		<a href="createNewSubjects.php?user=<?php
		  	echo $myusername;
		  ?>"><input type="button" value='Create New Subjects'></a>	  
		<a href="submitQuestion.php?user=<?php
		  	echo $myusername;
		  ?>"><input type="button" value='Submit Question'></a>
		<a href="viewMyData.phpuser=<?php
		  	echo $myusername;
		  ?>"><input type="button" value='View my Data'></a> <?php
	  }
	  ?>
   </body>
   
</html>
