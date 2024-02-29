<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Surodaya Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            margin-left: 250px;
            width: calc(100% - 250px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            margin: 0;
        }
    </style>
</head>
<body>

<div class="sidebar">



<a href="#" onclick="loadContent('partners.php')">Partners</a>
<a href="#" onclick="loadContent('partnersList.php')">PartnersList</a>
    <a href="#" onclick="loadContent('carousel.php')">Carousel</a>
    <a href="#" onclick="loadContent('team.php')">Team</a>
    <a href="#" onclick="loadContent('teamlist.php')">Team List</a>
    <a href="#" onclick="loadContent('category.php')">Categories</a>
    <a href="#" onclick="loadContent('subcatgeories.php')">SubCategories</a>
    <a href="#" onclick="loadContent('products.php')">Products</a>
    <a href="#" onclick="loadContent('productslist.php')">ProductsList</a>
    <a href="#" onclick="loadContent('productimages.php')">ProductImages</a>
    <a href="#" onclick="loadContent('clientImages.php')">ClientImages</a>
    <a href="#" onclick="loadContent('enquiry.php')">Enquiry List</a>
    <a href="#" onclick="loadContent('popup.php')">popup</a>

</div>

<div class="header d-flex justify-content-between align-items-center">
    <h1>Welcome to Admin Dashboard</h1>
    <a href="../index.php" class="btn btn-primary">Logout</a>
</div>


<div class="content" id="dashboardContent">
    <!-- Content loaded dynamically -->
</div>

<script>
    function loadContent(page) {
        fetch(page)
            .then(response => response.text())
            .then(data => {
                document.getElementById('dashboardContent').innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
    }
</script>

</body>
</html>
