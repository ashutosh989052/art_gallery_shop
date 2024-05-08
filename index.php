<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Art Gallery Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style/index_style.css">
    <style>
    body {
        background-image: url('images/bg11.jpg');
        background-size: cover;
    }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <h1><i class="fas fa-palette"></i> Art Gallery Shop</h1>
            <div class="nav-links">
                <a href="register.php" class="button"><i class="fas fa-user-plus"></i> Register</a>
                <a href="login.php" class="button"><i class="fas fa-sign-in-alt"></i> Login</a>
                <a href="admin_login.php" class="button"><i class="fas fa-user-lock"></i> Admin Login</a>
            </div>
        </div>
    </header>

    <main>
        <section class="quote-section">
            <div class="container">
                <div class="quote">
                    <div class="quote-content">
                        <h2>Art enables us to find ourselves and lose ourselves at the same time.</h2>
                        <p>- Thomas Merton</p>
                    </div>
                </div>

                <div class="quote">
                    <div class="quote-content">
                        <h2>Every artist was first an amateur.</h2>
                        <p>- Ralph Waldo Emerson</p>
                    </div>
                </div>

                <div class="quote">
                    <div class="quote-content">
                        <h2>Art washes away from the soul the dust of everyday life.</h2>
                        <p>- Pablo Picasso</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="js/script.js"></script>
    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Art Gallery Shop. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>