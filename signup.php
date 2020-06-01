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
$username = $_POST["username"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$sem = $_POST["sem"];
$pass = $_POST["password"];


$sql = "INSERT INTO users (username, fname, lname, sem, passwrd) VALUES ('".$username."', '".$fname."','".$lname."','".$sem."','".$pass."')";
if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
header("Location: ".$siteurl."/index.php?u=".$username."");


?>