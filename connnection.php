<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "ampay";

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn) {
    echo "Not conncected";
} 
?>