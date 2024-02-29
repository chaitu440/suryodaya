<?php
if (isset($_GET['carouselid'])) {
    $carouselid = $_GET['carouselid'];

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
    $stmt = $conn->prepare("DELETE FROM carousel WHERE carouselid = ?");
    $stmt->bind_param("i", $carouselid);

    // Execute query
    if ($stmt->execute()) {
        echo "<p>Image deleted successfully.</p>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
