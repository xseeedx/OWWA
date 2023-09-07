	<?php
	require_once("../../../include/initialize.php");
	//checkAdmin();
		# code...
	if(!isset($_SESSION['USERID'])){
		redirect(web_root."admin/index.php");
	}

	$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';


	$title ="Scholars";
		switch ($view) {

		case 'list' :
			$content    = 'list.php';		
			break;

		case 'add' :
			$content    = 'add.php';		
			break;

		case 'add1' :
		$content    = 'add1.php';		
			break;
		
		case 'editme' :
			$content    = 'edit.php';		
			break;

		case 'editfam' :
			$content    = 'edit2.php';		
			break;
	
		case 'edited' :
			$content    = 'edit3.php';		
			break;

		case 'editapp' :
			$content    = 'edit4.php';		
			break;
			

		case 'approval_edit_personal_info' :
			$content    = 'approval_edit_info.php';		
			break;
		
		case 'approval_fam_info' :
			$content    = 'approval_fam_info.php';		
			break;
		
		case 'approval_educational_info' :
			$content    = 'approval_educational_info.php';		
			break;
		
		case 'approval_scholarship_application' :
			$content    = 'approval_scholarship_application.php';		
			break;



		case 'view' :
			$content    = 'view.php';
			break;

		case 'testedit' :
			$content    = 'testedit.php';
			break;

		default :
			$content    = 'list.php';
		}


	require_once("../../themes/templates.php");
	?>
	
