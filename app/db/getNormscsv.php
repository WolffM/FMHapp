<?php



$servername = "ftp.personalizedcancercareinstitute.com";
$username = "ruben_fmh";
$pass = "spartan123";
$dbname = "ruben_fmhApp";

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

$row = 0;
$upperAgeRow = 2;
$lowerAgeRow = 1;
$pointsOffset= 2;
$pointsOffsetTop=2;
$upperAge = array();
$lowerAge = array();

if (($handle = fopen("/home4/ruben/fmhData/FMHNorms_dots.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
/*
        
        for ($c=0; $c < $num; $c++) {
            echo "row<".$row.">" .$data[$c] . "<br />\n";
        }
*/        
        if($row==$upperAgeRow){
			$upperAge = $data;
			        for ($c=0; $c < $num; $c++) {
            echo "row<".$row.">" .$data[$c] . "<br />\n";
        }
		}
		if($row==$lowerAgeRow){
			$lowerAge=$data;
			        for ($c=0; $c < $num; $c++) {
            echo "row<".$row.">" .$data[$c] . "<br />\n";
        }
		}
        if($row>$pointsOffsetTop){
			
			for($col=$pointsOffset; $col < $num; $col++){
				
				$score = $data[1];
				$perc = $data[$col];
				$upAge = $upperAge[$col];
				$lowAge = $lowerAge[$col];
				$qSet = 1;
				$sql = "INSERT INTO percentiles (ageupper, agelower, score, percentile, questionset) VALUES ($upAge,$lowAge,$score,$perc,$qSet)";
				echo $sql;
							
				$conn->query($sql);
			}
			
			
		}
                $row++;
    }
    fclose($handle);
}

?>
