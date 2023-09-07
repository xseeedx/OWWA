<?php
require_once ("../../../include/initialize.php");
	 
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
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
		
	case 'delete' :
	doDelete();
	break;

	case 'photos' :
	doupdateimage();
	break;
 
	}

   
function doInsert(){
	  }
 
	  function doEditme() {
		global $mydb;
		if (isset($_POST['save'])) 
		{
			$scholar_id = $_POST['scholar_id'];
			$firstname = $_POST['firstname'];
			$firstname = str_replace("'", "\'", $firstname);
			$middlename = $_POST['middlename'];
			$middlename = str_replace("'", "\'", $middlename);
			$lastname = $_POST['lastname'];
			$lastname = str_replace("'", "\'", $lastname);
			$suffix = $_POST['suffix'];
			$suffix = str_replace("'", "\'", $suffix);
			$age = $_POST['age'];
			// $gender = $_POST['gender'];
			$address = $_POST['address'];
			$address = str_replace("'", "\'", $address);
			$birthdate = $_POST['birthdate'];	
			$email = $_POST['email'];
			$email = str_replace("'", "\'", $email);
			$phone_num = $_POST['phone_num'];
			$phone_num = str_replace("'", "\'", $phone_num);
			$religion = $_POST['religion'];
			$religion = str_replace("'", "\'", $religion);
			$citizenship = $_POST['citizenship'];
			$citizenship = str_replace("'", "\'", $citizenship);
			$name = $_SESSION['NAME'];
			$notification_content = $name. "have a edit request. Check and validate it now.";
			$recipient = "Admin";
			$time = date('Y-m-d H:i:s');
	
			$request = new Request();
			$request->scholar_id = $scholar_id;
			$request->firstname = $firstname;
			$request->middlename = $middlename;
			$request->lastname = $lastname;
			$request->suffix = $suffix;
			$request->age = $age;
			// $request->gender = $gender;
			$request->address = $address;
			$request->birthdate = $birthdate;
			$request->email = $email;
			$request->phone_num = $phone_num;
			$request->religion = $religion;
			$request->citizenship = $citizenship;
			$request->request_status = "pending";
			$request->request_description = "1";
			$request->create();


			$requestId = $request->getLastInsertId();
	
				// Check if the announcement ID is retrieved successfully
				if ($requestId) {
					// Construct the SQL query to insert the notification
					$sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
					VALUES('{$requestId}','request','{$notification_content}','unread','{$time}','Administrator', '{$scholar_id}')";
					$mydb->setQuery($sql2);// Set the SQL query for execution
					// Execute the query to insert the notification
					// $mydb->executeQuery();

					message("Wait until the admin has approved your request.", "info");
					redirect("index.php");
				}

		} else {
			message("Failed to edit information", "error");
			redirect("index.php");
			
		}
	}
	

	function doEditfam(){
			global $mydb;
		if(isset($_POST['save'])){
			$scholar_id = $_POST['scholar_id'];
			// $number_siblings = $_POST['number_siblings'];
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
			$Father_contactnum = $_POST['father_contactnum'];
			$Father_contactnum = str_replace("'","\'",$father_contactnum);

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
			$citizenship = $_POST['citizenship'];
			$citizenship = str_replace("'","\'",$citizenship);
			$name = $_SESSION['NAME'];
			$notification_content = "'$name' have a edit request. Check and validate it now.";
			$recipient = "Admin";
			$time = date('Y-m-d H:i:s');
			
			$request = new Request();
			// $student->number_siblings = $number_siblings;    	
		 	$request->father_fname= $father_fname; 	
		 	$request->father_mname= $father_mname;	
		 	$request->father_lname= $father_lname; 	
		 	$request->father_suffix= $father_suffix; 
			$request->father_occupation= $father_occupation; 	
		 	$request->father_status= $father_status;	
		 	$request->Father_Educ= $Father_Educ; 	
		 	$request->Father_contactnum= $father_contactnum; 

			 $request->mother_fname= $mother_fname; 	
		 	$request->mother_mname= $mother_mname;	
		 	$request->mother_lname= $mother_lname; 	
		 	$request->mother_suffix= $mother_suffix; 
			$request->mother_occupation= $mother_occupation; 	
		 	$request->mother_status= $mother_status;	
		 	$request->mother_Educ= $mother_Educ; 	
		 	$request->mother_contactnum= $mother_contactnum; 
			 $request->request_status = "pending";
			 $request->request_description = "2";
			 $request->create();
 
			 $requestId = $request->getLastInsertId();
	 
				 // Check if the announcement ID is retrieved successfully
				 if ($requestId) {
					 // Construct the SQL query to insert the notification
					 $sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
					 VALUES('{$requestId}','request','{$notification_content}','unread','{$time}','Administrator', '{$scholar_id}')";
					 $mydb->setQuery($sql2);// Set the SQL query for execution
					 // Execute the query to insert the notification
					 // $mydb->executeQuery();
 
					 message("Wait until the admin has approved your request.", "info");
					 redirect("index.php");
				 }
		}

		elseif(isset($_POST['cancel'])){
			message("Failed to edit family background", "error");
			redirect("index.php");
		}
		else {
			redirect("index.php");
		}
	}

	function doEditeduc(){
			global $mydb;
		if(isset($_POST['save'])){

			$scholar_id = $_POST['scholar_id'];
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
			$name = $_SESSION['NAME'];
			$notification_content = "'$name' have a edit request. Check and validate it now.";
			$recipient = "Administrator";
			$time = date('Y-m-d H:i:s');
			
			$request = new Request();
			$request->primary_school = $primary_school;    	
		 	$request->primary_year_from = $primary_year_from; 	
		 	$request->primary_year_to = $primary_year_to;	
		 	$request->secondary_school = $secondary_school; 	
		 	$request->secondary_year_from = $secondary_year_from; 
			$request->secondary_year_to= $secondary_year_to; 
			$request->tertiary_school = $tertiary_school; 
			$request->tertiary_year_to= $tertiary_year_to; 
			$request->tertiary_year_from = $tertiary_year_from; 
			$request->request_status = "pending";
			$request->request_description = "3";
			$request->create();

			$requestId = $request->getLastInsertId();
	
				// Check if the announcement ID is retrieved successfully
				if ($requestId) {
					// Construct the SQL query to insert the notification
					$sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
					VALUES('{$requestId}','request','{$notification_content}','unread','{$time}','Administrator', '{$scholar_id}')";
					$mydb->setQuery($sql2);// Set the SQL query for execution
					// Execute the query to insert the notification
					// $mydb->executeQuery();

					message("Wait until the admin has approved your request.", "info");
					redirect("index.php");
				}
		}

		elseif(isset($_POST['cancel'])){
			message("Failed to edit Educational background", "error");
			redirect("index.php");
		}
		else {
			redirect("index.php");
		}
	}

	function doEditscholarapp(){
			global $mydb;
		if(isset($_POST['save'])){

			$scholar_id = $_POST['scholar_id'];
			$school = $_POST['school'];
			$school = str_replace("'","\'",$school);
			$Course = $_POST['Course'];
			$Course = str_replace("'","\'",$Course);
			$year_level = $_POST['year_level'];
			$year_level = str_replace("'","\'",$year_level);
			$name = $_SESSION['NAME'];
			$notification_content = "'$name' have a edit request. Check and validate it now.";
			$recipient = "Administrator";
			$time = date('Y-m-d H:i:s');
			
			$request = new Request();
			$request->scholar_id = $scholar_id;    	
		 	$request->school= $school; 	
		 	$request->Course= $Course;	
		 	$request->year_level= $year_level; 	
			 $request->request_status = "pending";
			 $request->request_description = "4";
			 $request->create();
 
			 $requestId = $request->getLastInsertId();
	 
				 // Check if the announcement ID is retrieved successfully
				 if ($requestId) {
					 // Construct the SQL query to insert the notification
					 $sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
					 VALUES('{$requestId}','request','{$notification_content}','unread','{$time}','Administrator', '{$scholar_id}')";
					 $mydb->setQuery($sql2);// Set the SQL query for execution
					 // Execute the query to insert the notification
					 // $mydb->executeQuery();
 
					 message("Wait until the admin has approved your request.", "info");
					 redirect("index.php");
				 }
		}

		elseif(isset($_POST['cancel'])){
			message("Failed to edit educational application", "error");
			redirect("index.php");
		}
		else {
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


// 		$fp = fopen($_FILES['photo']['tmp_name'], "r");
 
// if ($fp) {
 
//      $content = fread($fp, $_FILES['photo']['size']);
 
//      fclose($fp);
 
//      $content = addslashes($content);

       
// 	$student = New Student();
// 	$student->STUDPIC 			=  $content;
// 	$student->update($_POST['MIDNO']);
// 	redirect("index.php?view=view&id=".$_POST['MIDNO']."&sy=".$_POST['SYID']);

 
   
 // 	 $image = $_FILES['photo'] ;
 //        // print_r($image);
 //        $name = $_FILES['photo']['name'] ;
 //        $image = addslashes(file_get_contents($_FILES['photo']['tmp_name'])) ; 

	// $student = New Student();
	// $student->PROIMAGE 			=  $name;
	// $student->image 			=  $image;
	// $student->update($_POST['MIDNO']);
 
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

						// $student = New Student();
						// $student->STUDPIC 			= $_FILES['photo']['name'];
						// $student->update($_POST['MIDNO']);

						redirect("index.php?view=view&id=".$_POST['MIDNO']."&sy=".$_POST['SYID']);
						 
							
					}
			}
			 
		} 
 
?>