#!/usr/bin/php
<?php
	header("content-type:applications/json");

	//connect to mysql
	$conn = mysql_connect("localhost", "root", "DurgaLeon2016");

	if(!$conn) {
		echo "unable to connect to db: ".mysql_error();
		exit;
		
	}
	mysql_select_db("predictor", $conn);

	$sqlcmd = "SELECT * FROM Players";

	$result = mysql_query($sqlcmd);

	if(!$result)
	{
		echo "Error with queryL ".mysql_error();
		exit;
	}

	$resultlist = array();
	while($row = mysql_fetch_assoc($result)) 
	{
		echo $row["PlayerID"]."\n";
		echo $row["Name"]."\n";
		echo $row["AverageScore"]."\n";

		$resultlist[$row["Name"]] = $row["AverageScore"];
	}

	mysql_free_result($result);
	mysql_close($conn);

	//get scores for each player requested
	$post_data = json_encode($resultlist);

	$json = json_decode($post_data);
	print_r($json);
	//return as json array
//	return result;
?>
