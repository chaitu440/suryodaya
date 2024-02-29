<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Surodaya Admin Login</title>
    <style>
      body {
        background-color: grey;
    }
        .glassmorphism-container {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 20px;
            backdrop-filter: blur(1px);
            -webkit-backdrop-filter: blur(1px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .glassmorphism-container h1 {
            color: #fff;
        }

        .glassmorphism-container label {
            color: #fff;
        }

        .glassmorphism-container input,
        .glassmorphism-container button {
            background: rgba(255, 255, 255, 0.5);
            border: none;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body >

<div class="container mt-5 glassmorphism-container" style="background-color: dark;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">Admin Login</h1>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];

                // Your database connection logic here
                $con = new mysqli("localhost", "root", "","srisuryo_srisuryodaya");
               

                if ($con->connect_error) {
                    echo json_encode([
                        "error" => "Connection failed: " . $con->connect_error,
                        "status" => 500
                    ]);
                    http_response_code(500);
                    exit;
                }

                $selectLoginQuery = "SELECT * FROM login WHERE username = ? AND password = ?";
                $stmtLogin = $con->prepare($selectLoginQuery);
                $stmtLogin->bind_param('ss', $username, $password);

                if ($stmtLogin->execute()) {
                    $resultLogin = $stmtLogin->get_result();

                    if ($resultLogin->num_rows > 0) {
                        $loginData = $resultLogin->fetch_assoc();
                        echo '<script>alert("Login successful."); window.location.href = "admindashboard.php";</script>';
                    } else {
                        echo json_encode([
                            "error" => "Login failed. Invalid username or password.",
                            "status" => 401
                        ]);
                        http_response_code(401);
                    }
                }

                $stmtLogin->close();
                $con->close();
            }
            ?>
            <form method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
