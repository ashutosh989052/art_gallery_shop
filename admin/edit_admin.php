<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($password)) {
        $sql = "UPDATE admin_users SET name='$name', email='$email', password='$password' WHERE id=$id";
    } else {
        $sql = "UPDATE admin_users SET name='$name', email='$email' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Admin user updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM admin_users WHERE id=$id";
$result = $conn->query($sql);
$admin = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Admin User</title>
    <link rel="stylesheet" href="css/edit_admin_style.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</head>

<body>
<?php include 'navbar.php'; ?>
    <div class="admins-container">
        <h2>Edit Admin User</h2>
        <form action="edit_admin.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label for="name"><i class="fas fa-user"></i> Name</label>
                <input type="text" name="name" value="<?php echo $admin['name']; ?>" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="name"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" name="email" value="<?php echo $admin['email']; ?>" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="name"><i class="fas fa-lock"></i> Password</label>
                <input type="password" name="password" placeholder="New Password (leave blank to keep current)">
            </div>
            <button type="submit"><i class="fas fa-save"></i> Update Admin User</button>
        </form>
    </div>
    <footer class="footer">
        <p>&copy; 2024 Art Gallery Shop. All rights reserved.</p>
    </footer>
</body>

</html>