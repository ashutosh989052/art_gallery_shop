<?php
session_start();

// Include database connection
include 'db_connection.php';

// Check if the cart is set in the session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Initialize username variable
$username = "";

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Fetch username from the database based on user_id
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT name FROM users WHERE id = $user_id";
    $result = mysqli_query($connection, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['name'];
    }
}

// Function to fetch products from the database
function getProducts($connection) {
    $products = [];
    $sql = "SELECT * FROM products";
    $result = mysqli_query($connection, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
    }
    return $products;
}

// Fetch products from the database
$products = getProducts($connection);

// Add item to cart array in session when the "Add to Cart" button is clicked
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Fetch product details from the database
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($connection, $sql);
    $product = mysqli_fetch_assoc($result);

    // Add item to cart array in session
    $item = [
        'id' => $product['id'],
        'name' => $product['name'],
        'price' => $product['price'],
        'quantity' => $quantity
    ];
    $_SESSION['cart'][] = $item;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Gallery Shop - Shopping Cart</title>
    <link rel="stylesheet" href="style2/cart_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

    <div class="container">
        <h1 class="project-name"><i class="fas fa-palette"></i> Art Gallery Shop</h1>
        <div class="welcome-section">
            <p class="welcome-message">Hello, <span id="username"><?php echo $username; ?></span>! <i
                    class="fas fa-smile"></i></p>
            <div class="action-buttons">
                <a href="order_history.php" class="cart-btn"><i class="fas fa-history"></i> Order History</a>
                <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </div>

    <div class="product-grid">
        <?php if (empty($products)): ?>
        <p>No products available.</p>
        <?php else: ?>
        <?php foreach ($products as $product): ?>
        <div class="product">
            <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
            <h3><?php echo $product['name']; ?></h3>
            <p class="price">$<?php echo $product['price']; ?></p>
            <form method="post">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <input type="number" name="quantity" min="1" value="1">
                <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
            </form>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="total-section">
        <p class="total-text">Total: <span id="total-amount">$0.00</span></p>
    </div>

    <div class="navigation">
        <a href="index.php" class="btn">Home</a>
        <?php if (!empty($_SESSION['cart'])): ?>
        <a href="bill.php" class="btn">Checkout</a>
        <?php else: ?>
        <button onclick="alert('Your cart is empty. Please add items before proceeding.')" class="btn">Checkout</button>
        <?php endif; ?>
    </div>
    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Art Gallery Shop. All rights reserved.</p>
        </div>
    </footer>

    <script>
    // Function to calculate total amount
    function calculateTotal() {
        let total = 0;
        <?php foreach ($_SESSION['cart'] as $item): ?>
        total += <?php echo $item['quantity'] * $item['price']; ?>;
        <?php endforeach; ?>
        document.getElementById('total-amount').textContent = '$' + total.toFixed(2);
    }

    // Event listener to update total amount when quantity changes for each product
    document.querySelectorAll('input[name="quantity"]').forEach(input => {
        input.addEventListener('change', () => {
            calculateTotal();
        });
    });
    calculateTotal();

    // In your JavaScript file or within <script> tags in your HTML file

document.addEventListener("DOMContentLoaded", function() {
    const products = document.querySelectorAll(".product");

    window.addEventListener("scroll", function() {
        products.forEach(function(product) {
            const productTop = product.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;

            // Check if the product is within the viewport
            if (productTop < windowHeight) {
                product.classList.add("product-scroll-animation"); // Apply scrolling animation class
            } else {
                product.classList.remove("product-scroll-animation"); // Remove scrolling animation class
            }
        });
    });
});

    </script>

</body>

</html>
