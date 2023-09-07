<?php  
  @$id = $_GET['id'];
  if($id == '') {
    redirect("index.php");
  }

  $announcement = new Announcement();
  $res = $announcement->single_announcement($id);
?>

<!DOCTYPE html>
<html>
<head>
<style>
        .comment-box {
            background-color: #f5f5f5; /* Light gray background */
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .commenter {
            font-weight: bold;
            color: #007bff; /* Blue color for commenter's name */
        }

        .comment-text {
            color: #444; /* Dark gray color for comment text */
        }

        .comment-actions span {
            margin-right: 20px;
            cursor: pointer;
            color: #777; /* Light gray color for action buttons */
        }

        .comment-actions span:hover {
            color: #007bff; /* Blue color on hover for action buttons */
        }

        .comment-like:hover {
            color: #28a745; /* Green color for like button on hover */
        }

        .comment-reply:hover {
            color: #dc3545; /* Red color for reply button on hover */
        }
    </style>
</head>

<body>
  <h3>Announcement</h3>

  <form class="form-horizontal span6" action="controller.php?action=comment" method="POST">
    <div class='card-body'>
      <?php echo $res->announcement_desc; ?>
    </div>

    <div class='card-body'>
      <div class="row">
        <div class="col-md-11">
          <div class="form-group">
            <input name="id_announcement" type="hidden" value="<?php echo $res->id_announcement; ?>">
            <label class="bmd-label-floating">Write a comment...:</label> 
            <textarea class="form-control" id="comment_text" name="comment_text"></textarea>
          </div>
        </div>
      </div>     

      <div class="row">
        <div class="col-md-11">
          <div class="text-left">
            <button class="btn btn-info btn-round" name="save" type="submit">
              <span class="fa fa-save fw-fa"></span> Save
            </button>
          </div>
        </div>
      </div>
  </form>
      <hr> <!-- Add a horizontal rule to separate the comment section from the replies -->

      <?php   
        $mydb->setQuery("SELECT * FROM `comments` ORDER BY comment_id DESC");
        $cur = $mydb->loadResultList();

        foreach ($cur as $result) {
          if ($result->comment_status == 'hidden') {
            continue; // Skip this iteration of the loop
          }
          if ($result->announcement_id == $res->id_announcement) {
            // $reply = $_SESSION['USERID'];
            $person = $_SESSION['NAME'];
            // if ($result->who_commented == $reply) {
      

          echo '<div class="comment-box1">';
          echo '  <span class="commenter">' . $person . '</span>  &nbsp;<label>' . $result->comment_created_at . '</label>';
          echo ' <p class="comment-text">Commented: ' . $result->comment_text . '</p>';
        

          echo '<form class="form-horizontal span6" action="controller.php?action=reply" method="POST">';
          echo '<input name="comment_id" type="hidden" value="' . $result->comment_id . '">';
          echo '<input name="id_announcement" type="hidden" value="' . $res->id_announcement . '">';

          $idrep = $result->comment_id;
          $mydb->setQuery("SELECT * FROM `replies` WHERE commentid = $idrep ORDER BY reply_id ASC");
          $cur_replies = $mydb->loadResultList();
        

          foreach ($cur_replies as $rep) {
            if ($rep->reply_status == 'hidden') {
              continue; // Skip this iteration of the loop
            }
           
              $reply = $rep->who_reply; 
              $mydb->setQuery("SELECT * FROM `user_acc` WHERE USERID = $reply ");
              $cur_rep = $mydb->loadResultList();
              foreach ($cur_rep as $reps) {
    
              echo ' <div class="comment-box">';
              echo ' <div class="comment-content">';
              echo '  <span class="commenter">' . $reps->NAME . '</span>';
              echo ' <p class="comment-text">Reply: ' . $rep->reply_text . '</p>';
              echo ' </div>  </div>';
          }
        }
          echo '<div class="form-group">';
          echo '<label class="bmd-label-floating">Write a comment...:</label>';
          echo '<textarea class="form-control" id="reply_text" name="reply_text"></textarea>';
          echo '</div>';
          echo '<button class="btn btn-info btn-round" name="save" type="submit">Reply</button>';
          echo '</form>';
          echo '</div>';
        }
      }
    // }
      ?>
    </div>
  </form>
</body>
</html>
