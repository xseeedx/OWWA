<?php
// require_once('path/to/database.php'); // Update the path to the database.php file
require_once ("../../../include/initialize.php");
// require_once('path/to/database.php'); // Update the path to the database.php filerequire_once ("../../../include/initialize.php");

// Retrieve the email value from the AJAX request
$email = $_POST['email'];

// Function to find students by email
function find_students($id = "", $email = "") {
    global $mydb;

    $query = "SELECT * FROM scholar_info WHERE scholar_id = ? OR email = ?";
    $params = array($id, $email);
    $result = $mydb->executeQuery($query, $params);

    $row_count = $mydb->num_rows($result);
    return $row_count;
}
if (empty($email)) {
    $response = "username is required.";
} else {
    // Validate the email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = "Invalid username format.";
    } else {
// Call the find_students() function to check if the user exists
$userCount = find_students("",$email);

// Check if the user exists

if ($userCount > 0) {
    $response = "username already exists.";
} else {
    $response = "username is available.";
}
}
}
// Return the response message
echo $response;
?>
