<?php

// Retrieve the selected scholars from the AJAX request
if (isset($_POST['selector'])) {
    $scholars = $_POST['selector'];

// Connect to the database
$connection = mysqli_connect("localhost", "root", "", "db_scholar");

// Update the database for each selected scholar
foreach ($scholars as $scholar_id) {
  // Modify the query according to your database structure and update logic
  $query = 
  "UPDATE scholar_info SET graduate = 'yes',  graduated_at = '2023' WHERE scholar_id = $scholar_id ;";

}

  mysqli_query($connection, $query);




}





?>
