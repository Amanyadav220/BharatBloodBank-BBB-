<?php
include 'config.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $bloodGroup = $_POST['bloodGroup'];
    $bloodGroup2 = $_SESSION('bloodGroup');
    $sql = "INSERT INTO register_hospital (username, password, userType, bloodGroup) VALUES (?, ?, 'Receiver', ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $password, $bloodGroup);

    if ($stmt->execute()) {
        echo "Receiver registered successfully!<br><br>";
        echo '<a href="index.html">Click </a>to Login.';
    } else {
        echo "Error: " . $stmt->error;
    }
}
