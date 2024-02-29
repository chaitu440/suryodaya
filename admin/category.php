<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Suryodaya team</title>
</head>
<body>

<h1>categories</h1>

<table class="table">
    <thead>
    <tr>
        <th>id</th>
        <th>category</th>
        <th>image</th>
        <th>Actions</th>
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

    // Fetch partners data
    $getAllPartnersQuery = "SELECT * FROM category";
    $result = $conn->query($getAllPartnersQuery);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["categoryid"] . '</td>';
            echo '<td>' . $row["categoryname"] . '</td>';
            echo '<td><img src="' . $row["categoryImage"] . '" style="max-width:100px; max-height:100px;" alt="' . $row["categoryname"] . '"></td>';
            echo '<td>
            <a href="delete_category.php?categoryid=' . $row["categoryid"] . '" class="btn btn-danger">Delete</a>
            <a href="update_category.php?categoryid=' . $row["categoryid"] . '" class="btn btn-primary">Update</a>
            </td>';

            echo '</tr>';
        }
    } else {
        echo "Error fetching partners data";
    }

    // Close connection
    $conn->close();
    ?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
