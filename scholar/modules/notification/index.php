	<?php
	require_once("../../../include/initialize.php");
	if(!isset($_SESSION['USERID'])){
		redirect(web_root."admin/index.php");
	}



	$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
	$title="Notification"; 
	$header=$view; 
	switch ($view) {
		case 'list' :
			$content    = 'list.php';		
			break;

		case 'add' :
			$content    = 'add.php';		
			break;

		case 'edit' :
			$content    = 'edit.php';		
			break;
		case 'view' :
			$content    = 'get_notification_details.php';		
			break;

		case 'reply' :
			$content    = 'add.php';		
			break;

		case 'approve' :
			$content    = 'approval_form.php';		
			break;
	
		default :
			$content    = 'list.php';		
	}
	require_once("../../themes/templates.php");
	?>
	
