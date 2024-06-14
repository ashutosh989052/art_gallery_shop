<?php
include 'includes/config.php';

$searchQuery = "";
if (isset($_POST['search'])) {
    $searchQuery = $_POST['search'];
}

$suggestions = [];
if (isset($_POST['suggestions'])) {
    $sql = "SELECT name FROM products WHERE name LIKE '%$searchQuery%' LIMIT 5";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $suggestions[] = $row['name'];
        }
    }
    echo json_encode($suggestions);
} else {
    $sql = "SELECT * FROM products WHERE name LIKE '%$searchQuery%'";
    $result = $conn->query($sql);
    $products = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    foreach ($products as $product) {
        echo "<tr>
                <td>{$product['id']}</td>
                <td>{$product['name']}</td>
                <td>{$product['price']}</td>
                <td><img src='{$product['image']}' alt='{$product['name']}' /></td>
                <td>{$product['description']}</td>
                <td>
                    <a href='edit_product.php?id={$product['id']}'>Edit</a> | 
                    <a href='delete_product.php?id={$product['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
              </tr>";
    }
}
?>
