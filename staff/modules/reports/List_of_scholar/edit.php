  <?php  
      if(!isset($_SESSION['USERID'])){
    redirect(web_root."admin/index.php");
  }

    @$dept_id = $_GET['id'];
      if($dept_id==''){
    redirect("index.php");
  }
    $dept = New Department();
    $singledepartment = $dept->single_departments($dept_id);

  ?> 

  <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">
    <div class="row">
          <div class="col-lg-12">
              <h3  >Update Department</h3>
            </div>
        </div> 
                  
                    
                      
                  <input id="DEPT_ID" name="DEPT_ID"  
                  type="Hidden" value="<?php echo $singledepartment->DEPARTMENTID; ?>">
                    
                    
                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Department:</label> 
                          <input name="deptid" type="hidden" value="">
                          <input class="form-control input-sm" id="DEPARTMENT_NAME" name="DEPARTMENT_NAME"  type="text" value="<?php echo $singledepartment->DEPARTMENT; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Description:</label>  
                          <textarea class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC" type="text" ><?php echo $singledepartment->DESCRIPTION; ?></textarea>
                          </div>
                      </div>
                    </div>

  
              
              <div class="row">
                      <div class="col-md-8"> 
                          <button class="btn btn-info " name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button> 
                      </div>
                    </div>
  
          </form>
        