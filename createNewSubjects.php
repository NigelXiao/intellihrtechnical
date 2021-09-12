<?php
  include('config.php');
  $username = $_GET['user'];
function GUID()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $username; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
	  <form action = "createNewSubjects.php?user=<?php
	  	echo $username;
	  ?>
	  " method = 'POST'>
	  <label>Number of Subjects to Create:</label>
	  <input type = 'Number' maximum = 10 name = 'NoOfSubs'/>
	  <input type='submit' value='Submit'>
	  </form>
	  <?php 
		if (!empty($_POST['NoOfSubs']))	{
			$sql = 'select Username from subjects
					order by Username desc';
			$result = mysqli_query($db, $sql);
			$row = mysqli_fetch_array($result);
			if (!empty($row)) {
				$newUsername = $row['Username'];
			}
			$valueText = '';
			$NoOfSubs = $_POST['NoOfSubs'];
			$sql = 'INSERT INTO subjects
				VALUES';
			for ($i = 0; $i < $NoOfSubs; $i++){
				$newGUID = GUID();	
				$newUsername += 1;
				$newDOBDate = date("1");
                $valueText = $valueText."
				    ('$newGUID', '$newUsername', '0', '$newDOBDate', '0', 'true', 'defaultPassword')";
				if ($i != $NoOfSubs - 1) {
					$valueText = $valueText.',';
				} 
			}
			$sql = $sql.$valueText;
			$result = mysqli_query($db, $sql);
			if (!$result){
				echo "Error: " . $sql . "<br>" . mysqli_error($db);
			}
			echo "You create the following subjects:<br>". $valueText . "<br>";
		}  	
	  ?>
   </body>
   
</html> 