<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Suroday Admin Dashboard</title>
</head>
<body>

<h1>Add Client</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">

    <div class="form-group">
        <label for="logo">Logo:</label>
        <input type="file" class="form-control-file" id="logo" name="logo" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Client</button>
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
    $stmt = $conn->prepare("INSERT INTO client (comapnynames, logos) VALUES (?, ?)");
    $stmt->bind_param("ss", $companyname, $logo);

    // Set dummy name for company name
    $companyname = "Dummy Company Name";

    // File upload
    $logo_tmp_name = $_FILES["logo"]["tmp_name"];
    $logo_name = $_FILES["logo"]["name"];

    // Get File Extension
    $fileType = pathinfo($logo_name, PATHINFO_EXTENSION);

    // Set File name with Random Number
    $uploadFile = "clientlogos/" . $logo_name . rand(1000, 10000) . "." . $fileType;

    // Check if image was uploaded successfully
    if (move_uploaded_file($logo_tmp_name, $uploadFile)) {
        // Bind the image path
        $logo = $uploadFile;

        // Execute query
        if ($stmt->execute()) {
            echo "<p>Client added successfully.</p>";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Failed to upload logo.";
    }

    $stmt->close();
    $conn->close();
}
?>
<h1>Client Logos</h1>

<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Company Name</th>
        <th>Logo</th>
        <th>Actions</th>
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

    // Fetch all data from client table
    $getAllDataQuery = "SELECT clientid, comapnynames, logos FROM client";
    $result = $conn->query($getAllDataQuery);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["clientid"] . '</td>';
            echo '<td>' . $row["comapnynames"] . '</td>';
            echo '<td><img src="' . $row["logos"] . '" style="max-width:100px; max-height:100px;" /></td>';
            echo '<td>';
            echo '<a href="updateclient.php?id=' . $row["clientid"] . '" class="btn btn-primary">Update</a> ';
            echo '<a href="deleteclient.php?id=' . $row["clientid"] . '" class="btn btn-danger">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="4">No clients found</td></tr>';
    }

    $conn->close();
    ?>
    </tbody>
</table>

</body>
</html>
