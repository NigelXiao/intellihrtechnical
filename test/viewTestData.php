<?php
  include('config.php');
  $username = $_GET['user'];
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $username ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
	  <form action = "viewTestData.php?user=
	  <?php 
	  	echo $username
	  ?>&search=1
	  " method = 'POST'>
	  <label for='searchID' >ID</label>
	  <input type='text' name='searchID' id='searchID' value='' maxlength="50" /><br>
	  <label for='searchDate' >Date</label>
	  <input type='text' name='searchDate' id='searchDate' value='' maxlength="50" /><br>
	  <label for='searchSubjectId' >SubjectId</label>
	  <input type='text' name='searchSubjectId' id='searchSubjectId' value='' maxlength="50" /><br>
	  <input type='submit' value='Search'>
	  </form>
	  
   
   <?php
	if (!$_GET['search']) {
		$result1 = mysqli_query($db, "SELECT * from testSubmissions");
			echo "<table><tr><td>Id</td><td>Date</td><td>SubjectID</td><td>Responses</td></tr>";
			while($row=mysqli_fetch_array($result1)){
				echo "<tr>";
				echo "<td>".$row['subId']."</td>";
				echo "<td>".$row['testDate']."</td>";
				echo "<td>".$row['SubjectId']."</td>";
				$response = $row['Responses'];
				$result2 = mysqli_query($db, "SELECT * from ResponsesOptions where Responses = '$response'");
				$responseRows=mysqli_fetch_array($result2)
				echo "<td>".$responseRows['ResponsesQuestion1']."</td>";
				echo "<td>".$responseRows['ResponsesQuestion2']."</td>";
				echo "<td>".$responseRows['ResponsesQuestion3']."</td>";
				echo "<td>".$responseRows['ResponsesQuestion4']."</td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			$sql = "SELECT * from testSubmissions";
			$searchText = '';
			if (!empty($_POST['searchID'])) {
				$searchText = $searchText."
					subId = ".$_POST['searchID'];
			}
			if (!empty($_POST['searchDate'])) {
				if ($searchText != '') {
					$searchText = $searchText." testDate = ".$_POST['searchDate'];
				}else{
					$searchText = $searchText."AND testDate = ".$_POST['searchDate'];
				}
			}
			if (!empty($_POST['searchSubjectId'])) {
				if ($searchText != '') {
					$searchText = $searchText." SubjectId = ".$_POST['searchSubjectId'];
				}else{
					$searchText = $searchText."AND SubjectId = ".$_POST['searchSubjectId'];
				}
			}
			if ($searchText != '') {
				$sql = $sql.'WHERE '.$searchText;
			}
			$result3 = mysqli_query($db, $sql);
			echo "<table><tr><td>Id</td><td>Date</td><td>SubjectID</td><td>Responses</td></tr>";
			while($row=mysqli_fetch_array($result3)){
				echo "<tr>";
				echo "<td>".$row['subId']."</td>";
				echo "<td>".$row['testDate']."</td>";
				echo "<td>".$row['SubjectId']."</td>";
				$response = $row['Responses'];
				$result4 = mysqli_query($db, "SELECT * from ResponsesOptions where Responses = '$response'");
				$responseRows=mysqli_fetch_array($result4)
				echo "<td>".$responseRows['ResponsesQuestion1']."</td>";
				echo "<td>".$responseRows['ResponsesQuestion2']."</td>";
				echo "<td>".$responseRows['ResponsesQuestion3']."</td>";
				echo "<td>".$responseRows['ResponsesQuestion4']."</td>";
				echo "</tr>";
			}
			echo "</table>";
			}
   ?>
   </body>
</html>