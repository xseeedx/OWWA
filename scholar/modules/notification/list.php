<?php
if (!isset($_SESSION['USERID'])) {
    redirect(web_root . "admin/index.php");
}

$id = $_SESSION['USERID'];

$user = new User();
$res = $user->single_user($id);

// $student = new Student();
// $singlestudent = $student->single_students();
// $singlestudent = $student->user_id();
?>

<style>
    .hidden {
        display: none;
    }
    .dark-label {
        color: #333; /* Replace #333 with your desired darker color */
    }
</style>

<div class="w-100">
    <div class="card-body pt-0">
        <h3>Unread Notifications</h3>
        <div class="row">
            <div class="col-sm-1">
                <div class="form-group">
                </div>
            </div> 

            <div class="col-sm-6">
                <div class="form-group">
                    <label class="bmd-label-floating">Body</label>
                </div>
            </div> 

            <div class="col-sm-1">
                <div class="form-group">                   
                </div>
            </div> 

            <div class="col-sm-2">
                <div class="form-group">
                    <label class="bmd-label-floating">Created</label>
                </div>
            </div> 

            <div class="col-sm-2">
                <div class="form-group">
                    <label class="bmd-label-floating">Actions</label>
                </div>
            </div> 
        </div>

        <?php


            $mydb->setQuery("SELECT * FROM `scholar_info` WHERE user_id = $id  ");
      $student = $mydb->loadResultList();
      foreach ($student as $students) {
        $ids = $students->scholar_id;
 


      $mydb->setQuery("SELECT * FROM `notification` WHERE (notification_for = 'Scholar' OR notification_for = $ids) AND notification_status = 'unread'");
      $notifications = $mydb->loadResultList();
      

        foreach ($notifications as $notification) {
            $type = $notification->notification_type;
            $id = $notification->catch_id;

            $student = new Student();
            $scholarid = $student->single_students($id);
            $scholar_id = $scholarid ? $scholarid->scholar_id : null;

            if ($type == "comment") {
                $comment = new Comment();
                $res = $comment->single_comments($id);
                $commentid = $res ? $res->announcement_id : null;

                $announcement_id = null;
                $announcement = new Announcement();
                $a = $announcement->single_announcement($commentid);
                $announcement_id = $a ? $a->id_announcement : null;

                $sql = "UPDATE `notification` SET `notification_status`='read' WHERE `notification_id` = $id";
                $mydb->setQuery($sql);
                $link = web_root . "scholar/modules/announcement/index.php?view=add&id=" . $announcement_id;
            } elseif ($type == "reply") {    
                $reply = new Reply ();
                $res = $reply->single_replies($id);
                $id = $res ? $res->commentid : null;

                $comment = new Comment();
                $res = $comment->single_comments($id);
                $commentid = $res ? $res->announcement_id : null;

                $announcement_id = null;
                $announcement = new Announcement();
                $a = $announcement->single_announcement($commentid);
                $announcement_id = $a ? $a->id_announcement : null;

                $sql = "UPDATE `notification` SET `notification_status`='read' WHERE `notification_id` = $id";
                $mydb->setQuery($sql);
                
                $link = web_root . "scholar/modules/announcement/index.php?view=view&id=" . $announcement_id;
            } elseif ($type == "request") {    
                $sql = "UPDATE `notification` SET `notification_status`='read' WHERE `notification_id` = $id";
                $mydb->setQuery($sql);  
                $link = web_root . "scholar/modules/studentprofile/index.php?view=view&id=" . $scholar_id;
            } elseif ($type == "announcement") {
                $link = web_root . "scholar/modules/announcement/index.php";
            }

            echo '
                <div class="bg-light rounded p-2">
                    <div class="row">
                        <div class="col-sm-1">
                            <div class="form-group">
                            </div>
                        </div> 

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="bmd-label-floating dark-label">' . $notification->notification_message . '</label>
                            </div>
                        </div> 

                        <div class="col-sm-1">
                            <div class="form-group">
                            </div>
                        </div> 

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="bmd-label-floating dark-label">' . $notification->notification_date . '</label>
                            </div>
                        </div> 

                    <td align="center">
                        <div class="form-group"> 
                            <a href="' . $link . '" class="userinfo btn btn-info" name="save" type="submit" value="' . $notification->notification_id . '"
                                onclick="updateNotificationStatuss(' . $notification->notification_id . ')">
                                <span class="fa fa-save fw-fa"></span> View Info
                            </a>                                                              
                            </div>
                        </td> 
                </div>';
        }
             }
        ?>
    </div>
</div>

<form action="controller.php?action=info" method="POST">
    <h3>Notification List</h3>
    <div class="w-100">
        <table id="example" class="table table-striped" style="font-size: 12px" cellspacing="0">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th>Body</th>
                    <th>Status</th>
                    <th>Creator</th>
                    <th>Created</th>
                    <th width="10%">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $mydb->setQuery("SELECT * FROM `notification` WHERE notification_for = 'Scholar' AND notification_status = 'read'");
                $cur = $mydb->loadResultList();

                foreach ($cur as $result) {
                    echo '<tr>';
                    echo '<td width="5%" align="center"></td>';
                    echo '<td class="tds">' . $result->notification_message . '' . '<span class="hidden">' . $result->notification_type . '</span>' . '</td>';
                    echo '<td class="tds">' . $result->notification_status . '</td>';
                    echo '<td>' . $result->notif_creator . '</td>';
                    echo '<td>' . $result->notification_date . '</td>';
                   
                    echo '<td align="center">
                        <button class="btn btn-success btn-round" name="save" type="submit" value="' . $result->notification_id . '">
                            <span class="fa fa-save fw-fa"></span> View Info
                        </button>  
                    </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
<!-- Your HTML code -->

<script>
function updateNotificationStatus(notificationId) {
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Define the AJAX request
    xhr.open('POST', 'update_notification.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    // Define the data to be sent in the request
    var data = '$notification->notification_id =' + notificationId;

    // Define the callback function for when the request is complete
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Request successful, do something with the response
            var response = xhr.responseText;
            // Handle the response as needed
            // For example, you can update the UI or display a success message
            console.log(response);
        }
    };

    // Send the AJAX request with the data
    xhr.send(data);
}
</script>
