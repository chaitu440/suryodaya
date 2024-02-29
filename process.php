<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phoneNumber = $_POST["phoneNumber"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate the data (you can customize the validation rules)
    $requiredFields = ['name', 'phoneNumber', 'email', 'message'];

    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            echo json_encode([
                "error" => "Error: Missing required data in column '$field'.",
                "status" => 400
            ]);
            http_response_code(400);
            exit;
        }
    }

    // Connect to your database (adjust the details accordingly)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "srisuryo_srisuryodaya";
    $con = mysqli_connect($servername, $username, $password, $dbname);

    // Check the connection
    if (mysqli_connect_errno()) {
        echo json_encode([
            "error" => "Failed to connect to MySQL: " . mysqli_connect_error(),
            "status" => 500
        ]);
        http_response_code(500);
        exit;
    }

    // Prepare and execute the SQL query to insert data
    $insertDataQuery = "INSERT INTO contact_us (fullName, contactNumber, email, message) 
                        VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $insertDataQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssss', $name, $phoneNumber, $email, $message);

        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(["message" => "Data inserted successfully.", "status" => 200]);
        } else {
            echo json_encode(["error" => "Error inserting data: " . mysqli_stmt_error($stmt), "status" => 500]);
        }

        mysqli_stmt_close($stmt);
    }

    // Close the database connection
    mysqli_close($con);
}
?>
