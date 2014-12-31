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

	echo '

	<form action="results.php" method="POST">
	<fieldset>
	<legend>Personal information:</legend>
	Identifier:<br>
	<input type="text" name ="name" value="No Name" required value="1">
	<br>
	Age:<br>
	<input type="text" name ="age" value="">
	<br>
	</fieldset>

	';
	$temp = "";
	$counter = 1;
    echo "<table>";
foreach ($conn->query($sql) as $row)
{
	if($row[3]!=$temp){
		$temp = $row[3];
		echo "<tr><td colspan=2>";
		echo "<br><br><br>";
		echo "$temp";
		echo "<br><br>";
		echo "</td></tr>";
	}
	echo "<tr><td>";
	echo $counter;
	echo ". ";

    echo $row[1];

	 //    echo '
	 //    	</td><td>
 	//    	<label class="btn btn-primary">
	//   		<input type="radio" name="$row[0]" value="Yes" required value="1">Yes</button>
	//   	</label>
	//  	<label class="btn btn-primary">
	//  		<input type="radio" name="$row[0]" value="No" required value="1">No</button>
	//  	</label>
	//  	</td></tr>
	// ';
    echo "</td><td><input type='radio' name='$row[0]' value='Yes' required value='1'>Yes";
    echo "    ";
	echo "<input type='radio' name='$row[0]' value='No' required value='1'>No";
    echo "</td></tr>";
    $counter++;
}
    echo "</table>";
	echo'
	<br><br>
	<input type="checkbox" name="agreement" value="Agree" required value="1"> I agree to the terms and uses<br><br>

	<input type="submit" value="Submit">
	</form>

	';

$conn = null;

?>