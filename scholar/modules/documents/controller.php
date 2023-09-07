	<?php
	require_once ("../../../include/initialize.php");
	if(!isset($_SESSION['USERID'])){
		redirect(web_root."admin/index.php");
		
	}


	$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

	switch ($action) {
		case 'add' :
		doInsert();
		break;
		
		case 'edit' :
		doEdit();
		break;
		
		case 'delete' :
		doDelete();
		break;

		case 'assign':
		doassignsubj();
		break;

		case 'delsubj':
		doDelsubj();
		break;
		case 'grade':
		savegrade();
		break;
		}
	
		// function doInsert(){
		// 	global $mydb;
		// 	if(isset($_POST['save'])){
		// 		$notification_content = "".$_SESSION['NAME'] ." uploaded documents. You can check it now.";
		// 		$recipient = "Administrator";
		// 		$time = date('Y-m-d H:i:s');

		// 	if ($_POST['fileUpload'] == "" OR $_POST['yearlevel'] == "" OR $_POST['semester'] == "") {
		// 		$messageStats = false;
		// 		message("All field is required!","error");
		// 		redirect('index.php?view=add');
		// 	}
			
		// 	else {	
		// 		$document = New Document();
		// 		// $user->USERID 		= $_POST['user_id'];
		// 		$document->document_name 		= $_POST['fileUpload'];
		// 		$document->document_description		= $_POST['description'];
		// 		$document->year_level		= $_POST['yearlevel'];
		// 		$document->semester		= $_POST['semester'];
		// 		$document->date_submitted		= date("Y-m-d H:i:s");
		// 		$document->document_status			= "unread" ;// $_POST['user_type'];
		// 		$document->report_sender		=  $_SESSION['USERID'];// $_POST['user_type'];
		// 		$document->create();

		// 		// Get the ID of the just inserted announcement
		// 		$announcementId = $document->getLastInsertId();
	
		// 		// Check if the announcement ID is retrieved successfully
		// 		if ($announcementId) {
		// 			// Construct the SQL query to insert the notification
		// 			$sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
		// 					VALUES('{$announcementId}','Documents','{$notification_content}','unread','{$time}','{$recipient}', '{$_SESSION['NAME']}')";
					
		// 			// Set the SQL query for execution
		// 			$mydb->setQuery($sql2);
		// 		}
		// 		message("New [". $_POST['fileUpload'] ."] created successfully!", "success");
		// 		redirect("index.php");
				
		// 	}
		// 	}

		// }
		
		function doInsert()
		{
			global $mydb;
	
			if (isset($_POST['save'])) {
				$notification_content = "".$_SESSION['NAME'] ." uploaded documents. You can check it now.";
				$recipient = "Administrator";
				$time = date('Y-m-d H:i:s');
				$description = $_POST['description'];
				$year_level = $_POST['yearlevel'];
				$semester = $_POST['semester'];
				$scholar_id = $_POST['scholar_id'];
	
				$program = $_POST['program'];
				$firstname = $_POST['firstname'];
				$middlename = $_POST['middlename'];
				$lastname = $_POST['lastname'];
	
				$username = $lastname.'_'.$firstname .'_'. $middlename ;
	
				if (empty($_FILES['fileToUpload']['name']) || empty($year_level) || empty($semester)) {
					message("All fields are required!", "error");
					redirect('index.php?view=add');
				} else {
					$file_name = $_FILES['fileToUpload']['name'];
					$file_tmp = $_FILES['fileToUpload']['tmp_name'];
		
					// Specify the directory where you want to save the uploaded file
					$target_directory = "scholars_document/". $program ."/". $username ."/";
					$target_file = $target_directory . $file_name;
		
					if (move_uploaded_file($file_tmp, $target_file)) {
						$document_name = str_replace("'", "\'", $file_name);
		
						$document = new Document();
						$document->document_name = $document_name;
						$document->document_description = $description;
						$document->year_level = $year_level;
						$document->semester = $semester;
						$document->date_submitted = date("Y-m-d H:i:s");
						$document->document_status = "unread";
						$document->report_sender = $scholar_id;
						$document->create();
		
							// Get the ID of the just inserted announcement
							$announcementId = $document->getLastInsertId();
				
							// Check if the announcement ID is retrieved successfully
							if ($announcementId) {
								// Construct the SQL query to insert the notification
								$sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
										VALUES('{$announcementId}','Documents','{$notification_content}','unread','{$time}','{$recipient}', '{$scholar_id}')";
								
								// Set the SQL query for execution
								$mydb->setQuery($sql2);
							}
						message("New " . $document_name . " created and file uploaded successfully!", "success");
						redirect("index.php");
					} else {
						message("Failed to upload file. Please try again.", "error");
						redirect('index.php?view=add');
					}
				}
			}
		}

		function doEdit(){
			global $mydb;
		if(isset($_POST['save'])){

				$user = New User(); 
				$user->NAME 		= $_POST['user_name'];
				$user->UEMAIL		= $_POST['user_email'];
				$user->PASS			=sha1($_POST['user_pass']);
				$user->TYPE			= "Administrator" ; //$_POST['user_type'];
				$user->update($_POST['user_id']);

				$sql = "SELECT * FROM `tblstudent` WHERE `IDNO`='".$_POST['user_id']."'";
				$mydb->setQuery($sql);
				$mydb->executeQuery();


				message("[". $_POST['user_name'] ."] has been updated!", "success");
				redirect("index.php");
			}
		}


		function doDelete(){
			
					$id = 	$_GET['id'];

					$user = New User();
					$user->delete($id);
				
				message("User already Deleted!","info");
				redirect('index.php');
			// }
			// }

			
		}
	?>