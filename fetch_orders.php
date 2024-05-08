<?php
// Include your database connection file
include 'db_connection.php';

// Function to format the date and time
function formatDateTime($datetime) {
    return date('d/m/Y H:i', strtotime($datetime)); // Format: DD/MM/YYYY HH:MM
}

// Retrieve the latest orders from the database
$sql = "SELECT * FROM orders ORDER BY created_at DESC"; // Assuming your table is named 'orders'
$result = mysqli_query($connection, $sql);

// Check if there are any orders
if (mysqli_num_rows($result) > 0) {
    // Loop through each row and generate HTML for table rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['mobile']}</td>";
        echo "<td>{$row['address']}</td>";
        echo "<td>{$row['area']}</td>";
        echo "<td>{$row['pincode']}</td>";
        echo "<td>{$row['total_amount']}</td>";
        // Assuming order_details is stored as JSON in the database
        $orderDetails = json_decode($row['order_details'], true);
        $detailsString = '';
        foreach ($orderDetails as $detail) {
            $detailsString .= "{$detail['item_name']} (Qty: {$detail['quantity']}, Price: {$detail['price']})<br>";
        }
        echo "<td>{$detailsString}</td>";
        echo "<td>" . formatDateTime($row['created_at']) . "</td>";
        echo "<td><a href='generate_pdf.php?order_id={$row['id']}' class='btn-pdf'>PDF</a></td>";
        // Add buttons for deleting and editing orders
        echo "<td>";
        echo "<button onclick='deleteOrder({$row['id']})'class='delete-btn'>Delete</button>";
        echo "<button onclick='editOrder({$row['id']})'class='edit-btn'>Edit</button>";
        echo "</div>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    // No orders found
    echo "<tr><td colspan='10'>No orders found.</td></tr>";
}

// Close database connection
mysqli_close($connection);
?>