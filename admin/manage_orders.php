<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Orders</title>
    <link rel="stylesheet" href="css/manage_orders_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="js/scripts.js" defer></script>
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

    <div class="orders-container">
        <h2>Manage Orders</h2>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM orders";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['mobile']}</td>
                                <td><button class='order-details-btn' 
                                    data-order-id='{$row['id']}'
                                    data-name='{$row['name']}'
                                    data-email='{$row['email']}'
                                    data-mobile='{$row['mobile']}'
                                    data-address='{$row['address']}'
                                    data-area='{$row['area']}'
                                    data-district='{$row['district']}'
                                    data-pincode='{$row['pincode']}'
                                    data-order-details='{$row['order_details']}'
                                    data-total-amount='{$row['total_amount']}'
                                    data-created-at='{$row['created_at']}'
                                    >Show Details</button></td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No orders found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div id="order-details-modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h3>Order Details</h3>
                <div id="order-details"></div>
            </div>
        </div>
    </div>
<script>
    var buttons = document.querySelectorAll('.order-details-btn');
    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            var orderId = this.getAttribute('data-order-id');
            var name = this.getAttribute('data-name');
            var email = this.getAttribute('data-email');
            var mobile = this.getAttribute('data-mobile');
            var address = this.getAttribute('data-address');
            var area = this.getAttribute('data-area');
            var district = this.getAttribute('data-district');
            var pincode = this.getAttribute('data-pincode');
            var orderDetails = JSON.parse(this.getAttribute('data-order-details'));
            var totalAmount = this.getAttribute('data-total-amount');
            var createdAt = this.getAttribute('data-created-at');

            var table = "<table><tbody>";
            orderDetails.forEach(function(item) {
                table += "<tr><td>" + item.item_name + "</td><td>" + item.quantity + "</td><td>" + item.price + "</td><td>" + item.total + "</td></tr>";
            });
            table += "</tbody></table>";

            var detailsHTML = "<p><strong>Order ID:</strong> " + orderId + "</p>" +
                              "<p><strong>Name:</strong> " + name + "</p>" +
                              "<p><strong>Email:</strong> " + email + "</p>" +
                              "<p><strong>Mobile:</strong> " + mobile + "</p>" +
                              "<p><strong>Address:</strong> " + address + "</p>" +
                              "<p><strong>Area:</strong> " + area + "</p>" +
                              "<p><strong>District:</strong> " + district + "</p>" +
                              "<p><strong>Pincode:</strong> " + pincode + "</p>" +
                              "<p><strong>Total Amount:</strong> " + totalAmount + "</p>" +
                              "<p><strong>Created At:</strong> " + createdAt + "</p>" +
                              "<h4>Order Details</h4>" + table +
                              "<button class='download-btn' data-order-id='" + orderId + "'><i class='fas fa-download download-icon'></i>Download PDF</button>"; // Added download PDF button

            document.getElementById('order-details').innerHTML = detailsHTML;
            document.getElementById('order-details-modal').style.display = 'block';
            
            // Event listener for download PDF button (inside the modal)
            var downloadButton = document.querySelector('.download-pdf-btn');
            downloadButton.addEventListener('click', function() {
                var orderId = this.getAttribute('data-order-id');
                window.location.href = 'generate_pdf_II.php?order_id=' + orderId; // Redirect to PDF generation script
            });
        });
    });

    document.querySelector('.close').addEventListener('click', function() {
        document.getElementById('order-details-modal').style.display = 'none';
    });
</script>


    <footer class="footer">
        <p>&copy; 2024 Art Gallery Shop. All rights reserved.</p>
    </footer>
</body>
</html>

