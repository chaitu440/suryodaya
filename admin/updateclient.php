<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Suroday Admin Dashboard - Update Client Image</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
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

    $clientid = $_POST["clientid"];

    // File upload
    $logo_tmp_name = $_FILES["logo"]["tmp_name"];
    $logo_name = $_FILES["logo"]["name"];

    // Get File Extension
    $fileType = pathinfo($logo_name, PATHINFO_EXTENSION);

    // Set File name with Random Number
    $uploadFile = "clientlogos/" . $logo_name . rand(1000, 10000) . "." . $fileType;

    // Check if image was uploaded successfully
    if (move_uploaded_file($logo_tmp_name, $uploadFile)) {
        // Prepare and bind
        $stmt = $conn->prepare("UPDATE client SET logos=? WHERE clientid=?");
        $stmt->bind_param("si", $uploadFile, $clientid);

        // Execute query
        if ($stmt->execute()) {
            echo "<p>Client image updated successfully.</p>";
        } else {
            echo "Error updating client image: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Failed to upload logo.";
    }

    $conn->close();
}
?>

<h1>Update Client Image</h1>

<?php
// Display existing client image
if (isset($_GET['id'])) {
    $clientid = $_GET['id'];

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

    // Fetch existing client image
    $stmt = $conn->prepare("SELECT logos FROM client WHERE clientid = ?");
    $stmt->bind_param("i", $clientid);
    $stmt->execute();
    $stmt->bind_result($existingImage);
    $stmt->fetch();
    $stmt->close();

    if (!empty($existingImage)) {
        echo '<img src="' . $existingImage . '" style="max-width:100px; max-height:100px;" /><br><br>';
    }

    $conn->close();
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <input type="hidden" name="clientid" value="<?php echo $clientid; ?>">
    <div class="form-group">
        <label for="logo">New Logo:</label>
        <input type="file" class="form-control-file" id="logo" name="logo" required>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update Image</button>
</form>

</body>
</html>
