<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Suroday Admin Dashboard</title>
</head>
<body>

<?php
if (isset($_GET['categoryid'])) {
    $categoryid = htmlspecialchars($_GET['categoryid']);

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        $stmt = $conn->prepare("UPDATE category SET categoryname = ?, categoryImage = ? WHERE categoryid = ?");
        $stmt->bind_param("ssi", $categoryname, $categoryImage, $categoryid);

        // Set category name
        $categoryname = htmlspecialchars($_POST["categoryname"]);

        // Check if a new image is uploaded
        if ($_FILES["categoryimage"]["size"] > 0) {
            $categoryimage_tmp_name = $_FILES["categoryimage"]["tmp_name"];
            $categoryimage_name = $_FILES["categoryimage"]["name"];

            // Get File Extension
            $fileType = pathinfo($categoryimage_name, PATHINFO_EXTENSION);

            // Set File name with Random Number
            $uploadFile = "categoryfolder/" . $categoryimage_name . rand(1000, 10000) . "." . $fileType;

            // Check if image was uploaded successfully
            if (move_uploaded_file($categoryimage_tmp_name, $uploadFile)) {
                // Bind the image path
                $categoryImage = $uploadFile;
            } else {
                echo "Failed to upload image.";
            }
        } else {
            // If no new image is uploaded, keep the existing image
            $categoryImage = $_POST["current_image"];
        }

        // Execute query
        if ($stmt->execute()) {
            echo "<p>Category updated successfully.</p>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }

    // Display form to update category
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

    // Fetch category data by ID
    $getCategoryQuery = "SELECT * FROM category WHERE categoryid = '$categoryid'";
    $result = $conn->query($getCategoryQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>

<div class="container text-center">
    <h1>Update Category</h1>
    <form method="post" action="update_category.php?categoryid=<?php echo $categoryid; ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="categoryname">Category Name:</label>
            <input type="text" class="form-control" id="categoryname" name="categoryname" value="<?php echo $row["categoryname"]; ?>" required>
        </div>
        <div class="form-group">
            <label for="categoryimage">Current Category Image:</label><br>
            <img src="<?php echo $row["categoryImage"]; ?>" alt="Current Category Image" style="max-width: 200px; max-height: 200px;"><br>
            <label for="categoryimage">New Category Image:</label>
            <input type="file" class="form-control-file" id="categoryimage" name="categoryimage">
            <input type="hidden" name="current_image" value="<?php echo $row["categoryImage"]; ?>">
        </div>
        <input type="submit" class="btn btn-primary" value="Update Category">
    </form>
</div>

<?php
    } else {
        echo "Category not found";
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
