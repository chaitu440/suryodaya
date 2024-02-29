<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Update Popup</title>
</head>
<body>


<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $logoPath = "";

    if ($_FILES["logo"]["error"] == 0) {
        $targetDir = "parnterimages/";
        $targetFile = $targetDir . basename($_FILES["logo"]["name"]);
        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFile)) {
            $logoPath = $targetFile;
        } else {
            echo '<div class="alert alert-danger" role="alert">Failed to upload logo.</div>';
        }
    }

    $updatePartnerQuery = "UPDATE popup SET name='$name',logo='$logoPath' WHERE id='$id'";

    if ($conn->query($updatePartnerQuery) === TRUE) {
        echo '<div class="alert alert-success" role="alert">Partner updated successfully</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error updating partner: ' . $conn->error . '</div>';
    }
}

$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $getPartnerQuery = "SELECT * FROM popup WHERE id = '$id'";
    $result = $conn->query($getPartnerQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>

        <div class="container">
            <h1>Update popup</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row["name"]; ?>">
                </div>
                <div class="form-group">
                    <label for="logo">Logo:</label>
                    <input type="file" class="form-control-file" id="logo" name="logo">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

        <?php
    } else {
        echo "popup not found";
    }
} else {
    echo "popup id not provided";
}

// Close connection
$conn->close();
?>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
