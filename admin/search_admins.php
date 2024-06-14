<?php
include 'includes/config.php';

$searchQuery = "";
if (isset($_POST['search'])) {
    $searchQuery = $_POST['search'];
}

$suggestions = [];
if (isset($_POST['suggestions'])) {
    $sql = "SELECT name FROM admin_users WHERE name LIKE '%$searchQuery%' LIMIT 5";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $suggestions[] = $row['name'];
        }
    }
    echo json_encode($suggestions);
} else {
    $sql = "SELECT * FROM admin_users WHERE name LIKE '%$searchQuery%'";
    $result = $conn->query($sql);
    $admins = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $admins[] = $row;
        }
    }
    foreach ($admins as $admin) {
        echo "<tr>
                <td>{$admin['id']}</td>
                <td>{$admin['name']}</td>
                <td>{$admin['email']}</td>
                <td>
                    <a href='edit_admin.php?id={$admin['id']}'>Edit</a> | 
                    <a href='delete_admin.php?id={$admin['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
              </tr>";
    }
}
?>
