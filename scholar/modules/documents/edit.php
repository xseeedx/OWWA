  <?php  
    // if (!isset($_SESSION['TYPE'])=='Administrator'){
    //    redirect(web_root."index.php");
    //   }

    @$user_id = $_GET['id'];
      if($user_id==''){
    redirect("index.php");
  }
    $user = New User();
    $singleuser = $user->single_user($user_id);

  ?> 

  <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

                <div class="row">
          <div class="col-lg-12">
              <h3  >Update User</h3>
            </div>
        </div> 

                          
                          <input class="form-control input-sm" id="user_id" name="user_id" placeholder=
                              "Account Id" type="Hidden" value="<?php echo $singleuser->USERID; ?>">

                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Name:</label> 
                          <input name="deptid" type="hidden" value="">
                          <input class="form-control input-sm" id="user_name" name="user_name"  type="text" value="<?php echo $singleuser->NAME; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Username:</label> 
                          <input name="deptid" type="hidden" value="">
                          <input class="form-control input-sm" id="user_email" name="user_email" type="text" value="<?php echo $singleuser->UEMAIL; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">User Role</label> 
                          <input name="deptid" type="hidden" value="">
                          <input class="form-control input-sm" id="user_email" name="user_email" type="text" value="<?php echo $singleuser->UEMAIL; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Password:</label> 
                          <input name="deptid" type="hidden" value="">
                          <input class="form-control input-sm" id="user_pass" name="user_pass"  type="Password" value="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Retype Password:</label> 
                          <input name="deptid" type="hidden" value="">
                          <input class="form-control input-sm" id="retype_user_pass" name="retype_user_pass"  type="Password" value="">
                        </div>
                      </div>
                    </div> 

              <div class="row">
                      <div class="col-md-8"> 
                          <button class="btn btn-info btn-round" id="usersave" name="save" type="submit" >Save</button> 
                        </div>
                      </div> 

                
  
          </form>