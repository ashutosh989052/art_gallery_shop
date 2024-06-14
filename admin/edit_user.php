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
    $contact = $_POST['contact'];

    if (!empty($password)) {
        $sql = "UPDATE users SET name='$name', email='$email', password='$password', contact='$contact' WHERE id=$id";
    } else {
        $sql = "UPDATE users SET name='$name', email='$email', contact='$contact' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="css/edit_user_style.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</head>

<body>
<?php include 'navbar.php'; ?>

    <div class="users-container">
        <h2>Edit User</h2>
        <form action="edit_user.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label for="name"><i class="fas fa-user"></i> Name</label>
                <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" placeholder="Name"
                    required>
            </div>
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" placeholder="Email"
                    required>
            </div>
            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> New Password (leave blank to keep current)</label>
                <input type="password" id="password" name="password" placeholder="New Password">
            </div>
            <div class="form-group">
                <label for="contact"><i class="fas fa-phone"></i> Contact</label>
                <input type="text" id="contact" name="contact" value="<?php echo $user['contact']; ?>"
                    placeholder="Contact" required>
            </div>
            <button type="submit"><i class="fas fa-save"></i> Update User</button>
        </form>
    </div>
    <footer class="footer">
        <p>&copy; 2024 Art Gallery Shop. All rights reserved.</p>
    </footer>
</body>

</html>