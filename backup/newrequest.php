<?php
	$player1=$_POST['player1'];
	$player2=$_POST['player2'];
	if(isset($_POST['player3'])) {$player3=$_POST['player3'];}
	if(isset($_POST['player4'])) {$player4=$_POST['player4'];}
	if(isset($_POST['player5'])) {$player5=$_POST['player5'];}
	if(isset($_POST['player6'])) {$player6=$_POST['player6'];}
	if(isset($_POST['player7'])) {$player3=$_POST['player7'];}
	if(isset($_POST['player8'])) {$player4=$_POST['player8'];}
	if(isset($_POST['player9'])) {$player5=$_POST['player9'];}
	if(isset($_POST['player10'])) {$player6=$_POST['player10'];}

	try {
		$conn = new PDO('mysql:host=127.0.0.1;dbname=predictor', 'root', 'DurgaLeon2016');
		$scores="";
		$scorelist=array();
			
		$querystring = 'SELECT * FROM Players WHERE ';
		$querystring.= 'Name LIKE \''.$player1.'\' OR ';
		$querystring.= 'Name LIKE \''.$player2.'\' ';
		if(isset($player3)) 
		{
			//insert missing "OR" 
			$querystring.=' OR ';
			$querystring.='Name LIKE \''.$player3.'\' ';
		}
		if(isset($player4)) 
		{
			//insert missing "OR" 
			$querystring.=' OR ';
			$querystring.='Name LIKE \''.$player4.'\' ';
		}

		if(isset($player5)) 
		{
			$querystring.=' OR ';
			$querystring.='Name LIKE \''.$player5.'\' ';
		}

		if(isset($player6)) 
		{
			$querystring.=' OR ';
			$querystring.='Name LIKE \''.$player6.'\' ';
		}
		if(isset($player7)) 
		{
			$querystring.=' OR ';
			$querystring.='Name LIKE \''.$player7.'\' ';
		}
		if(isset($player8)) 
		{
			$querystring.=' OR ';
			$querystring.='Name LIKE \''.$player8.'\' ';
		}
		if(isset($player9)) 
		{
			$querystring.=' OR ';
			$querystring.='Name LIKE \''.$player9.'\' ';
		}
		if(isset($player10)) 
		{
			$querystring.=' OR ';
			$querystring.='Name LIKE \''.$player10.'\' ';
		}	
		$querystring.=';';


		//$querystring = 'SELECT AverageScore FROM Players WHERE Name LIKE \'Adrian\' OR Name LIKE \'Altec\';';
		foreach($conn->query($querystring) as $row) {
			$scores.=$row['AverageScore'].",";
			$scorelist[$row['Name']]=$row['AverageScore'];
		}


		$scores=substr($scores, 0, -1);
		#echo $scores;
		echo json_encode($scorelist);
		$conn = null;
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
?>
