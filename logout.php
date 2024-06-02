<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .message {
        font-size: 24px;
        color: #333;
        animation: fade-in 1s ease-out;
    }

    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    </style>
</head>

<body>
    <div class="message">
        <p>Thank you for using our service!</p>
    </div>
    <?php
session_start();
session_unset();
session_destroy();
header("refresh:2;url=login.php"); // Redirect to the login page after logout
exit;
?>
</body>

</html>