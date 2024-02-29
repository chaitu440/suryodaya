<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Add FontAwesome for icons -->
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <title>Surodaya</title>
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
        <h2 class="font-weight-bold text" style="color: white;">Projects</h2>
        <p>
            <a href="index.php" class="link-text m-2 background-link" style="text-decoration: none;">
                <i class="fas fa-home"></i> Home
            </a>
            <span class="link-text m-2">
                <i class="fas fa-chevron-right"></i>Projects
            </span>
        </p>
    </div>

    <h1 class="text-center">Projects Gallery</h1>

    <div class="mb-3 d-flex justify-content-center">
    <form method="GET" action="" class="form-inline">
        <input
            type="text"
            name="search"
            class="form-control form-control-lg mr-2"
            id="search"
            placeholder="Enter status, location, or ID"
            value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"
        />
        <button type="submit" class="btn btn-primary">
            Search
        </button>
    </form>
</div>


    <script>
        function changeSlide(direction) {
        const galleryContainer = document.querySelector('.gallery-container');
        const scrollAmount = galleryContainer.offsetWidth; // Use container width as scroll amount

        if (direction === -1) {
            // Scroll to the left (previous images)
            galleryContainer.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        } else if (direction === 1) {
            // Scroll to the right (next images)
            galleryContainer.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        }
    }
    </script>

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
    
    $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
    
    // Build the SQL query with the search filter
    $getAllProductsQuery = "SELECT * FROM product 
                           WHERE productname LIKE '%$searchQuery%' 
                              OR location LIKE '%$searchQuery%' 
                              OR status LIKE '%$searchQuery%'";
    
    $result = $conn->query($getAllProductsQuery);
    
    if ($result) {
        $counter = 0; // Counter to keep track of images
    
        while ($row = $result->fetch_assoc()) {
            // Start a new row for every second image
            if ($counter % 2 == 0) {
                echo '<div class="row">';
            }
    
            echo '<div class="col-md-4 justify-content-around">';
            echo '<div class="card shadow-lg p-2   bg-white rounded ">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row["productname"] . '</h5>';
            echo '<img class="card-img-top product-image w-50 h-50" src="admin/' . $row["productimage"] . '" alt="' . $row["productname"] . '" data-productid="' . $row["productid"] . '">';
            echo '</div></div>';
            echo '</div>';
    
            // Close the row after every second image
            if ($counter % 2 == 1) {
                echo '</div>';
            }
    
            $counter++;
        }
    
        // If there's an odd number of images, close the last row
        if ($counter % 2 == 1) {
            echo '</div>';
        }
    }
    ?>

    <!-- Include Bootstrap JavaScript library -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var currentImageIndex = 0; // Keep track of the current image index

        // Add click event listener to all elements with class 'product-image'
        document.querySelectorAll('.product-image').forEach(function (image) {
            image.addEventListener('click', function () {
                var productId = this.getAttribute('data-productid');

                // Fetch product images based on product ID
                fetch('getProductImages.php?productId=' + productId)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Handle the retrieved images data
                        displayProductImages(data);
                    })
                    .catch(error => console.error('Error fetching product images:', error));
            });
        });

        function displayProductImages(images) {
            // Create a modal element
            var modal = document.createElement('div');
            modal.classList.add('modal', 'fade');
            modal.id = 'productModal';
            modal.setAttribute('tabindex', '-1');
            modal.setAttribute('role', 'dialog');

            // Create a modal dialog
            var modalDialog = document.createElement('div');
            modalDialog.classList.add('modal-dialog');
            modalDialog.setAttribute('role', 'document');

            // Create a modal content container
            var modalContent = document.createElement('div');
            modalContent.classList.add('modal-content');

            // Create a modal header
            var modalHeader = document.createElement('div');
            modalHeader.classList.add('modal-header');
            modalHeader.innerHTML = '<h5 class="modal-title">Product Images</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

            // Append the header to the modal content
            modalContent.appendChild(modalHeader);

            // Create a modal body
            var modalBody = document.createElement('div');
            modalBody.classList.add('modal-body', 'text-center'); // Add 'text-center' class to center the content

            // Append each image to the modal body
            images.forEach(function (imageData, index) {
                var imgElement = document.createElement('img');
                imgElement.src = imageData.image;
                imgElement.alt = 'Product Image';
                imgElement.style.display = (index === currentImageIndex) ? 'block' : 'none';
                imgElement.style.maxWidth = '100%'; // Ensure images don't exceed modal width

                // Center the image within the card
                var imageContainer = document.createElement('div');
                imageContainer.classList.add('d-flex', 'justify-content-center');
                imageContainer.appendChild(imgElement);

                modalBody.appendChild(imageContainer);
            });

            // Add buttons for each image except the last one
            var prevButton = document.createElement('button');
            prevButton.classList.add('btn', 'btn-primary', 'prev-button');
            prevButton.innerHTML = 'Previous';
            prevButton.addEventListener('click', function () {
                currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
                showPrevNextImage();
            });
            modalBody.appendChild(prevButton);

            var nextButton = document.createElement('button');
            nextButton.classList.add('btn', 'btn-primary', 'next-button');
            nextButton.innerHTML = 'Next';
            nextButton.addEventListener('click', function () {
                currentImageIndex = (currentImageIndex + 1) % images.length;
                showPrevNextImage();
            });
            modalBody.appendChild(nextButton);

            // Append the body to the modal content
            modalContent.appendChild(modalBody);

            // Append the content to the dialog
            modalDialog.appendChild(modalContent);

            // Append the dialog to the modal
            modal.appendChild(modalDialog);

            // Append the modal to the body
            document.body.appendChild(modal);

            // Use Bootstrap's modal function to initialize the modal
            $('#productModal').modal('show');

            // Function to show the previous or next image
            function showPrevNextImage() {
                var images = modalBody.querySelectorAll('img');
                images.forEach(function (image, index) {
                    image.style.display = (index === currentImageIndex) ? 'block' : 'none';
                });
            }
        }
    });
</script>

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
</body>
</html>
