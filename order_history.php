<?php
session_start();

// Include database connection
include 'db_connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}

// Fetch username from the database based on user_id
$user_id = $_SESSION['user_id'];
$sql = "SELECT name, email FROM users WHERE id = $user_id";
$result = mysqli_query($connection, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $username = $row['name'];
    $user_email = $row['email'];
}

// Fetch order history for the user from the database
$sql = "SELECT * FROM orders WHERE email = '$user_email'";
$result = mysqli_query($connection, $sql);
$orderHistory = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $row['order_details'] = json_decode($row['order_details'], true); // Decode JSON string to array
        $orderHistory[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Gallery Shop - Order History</title>
    <link rel="stylesheet" href="style2/order_history_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

    <div class="container">
        <h1 class="project-name"><i class="fas fa-palette"></i>Art Gallery Shop</h1>
        <div class="welcome-section">
            <strong>
                <p class="welcome-message">Welcome, <?php echo $username; ?>!</p>
            </strong>
            <div class="action-buttons">
                <a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Go to Cart</a>
                <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </div>


    <div class="order-history">
        <h2>Your Order History</h2>
        <?php if (empty($orderHistory)): ?>
        <p>No orders found.</p>
        <?php else: ?>
        <?php foreach ($orderHistory as $order): ?>
        <div class="order-container">
            <p><strong>Order ID:</strong> <?php echo $order['id']; ?>&emsp; &emsp; &emsp; <strong>Date:</strong>
                <?php echo $order['created_at']; ?></p>


            <p><strong>Name:</strong> <?php echo $order['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $order['email']; ?></p>
            <p><strong>Mobile:</strong> <?php echo $order['mobile']; ?></p>
            <p><strong>Address:</strong>
                <?php echo $order['address'] . ', ' . $order['district'] . ', ' . $order['pincode']; ?></p>
            <p><strong>Area:</strong> <?php echo $order['area']; ?></p>
            <div class="order-details">
                <strong>Order Details:</strong>
                <table>
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order['order_details'] as $item): ?>
                        <tr>
                            <td><?php echo $item['item_name']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>₹<?php echo $item['price']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr class="total-row">
                            <td colspan="2"><strong>Total:</strong></td>
                            <td><strong>₹<?php echo $order['total_amount']; ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="pdf-btn-container">
                <form action="generate_pdf.php" method="post">
                    <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                    <button type="submit" name="generate_pdf" class="pdf-btn"><i class="fas fa-file-pdf"></i>
                        PDF</button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Art Gallery Shop. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>