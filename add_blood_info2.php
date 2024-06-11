<?php
session_start();

if (!isset($_SESSION['userType']) || $_SESSION['userType'] != 'Hospital') {
    die("Access denied.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Blood Info</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1 style="color: rgb(7, 7, 250); font-size: larger; font-family: Verdana, Geneva, Tahoma, sans-serif; text-align:center">Bharat Blood Bank</h1>
    <h2 style="color: rgb(7, 7, 250); font-size: larger; font-family: Verdana, Geneva, Tahoma, sans-serif;">Add Blood
        Info</h2>
    <br>
    <form action="add_blood_info.php" method="POST">
        <label for="bloodGroup" style="color: rgb(0, 0, 5); font-size: larger; font-family: Verdana, Geneva, Tahoma, sans-serif;">Hospital
            Username:<br>
            <?php
            echo ($_SESSION['user_id']);
            ?>
        </label><br>

        <label for="bloodGroup" style="color: rgb(0, 0, 10); font-size: larger; font-family: Verdana, Geneva, Tahoma, sans-serif;">Blood
            Group:</label><br>

        <input type="text" id="bloodGroup" name="bloodGroup" required>
        <br>
        <label for="quantity" style="color: rgb(0, 0, 8); font-size: larger; font-family: Verdana, Geneva, Tahoma, sans-serif;">Quantity(ml):</label>
        <br>
        <input type="number" id="quantity" name="quantity" required>
        <br><br>
        <button type="submit">Add</button>
    </form>
    <hr>

    <h2>Blood Samples added by <?php
                                echo ($_SESSION['user_id']);
                                ?></h2>
    <table>
        <tr>
            <th>BloodSample Id</th>
            <th>Hospital</th>
            <th>Blood Group</th>
            <th>Quantity</th>
            <th>Date/Time</th>
            <th>Action</th>
        </tr>
        <?php
        include 'config.php';
        $sql = "SELECT * FROM BloodSamples";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            if ($row['hospital_id'] == $_SESSION['user_id']) {
                echo "<tr>";
                echo "<td>" . $row['bloodSample_id'] . "</td>";
                echo "<td>" . $row['hospital_id'] . "</td>";
                echo "<td>" . $row['bloodGroup'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['Date/Time'] . "</td>";

                echo '<td><button type="submit">Remove</button></td>';

                echo "</tr>";
            }
        }
        ?>
    </table>

</body>

</html>