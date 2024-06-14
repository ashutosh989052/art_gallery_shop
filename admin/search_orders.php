<?php
include 'includes/config.php';

if (isset($_POST['search'])) {
    $search = $conn->real_escape_string($_POST['search']);
    $sql = "SELECT * FROM orders WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR mobile LIKE '%$search%'";
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
}
?>
