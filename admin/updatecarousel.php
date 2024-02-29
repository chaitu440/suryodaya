<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Suroday Admin Dashboard - Update Carousel Image</title>
</head>
<body>

<?php
if (isset($_GET['carouselid'])) {
    $carouselid = $_GET['carouselid'];

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
        $stmt = $conn->prepare("UPDATE carousel SET carouselImage = ? WHERE carouselid = ?");
        $stmt->bind_param("si", $carouselImage, $carouselid);

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
                echo "<p>Image updated successfully.</p>";
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Failed to upload image.";
        }

        $stmt->close();
        $conn->close();
    }

    // Display form to update image
    ?>
    <h1>Update Carousel Image</h1>
    <form method="post" action="updatecarousel.php?carouselid=<?php echo $carouselid; ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="carouselImage">New Image:</label>
            <input type="file" class="form-control-file" id="carouselImage" name="carouselImage" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Update Image">
    </form>
    <?php
} else {
    echo "Invalid request.";
}
?>

</body>
</html>
