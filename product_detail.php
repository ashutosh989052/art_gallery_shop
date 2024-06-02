<?php
session_start();
include 'db_connection.php';

if (!isset($_GET['product_id'])) {
    header('Location: cart.php');
    exit();
}

$product_id = $_GET['product_id'];
$sql = "SELECT * FROM products WHERE id = $product_id";
$result = mysqli_query($connection, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $product = mysqli_fetch_assoc($result);
} else {
    echo "Product not found.";
    exit();
}

// Handle Add to Cart functionality
if (isset($_POST['add_to_cart'])) {
    $quantity = $_POST['quantity'];

    // Add item to cart array in session
    $item = [
        'id' => $product['id'],
        'name' => $product['name'],
        'price' => $product['price'],
        'quantity' => $quantity
    ];
    $_SESSION['cart'][] = $item;
    header('Location: cart.php');
    exit();
}

// Handle Buy functionality
if (isset($_POST['buy_now'])) {
    $quantity = $_POST['quantity'];

    // Add item to cart array in session
    $item = [
        'id' => $product['id'],
        'name' => $product['name'],
        'price' => $product['price'],
        'quantity' => $quantity
    ];
    $_SESSION['cart'][] = $item;
    header('Location: bill.php'); // Assuming you have a checkout.php for handling the purchase
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?> - Product Detail</title>
    <link rel="stylesheet" href="style2/product_detail_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<div class="container">
    <h1 class="project-name"><i class="fas fa-palette"></i> Art Gallery Shop</h1>
    <div class="welcome-section">
        <p class="welcome-message">Hello, <span id="username"><?php echo $username; ?></span>! <i class="fas fa-smile"></i></p>
        <div class="action-buttons">
            <a href="order_history.php" class="cart-btn"><i class="fas fa-history"></i> Order History</a>
            <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>
</div>
    <div class="product-detail-container">
        <h1><?php echo $product['name']; ?></h1>
        <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
        <p class="price">₹<?php echo $product['price']; ?></p>
        <p><?php echo $product['description']; ?></p>

        <form method="post">
            <input type="number" name="quantity" min="1" value="1">
            <button type="submit" name="add_to_cart" class="btn">Add to Cart</button>
            <button type="submit" name="buy_now" class="btn">Buy Now</button>
        </form>
        <a href="cart.php" class="btn">Back to Cart</a>
    </div>
    <footer class="footer">
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> Art Gallery Shop. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
