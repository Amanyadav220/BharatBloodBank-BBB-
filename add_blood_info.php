<?php
session_start();
include 'config.php';
echo ("<h1 style='color: blue; text-align: center; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Bharat Blood Bank (BBB)</h1>");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_SESSION['userType'] != 'Hospital') {
        die("Access denied.");
    }

    $hospital_id = $_SESSION['user_id'];
    $bloodGroup = $_POST['bloodGroup'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO BloodSamples (hospital_id, bloodGroup, quantity) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssi", $hospital_id, $bloodGroup, $quantity);

    if ($stmt->execute()) {
        echo "<p style='color: green; font-size: large; text-align: center;'>Blood info added successfully! Thank You!!</p>";
    } else {
        echo "<p style='color: red; font-size: large; text-align: center;'>Error: " . $stmt->error . "</p>";
    }
}
