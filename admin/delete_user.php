<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "User deleted successfully";
    header("Location: manage_users.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
