<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ws_concours";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// else{
//     echo 'connexion reussi';
// }