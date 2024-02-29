<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Suroday Admin Dashboard</title>
</head>
<body>

<h1>Add Product</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label for="productname">Product Name:</label>
        <input type="text" class="form-control" id="productname" name="productname" required>
    </div>
    <div class="form-group">
        <label for="productimage">Product Image:</label>
        <input type="file" class="form-control-file" id="productimage" name="productimage" required>
    </div>
    <div class="form-group">
        <label for="location">Location:</label>
        <input type="text" class="form-control" id="location" name="location" required>
    </div>
    <div class="form-group">
        <label for="status">Status:</label>
        <select class="form-control" id="status" name="status" required>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
    <div class="form-group">
        <label for="subcategoryid">Select Subcategory:</label>
        <select class="form-control" id="subcategoryid" name="subcategoryid">
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

            // Fetch subcategories data
            $sql = "SELECT subcategoryid, subcategoryname FROM subcategory";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["subcategoryid"] . '">' . $row["subcategoryname"] . '</option>';
                }
            } else {
                echo '<option value="">No subcategories found</option>';
            }

            $conn->close();
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Add Product</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO product (productname, productimage, location, status, description, subcategoryid) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $productname, $productimage, $location, $status, $description, $subcategoryid);

    // Set product name
    $productname = $_POST["productname"];

    // File upload
    $productimage_tmp_name = $_FILES["productimage"]["tmp_name"];
    $productimage_name = $_FILES["productimage"]["name"];

    // Get File Extension
    $fileType = pathinfo($productimage_name, PATHINFO_EXTENSION);

    // Set File name with Random Number
    $uploadFile = "productfolder/" . $productimage_name . rand(1000, 10000) . "." . $fileType;

    // Check if image was uploaded successfully
    if (move_uploaded_file($productimage_tmp_name, $uploadFile)) {
        // Bind the image path
        $productimage = $uploadFile;

        // Set other values
        $location = $_POST["location"];
        $status = $_POST["status"];
        $description = $_POST["description"];
        $subcategoryid = $_POST["subcategoryid"];

        // Execute query
        if ($stmt->execute()) {
            echo "<p>Product added successfully.</p>";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Failed to upload image.";
    }

    $stmt->close();
    $conn->close();
}
?>

</body>
</html>
