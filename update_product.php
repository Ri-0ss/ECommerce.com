<?php
include '../config.php'; // Include database connection

// Initialize variables
$id = '';
$name = '';
$description = '';
$price = '';
$image_path = '';
$details = '';

// Check if ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch existing product data
    $sql = "SELECT name, description, price, image_path, details FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($name, $description, $price, $image_path, $details);
    $stmt->fetch();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure POST variables are set
    if (isset($_POST['id'], $_POST['name'], $_POST['description'], $_POST['price'], $_POST['image_path'], $_POST['details'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image_path = $_POST['image_path'];
        $details = $_POST['details'];

        $sql = "UPDATE products SET name = ?, description = ?, price = ?, image_path = ?, details = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdssi", $name, $description, $price, $image_path, $details, $id);

        if ($stmt->execute()) {
            header("Location: ../admin.php?msg=Product updated successfully");
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
    <title>Update Product</title>
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
                <h4>Update Product</h4>
            </div>
            <div class="card-body">
                <?php if (isset($error)) { ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php } ?>
                <form method="POST" action="update_product.php">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required><?php echo htmlspecialchars($description); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?php echo htmlspecialchars($price); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="image_path" class="form-label">Image Path</label>
                        <input type="file" class="form-control" id="image_path" name="image_path" value="<?php echo htmlspecialchars($image_path); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">Details</label>
                        <textarea class="form-control" id="details" name="details" rows="3" required><?php echo htmlspecialchars($details); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark w-80">Update Product</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <a href="../admin.php" class="btn btn-warning">Back to Dashboard</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
