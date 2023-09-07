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
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    textarea {
      flex-grow: 1;
      height: 40px;
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 8px;
      resize: none;
    }

    .btn-submit {
      background-color: blue;
      color: white;
      border: none;
      border-radius: 4px;
      padding: 8px 16px;
      cursor: pointer;
      margin-left: 5px;
    }

    .comment-box1 {
      border: 1px solid #ccc;
      padding: 10px;
      margin-bottom: 10px;
    }

    .reply-form {
      margin-top: 10px;
      padding-left: 20px;
    }

    .reply-form textarea {
      width: 100%;
      height: 80px;
      resize: vertical;
    }

    .reply-form button {
      margin-top: 10px;
      padding: 5px 10px;
      background-color: #4267b2;
      color: #ffffff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
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
            $reply = $_SESSION['USERID'];
            $person = $_SESSION['NAME'];
            if ($result->who_commented == $reply) {
      

          echo '<div class="comment-box1">';
          echo '<h5><span class="commenter">' . $person . '</span> <label>' . $result->comment_created_at . '</label></h5>';
          echo '<h4>' . $result->comment_text . '</h4>';

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
            if ($rep->commentid == $result->comment_id) {
              $reply = $rep->who_reply; 
              $replies = $person;
              
              echo '<div class="container">';
              echo '<h5><span class="commenter">' . $replies . '</span> <label>' . $rep->reply_created_at . '</label></h5>';
              echo '<label>Reply: ' . $rep->reply_text . '</label>';
              echo '</div>';
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
    }
      ?>
    </div>
  </form>
</body>
</html>
