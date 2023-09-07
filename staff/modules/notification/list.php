    <?php
    if (!isset($_SESSION['USERID'])) {
        redirect(web_root . "admin/index.php");
    }

    $id = $_SESSION['USERID'];

    $user = new User();
    $res = $user->single_user($id);
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <style>
        .hidden {
            display: none;
        }
        .dark-label {
        color: #333; 
    }

    </style>

<div class="w-100">

<div class="card-body pt-0">
<h3>Unread Notifications</h3>
<?php
    $mydb->setQuery("SELECT * FROM `notification` WHERE notification_for = 'Administrator' AND notification_status = 'unread' ORDER BY notification_date DESC");
    $notifications = $mydb->loadResultList();

    if (count($notifications) > 0) {
?>
<div class="row">
<div class="col-sm-5">
<div class="form-group">
    <label class="bmd-label-floating">Body</label>
</div>
</div> 

<div class="col-sm-1">
<div class="form-group">
    <label class="bmd-label-floating">Notification type</label>
</div>
</div>   

<div class="col-sm-2">
<div class="form-group">
    <label class="bmd-label-floating">Creator</label>
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
  <!-- <input name="notification_id" type="hidden" value="<?php echo $result->catch_id ?>"> -->
<?php
    foreach ($notifications as $notification) {
        $type = $notification->notification_type;
        $id = $notification->catch_id;
        $person = $notification->notif_creator;

        $student = new Student();
        $scholarid = $student->single_students($id);
        $scholar_id = $scholarid ? $scholarid->scholar_id : null;


        if ($type == "comment" ) {
            $comment = new Comment();
            $res = $comment->single_comments($id);
            $commentid = $res ? $res->announcement_id : null;


            $announcement_id = null;
            $announcement = new Announcement();
            $a = $announcement->single_announcement($commentid);
            $announcement_id = $a ? $a->id_announcement : null;
    
            $sql = "UPDATE `notification` set `notification_status`='read'   WHERE `notification_id` = $id";
            $mydb->setQuery($sql);
            $link = web_root . "admin/modules/announcement/index.php?view=view&id=" . $announcement_id;
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
            $sql = "UPDATE `notification` set `notification_status`='read'   WHERE `notification_id` = $id";
            $mydb->setQuery($sql);
            
            $link = web_root . "admin/modules/announcement/index.php?view=view&id=" . $announcement_id;
        } elseif ($type == "request") {    
            $link = web_root . "admin/modules/modstudent/index.php?view=view&id=" . $person;
        }  elseif ($type == "Documents") {    
            $sql = "UPDATE `notification` set `notification_status`='read'   WHERE `notification_id` = $id";
            $mydb->setQuery($sql);  
            $link = web_root . "admin/modules/modstudent/index.php?view=view&id=" . $person;
        }else {
            $link = web_root . "admin/index.php";
        }

echo '
    <div class="bg-light rounded p-2">
        <div class="row">
            <div class="col-sm-5">
                <div class="form-group">
                    <label class="bmd-label-floating dark-label">' . $notification->notification_message . '</label>
                </div>
            </div> 
            <div class="col-sm-1">
                <div class="form-group">
                    <label class="bmd-label-floating dark-label">' . $notification->notification_type . '</label>
                </div>
            </div>   
            <div class="col-sm-2">
                <div class="form-group">
                    <label class="bmd-label-floating dark-label">' . $notification->notif_creator . '</label>
                </div>
            </div>   
            <div class="col-sm-2">
                <div class="form-group">
                    <label class="bmd-label-floating dark-label">' . $notification->notification_date . '</label>
                </div>
            </div> 
            <div class="col-sm-2">
                <div class="form-group"> 
                <a href="' . $link . '" class="userinfo btn btn-info" name="save" type="submit" value="' . $notification->notification_id . '"
                onclick="updateNotificationStatus(' . $notification->notification_id . ')">
                <span class="fa fa-save fw-fa"></span> View Info
             </a>                                                              
                </div>
            </div>
        </div> 
    </div>';
}
}
else {
echo '<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label class="bmd-label-floating">No unread notifications found.</label>
</div>
</div>
</div>';
}
?>


</div>
</div>
<!-- </form> -->
<!-- <form action="controller.php?action=info" method="POST"> -->
<h3>Notifications</h3>
<!-- <form  method="POST"> -->
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
                            $mydb->setQuery("SELECT * FROM `notification` where notification_for = 'Administrator' and notification_status =  'read' ORDER BY notification_date DESC");
                            $cur = $mydb->loadResultList();

                            foreach ($cur as $notification) {
                            $type = $notification->notification_type;
                            $id = $notification->catch_id;
                            $people = $notification->notif_creator;

                            $student = new Student();
                            $scholarid = $student->single_students($id);
                            $scholar_id = $scholarid ? $scholarid->scholar_id : null;


                            if ($type == "comment" ) {
                                $comment = new Comment();
                                $res = $comment->single_comments($id);
                                $commentid = $res ? $res->announcement_id : null;

                                $announcement_id = null;
                                $announcement = new Announcement();
                                $a = $announcement->single_announcement($commentid);
                                $announcement_id = $a ? $a->id_announcement : null;

                                

                                $link = web_root . "admin/modules/announcement/index.php?view=view&id=" . $announcement_id;
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

                            
                                $link = web_root . "admin/modules/announcement/index.php?view=view&id=" . $announcement_id;
                            } elseif ($type == "request") {    
                            
                                $link = web_root . "admin/modules/modstudent/index.php?view=view&id=" . $people;
                            }  
                            elseif ($type == "request") {    
                                
                                $link = web_root . "admin/modules/modstudent/index.php?view=view&id=" . $people;
                            }else {
                                $link = web_root . "admin/index.php";
                            }

                            echo '<tr>';
                            echo '<td width="5%" align="center"></td>';
                            echo '<td class="tds">' . $notification->notification_message .'' .'<span class="hidden">' . $notification->notification_type . '</span>'.'</td>';
                            echo '<td class="tds">' . $notification->notification_status . '</td>';
                            echo '<td>' . $notification->notif_creator . '</td>';
                            echo '<td>' . $notification->notification_date . '</td>';

                            // <button data-id='.$result->notification_id.' value=' . $result->notification_id.'  class="userinfo btn btn-success" name = "info" id = "info">Info</button>

                            echo '<td align="center">
                            <div class="form-group"> 
                            <a href="' . $link . '" class="userinfo btn btn-info" name="save" type="submit" value="' . $notification->notification_id . '"
                            onclick="updateNotificationStatuss(' . $notification->notification_id . ')">
                            <span class="fa fa-save fw-fa"></span> View Info
                            </a>                                                              
                            </div>
                                </td>';
                            echo '</tr>';
                            }

                            ?>
                            </tbody>
                            </table>
                            </div>
                            <!-- </form> -->

<script>
function updateNotificationStatus(id) {
// Code to be executed when the button is clicked
alert("Button clicked! " + id);

var xhr = new XMLHttpRequest();
xhr.open("GET", "update_notification.php?id=" + id, true);
xhr.onreadystatechange = function() {
if (xhr.readyState === 4 && xhr.status === 200) {
// Handle the response from the PHP script
//   alert(xhr.responseText);
// Additional logic or actions can be performed here
}
};
xhr.send();
}
</script>

