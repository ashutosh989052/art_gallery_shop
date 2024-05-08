<?php
// Include your database connection file
include 'db_connection.php';

// Check if the order ID is provided
if (isset($_POST['order_id'])) {
    $orderId = $_POST['order_id'];

    // Prepare and execute SQL query to delete the order from the database
    $sql = "DELETE FROM orders WHERE id = $orderId";
    if (mysqli_query($connection, $sql)) {
        // Order deleted successfully
        echo "Order deleted successfully.";
    } else {
        // Failed to delete order
        echo "Failed to delete order: " . mysqli_error($connection);
    }
} else {
    // Order ID not provided
    echo "Order ID not provided.";
}

// Close database connection
mysqli_close($connection);
?>