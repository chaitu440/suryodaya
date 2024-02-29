<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Suroday Admin Dashboard</title>
</head>
<body>

<h1>Product Images</h1>

<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Productid</th>
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

        // Fetch all product images
        $sql = "SELECT * FROM ProductImages";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["imageid"] . '</td>';

                echo '<td><img src="' . $row["image"] . '" style="max-width:100px; max-height:100px;" /></td>';
                echo '<td>' . $row["productid"] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="2">No product images found.</td></tr>';
        }

        $conn->close();
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
