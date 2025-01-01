<?php
// database.php
require "config.php";
// Fetch products from the database
$sql = "SELECT * FROM products LIMIT 12"; // Fetch exactly 12 products
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cards</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="CSS/user.css">
  <style>
    .card-img-top {
      width: 100%; /* Ensures the image fills the width of the card */
      height: 200px; /* Fixed height for the image */
      object-fit: cover; /* Ensures the image covers the area without distortion */
    }
  </style>
</head>
<body>
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



  <div class="container py-5">
    <h1 class="mb-5 mt-5 text-center">Our Products</h1>
    <div class="row g-4">
      <?php
      // Check if there are products and display them
      if ($result->num_rows > 0) {
          // Output data of each row
          while($product = $result->fetch_assoc()) {
              ?>
              <div class="col-md-4">
                <div class="card shadow-lg">
                  <img src="<?php echo htmlspecialchars($product['image_path']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>
                    <p><strong>Reviews:</strong><span id="product-reviews"></span> ★★★★</p>
                    <p class="card-text"><strong>Rs: <?php echo htmlspecialchars($product['price']); ?></strong></p>
                    <a href="product.php?id=<?php echo $product['id']; ?>" class="btn btn-dark">Buy Now</a>
                  </div>
                </div>
              </div>
              <?php
          }
      } else {
          echo "<p class='text-center'>No products found.</p>";
      }
      ?>
    </div>
  </div>
  



  <!-- footer -->
<div class="bg-black py-5">
    <div class="container">
      <div class="row text-center text-md-start">
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
