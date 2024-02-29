<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Suryodaya popup</title>
</head>
<body>

<h1>popup </h1>

<table class="table">
    <thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>image</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "srisuryo_srisuryodaya";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch partners data
    $getQuery = "SELECT * FROM popup";
    $result = mysqli_query($conn, $getQuery);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row["id"] . '</td>';
            echo '<td>' . $row["name"] . '</td>';
            echo '<td><img src="' . $row["logo"] . '" style="max-width:100px; max-height:100px;" alt="' . $row["name"] . '"></td>';
            echo '<td>
            <a href="deletepartner.php?id=' . $row["id"] . '" class="btn btn-danger">Delete</a>
            <a href="editpopup.php?id=' . $row["id"] . '" class="btn btn-primary">Update</a>
            </td>';
            echo '</tr>';
        }
    } else {
        echo "No results found";
    }

    // Close connection
    mysqli_close($conn);
    ?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
