<?php
include '../config.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_path = $_POST['image_path'];
    $details = $_POST['details'];

    // Prepare SQL statement for inserting a new product
    $sql = "INSERT INTO products (name, description, price, image_path, details) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdss", $name, $description, $price, $image_path, $details);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        header("Location:../admin.php?msg=Product added successfully");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add Product</title>
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
        .btn-dark {
            width: 40%;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="card shadow-lg mx-auto" style="max-width: 500px; border-radius:20px;">
            <div class="card-header text-center bg-dark text-white"  style="border-radius:20px 20px 0px 0px;">
                <h4>Add Product</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="add_product.php"> <!-- Change this to the correct filename if needed -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="image_path" class="form-label">Image Path</label>
                        <input type="file" class="form-control" id="image_path" name="image_path" required>
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">Details</label>
                        <textarea class="form-control" id="details" name="details" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">Add Product</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <a href="../admin.php" class="btn btn-danger">Back to Dashboard</a> <!-- Change this to the correct filename if needed -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
