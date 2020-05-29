<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

$host = '127.0.0.1';
$dbuser = 'online_class'; 
$dbpass = '11111111';
$dbname = 'online_class';
$siteurl = 'https://dbms.tempcloud.ml'; 
$conn = new mysqli($host, $dbuser, $dbpass, $dbname);
if (!$conn) {
    echo '<script>alert("DATABASE NOT CONNECTED")</script>';
}
$author = $_POST["author"];
$comment = $_POST["comment"];
$id = $_POST["id"];

$sql = "INSERT INTO comments (comment, author, post_id) VALUES ('".$comment."', '".$author."','".$id."')";
if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
echo "<script>location.replace(\"javascript:history.go(-1)\")</script>";

?>