
  <?php
  if(!isset($_SESSION['USERID'])){
    redirect(web_root."admin/index.php");
  }

                        // $autonum = New Autonumber();
                        // $res = $autonum->single_autonumber(2);

                        ?>

  <style>
    
  select {

  font-family: arial, sans-serif;
  outline: 0;
  padding: 5px;
  margin-left: 10px;
  margin-right: 10px;
  border-radius: 5px;
  width: 50%;
  }
  .provinces{
    display: flex;
  }
    </style>
  <body>
      <form class="form-horizontal span6" action="controller.php?action=add1" method="POST" >
          
          <div class="row">
              <div class="col-lg-12">
                <h3> Scholar Information</h3>
              </div>
            </div>

          <div class="row">
            <div class="col-md-3">
                <select name="program" id="program">
                                          <option value="ODSP">ODSP</option>
                                          <option value="ODSP+">ODSP+</option>
                                          <option value="EDSP">EDSP</option>
                                          <option value="EDSP+">EDSP+</option>
                                          <option value="ELAP">ELAP</option>    
                                  </select>     
              </div>
          </div>

                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">First Name:</label> 
                          <input class="form-control input-sm" id="firstname" name="firstname"  required>
                    </div>    
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                    <label class="bmd-label-floating">Middle Name:</label> 
                      <input class="form-control input-sm" id="middlename" name="middlename" type="text">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Last Name:</label> 
                        <input class="form-control input-sm" id="lastname" name="lastname"   type="text" required>
                    </div>
                  </div>
              
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Suffix:</label> 
                        <input class="form-control input-sm" id="suffix" name="suffix"   >
                    </div>
                  </div>
              </div>

            <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                      <label class="bmd-label-floating">Age:</label> 
                          <input class="form-control input-sm" id="age" name="age" type="number"  required>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                      <label class="bmd-label-floating">Birthdate:</label> 
                        <input class="form-control input-sm" id="birthdate" name="birthdate" onfocus="(this.type='date')"  onblur="this.type='text'" type="text" required>
                  </div>
                </div>

                <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Email:</label> 
                    <input class="form-control input-sm" id="email" name="email"  type="email" required>
                </div>
              </div>
              </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Street/Barangay/Municipality:</label>
                      <input class="form-control input-sm" id="address" name="address"   type="text" >
                      <!-- <select style="margin-left: 520px; width: 97px; font-size: 11px"> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <select name="" id="">
                            <option value="Ormin">Mindoro Oriental</option>
                            <option value="Occmin">Mindoro Occidental</option>
                            <option value="Mar">Marinduque</option>
                            <option value="Rom">Romblon</option>
                            <option value="Pal">Palawan</option>
                      </select>
                    </div>
                  </div>
                </div>

            <div class="row">
              <div class="col-lg-12">
              <h3> Name of OWWA Member</h3>
            </div>
        </div>
                      
                  <div class="row"> 
                    <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">First Name:</label> 
                          <input class="form-control input-sm" id="father_fname" name="father_fname"   type="text"  >
                        </div>    
                      </div>
      
                      <div class="col-md-3">
                        <div class="form-group">
                        <label class="bmd-label-floating">Middle Name:</label> 
                          <input class="form-control input-sm" id="father_mname" name="father_mname" type="text">
                        </div>
                      </div>       

                      <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">Last Name:</label> 
                          <input class="form-control input-sm" id="father_lname" name="father_lname"   type="text"  >
                        </div>
                      </div>
                  
                      <div class="col-md-3">
                      <div class="form-group">
                      <label class="bmd-label-floating">Suffix:</label> 
                          <input class="form-control input-sm" id="father_suffix" name="father_suffix"   >
                        </div>
                      </div>
                    </div>

                    <div class="row"> 
                    <div class="col-md-4">
                      <div class="form-group">
                      <label class="bmd-label-floating">Relationship to OFW Member</label> 
                          <input class="form-control input-sm" id="father_occupation" name="father_occupation"   type="text" >
                        </div>
                      </div>

                      <div class="col-md-4">
                      <div class="form-group">
                      <label class="bmd-label-floating">Category</label> 
                          <select >
                                          <option value="Living">Land based</option>
                                          <option value="Deceased">Sea based</option>
                                  </select>    
                        </div>
                      </div>
                      </div>

        <!-- buttons -->
        
        <div class="row">
        <div class = "text-right">
              <div class="col-md-6"> 
                  <button class="btn btn-success btn-floating" name="save" type="submit" >Save</button>  
                </div>
              </div>
              <div class = "text-right">
                <div class="col-md-6">  
                  <button class="btn btn-danger btn-floating" name = "cancel" value="Cancel" onclick="history.back()" >Cancel</button> 
                </div>
              </div>
        </div> 
                            
  <!--/.fluid-container-->

  </form>