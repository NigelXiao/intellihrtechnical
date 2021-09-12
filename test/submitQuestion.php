<?php
  include('config.php');
  $username = $_GET['user'];
?>
<html">
   
   <head>
      <title>Questions </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
	  
	  <form action = "submitQuestion.php?user=
	  <?php 
	  	echo $username
	  ?>&submit=1
	  " method = 'POST'>
	  <label for='colourSelect' >What colour are your toes today?</label>
	  <select name='colourSelect' id="colourSelect">
      <option value ="normal" selected = "selected" >Normal coloured</option>
      <option value ="orange" >Orange</option>
      <option value ="blue" >Blue</option>
	  </select><br>
	  <label for='feeling' >At any point this week, did you experience overwhelming feelings of doom?</label>
	  <input type='text' name='feeling' id='feeling' value='' maxlength="50" /><br>
	  <label for='isAlive' >Are you currently alive?</label>
	  <input type='text' name='isAlive' id='isAlive' value='' maxlength="50" /><br>
	  <label for='isCake' >Was there cake?</label>
	  <input type='text' name='isCake' id='isCake' value='' maxlength="50" required /><br>
	  <input type='button' value='submit'>
	  </form>
	  <?php
		if (!$_GET['submit']) {
			$sql = 'select subId from testSubmissions
					order by subId desc';
			$result = mysqli_query($db, $sql);
			$row = mysqli_fetch_array($result);
			if (!empty($row)) {
				$newSubId = $row['subId'] + 1;
			}
			$date = date("1");
			$sql = "INSERT INTO testSubmissions
						VALUES ('$newSubId','$date','$login_session','$newSubId')
				";
				if (!mysqli_query($db,$sql))
				  {
				  die('Error: ' . mysqli_error());
				  }
				$selectColor = $_POST['colourSelect'];
				$feeling = $_POST['feeling'];
				$isAlive = $_POST['isAlive'];
				$isCake = $_POST['isCake'];
				$sql = "INSERT INTO ResponsesOptions
						VALUES ('$newSubId','$selectColor','$feeling','$isAlive','$isCake')
				";
				if (!mysqli_query($db,$sql))
				  {
				  die('Error: ' . mysqli_error());
				  }
				header("location: welcome.php");
			}
		?>
   </body>
   
</html>
