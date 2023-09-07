<?php
require_once("../../../include/initialize.php");
    session_start();

    // Check if the form has been submitted
    if (isset($_POST['save'])) {
        // Store the form data in the session
        $_SESSION['edit_confirmation'] = array(
            'scholar_id' => $_POST['scholar_id'],
            'firstname' => $_POST['firstname'],
            'middlename' => $_POST['middlename'],
            'lastname' => $_POST['lastname']
            // Add more data as needed
        );

        // Redirect to the edit confirmation page
        header("Location: edit_confirmation.php");
        exit();

        $id = $_SESSION['USERID'];
 
                        $user = New User ();
                        $acc = $user->single_user($id);
    }

    $user = $_SESSION['USERID'];
    $mydb->setQuery("SELECT * FROM  `scholar_info` where user_id = $acc");
    $cur = $mydb->loadResultList();

    foreach ($cur as $result) {

?>

<!-- Your edit form HTML code -->

<form action="edit_form.php" method="POST">
    <!-- Input fields and other form elements -->
    <!-- <form action="edit_confirmation.php" method="POST"> -->
    <input type="hidden" name="scholar_id" value="<?php echo $scholar_id; ?>">

    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $result->firstname; ?>">
    </div>

    <div class="form-group">
        <label for="middlename">Middle Name</label>
        <input type="text" class="form-control" id="middlename" name="middlename" value="<?php echo $result->middlename; ?>" >
    </div>

    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $result->lastname; ?>" >
    </div>

    <!-- Add more input fields for other form elements -->
<!-- 
    <button type="submit" class="btn btn-primary" name="save">Save Changes</button>
</form> -->

    <button type="submit" class="btn btn-primary" name="save">Save Changes</button>
</form>
<?php } ?>