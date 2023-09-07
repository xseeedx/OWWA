  <?php  
    @$IDNO = $_GET['id'];
  @$syid = $_GET['sy'];
    if($IDNO=='' ){
    redirect("index.php");
  }
    $student = New Student();
    $singlestudent = $student->single_students($IDNO);
  

    ?>

  
  <style type="text/css">
  .sidebar-left .main{
    float:right;
  }
  .idebar-left .sidebar{
    float:left;
  }

  .sidebar-right .main{
    float:left;
  }
  .idebar-right .sidebar{
    float:right;
  }
  
  </style>
  
          
        <form class="form-horizontal span6" action="controller.php?action=edit" method="POST"  />
    
          
            <div class="row">
          <div class="col-lg-12">
              <h3>Edit Scholar Information</h3>
            </div>
        </div>
                  
                          <input  id="IDNO" name="IDNO"  type="hidden" value="<?php echo $singlestudent->IDNO; ?>"> 
                
                  <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">First Name:</label> 
                          <input class="form-control input-sm" id="FNAME" name="FNAME"   type="text" value="<?php echo $singlestudent->FNAME; ?>" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Middle Name:</label> 
                          <input class="form-control input-sm" id="MNAME" name="MNAME" type="text" value="<?php echo $singlestudent->MNAME; ?>" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Last Name:</label> 
                          <input class="form-control input-sm" id="LNAME" name="LNAME"   type="text" value="<?php echo $singlestudent->LNAME; ?>" required>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Course:</label> 
                              <select class="form-control input-sm" name="COURSE" id="COURSE"> 
                                    <?php  
                                      $mydb->setQuery("SELECT * 
                                              FROM  `tblcourse` WHERE COURSEID='".$singlestudent->COURSE."'");
                                      $cur = $mydb->loadResultList();

                                        foreach ($cur as $result) { ?>

                                <option value="<?php echo $result->COURSEID; ?>"><?php echo $result->DESCRIPTION; ?></option>
                                    <?php }  


                                      $mydb->setQuery("SELECT * 
                                        FROM  `tblcourse` WHERE COURSEID<>'".$singlestudent->COURSE."'");
                                        $cur = $mydb->loadResultList();

                                          foreach ($cur as $result) { ?>

                                <option value="<?php echo $result->COURSEID; ?>"><?php echo $result->DESCRIPTION; ?></option>
                                          <?php } ?>

                                </select>
          
                        </div>
                      </div>
                    </div>

                          <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Department:</label> 
                              <select class="form-control input-sm" name="DEPARTMENT" id="DEPARTMENT"> 
                                    <?php  
                                      $mydb->setQuery("SELECT * 
                                              FROM  `tbldepartment` WHERE DEPARTMENTID='".$singlestudent->DEPARTMENT."'");
                                      $cur = $mydb->loadResultList();

                                        foreach ($cur as $result) { ?>

                                <option value="<?php echo $result->DEPARTMENTID; ?>"><?php echo $result->DESCRIPTION; ?></option>
                                    <?php }  


                                      $mydb->setQuery("SELECT * 
                                        FROM  `tbldepartment` WHERE DEPARTMENTID<>'".$singlestudent->DEPARTMENT."'");
                                        $cur = $mydb->loadResultList();

                                          foreach ($cur as $result) { ?>

                                <option value="<?php echo $result->DEPARTMENTID; ?>"><?php echo $result->DESCRIPTION; ?></option>
                                          <?php } ?>

                                </select>
          
                        </div>
                      </div>
                    </div>


                  <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Address:</label> 
                          <input class="form-control input-sm" id="ADDRESS" name="ADDRESS"  type="text" value="<?php echo $singlestudent->ADDRESS; ?>" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Contact No.:</label> 
                          <input class="form-control input-sm" id="PHONE" name="PHONE"  maxlength="11" type="text" value="<?php echo $singlestudent->PHONE; ?>" required>
                        </div>
                      </div>
                    </div>
  
                  <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Satus:</label> 
                          <input class="form-control input-sm" id="ADDRESS" name="ADDRESS"  type="text" value="<?php echo $singlestudent->ADDRESS; ?>" required>
                        </div>
                      </div>
                    </div>
  
                      <div class="row">
                      <div class="col-md-9"> 
                          <button class="btn btn-info btn-round" name="save" type="submit" >Save</button>  
                        </div>
                      </div> 
  
  <!--/.fluid-container-->
  
  </form>