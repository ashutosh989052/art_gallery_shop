<?php
include 'includes/config.php';

$searchQuery = "";
if (isset($_POST['search'])) {
    $searchQuery = $_POST['search'];
}

$suggestions = [];
if (isset($_POST['suggestions'])) {
    $sql = "SELECT name FROM users WHERE name LIKE '%$searchQuery%' LIMIT 5";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $suggestions[] = $row['name'];
        }
    }
    echo json_encode($suggestions);
} else {
    $sql = "SELECT * FROM users WHERE name LIKE '%$searchQuery%'";
    $result = $conn->query($sql);
    $users = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }
    foreach ($users as $user) {
        echo "<tr>
                <td>{$user['id']}</td>
                <td>{$user['name']}</td>
                <td>{$user['email']}</td>
                <td>{$user['contact']}</td>
                <td>
                    <a href='edit_user.php?id={$user['id']}'>Edit</a> | 
                    <a href='delete_user.php?id={$user['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
              </tr>";
    }
}
?>
