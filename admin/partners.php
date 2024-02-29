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
    $stmt = $conn->prepare("INSERT INTO Partners (name, email, contactnumber, designation, password, logo) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $contactnumber, $designation, $hashedPassword, $logoPath);

    // Set parameters
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contactnumber = $_POST["contactnumber"];
    $designation = $_POST["designation"];
    $password = $_POST["password"] ?? "default_password";
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash password

    $logo_tmp_name = $_FILES["logo"]["tmp_name"];
    $logo_type = $_FILES["logo"]["type"];
    $logo_name = $_FILES["logo"]["name"];

    // Get File Extension
    $fileType = pathinfo($logo_name, PATHINFO_EXTENSION);
    $fileType = strtolower($fileType); // convert to lowercase

    // Set File name with Random Number
    $uploadFile = "parnterimages/" . $logo_name . rand(1000, 10000) . "." . $fileType;

    // Check File Size greater than 300KB
    if ($_FILES["logo"]["size"] > 300000) {
        die("Upload Failed. File Size is too Large!!!");
    }
    // Check File Extension
    else if ($fileType != 'jpg' && $fileType != 'jpeg' && $fileType != 'png' && $fileType != 'gif') {
        die("Upload Failed. Invalid File!!!");
    }

    // Move the uploaded file to the "partners" folder
    if (!move_uploaded_file($logo_tmp_name, $uploadFile)) {
        die("Error uploading file.");
    }

    $logoPath = $uploadFile; // Set the image path to be stored in the database

    // Execute query
    if ($stmt->execute()) {
        echo "<script>alert('Data saved successfully');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Suroday Admin Dashboard</title>
</head>
<body>

<h1>Partners</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="contactnumber">Contact Number:</label>
        <input type="text" class="form-control" id="contactnumber" name="contactnumber" required>
    </div>
    <div class="form-group">
        <label for="designation">Designation:</label>
        <input type="text" class="form-control" id="designation" name="designation" required>
    </div>

    <div class="form-group">
        <label for="logo">Logo:</label>
        <input type="file" class="form-control-file" id="logo" name="logo" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>
