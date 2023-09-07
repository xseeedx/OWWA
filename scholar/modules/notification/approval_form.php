<?php  
    // @$user_id = $_GET['id'];

    // if ($user_id == '') {
    //     redirect("index.php");
    // }

    // $student = new Student();
    // $singlestudent = $student->single_students($user_id);

    $id = $_SESSION['USERID'];
 
    $user = New User ();
    $acc = $user->single_user($id);

?>
<!-- 
<style type="text/css">
    .sidebar-left .main {
        float: right;
    }

    .sidebar-left .sidebar {
        float: left;
    }

    .sidebar-right .main {
        float: left;
    }

    .sidebar-right .sidebar {
        float: right;
    }
</style>

<form class="form-horizontal span6" action="controller.php?action=approve" method="POST">
    <div class="row">
        <div class="col-lg-12">
            <h3>Approval Form</h3>
        </div>

    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="bmd-label-floating">First Name:</label>
                <input class="form-control input-sm" type="text" value="<?php echo $singlestudent->firstname; ?>" readonly>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <button class="btn btn-success btn-floating" name="approve" type="submit">Approve</button>
        </div>
        <div class="col-md-2">
            <button class="btn btn-danger btn-floating" name="reject" type="submit">Reject</button>
        </div>
    </div>
</form> -->
<!-- request_form.php --><!-- approval_form.php -->

<?php   
                                  
                                  // $mydb->setQuery("SELECT * 
                                      // 			FROM  `tblusers` WHERE TYPE != 'Customer'");

                                      $user = $_SESSION['USERID'];
                                  $mydb->setQuery("SELECT * 
                                            FROM  `scholar_info` where user_id = $user");
                                  $cur = $mydb->loadResultList();

                                  foreach ($cur as $result) {
                            
?>
        

    <form method="POST">
        <input type="hidden" name="scholar_id" value="<?php echo $user->user_id?>">
        <button type="submit" name="approve">Approve</button>
        <button type="submit" name="reject">Reject</button>
    </form>
</body>
</html>

<?php }?>
