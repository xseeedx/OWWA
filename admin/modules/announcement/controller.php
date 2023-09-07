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

	case 'comment' :
	doComment();
	break;

	}
   
	// function doInsert(){
    // global $mydb;
    // if (isset($_POST['save'])) {
    //     // $autonum = new Autonumber();
    //     // $id = $autonum->set_autonumber("id_announcement");
    //     $stat = "Approved";
    //     $announcement_desc = $_POST['announcement_desc'];
	// 	$announcement_desc = str_replace("'","\'",$announcement_desc);
	// 	$notification_content = "The Admin posted a new announcement. You can check and comment now.";
	// 	$recipient = $_POST['Recipient'];
	// 	$time = date('Y-m-d H:i:s');
	


    //     if ($_POST['announcement_desc'] == "") {
    //         message("Please insert announcement!", "error");
    //         redirect('index.php?view=add');

    //     } else {

	// 		$annoucement = New Announcement();
	// 		$annoucement->announcement_desc = $announcement_desc; 
	// 		$annoucement->date_posted  = date("Y-m-d H:i:s");
	// 		$annoucement->author = $_SESSION['NAME'];
	// 		$annoucement->announcement_stat = $stat;
	// 		$annoucement->create();  



	// 		// Use the $notificationId in subsequent queries

	// 		$sql2 ="INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
	// 		VALUES('{$notificationId}','notification','{$notification_content}','unread','{$time}','{$recipient}', '{$_SESSION['NAME']}')";
	// 		$mydb->setQuery($sql2);
	// 		// $mydb->executeQuery();
	
	function doInsert(){
		global $mydb;
		if (isset($_POST['save'])) {
			$stat = "Approved";
			    $announcement_desc = $_POST['announcement_desc'];
				$announcement_desc = str_replace("'","\'",$announcement_desc);
				$notification_content = "The Admin posted a new announcement. You can check and comment now.";
				$recipient = $_POST['Recipient'];
				$time = date('Y-m-d H:i:s');
			

			if ($_POST['announcement_desc'] == "") {
				message("Please insert announcement!", "error");
				redirect('index.php?view=add');
			} else {
	
				// Create a new instance of the Announcement class
				$annoucement = new Announcement();
	
				// Set the properties of the announcement object
				$annoucement->announcement_desc = $announcement_desc;
				$annoucement->date_posted  = date("Y-m-d H:i:s");
				$annoucement->author = $_SESSION['NAME'];
				$annoucement->announcement_stat = $stat;
	
				// Call the create() method to insert the announcement into the database
				$annoucement->create();
	
				// Get the ID of the just inserted announcement
				$announcementId = $annoucement->getLastInsertId();
	
				// Check if the announcement ID is retrieved successfully
				if ($announcementId) {
					// Construct the SQL query to insert the notification
					$sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
							VALUES('{$announcementId}','announcement','{$notification_content}','unread','{$time}','{$recipient}', '{$_SESSION['NAME']}')";
					
					// Set the SQL query for execution
					$mydb->setQuery($sql2);
	
					// Execute the query to insert the notification
					// $mydb->executeQuery();

					
					$subject = "OWWA Announcement Update";
					$headers  = "From: " . strip_tags('owwaspom@gmail.com
					') . "\r\n";
					$headers .= "Reply-To: " . strip_tags('mamanaoelcid@gmail.com') . "\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
					$msg = '
				
					<div style="background-color: #f0f0f0; border: 1px solid #cccccc; padding: 20px; width: 800px; margin: 0 auto; text-align:center;">
						<h2>Overseas Workers Welfare Administration Online Monitoring System </h2>
						</div>
					
					<div style="background-color: #f0f0f0; border: 1px solid #cccccc; padding: 20px; width: 800px; margin: 0 auto;">
						<h2>New Announcement!</h2>
						<p>Dear User,</p>
						<p>We are pleased to inform you that a new announcement has been posted on the OWWA Online Monitoring System.</p>
						<p>Stay updated with the latest information and important updates by logging into your account.</p>
						<p>Click the button below to access the system:</p>
						<p><a class="btn" href="http://localhost/OWWASPOM/login.php">Login to OWWA Monitoring System</a></p>
						<p>If you have any questions or need further assistance, please dont hesitate to contact our support team.</p>
						<p>Best regards,</p>
						<p>The OWWA Online Monitoring System Team</p>
					</div>
					
					</div>
					</body>
					</html>
					';
						mail('mamanaoelcid@gmail.com',$subject,$msg,$headers);
						message("Announcement has been posted successfully!", "success");
						redirect("index.php");

				
					}
				}
			}
	}

	function doEdit(){

		global $mydb; 

	if(isset($_POST['save'])){  

		$BLOGID = $_POST['id_announcement'];
		$announcement_desc = $_POST['announcement_desc'];
		$announcement_desc = str_replace("'","\'",$announcement_desc);
		$stat = "Approved";

		if ($_POST['announcement_desc'] == ""){
		$messageStats = false;
		message("Required to edit!","error");
		redirect('index.php?view=add');
		}else{	
			

			$annoucement = New Announcement();	 
			$annoucement->announcement_desc = $announcement_desc; 
			$annoucement->announcement_stat = $stat; 
			$annoucement->update($BLOGID);  

			$sql ="UPDATE `announcement` SET `announcement_desc`='{$announcement_desc}'  WHERE`id_announcement`='{$BLOGID}'";
			$mydb->setQuery($sql);
			$mydb->executeQuery();

			  message("Announcement has been updated!", "success");
			redirect("index.php");
			 
			}
		}
	}


	function doDelete(){
		
		global $mydb; 
	 
				$BLOGID = 	$_GET['id'];
				$stat = "hidden";

				$annoucement = New Announcement();
				$annoucement->announcement_stat = $stat; 
	 		 	$annoucement->update($BLOGID);

		 		// $sql ="DELETE FROM `announcement`  WHERE`id_announcement`='{$BLOGID}'";
				$sql ="UPDATE `announcement` SET `announcement_stat`='{$stat}'  WHERE`id_announcement`='{$BLOGID}'";
				$mydb->setQuery($sql);
				$mydb->executeQuery();
			 
			message("Announcement has been removed!","info");
			redirect('index.php');
		 
		
	}

	function doReply(){
		global $mydb; 
		if(isset($_POST['reply'])){
			$comment_id = $_POST['comment_id'];
			$reply_text = $_POST['reply_text'];
			$reply_text = str_replace("'","\'",$reply_text);
			$notification_content = "The Admin replied to a comment. You can check and comment now.";
			

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
						VALUES('{$replytId}','reply','{$notification_content}','unread','{$time}','Scholar', '{$_SESSION['NAME']}')";
				
				// Set the SQL query for execution
				$mydb->setQuery($sql2);
				
			message("Successfully replied!", "success");
			redirect("index.php");
			}
			
		}
		}

	}
	function doComment(){
		global $mydb; 
		if(isset($_POST['save'])){
			$id_announcement = $_POST['id_announcement'];
			$comment_text = $_POST['comment_text'];
			$comment_text = str_replace("'","\'",$comment_text);
			$notification_content = "The Admin added a new comment. You can check and comment now.";
			$recipient = "Scholar";
			$time = date('Y-m-d H:i:s');
			

		if ($_POST['comment_text'] == "" ){
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
			
		}
		}

	}
 
?>