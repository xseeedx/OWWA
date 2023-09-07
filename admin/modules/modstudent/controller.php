	<?php
	require_once ("../../../include/initialize.php");

	$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

	switch ($action) {
		
		case 'edit' :
		doEdit();
		break;
		
		case 'delete' :
		doDelete();
		break;

		
		case 'photos' :
		doupdateimage();
		break;
	
		case 'add1' :
			doInsert();
			break;

		case 'editme' :
			doEditme();
			break;
				
		case 'editfam' :
		doEditfam();
		break;
				
		case 'edited' :
			doEditeduc();
			break;
					
		case 'editapp' :
		doEditscholarapp();
		break;
		
		case 'approval_edit_personal_info' :
			doApprove_request_edit_personal_info();
			break;		
		
		case 'approval_educational_info' :
			doApprove_approval_educational_info();
			break;
		
		case 'approval_fam_info' :
			doApproval_fam_info();
			break;

		case 'approval_scholarship_application' :
			doAproval_scholarship_application();
			break;

		case 'reject' :
			doReject();
			break;
		}

	
	// function doInsert(){
	// 	global $mydb; 
	// 	if(isset($_POST['save'])){
				
	// 		if ($_POST['firstname'] == "" OR $_POST['lastname'] == "" OR $_POST['phone_num'] == "") {
	// 		$messageStats = false;
	// 		message("All fields are required!","error");
	// 		redirect('index.php?view=add');
	// 		}
	// 					else{ 
							
	// 			$program = $_POST['program'];
	// 			$firstname = $_POST['firstname'];
	// 			$firstname = str_replace("'","\'",$firstname);
	// 			$middlename = $_POST['middlename'];
	// 			$middlename = str_replace("'","\'",$middlename);
	// 			$lastname = $_POST['lastname'];
	// 			$lastname = str_replace("'","\'",$lastname);
	// 			$suffix = $_POST['suffix'];
	// 			$suffix = str_replace("'","\'",$suffix);

	// 			$age= $_POST['age'];
	// 			$address= $_POST['address'];
	// 			$address = str_replace("'","\'",$address);

	// 			$birthdate= $_POST['birthdate'];
						
	// 			$email= $_POST['email'];
	// 			$email = str_replace("'","\'",$email); 	
	// 			$phone_num= $_POST['phone_num'];	
	// 			$phone_num = str_replace("'","\'",$phone_num); 
	// 			$religion= $_POST['religion'];
	// 			$religion = str_replace("'","\'",$religion); 	
	// 			$citizenship= $_POST['citizenship'];
	// 			$citizenship = str_replace("'","\'",$citizenship);

	// 			$father_fname = $_POST['father_fname'];
	// 			$father_fname = str_replace("'","\'",$father_fname);
	// 			$father_mname = $_POST['father_fname'];
	// 			$father_fname = str_replace("'","\'",$father_fname);
	// 			$father_lname = $_POST['father_lname'];
	// 			$father_lname = str_replace("'","\'",$father_lname);
	// 			$father_suffix = $_POST['father_suffix'];
	// 			$father_suffix = str_replace("'","\'",$father_suffix);
	// 			$father_occupation = $_POST['father_occupation'];
	// 			$father_occupation = str_replace("'","\'",$father_occupation);
	// 			$father_status = $_POST['father_status'];
	// 			$father_status = str_replace("'","\'",$father_status);
	// 			$Father_Educ = $_POST['Father_Educ'];
	// 			$Father_Educ = str_replace("'","\'",$Father_Educ);
	// 			$father_contactnum = $_POST['father_contactnum'];
	// 			$father_contactnum = str_replace("'","\'",$father_contactnum);

	// 			$mother_fname = $_POST['mother_fname'];
	// 			$mother_fname = str_replace("'","\'",$mother_fname);
	// 			$mother_mname = $_POST['mother_mname'];
	// 			$mother_mname = str_replace("'","\'",$mother_mname);
	// 			$mother_lname = $_POST['mother_lname'];
	// 			$mother_lname = str_replace("'","\'",$mother_lname);
	// 			$mother_suffix = $_POST['mother_suffix'];
	// 			$mother_suffix = str_replace("'","\'",$mother_suffix);
	// 			$mother_occupation = $_POST['mother_occupation'];
	// 			$mother_occupation = str_replace("'","\'",$mother_occupation);
	// 			$mother_status = $_POST['mother_status'];
	// 			$mother_status = str_replace("'","\'",$mother_status);
	// 			$mother_Educ = $_POST['mother_Educ'];
	// 			$mother_Educ = str_replace("'","\'",$mother_Educ);
	// 			$mother_contactnum = $_POST['mother_contactnum'];
	// 			$mother_contactnum = str_replace("'","\'",$mother_contactnum);
				
	// 			$primary_school = $_POST['primary_school'];
	// 			$primary_school = str_replace("'","\'",$primary_school);
	// 			$primary_year_from = $_POST['primary_year_from'];
	// 			$primary_year_from = str_replace("'","\'",$primary_year_from);
	// 			$primary_year_to = $_POST['primary_year_to'];
	// 			$primary_year_to = str_replace("'","\'",$primary_year_to);
	// 			$secondary_school = $_POST['secondary_school'];
	// 			$secondary_school = str_replace("'","\'",$secondary_school);
	// 			$secondary_year_from = $_POST['secondary_year_from'];
	// 			$secondary_year_from = str_replace("'","\'",$secondary_year_from);
	// 			$secondary_year_to = $_POST['secondary_year_to'];
	// 			$secondary_year_to = str_replace("'","\'",$secondary_year_to);
	// 			$tertiary_school = $_POST['tertiary_school'];
	// 			$tertiary_school = str_replace("'","\'",$tertiary_school);
	// 			$tertiary_year_to = $_POST['tertiary_year_to'];
	// 			$tertiary_year_to = str_replace("'","\'",$tertiary_year_to);
	// 			$tertiary_year_from = $_POST['tertiary_year_from'];
	// 			$tertiary_year_from = str_replace("'","\'",$tertiary_year_from);
	// 			$Course = $_POST['Course'];
	// 			$Course = str_replace("'","\'",$Course);
	// 			$year_level = $_POST['year_level'];
	// 			$year_level = str_replace("'","\'",$year_level);


	// 			$firstLetter = substr($lastname, 0, 1);
	// 			$password = $firstname.$program.$age;
	// 			$name = $firstname. ' ' .$lastname;
						
	// 			$student = New Student(); 

	// 			$student->program = $program; 
	// 			$student->firstname = $firstname; 
	// 			$student->middlename = $middlename;
	// 			$student->lastname = $lastname;
	// 			$student->suffix = $suffix;
	// 			$student->age= $age;
	// 			// $student->gender= $gender;
	// 			$student->address= $address;
		
	// 			$student->birthdate= $birthdate;    	
	// 			$student->email= $email; 	
	// 			$student->phone_num= $phone_num;	
	// 			$student->religion= $religion; 	
	// 			$student->citizenship= $citizenship;

	// 			$student->father_fname= $father_fname; 	
	// 			$student->father_mname= $father_mname;	
	// 			$student->father_lname= $father_lname; 	
	// 			$student->father_suffix= $father_suffix; 
	// 			$student->father_occupation= $father_occupation; 	
	// 			$student->father_status= $father_status;	
	// 			$student->Father_Educ= $Father_Educ; 	
	// 			$student->Father_contactnum= $father_contactnum; 

	// 			$student->mother_fname= $mother_fname; 	
	// 			$student->mother_mname= $mother_mname;	
	// 			$student->mother_lname= $mother_lname; 	
	// 			$student->mother_suffix= $mother_suffix; 
	// 			$student->mother_occupation= $mother_occupation; 	
	// 			$student->mother_status= $mother_status;	
	// 			$student->mother_Educ= $mother_Educ; 	
	// 			$student->mother_contactnum= $mother_contactnum;  	

	// 			$student->primary_school = $primary_school;    	
	// 			$student->primary_year_from = $primary_year_from; 	
	// 			$student->primary_year_to = $primary_year_to;	
	// 			$student->secondary_school = $secondary_school; 	
	// 			$student->secondary_year_from = $secondary_year_from; 
	// 			$student->secondary_year_to= $secondary_year_to; 
	// 			$student->school = $tertiary_school; 
	// 			$student->tertiary_year_to= $tertiary_year_to; 
	// 			$student->tertiary_year_from = $tertiary_year_from; 
	// 			$student->Course= $Course;	
	// 			$student->year_level= $year_level; 
				
	// 			$lnfirstLetter = substr($lastname, 0, 3);

	// 			$nameforfolder = $firstname.'.'.$lnfirstLetter;
	// 			$folderPath = "../../../uploads/" . $nameforfolder;
			
	// 			$success = mkdir($folderPath);
			
	// 			$student->create("scholar_id");
		
	// 			$sql ="INSERT INTO `user_acc` (`NAME`, `username`, `account_password`, `TYPE`) 
	// 			VALUES('{$name}','{$email}','{$password}','Scholar')";
	// 			$mydb->setQuery($sql); 

	// 				message("New Scholar information and accounted has been created successfully!", "success");
	// 				redirect("index.php");

	// 						}
								
	// 					}
	// 					else {
	// 						message("Try again", "error");
	// 						redirect("index.php");
	// 					}
		
	// 	}
		
	function doInsert()
{
    global $mydb;

    if (isset($_POST['save'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone_num = $_POST['phone_num'];

        if (empty($firstname) || empty($lastname)) {
            message("All fields are required!", "error");
            redirect('index.php?view=add1');
        } else {
            $program = $_POST['program'];
            $firstname = str_replace("'", "\'", $_POST['firstname']);
            $middlename = str_replace("'", "\'", $_POST['middlename']);
            $lastname = str_replace("'", "\'", $_POST['lastname']);
            $suffix = str_replace("'", "\'", $_POST['suffix']);
            $age = $_POST['age'];
			$gender = $_POST['gender'];
            $address = str_replace("'", "\'", $_POST['address']);
            $birthdate = $_POST['birthdate'];
            $email = str_replace("'", "\'", $_POST['email']);
            $phone_num = str_replace("'", "\'", $_POST['phone_num']);
			$region = $_POST['region'];
			$region = str_replace("'", "\'", $region);
            // $citizenship = str_replace("'", "\'", $_POST['citizenship']);
            $OFW_firstname = str_replace("'", "\'", $_POST['OFW_firstname']);
            $OFW_middlename = str_replace("'", "\'", $_POST['OFW_middlename']);
            $OFW_lastname = str_replace("'", "\'", $_POST['OFW_lastname']);
            $OFW_suffix = str_replace("'", "\'", $_POST['OFW_suffix']);
            $OFW_relationship = str_replace("'", "\'", $_POST['OFW_relationship']);
			$category = $_POST['category'];
			$category = str_replace("'", "\'", $category);
			
            $OFW_email = str_replace("'", "\'", $_POST['OFW_email']);

            $mid = substr($OFW_middlename, 0, 1);
			$parent_password = 'OWWA@parent123';
            $name = $firstname . ' ' . $lastname;
			$OFWname = $OFW_firstname ." ". $mid.". ".$OFW_lastname;

			$mid = substr($middlename, 0, 1);
			$password = $firstname . $program . $age;
			$name = $lastname . ' ' . $firstname . ' ' . $mid;
			$TYPE = 'Scholar';
			$account_status = 'active';			

			      // Query the database to check if the email already exists
				  $query = "SELECT * FROM scholar_info WHERE email = ?";
				  $params = array($email);
				  $result = $mydb->executeQuery($query, $params);
				  $row_count = $mydb->num_rows($result);
	  
				   // Check if the email already exists
				   if ($row_count > 0) {
					echo '<script>
						var errorMessage = "Email already exists!";
						alert(errorMessage);
						window.location.href = "index.php?view=add1";
					</script>';
					exit;
				}

			$user1 = new User();
			$user1->NAME = $name;
			$user1->username = $email;
			$user1->account_password = $password;
			$user1->TYPE = "Scholar";
			$user1->account_status = $account_status;
			$user1->staff_address = $region;
			$user1->create();

			$user2 = new User();
			$user2->NAME = $OFWname;
			$user2->username = $OFW_email;
			$user2->account_password = $parent_password;
			$user2->TYPE = "Parent";
			$user2->account_status = $account_status;
			$user2->staff_address = $region;
			$user2->create();

			$userAccId = $user1->getLastInsertId();
	
			if ($userAccId) {
                $student = new Student();
				$student->user_id = $userAccId;
                $student->program = $program;
                $student->firstname = $firstname;
                $student->middlename = $middlename;
                $student->lastname = $lastname;
                $student->suffix = $suffix;
                $student->age = $age;
				$student->gender = $gender;
                $student->address = $address;
                $student->birthdate = $birthdate;
                $student->email = $email;
                $student->phone_num = $phone_num;
                $student->region = $region;
                // $student->citizenship = $citizenship;
                $student->OFW_firstname = $OFW_firstname;
                $student->OFW_middlename = $OFW_middlename;
                $student->OFW_lastname = $OFW_lastname;
                $student->OFW_suffix = $OFW_suffix;
                $student->OFW_relationship = $OFW_relationship;
                $student->category = $category;
                $student->OFW_email = $OFW_email;

				$lnfirstLetter = substr($lastname, 0, 3);
				
				$first = $firstname . '_';
				$middle = $middlename;
				$last = $lastname . '_';
				$foldername = $last . $first . $middle;
				$folderPath = "../../../scholar/modules/documents/scholars_document/" . $program . "/" . $foldername;
				
				if (!is_dir($folderPath)) {
					if (mkdir($folderPath)) {
						// Folder creation success
						message("New Scholar information and account have been created successfully!", "success");
						redirect("index.php");
					} else {
						// Failed to create the folder
						message("Error creating the folder for the student.", "error");
						redirect("index.php");
					}
				} else {
					// Folder already exists
					message("Folder for the student already exists.", "warning");
					redirect("index.php");
				}

				
				$success = mkdir($folderPath);
	
				$student->create();					
		
					$subject = "Lets get started in OWWA";
					$headers  = "From: " . strip_tags('owwaspom@gmail.com
					') . "\r\n";
					$headers .= "Reply-To: " . strip_tags($email) . "\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
					$msg = '
					<head>
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
							</head>

						<div class="container py-5">
							<div class="row">
								<div class="col-md-6 offset-md-3">
								<p>Dear User,</p>
								<p>We are delighted to inform you that a new account has been created for you.</p>
								<p>Stay updated with the latest information and important updates by logging into your account.</p>

							<h3>Your Account Details</h3>
							<p>Username : '.$email.' </p>
							<p>Password : '.$password.'  </p>


								<div class="text-center">
									<a class="btn btn-primary btn-block" href="http://localhost/OWWASPOM/login.php">Get started</a>
								</div>
								<p>If you have any questions or need further assistance, please dont hesitate to contact our support team.</p>
								<p>Best regards,</p>
								<p>Explore your new account</p>
								</div>
							</div>
							</div>
					';
						mail($email,$subject,$msg,$headers);
						message("Email has been posted successfully!", "success");
						redirect("index.php");


							}
								
						}
	
	}
	else {
		message("Try again", "error");
		redirect("index.php");
	}
}
	
		function doEdit(){
			if(isset($_POST['save'])){

				
				$student = New Student(); 
				$student->FNAME         = $_POST['FNAME'];
				$student->MNAME         = $_POST['MNAME'];
				$student->LNAME         = $_POST['LNAME'];
				$student->ADDRESS       = $_POST['ADDRESS']; 
				$student->PHONE         = $_POST['PHONE']; 
				$student->COURSE        = $_POST['COURSE']; 
				$student->DEPARTMENT    = $_POST['DEPARTMENT']; 
				$student->update($_POST['IDNO']);


		
	

				message("[". $_POST['LNAME'] ."] has been updated!", "success");
				redirect("index.php");
			}
		}


		function doDelete(){

	

			if (isset($_POST['selector'])==''){
				message("Select the records first before you delete!","error");
				redirect('index.php');
				}else{

				$id = $_POST['selector'];
				$key = count($id);

				for($i=0;$i<$key;$i++){ 

				$student = New student();
				$student->delete($id[$i]);

				$sy = new Schoolyear();
				$sy->delete($id[$i]);


				$parent = New Parents();
				$parent->delete($id[$i]);

			
				message("student has been Deleted!","info");
				redirect('index.php');

				}
			}

		}
			
		function doupdateimage(){
	
				$errofile = $_FILES['photo']['error'];
				$type = $_FILES['photo']['type'];
				$temp = $_FILES['photo']['tmp_name'];
				$myfile =$_FILES['photo']['name'];
				$location=  "student_image/".$myfile;

			


			if ( $errofile > 0) {
					message("No Image Selected!", "error");
					redirect("index.php?view=view&id=".$_POST['MIDNO']."&sy=".$_POST['SYID']);
			}else{
		
					@$file= $_FILES['photo']['tmp_name'];
					@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
					@$image_name= addslashes($_FILES['photo']['name']); 
					@$image_size= getimagesize($_FILES['photo']['tmp_name']);

				if ($image_size==FALSE ) {
					message("Uploaded file is not an image!", "error");
					redirect("index.php?view=view&id=".$_POST['MIDNO']."&sy=".$_POST['SYID']);
				}else{
					

						//uploading the file
					move_uploaded_file($temp, "student_image/" . $myfile);
				
						$student = New Student();
						$student->PROIMAGE 			= $location;
						$student->image 			=  $image;
						$student->update($_POST['MIDNO']);

							redirect("index.php?view=view&id=".$_POST['MIDNO']."&sy=".$_POST['SYID']);
							
								
						}
				}
				
			} 
	

				
		function doApprove_request_edit_personal_info (){
			global $mydb;
			if(isset($_POST['save'])){
				if ($_POST['firstname'] == "" OR $_POST['lastname'] == "" OR $_POST['phone_num'] == "") {
					$messageStats = false;
					message("All fields are required!","error");
					redirect('index.php?view=add');
					}
								else{ 

						$scholar_id = $_POST['scholar_id'];
						$request_id = $_POST['request_id'];
						// $program = $_POST['program'];
						$firstname = $_POST['firstname'];
						$firstname = str_replace("'","\'",$firstname);
						$middlename = $_POST['middlename'];
						$middlename = str_replace("'","\'",$middlename);
						$lastname = $_POST['lastname'];
						$lastname = str_replace("'","\'",$lastname);
						$suffix = $_POST['suffix'];
						$suffix = str_replace("'","\'",$suffix);
		
						$age= $_POST['age'];
						$gender= $_POST['gender'];
						$address= $_POST['address'];
						$address = str_replace("'","\'",$address);

						$scholar_region= $_POST['scholar_region'];
						$scholar_region = str_replace("'","\'",$scholar_region);
		
						$birthdate= $_POST['birthdate'];
								
						$email= $_POST['email'];
						$email = str_replace("'","\'",$email); 	
						$phone_num= $_POST['phone_num'];	
						$phone_num = str_replace("'","\'",$phone_num); 
						$religion= $_POST['religion'];
						$religion = str_replace("'","\'",$religion); 	
						$citizenship= $_POST['citizenship'];
						$citizenship = str_replace("'","\'",$citizenship);
						$notification_content = "Admin aprove your request. You can check it now.";
						$recipient = $scholar_id ;
						$time = date('Y-m-d H:i:s');

						$request = New Request();	
						$request->request_status = "Approved"; 
						$request->update($request_id);

				$student = New Student(); 
				// $student->program = $program; 
				$student->firstname = $firstname; 
				$student->middlename = $middlename;
				$student->lastname = $lastname;
				$student->suffix = $suffix;
				$student->age= $age;
				$student->gender= $gender;
				$student->address= $address;
				$student->address= $address;
				$student->birthdate= $birthdate;    	
				$student->email= $email; 	
				$student->phone_num= $phone_num;	
				$student->scholar_region= $scholar_region; 	
				$student->citizenship= $citizenship;
				$student->update($scholar_id);

				$sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
								VALUES('{$request_id}','request','{$notification_content}','unread','{$time}','{$recipient}', '{$_SESSION['NAME']}')";
				// 		// Set the SQL query for execution
						$mydb->setQuery($sql2);

						message("".$_POST['firstname']." personal information has been updated!", "success");
						redirect("index.php");
				
			}
		}
	}

			
	function doAproval_scholarship_application (){
		global $mydb;
		if(isset($_POST['save'])){
			if ($_POST['school'] == "" OR $_POST['Course'] == "" OR $_POST['year_level'] == "") {
				$messageStats = false;
				message("All fields are required!","error");
				redirect('index.php?view=add');
				}
							else{ 
					
					$scholar_id = $_POST['scholar_id'];
					$request_id = $_POST['request_id'];
					$school = $_POST['school'];
					$school = str_replace("'","\'",$school);
					$Course = $_POST['Course'];
					$Course = str_replace("'","\'",$Course);
					$year_level = $_POST['year_level'];
					$year_level = str_replace("'","\'",$year_level);

					$notification_content = "Admin aprove your request. You can check it now.";
					$recipient = $scholar_id ;
					$time = date('Y-m-d H:i:s');

					$request = New Request();	
					$request->request_status = "Approved"; 
					$request->update($request_id);

			$student = New Student(); 
			// $student->program = $program; 
			$student->school = $school; 
			$student->Course = $Course;
			$student->year_level = $year_level;
			$student->update($scholar_id);

			$sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
							VALUES('{$request_id}','request','{$notification_content}','unread','{$time}','{$recipient}', '{$_SESSION['NAME']}')";
			// 		// Set the SQL query for execution
					$mydb->setQuery($sql2);

					message("".$_POST['firstname']." personal information has been updated!", "success");
					redirect("index.php");
			
		}
	}
}

	function doApproval_fam_info (){
	global $mydb;
	if(isset($_POST['save'])){

		
				$father_fname = $_POST['father_fname'];
				$father_fname = str_replace("'","\'",$father_fname);
				$father_mname = $_POST['father_mname'];
				$father_mname = str_replace("'","\'",$father_mname);
				$father_lname = $_POST['father_lname'];
				$father_lname = str_replace("'","\'",$father_lname);
				$middlefather_suffixname = $_POST['father_suffix'];
				$father_suffix = str_replace("'","\'",$father_suffix);
				$fatherstatus = $_POST['fatherstatus'];
				$fatherstatus = str_replace("'","\'",$fatherstatus);
				$father_occupation = $_POST['father_occupation'];
				$father_occupation = str_replace("'","\'",$father_occupation);

				$Father_Educ= $_POST['Father_Educ'];
				$Father_Educ = str_replace("'","\'",$Father_Educ);
				$father_contactnum= $_POST['father_contactnum'];
				$father_contactnum = str_replace("'","\'",$father_contactnum);
				$mother_fname= $_POST['mother_fname'];
				$mother_fname = str_replace("'","\'",$mother_fname);
				$mother_mname= $_POST['mother_mname'];
				$mother_mname = str_replace("'","\'",$mother_mname);
				$mother_lname = $_POST['mother_lname'];
				$mother_lname = str_replace("'","\'",$mother_lname);
				$mother_suffix = $_POST['mother_suffix'];
				$mother_suffix = str_replace("'","\'",$mother_suffixe);
				$motherstatus = $_POST['motherstatus'];
				$motherstatus = str_replace("'","\'",$motherstatus);
				$mother_occupation = $_POST['mother_occupation'];
				$mother_occupation = str_replace("'","\'",$mother_occupation);

				$mother_Educ= $_POST['mother_Educ'];
				$mother_Educ = str_replace("'","\'",$mother_Educ);
				$mother_contactnum= $_POST['mother_contactnum'];
				$mother_contactnum = str_replace("'","\'",$mother_contactnum);
				$notification_content = "Admin aprove your request. You can check it now.";
				$recipient = $scholar_id ;
				$time = date('Y-m-d H:i:s');

				$request = New Request();	
				$request->request_status = "Approved"; 
				$request->update($request_id);

		$student = New Student(); 
		// $student->program = $program; 
		$student->firstname = $firstname; 
		$student->middlename = $middlename;
		$student->lastname = $lastname;
		$student->suffix = $suffix;
		$student->age= $age;
		$student->gender= $gender;
		$student->address= $address;
		$student->address= $address;
		$student->birthdate= $birthdate;    	
		$student->email= $email; 	
		$student->phone_num= $phone_num;	
		$student->scholar_region= $scholar_region; 	
		$student->citizenship= $citizenship;
		$student->update($scholar_id);

		$sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
						VALUES('{$request_id}','request','{$notification_content}','unread','{$time}','{$recipient}', '{$_SESSION['NAME']}')";
		// 		// Set the SQL query for execution
				$mydb->setQuery($sql2);

				message("".$_POST['firstname']." personal information has been updated!", "success");
				redirect("index.php");
	}
}


		// doApprove_approval_educational_info();{

		// 	if(isset($_POST['save'])){
			// 	if ($_POST['firstname'] == "" OR $_POST['lastname'] == "" OR $_POST['phone_num'] == "") {
			// 		$messageStats = false;
			// 		message("All fields are required!","error");
			// 		redirect('index.php?view=add');
			// 		}
			// 					else{ 

			// 			$scholar_id = $_POST['scholar_id'];
			// 			// $program = $_POST['program'];
			// 			$firstname = $_POST['firstname'];
			// 			$firstname = str_replace("'","\'",$firstname);
			// 			$middlename = $_POST['middlename'];
			// 			$middlename = str_replace("'","\'",$middlename);
			// 			$lastname = $_POST['lastname'];
			// 			$lastname = str_replace("'","\'",$lastname);
			// 			$suffix = $_POST['suffix'];
			// 			$suffix = str_replace("'","\'",$suffix);
		
			// 			$age= $_POST['age'];
			// 			$gender= $_POST['gender'];
			// 			$address= $_POST['address'];
			// 			$address = str_replace("'","\'",$address);

			// 			$scholar_region= $_POST['scholar_region'];
			// 			$scholar_region = str_replace("'","\'",$scholar_region);
		
			// 			$birthdate= $_POST['birthdate'];
								
			// 			$email= $_POST['email'];
			// 			$email = str_replace("'","\'",$email); 	
			// 			$phone_num= $_POST['phone_num'];	
			// 			$phone_num = str_replace("'","\'",$phone_num); 
			// 			$religion= $_POST['religion'];
			// 			$religion = str_replace("'","\'",$religion); 	
			// 			$citizenship= $_POST['citizenship'];
			// 			$citizenship = str_replace("'","\'",$citizenship);
			// 			$notification_content = "Admin aprove your request. You can check it now.";
			// 			$recipient = "Administrator";
			// 			$time = date('Y-m-d H:i:s');

			// 	$student = New Student(); 
			// 	// $student->program = $program; 
			// 	$student->firstname = $firstname; 
			// 	$student->middlename = $middlename;
			// 	$student->lastname = $lastname;
			// 	$student->suffix = $suffix;
			// 	$student->age= $age;
			// 	$student->gender= $gender;
			// 	$student->address= $address;
			// 	$student->address= $address;
			// 	$student->birthdate= $birthdate;    	
			// 	$student->email= $email; 	
			// 	$student->phone_num= $phone_num;	
			// 	$student->scholar_region= $scholar_region; 	
			// 	$student->citizenship= $citizenship;
			// 	$student->update($scholar_id);

			// 	$requestID = $student->getLastInsertId();
	
			// 	// Check if the announcement ID is retrieved successfully
			// 	if ($requestID) {
			// 		// Construct the SQL query to insert the notification
			// 		$sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
			// 				VALUES('{$requestID}','request','{$notification_content}','unread','{$time}','{$recipient}', '{$_SESSION['NAME']}')";
			// 		// Set the SQL query for execution
			// 		$mydb->setQuery($sql2);

					
			// 	}

			// 	message("". $_POST['firstname'] ." personal information has been updated!", "success");
			// 	redirect("index.php");
			// 					}
				
			// }
		// 	}

		// }	
				
	?>