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
$link = $_POST["link"];
$title = $_POST["title"];
$desc = $_POST["desc"];
$sub = $_POST["sub"];

$sql = "INSERT INTO post (author, link, title, description, sub) VALUES ('".$author."', '".$link."','".$title."','".$desc."','".$sub."')";
if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
header("Location: ".$siteurl);

?>