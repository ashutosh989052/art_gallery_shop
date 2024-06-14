<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // No encryption for simplicity
    $contact = $_POST['contact'];

    $sql = "INSERT INTO users (name, email, password, contact) VALUES ('$name', '$email', '$password', '$contact')";
    if ($conn->query($sql) === TRUE) {
        echo "New user added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <link rel="stylesheet" href="css/add_user_style.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<?php include 'navbar.php'; ?>
    <div class="users-container">
        <h2> Add User</h2>
        <form action="add_user.php" method="post">
            <div class="form-group">
                <label for="name"><i class="fas fa-user"></i> Name</label>
                <input type="text" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="contact"><i class="fas fa-phone"></i> Contact</label>
                <input type="text" id="contact" name="contact" placeholder="Contact" required>
            </div>
            <button type="submit"><i class="fas fa-plus-circle"></i> Add User</button>
        </form>
    </div>
    <footer class="footer">
        <p>&copy; 2024 Art Gallery Shop. All rights reserved.</p>
    </footer>
</body>

</html>