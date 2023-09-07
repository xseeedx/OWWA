<?php
require_once ("../../../include/initialize.php");
	 // if (!isset($_SESSION['TYPE'])=='Administrator'){
  //     redirect(web_root."index.php");
  //    }
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

	}
   
	function doInsert(){
		global $mydb;
		if(isset($_POST['save']))
		{
	
			$name = $_POST['NAME'];
			$username =  $_POST['email'];
			$newPassword = $_POST['new_password'];
			$confirmPassword = $_POST['confirm_password'];
			$account_status = "activate";
			$TYPE = $_POST['TYPE'];
			$address = $_POST['address'];

			if ($_POST['NAME']  == "" OR $_POST['email'] == "" OR $_POST['new_password'] == "")
			{
				message("Insert Information", "error");
				redirect("index.php");
			} 
			
			else {		if ($newPassword !== $confirmPassword) 
				{
					message("New password and confirm password do not match!", "error");
					redirect("index.php?view=edit&id=".$_POST['user_id']."");
				}
					else
					{					
						
						$query = "SELECT * FROM scholar_info WHERE email = ?";
						$params = array($username);
						$result = $mydb->executeQuery($query, $params);
						$row_count = $mydb->num_rows($result);
			
						 // Check if the email already exists
						 if ($row_count > 0) {
						  echo '<script>
							  var errorMessage = "username already exists!";
							  alert(errorMessage);
							  window.location.href = "index.php?view=add";
						  </script>';
						  exit;
					  }

							$user = New User(); 
							$user->NAME 		= $name;
							$user->username		= $username;
							$user->account_password		= $confirmPassword;
							$user->account_status		= $account_status;
							$user->TYPE			= $TYPE;
							$user->staff_address			= $address;
							$user->create();

							message("New user created successfully!", "success");
							redirect("index.php");
						// }
			}
		}
				
		}
	}

	function doEdit(){
		global $mydb;
	if(isset($_POST['save'])){

	  $ID = $_POST['user_id'];
	  $name = $_POST['NAME'];
	  $username =  $_POST['email'];
	  $newPassword = $_POST['new_password'];
	  $confirmPassword = $_POST['confirm_password'];
	  $TYPE = $_POST['TYPE'];
	//   $address = $_POST['address'];

      // Check if the new password and confirm password match
	  
	if ($_POST['new_password'] == "" OR  $_POST['confirm_password'] == ""){
		message("Insert Password", "error");
		redirect("index.php?view=edit&id=".$_POST['user_id']."");
	} 
	else {
			if ($newPassword !== $confirmPassword) 
			{
				message("New password and confirm password do not match!", "error");
				redirect("index.php?view=edit&id=".$_POST['user_id']."");
			}
				else
				{

					$user = New User(); 
					$user->NAME 		= $name;
					$user->username		= $username;
					$user->account_password		= $confirmPassword;
					$user->TYPE			= $TYPE; //$_POST['user_type'];
					// $user->staff_address			= $address;
					$user->update($ID);
					
					message("[". $_POST['NAME'] ."] has been updated!", "success");
					redirect("index.php");
				}
		}	
	}
	}


	function doDelete(){
		
		// if (isset($_POST['selector'])==''){
		// message("Select the records first before you delete!","info");
		// redirect('index.php');
		// }else{

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$user = New User();
		// 	$user->delete($id[$i]);

		
				$id = 	$_GET['id'];
				$stat = "deactivate";

				$user = New User();
				$user->account_status = $stat; 
	 		 	$user->update($id);
			 
			message("User already Deleted!","info");
			redirect('index.php');
		// }
		// }

		
	}
?>