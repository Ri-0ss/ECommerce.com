<?php
require "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #loader {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 60px;
            font-weight: bold;
            color: white;
            width: 100px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(45deg, #ff9a9e, #fad0c4);
            border-radius: 50%;
            z-index: 1050; /* Above other elements */
            animation: bounce 1s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translate(-50%, -50%) scale(1);
            }
            50% {
                transform: translate(-50%, -50%) scale(1.2);
            }
        }
    </style>
</head>
<body>
    <div id="loader">Y</div>
    <script>
        // Redirect to the billing page after 3 seconds
        setTimeout(() => {
            window.location.href = 'bill.php'; // Replace with the actual billing page URL
        }, 3000);
    </script>
</body>
</html>
