<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Available Blood Samples</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Available Blood Samples</h2>
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
        Session_start() ;
        // $bloodGroup = $_SESSION['bloodGroup'];
        // $sql = "SELECT BloodSamples.id, Users.username AS hospital, BloodSamples.bloodGroup, BloodSamples.quantity
        //         FROM BloodSamples
        //         JOIN Users ON BloodSamples.hospital_id = Users.id";
        $sql = "SELECT * FROM BloodSamples";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['bloodSample_id'] . "</td>";
            echo "<td>" . $row['hospital_id'] . "</td>";
            echo "<td>" . $row['bloodGroup'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td>" . $row['Date/Time'] . "</td>";
            // echo "<td><a href='request_sample.php?sample_id=" . htmlspecialchars($row['id']) . "'>Request Sample</a></td>";
            echo "<td><a href='request_sample.php'>Request Sample</a></td>";

            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>