<?php
// update_notification_status.php

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the notification ID from the POST data
    $notificationId = $_POST['notificationId'];

    // Perform necessary validation and sanitization on the input data

    // Update the notification status in the database
    $sql = "UPDATE `notification` SET `notification_status` = 'read' WHERE `notification_id` = ?";
    $stmt = $mydb->prepare($sql);
    $stmt->bind_param("i", $notificationId);
    
    if ($stmt->execute()) {
        // Update successful
        echo "Notification status updated successfully";
    } else {
        // Update failed
        echo "Failed to update notification status";
    }
} else {
    // Request method is not POST
    echo "Invalid request";
}
?>
