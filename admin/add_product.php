<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $description = $_POST['description'];

    $sql = "INSERT INTO products (name, price, image, description) VALUES ('$name', '$price', '$image', '$description')";
    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link rel="stylesheet" href="css/add_product_style.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<?php include 'navbar.php'; ?>
    <div class="products-container">
        <h2>Add Product</h2>
        <form action="add_product.php" method="post">
            <div class="form-group">
                <label for="name"><i class="fas fa-file-signature"></i> Product Name</label>
                <input type="text" id="name" name="name" placeholder="Product Name" required>
            </div>
            <div class="form-group">
                <label for="price"><i class="fas fa-money-bill-wave"></i> Price</label>
                <input type="text" id="price" name="price" placeholder="Price" required>
            </div>
            <div class="form-group">
                <label for="image"><i class="fas fa-image"></i> Image URL</label>
                <input type="text" id="image" name="image" placeholder="Image URL" required>
            </div>
            <div class="form-group">
                <label for="description"><i class="fas fa-align-left"></i> Description</label>
                <textarea id="description" name="description" placeholder="Description" required></textarea>
            </div>
            <button type="submit"><i class="fas fa-plus-circle"></i> Add Product</button>
        </form>
    </div>
    <footer class="footer">
        <p>&copy; 2024 Art Gallery Shop. All rights reserved.</p>
    </footer>
</body>

</html>