<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Suryodaya</title>
    <style>
         


    .card {
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-10px);
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
    <div class="container-fluid">
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
<div class="background-image" style="
    background-image: url('images/clean-modern-aluminium-windows-with-double-glazing-wooden-wall-generative-ai_124507-78760.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 50vh;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
">
    <h2 class="font-weight-bold text" style="color: white;">Contact Us</h2>
    <p>
        <a href="index.php" class="link-text m-2 background-link" style="text-decoration: none;">
            <i class="fa fa-home"></i> Home
        </a>
        <span class="link-text m-2">
            <i class="fa fa-chevron-right"></i>Contact Us
        </span>
    </p>
</div>
<div style="margin-top: 5%;" class="container">
    <div style="margin-top: 5%;" class="row justify-content-center">
        <!-- Chat Card -->
        <div class="card-container justify-content-around d-flex">
            <div style="" class="card w-50 shadow-lg m-2">
            <i class="fa fa-comment chat-icon-lg fa-3x justify-content-center" alt="Chat Icon" style="color: orangered;"></i>

                <div class="card-content text-center">
                    <h4 style="margin-top: 1.5rem;">Chat With Us</h4>
                    <p>We've got live Experts Available From Monday To Saturday (9:00AM To 6:00PM)</p>
                    <a href="https://wa.me/9390513103" target="_blank" rel="noopener noreferrer" class="btn mb-2" style="background-color: orangered; color: white;">
                        Chat With Us
                    </a>
                </div>
            </div>

            <!-- Email Card -->
            <div style="" class="card w-50 shadow-lg m-2">
                <i class="fa fa-envelope envelope-icon-lg fa-3x justify-content-center" alt="Envelope Icon" style="color: orangered;"></i>
                <div class="card-content text-center">
                    <h4 style="margin-bottom: 1.5rem;">Email Address</h4>
                    <p style="margin-bottom: 1.5rem;">suryodayaupvc@gmail.com</p>
                    <p style="margin-bottom: 1.5rem;">srisuryodaya.info@gmail.com</p>
                    <a href="mailto:srisuryodaya.info@gmail.com" class="btn mt-3" style="background-color: orangered; color: white;">
                        Email Us
                    </a>
                </div>
            </div>

            <!-- Phone Card -->
            <div style="" class="card w-50 shadow-lg m-2">
                <i class="fa fa-phone phone-icon-lg fa-3x justify-content-center" alt="Phone Icon" style="color: orangered;"></i>
                <div class="card-content text-center">
                    <h4>Give us a call</h4>
                    <p>Give us a ring. Our Experts are standing by Monday to Saturday from (9:00AM To 6:00PM)</p>
                   
                    <button class="btn" style="background-color: orangered; color: white;">
                    9390513103
                    </button>
                </div>
            </div>

            <!-- Location Card -->
            <div style="margin-bottom: 2%;" class="card w-50 shadow-lg m-2">
            <i class="fa fa-user fa-3x" style="color: orangered;"></i>

     

                <div class="card-content text-center">
                    <h4>Office Address</h4>
                    <p>#43-9-149, Float No. 404, 4th Floor A.V.R Enclave, Dondaparthy Main Road Beside TATA Motors, Visakhapatnam-530016</p>
                    <a href="https://maps.app.goo.gl/s2wj7qZm18nKSaau7" target="_blank" rel="noopener noreferrer" class="btn" style="background-color: orangered; color: white;">
                        View on Map
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4  d-flex justify-content-center align-items-center">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded w-75 ">
                <h4 class="contactus text-center">Get A Quote</h4>
                <div class="card-body">
                    <form id="contactForm" class="contact-form" action="process.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="phoneNumber" class="form-label">Contact Number</label>
                            <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter your message" required></textarea>
                        </div>
                        <br>
                        <button type="submit" class="button-48" role="button">
                            <span class="text">Submit</span>
                        </button>
                    </form>
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
  
  <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('contactForm').addEventListener('submit', function (event) {
                event.preventDefault();

                // Fetch data from the form
                const formData = new FormData(event.target);

                // Submit the form data to process.php
                fetch('process.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 200) {
                        // If data is successfully saved, show a popup
                        alert('Data saved successfully!');
                        document.getElementById('contactForm').reset();
                    } else {
                        // If there's an error, show an alert with the error message
                        alert('Error: ' + data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
            });
        });
    </script>

  <div>
</body>

</htm>