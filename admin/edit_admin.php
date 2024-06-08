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

    if (!empty($password)) {
        $sql = "UPDATE admin_users SET name='$name', email='$email', password='$password' WHERE id=$id";
    } else {
        $sql = "UPDATE admin_users SET name='$name', email='$email' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Admin user updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM admin_users WHERE id=$id";
$result = $conn->query($sql);
$admin = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Admin User</title>
    <link rel="stylesheet" href="css/edit_admin_style.css">
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
    <div class="admins-container">
        <h2>Edit Admin User</h2>
        <form action="edit_admin.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
            <label for="name"><i class="fas fa-user"></i> Name</label>
                <input type="text" name="name" value="<?php echo $admin['name']; ?>" placeholder="Name" required>
            </div>
            <div class="form-group">
            <label for="name"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" name="email" value="<?php echo $admin['email']; ?>" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="name"><i class="fas fa-lock"></i> Password</label>
                <input type="password" name="password" placeholder="New Password (leave blank to keep current)">
            </div>
            <button type="submit"><i class="fas fa-save"></i> Update Admin User</button>
        </form>
    </div>
    <footer class="footer">
        <p>&copy; 2024 Art Gallery Shop. All rights reserved.</p>
    </footer>
</body>
</html>
