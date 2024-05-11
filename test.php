<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "post_office_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$district = ''; // Initialize $district variable
$postOffices = []; // Initialize $postOffices array

if(isset($_POST['submit'])){
    $pincode = $_POST['pincode'];

    // Fetch district and post offices from the API based on the provided PIN code
    $url = "https://api.postalpincode.in/pincode/$pincode";
    $response = file_get_contents($url);
    if($response !== false) {
      $data = json_decode($response, true);
      if(is_array($data) && !empty($data) && $data[0]['Status'] === 'Success'){
        $district = $data[0]['PostOffice'][0]['District']; // Update $district with the fetched district
        $postOffices = $data[0]['PostOffice']; // Update $postOffices with the fetched post offices
      } else {
        echo "Error: Unable to fetch post offices. Please try again later.";
      }
    } else {
      echo "Error: Unable to fetch data from the API. Please try again later.";
    }

    $selectedPostOffice = $_POST['postOffice'];

    // Insert the selected post office into the database
    $sql = "INSERT INTO selected_post_offices (pincode, district, selected_post_office) VALUES ('$pincode', '$district', '$selectedPostOffice')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Select Post Office</title>
</head>
<body>
  <form method="post">
    <label for="pincode">Enter PIN Code:</label>
    <input type="text" id="pincode" name="pincode" oninput="fetchPostOffices()">
    
    <div>
      <label for="district">District:</label>
      <input type="text" id="district" name="district" value="<?php echo $district; ?>" disabled>
    </div>
    
    <div>
      <label for="postOffice">Select Post Office:</label>
      <select id="postOffice" name="postOffice">
        <?php
        foreach ($postOffices as $postOffice) {
          echo '<option value="'.$postOffice['Name'].'">'.$postOffice['Name'].'</option>';
        }
        ?>
      </select>
    </div>
    
    <button type="submit" name="submit">Submit</button>
  </form>
  
  <script>
    function fetchPostOffices() {
      const pincode = document.getElementById('pincode').value;
      fetch(`https://api.postalpincode.in/pincode/${pincode}`)
        .then(response => response.json())
        .then(data => {
          const district = data[0].PostOffice[0].District;
          document.getElementById('district').value = district;
          
          const postOffices = data[0].PostOffice;
          const select = document.getElementById('postOffice');
          select.innerHTML = '';
          postOffices.forEach(postOffice => {
            const option = document.createElement('option');
            option.value = postOffice.Name;
            option.textContent = postOffice.Name;
            select.appendChild(option);
          });
        })
        .catch(error => console.error('Error fetching post offices:', error));
    }
  </script>
</body>
</html>
