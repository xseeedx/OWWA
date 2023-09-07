	<?php
	require_once ("../../../include/initialize.php");
		if (!isset($_SESSION['USERID'])){
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
	
		function doInsert(){
			if(isset($_POST['save'])){

	
				$course = New Course(); 
				$course->COURSE 			= $_POST['COURSE'];
				$course->DESCRIPTION		= $_POST['DESCRIPTION']; 
				$course->create(); 

				message("New [". $_POST['COURSE'] ."] created successfully!", "success");
				redirect("index.php");
			
			}

		}

		function doEdit(){
		if(isset($_POST['save'])){

				$course = New course(); 
				$course->COURSE 			= $_POST['COURSE'];
				$course->DESCRIPTION		= $_POST['DESCRIPTION'];  
				$course->update($_POST['courseid']);

				message("[". $_POST['COURSE'] ."] has been updated!", "success");
				redirect("index.php");
			}
		}


		function doDelete(){
			
			
			
					$id = 	$_GET['id'];

					$course = New course();
					$course->delete($id);
				
				message("Course already Deleted!","info");
				redirect('index.php');
		
			
		}
	?>