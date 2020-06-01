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
$pass = $_POST["password"];


$sql = "SELECT id FROM users WHERE username = '$username' and passwrd = '$pass'";
$result = $conn->query($sql);
if ($result === TRUE) {
    echo "";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}


if ($result->num_rows > 0) {
	header("Location: ".$siteurl."/index.php?u=".$username."");
} else {
	$conn->close();
  	header("Location: ".$siteurl."/signin.html");
}

?>