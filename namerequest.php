<?php

	try {
		$conn = new PDO('mysql:host=127.0.0.1;dbname=predictor', 'root', 'DurgaLeon2016');
		$names="";
			
		$querystring = 'SELECT Name FROM Players;';

		foreach($conn->query($querystring) as $row) {
			$names.=$row['Name'].",";
		}


		$names=substr($names, 0, -1);
		echo $names;
		$conn = null;
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
?>
