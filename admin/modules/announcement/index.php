	<?php
	require_once("../../../include/initialize.php");
	if (!isset($_SESSION['USERID'])){
		redirect(web_root."login.php");
	   } 
	   $_SESSION['loginTo'];

	   if($_SESSION['loginTo']=='admin') {
		  
		 }
		 else {
		   redirect(web_root."login.php?logout=1");
		 }

	$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
	$title="Announcement Viewing"; 
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
			$content    = 'view.php';		
			break;

			case 'reply' :
				$content    = 'add.php';		
				break;

				case 'comment' :
					$content    = 'add.php';		
					break;

		default :
			$content    = 'list.php';		
	}
	require_once("../../themes/templates.php");
	?>
	
