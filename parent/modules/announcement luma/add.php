                        <?php 
  //                     if(!isset($_SESSION['USERID'])){
  //   redirect(web_root."admin/index.php");
  // }
                        @$id = $_GET['id'];
                        if($id==''){
                          redirect("index.php"); 
                      }
                        $announcement = New Announcement();
                        $res = $announcement->single_announcement($id);

                        $comment = New Comment();
                        $com = $comment->single_comments($id);

                        $reply = New Reply();
                        $rep = $reply->single_replies($id);
                        ?> 


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
  <form class="form-horizontal span6" action="controller.php?action=add" method="POST">
                  <div class="row">
        <div class="col-lg-12">
              <h3 class="">Write a comment</h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>   
            <div class='card-body'>
                <?php echo $res->announcement_desc; ?>
          </div>
          
                    <div class="row">
                      <div class="col-md-11">
                      <div class="form-group">
                      <input name="id_announcement" type="hidden" value="<?php echo $res->id_announcement; ?>">
                          <label class="bmd-label-floating">Write a comment...:</label> 
                              <textarea  class="form-control " id="comment_text" name="comment_text"></textarea>
                            </div>
                        </div>
                    </div>     
    
      
              <div class="row">
                      <div class="col-md-11"> 
                        <button class="btn btn-info btn-round" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button>  
                        </div>
                      </div>  
                      &nbsp;   
        </form>
        <form class="form-horizontal span6" action="controller.php?action=reply" method="POST">
          <?php   
      
      // $mydb->setQuery("SELECT * 
          // 			FROM  `tblusers` WHERE TYPE != 'Customer'");
      $mydb->setQuery("SELECT * 
                FROM  `comments` ORDER BY comment_id DESC");
      $cur = $mydb->loadResultList();

      foreach ($cur as $result) {
        
        if ($result->comment_status == 'hidden') {
          continue; // Skip this iteration of the loop
        }
        if ($result->announcement_id == $res->id_announcement){
          $reply = $_SESSION['USERID'];
          if ($result->who_commented == $reply){

          
        echo'<div class="comment-box1">';
          
        echo'<div class="reply-form">';
        echo '<input name= "comment_id" type="hidden" value="'.$result->comment_id.'">';
        
        echo'<h4> Comment : '. $result->comment_text.'</h4>';
        echo '<input name="id_announcement"  type="hidden" value="'.$res->id_announcement.'">';
        echo '<input name="id_comment"  type="hidden" value="'.$result->comment_id.'">';
      
        
        $idrep = $result->comment_id;

        $mydb->setQuery("SELECT * 
        FROM  `replies` Where commentid = $idrep  ORDER BY reply_id ASC ");
        $cur = $mydb->loadResultList();

        foreach ($cur as $rep) {

        if ($rep->reply_status == 'hidden') {
        continue; // Skip this iteration hidden') {
        continue; // Skip this iteration of the loop
        }
        if ($rep->commentid == $result->comment_id){


                echo '<div class="container">';
                echo '<label>Reply : ' .$rep->reply_text. '</label>';
                echo '</div>';

        }
      }

        echo ' <div class="form-group">';

        echo' <label class="bmd-label-floating">Write a comment...:</label>';
          echo '     <textarea  class="form-control " id="reply_text" name="reply_text"></textarea>';
              echo '</div>';
        echo '<button class="btn btn-info btn-round" name="reply" type="submit">Reply</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo "&nbsp;";
    }
      } 
    }?>
</form>
