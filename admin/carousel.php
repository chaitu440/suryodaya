<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Suroday Admin Dashboard</title>
</head>
<body>

<h1>Carousel Image Upload</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label for="carouselImage">Image:</label>
        <input type="file" class="form-control-file" id="carouselImage" name="carouselImage" required>
    </div>
    <button type="submit" class="btn btn-primary">Upload Image</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle image upload here
}

// Display table with carousel images
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "srisuryo_srisuryodaya";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
                  $servername = "localhost";
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
    $stmt = $conn->prepare("INSERT INTO carousel (carouselImage, coursel) VALUES (?, ?)");
    $stmt->bind_param("ss", $carouselImage, $coursel);

    // Set dummy text for coursel
    $coursel = "Dummy Text";

    // File upload
    $carouselImage_tmp_name = $_FILES["carouselImage"]["tmp_name"];
    $carouselImage_name = $_FILES["carouselImage"]["name"];

    // Get File Extension
    $fileType = pathinfo($carouselImage_name, PATHINFO_EXTENSION);

    // Set File name with Random Number
    $uploadFile = "carouselimages/" . $carouselImage_name . rand(1000, 10000) . "." . $fileType;

    // Check if image was uploaded successfully
    if (move_uploaded_file($carouselImage_tmp_name, $uploadFile)) {
        // Bind the image path
        $carouselImage = $uploadFile;

        // Execute query
        if ($stmt->execute()) {
            echo "<p>Image uploaded successfully.</p>";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Failed to upload image.";
    }

    $stmt->close();
    $conn->close();
}

// Fetch carousel images
$sql = "SELECT carouselid, carouselImage FROM carousel";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Image</th>';
    echo '<th>Actions</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["carouselid"] . '</td>';
        echo '<td><img src="' . $row["carouselImage"] . '" style="max-width:100px; max-height:100px;" /></td>';
        echo '<td>';
        echo '<a href="updatecarousel.php?carouselid=' . $row["carouselid"] . '" class="btn btn-primary">Update</a>';
        echo '<a href="deletecarouselimage.php?carouselid=' . $row["carouselid"] . '" class="btn btn-danger">Delete</a>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>
