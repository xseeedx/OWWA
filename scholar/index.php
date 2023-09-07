     <?php 
     require_once("../include/initialize.php");
          if (!isset($_SESSION['USERID'])){
          redirect(web_root."login.php");
          } 
          // if($_SESSION['loginTo']=='scholar') {
          //      redirect(web_root."scholar/index.php");
          //   }
          
     $content='home.php';
     $view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
     switch ($view) {  
          default :
          $title = "Home";
          $content = "home.php";
     }
     require_once("themes/templates.php");
     ?>