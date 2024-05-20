<?php
session_start();
include_once "db_connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT id, name, email FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['name']; // Set the username in session
        $_SESSION['email'] = $row['email'];
        header("location: cart.php");
    } else {
        $error = "Invalid email or password.";
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
</head>

<body>
    <div class="container">
        <h1><i class="fas fa-palette"></i> Art Gallery Shop</h1>
        <h2><i class="fas fa-sign-in-alt"></i> Login</h2>
        <form action="" method="POST" class="login-form">
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="&#xf0e0; Email" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="&#xf023; Password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-login"><i class="fas fa-sign-in-alt"></i> Login</button>
            </div>
        </form>
        <div class="navigation">
            <a href="index.php" class="btn"><i class="fas fa-home"></i> Home</a>
            <a href="register.php" class="btn"><i class="fas fa-user-plus"></i> Register</a>
        </div>
        <?php
        if(isset($error)) {
            echo "<div class='error-message'>$error</div>";
        }
        ?>
    </div>
    <footer class="footer">
        <p>&copy; <?php echo date('Y'); ?> Art Gallery Shop. All rights reserved.</p>
    </footer>
</body>

</html>