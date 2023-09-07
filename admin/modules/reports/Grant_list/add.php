                        <?php 
                      if(!isset($_SESSION['USERID'])){
    redirect(web_root."admin/index.php");
  }

                        // $autonum = New Autonumber();
                        // $res = $autonum->single_autonumber(2);

                        ?> 
  <form class="form-horizontal span6" action="controller.php?action=add" method="POST">

            <div class="row">
          <div class="col-lg-12">
              <h3 >Add New Department</h3>
            </div>
            <!-- /.col-lg-12 -->
        </div> 
                    
                      <!-- <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "user_id">User Id:</label>

                        <div class="col-md-8"> --> 
                          <!--  <input class="form-control input-sm" id="user_id" name="user_id" placeholder=
                              "Account Id" type="hidden" value="<?php echo $res->AUTO; ?>"> -->
                      <!--   </div>
                      </div>
                    </div> -->           
                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Name:</label> 
                          <input name="deptid" type="hidden" value="">
                          <input class="form-control input-sm" id="DEPARTMENT_NAME" name="DEPARTMENT_NAME" type="text" value="">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Course:</label> 
                          <input name="deptid" type="hidden" value="">
                          <textarea  class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC" ></textarea>
                          <!-- <input class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC" placeholder=
                              "Description" type="text" value=""> -->
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Program:</label> 
                          <input name="deptid" type="hidden" value="">
                          <input class="form-control input-sm" id="DEPARTMENT_NAME" name="DEPARTMENT_NAME" type="text" value="">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Semester:</label> 
                          <input name="deptid" type="hidden" value="">
                          <input class="form-control input-sm" id="DEPARTMENT_NAME" name="DEPARTMENT_NAME" type="text" value="">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">School Year:</label> 
                          <input name="deptid" type="hidden" value="">
                          <input class="form-control input-sm" id="DEPARTMENT_NAME" name="DEPARTMENT_NAME" type="text" value="">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Amount:</label> 
                          <input name="deptid" type="hidden" value="">
                          <input class="form-control input-sm" id="DEPARTMENT_NAME" name="DEPARTMENT_NAME" type="text" value="">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Date:</label> 
                          <input name="deptid" type="hidden" value="">
                          <input class="form-control input-sm" id="DEPARTMENT_NAME" name="DEPARTMENT_NAME" type="text" value="">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Remarks:</label> 
                          <input name="deptid" type="hidden" value="">
                          <input class="form-control input-sm" id="DEPARTMENT_NAME" name="DEPARTMENT_NAME" type="text" value="">
                        </div>
                      </div>
                    </div>

              <div class="row">
                      <div class="col-md-8"> 
                        <button class="btn btn-info btn-round" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button>  
                        </div>
                      </div> 
  
          </form>
        