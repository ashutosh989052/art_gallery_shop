<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];

    if (!empty($password)) {
        $sql = "UPDATE users SET name='$name', email='$email', password='$password', contact='$contact' WHERE id=$id";
    } else {
        $sql = "UPDATE users SET name='$name', email='$email', contact='$contact' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="css/edit_user_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
            <h1>Art Gallery Shop</h1>
        </div>
        <ul class="nav-links">
            <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="manage_orders.php"><i class="fas fa-shopping-basket"></i> Manage Orders</a></li>
            <li><a href="manage_products.php"><i class="fas fa-box-open"></i> Manage Products</a></li>
            <li><a href="manage_users.php"><i class="fas fa-users"></i> Manage Users</a></li>
            <li><a href="manage_admins.php"><i class="fas fa-user-cog"></i> Manage Admins</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </nav>

    <div class="users-container">
        <h2>Edit User</h2>
        <form action="edit_user.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label for="name"><i class="fas fa-user"></i> Name</label>
                <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" placeholder="Name"
                    required>
            </div>
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" placeholder="Email"
                    required>
            </div>
            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> New Password (leave blank to keep current)</label>
                <input type="password" id="password" name="password" placeholder="New Password">
            </div>
            <div class="form-group">
                <label for="contact"><i class="fas fa-phone"></i> Contact</label>
                <input type="text" id="contact" name="contact" value="<?php echo $user['contact']; ?>"
                    placeholder="Contact" required>
            </div>
            <button type="submit"><i class="fas fa-save"></i> Update User</button>
        </form>
    </div>
    <footer class="footer">
        <p>&copy; 2024 Art Gallery Shop. All rights reserved.</p>
    </footer>
</body>

</html>