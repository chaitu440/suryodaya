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

// Check if the partnerid is set in the URL parameter
if (isset($_GET['partnerid'])) {
    $partnerid = $_GET['partnerid'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM Partners WHERE partnerid=?");
    $stmt->bind_param("i", $partnerid);

    // Execute query
    if ($stmt->execute()) {
        echo "Partner deleted successfully.";
    } else {
        echo "Error deleting partner: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Partner ID not provided.";
}

$conn->close();
?>
