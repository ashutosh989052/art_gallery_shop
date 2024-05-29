<?php
session_start();
require_once('db_connection.php');

// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

//API
function getCityName($pincode) {
    $url = 'https://api.postalpincode.in/pincode/' . $pincode;
    $data = file_get_contents($url);
    $result = json_decode($data, true);

    if ($result && $result[0]['Status'] === 'Success') {
        $postOffice = $result[0]['PostOffice'][0]['Name'];
        $district = $result[0]['PostOffice'][0]['District']; 
        return array('area' => $postOffice, 'district' => $district);
    } else {
        return 'City/Area not found';
    }
}

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

function calculateSubtotal($cart) {
    $subtotal = 0;
    foreach ($cart as $item) {
        $subtotal += $item['quantity'] * $item['price'];
    }
    return $subtotal;
}

$subtotal = calculateSubtotal($cart);
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "User";
$email = isset($_SESSION['email']) ? $_SESSION['email'] : "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $error = "Name should contain only letters and spaces.";
    }

    $mobile = $_POST['mobile'];
    if (!preg_match("/^(?!.*(\d)\1{9})((?!1234567890|0987654321)\d{10})$/", $mobile)) {
        $error = "Please enter a valid mobile number.";
    }

    if (isset($error)) {
        echo "<p>Error: $error</p>";
    } else {
        $pincode = $_POST['pincode'];
        $cityAndDistrict = getCityName($pincode);
        $area = $cityAndDistrict['area'];
        $district = $cityAndDistrict['district'];
        $address = $_POST['address'];

        // Add the selected post office to the order details
        $selectedPostOffice = $_POST['area']; // Assuming your select element's name is 'area'

        $orderDetails = [];
        foreach ($cart as $item) {
            $orderDetails[] = [
                'item_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total' => $item['quantity'] * $item['price']
            ];
        }

        $orderDetailsJson = json_encode($orderDetails);
        $totalAmount = $subtotal;

        $sql = "INSERT INTO orders (name, email, mobile, address, area, district, pincode, order_details, total_amount) 
        VALUES ('$name', '$email', '$mobile', '$address', '$selectedPostOffice', '$district', '$pincode', '$orderDetailsJson', '$totalAmount')";

        if ($connection->query($sql) === TRUE) {
            // Sending email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'shivnanda.kalaskar1@gmail.com';
                $mail->Password   = 'jjfd pjrv spje dick'; 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                $mail->setFrom('shivnanda.kalaskar1@gmail.com', 'Art Gallery Shop');
                $mail->addAddress($email, $name);

                $mail->isHTML(true);
                $mail->Subject = 'Order Confirmation';
                
                // Construct email body with order details and styling
                $mail->Body = "
                <html>
                <head>
                    <style>
                        body {
                            color: #333;
                            font-family: Arial, sans-serif;
                            background-color: #f2f2f2; /* Light textured background */
                            margin: 0;
                            padding: 0;
                            overflow-x: hidden; /* Prevent horizontal scrolling */
                        }
                        .container {
                            max-width: 1200px;
                            margin: 50px auto;
                            padding: 20px;
                            border-radius: 10px;
                            background-color: #fff;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        }
                        .project-name {
                            text-align: center;
                            font-size: 28px;
                            color: #333;
                            margin: 0;
                        }
                        /* Table styles */
                        table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-bottom: 20px;
                            border-radius: 10px;
                            overflow: hidden; /* Ensure rounded corners are displayed properly */
                        }
                        th, td {
                            padding: 10px;
                            border-bottom: 1px solid #ddd;
                            text-align: left;
                        }
                        th {
                            background-color: #f2f2f2;
                        }
                        tr:hover {
                            background-color: #f5f5f5;
                        }
                        /* Total row styles */
                        .total-row {
                            background-color: #f2f2f2;
                        }
                        .total-row td {
                            border-top: 2px solid #000;
                        }
                        .footer {
                            text-align: center;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <h1 class='project-name'>Art Gallery Shop</h1>
                        <h2>Order Confirmation</h2>
                        <p>Dear <strong>$name</strong>,</p>
                        <p>Thank you for your order!</p>
                        <p>Here are your order details:</p>
                        <table>
                            <tr>
                                <th>Item Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>";
            foreach ($orderDetails as $item) {
                $mail->Body .= "<tr>
                                    <td>{$item['item_name']}</td>
                                    <td>{$item['quantity']}</td>
                                    <td>{$item['price']}</td>
                                    <td>{$item['total']}</td>
                                </tr>";
            }
            $mail->Body .= "<tr class='total-row'>
                                <td colspan='3'><strong>Total Amount</strong></td>
                                <td class='total-amount'><strong>$totalAmount</strong></td>
                            </tr>
                        </table>
                        <div class='delivery-address'>
                            <p><b>Delivery Address:</b></p>
                            <p><b>Name:</b> $name</p>
                            <p><b>Email:</b> $email</p>
                            <p><b>Mobile:</b> $mobile</p>
                            <p><b>Address:</b> $address</p>
                            <p><b>Area:</b> $selectedPostOffice $pincode</p>
                            <p><b>District:</b> $district</p>
                        </div>
                    </div>
                    <div class='footer'>
                        <p>Thank you for shopping with us.</p>
                        </div>
                </body>
                </html>";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            header("Location: confirmation.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    }
}
?>
<!-- Rest of your HTML code remains unchanged -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Gallery Shop - Bill</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style2/bill_style.css">
    <script>
    function getCityName() {
        var pincode = document.getElementById("pincode").value;
        var citySelect = document.getElementById("area");
        var districtInput = document.getElementById("district");

        citySelect.innerHTML = '<option value="">Select City/Area</option>';
        districtInput.value = '';

        fetch('https://api.postalpincode.in/pincode/' + pincode)
            .then(response => response.json())
            .then(data => {
                if (data[0]['Status'] === 'Success') {
                    var postOffices = data[0]['PostOffice'];
                    postOffices.forEach(function(postOffice) {
                        var cityName = postOffice['Name'];
                        var option = document.createElement('option');
                        option.value = cityName;
                        option.textContent = cityName;
                        citySelect.appendChild(option);
                    });

                    districtInput.value = data[0]['PostOffice'][0]['District'];
                } else {
                    var option = document.createElement('option');
                    option.value = 'City/Area not found';
                    option.textContent = 'City/Area not found';
                    citySelect.appendChild(option);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                var option = document.createElement('option');
                option.value = 'City/Area not found';
                option.textContent = 'City/Area not found';
                citySelect.appendChild(option);
            });
    }
    </script>
</head>

<body>
    <div class="container">
        <div class="welcome-section">
            <p class="welcome-message">Hello, <span id="username"><?php echo $username; ?></span>! <i
                    class="fas fa-smile"></i></p>
            <a href="logout.php" class="logout-btn">Logout &nbsp;<i class="fas fa-sign-out-alt"></i></a>
        </div>
        <div class="container">
            <h1 class="project-name"><i class="fas fa-palette"></i> Art Gallery Shop</h1>

            <div class="bill-section">
                <h2><i class="fas fa-receipt"></i> Order Summary</h2>
                <table id="order-summary">
                    <tr>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                    <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>₹<?php echo $item['price']; ?></td>
                        <td>₹<?php echo $item['quantity'] * $item['price']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr class='total-row'>
                        <td colspan='3'>Total Amount</td>
                        <td>₹<?php echo $subtotal; ?></td>
                    </tr>
                </table>

            <!--    <div class="total">
                    <p>Total Amount: <span id="total-amount">₹<?php echo number_format($subtotal, 2); ?></span></p>
                </div> -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="bill-form">
                    <h2><i class="fas fa-file-invoice-dollar"></i> Billing Information</h2>
                    <div class="input-group">
                        <label for="name"><i class="fas fa-user"></i> Full Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="input-group">
                        <label for="email"><i class="fas fa-envelope"></i> Email Address</label>
                        <input type="email" id="email" name="email" value="<?php echo $email; ?>" readonly required>
                    </div>
                    <div class="input-group">
                        <label for="mobile"><i class="fas fa-mobile-alt"></i> Mobile Number</label>
                        <input type="text" id="mobile" name="mobile" onchange="getCityName()" required
                            pattern="^(?!.*(\d)\1{9})((?!1234567890|0987654321)\d{10})$">
                    </div>
                    <div class="input-group">
                        <label for="address"><i class="fas fa-map-marker-alt"></i> Delivery Address</label>
                        <textarea id="address" name="address" required></textarea>
                    </div>
                    <div class="input-group">
                        <label for="pincode"><i class="fas fa-thumbtack"></i> Area Pin Code</label>
                        <input type="text" id="pincode" name="pincode" onchange="getCityName()" required>
                    </div>
                    <div class="input-group">
                        <label for="district"><i class="fas fa-city"></i> District</label>
                        <input type="text" id="district" name="district" readonly>
                    </div>
                    <div class="input-group">
                        <label for="area"><i class="fas fa-building"></i> City/Area</label>
                        <div class="custom-select">
                            <select id="area" name="area" required>
                                <option value="">Select City/Area</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn">
    Confirm Order <i class="fas fa-check"></i>
</button>

                    <a href="cart.php" class="btn"><i class="fas fa-shopping-cart"></i> Cart</a>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Art Gallery Shop. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>