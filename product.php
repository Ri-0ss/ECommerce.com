<?php
// Database Configuration
require "config.php";
// Get product ID from URL
$productId = $_GET['id'] ?? null;

if (!$productId) {
    die("Product ID not provided.");
}

// Fetch Product Details
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
$stmt->close();

if (!$product) {
    die("Product not found.");
}
// Handle Purchase Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $userName = $_POST['user_name'];
  $userEmail = $_POST['user_email'];
  $quantity = $_POST['quantity'];
  $address = $_POST['address'];
  $payment = strtolower($_POST['payment']); // Convert to lowercase for consistency
  $totalPrice = $product['price'] * $quantity;

  $sql = "INSERT INTO purchases (user_name, user_email, product_id, product_name, quantity, total_price, payment_method)
          VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssisids", $userName, $userEmail, $productId, $product['name'], $quantity, $totalPrice, $payment);
  $stmt->execute();
  $purchaseId = $stmt->insert_id;
  $stmt->close();

  // Redirect based on payment method
  if ($payment === 'upi') {
      header("Location: https://pay.google.com"); // Replace with your UPI gateway
      exit();
  } elseif ($payment === 'credit/debit') {
      header("Location: https://www.visa.com"); // Replace with your Card gateway
      exit();
  } elseif ($payment === 'cash on delivery') {
      header("Location: bill.php?purchase_id=$purchaseId");
      exit();
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Product Detail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/user.css">
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

    <div class="container py-5 mt-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <h2 class="card-title mb-4 text-center">Product Details</h2>

                <!-- Product Image -->
                <div class="text-center mb-4">
                    <img src="<?php echo htmlspecialchars($product['image_path']); ?>" 
                         alt="<?php echo htmlspecialchars($product['name']); ?>" 
                         class="img-fluid rounded shadow-lg" 
                         style="max-width: 500px; max-height: 300px;">
                </div>

                <!-- Product Information -->
                <div class="mb-4">
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                    <h4>Price: ₹<?php echo number_format($product['price'], 2); ?></h4>
                </div>

                <!-- Purchase Form -->
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="user_name" class="form-label">Name</label>
                        <input type="text" id="user_name" name="user_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" name="user_email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" min="1" value="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea id="address" name="address" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                    <label for="payment" class="form-label">Payment Method</label>
                    <select id="payment" name="payment" class="form-select" required>
                        <option value="UPI">UPI</option>
                        <option value="Credit/Debit">Credit/Debit Card</option>
                        <option value="Cash on Delivery">Cash on Delivery</option>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-dark w-80">Proceed to Buy</button>
                   
                </form>
            </div>
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
