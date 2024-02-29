<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>SRI SURYODAYA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        #popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        #popup-content {
            background-color: #fff;
            padding: 40px;
            width: 1000px;
            height: 500px;

            text-align: center;
            border-radius: 5px;
            position: relative;
            margin: 20px;
            color: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }

        #close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            cursor: pointer;
            color: #000000;
            font-size: 24px;
        }

        #popup-content img {
            max-width: 100%;
            height: auto;
            border-radius: 0px;
            margin-bottom: 20px;
        }

        .blog-box {
            background-color: #e2dada;
            padding: 20px;
            margin-top: 20px;
            border: 1px solid #ffffff;
            border-radius: 5px;
        }

        .card {
            position: relative;
            transition: box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0 12px 12px rgba(255, 94, 21, 0.3);
            /* Orange shadow on hover */
        }

        .card-img-top {
            object-fit: cover;
            height: 100px;
            width: 100px;
            margin: auto;
            /* Center the image horizontally */
            display: block;
        }

        .marquee-container {
            overflow: hidden;
        }

        .marquee-inner {
            display: flex;
            animation: marquee 20s linear infinite;
        }

        .marquee-item {
            margin-right: 20px;
            /* Adjust the spacing between logos */
            transition: height 0.5s ease;
            /* Smooth transition for height change */
        }

        .marquee-item:hover {
            height: 20px;
            /* Adjust the reduced height on hover */
        }

        @keyframes marquee {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(-100%);
            }
        }
    </style>

    <script>
        (function (w, d) {
            w.CollectId = "65894fb5fb0fad0b2094055f";
            var h = d.head || d.getElementsByTagName("head")[0];
            var s = d.createElement("script");
            s.setAttribute("type", "text/javascript");
            s.async = true;
            s.setAttribute("src", "https://collectcdn.com/launcher.js");
            h.appendChild(s);
        })(window, document);
    </script>

</head>

<body>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Create a container for the header
            var headerContainer = document.createElement('div');
            headerContainer.id = 'header-container';

            fetch('header.php')
                .then(response => response.text())
                .then(data => {
                    headerContainer.innerHTML = data;
                    document.body.insertBefore(headerContainer, document.body.firstChild);
                })
                .catch(error => console.error('Error fetching header:', error));
        });
    </script>

    <div id="home-content">
        <!-- Bootstrap Carousel -->
        <?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "srisuryo_srisuryodaya";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch carousel data from the database
$sql = "SELECT carouselImage FROM carousel";
$result = $conn->query($sql);

// Store carousel images in an array
$carouselImages = [];
while ($row = $result->fetch_assoc()) {
    $imagePath = $row['carouselImage'];
    $carouselImages[] =  'admin/' . $imagePath; // Adjust the path here
}

// Close the database connection
$conn->close();
?>

<!-- Generate carousel HTML dynamically -->
<div id="carouselExample" class="carousel slide" data-ride="carousel"  data-interval="3000">
    <div class="carousel-inner">
        <?php
        // Generate carousel items dynamically
        foreach ($carouselImages as $index => $image) {
            $isActive = $index === 0 ? 'active' : '';
            echo '<div class="carousel-item ' . $isActive . ' text-center">';
            echo '<img src="' . $image . '" class="d-block mx-auto w-75" style="height: 400px;" alt="Slide ' . ($index + 1) . '">';
            echo '</div>';
            
        }
        ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>










<section id="value" class="v-wrapper ml-3 mt-3">
    <div class="paddings innerWidth flexCenter v-container">
        <div class="row">
            <div class="col-md-6">
                <div class="flexColStart v-left">
                    <div class="mb-3 d-flex align-items-center">
                        <i class="fas fa-circle mr-2" style="color: #ff5e15;"></i>
                        <p class="mb-0" style="color: #ff5e15;">WE PROMISE UR DREAMS</p>
                    </div>

                    <span class="primaryText mb-3" style="color: #ff4e00; font-size: 4rem;">SRI SURYODAYA</span>

                    <div class="secondaryTextContainer mb-5">
                        <span class="verticalLine">
                            <span class="secondaryText mb-3 ml-3">
                                Constructions - Class-I Contractors
                                <br />
                                <span class="secondaryText mb-3 ml-3">
                                    Interior Works
                                </span>
                                <br />
                                <span class="secondaryText mb-3 ml-3">
                                    Manufacturers of uPVC Windows & Doors
                                </span>
                            </span>
                        </span>
                    </div>

                    <div class="card mb-4 w-75 h-25 mr-4" style="text-align: justify;">
                        Sri Suryodaya Constructions, a recognized class-I firm
                        <br />
                        (Railways, University, ports, etc.) <br /> in & around Visakhapatnam, was established in 1991 by Sri Venkatapathi Raju.......
                    </div>
                    
                    <div class="text-center mt-4">
    <a href="aboutus.php" class="btn btn-primary">View More</a>
</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="v-right">
                    <div class="image-container">
                        <img src="images/about.jpeg" alt="" class="img-fluid">
                        <div class="video-box">
        <div class="section-space">
            <video width="400" height="300" controls>
                <source src="videos/vid1.mp4" type="video/mp4">
                
            </video>
        </div>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>







        <?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "srisuryo_srisuryodaya";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch category data from the database
