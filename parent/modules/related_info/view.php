  <?php  
    @$IDNO = $_GET['id'];
    @$syid = $_GET['sy'];
      if($IDNO==''){
        redirect("index.php");
      }
    $student = New Student();
    $singlestudent = $student->single_students($IDNO); 
    ?>
  <?php      
    $course = New Course();
    $singlecourse = $course->single_course($singlestudent->COURSE); 
    ?>
    
  <div class="row">
          <div class="col-lg-12">
              <h3 >Student Profile</h3>
            </div>
        </div>
  
          <div class="col-sm-3">
                <div class="panel panel-default">            
              <div class="panel-body">
                <img title="profile image" width="100%" height="40%" src="<?php echo web_root.'admin/modules/modstudent/'.$singlestudent->PROIMAGE ?>">   
              </div>
            <ul class="list-group">
        
          
              <li class="list-group-item text-muted">Photo</li> 
              <li class="list-group-item text-right">
              <span class="pull-left"><strong>Real name</strong></span> 
              <strong><?php echo $singlestudent->FNAME .'  '.$singlestudent->LNAME; ?></strong>
              </li>
              
            </ul> 
                
              
            </div>
            
          </div> 
          <div class="col-sm-9">
          <?php
          check_message();
              
          ?>

            <h2> <?php echo $singlestudent->FNAME .' '.$singlestudent->MNAME.' '.$singlestudent->LNAME; ?>  </h2>
    
        
              
              <ul class="list-group bottomline">  
                <li class="list-unstyled text-left">
                  <div class="row">
                      <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group ">
                        <strong>Id Number </strong>
                        <?php echo ': '.$singlestudent->IDNO; ?>
                        </div> 
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group ">
                        <strong>Course </strong>
                        <?php echo ': '.$singlecourse->DESCRIPTION.'('.$singlecourse->COURSE.')'; ?>
                        </div> 
                      </div> 
                </div>
                  </li> 

                    <li class="list-unstyled text-left">
                      <div class="row">
                      <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group ">
                        <strong>First Name </strong> 
                      <?php echo ': '.$singlestudent->FNAME; ?>   
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group">
                          <strong>Last Name </strong>
                      <?php echo ': '.$singlestudent->LNAME; ?> 
                        </div>
                      </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group">
                          <strong>Middle Name </strong>
                      <?php echo ': '.$singlestudent->MNAME; ?> 
                        </div>
                      </div>
                    </div>
                    </li>

                    <li class="list-unstyled text-left">
                    <div class="form-group ">
                    <strong>Address </strong>
                    <?php echo ': '.$singlestudent->ADDRESS; ?> 
                    </div>
                  </li> 
                    
                    <li class="list-unstyled text-left"> 
                    <div class="row"> 
                    <div class="col-xs-12 col-sm-6 col-md-6">
                      <div class="form-group ">
                        <strong>Contact Number</strong>
                          <?php echo ': '.$singlestudent->PHONE; ?>
                      </div>
                      </div>
                    </div>  
                    </li>
                  </ul> 