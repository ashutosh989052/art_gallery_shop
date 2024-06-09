<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Products</title>
    <link rel="stylesheet" href="css/manage_products_style.css">
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
    <h2>Manage Products</h2>
    <button id="add-product-btn" class="button"><i class="fas fa-plus"></i> Add Product</button>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['price']}</td>
                                <td><img src='{$row['image']}' alt='{$row['name']}' /></td>
                                <td>{$row['description']}</td>
                                <td>
                                    <a href='#' class='edit-product-btn' 
                                    data-id='{$row['id']}'
                                    data-name='{$row['name']}'
                                    data-price='{$row['price']}'
                                    data-image='{$row['image']}'
                                    data-description='{$row['description']}'>Edit</a> | 
                                    <a href='delete_product.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                                </td>
                              </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No products found</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<footer class="footer">
    <p>&copy; 2024 Art Gallery Shop. All rights reserved.</p>
</footer>

<!-- Add Product Modal -->
<div id="add-product-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Add Product</h3>
        <form id="add-product-form" action="add_product.php" method="post">
            <div class="form-group">
                <label for="add-name"><i class="fas fa-tag"></i> Product Name</label>
                <input type="text" id="add-name" name="name" placeholder="Product Name" required>
            </div>
            <div class="form-group">
                <label for="add-price"><i class="fas fa-dollar-sign"></i> Price</label>
                <input type="text" id="add-price" name="price" placeholder="Price" required>
            </div>
            <div class="form-group">
                <label for="add-image"><i class="fas fa-image"></i> Image URL</label>
                <input type="text" id="add-image" name="image" placeholder="Image URL" required>
            </div>
            <div class="form-group">
                <label for="add-description"><i class="fas fa-align-left"></i> Description</label>
                <textarea id="add-description" name="description" placeholder="Description" required></textarea>
            </div>
            <button type="submit"><i class="fas fa-plus"></i> Add Product</button>
        </form>
    </div>
</div>

<!-- Edit Product Modal -->
<div id="edit-product-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Edit Product</h3>
        <form id="edit-product-form" action="edit_product.php" method="post">
            <input type="hidden" id="edit-id" name="id">
            <div class="form-group">
                <label for="edit-name"><i class="fas fa-tag"></i> Product Name</label>
                <input type="text" id="edit-name" name="name" placeholder="Product Name" required>
            </div>
            <div class="form-group">
                <label for="edit-price"><i class="fas fa-dollar-sign"></i> Price</label>
                <input type="text" id="edit-price" name="price" placeholder="Price" required>
            </div>
            <div class="form-group">
                <label for="edit-image"><i class="fas fa-image"></i> Image URL</label>
                <input type="text" id="edit-image" name="image" placeholder="Image URL" required>
            </div>
            <div class="form-group">
                <label for="edit-description"><i class="fas fa-align-left"></i> Description</label>
                <textarea id="edit-description" name="description" placeholder="Description" required></textarea>
            </div>
            <button type="submit"><i class="fas fa-save"></i> Update Product</button>
        </form>
    </div>
</div>

<!-- JavaScript for Modals -->
<script>
    // Get the modal elements
    var addProductModal = document.getElementById("add-product-modal");
    var editProductModal = document.getElementById("edit-product-modal");

    // Get the close buttons for the modals
    var closeBtns = document.querySelectorAll(".close");

    // Get the add product button
    var addProductBtn = document.getElementById("add-product-btn");

    // Attach click event listener to add product button
    addProductBtn.addEventListener("click", function() {
        // Open the add product modal
        addProductModal.style.display = "block";
    });

    // Attach click event listeners to edit product buttons
    var editProductBtns = document.querySelectorAll(".edit-product-btn");
    editProductBtns.forEach(function(btn) {
        btn.addEventListener("click", function() {
            // Populate the edit product form with product details
            var id = this.getAttribute('data-id');
            var name = this.getAttribute('data-name');
            var price = this.getAttribute('data-price');
            var image = this.getAttribute('data-image');
            var description = this.getAttribute('data-description');

            document.getElementById('edit-id').value = id;
            document.getElementById('edit-name').value = name;
            document.getElementById('edit-price').value = price;
            document.getElementById('edit-image').value = image;
            document.getElementById('edit-description').value = description;

            // Open the edit product modal
            editProductModal.style.display = "block";
        });
    });

    // Attach click event listeners to close buttons
    closeBtns.forEach(function(btn) {
        btn.addEventListener("click", function() {
            // Close the corresponding modal
            if (this.parentElement.parentElement.id === "add-product-modal") {
                addProductModal.style.display = "none";
            } else if (this.parentElement.parentElement.id === "edit-product-modal") {
                editProductModal.style.display = "none";
            }
        });
    });

    // Close the modal when user clicks outside the modal
    window.addEventListener("click", function(event) {
        if (event.target === addProductModal) {
            addProductModal.style.display = "none";
        } else if (event.target === editProductModal) {
            editProductModal.style.display = "none";
        }
    });
</script>

</body>
</html>
