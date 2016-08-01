<?php
	include 'constants.php';
	//grab input data for player names
	$player1=$_POST['player1'];
	$player2=$_POST['player2'];
	if(isset($_POST['player3'])) {$player3=$_POST['player3'];}
	if(isset($_POST['player4'])) {$player4=$_POST['player4'];}
	if(isset($_POST['player5'])) {$player5=$_POST['player5'];}
	if(isset($_POST['player6'])) {$player6=$_POST['player6'];}
	if(isset($_POST['player7'])) {$player7=$_POST['player7'];}
	if(isset($_POST['player8'])) {$player8=$_POST['player8'];}
	if(isset($_POST['player9'])) {$player9=$_POST['player9'];}
	if(isset($_POST['player10'])) {$player10=$_POST['player10'];}

	try {

		//connect to database
		$conn = new PDO('mysql:host='.$HOST.';dbname='.$DBNAME, $USER, $PASS);

		//generate SQL query based on command line parameters		
		$querystring = 'SELECT * FROM Players WHERE ';
		$querystring.= 'Name LIKE \''.$player1.'\' OR ';
		$querystring.= 'Name LIKE \''.$player2.'\' ';
		if(isset($player3)) 
		{
			$querystring.=' OR ';
			$querystring.='Name LIKE \''.$player3.'\' ';
		}
		if(isset($player4)) 
		{
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

		//parse response data and create map(name=>score) of player scores. ($scores is used for testing)
		$scores="";
		$scorelist=array();
		//$querystring = 'SELECT AverageScore FROM Players WHERE Name LIKE \'Adrian\' OR Name LIKE \'Altec\';';
		foreach($conn->query($querystring) as $row) {
			$scores.=$row['AverageScore'].",";
			$scorelist[$row['Name']]=$row['AverageScore'];
		}

		//remove quotes from response data
		$scores=substr($scores, 0, -1);
		//echo $scores;
		//return score array as JSON object
		echo json_encode($scorelist);

		//empty connection
		$conn = null;
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
?>
