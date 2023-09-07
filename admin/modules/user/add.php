<?php 
                    if(!isset($_SESSION['USERID'])){
  redirect(web_root."admin/index.php");
}
                       ?> 
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
              $(document).ready(function() {
                $('#save').click(function(e) {
                  var password = $('#new_password').val();
                  var confirmPassword = $('#confirm_password').val();
            
                  // Password validation
                  var passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
                  if (!passwordPattern.test(password)) {
                    e.preventDefault();
                    alert('Password must be at least 8 characters long and contain at least one letter and one number.');
                    return;
                  }
            
                  // Compare passwords
                  if (password !== confirmPassword) {
                    e.preventDefault();
                    alert('Password and Confirm Password do not match');
                    return;
                  }
                });
            
                var xhr = new XMLHttpRequest();
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                var messageElement = document.getElementById("passMessage");
                messageElement.innerHTML = response;
              });
            </script>
                       

                <script>
                        function checkUserByEmail(email) {
                          // Send an AJAX request to the server
                          var xhr = new XMLHttpRequest();
                          xhr.open("POST", "check_email.php", true); // Replace "check_user.php" with the server-side script that handles the request
                          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                          // Handle the response from the server
                          xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                              var response = xhr.responseText;

                              // Display the response message
                              var messageElement = document.getElementById("userMessage");
                              messageElement.innerHTML = response;
                            }
                          };

                          // Send the email value to the server
                          xhr.send("email=" + email);
                        }

                </script>


 <form class="form-horizontal span6" action="controller.php?action=add" method="POST">
      <div class="row">
         <div class="col-lg-12">
            <h3 >Add New User</h3>
          </div>
          <!-- /.col-lg-12 -->
       </div> 
     
                  
                  <div class="row">
                   <div class="col-md-11">
                    <div class="form-group">
                     <label class="bmd-label-floating">NAME:</label> 
                         <input class="form-control input-sm" id="NAME" name="NAME"  type="text" required>
                      </div>
                    </div>      
                  </div>

                  <div class="row">
                   <div class="col-md-11">
                    <div class="form-group">
                     <label class="bmd-label-floating">Username:</label> 
                     <input class="form-control input-sm" id="email" name="email" type="email" required onblur="checkUserByEmail(this.value)">
                      <div id="userMessage"></div>
                      <div id="errorMessage"></div>

                    </div>
                    </div>
                  </div>

                  <div class="row">
                     <div class="col-md-11">
                        <div class="form-group">
                           <label class="bmd-label-floating">User Role</label>
                           <select class="form-control input-sm" id="TYPE" name="TYPE" required>
                           <option value="Administrator">Administrator</option>
                           <option value="Staff">Staff</option>
                           </select>
                        </div>
                     </div>
                     </div>
                     <div class="row">
                     <div class="col-md-11">
                        <div class="form-group">
                           <label class="bmd-label-floating">User Address</label>
                           <select class="form-control input-sm" id="address" name="address" required>
                           <option value="Oriental Mindoro">Oriental Mindoro</option>
                           <option value="Occidental Mindoro">Occidental Mindoro</option>
                           <option value="Marinduque">Marinduque</option>
                           <option value="Romblon">Romblon</option>
                           <option value="Palawan">Palawan</option>
                           </select>
                        </div>
                     </div>
                     </div>

                  <div class="row">
                   <div class="col-md-11">
                    <div class="form-group">
                     <label class="bmd-label-floating">Password:</label> 
                         <input class="form-control input-sm" id="new_password" name="new_password"  type="password" required>
                         <div id="passMessage"></div>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                   <div class="col-md-11">
                    <div class="form-group">
                     <label class="bmd-label-floating">Retype Password:</label> 
                         <input class="form-control input-sm" id="confirm_password" name="confirm_password"  type="password" required>
                         <div id="passMessage"></div>
                      </div>
                    </div>
                  </div> 

             <div class="row">
                    <div class="col-md-8"> 
                         <button class="btn btn-info btn-round" id="save" name="save" type="submit" >Save</button> 
                      </div>
                    </div> 

          
          
        </form>
       