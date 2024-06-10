<?php
include 'db_connection.php';

if (isset($_GET['query'])) {
    $search = $_GET['query'];
    $products = [];

    $sql = "SELECT name FROM products WHERE name LIKE '%$search%' LIMIT 5";
    $result = mysqli_query($connection, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row['name'];
        }
        echo json_encode($products);
    } else {
        echo json_encode(["No products found"]);
    }
}
?>