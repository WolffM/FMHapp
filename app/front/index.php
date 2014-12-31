<?php

$sername = ""
$usename = ""
$pass = ""
$dbname = ""

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<br>";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }	 

$sql = "SELECT * FROM questions WHERE questionset = 1;";

	echo '
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>FMHApp Survey</title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	';

	echo "

	<form action='results.php' method='POST'>
	<div class='container'>
	<h2 class='text-info'>FMHApp Survey</h2>
	<legend class='text-info'>Personal information:</legend>
	<p class='text-primary'>Identifier:</p>
	<input type='text' name ='name' value='No Name' required value='1'>
	<br>
	<p class='text-primary'>Age:</p>
	<input type='text' name ='age' value=''>
	<br>

	";
	$temp = "";
	$counter = 1;
    echo "<table>";
foreach ($conn->query($sql) as $row)
{
	if($row[3]!=$temp){
		$temp = $row[3];
		echo "<tr><td colspan=2>";
		echo "<br><br>";
		echo "<h3 class='text-info'>$temp</h3>";
		echo "<br>";
		echo "</td></tr>";
	}
	echo "<tr><td>";
    echo "<p class='text-primary'>$counter. $row[1]</p>";

    echo "
    	</td><td>
    	<label class='btn btn-primary'>
	  		<input type='radio' name='$row[0]' value='Yes' required value='1'>Yes
	  	</label>
	 	<label class='btn btn-primary'>
	 		<input type='radio' name='$row[0]' value='No' required value='1'>No
	 	</label>
	 	</td></tr>
	";
 //    echo "</td><td><input type='radio' name='$row[0]' value='Yes' required value='1'>Yes";
 //    echo "    ";
	// echo "<input type='radio' name='$row[0]' value='No' required value='1'>No";
 //    echo "</td></tr>";
    $counter++;
}
 
	echo"
		</table>
		<br><br>
		<div class='checkbox'>
		  <label><input type='checkbox' value='Agree'>I agree to the terms and uses</label>
		</div>
	 	<label class='btn btn-warning'>
	 		<input type='submit' name='submit'>Submit
	 	</label>

	</div>
	";

$conn = null;

?>