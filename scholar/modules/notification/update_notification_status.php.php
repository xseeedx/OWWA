<?php
require_once ("../../../include/initialize.php");
// Get the notification ID from the AJAX request
$notificationId = $_POST['notificationId'];

$mydb->setQuery("SELECT * FROM `notification` WHERE `notification_id` = $notificationId");
$cur = $mydb->loadResultList();

foreach ($cur as $result) {
    $notif_type = $result->notification_type;
    $notif = $result->catch_id;

    $sql = "UPDATE `notification` SET `notification_status`='read' WHERE `notification_id` = $notificationId";
    $mydb->setQuery($sql);
}

echo 'Update successful';
?>