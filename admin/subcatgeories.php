<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Suroday Admin Dashboard</title>
</head>
<body>

<h1>Add Subcategory</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label for="categoryid">Select Category:</label>
        <select class="form-control" id="categoryid" name="categoryid">
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

            // Fetch categories data
            $sql = "SELECT categoryid, categoryname FROM Category";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["categoryid"] . '">' . $row["categoryname"] . '</option>';
                }
            } else {
                echo '<option value="">No categories found</option>';
            }

            $conn->close();
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="subcategoryname">Subcategory Name:</label>
        <input type="text" class="form-control" id="subcategoryname" name="subcategoryname" required>
    </div>
    <div class="form-group">
        <label for="subcategoryimage">Subcategory Image:</label>
        <input type="file" class="form-control-file" id="subcategoryimage" name="subcategoryimage" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Subcategory</button>
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
    $stmt = $conn->prepare("INSERT INTO subcategory (categoryid, subcategoryname, subcategoryImage) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $categoryid, $subcategoryname, $subcategoryImage);

    // Set category ID
    $categoryid = $_POST["categoryid"];

    // Set subcategory name
    $subcategoryname = $_POST["subcategoryname"];

    // File upload
    $subcategoryimage_tmp_name = $_FILES["subcategoryimage"]["tmp_name"];
    $subcategoryimage_name = $_FILES["subcategoryimage"]["name"];

    // Get File Extension
    $fileType = pathinfo($subcategoryimage_name, PATHINFO_EXTENSION);

    // Set File name with Random Number
    $uploadFile = "subcategoryfolder/" . $subcategoryimage_name . rand(1000, 10000) . "." . $fileType;

    // Check if image was uploaded successfully
    if (move_uploaded_file($subcategoryimage_tmp_name, $uploadFile)) {
        // Bind the image path
        $subcategoryImage = $uploadFile;

        // Execute query
        if ($stmt->execute()) {
            echo "<p>Subcategory added successfully.</p>";
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

<h2>Subcategories</h2>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Category ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Actions</th>
        <th>Actions </th>
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

    // Fetch subcategories data
    $sql = "SELECT subcategoryid, categoryid, subcategoryname, subcategoryImage FROM subcategory";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["subcategoryid"] . '</td>';
            echo '<td>' . $row["categoryid"] . '</td>';
            echo '<td>' . $row["subcategoryname"] . '</td>';
            echo '<td><img src="' . $row["subcategoryImage"] . '" style="max-width:100px; max-height:100px;" /></td>';

            echo "<td><a href='update_subcategory.php?subcategoryid=" . $row["subcategoryid"] . "' class='btn btn-primary'>Update</a></td>";
            echo "<td><a href='delete_subcategory.php?subcategoryid=" . $row["subcategoryid"] . "' class='btn btn-danger'>Delete</a></td>";
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="4">No subcategories found</td></tr>';
    }

    $conn->close();
    ?>
    </tbody>
</table>

</body>
</html>
