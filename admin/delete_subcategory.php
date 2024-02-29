<?php
if (isset($_GET['subcategoryid'])) {
    $subcategoryid = $_GET['subcategoryid'];

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
    $stmt = $conn->prepare("DELETE FROM subcategory WHERE subcategoryid = ?");
    $stmt->bind_param("i", $subcategoryid);

    // Execute query
    if ($stmt->execute()) {
        echo "<p>Subcategory deleted successfully.</p>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
