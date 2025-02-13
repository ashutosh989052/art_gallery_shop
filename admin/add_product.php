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
    $description = $_POST['description'];
    
    // File upload handling
    $target_dir = "../images/";  // Folder where images will be stored
    $image_name = basename($_FILES["image"]["name"]); // Get only file name
    $target_file = $target_dir . $image_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $file_size = $_FILES["image"]["size"];
    
    // Allowed file types
    $allowed_types = ["jpg", "jpeg", "png", "gif"];
    $max_file_size = 2 * 1024 * 1024; // 2MB in bytes
    
    // Validate file type and size
    if (in_array($imageFileType, $allowed_types)) {
        if ($file_size <= $max_file_size) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // Save only the image file name in the database
                $sql = "INSERT INTO products (name, price, image, description) VALUES ('$name', '$price', '$image_name', '$description')";
                
                if ($conn->query($sql) === TRUE) {
                    echo "New product added successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "File size must be 2 MB or smaller.";
        }
    } else {
        echo "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
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
        <form action="add_product.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name"><i class="fas fa-file-signature"></i> Product Name</label>
        <input type="text" id="name" name="name" placeholder="Product Name" required>
    </div>
    <div class="form-group">
        <label for="price"><i class="fas fa-money-bill-wave"></i> Price</label>
        <input type="text" id="price" name="price" placeholder="Price" required>
    </div>
    <div class="form-group">
        <label for="image"><i class="fas fa-image"></i> Upload Image</label>
        <input type="file" id="image" name="image" accept="image/*" required>
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