<?php
include '../config.php'; // Include database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = mysqli_real_escape_string($conn, $id); // Sanitize the input to prevent SQL injection

    // Check if deletion was confirmed
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // If the form is submitted, delete the contact record
        $query = "DELETE FROM contacts WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            // Redirect back to the dashboard with a success message
            header('Location: ../admin.php?message=Contact deleted successfully');
            exit;
        } else {
            // Redirect back with an error message
            header('Location: ../admin.php?error=Error deleting contact: ' . mysqli_error($conn));
            exit;
        }
    } else {
        // Fetch contact details for confirmation (optional)
        $contact_query = "SELECT * FROM contacts WHERE id = '$id'";
        $contact_result = mysqli_query($conn, $contact_query);
        $contact = mysqli_fetch_assoc($contact_result);

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
                <p>Are you sure you want to delete this contact?</p>
                <p><strong>Contact ID:</strong> {$contact['id']}</p>
                <p><strong>Name:</strong> {$contact['name']}</p>
                <p><strong>Email:</strong> {$contact['email']}</p>
                <p><strong>Message:</strong> {$contact['message']}</p>
                <p><strong>Created At:</strong> {$contact['created_at']}</p>
                <form method='POST' action='delete_contact.php?id=$id'>
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
