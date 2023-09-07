	<?php
	require_once ("../../../include/initialize.php");
		

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

		case 'photos' :
		doupdateimage();
		break;
	
		}

	
	function doInsert(){
		if(isset($_POST['studsave'])){
				
						if ($_POST['LNAME'] == "" OR $_POST['LNAME'] == "" OR $_POST['PHONE'] == "") {
						$messageStats = false;
						message("All fields are required!","error");
						redirect('index.php?view=add');
						}else{ 

							$autonumber = New Autonumber();
							$auto = $autonumber->set_autonumber("STUDENTID");

							$IDNO = date("Y").$auto->AUTO;


							$student = New Student();
							$student->IDNO          = $IDNO;
							$student->FNAME         = $_POST['FNAME'];
							$student->MNAME         = $_POST['MNAME'];
							$student->LNAME         = $_POST['LNAME'];
							$student->ADDRESS       = $_POST['ADDRESS']; 
							$student->PHONE         = $_POST['PHONE']; 
							$student->COURSE        = $_POST['COURSE']; 
							$student->DEPARTMENT    = $_POST['DEPARTMENT']; 
							$student->USERNAME      = $_POST['USERNAME'];
							$student->STUDPASS      = sha1($_POST['PASS']);
							// $student->PROIMAGE       = $location;
							$student->create(); 


							$autonumber = New Autonumber();
							$autonumber->auto_update("STUDENTID");

							message("New [". $_POST['LNAME'] ."] created successfully!", "success");
							redirect("index.php");
							}
								
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
	
	?>