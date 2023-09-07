<?php
require_once ("../../../include/initialize.php");
// Retrieve the notificationId from the AJAX request
$userid = $_POST['userid'];

$mydb->setQuery("SELECT * FROM `notification` WHERE `notification_id` = $userid");
$cur = $mydb->loadResultList();


foreach ($cur as $result) {
    $notif_type = $result->notification_type;
    $notif = $result->catch_id;
    echo '<tr>';
    echo '<td width="5%" align="center"></td>';
    echo '<td class="tds">' . $result->notification_type . '</td>';
    echo '<td class="tds">' . $result->catch_id . '</td>';
    echo '</tr>';

    if ($notif_type == 'announcement') {
        
        $mydb->setQuery("SELECT * FROM `announcement` WHERE `id_announcement` = $notif");
        $announcement = $mydb->loadResultList();
        
        $sql = "UPDATE `notification` set `notification_status`='read'   WHERE `notification_id` = $result->notification_id";
        $mydb->setQuery($sql);
        // $mydb->executeQuery();

        foreach ($announcement as $announcements) {
            echo '<tr>';
            echo '<td width="5%" align="center"></td>';
            echo '<td class="tds">' . $announcements->announcement_desc . '</td>';
            echo '<td class="tds">' . $announcements->date_posted . '</td>';
            echo '</tr>';
        }
    } elseif ($notif_type == 'comment') {
        $mydb->setQuery("SELECT * FROM `comments` WHERE `comment_id` = $notif");
        $comment = $mydb->loadResultList();
        
        $sql = "UPDATE `notification` set `notification_status`='read'   WHERE `notification_id` = $result->notification_id";
        $mydb->setQuery($sql);
        // $mydb->executeQuery();
        foreach ($comment as $comments) {
            echo '<tr>';
            echo '<td width="5%" align="center"></td>';
            echo '<td class="tds">' . $comments->comment_content . '</td>';
            echo '<td class="tds">' . $comments->comment_date . '</td>';
            echo '</tr>';
        }
    }

    elseif ($notif_type == 'reply') {
        $mydb->setQuery("SELECT * FROM `replies` WHERE `reply_id` = $notif");
        $reply = $mydb->loadResultList();
        
        $sql = "UPDATE `notification` set `notification_status`='read'   WHERE `notification_id` = $result->notification_id";
        $mydb->setQuery($sql);
        // $mydb->executeQuery();

        foreach ($reply as $replies) {
            echo '<tr>';
            echo '<td width="5%" align="center"></td>';
            echo '<td class="tds">' . $replies->reply_text . '</td>';
            echo '<td class="tds">' . $replies-> reply_created_at. '</td>';
            echo '</tr>';
        }
    }
    else{
    
        echo '<label>Hello</label>';
    }
}

?>