$getAllCategoriesQuery = "SELECT categoryid, categoryname, categoryImage FROM category";
$result = $conn->query($getAllCategoriesQuery);

// Store category images in an array
$categories = [];
while ($row = $result->fetch_assoc()) {
    // Convert the BLOB to base64
    $imageData = $row['categoryImage'];

    // Remove the original BLOB column
    unset($row['categoryImage']);

    // Add the base64-encoded image data to the row
    $row['categoryImageData'] = 'admin/' . $imageData;

    $categories[] = $row;
}

// Close the database connection
$conn->close();
?>

<!-- Display category images dynamically -->
<div class="categories mt-4">

<div class="container">
        <div class="text-center">
            <h2>OUR SERVICES</h2>
        </div>
        <div id="categoryCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($categories as $index => $category) : ?>
                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <div class="category-card ml-3 p-1 shadow text-center" style="width: 250px; height:250px;">
                            <img class="img-fluid mx-auto d-block mb-3" src="<?php echo $category['categoryImageData']; ?>" alt="<?php echo $category['categoryname']; ?>">
                            <p class="category-name"><?php echo $category['categoryname']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#categoryCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#categoryCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="text-center mt-4">
            <a href="gallery.php" class="btn btn-primary">View More</a>
        </div>
        </div>




<h1 class="text-center">Our Recent Projects</h1>

<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "srisuryo_srisuryodaya";
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch product data from the database
$getAllProductsQuery = "SELECT * FROM product";
$result = $con->query($getAllProductsQuery);

// Store product data in an array
$products = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $product = [
            "productid" => $row["productid"],
            "productname" => $row["productname"],
            "productimage" => $row["productimage"],
            "location" => $row["location"],
            "status" => $row["status"],
            "description" => $row["description"],
            "subcategoryid" => $row["subcategoryid"],
        ];

        $products[] = $product;
    }
}

// Close the database connection
$con->close();
?>

<div class="products mt-4">
    <p class="text-center"><h2>OUR PRODUCTS</h2></p>
    <section class="product-wrapper mt-3">
        <div class="paddings innerWidth flexCenter product-container d-flex">
            <?php foreach ($products as $product) : ?>
                <div class="product-card mr-3 p-1 shadow text-center w-25 h-25">
                    <img class="w-75 h-75 mx-auto mb-3"
                         src="admin/<?php echo $product['productimage']; ?>"
                         alt="<?php echo $product['productname']; ?>"
                    />

                    <p class="product-name"><?php echo $product['productname']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- View More button -->
<div class="text-center mt-4">
    <a href="gallery.php" class="btn btn-primary">View More</a>
</div>
</div>


<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "srisuryo_srisuryodaya";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch client data from the database
$clientSql = "SELECT * FROM client";
$clientResult = $conn->query($clientSql);

// Store client logos in an array
$clientLogos = [];
while ($clientRow = $clientResult->fetch_assoc()) {
    $logoData = $clientRow['logos'];
    $clientLogos[] = 'admin/' . $logoData;
}

// Close the database connection
$conn->close();
?>

<!-- Display client logos dynamically -->
<div class="blog-box">
    <div class="section-space">
            <div class="team-section">
                <h2><b>Meet our clients</b></h2>
            <p1>
                
              
       
<div class="clients">
    <section class="c-wrapper mt-3">
        <div class="paddings innerWidth flexCenter c-container marquee-container">
            <div class="marquee-inner">
                <?php foreach ($clientLogos as $clientLogo) : ?>
                    <img
                        class="marquee-item w-25 h-25"
                        src="<?php echo $clientLogo; ?>"
                        alt="Client Logo"
                    />
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
</div>
      </div>
    </div>
      </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var footerContainer = document.createElement('div');
            footerContainer.id = 'footer-container';

            fetch('footer.php')
                .then(response => response.text())
                .then(data => {
                    footerContainer.innerHTML = data;
                    document.body.appendChild(footerContainer);
                })
                .catch(error => console.error('Error fetching footer:', error));
        });
    </script>

    <div id="popup-container">
  <div id="popup-content">
    <div id="close-btn" onclick="closePopup()">X</div>
   

<?php
 // Connect to your database
 $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "srisuryo_srisuryodaya";
 $conn = new mysqli($servername, $username, $password, $dbname);
 
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
$qry = "SELECT * FROM popup";
$result = mysqli_query($conn, $qry);




while ($row = mysqli_fetch_array($result)) {
    echo "<img class='popup-image' src='admin/{$row['logo']}' alt='Popup Image'style='width: 900px; height: 450px;'>";
}
?>


   
  </div>
</div>
<script>

    $('.popup-image').click(function () {
        var imagePath = $(this).attr('src');
        window.open(imagePath, '_blank');
    });
</script>



<script>
  setTimeout(function() {
    openPopup();
  }, 1500);

  function openPopup() {
    document.getElementById('popup-container').style.display = 'flex';
    setTimeout(function() {
      closePopup();
    }, 3000); 
  }

  function closePopup() {
    document.getElementById('popup-container').style.display = 'none';
  }
</script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init()
    </script>
</body>

</html>
