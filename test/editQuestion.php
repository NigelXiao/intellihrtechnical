<?php
  include('config.php');
  $username = $_GET['user'];
?>
<html">
   
   <head>
      <title>Edit Questions </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $username; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
	  <form action = "editQuestion.php?user=
	  <?php 
	  	echo $username
	  ?>&submit=1
	  " method = 'POST'>
	  <label for='colourSelect' >What colour are your toes today?</label>
	  <input type='text' name='colourSelect' id='colourSelect' value='' maxlength="50" /><br>
	  <label for='normalColour' >Normal coloured</label>
	  <input type='text' name='normalColour' id='normalColour' value='' maxlength="50" /><br>
      <label for='orangeColour' >Orange</label>
	  <input type='text' name='orangeColour' id='orangeColour' value='' maxlength="50" /><br>
      <label for='blueColour' >Blue</label>
	  <input type='text' name='blueColour' id='blueColour' value='' maxlength="50" /><br>
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
				$selectColor = $_POST['colourSelect'];
				$normalColour = $_POST['normalColour'];
				$orangeColour = $_POST['orangeColour'];
				$blueColour = $_POST['blueColour'];
				$feeling = $_POST['feeling'];
				$isAlive = $_POST['isAlive'];
				$isCake = $_POST['isCake'];
				if (!empty($selectColor)) {
					$sql = "UPDATE testQuestions
						SET Label = '$selectColor'
						WHERE Id = 1
					";
					$result1 = mysqli_query($db,$sql);
				}
				if (!empty($normalColour)) {
					$sql = "UPDATE questionOptions
						SET OptionLabel = '$normalColour'
						WHERE OptionValue = normal
					";
					$result2 = mysqli_query($db,$sql);
				}
				if (!empty($orangeColour)) {
					$sql = "UPDATE questionOptions
						SET OptionLabel = '$orangeColour'
						WHERE OptionValue = orange
					";
					$result3 = mysqli_query($db,$sql);
				}
				if (!empty($blueColour)) {
					$sql = "UPDATE questionOptions
						SET OptionLabel = '$blueColour'
						WHERE OptionValue = blue
					";
					$result4 = mysqli_query($db,$sql);
				}
				if (!empty($feeling)) {
					$sql = "UPDATE testQuestions
						SET Label = '$feeling'
						WHERE Id = 2
					";
					$result5 = mysqli_query($db,$sql);
				}
				if (!empty($isAlive)) {
					$sql = "UPDATE testQuestions
						SET Label = '$isAlive'
						WHERE Id = 3
					";
					$result6 = mysqli_query($db,$sql);
				}
				if (!empty($isCake)) {
					$sql = "UPDATE testQuestions
						SET Label = '$isCake'
						WHERE Id = 4
					";
					$result7 = mysqli_query($db,$sql);
				}
				header("location: welcome.php");
			}
	  ?>
   </body>
   
</html>
