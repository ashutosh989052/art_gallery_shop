<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

// Fetch total number of orders from the database
$sql_orders = "SELECT COUNT(*) AS total_orders FROM orders";
$result_orders = mysqli_query($conn, $sql_orders);
$row_orders = mysqli_fetch_assoc($result_orders);
$total_orders = $row_orders['total_orders'];

// Fetch total number of products from the database
$sql_products = "SELECT COUNT(*) AS total_products FROM products";
$result_products = mysqli_query($conn, $sql_products);
$row_products = mysqli_fetch_assoc($result_products);
$total_products = $row_products['total_products'];

// Fetch total number of users from the database
$sql_users = "SELECT COUNT(*) AS total_users FROM users";
$result_users = mysqli_query($conn, $sql_users);
$row_users = mysqli_fetch_assoc($result_users);
$total_users = $row_users['total_users'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/dashboard_style.css">
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

    <div class="content">
        <div class="dashboard-card">
            <div class="card-header" style="background-color: #395886;">
                <i class="fas fa-shopping-basket"></i>
                <h3>Total Orders</h3>
            </div>
            <div class="card-body">
                <p><?php echo $total_orders; ?></p>
            </div>
        </div>

        <div class="dashboard-card">
            <div class="card-header" style="background-color: #638ECB;">
                <i class="fas fa-box-open"></i>
                <h3>Total Products</h3>
            </div>
            <div class="card-body">
                <p><?php echo $total_products; ?></p>
            </div>
        </div>

        <div class="dashboard-card">
            <div class="card-header" style="background-color: #006DA4;">
                <i class="fas fa-users"></i>
                <h3>Total Users</h3>
            </div>
            <div class="card-body">
                <p><?php echo $total_users; ?></p>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Art Gallery Shop. All rights reserved.</p>
    </footer>

    <script src="js/scripts.js"></script>
</body>

</html>