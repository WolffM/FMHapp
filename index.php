<?php

$sername = ""
$usename = ""
$pass = ""
$dbname = ""

	// $conn = new mysqli($servername, $username, $pass, $dbname);

	// if ($conn->connect_error) {
	//     die("Connection failed: " . $conn->connect_error);
	// }

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

$sql = "Select * from questions where questionset = 1;";

	echo '

	<form action="results.php" method="POST">
	<fieldset>
	<legend>Personal information:</legend>
	First name:<br>
	<input type="text" name="firstname" value="">
	<br>
	Last name:<br>
	<input type="text" name="lastname" value="">
	<br>
	Email:<br>
	<input type="email" name="email" value="">
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
    echo "<input type='radio' name='$row[0]' value='Yes'>Yes";
    echo "    ";
	echo "<input type='radio' name='$row[0]' value='No'>No";
    echo "<br>";
    $counter++;
}

	echo'
	<br><br>
	<input type="checkbox" name="agreement" value="Agree"> I agree to the terms and uses<br><br>

	<input type="submit" value="Submit">
	</form>

	';

$conn = null;

?>