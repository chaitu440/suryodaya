<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
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

    $clientid = $_GET["id"];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM client WHERE clientid=?");
    $stmt->bind_param("i", $clientid);

    // Execute query
    if ($stmt->execute()) {
        echo "<p>Client deleted successfully.</p>";
    } else {
        echo "Error deleting client: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
