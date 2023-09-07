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

		case 'photos' :
		doupdateimage();
		break;

	}
	
		function doInsert(){
			global $mydb; 
			if(isset($_POST['save'])){

				$autonum = new Autonumber();
				$id = $autonum->set_autonumber("BLOGID");
				$BLOGID = date("Y").$id->AUTO;

				$ANNOUNCEMENT_TEXT = $_POST['ANNOUNCEMENT_TEXT'];
				$ANNOUNCEMENT_WHAT = $_POST['ANNOUNCEMENT_WHAT']; 
				$ANNOUNCEMENT_WHEN = $_POST['ANNOUNCEMENT_WHEN']; 
				$ANNOUNCEMENT_WHERE = $_POST['ANNOUNCEMENT_WHERE'];


			if ($_POST['ANNOUNCEMENT_TEXT'] == "" OR $_POST['ANNOUNCEMENT_WHAT'] == "" ){
				$messageStats = false;
				message("All field is required!","error");
				redirect('index.php?view=add');
			}else{	

				$annoucement = New Announcement();
				$annoucement->ANNOUNCEMENTID 	= $BLOGID;
				$annoucement->ANNOUNCEMENT_TEXT = $ANNOUNCEMENT_TEXT;
				$annoucement->ANNOUNCEMENT_WHAT = $ANNOUNCEMENT_WHAT; 
				$annoucement->ANNOUNCEMENT_WHEN = $ANNOUNCEMENT_WHEN; 
				$annoucement->ANNOUNCEMENT_WHERE = $ANNOUNCEMENT_WHERE;
				$annoucement->DATEPOSTED 		 = date("Y-m-d H:i:s");
				$annoucement->create();  

				$sql ="INSERT INTO `tblblogpost` (`BLOGID`,`BLOGS`, `BLOG_WHAT`, `BLOG_WHEN`, `BLOG_WHERE`, `DATEPOSTED`, `CATEGORY`,`AUTHOR`) 
				VALUES('{$BLOGID}','{$ANNOUNCEMENT_TEXT}','{$ANNOUNCEMENT_WHAT}','{$ANNOUNCEMENT_WHEN}','{$ANNOUNCEMENT_WHERE}',NOW(),'ANNOUNCEMENT','".$_SESSION['NAME']."')";
				$mydb->setQuery($sql); 


				$sql = "SELECT * FROM tblstudent";
				$mydb->setQuery($sql);
				$cur = $mydb->loadResultList();
				foreach ($cur as $result) {
					# code...
					$IDNO = $result->IDNO;

					$sql ="INSERT INTO `tblstudentnotif` (`BLOGID`,`IDNO`,`TYPE`) 
					VALUES('{$BLOGID}','{$IDNO}','Announcement')";
					$mydb->setQuery($sql); 

					$contact = '+63'.substr($result->PHONE, 1);
					# code...
					$query = "INSERT INTO `messageout` (`Id`, `MessageTo`, `MessageFrom`, `MessageText`) 
					VALUES (Null, '".$contact."','Admin','You have notification from WVSU - ".$ANNOUNCEMENT_TEXT." - ".strip_tags($ANNOUNCEMENT_WHAT)." on ".strip_tags($ANNOUNCEMENT_WHEN)." @ ".strip_tags($ANNOUNCEMENT_WHERE)."')";
					$mydb->setQuery($query); 


				}
	

				$autonum = New Autonumber(); 
				$autonum->auto_update("BLOGID");

				message("Announcement has been posted successfully!", "success");
				redirect("index.php");
				
			}
			}

		}

		function doEdit(){

			global $mydb; 

		if(isset($_POST['save'])){  
				$BLOGID =$_POST['ANNOUNCEMENTID'];
				$ANNOUNCEMENT_TEXT = $_POST['ANNOUNCEMENT_TEXT'];
				$ANNOUNCEMENT_WHAT = $_POST['ANNOUNCEMENT_WHAT']; 
				$ANNOUNCEMENT_WHEN = $_POST['ANNOUNCEMENT_WHEN']; 
				$ANNOUNCEMENT_WHERE = $_POST['ANNOUNCEMENT_WHERE'];



				if ($_POST['ANNOUNCEMENT_TEXT'] == "" OR $_POST['ANNOUNCEMENT_WHAT'] == ""){
				$messageStats = false;
				message("All field is required!","error");
				redirect('index.php?view=add');
			}else{	

				$annoucement = New Announcement();
				$annoucement->ANNOUNCEMENT_TEXT = $ANNOUNCEMENT_TEXT;
				$annoucement->ANNOUNCEMENT_WHAT = $ANNOUNCEMENT_WHAT; 
				$annoucement->ANNOUNCEMENT_WHEN = $ANNOUNCEMENT_WHEN; 
				$annoucement->ANNOUNCEMENT_WHERE = $ANNOUNCEMENT_WHERE;
				$annoucement->update($BLOGID);  

				$sql ="UPDATE `tblblogpost` SET `BLOGS`='{$ANNOUNCEMENT_TEXT}', `BLOG_WHAT`='{$ANNOUNCEMENT_WHAT}', `BLOG_WHEN`='{$ANNOUNCEMENT_WHEN}', `BLOG_WHERE`='{$ANNOUNCEMENT_WHERE}'  WHERE`BLOGID`='{$BLOGID}'";
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


				message("Your comment has been posted successfully!", "success");
				redirect("index.php");
				
			}
			}

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
	?>