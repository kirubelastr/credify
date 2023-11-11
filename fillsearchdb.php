<?php
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname = trim(filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING));
    $middlename = trim(filter_input(INPUT_POST, 'middleName', FILTER_SANITIZE_STRING));
    $lastname = trim(filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING));
    $inistitutename = trim(filter_input(INPUT_POST, 'inistname', FILTER_SANITIZE_STRING));
    $fileidentifier = trim(filter_input(INPUT_POST, 'filenumber', FILTER_SANITIZE_STRING));
    $documenttype = trim(filter_input(INPUT_POST, 'doctype', FILTER_SANITIZE_STRING));

    // Check if file exists in the database
    $sql = "SELECT document FROM inistitutefiles WHERE firstname = ? AND middlename = ? AND lastname = ? AND inistitutename = ? AND documenttype = ? AND fileidentifier = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $middlename, $lastname, $inistitutename, $documenttype, $fileidentifier);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $documentPath = $row['document']; // Get the document path from the row

            // Display the document
            echo '<embed type="application/pdf" src="' . $documentPath . '" width="900" height="500">';
        } else {
            echo 'No document found. Please ensure that you have entered the correct details.';
        }
    } else {
        echo 'Database query error: ' . mysqli_error($conn);
    }
} else {
    echo 'Invalid request method.';
}
?>
