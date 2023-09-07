  <?php  
    // if (!isset($_SESSION['TYPE'])=='Administrator'){
    //    redirect(web_root."index.php");
    //   }

    @$courseid = $_GET['id'];
      if($courseid==''){
    redirect("index.php");
  }
    $course = New Course();
    $singlecourse = $course->single_course($courseid);

  ?> 

  <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

                <div class="row">
          <div class="col-lg-12">
              <h3 >Edit Course</h3>
            </div>
        </div>
                  
                            <input class="form-control input-sm" id="courseid" name="courseid" placeholder=
                              "Account Id" type="Hidden" value="<?php echo $singlecourse->COURSEID; ?>">
                        
                  
                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Course:</label> 
                          <input name="deptid" type="hidden" value="">
                          <input class="form-control input-sm" id="COURSE" name="COURSE"  type="text" value="<?php echo $singlecourse->COURSE; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Description:</label> 
                          <input name="deptid" type="hidden" value="">
                          <input class="form-control input-sm" id="DESCRIPTION" name="DESCRIPTION"  type="text" value="<?php echo $singlecourse->DESCRIPTION; ?>">
                        </div>
                      </div>
                    </div>

                  
              
              <div class="row">
                      <div class="col-md-11"> 
                          <button class="btn btn-primary btn-round" name="save" type="submit" >Save</button>
                          </div>
                      </div> 
          </form>