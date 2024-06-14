<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Users</title>
    <link rel="stylesheet" href="css/manage_users_style.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Add this CSS to your existing manage_users_style.css file */


    </style>
    <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var searchQuery = $(this).val();
                if (searchQuery.length > 2) {
                    $.ajax({
                        type: 'POST',
                        url: 'search_users.php',
                        data: { search: searchQuery, suggestions: true },
                        success: function(response) {
                            var suggestions = JSON.parse(response);
                            var suggestionsList = '';
                            if (suggestions.length > 0) {
                                suggestions.forEach(function(suggestion) {
                                    suggestionsList += '<li>' + suggestion + '</li>';
                                });
                            }
                            $('#suggestions').html(suggestionsList).show();
                        }
                    });
                } else {
                    $('#suggestions').hide();
                }
            });

            $(document).on('click', '.suggestions li', function() {
                var text = $(this).text();
                $('#searchInput').val(text);
                $('#suggestions').hide();
                $('#searchForm').submit();
            });

            $('#searchForm').on('submit', function(e) {
                e.preventDefault();
                var searchQuery = $('#searchInput').val();
                $.ajax({
                    type: 'POST',
                    url: 'search_users.php',
                    data: { search: searchQuery },
                    success: function(response) {
                        $('#userTable tbody').html(response);
                    }
                });
            });

            $(document).click(function(e) {
                if (!$(e.target).closest('.search-container').length) {
                    $('#suggestions').hide();
                }
            });
        });
    </script>
</head>

<body>
<?php include 'navbar.php'; ?>
    <div class="users-container">
        <h2>Manage Users</h2>
        <form id="searchForm" class="search-container">
            <input type="text" id="searchInput" name="search" placeholder="Search users">
            <button type="submit"><i class="fas fa-search"></i></button>
            <ul id="suggestions" class="suggestions" style="display: none;"></ul>
        </form>
        <a href="add_user.php">Add User</a>
        <table id="userTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['contact']}</td>
                                <td>
                                    <a href='edit_user.php?id={$row['id']}'>Edit</a> | 
                                    <a href='delete_user.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <footer class="footer">
        <p>&copy; 2024 Art Gallery Shop. All rights reserved.</p>
    </footer>
</body>

</html>
