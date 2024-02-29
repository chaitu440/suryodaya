<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Suroday Admin Dashboard</title>
</head>
<body>

<h1>Products</h1>

<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Location</th>
        <th>Status</th>
        <th>Description</th>
        <th>Subcategory</th>
        <th>Actions</th>
        <th>Actions</th>
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

    // Fetch products with subcategory names
    $sql = "SELECT p.*, s.subcategoryname FROM product p JOIN subcategory s ON p.subcategoryid = s.subcategoryid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["productid"] . '</td>';
            echo '<td>' . $row["productname"] . '</td>';
            echo '<td><img src="' . $row["productimage"] . '" style="max-width:100px; max-height:100px;" /></td>';
            echo '<td>' . $row["location"] . '</td>';
            echo '<td>' . $row["status"] . '</td>';
            echo '<td>' . $row["description"] . '</td>';
            echo '<td>' . $row["subcategoryname"] . '</td>';
            echo '<td>';
       
            echo '<a href="updateproduct.php?id=' . $row["productid"] . '" class="btn btn-primary">Update</a> ';
   
            echo '</td>';
            echo '<td>';
            echo '<a href="deleteproduct.php?id=' . $row["productid"] . '" class="btn btn-danger">Delete</a> ';


            echo '</td>';
            echo '<td>';
        
            echo '<a href="addimage.php?id=' . $row["productid"] . '" class="btn btn-secondary">Add More Images</a>';

            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="7">No products found</td></tr>';
    }

    $conn->close();
    ?>
    </tbody>
</table>

</body>
</html>
