<?php
session_start();
include 'config.php';

// Enable error reporting for MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT username, password, userType FROM register_hospital WHERE username = ?";
    $stmt = $conn->prepare($sql);

    // Check if the prepare() was successful
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password, $userType);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['userType'] = $userType;

        if ($userType == 'Hospital') {
            header("Location: add_blood_info2.php");
        } else {
            header("Location: available_blood_samples.php");
        }
        exit(); // Make sure to exit after header redirection
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
