<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

$host = '127.0.0.1';
$dbuser = 'secret'; 
$dbpass = 'secret';
$dbname = 'online_class';
$siteurl = 'https://dbms.tempcloud.ml'; 
$conn = new mysqli($host, $dbuser, $dbpass, $dbname);
if (!$conn) {
    echo '<script>alert("DATABASE NOT CONNECTED")</script>';
}
$author = $_POST["author"];
$question_id = $_POST["question_id"];
$answer = $_POST["answer"];

$sql = "INSERT INTO answers (question_id, author, answer) VALUES ('".$question_id."', '".$author."','".$answer."')";
if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
echo "<script>location.replace(\"javascript:history.go(-1)\")</script>";

?>