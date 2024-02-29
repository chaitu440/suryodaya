<?php
if (isset($_GET['productId'])) {
    $productId = $_GET['productId'];
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

    $sql = "SELECT imageid, productid, image FROM ProductImages WHERE productid = ?";
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared successfully
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param('i', $productId);

    // Check if the statement was executed successfully
    if (!$stmt->execute()) {
        die("Error executing statement: " . $stmt->error);
    }

    $result = $stmt->get_result();

    // Check if the result set was obtained successfully
    if (!$result) {
        die("Error getting result: " . $conn->error);
    }

    $images = array();
    while ($row = $result->fetch_assoc()) {
        $row["image"] = 'admin/' . $row["image"];

        $images[] = $row;
    }

    // Return JSON response with product images
    header('Content-Type: application/json');
    echo json_encode($images);
}
?>
