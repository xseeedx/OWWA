
<?php
require_once ("../../../include/initialize.php");
// Include your necessary database connection and configuration files
// ...

if (isset($_GET['id'])) {
    global $mydb;
  // Get the id from the URL parameter
    $id = $_GET['id'];

            $mydb->setQuery("SELECT * FROM `notification` WHERE notification_for = 'Administrator' AND notification_status = 'unread'");
            $cur = $mydb->loadResultList();

            foreach ($cur as $notification) {
                if ($notification->notification_type == "Document" or $notification->notification_type == "request"){       
                            // Perform the database update to set the notification status as 'read'
                            // Insert your database connection and update logic here
                            // ...
                            $sql = "UPDATE `notification` SET `notification_status` = 'read' WHERE `notification_id` = $id";
                            // Assuming you have a database connection established, you can execute the query
                                $mydb->setQuery($sql);
                            //   $mydb->executeQuery();
                            // Return a success message or appropriate response
                            echo "Notification status updated successfully!";
                        }
        }
    }        
 else {
                    // Return an error message or appropriate response
echo "Invalid request";
}
?>
