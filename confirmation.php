<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Page - Art Gallery Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style/confirmation_style.css">
</head>

<body>
    <div class="container">
        <h1 class="project-name"><i class="fas fa-palette"></i> Art Gallery Shop</h1>
        <div class="confirmation-message">
            <p>Thank you for your order!</p>
            <p>Your order details have been successfully submitted.</p>
            <a href="generate_pdf.php" class="download-link"><i class="fas fa-file-pdf"></i> Download Order Summary
                (PDF)</a>
            <a href="order_history.php" class="download-link"><i class="fas fa-history"></i> Go to Order History</a>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Art Gallery Shop. All rights reserved.</p>
        </div>
    </footer>

    <?php
// Start the session
session_start();

// Destroy the session after 5 seconds
echo "<script>
    setTimeout(function() {
        window.location.href = 'index.php'; // Redirect to index.php
    }, 5000); // 5000 milliseconds = 5 seconds

    setTimeout(function() {
        window.location.href = 'index.php'; // Redirect to index.php
        <?php
            // Unset all session variables
            // Destroy the session
            session_destroy();
        ?>
    }, 5000); // 5000 milliseconds = 5 seconds
    </script>";
    ?>
</body>

</html>