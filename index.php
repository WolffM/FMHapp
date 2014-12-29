<?php

$sername = ""
$usename = ""
$pass = ""
$dbname = ""

$conn = new mysqli($sername, $usename, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "Select * from questions where setid = 1";
$result = $conn->query($sql);

if($result->num_rows > 0) {
	echo '

	<form action="action_page.php" method="POST">
	<fieldset>
	<legend>Personal information:</legend>
	First name:<br>
	<input type="text" name="firstname" value="Mickey">
	<br>
	Last name:<br>
	<input type="text" name="lastname" value="Mouse">
	<br><br>
	</fieldset>
	'

	echo'
	<input type="submit" value="Submit">
	</form>

	'
}

?>