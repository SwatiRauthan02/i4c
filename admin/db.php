<?php
include 'config.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// else{
//     echo "connnection successful";
// }
// Set charset to utf8
$conn->set_charset("utf8");
?> 
