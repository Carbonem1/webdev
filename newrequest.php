#!/usr/bin/php
<?php
	header("content-type:text/html");

//	if(!$_POST) {echo "Problem";exit;}
//	$player1 = $_POST['player1'];
//	$player2 = $_POST['player2'];
	echo $_POST['player1'];
	echo $_REQUEST['player1'];

	try {
		$conn = new PDO('mysql:host=127.0.0.1;dbname=predictor', 'root', 'DurgaLeon2016');
		$scores="a";
			
		$querystring = 'SELECT * FROM Players WHERE ';
		$querystring.= 'Name LIKE \'$player1\' OR ';
		$querystring.= 'Name LIKE \'$player2\';';


		$querystring = 'SELECT AverageScore FROM Players WHERE Name LIKE \'Adrian\' OR Name LIKE \'Altec\';';
		foreach($conn->query($querystring) as $row) {
			$scores.=$row['AverageScore'].",";
		}

		echo $scores;
		$conn = null;
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
?>
