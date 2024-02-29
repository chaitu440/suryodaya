<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="AboutUs.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>About Us</title>
  <style>
    .team-section{
    margin-bottom: 15px;
}
    .gallery-container {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
        white-space: nowrap;
        display: inline-block;
    } 

    .image-wrapper {
        display: inline-block;
        width: 300px; 
        height: 300px; 
        margin-right: 10px; 
        position: relative;
        margin-bottom: 0%;
    }

    .image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border: 0;
    }

    .text-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 10px;
        text-align: center;
        display: none;
    }

    .image-wrapper:hover .text-overlay {
        display: block;
    }

    .prev, .next {
        position: relative;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
      
        font-size: 20px;
        padding: 10px;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        margin-top: 5%;
    }

    .prev {
        left: 0;
        
    }

    .next {
        right: 0; 
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
      box-shadow: 0 12px 12px rgba(255, 94, 21, 0.3); /* Orange shadow on hover */
    }

    .card-img-top {
      object-fit: cover;
      height: 100px;
      width: 100px;
      margin: auto; /* Center the image horizontally */
      display: block;
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
<div class="background-image" style="background-image: url('images/clean-modern-aluminium-windows-with-double-glazing-wooden-wall-generative-ai_124507-78760.jpg');">
    <h2 class="font-weight-bold text" style="color: white;">About Us</h2>
    <p>
        <a href="index.php" class="link-text m-2 text-white" style="text-decoration: none;">
            <i class="fa fa-home"></i> Home
        </a>
        <span class="link-text m-2">
            <i class="fa fa-chevron-right"></i> About Us
        </span>
    </p>
</div>


  <div class="container">
    <div class="d-sm-flex flex-sm-row flex-column mt-4">
      <img src="images/about.jpeg" alt="LOGO" class="img-fluid mb-3 mb-sm-0 mr-sm-4" style="max-width: 40%; height: auto;" />
      <div>
        <div class="mb-3 d-flex align-items-center">
          <i class="fas fa-square-full mr-2" style="color: #ff5e15;"></i>
          <p class="mb-0" style="color: #ff5e15;">WE PROMISE UR DREAMS</p>
        </div>
        <div class="position-relative">
          <p class="font-weight-bold" style="font-size: 2rem; color: #ff5e15;">About SRI SURYODAYA</p>
        </div>
        <div class="ml-2">
          <div class="secondaryTextContainer mb-5">
            <span class="verticalLine ">
              <span class="secondaryText mb-3 ml-3">Constructions - Class-I Contractors<br />
                <span class="secondaryText mb-3 ml-3">Interior Works</span><br />
                <span class="secondaryText mb-3 ml-3">Manufacturers of uPVC Windows & Doors</span>
              </span>
            </span>
          </div>
          <p style="text-align: justify; margin-left: 0; margin-right: auto;">
            Sri Suryodaya Constructions, a recognized firm Class-I Contractors Railways, University, ports, etc.
            in & around Visakhapatnam, was established in 1991. Sri Venkatapathi Raju Gottumukkala as a Managing
            Partner and Smt. Sri Devi Gottumukkala partner.
          </p>
        </div>

        <ul>
          <li style="text-align: justify; margin-left: 0; margin-right: auto;">
            Being a fortuner in the construction industry, it is now looking to make its mark in the design-focused
            interior industry.
          </li>
          <li   style="text-align: justify; margin-left: 0; margin-right: auto;"
>
                The customers as they have the liberty in cost saving by
                purchasing some of the required materials through our own making
                unit of uPVC windows & doors.
              </li>
              <li  style="text-align: justify; margin-left: 0; margin-right: auto;"
>
                We have a sister concern Sri Suryodaya (uPVC Windows & Doors
                systems).
              </li>
              <li   style="text-align: justify; margin-left: 0; margin-right: auto;"
>
                We also provide 15 years warranty for the doors and windows
                installed.
              </li>
        </ul>
      </div>
    </div>
    <div class="mr-5">
          <ul>
            <li style="text-align: justify; margin-left: 0; margin-right: auto;"
>
              <b>Practice profile</b> : We are specialized in executing the
              projects on our own from beginning till the end as this will
              increase the quality . our approach ensures of covering all minute
              details and enables us to proudly say we are delivery 100%
              customer satisfaction. We also took initiative to contract A-Z
              services required, from the best vendors available at affordable
              prices for our customers
            </li>
          </ul>
          <ul>
            <li  style="text-align: justify; margin-left: 0; margin-right: auto;"
>
              <b>Refining ides to enhance living</b>: our practice reflects our
              principles. We offer services ranging from survey, conceptual
              planning, municipal permissions, working drawings, structural
              designs, infrastructural executions and beautifying the
              environment etc.
            </li>
          </ul>
        </div>
    <div class=" mb-40">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="">
                  <div class=" card w-100">
                    <h3
                      class="title text-center"
                      style="color: #ff5e15;"
                    >
                      OUR STRENGTHS ARE OUR CAPABILITIES
                    </h3>
                    <p  class="text-center">
                      Our ability to provide safe, efficient and cost effective
                      solution stand out and make us a key turner in this
                      competitive field.
                      <p class="mt-3 text-center">
                        Moreover
                        <b>
                          we are here not to compete but to rehash the last
                          glory by garnishing with modern updated technologies.
                        </b>
                      </p>
                    </p>
                    <div class="row">
                      <div class="col-md-12 text-center">
                        <h3>
                          <span class="fa fa-asterisk"></span> We are Known
                          for
                        </h3>
                      </div>
                    </div>
                    <div class="row justify-content-center">
                      <ul class="col-md-4 list-unstyled text-center">
                        <li>
                          <i class="fa fa-check"></i> ON TIME COMPLETION
                        </li>
                        <li class="ml-5">
                          <i class="fa fa-check"></i> TRANSPARENT
                          OPERATIONS
                        </li>
                        <li class="mr-4">
                          <i class="fa fa-check"></i> QUALITY ASSURED
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="container mt-5">
    <div class="row">
      <div class="col-md-4">
        <div class="card h-100">
          <img src="images/mechanic.png" alt="Mechanic" class="card-img-top mx-auto d-block" style="height: 100px; width: 100px;">
          <div class="card-body text-center">
            <h4 class="mt-3">Vision</h4>
            <p>
              We Explore, Research & Exchange our ideas in recreating your dreams functionally & aesthetically.
              Sustainable environment for generations to live in and to be a game changer in construction industry globally.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100">
          <img src="images/tire.png" alt="" class="card-img-top mx-auto d-block" style="height: 100px; width: 100px;">
          <div class="card-body text-center">
            <h4 class="mt-3">Mission</h4>
            <p>
              Our mission is to provide design service, safety execution and a tantalizing atmosphere, enabling owners to
              spend wisely sticking to quality & quantity.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100">
          <img src="images/tires.png" alt="tires" class="card-img-top mx-auto d-block" style="height: 100px; width: 100px;">
          <div class="card-body text-center">
            <h4 class="mt-3">Values</h4>
            <p>
              Transparency in operations, innovative & revolutionary in purest form, not violating culture and traditions.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="blog-box">
    <div class="section-space">
            <div class="team-section">
                <h2><b>Meet our patners</b></h2>
            <p1>
                
              
        </div>
      </div>
    </div>
    
</div>

  <?php
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

// Fetch partner data from the database
$getAllPartnersQuery = "SELECT * FROM Partners";
$result = $conn->query($getAllPartnersQuery);

if ($result) {
    $partnersData = [];

    while ($row = $result->fetch_assoc()) {
      $Image = isset($row["logo"]) ? 'admin/' . $row["logo"] : "";

        $partnerItem = [
            "partnerid" => $row["partnerid"],
            "name" => $row["name"],
            "email" => $row["email"],
            "contactnumber" => $row["contactnumber"],
            "designation" => $row["designation"],
            "logo" => $Image,
        ];

        $partnersData[] = $partnerItem;
    }
} else {
    echo "Error fetching partner data: " . $conn->error;
}

$conn->close();
?>


<div class="container mt-5">
    <div class="row">
        <?php foreach ($partnersData as $partner) : ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <?php if (!empty($partner['logo'])) : ?>
                        <img src="<?= $partner['logo'] ?>" alt="<?= $partner['name'] ?>" class="card-img-top rounded-circle mx-auto d-block" style="height: 100px; width: 100px;">
                    <?php endif; ?>
                    <div class="card-body text-center">
                        <h4 class="mt-3"><?= $partner['name'] ?></h4>
                        <p><?= $partner['designation'] ?></p>
                 
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
      </div>
                    </div>

                    <div class="blog-box">
    <div class="section-space">
            <div class="team-section">
                <h2><b>Meet our team</b></h2>
            <p1>
                
              
        </div>
      </div>
    </div>
      </div>
  <?php
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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch partner data from the database
$getAllPartnersQuery = "SELECT * FROM team";
$result = $conn->query($getAllPartnersQuery);

if ($result) {
    $partnersData = [];

    while ($row = $result->fetch_assoc()) {
      $Image = isset($row["logo"]) ? 'admin/' . $row["logo"] : "";

        $partnerItem = [
            "partnerid" => $row["partnerid"],
            "name" => $row["name"],
            "email" => $row["email"],
            "contactnumber" => $row["contactnumber"],
            "designation" => $row["designation"],
            "logo" => $Image,
        ];

        $partnersData[] = $partnerItem;
    }
} else {
    echo "Error fetching partner data: " . $conn->error;
}

$conn->close();
?>


<div class="container mt-5">
    <div class="row">
        <?php foreach ($partnersData as $partner) : ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <?php if (!empty($partner['logo'])) : ?>
                        <img src="<?= $partner['logo'] ?>" alt="<?= $partner['name'] ?>" class="card-img-top rounded-circle mx-auto d-block" style="height: 100px; width: 100px;">
                    <?php endif; ?>
                    <div class="card-body text-center">
                        <h4 class="mt-3"><?= $partner['name'] ?></h4>
                        <p><?= $partner['designation'] ?></p>
                 
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
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
  

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
