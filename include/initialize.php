<?php
//define the core paths
//Define them as absolute peths to make sure that require_once works as expected

//DIRECTORY_SEPARATOR is a PHP Pre-defined constants:
//(\ for windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define ('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].DS.'OWWASPOM');

defined('LIB_PATH') ? null : define ('LIB_PATH',SITE_ROOT.DS.'include');

//load the database configuration first.
// require_once(LIB_PATH.DS."login.php");
require_once(LIB_PATH.DS."config.php");
require_once(LIB_PATH.DS."function.php");
require_once(LIB_PATH.DS."session.php");
require_once(LIB_PATH.DS."accounts.php");
require_once(LIB_PATH.DS."students.php");
require_once(LIB_PATH.DS."parents.php");
// require_once(LIB_PATH.DS."workstats.php");
// require_once(LIB_PATH.DS."courses.php");
require_once(LIB_PATH.DS."documents.php");
// require_once(LIB_PATH.DS."departments.php"); 
require_once(LIB_PATH.DS."announcements.php");
// require_once(LIB_PATH.DS."events.php");
require_once(LIB_PATH.DS."comments.php");
require_once(LIB_PATH.DS."replies.php");
require_once(LIB_PATH.DS."request.php");
require_once(LIB_PATH.DS."createfolder.php");
// require_once(LIB_PATH.DS."customers.php");
// require_once(LIB_PATH.DS."orders.php");
// require_once(LIB_PATH.DS."branches.php");
// require_once(LIB_PATH.DS."autonumbers.php");
// require_once(LIB_PATH.DS."payments.php");
// require_once(LIB_PATH.DS."settings.php");
// require_once(LIB_PATH.DS."paginationproducts.php");
//load the database connection
require_once(LIB_PATH.DS."database.php");
?>
