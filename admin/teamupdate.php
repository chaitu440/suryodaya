<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Update Partner</title>
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
    $partnerid = $_POST["partnerid"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contactnumber = $_POST["contactnumber"];
    $designation = $_POST["designation"];
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

    $updatePartnerQuery = "UPDATE Partners SET name='$name', email='$email', contactnumber='$contactnumber', designation='$designation', logo='$logoPath' WHERE partnerid='$partnerid'";

    if ($conn->query($updatePartnerQuery) === TRUE) {
        echo '<div class="alert alert-success" role="alert">Partner updated successfully</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error updating partner: ' . $conn->error . '</div>';
    }
}

$partnerid = $_GET["partnerid"];
$getPartnerQuery = "SELECT * FROM team WHERE partnerid = '$partnerid'";
$result = $conn->query($getPartnerQuery);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>

    <div class="container">
        <h1>Update Partner</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="partnerid" value="<?php echo $row["partnerid"]; ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row["name"]; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row["email"]; ?>">
            </div>
            <div class="form-group">
                <label for="contactnumber">Contact Number:</label>
                <input type="text" class="form-control" id="contactnumber" name="contactnumber" value="<?php echo $row["contactnumber"]; ?>">
            </div>
            <div class="form-group">
                <label for="designation">Designation:</label>
                <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $row["designation"]; ?>">
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
    echo "team member not found";
}

// Close connection
$conn->close();
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
