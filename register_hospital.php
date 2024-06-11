<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Bharat Blood Bank(BBB)</h1>
</body>

</html>

<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO register_hospital (username, password, userType) VALUES (?, ?, 'Hospital')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "Hospital registered successfully!<br>";
        echo '<a href = "index.html">Click</a> to Login';
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>