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
          </div>
          
  </div>
