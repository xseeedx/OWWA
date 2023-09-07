  <head>
    <link rel="stylesheet" href="">
  </head>
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
  <?php  
      @$IDNO = $_GET['id'];
      @$syid = $_GET['sy'];
        if($IDNO==''){
          redirect("index.php");
        }
      $student = New Student();
      $singlestudent = $student->single_students($IDNO); 
      ?>
      <!-- <?php      
      $course = New Course();
      $singlecourse = $course->single_course($singlestudent->COURSE); 
      ?> -->
      
    <div class="row">
            <div class="col-lg-12">
                <h3 >Announcement</h3>
                <div class="comment-box">
                <textarea style="border:inset 4px#00bfff;" placeholder="Announcements Here"></textarea>
      </div>

      <div class="comment-box1">
          
          <div class="reply-form">
              <form>
                  <textarea placeholder="Write a comment..."></textarea>
                  <button type="submit">Reply</button>
              </form>
          </div>
      </div>

            </div>
            
    </div>
