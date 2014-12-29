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

$sql = "Select * from questions where questionset = 2;";

	echo '

	<form action="results.php" method="POST">
	<fieldset>
	<legend>Personal information:</legend>
	First name:<br>
	<input type="text" name="firstname" value="">
	<br>
	Last name:<br>
	<input type="text" name="lastname" value="">
	Email:<br>
	<input type="email" name="email" value="">
	<br><br>
	</fieldset>

	';

foreach ($conn->query($sql) as $row)
{
	echo "test*";
	echo "<br>";
    echo $row[1];
    echo "<br>";
    echo "<br>";
}

	echo'
	<input type="submit" value="Submit">
	</form>

	';

$conn = null;

?>