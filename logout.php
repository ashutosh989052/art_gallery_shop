<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        .message {
            position: relative;
            overflow: hidden;
            display: inline-block;
            white-space: nowrap;
        }

        .message p {
            position: relative;
            display: inline-block;
            font-size: 24px;
            animation: reveal 2s forwards;
        }

        @keyframes reveal {
            0% {
                width: 0;
                opacity: 0;
            }
            100% {
                width: 100%;
                opacity: 1;
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
