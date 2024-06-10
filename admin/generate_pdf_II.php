<?php
require_once('../tcpdf/tcpdf.php');

// Include database connection
require_once('../db_connection.php');

// Check if order_id is passed
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    
    // Create new PDF document
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    
    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Order Summary');
    $pdf->SetSubject('Order Summary');
    $pdf->SetKeywords('Order, Summary');
    
    // Add a page
    $pdf->AddPage();
    // Set font
    $pdf->SetFont('helvetica', '', 12);

    $centerX = $pdf->GetPageWidth() / 2;
    
    // Fetch the order details from the database based on order_id
    $sql = "SELECT * FROM orders WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if the order exists
    if ($result->num_rows > 0) {
        // Fetch the order details
        $row = $result->fetch_assoc();
        
        // Decode order details from JSON
        $orderDetails = json_decode($row['order_details'], true);
    
        $pdf->SetFont('helvetica', 'B', 14); // Larger font size for headings
        $pdf->Cell(0, 8, 'Customer Details', 0, 1, 'C');
        $pdf->SetLineWidth(0.2);
        $pdf->Cell(0, 0, '', 'T');
        $pdf->Ln(3); // Smaller line spacing
        
        // Draw a box for customer details with curved corners
        $pdf->SetFillColor(230, 230, 230); // Light gray
        $pdf->RoundedRect(10, $pdf->GetY(), 190, 40, 5, '1111', 'DF', 'F');
    
        // Reset fill color
        $pdf->SetFillColor(255, 255, 255); // White
    
        // Customer details
        $pdf->SetFont('helvetica', '', 10);
        $pdf->SetXY(15, $pdf->GetY() + 2); // Adjust position for text
        $pdf->Cell(0, 6, 'Name: ' . $row['name'], 0, 1, 'L');
        $pdf->SetX(15);
        $pdf->Cell(0, 6, 'Email: ' . $row['email'], 0, 1, 'L');
        $pdf->SetX(15);
        $pdf->Cell(0, 6, 'Mobile: ' . $row['mobile'], 0, 1, 'L');
        $pdf->SetX(15);
        $pdf->Cell(0, 6, 'Address: ' . $row['address'] . ', ' . $row['pincode'], 0, 1, 'L');
        $pdf->SetX(15);
        $pdf->Cell(0, 6, 'Area: ' . $row['area'], 0, 1, 'L');
        $pdf->SetX(15);
        $pdf->Cell(0, 6, 'District: ' . $row['district'], 0, 1, 'L');
        $pdf->Ln(10); // Smaller line spacing
    
        $pdf->SetFont('helvetica', 'B', 14); // Larger font size for headings
        $pdf->Cell(0, 8, 'Order Details', 0, 1, 'C');
    
        // Add a border to the table
        $pdf->SetLineWidth(0.2);
        $pdf->Cell(0, 0, '', 'T');
    
        // Calculate the center position of the table
        $tableCenterX = $centerX - (50 + 30 + 40 + 40) / 2;
    
        // Display order details with styled table
        $pdf->Ln(5); // Add some space
        $pdf->SetFillColor(230, 230, 230); // Light gray background
        $pdf->SetFont('helvetica', 'B', 10);
    
        // Start table
        $pdf->SetX($tableCenterX); // Set X position to center
        $pdf->Cell(50, 8, 'Item Name', 1, 0, 'C', 1); // Bold text, centered, with background
        $pdf->Cell(30, 8, 'Quantity', 1, 0, 'C', 1);
        $pdf->Cell(40, 8, 'Price', 1, 0, 'C', 1);
        $pdf->Cell(40, 8, 'Total', 1, 1, 'C', 1);
        $pdf->SetFont('helvetica', '', 10); // Normal font size
        $pdf->SetFillColor(255, 255, 255); // White background for table content
    
        // Output order details in table
        foreach ($orderDetails as $item) {
            $pdf->SetX($tableCenterX); // Set X position to center
            $pdf->Cell(50, 8, $item['item_name'], 1, 0, 'C');
            $pdf->Cell(30, 8, $item['quantity'], 1, 0, 'C');
            $pdf->Cell(40, 8, '₹' . number_format($item['price'], 2), 1, 0, 'C');
            $pdf->Cell(40, 8, '₹' . number_format($item['total'], 2), 1, 1, 'C');
        }
        $pdf->Ln(5); // Add some space
    
        // Calculate total amount
        $totalAmount = 0;
        foreach ($orderDetails as $item) {
            $totalAmount += $item['total'];
        }
    
        // Calculate the center position for the total amount section
        $totalAmountX = $centerX - (120 + 40) / 2;
    
        // Add total amount row
        $pdf->SetFont('helvetica', 'B', 10);
        $pdf->SetX($totalAmountX); // Center align the cell
        $pdf->Cell(120, 8, 'Total Amount', 1, 0, 'C', 1);
        $pdf->Cell(40, 8, '₹' . number_format($totalAmount, 2), 1, 1, 'C');
        $pdf->Ln(5); // Add some space
    } else {
        $pdf->Cell(0, 8, 'Order not found.', 0, 1);
    }
    
    // Set page border
    $pdf->SetLineWidth(0.5);
    $pdf->Rect(5, 5, $pdf->GetPageWidth() - 10, $pdf->GetPageHeight() - 10); // Add border to the entire page
    
    // Add 'Thank You' text at the bottom center
    $pdf->SetY(-40); // Set position at 10mm from the bottom of the page
    $pdf->SetFont('helvetica', '', 9); // Smaller font size for footer
    $pdf->Cell(0, 6, 'Thank You', 0, 1, 'C');
    $pdf->SetFont('helvetica', 'B', 9);
    $pdf->Cell(0, 6, 'Art Gallery Shop', 0, 1, 'C');
    
    // Output the PDF as a file (or inline)
    $pdf->Output('order_summary.pdf', 'D');
} else {
    echo "Invalid request. No order ID provided.";
}
?>