<?php
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);
	$host = '127.0.0.1';
	$dbuser = 'secret'; 
	$dbpass = 'secret';
	$dbname = 'online_class';
	$conn = new mysqli($host, $dbuser, $dbpass, $dbname);
	if (!$conn) {
		echo '<script>alert("DATABASE NOT CONNECTED")</script>';
	}
	$query = "UPDATE questions SET likes = likes + 1 WHERE question_id =".$_GET["id"];
	$result = $conn->query($query);
	echo "<script>window.close();</script>";
?>