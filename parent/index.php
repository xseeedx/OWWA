     <?php 
     require_once("../include/initialize.php");
          if (!isset($_SESSION['USERID'])){
          redirect(web_root."parent/login.php");
          } 

     $content='home.php';
     $view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
     switch ($view) {  
          default :
          $title = "Home";
          $conten = "home.php";
     }
     require_once("themes/templates.php");
     ?>