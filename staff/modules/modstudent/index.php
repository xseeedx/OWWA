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

		case 'edit' :
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
	
