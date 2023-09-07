     <?php 
     require_once("../include/initialize.php");
          if (!isset($_SESSION['USERID'])){
          redirect(web_root."staff/login.php");
          } 

     $content='home.php';
     $view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
     switch ($view) {  
          default :
          $title = "Dashboard";
          $conten = "home.php";
     }
     require_once("themes/templates.php");
     ?>