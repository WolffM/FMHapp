<?php

$sername = ""
$usename = ""
$pass = ""
$dbname = ""

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    echo "<br>";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    echo "<br>";
    }	 

$sql = "SELECT * FROM questions WHERE questionset = 1;";

	echo '

	<form action="results.php" method="POST">
	<fieldset>
	<legend>Personal information:</legend>
	***** Name:<br>
	<input type="text" name ="name" value="No Name" required value="1">
	<br>
	***** Age:<br>
	<input type="text" name ="age" value="">
	<br>
	First name:<br>
	<input type="text" name="firstname" value="" required value="1">
	<br>
	Last name:<br>
	<input type="text" name="lastname" value="" required value="1">
	<br>
	Email:<br>
	<input type="email" name="email" value="" required value="1">
	<br><br>
	</fieldset>

	';
	$temp = "";
	$counter = 1;
foreach ($conn->query($sql) as $row)
{
	if($row[3]!=$temp){
		$temp = $row[3];
		echo "<br><br><br>";
		echo "$temp";
		echo "<br><br>";
	}
	echo $counter;
	echo ". ";

    echo $row[1];
    echo "             ";
    echo "<input type='radio' name='$row[0]' value='Yes' required value='1'>Yes";
    echo "    ";
	echo "<input type='radio' name='$row[0]' value='No' required value='1'>No";
    echo "<br>";
    $counter++;
}

	echo'
	<br><br>
	<input type="checkbox" name="agreement" value="Agree" required value="1"> I agree to the terms and uses<br><br>

	<input type="submit" value="Submit">
	</form>

	';

$conn = null;

?>