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

</head>
 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

               <div class="row">
         <div class="col-lg-12">
            <h3  >Update User</h3>
          </div>
          <!-- /.col-lg-12 -->
       </div> 
                    <!-- <div class="row">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "user_id">User Id:</label> -->

                      <!-- <div class="col-md-8"> -->
                        
                         <input class="form-control input-sm" id="user_id" name="user_id" placeholder= "Account Id" type="Hidden"  value="<?php echo $singleuser->USERID; ?>">
                   <!--    </div>
                    </div>
                  </div>      -->      
                  
                  <div class="row">
                   <div class="col-md-11">
                    <div class="form-group">
                     <label class="bmd-label-floating">NAME:</label> 
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="NAME" name="NAME"  type="text" value="<?php echo $singleuser->NAME; ?>">
                      </div>
                    </div>

                  
                  </div>

                  <div class="row">
                   <div class="col-md-11">
                    <div class="form-group">
                     <label class="bmd-label-floating">Username:</label> 
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="email" name="email" type="email" value="<?php echo $singleuser->username; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                   <div class="col-md-11">
                    <div class="form-group">
                     <label class="bmd-label-floating">User Role</label> 
                         <select class="form-control input-sm" id="TYPE" name="TYPE" value="<?php echo $singleuser->TYPE; ?>" required>
                           <option value="Administrator">Administrator</option>
                           <option value="Staff">Staff</option>
                           <option value="scholar">Scholar</option>
                           <option value="parent">Parent</option>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                   <div class="col-md-11">
                    <div class="form-group">
                     <label class="bmd-label-floating">Password:</label> 
                         <input class="form-control input-sm" id="new_password" name="new_password"  type="Password" value="<?php echo $singleuser->account_password; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                   <div class="col-md-11">
                    <div class="form-group">
                     <label class="bmd-label-floating">Retype Password:</label>
                         <input class="form-control input-sm" id="confirm_password" name="confirm_password"  type="Password" value="<?php echo $singleuser->account_password; ?>">
                      </div>
                    </div>
                  </div> 

             <div class="row">
                    <div class="col-md-8"> 
                         <button class="btn btn-info btn-round" id="usersave" name="save" type="submit" >Save</button> 
                      </div>
                    </div> 

                
 
        </form>
      
 