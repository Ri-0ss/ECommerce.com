<?php
include '../config.php'; // Include database connection

// Initialize variables
$id = '';
$product_name = '';
$quantity = '';
$price = '';
$supplier = '';

// Check if ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch existing inventory data
    $sql = "SELECT product_name, quantity, price, supplier FROM inventory WHERE inventory_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($product_name, $quantity, $price, $supplier);
    $stmt->fetch();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure POST variables are set
    if (isset($_POST['id'], $_POST['product_name'], $_POST['quantity'], $_POST['price'], $_POST['supplier'])) {
        $id = $_POST['id'];
        $product_name = $_POST['product_name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $supplier = $_POST['supplier'];

        $sql = "UPDATE inventory SET product_name = ?, quantity = ?, price = ?, supplier = ? WHERE inventory_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sidss", $product_name, $quantity, $price, $supplier, $id);

        if ($stmt->execute()) {
            header("Location: ../admin.php?msg=Inventory updated successfully");
            exit;
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Error: All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Inventory</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 20px;
        }
        .card-header {
            border-radius: 20px 20px 0 0;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="card shadow-lg mx-auto" style="max-width: 500px; border-radius:20px;">
            <div class="card-header text-center bg-dark text-white" style="border-radius:20px 20px 0px 0px;">
                <h4>Update Inventory</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="update_inventory.php">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo htmlspecialchars($product_name); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo htmlspecialchars($quantity); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?php echo htmlspecialchars($price); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="supplier" class="form-label">Supplier</label>
                        <input type="text" class="form-control" id="supplier" name="supplier" value="<?php echo htmlspecialchars($supplier); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-dark w-80">Update Inventory</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <a href="../admin.php" class="btn btn-warning w-80">Back to Dashboard</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
