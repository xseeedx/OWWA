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
		}

	
	function doInsert(){
		global $mydb; 
		if(isset($_POST['save'])){
				
			if ($_POST['firstname'] == "" OR $_POST['lastname'] == "" OR $_POST['phone_num'] == "") {
			$messageStats = false;
			message("All fields are required!","error");
			redirect('index.php?view=add');
			}
						else{ 
							
				$program = $_POST['program'];
				$firstname = $_POST['firstname'];
				$firstname = str_replace("'","\'",$firstname);
				$middlename = $_POST['middlename'];
				$middlename = str_replace("'","\'",$middlename);
				$lastname = $_POST['lastname'];
				$lastname = str_replace("'","\'",$lastname);
				$suffix = $_POST['suffix'];
				$suffix = str_replace("'","\'",$suffix);

				$age= $_POST['age'];
				$address= $_POST['address'];
				$address = str_replace("'","\'",$address);

				$birthdate= $_POST['birthdate'];
						
				$email= $_POST['email'];
				$email = str_replace("'","\'",$email); 	
				$phone_num= $_POST['phone_num'];	
				$phone_num = str_replace("'","\'",$phone_num); 
				$religion= $_POST['religion'];
				$religion = str_replace("'","\'",$religion); 	
				$citizenship= $_POST['citizenship'];
				$citizenship = str_replace("'","\'",$citizenship);

				$father_fname = $_POST['father_fname'];
				$father_fname = str_replace("'","\'",$father_fname);
				$father_mname = $_POST['father_fname'];
				$father_fname = str_replace("'","\'",$father_fname);
				$father_lname = $_POST['father_lname'];
				$father_lname = str_replace("'","\'",$father_lname);
				$father_suffix = $_POST['father_suffix'];
				$father_suffix = str_replace("'","\'",$father_suffix);
				$father_occupation = $_POST['father_occupation'];
				$father_occupation = str_replace("'","\'",$father_occupation);
				$father_status = $_POST['father_status'];
				$father_status = str_replace("'","\'",$father_status);
				$Father_Educ = $_POST['Father_Educ'];
				$Father_Educ = str_replace("'","\'",$Father_Educ);
				$father_contactnum = $_POST['father_contactnum'];
				$father_contactnum = str_replace("'","\'",$father_contactnum);

				$mother_fname = $_POST['mother_fname'];
				$mother_fname = str_replace("'","\'",$mother_fname);
				$mother_mname = $_POST['mother_mname'];
				$mother_mname = str_replace("'","\'",$mother_mname);
				$mother_lname = $_POST['mother_lname'];
				$mother_lname = str_replace("'","\'",$mother_lname);
				$mother_suffix = $_POST['mother_suffix'];
				$mother_suffix = str_replace("'","\'",$mother_suffix);
				$mother_occupation = $_POST['mother_occupation'];
				$mother_occupation = str_replace("'","\'",$mother_occupation);
				$mother_status = $_POST['mother_status'];
				$mother_status = str_replace("'","\'",$mother_status);
				$mother_Educ = $_POST['mother_Educ'];
				$mother_Educ = str_replace("'","\'",$mother_Educ);
				$mother_contactnum = $_POST['mother_contactnum'];
				$mother_contactnum = str_replace("'","\'",$mother_contactnum);
				
				$primary_school = $_POST['primary_school'];
				$primary_school = str_replace("'","\'",$primary_school);
				$primary_year_from = $_POST['primary_year_from'];
				$primary_year_from = str_replace("'","\'",$primary_year_from);
				$primary_year_to = $_POST['primary_year_to'];
				$primary_year_to = str_replace("'","\'",$primary_year_to);
				$secondary_school = $_POST['secondary_school'];
				$secondary_school = str_replace("'","\'",$secondary_school);
				$secondary_year_from = $_POST['secondary_year_from'];
				$secondary_year_from = str_replace("'","\'",$secondary_year_from);
				$secondary_year_to = $_POST['secondary_year_to'];
				$secondary_year_to = str_replace("'","\'",$secondary_year_to);
				$tertiary_school = $_POST['tertiary_school'];
				$tertiary_school = str_replace("'","\'",$tertiary_school);
				$tertiary_year_to = $_POST['tertiary_year_to'];
				$tertiary_year_to = str_replace("'","\'",$tertiary_year_to);
				$tertiary_year_from = $_POST['tertiary_year_from'];
				$tertiary_year_from = str_replace("'","\'",$tertiary_year_from);
				$Course = $_POST['Course'];
				$Course = str_replace("'","\'",$Course);
				$year_level = $_POST['year_level'];
				$year_level = str_replace("'","\'",$year_level);


				$firstLetter = substr($lastname, 0, 1);
				$password = $firstname.$program.$age;
				$name = $firstname. ' ' .$lastname;
						
				$student = New Student(); 

				$student->program = $program; 
				$student->firstname = $firstname; 
				$student->middlename = $middlename;
				$student->lastname = $lastname;
				$student->suffix = $suffix;
				$student->age= $age;
				// $student->gender= $gender;
				$student->address= $address;
		
				$student->birthdate= $birthdate;    	
				$student->email= $email; 	
				$student->phone_num= $phone_num;	
				$student->religion= $religion; 	
				$student->citizenship= $citizenship;

				$student->father_fname= $father_fname; 	
				$student->father_mname= $father_mname;	
				$student->father_lname= $father_lname; 	
				$student->father_suffix= $father_suffix; 
				$student->father_occupation= $father_occupation; 	
				$student->father_status= $father_status;	
				$student->Father_Educ= $Father_Educ; 	
				$student->Father_contactnum= $father_contactnum; 

				$student->mother_fname= $mother_fname; 	
				$student->mother_mname= $mother_mname;	
				$student->mother_lname= $mother_lname; 	
				$student->mother_suffix= $mother_suffix; 
				$student->mother_occupation= $mother_occupation; 	
				$student->mother_status= $mother_status;	
				$student->mother_Educ= $mother_Educ; 	
				$student->mother_contactnum= $mother_contactnum;  	

				$student->primary_school = $primary_school;    	
				$student->primary_year_from = $primary_year_from; 	
				$student->primary_year_to = $primary_year_to;	
				$student->secondary_school = $secondary_school; 	
				$student->secondary_year_from = $secondary_year_from; 
				$student->secondary_year_to= $secondary_year_to; 
				$student->school = $tertiary_school; 
				$student->tertiary_year_to= $tertiary_year_to; 
				$student->tertiary_year_from = $tertiary_year_from; 
				$student->Course= $Course;	
				$student->year_level= $year_level; 
				
				$lnfirstLetter = substr($lastname, 0, 3);

				$nameforfolder = $firstname.'.'.$lnfirstLetter;
			$folderPath = "../../../uploads/" . $nameforfolder;
		
			$success = mkdir($folderPath);
			
				$student->create("scholar_id");
		
				$sql ="INSERT INTO `user_acc` (`NAME`, `username`, `account_password`, `TYPE`) 
				VALUES('{$name}','{$email}','{$password}','Scholar')";
				$mydb->setQuery($sql); 


			
			

					message("New Scholar information and accounted has been created successfully!", "success");
					redirect("index.php");


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
	

				
		function doFolder(){
			if (isset($_POST['save'])) {

				$firstname = $_POST['firstname'];
				$firstname = str_replace("'","\'",$firstname);
				$middlename = $_POST['middlename'];
				$lastname = $_POST['lastname'];
				$lastname = str_replace("'","\'",$lastname);
				$lnfirstLetter = substr($lastname, 0, 3);

				$fname = $firstname.'.'.$lnfirstLetter;
				$folderName = $_POST['folder_name'];
				$folderPath = "../../../uploads/" . $fname;
			
				$success = mkdir($folderPath);
			
				if ($success) {
					message(" Folder created successfully.", "success");
					redirect("index.php");
				} else {
					message("Failed to create the folder.", "error");
					redirect("index.php");
				}
			}
			
		}
			
				
	?>