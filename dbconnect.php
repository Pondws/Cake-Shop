<?php 

$base_url = "http://localhost:80/cakeaaa";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cakeaaa";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn) {
    die("Failed to connect to database" . mysqli_error($conn));
}
?>


