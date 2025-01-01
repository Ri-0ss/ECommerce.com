<?php
// Database connection
require "config.php";

// Get product ID from URL
$productId = $_GET['id'] ?? null;
if (!$productId) {
    die("Product ID not provided.");
}

// Fetch product details
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

// Handle the purchase submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = $_POST['user_name'];
    $userEmail = $_POST['user_email'];
    $quantity = $_POST['quantity'];
    $address = $_POST['address'];
    $payment = $_POST['payment'];
    $totalPrice = $product['price'] * $quantity;

    // Insert purchase details into the database
    $sql = "INSERT INTO purchases (user_name, user_email, product_id, product_name, quantity, total_price) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisis", $userName, $userEmail, $productId, $product['name'], $quantity, $totalPrice);
    $stmt->execute();
    $purchaseId = $stmt->insert_id;
    $stmt->close();

    // Redirect based on payment method
    if ($payment === 'upi') {
        header("Location: https://pay.google.com"); // Replace with your UPI payment URL
    } elseif ($payment === 'card') {
        header("Location: https://www.paymentgateway.com/card-payment"); // Replace with your Credit/Debit Card payment URL
    } elseif ($payment === 'cod') {
        echo "Order placed successfully with Cash on Delivery. Your total is Rs. $totalPrice.";
        exit();
    } else {
        die("Invalid payment method selected.");
    }
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Purchase Product</h1>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Product: <?php echo htmlspecialchars($product['name']); ?></h3>
                <p class="card-text">Price: Rs. <?php echo htmlspecialchars($product['price']); ?></p>
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
                            <option value="card">Credit/Debit Card</option>
                            <option value="upi">UPI</option>
                            <option value="cod">Cash on Delivery</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Proceed to Buy</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
