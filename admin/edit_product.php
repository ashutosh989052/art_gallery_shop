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
    $price = $_POST['price'];
    $image = $_POST['image'];
    $description = $_POST['description'];

    $sql = "UPDATE products SET name='$name', price='$price', image='$image', description='$description' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM products WHERE id=$id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="css/edit_product_style.css">
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

    <div class="products-container">
        <h2>Edit Product</h2>
        <form action="edit_product.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label for="name"><i class="fas fa-tag"></i> Product Name</label>
                <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>"
                    placeholder="Product Name" required>
            </div>
            <div class="form-group">
                <label for="price"><i class="fas fa-dollar-sign"></i> Price</label>
                <input type="text" id="price" name="price" value="<?php echo $product['price']; ?>" placeholder="Price"
                    required>
            </div>
            <div class="form-group">
                <label for="image"><i class="fas fa-image"></i> Image URL</label>
                <input type="text" id="image" name="image" value="<?php echo $product['image']; ?>"
                    placeholder="Image URL" required>
            </div>
            <div class="form-group">
                <label for="description"><i class="fas fa-align-left"></i> Description</label>
                <textarea id="description" name="description" placeholder="Description"
                    required><?php echo $product['description']; ?></textarea>
            </div>
            <button type="submit"><i class="fas fa-save"></i> Update Product</button>
        </form>
    </div>
    <footer class="footer">
        <p>&copy; 2024 Art Gallery Shop. All rights reserved.</p>
    </footer>
</body>

</html>