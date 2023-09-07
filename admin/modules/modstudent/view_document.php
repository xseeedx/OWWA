<?php
	require_once ("../../../include/initialize.php");
// Check if the file_id parameter is set in the URL
if (isset($_GET['file_id'])) {
    global $mydb;
    // Get the file ID from the URL parameter
    $file_id = $_GET['file_id'];

    // Validate the file_id (you can add further validation as per your requirement)
    // For example, check if the file_id is numeric and exists in the database

    // Get the file information from the database (replace this with your database retrieval logic)
    $mydb->setQuery("SELECT * FROM `upload_documents` WHERE document_id = $file_id");
    $file = $mydb->loadSingleResult(); // Assuming this method returns a single record

    if ($file) {
        // Set the appropriate headers for displaying the file
        header('Content-Type: ' . $file->document_type);
        header('Content-Disposition: inline; filename="' . $file->document_name . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../scholars_document/ODSP/' . $file->document_name)); // Replace this with your actual file path

        // Read and output the file content
        readfile('../uploads/' . $file->document_name); // Replace this with your actual file path
        exit;
    } else {
        // File not found, handle the error (e.g., show an error message)
        echo 'File not found.';
        exit;
    }
} else {
    // File ID parameter not set, handle the error (e.g., redirect to an error page)
    echo 'Invalid file request.';
    exit;
}
?>
