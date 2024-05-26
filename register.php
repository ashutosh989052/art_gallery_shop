<?php
session_start();
include 'db_connection.php';

// Function to generate JSON response
function jsonResponse($message) {
    header('Content-Type: application/json');
    echo json_encode(array('message' => $message));
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $name = mysqli_real_escape_string($connection, $_POST["user"]);
    $contact = mysqli_real_escape_string($connection, $_POST["contact"]);
    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $password = mysqli_real_escape_string($connection, $_POST["pass"]);
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Regular expression pattern for mobile number validation
    $contactPattern = '/^(0|91)?[6-9][0-9]{9}$/';

    if (!preg_match($contactPattern, $contact)) {
        jsonResponse("Error: Please enter a valid mobile number.");
    }

    // Verify the reCAPTCHA response
    $secretKey = '6Lf7-ecpAAAAAL2m67Fh7KG0sFtRHZgBACVjjIKb';
    $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
    $responseData = json_decode($verifyResponse);

    if (!$responseData->success) {
        jsonResponse("reCAPTCHA verification failed. Please try again.");
    }

    // Check if contact number already exists
    $checkContactQuery = "SELECT * FROM users WHERE contact='$contact'";
    $result = mysqli_query($connection, $checkContactQuery);
    if (mysqli_num_rows($result) > 0) {
        jsonResponse("Error: This phone number is already registered.");
    }

    // Check if email already exists
    $checkEmailQuery = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connection, $checkEmailQuery);
    if (mysqli_num_rows($result) > 0) {
        jsonResponse("Error: This email address is already registered.");
    }

    // Validate password
    $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>]).{6,10}$/';
    $passwordValid = preg_match($passwordPattern, $password);

    if ($passwordValid) {
        $query = "INSERT INTO users (name, contact, email, password) VALUES ('$name', '$contact', '$email', '$password')";
        if (mysqli_query($connection, $query)) {
            jsonResponse("Registration successful. You can now login.");
        } else {
            jsonResponse("Registration failed. Please try again.");
        }
    } else {
        jsonResponse("Invalid password. Password must be 6-10 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - Art Gallery Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style2/register_style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="container">
        <h1 class="project-name"><i class="fas fa-palette"></i> Art Gallery Shop</h1>
        <div class="form-container">
            <h2 class="form-title"><i class="fas fa-user-plus"></i> Create an Account</h2>
            <form action="#" method="POST" class="registration-form">
                <div class="form-group">
                    <input type="text" name="user" id="user" class="form-input" placeholder="Full Name" required>
                    <span id="name-error" class="error"></span>
                </div>

                <div class="form-group">
                    <input type="text" name="contact" id="contact" class="form-input" placeholder="Phone Number"
                        required>
                    <span id="contact-error" class="error"></span>
                </div>

                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-input" placeholder="Email Address" required>
                    <span id="email-error" class="error"></span>
                </div>

                <div class="form-group">
                    <input type="password" name="pass" id="pass" class="form-input" placeholder="Password" required>
                    <span id="pass-error" class="error"></span>
                </div>

                <div class="g-recaptcha" data-sitekey="6Lf7-ecpAAAAAPbd8obDKCO_dBM_qugV6kGOgVz4"></div> <!-- reCAPTCHA widget -->

                <button type="submit" class="btn-register"><i class="fas fa-user-plus"></i> Register</button>
                <div class="loader" id="loader"></div>
            </form>
        </div>

        <div class="navigation">
            <a href="index.php" class="btn"><i class="fas fa-home"></i> Home</a>
            <a href="login.php" class="btn"><i class="fas fa-sign-in-alt"></i> Login</a>
        </div>

        <div class="message" id="message"></div>
    </div>
    <footer class="footer">
        <p>&copy; <?php echo date('Y'); ?> Art Gallery Shop. All rights reserved.</p>
    </footer>

    <script>
    async function validateForm() {
        const name = document.getElementById("user").value;
        const contact = document.getElementById("contact").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("pass").value;
        const namePattern = /^[a-zA-Z\s]+$/; // Only letters and spaces
        const contactPattern = /^(?!.*(\d)\1{9})((?!1234567890|0987654321)\d{10})$/; // Indian mobile number pattern
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Email pattern
        const passwordPattern =
            /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>]).{6,10}$/; // Password pattern

        let errorMessage = '';

        if (!namePattern.test(name)) {
            errorMessage += "Full name can only contain letters and spaces.\n";
        }

        if (!contactPattern.test(contact)) {
            errorMessage += "Please enter a valid mobile number.\n";
        }

        if (!emailPattern.test(email)) {
            errorMessage += "Please enter a valid email address.\n";
        }

        if (!passwordPattern.test(password)) {
            errorMessage +=
                "Password must be 6-10 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.\n";
        }

        if (errorMessage) {
            document.getElementById("message").innerText = errorMessage;
            return false;
        } else {
            return true;
        }
    }

    async function submitForm(event) {
        event.preventDefault(); // Prevent default form submission

        const isValid = await validateForm(); // Validate the form
        if (isValid) {
            document.getElementById("loader").style.display = "block"; // Show loader
            const form = event.target;
            const formData = new FormData(form);

            try {
                const response = await fetch(form.action, {
                    method: form.method,
                    body: formData
                });

                if (response.ok) {
                    const data = await response.json();
                    document.getElementById("message").innerText = data.message;
                } else {
                    document.getElementById("message").innerText = "Registration failed. Please try again.";
                }
            } catch (error) {
                console.error('Error submitting form:', error);
                document.getElementById("message").innerText = "An error occurred. Please try again.";
            } finally {
                document.getElementById("loader").style.display = "none"; // Hide loader
            }
        }
    }

    document.querySelector('.registration-form').addEventListener('submit', submitForm);
    </script>

</body>

</html>
