<?php
// db_connection.php
$dbhost = "classmysql.engr.oregonstate.edu"; // Replace with your DB host
$dbuser = "cs340_johnsa33"; // Replace with your DB username
$dbpass = "0840"; // Replace with your DB password
$dbname = "cs340_johnsa33"; // Replace with your DB name

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
