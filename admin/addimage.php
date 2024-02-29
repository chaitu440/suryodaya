<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Suroday Admin Dashboard</title>
</head>
<body>

<h1>Add More Images</h1>

<?php
// Check if form is submitted
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
    $stmt = $conn->prepare("INSERT INTO ProductImages (productid, image) VALUES (?, ?)");
    $stmt->bind_param("is", $productid, $image);

    // Get product ID from form
    $productid = $_POST["productid"];

    // Process each uploaded file
    if (!empty($_FILES['images']['name'][0])) {
        $images = $_FILES['images'];
        $uploaded_images = array();

        foreach ($images['name'] as $key => $value) {
            $image_tmp_name = $images['tmp_name'][$key];
            $image_name = $images['name'][$key];

            // Get File Extension
            $fileType = pathinfo($image_name, PATHINFO_EXTENSION);

            // Set File name with Random Number
            $uploadFile = "productimages/" . $image_name . rand(1000, 10000) . "." . $fileType;

            // Check if image was uploaded successfully
            if (move_uploaded_file($image_tmp_name, $uploadFile)) {
                // Bind the image path
                $image = $uploadFile;

                // Execute query for each image
                if ($stmt->execute()) {
                    $uploaded_images[] = $image;
                } else {
                    echo "Error inserting image: " . $stmt->error;
                }
            } else {
                echo "Failed to upload image.";
            }
        }

        // Output uploaded images
        if (!empty($uploaded_images)) {
            echo "<p>Images uploaded successfully:</p>";
            echo "<ul>";
            foreach ($uploaded_images as $uploaded_image) {
                echo "<li><img src='$uploaded_image' style='max-width:100px; max-height:100px;' /></li>";
            }
            echo "</ul>";
        }
    } else {
        echo "No images selected.";
    }

    $stmt->close();
    $conn->close();
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <input type="hidden" name="productid" value="<?php echo $_GET['id']; ?>">
    <div class="form-group">
        <label for="images">Select Images:</label>
        <input type="file" class="form-control-file" id="images" name="images[]" multiple required>
    </div>
    <button type="submit" class="btn btn-primary">Upload Images</button>
</form>


</body>
</html>
