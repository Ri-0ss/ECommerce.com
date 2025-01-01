<?php
include '../config.php'; // Include database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = mysqli_real_escape_string($conn, $id); // Sanitize the input to prevent SQL injection

    // Check if deletion was confirmed
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // If the form is submitted, delete the purchase record
        $query = "DELETE FROM purchases WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            // Redirect back to the dashboard with a success message
            header('Location: ../admin.php?message=Purchase deleted successfully');
            exit;
        } else {
            // Redirect back with an error message
            header('Location: ../admin.php?error=Error deleting purchase: ' . mysqli_error($conn));
            exit;
        }
    } else {
        // Fetch purchase details for confirmation (optional)
        $purchase_query = "SELECT * FROM purchases WHERE id = '$id'";
        $purchase_result = mysqli_query($conn, $purchase_query);
        $purchase = mysqli_fetch_assoc($purchase_result);

        // Show confirmation dialog using HTML form
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
            <title>Confirm Deletion</title>
        </head>
        <body>
            <div class='container mt-5'>
                <h2>Confirm Deletion</h2>
                <p>Are you sure you want to delete this purchase?</p>
                <p><strong>Purchase ID:</strong> {$purchase['id']}</p>
                <p><strong>User Name:</strong> {$purchase['user_name']}</p>
                <p><strong>User Email:</strong> {$purchase['user_email']}</p>
                <p><strong>Product Name:</strong> {$purchase['product_name']}</p>
                <form method='POST' action='delete_purchase.php?id=$id'>
                    <button type='submit' class='btn btn-danger'>Yes, Delete</button>
                    <a href='../admin.php' class='btn btn-secondary'>Cancel</a>
                </form>
            </div>
        </body>
        </html>";
    }
} else {
    header('Location: ../admin.php'); // Redirect if no ID is provided
    exit;
}
?>
