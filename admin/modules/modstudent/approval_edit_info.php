    <?php  
        @$user_id = $_GET['id'];
        echo $user_id;
            if($user_id=='' ){
            redirect("index.php");


            
	$request = New Request();	
    $requestID = $request->single_studentrequest($scholar_id);

            
        }
        
        $student = New Student();
        $singlestudent = $student->single_students($user_id);
        $scholar_id = $singlestudent->scholar_id;

        // $notification = New Notification();
        // $notif = $notification->single_notification(12);
        // // $scholar_id = $notification->scholar_id;
        
        // echo "$scholar_id";


        ?>

    
    <style type="text/css">
    .sidebar-left .main{
        float:right;
    }
    .sidebar-left .sidebar{
        float:left;
    }

    .sidebar-right .main{
        float:left;
    }
    .sidebar-right .sidebar{
        float:right;
    }
    
    </style>
    
            
            <form class="form-horizontal span6" action="controller.php?action=approval_edit_personal_info" method="POST" >
           <?php $query = "SELECT * FROM `request_info` where scholar_id = '$scholar_id'";
							$mydb->setQuery($query);
							$cur = $mydb->loadResultList();

							foreach ($cur as $result) {

                            }

            ?>
                <div class="row">
            <div class="col-lg-12">
                <h3>Request Edit Scholar Information</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                    
                            <input  id="scholar_id" name="scholar_id"  type="hidden" value="<?php echo $result->scholar_id; ?>"> 
                                                
                            <input  id="request_id" name="request_id"  type="hidden" value="<?php echo $result->request_info_id; ?>"> 
                    
                    <div class="row">
                        <div class="col-md-3">
                        <div class="form-group">
                        <label class="bmd-label-floating">First Name:</label> 
                            <input class="form-control input-sm" id="firstname" name="firstname"   type="text" value="<?php echo $result->firstname; ?>" required>
                            </div>    
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                            <label class="bmd-label-floating">Middle Name:</label> 
                            <input class="form-control input-sm" id="middlename" name="middlename" type="text" value="<?php echo $result->middlename; ?>" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                        <label class="bmd-label-floating">Last Name:</label> 
                            <input class="form-control input-sm" id="lastname" name="lastname"   type="text" value="<?php echo $result->lastname; ?>" required>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                        <div class="form-group">
                        <label class="bmd-label-floating">Suffix:</label> 
                            <input class="form-control input-sm" id="suffix" name="suffix"   type="text" value="<?php echo $result->suffix; ?>" >
                            </div>
                        </div>
                        </div>





                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                <label class="bmd-label-floating">Age:</label> 
                                    <input class="form-control input-sm" id="age" name="age" type="number" value="<?php echo $result->age; ?>" required>
                                </div>
                            </div>
                        
                            <div class="col-md-">
                                <div class="form-group">
                                    <select class="form-control input-sm"  name="gender" id="gender" value="<?php echo $singlestudent->gender; ?>"  required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="bmd-label-floating">Birthdate:</label> 
                                    <input class="form-control input-sm" id="birthdate" name="birthdate"   type="date" value="<?php echo $singlestudent->birthdate; ?>" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Address:</label> 
                                    <input class="form-control input-sm" id="address" name="address"  type="text" value="<?php echo $singlestudent->address; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                            <!-- <label class="bmd-label-floating">Region: <?php echo $singlestudent->scholar_region; ?></label> 
                        -->
                                <select class="form-control input-sm"  name="scholar_region" id="scholar_region" required>
                                <option value="<?php echo $singlestudent->scholar_region; ?>"><?php echo $singlestudent->scholar_region; ?></option>
                                        <option value="Oriental Mindoro">Oriental Mindoro </option>
                                        <option value="Occidental Mindoro">Occidental Mindoro</option>
                                        <option value="Marinduque">Marinduque</option>
                                        <option value="Romblon">Romblon</option>
                                        <option value="Palawan">Palawan</option>
                                </select>
                            </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-3">
                        <div class="form-group">
                        <label class="bmd-label-floating">Email: </label> 
                            <input class="form-control input-sm" id="email" name="email"   type="email" value="<?php echo $singlestudent->email; ?>" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                        <label class="bmd-label-floating">phone number:</label> 
                            <input class="form-control input-sm" id="phone_num" name="phone_num"    value="<?php echo $singlestudent->phone_num; ?>" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                            <label class="bmd-label-floating">Citizenship: </label> 
                                <input class="form-control input-sm" id="citizenship" name="citizenship"   type="text" value="<?php echo $singlestudent->citizenship; ?>" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                        <label class="bmd-label-floating">Religion: </label> 
                            <input class="form-control input-sm" id="religion" name="religion"   type="text" value="<?php echo $singlestudent->religion; ?>" required>
                            </div>
                        </div>

                        </div>
    
                    
                        <div class="row">
                        <div class="col-md-2"> 
                            <button class="btn btn-success btn-floating" name="save" type="submit" >Approve</button>  
                            </div>
                            <div class="col-md-2"> 
                        
                            <button class="btn btn-danger btn-floating" name = "cancel" value="Cancel" onclick="history.back()" >Reject</button>  
                            </div>
                        </div> 
    
    <!--/.fluid-container-->
    
    </form>