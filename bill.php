<?php
require "config.php"; // Database connection

// Get purchase ID from URL
$purchaseId = $_GET['purchase_id'] ?? null;

if (!$purchaseId) {
    die("Purchase ID not provided.");
}

// Fetch purchase details from the database
$sql = "SELECT p.*, pr.image_path FROM purchases p JOIN products pr ON p.product_id = pr.id WHERE p.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $purchaseId);
$stmt->execute();
$result = $stmt->get_result();
$purchase = $result->fetch_assoc();
$stmt->close();

if (!$purchase) {
    die("Purchase not found.");
}

// Function to convert an image to Base64
function imageToBase64($imagePath) {
    if (file_exists($imagePath)) {
        $imageData = file_get_contents($imagePath);
        return 'data:image/' . pathinfo($imagePath, PATHINFO_EXTENSION) . ';base64,' . base64_encode($imageData);
    }
    return null;
}

// Get Base64 image
$imageBase64 = imageToBase64($purchase['image_path']);

// Handle download request
if (isset($_POST['download_pdf'])) {
    // Generate HTML content with embedded image
    $billContent = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Purchase Receipt</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .header { text-align: center; font-size: 24px; margin-bottom: 20px; }
            .bill-section { border: 1px solid #ccc; padding: 20px; border-radius: 10px; }
            .image { text-align: center; margin-bottom: 15px; }
            .details { margin-top: 10px; }
            .details h4 { margin: 5px 0; }
            .footer { text-align: center; margin-top: 20px; font-size: 16px; color: red; }
            .product-image { max-width: 200px; height: auto; border: 1px solid #ccc; border-radius: 10px; }
        </style>
    </head>
    <body>
        <div class="header">Purchase Receipt</div>
        <div class="bill-section">
            <div class="image">
                <img src="' . $imageBase64 . '" alt="Product Image" class="product-image">
            </div>
            <div class="details">
                <h4>Name: ' . htmlspecialchars($purchase['user_name']) . '</h4>
                <h4>Email: ' . htmlspecialchars($purchase['user_email']) . '</h4>
                <h4>Product: ' . htmlspecialchars($purchase['product_name']) . '</h4>
                <h4>Quantity: ' . htmlspecialchars($purchase['quantity']) . '</h4>
                <h4>Total Price: ₹' . number_format($purchase['total_price'], 2) . '</h4>
            </div>
            <div class="footer">Thank you for your purchase!</div>
        </div>
    </body>
    </html>
    ';

    // Set headers to prompt download as an HTML file
    header('Content-Type: text/html');
    header('Content-Disposition: attachment; filename="bill_' . $purchaseId . '.html"');
    echo $billContent;
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="CSS/user.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">


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

  <div class="container my-5">
    <!-- Card with shadow -->
    <div class="card shadow-lg mt-5">
      <div class="card-body p-4">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
            <h4 class="fw-bold text-warning">YSTORE FASHION</h4>
          </div>
          <div>
            <p class="mb-0 fs-6">realYstore.com</p>
          </div>
        </div>

        <!-- Invoice Content -->
        <div class="mb-4">
        <div class="row">
        <div class="col-md-6">
            <h5 class="fw-bold mb-2">LEO & CO. PRIVATE LIMITED</h5>
            <p class="mb-1 fs-5">+91 123 456 7890</p>
            <p class="fs-5">123, Ghod Dod Road, Surat, Gujarat 395007</p>
        </div>
        <div class="col-md-6 text-end">
            <h6 class="text-warning fw-bold fs-5">INVOICE</h6>
            <p class="mb-1 fs-5">Invoice #12345</p>
            <p class="fs-5">January 5, 2025</p>
        </div>
        </div>

        </div>
        <div class="container py-5 mt-5">
            <div class="table-responsive mx-auto" style="max-width: 800px;">
                <table class="table table-bordered">
                    <thead class="table-secondary">
                        <tr>
                            <th class="fs-5">Details</th>
                            <th class="fs-5">Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fs-5 text-center" colspan="2">
                                <img src="<?php echo htmlspecialchars($purchase['image_path']); ?>" 
                                     alt="<?php echo htmlspecialchars($purchase['product_name']); ?>" 
                                     class="img-fluid rounded shadow-lg" 
                                     style="max-width: 300px; max-height: 150px;">
                            </td>
                        </tr>
                        <tr>
                            <td class="fs-5">Name</td>
                            <td class="fs-5"><?php echo htmlspecialchars($purchase['user_name']); ?></td>
                        </tr>
                        <tr>
                            <td class="fs-5">Email</td>
                            <td class="fs-5"><?php echo htmlspecialchars($purchase['user_email']); ?></td>
                        </tr>
                        <tr>
                            <td class="fs-5">Product</td>
                            <td class="fs-5"><?php echo htmlspecialchars($purchase['product_name']); ?></td>
                        </tr>
                        <tr>
                            <td class="fs-5">Quantity</td>
                            <td class="fs-5"><?php echo htmlspecialchars($purchase['quantity']); ?></td>
                        </tr>
                        <tr>
                            <td class="fs-5 text-dark fw-bold">Total Price</td>
                            <td class="fs-5 text-dark fw-bold">₹<?php echo number_format($purchase['total_price'], 2); ?></td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center text-danger">Thank you for your purchase!</p>
        
                <!-- Button to download the bill -->
                <form method="post" action="" class="text-center">
                    <button type="submit" name="download_pdf" class="btn btn-success">Download Invoice</button>
                </form>
            </div>
        </div>
        
        <!-- Payment Info Section -->
        <div class="row border-top pt-4">
        <div class="col-md-6">
            <h6 class="fw-bold fs-5">PAYMENT INFO</h6>
            <p class="mb-1 fs-5">Bank of Baroda</p>
            <p class="mb-1 fs-5">Account Name: Sterling Hotel</p>
            <p class="mb-1 fs-5">Account No.: +91 987-654-3210</p>
            <p class="fs-5">Pay by: September 19, 2029</p>
        </div>
        <div class="col-md-6 text-end">
            <p class="mb-1 fs-5">contact@sterlinghotel.com</p>
            <p class="mb-1 fs-5">123, Ghod Dod Road, Surat, Gujarat 395007</p>
            <p class="fs-5">+91 123 456 7890</p>
        </div>
        </div>

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
  













