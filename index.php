 <?php
require_once ("include/initialize.php"); 
if (!isset($_SESSION['IDNO'])) {
  redirect("login.php");
}

$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';

switch ($view) { 
    
  case 'blog' :
     $title="Blog";  
    $content='single-blog.php';   
    break; 

   case 'profile' :
     $title="Blog";  
    $content='modstudent/profile.php';   
    break; 

 
  default :
    $content='home.php';
   //    $title="Home"; 
    // $content ='home.php';  
    // redirect("modstudent/") ;
}
require_once("themes/templates.php");
?>

