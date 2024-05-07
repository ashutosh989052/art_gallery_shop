<?php
// Include your database connection file
include 'db_connection.php';

// Check if the order ID is provided
if (isset($_POST['order_id'])) {
    $orderId = $_POST['order_id'];

    // Retrieve order details from the database based on the provided order ID
    // Implement your code to fetch the order details and populate the edit form

    // For example:
    $sql = "SELECT * FROM orders WHERE id = $orderId";
    $result = mysqli_query($connection, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        // Order found, fetch details and return as JSON response
        $orderDetails = mysqli_fetch_assoc($result);
        echo json_encode($orderDetails);
    } else {
        // Order not found
        echo "Order not found.";
    }
} else {
    // Order ID not provided
    echo "Order ID not provided.";
}

// Close database connection
mysqli_close($connection);
?>
