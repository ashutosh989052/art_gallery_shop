<?php
session_start();
include_once "db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Verify reCAPTCHA
    $secretKey = '6Lf7-ecpAAAAAL2m67Fh7KG0sFtRHZgBACVjjIKb';
    $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $responseKeys = json_decode(file_get_contents($recaptchaUrl . '?secret=' . $secretKey . '&response=' . $recaptchaResponse), true);

    if (intval($responseKeys["success"]) !== 1) {
        $error = "Please complete the reCAPTCHA verification.";
    } else {
        $query = "SELECT id, name, email FROM admin_users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            header("location: admin_home.php");
        } else {
            $error = "Invalid email or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Art Gallery Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style2/login_style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="container">
        <h1><i class="fas fa-palette"></i> Art Gallery Shop</h1>
        <h2><i class="fas fa-user-lock"></i> Admin Login</h2>
        <form action="" method="POST" class="login-form">
            <div class="form-group">
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6Lf7-ecpAAAAAPbd8obDKCO_dBM_qugV6kGOgVz4"></div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-login"><i class="fas fa-sign-in-alt"></i> Login</button>
            </div>
        </form>
        <?php
        if (isset($error)) {
            echo "<div class='error-message'>$error</div>";
        }
        ?>
    </div>
    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Art Gallery Shop. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
