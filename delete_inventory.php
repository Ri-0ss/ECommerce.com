<?php
include '../config.php'; // Include database connection

if (isset($_GET['id'])) { // Check if the ID is provided in the URL
    $inventory_id = $_GET['id'];
    $inventory_id = mysqli_real_escape_string($conn, $inventory_id); // Sanitize the input to prevent SQL injection

    // Check if deletion was confirmed
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // If the form is submitted, delete the inventory record
        $query = "DELETE FROM inventory WHERE inventory_id = '$inventory_id'";
        if (mysqli_query($conn, $query)) {
            // Redirect back to the dashboard with a success message
            header('Location: ../admin.php?message=Inventory item deleted successfully');
            exit;
        } else {
            // Redirect back with an error message
            header('Location: ../admin.php?error=Error deleting inventory item: ' . mysqli_error($conn));
            exit;
        }
    } else {
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
                <p>Are you sure you want to delete this inventory item?</p>
                <form method='POST' action='delete_inventory.php?id=$inventory_id'>
                    <button type='submit' class='btn btn-danger'>Yes, Delete</button>
                    <a href='../admin.php' class='btn btn-secondary'>Cancel</a>
                </form>
            </div>
        </body>
        </html>";
    }
} else {
    // Redirect to the admin page if no ID is provided
    header('Location: ../admin.php?error=No inventory ID provided');
    exit;
}
?>
