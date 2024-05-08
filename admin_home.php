<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style/admin_style.css">
</head>

<body>
    <div class="container">
        <h1><i class="fas fa-home"></i> Admin Home</h1>
        <table id="orders-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Area</th>
                    <th>Pincode</th>
                    <th>Total Amt</th>
                    <th>Order Details</th>
                    <th>Order Time</th>
                    <th>PDF</th>
                    <th>Action</th> <!-- New column for operations -->
                </tr>
            </thead>
            <tbody id="orders-body">
                <!-- Table body will be populated dynamically -->
            </tbody>
        </table>
    </div>

    <!-- Edit Order Form (hidden by default) -->
    <div id="edit-order-form" style="display: none;">
        <h2><i class="fas fa-edit"></i> Edit Order</h2>
        <form id="edit-order-form">
            <!-- Add form fields here for editing order details -->
            <button type="submit"><i class="fas fa-save"></i> Update Order</button>
        </form>
    </div>

    <script>
    // Function to fetch data and populate the table
    function fetchData() {
        // Use AJAX to fetch new data
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request successful, update the table with new data
                    document.getElementById("orders-body").innerHTML = xhr.responseText;
                } else {
                    // Request failed, handle error
                    console.error('Failed to fetch data');
                }
            }
        };
        xhr.open("GET", "fetch_orders.php", true);
        xhr.send();
    }

    // Function to handle delete order button click
    function deleteOrder(orderId) {
        if (confirm("Are you sure you want to delete this order?")) {
            // AJAX request to delete order from database
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Order deleted successfully, remove corresponding row from table
                        document.getElementById("order-row-" + orderId).remove();
                    } else {
                        // Failed to delete order, display error message
                        console.error("Failed to delete order");
                    }
                }
            };
            xhr.open("POST", "delete_order.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("order_id=" + orderId);
        }
    }

    // Function to handle edit order button click
    function editOrder(orderId) {
        // Show edit order form with pre-filled data
        document.getElementById('edit-order-form').style.display = 'block';
        // Populate form fields with order details for editing
        // Submit form to update order
    }

    // Call fetchData function initially
    fetchData();

    // Set interval to call fetchData every 5 seconds
    setInterval(fetchData, 5000);
    </script>
</body>

</html>