<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Select Post Office</title>
</head>
<body>
  <label for="pincode">Enter PIN Code:</label>
  <input type="text" id="pincode" name="pincode" oninput="fetchPostOffices()">
  
  <div>
    <label for="district">District:</label>
    <input type="text" id="district" name="district" value="<?php echo isset($district) ? $district : ''; ?>" disabled>
  </div>
  
  <div>
    <label for="postOffice">Select Post Office:</label>
    <select id="postOffice" name="postOffice">
      <?php
      if(isset($postOffices)){
        foreach ($postOffices as $postOffice) {
          echo '<option value="'.$postOffice['Name'].'">'.$postOffice['Name'].'</option>';
        }
      }
      ?>
    </select>
  </div>
  
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
,,,,,,,,,,,,,,,,,