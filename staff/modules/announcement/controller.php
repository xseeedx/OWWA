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

	case 'photos' :
	doupdateimage();
	break;

	}
   
	function doInsert(){
    global $mydb;
    if (isset($_POST['save'])) {
        // $autonum = new Autonumber();
        // $id = $autonum->set_autonumber("id_announcement");
        $stat = "Approved";
        $announcement_desc = $_POST['announcement_desc'];
		$announcement_desc = str_replace("'","\'",$announcement_desc);

        if ($_POST['announcement_desc'] == "") {
            message("Please insert announcement!", "error");
            redirect('index.php?view=add');

        } else {

			$annoucement = New Announcement();
			$annoucement->announcement_desc = $announcement_desc; 
			$annoucement->date_posted  = date("Y-m-d H:i:s");
			$annoucement->announcement_stat = $stat;
			$annoucement->create();  
			
            // $sql = "INSERT INTO `announcement` ( announcement_desc, date_posted, message_stat, author) 
            //     VALUES('$announcement_desc', NOW(), '$stat', '".$_SESSION['NAME']."')";
            // $mydb->setQuery($sql);
            // $mydb->executeQuery();

            // $autonum = new Autonumber();
            // $autonum->auto_update("BLOGID");

            message("Announcement has been posted successfully!", "success");
            redirect("index.php");
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

	 
 
?>