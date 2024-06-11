<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bharatbloodbank";

// Create connection
// $conn = new mysqli("localhost", "id22296929_amanyadav", "Aman@2003", "id22296929_bharatbloodbank");
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // echo "success";
}
