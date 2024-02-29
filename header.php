<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <title>SRI SURYODAYA </title>
    <style>
        .sidebar {
            position: fixed;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            background-color: black;
            padding: 20px;
            display: flex;
            flex-direction: column;
            z-index: 1000;
        }

        /* Style all Font Awesome icons */
.fa {
    font-size: 30px;
    margin-bottom: 10px;
    color: #333; /* Default color for icons */
}

/* Set specific colors for each brand */
.fa-facebook {
    color: #1877F2; /* Facebook blue */
}

.fa-linkedin {
    color: #1DA1F2; /* LinkedIn blue */
}

.fa-instagram {
    color: #E4405F; /* Instagram pink */
}

.fa-youtube {
    color: #FF0000; /* YouTube red */
}

.fa-envelope {
    color: #007BFF; /* Email blue */
}
.fa-whatsapp {
    color: green; /* Email blue */
}

/* Add a hover effect if you want */
.fa:hover {
    opacity: 0.7;
}

.custom-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff; /* Set your desired background color */
    border: 2px solid #007bff; /* Set your desired border color */
    color: #fff; /* Set your desired text color */
    border-radius: 5px; /* Optional: Add rounded corners */
    text-decoration: none;
    font-size: 18px;
    transition: transform 0.3s ease-in-out; /* Add a smooth transition effect */
}

.custom-button:hover {
    color: #fff;
    border-color: #0056b3; /* Set your desired border color on hover */
    transform: translateY(-5px); /* Add a 5px vertical translation on hover */
}

</style>
</head>

<body>
<div class="sidebar">
    <a href="https://www.facebook.com/Srisuryodayaconstructions" class="fa fa-facebook"></a>
    <a href="https://www.linkedin.com/in/sri-suryodaya-constructions-2188032a5?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="fa fa-linkedin"></a>
    <a href="https://www.youtube.com/channel/UCwLkFkyqHb319rx2X77VoSQ" class="fa fa-youtube"></a>
    <a href="https://www.instagram.com/srisuryodayaconstructions?igsh=ZGNjOWZkYTE3MQ==" class="fa fa-instagram"></a>
    <a href="mailto:srisuryodaya.info@gmail.com" class="fa fa-envelope"></a>
    <a href="https://wa.me/9390513103" class="fa fa-whatsapp"></a>
</div>

<!-- Rest of your content -->
<div style="margin-left: 100px;">
    <!-- Your main content here -->
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <a class="navbar-brand" href="index.php">
        <img src="images/logo.jpg" alt="Your Logo">
    </a>
    <h1 style="color: #ff4e00;">SRI SURYODAYA </h1>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto mr-auto"> <!-- ml-0 to move links to the left, mr-auto to move links to the right -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php" style="font-size: 18px;">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="aboutus.php" style="font-size: 18px;">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="upvc.php" style="font-size: 18px;">uPVC</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gallery.php" style="font-size: 18px;">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contactus.php" style="font-size: 18px;">Contact Us</a>
            </li>
            <li class="nav-item ml-0">
                <a class="custom-button " href="admin/adminlogin.php" style="font-size: 18px;">Login</a>
            </li>
        </ul>
    </div>
</nav>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
