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

	case 'reply' :
		doReply();
		break;

	case 'approve' :
		doApprove();
		break;

	case 'info' :
		doInfo();
		break;	

	case 'photos' :
	doupdateimage();
	break;

	}
   


	function doInfo(){
		global $mydb;
	
		if (isset($_POST['save'])) {
			$id = $_POST['save'];
			$notification_status = "read";

			$mydb->setQuery("SELECT * FROM `notification` WHERE notification_id = '$id'");
			$cur = $mydb->loadResultList();
	
		foreach ($cur as $result) {
				$type = $result->notification_type;
				$catch = $result->catch_id;
	

				if ($type = "announcement") {	
					$sql = "UPDATE `notification` set `notification_status`='read'   WHERE `notification_id` = $id";
					$mydb->setQuery($sql);
					// message(" notification status has been updated successfully!", "success");
					redirect(web_root."scholar/modules/announcement/index.php");

				} else if ($type = "comment") {
					$sql = "UPDATE `notification` set `notification_status`='read'   WHERE `notification_id` = $id";
					$mydb->setQuery($sql);
					// message(" You can now check it manually!", "success");
					redirect(web_root."scholar/modules/announcement/index.php");

				}
				else if ($type = "reply") {
					$sql = "UPDATE `notification` set `notification_status`='read'   WHERE `notification_id` = $id";
					$mydb->setQuery($sql);
					// message(" You can now check it manually!", "success");
					redirect(web_root."scholar/modules/announcement/index.php");

				}
				else {
					message(" Else", "success");
					redirect('index.php');
				}

			}
	
		}
	}
	
	function doInsert(){
    global $mydb;
    if (isset($_POST['save'])) {
	
	}

}

	function doEdit(){

		global $mydb; 

	if(isset($_POST['info'])){  

		$stat = "read";
		$id = $_POST['info'];
		$sql ="UPDATE `notification` SET `notification_status`='{$stat}'  WHERE`notification_id`='{$id}'";
		$mydb->setQuery($sql);
		$mydb->executeQuery();
			 
			}
		}



	function doDelete(){
		
		global $mydb; 
	 
				// $BLOGID = 	$_GET['id'];
				// $stat = "hidden";

				// $annoucement = New Announcement();
				// $annoucement->announcement_stat = $stat; 
	 		 	// $annoucement->update($BLOGID);

		 	// 	// $sql ="DELETE FROM `announcement`  WHERE`id_announcement`='{$BLOGID}'";
			// 	$sql ="UPDATE `announcement` SET `announcement_stat`='{$stat}'  WHERE`id_announcement`='{$BLOGID}'";
			// 	$mydb->setQuery($sql);
			// 	$mydb->executeQuery();
			 
			// message("Announcement has been removed!","info");
			// redirect('index.php');
		 
		
	}

	function doReply(){
		global $mydb; 
		if(isset($_POST['reply'])){
			$comment_id = $_POST['comment_id'];
			$reply_text = $_POST['reply_text'];
			$reply_text = str_replace("'","\'",$reply_text);

		if ($_POST['reply_text'] == "" ){
			$messageStats = false;
			message("Are you sure you want to leave without a comment","error");
			redirect('index.php?view=edit');

		}else{	
			
			// $comment = New Comment();
			// $comment->comment_status = 'read'; 

			$reply = New Reply();
			$reply->commentid = $comment_id;
			$reply->reply_text = $reply_text;
			$reply->reply_create_at = date("Y-m-d H:i:s");
			$reply->reply_status = 'read'; 	
			$reply->who_reply = $_SESSION['USERID'];
			$reply->create();  

			message("Successfully replied!", "success");
			redirect("index.php");
			
		}
		}

	}

	// function doApprove() {
    //     if (isset($_POST['approve'])) {
    //         // Perform approval actions

    //         message("Scholar information approved successfully!", "success");
    //         redirect("index.php");
    //     } elseif (isset($_POST['reject'])) {
    //         // Perform rejection actions

    //         message("Scholar information rejected.", "warning");
    //         redirect("index.php");
    //     } else {
    //         message("Invalid action.", "error");
    //         redirect("index.php");
    //     }
    // }


	function doApprove() {
		// Check if the form has been submitted
		if (isset($_POST['approve'])) {
			// Process the form data and update the approval status in the database
	
			// Connect to the database (replace hostname, username, password, and dbname with your database credentials)
			$conn = mysqli_connect("hostname", "username", "password", "dbname");
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
	
			// Get the scholar ID and approval status from the form
			$scholarId = $_POST['scholar_id'];
			$approvalStatus = 'approved'; // Set the approval status to 'approved'
	
			// Update the approval status in the scholars table
			$updateQuery = "UPDATE scholars SET approval_status = '$approvalStatus' WHERE scholar_id = $scholarId";
			if (mysqli_query($conn, $updateQuery)) {
				echo "Scholar information approved successfully.";
			} else {
				echo "Error updating scholar information: " . mysqli_error($conn);
			}
	
			// Close the database connection
			mysqli_close($conn);
		} elseif (isset($_POST['reject'])) {
			// Process the form data and update the approval status in the database
	
			// Connect to the database (replace hostname, username, password, and dbname with your database credentials)
			$conn = mysqli_connect("hostname", "username", "password", "dbname");
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
	
			// Get the scholar ID and approval status from the form
			$scholarId = $_POST['scholar_id'];
			$approvalStatus = 'rejected'; // Set the approval status to 'rejected'
	
			// Update the approval status in the scholars table
			$updateQuery = "UPDATE scholars SET approval_status = '$approvalStatus' WHERE scholar_id = $scholarId";
			if (mysqli_query($conn, $updateQuery)) {
				echo "Scholar information rejected.";
			} else {
				echo "Error updating scholar information: " . mysqli_error($conn);
			}
	
			// Close the database connection
			mysqli_close($conn);
		}
	
	}

?>