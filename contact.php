<?php
// Database configuration
require "config.php";
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    // Set parameters
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $message = isset($_POST['message']) ? $_POST['message'] : null;

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Your message has been sent successfully!');</script>"; // Success message alert
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
} else {
    echo "Form not submitted.";
}

$conn->close();
?>



    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Responsive Navbar</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="CSS/user.css">
        <style>
            .btn-gradient-instagram {
                background: linear-gradient(45deg, #fd1d1d, #833ab4);
                color: white;
            }
            .btn-gradient-facebook {
                background: linear-gradient(45deg, #3b5998, #8b9dc3);
                color: white;
            }
            .btn-gradient-twitter {
                background: linear-gradient(45deg, #1da1f2, #1c92e8);
                color: white;
            }
            .btn-gradient-send {
                background: linear-gradient(45deg, #ff6a8a, #ff3b30);
                color: white;
            }
        </style>
       
    </head>
    <body>
        <!-- navbar -->
        <nav>
            <div class="logo">
                <h1>YSTORE</h1>
            </div>
            <div class="icon" id="toggle-menu">
                <i class="fa-solid fa-bars"></i>
            </div>
            <ul id="nav-links">
                <li><a href="user.php" class="active">Home</a></li>
                <li><a href="about.php" id="shops">About</a></li>
                <li><a href="shop.php" id="reviews">Shop</a></li>
                <li><a href="blogs.php" id="blogs">Blog</a></li>
                <li><a href="contact.php" id="contacts">Contact</a></li>
                <li><a href="logout.php" id="logout" class="logout-button text-info">Logout</a></li> <!-- Logout button -->

            </ul>
        </nav>
    
<div class="container mt-5 py-2">
    <div class="text-center mb-4 mt-5 py-9">
        <h1>Get in Touch</h1>
        <p class="lead">We'd love to hear from you! Please fill out the form below.</p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4 border-0 shadow-lg">
                <div class="card-body">
                    <h4 class="card-title">Contact Information</h4>
                    <p><strong>Email:</strong> contact@fashionworld.com</p>
                    <p><strong>Phone:</strong> +1 (234) 567-890</p>
                    <p><strong>Address:</strong> 123 Fashion Street, Style City, FC 45678</p>
                    <p>Follow us on our social media for the latest updates!</p>
                    <a href="https://www.instagram.com" target="_blank" class="btn btn-gradient-instagram btn-sm shadow-lg">Instagram</a>
                    <a href="https://www.facebook.com" target="_blank" class="btn btn-gradient-facebook btn-sm shadow-lg">Facebook</a>
                    <a href="https://twitter.com" target="_blank" class="btn btn-gradient-twitter btn-sm shadow-lg">Twitter</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4 border-0 shadow-lg">
                <div class="card-body">
                    <h4 class="card-title">Contact Form</h4>
                    <form action="contact.php" method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" name="message" id="message" rows="5" placeholder="Your Message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-gradient-send shadow-lg">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h2 class="text-center mt-5 mb-5">Our Location</h2>
    <div class="mb-4 shadow-lg mt-5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3721.1851196051443!2d72.75427717460383!3d21.145029983776173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04ddd12bcd12b%3A0x2038ff3f44cfd4d5!2sVR%20Mall%20Surat!5e0!3m2!1sen!2sau!4v1734882217926!5m2!1sen!2sau" 
            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>



<!-- footer -->
<div class="bg-black py-5 mt-5">
    <div class="container">
      <div class="row  text-md-start">
        <!-- Column 1 -->
        <div class="col-md-3 mb-4">
          <h3 class="fw-bold text-light">Shoppy</h3>
          <p class="text-light py-2">Lorem ipsum dolor sit amet consectetur adipisicing.<br> Dolore eum vero dolorem tempore magni!<br> Inventore deleniti voluptas porro eligendi.</p>
        </div>
        <!-- Column 2 -->
        <div class="col-md-3 mb-4">
          <h3 class="fw-bold text-light">Explore</h3>
          <p><a href="#" class="text-decoration-none text-light">All</a></p>
          <p><a href="#" class="text-decoration-none text-light">Rated</a></p>
          <p><a href="#" class="text-decoration-none text-light">Scores</a></p>
          <p><a href="#" class="text-decoration-none text-light">Tipes</a></p>
          <p><a href="#" class="text-decoration-none text-light">Guide</a></p>
        </div>
        <!-- Column 3 -->
        <div class="col-md-3 mb-4">
          <h3 class="fw-bold text-light">Connect</h3>
          <p><a href="#" class="text-decoration-none text-light">YouTube</a></p>
          <p><a href="#" class="text-decoration-none text-light">Instagram</a></p>
          <p><a href="#" class="text-decoration-none text-light">Twitter</a></p>
          <p><a href="#" class="text-decoration-none text-light">Facebook</a></p>
          <p><a href="#" class="text-decoration-none text-light">Pinterest</a></p>
        </div>
        <!-- Column 4 -->
        <div class="col-md-3 mb-4">
          <h3 class="fw-bold text-light">Nity Grity</h3>
          <p><a href="#" class="text-decoration-none text-light">Terms & Conditions</a></p>
          <p><a href="#" class="text-decoration-none text-light">Privacy Policy</a></p>
          <p><a href="#" class="text-decoration-none text-light">FAQs</a></p>
          <p><a href="#" class="text-decoration-none text-light">Special Credits</a></p>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Buy Page -->
  <div class="container my-5 d-none" id="buyPage">
    <div class="d-flex justify-content-end">
      <i class="fas fa-times fs-3" style="cursor: pointer;"></i>
    </div>
    <div class="text-center">
      <h3 class="fw-bold">Order Summary</h3>
      <p>Details will be displayed here...</p>
    </div>
  </div>
  

<script src="Js/user.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
