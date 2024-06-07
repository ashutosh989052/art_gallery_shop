<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$username = "";
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT name FROM users WHERE id = $user_id";
    $result = mysqli_query($connection, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['name'];
    }
}

$name = $email = $contact = "";

// Fetch user details from database
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT name, email, contact FROM users WHERE id = $user_id";
    $result = mysqli_query($connection, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];
        $contact = $row['contact'];
    }
}

// Update user details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $contact = $_POST['contact'];

    if ($password != $confirm_password) {
        $error_message = "Passwords do not match.";
    } else {
        // Update user details in the database
        $sql = "UPDATE users SET name = '$name', email = '$email', password = '$password', contact = '$contact' WHERE id = $user_id";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            $success_message = "Account details updated successfully.";
        } else {
            $error_message = "Error updating account details.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Gallery Shop - Account</title>
    <link rel="stylesheet" href="style2/account_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<div class="container">
    <h1 class="project-name"><i class="fas fa-palette"></i> Art Gallery Shop</h1>
    <div class="welcome-section">
        <p class="welcome-message">Hello, <span id="username"><?php echo $username; ?></span>! <i class="fas fa-smile"></i></p>
        <div class="action-buttons">
            <a href="order_history.php" class="cart-btn"><i class="fas fa-history"></i> Order History</a>
            <a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Go to Cart</a>
            <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>
    <div class="account-container">
        <h2>Update Account Details</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return confirm('Are you sure you want to update your account details?');">
            <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>" required><br>
            <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required><br>
            <input type="password" name="password" placeholder="New Password" required><br>
            <input type="password" name="confirm_password" placeholder="Re-enter Password" required><br>
            <input type="text" name="contact" placeholder="Contact" value="<?php echo $contact; ?>" required><br>
            <input type="submit" value="Update Account">
        </form>
        <?php
        if (isset($error_message)) {
            echo "<div class='error'>$error_message</div>";
        }
        if (isset($success_message)) {
            echo "<div class='success'>$success_message</div>";
        }
        ?>
    </div>
</div>

<footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Art Gallery Shop. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
