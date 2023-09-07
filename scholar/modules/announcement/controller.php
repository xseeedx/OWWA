<?php
require_once ("../../../include/initialize.php");
	if(!isset($_SESSION['USERID'])){
	redirect(web_root."admin/index.php");
	
}

@$id = $_GET['id'];
if($id==''){
  redirect("index.php"); 
}
$announcement = New Announcement();
$res = $announcement->single_announcement($id);


$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doComment();
	break;
	
	// case 'reply' :
	// doReply();
	// break;

	case 'reply' :
	doReply();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'comment' :
		doComment();
		break;

	case 'photos' :
	doupdateimage();
	break;


}
   
	

	function doDelete(){
		
		global $mydb; 
	 
				$BLOGID = 	$_GET['id'];

				$annoucement = New Announcement();
	 		 	$annoucement->delete($BLOGID);

		 		$sql ="DELETE FROM `tblblogpost`  WHERE`BLOGID`='{$BLOGID}'";
				$mydb->setQuery($sql);
				$mydb->executeQuery();
			 
			message("Announcement has been removed!","info");
			redirect('index.php');
		 
		
	}

	 
	function doComment(){
		global $mydb; 
		if(isset($_POST['save'])){

			$id_announcement = $_POST['id_announcement'];
			$comment_text = $_POST['comment_text'];
			$comment_text = str_replace("'","\'",$comment_text);
			$notification_content = "".$_SESSION['NAME'] ." commented to your announcement. You can check and comment now.";
			$time = date('Y-m-d H:i:s');
			$recipient = "Administrator";


		if ($_POST['comment_text'] == "" )
		{
			$messageStats = false;
			message("Are you sure you want to leave without a comment","error");
			redirect('index.php');

		}else{	

					$comment = New Comment();
					$comment->announcement_id = $id_announcement;
					$comment->comment_text = $comment_text;
					$comment->comment_created_at = date("Y-m-d H:i:s");
					$comment->comment_status = 'unread'; 	
					$comment->who_commented = $_SESSION['USERID'];
					$comment->create();  

					$commentId = $comment->getLastInsertId();
			
					// Check if the announcement ID is retrieved successfully
					if ($commentId) {
						// Construct the SQL query to insert the notification
						$sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
								VALUES('{$commentId}','comment','{$notification_content}','unread','{$time}','{$recipient}', '{$_SESSION['NAME']}')";
						
						// Set the SQL query for execution
						$mydb->setQuery($sql2);
					
					message("Your comment has been posted successfully!", "success");
					redirect("index.php");
				}
				else {
					message("Error  notification!", "warning");
					redirect("index.php");
				}
				}
		}

	}

	function doReply(){
		global $mydb; 
		if(isset($_POST['save'])){
			$comment_id = $_POST['comment_id'];
			$reply_text = $_POST['reply_text'];
			$reply_text = str_replace("'","\'",$reply_text);
			$notification_content = " ".$_SESSION['NAME'] ." reply to your announcement. You can check and comment now.";
			$time = date('Y-m-d H:i:s');
			$recipient = "Administrator";

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

			$replytId = $reply->getLastInsertId();
	
			// Check if the announcement ID is retrieved successfully
			if ($replytId) {
				// Construct the SQL query to insert the notification
				$sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
						VALUES('{$replytId}','reply','{$notification_content}','unread','{$time}','{$recipient}', '{$_SESSION['NAME']}')";
				
				// Set the SQL query for execution
				$mydb->setQuery($sql2);
				
			message("Successfully replied!", "success");
			redirect("index.php");
			}
			else{
				message("there is an error with your action in replying", "Warning");
			redirect("index.php");
			}
			
		}
		}

	}
?>