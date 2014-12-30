<?php

$servername = "";
$username = "";
$pass = "";
$dbname = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    echo "<br>";
    }	 

$score = 0;

$yesno = 0;
$qset = 1;
if ( $_POST) {
	 
	
	$name = $_POST['name'];
	$age  = $_POST['age'];
	$sql = "INSERT into clients (age,name) VALUES ($age,'$name');";
	$conn->query($sql);
	$cliID = $conn -> lastInsertId();
	foreach ( $_POST as $key => $value) {
		if(is_numeric($key) ){
	    $questionid = intval($value);
		if($value == "Yes"){
			$yesno = 1;
			$score++;
		}

		$sql = "INSERT into answers (questionid, clientid, response) values ($questionid , $cliID ,$yesno);";
		$yesno = 0;
		
		}

	}

	$sql = "UPDATE clients SET score='$score' WHERE clientid = '$cliID';";
	$conn->query($sql);


	$percent = 0;
	$sql = "SELECT percentile from percentiles WHERE ageupper >= $age and agelower <= $age and score = $score and questionset = $qset;";
	$FINALPERCENT;
	$percent = $conn->query($sql);
	foreach($percent as $row){
		$FINALPERCENT = $row[0];
		break;
	}

	$sql = "UPDATE clients SET percentile='$FINALPERCENT' WHERE clientid = '$cliID';";
	$conn->query($sql);


	echo'
		Thank you for submitting your data!
		<br><br>
		With an age of:  '. $age .'<br>
		and a score of:  '. $score .'<br>
		Your percentile is:  '. $FINALPERCENT;
}

