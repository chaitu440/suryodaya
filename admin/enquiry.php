<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Suroday Admin Dashboard</title>
</head>
<body>

<h1>Enquiry</h1>

<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Contact Number</th>
        <th>Message</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "srisuryo_srisuryodaya";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch all data from contactus table
    $getAllDataQuery = "SELECT * FROM contact_us";
    $result = $conn->query($getAllDataQuery);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["id"] . '</td>';
            echo '<td>' . $row["fullName"] . '</td>';
            echo '<td>' . $row["email"] . '</td>';
            echo '<td>' . $row["contactNumber"] . '</td>';
            echo '<td>' . $row["message"] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="5">No enquiries found</td></tr>';
    }

    $conn->close();
    ?>
    </tbody>
</table>

</body>
</html>
