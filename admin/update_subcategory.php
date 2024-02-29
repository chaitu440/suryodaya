<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Suroday Admin Dashboard</title>
</head>
<body>

<div class="container">
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

        // Fetch subcategory data by ID
        $getSubcategoryQuery = "SELECT * FROM subcategory WHERE subcategoryid = '$subcategoryid'";
        $result = $conn->query($getSubcategoryQuery);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>

            <h1>Update Subcategory</h1>
            <form method="post" action="update_subcategory.php?subcategoryid=<?php echo $subcategoryid; ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="categoryid">Select Category:</label>
                    <select class="form-control" id="categoryid" name="categoryid">
                        <?php
                        // Fetch categories data
                        $sql = "SELECT categoryid, categoryname FROM Category";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($category_row = $result->fetch_assoc()) {
                                $selected = ($category_row["categoryid"] == $row["categoryid"]) ? "selected" : "";
                                echo '<option value="' . $category_row["categoryid"] . '" ' . $selected . '>' . $category_row["categoryname"] . '</option>';
                            }
                        } else {
                            echo '<option value="">No categories found</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="subcategoryname">Subcategory Name:</label>
                    <input type="text" class="form-control" id="subcategoryname" name="subcategoryname" value="<?php echo $row["subcategoryname"]; ?>" required>
                </div>
                <div class="form-group">
                    <label for="subcategoryimage">Current Subcategory Image:</label><br>
                    <img src="<?php echo $row["subcategoryImage"]; ?>" alt="Current Subcategory Image" style="max-width: 200px; max-height: 200px;"><br>
                    <label for="subcategoryimage">New Subcategory Image:</label>
                    <input type="file" class="form-control-file" id="subcategoryimage" name="subcategoryimage">
                    <input type="hidden" name="current_image" value="<?php echo $row["subcategoryImage"]; ?>">
                </div>
                <input type="submit" class="btn btn-primary" value="Update Subcategory">
            </form>

            <?php
        } else {
            echo "Subcategory not found";
        }

        $conn->close();
    } else {
        echo "Invalid request.";
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
