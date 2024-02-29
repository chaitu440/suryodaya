<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Suroday Admin Dashboard - Update Product</title>
</head>
<body>

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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $productid = $_POST["productid"];
    $productname = $_POST["productname"];
    $location = $_POST["location"];
    $status = $_POST["status"];
    $description = $_POST["description"];
    $subcategoryid = $_POST["subcategoryid"];

    $sql = "UPDATE product SET productname='$productname', location='$location', status='$status', description='$description', subcategoryid='$subcategoryid' WHERE productid='$productid'";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">Product updated successfully</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error updating product: ' . $conn->error . '</div>';
    }
}

if (isset($_GET['id'])) {
    $productid = $_GET['id'];
    $sql = "SELECT * FROM product WHERE productid='$productid'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        ?>

        <h1>Update Product</h1>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="productid" value="<?php echo $row["productid"]; ?>">
            <div class="form-group">
                <label for="productname">Product Name:</label>
                <input type="text" class="form-control" id="productname" name="productname" value="<?php echo $row["productname"]; ?>">
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" name="location" value="<?php echo $row["location"]; ?>">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="status" name="status" value="<?php echo $row["status"]; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description"><?php echo $row["description"]; ?></textarea>
            </div>
            <div class="form-group">
                <label for="subcategoryid">Subcategory ID:</label>
                <input type="text" class="form-control" id="subcategoryid" name="subcategoryid" value="<?php echo $row["subcategoryid"]; ?>">
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>

        <?php
    } else {
        echo '<div class="alert alert-danger" role="alert">Product not found</div>';
    }
} else {
    echo '<div class="alert alert-danger" role="alert">Product ID not specified</div>';
}

$conn->close();
?>

</body>
</html>
