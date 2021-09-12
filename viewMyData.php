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
	  
	  <?php
			$result1 = mysqli_query("SELECT * from testSubmissions where SubjectId = '$username'");
			echo "<table><tr><td>Id</td><td>Date</td><td>SubjectID</td><td>Responses</td></tr>";
			while($row=mysql_fetch_array($result1)){
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

			mysql_close($con);
	  ?>
   </body>
   
</html>
