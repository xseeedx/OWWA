<?php
    session_start();

    // Check if the edit confirmation data exists in the session
    if (isset($_SESSION['edit_confirmation'])) {
        // Retrieve the stored values from session
        $editConfirmationData = $_SESSION['edit_confirmation'];

        // Access the individual data
        $scholar_id = $editConfirmationData['scholar_id'];
        $firstname = $editConfirmationData['firstname'];
        $middlename = $editConfirmationData['middlename'];
        $lastname = $editConfirmationData['lastname'];
        // Retrieve other data as needed

        // Perform the update process or any other necessary actions

        // Clear the session variable after use
        unset($_SESSION['edit_confirmation']);
    } else {
        // Redirect the user to the edit form if the confirmation data is not available
        header("Location: edit_form.php");
        exit();
    }
?>

<!-- Display the confirmation message or perform other actions -->

<h2>Edit Confirmation</h2>
<p>Scholar ID: <?php echo $scholar_id; ?></p>
<p>First Name: <?php echo $firstname; ?></p>
<p>Middle Name: <?php echo $middlename; ?></p>
<p>Last Name: <?php echo $lastname; ?></p>
<!-- Display other data as needed -->





