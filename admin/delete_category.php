<?php
if (isset($_GET['categoryid'])) {
    $categoryid = $_GET['categoryid'];

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
    $stmt = $conn->prepare("DELETE FROM Category WHERE categoryid = ?");
    $stmt->bind_param("i", $categoryid);

    // Execute query
    if ($stmt->execute()) {
        echo "<p>Category deleted successfully.</p>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
