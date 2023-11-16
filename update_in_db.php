<?php
ob_start(); // Start output buffering to capture any unwanted output

require "connection.php";

$response = array(); // Initialize a response array

try {
    // Get data from POST request
    $firstName = mysqli_real_escape_string($conn, $_POST['editFirstName']);
    $middleName = mysqli_real_escape_string($conn, $_POST['editMiddleName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['editLastName']);
    $instituteName = mysqli_real_escape_string($conn, $_POST['editInstituteName']);
    $documentType = mysqli_real_escape_string($conn, $_POST['editDocumentType']);
    $fileIdentifier = mysqli_real_escape_string($conn, $_POST['editFileIdentifier']);
    $editDocument = mysqli_real_escape_string($conn, $_POST['editDocument']);
    $userEmail = mysqli_real_escape_string($conn, $_POST['editUserEmail']);

    // Get the uploaded file name
    $target_file = basename($_FILES["editDocument"]["name"]);

    // Check if fileIdentifier already exists
    $checkSql = "SELECT * FROM `inistitutefiles` WHERE `fileidentifier`='$fileIdentifier'";
    $result = $conn->query($checkSql);

    if ($result->num_rows > 0) {
        // Update existing record
        $sql = "UPDATE `inistitutefiles` SET
                `firstname`='$firstName',
                `middlename`='$middleName',
                `lastname`='$lastName',
                `inistitutename`='$instituteName',
                `documenttype`='$documentType',
                `fileidentifier`='$fileIdentifier',
                `document`='$target_file',
                `useremail`='$userEmail'
                WHERE `fileidentifier`='$fileIdentifier'";

        if ($conn->query($sql) !== TRUE) {
            throw new Exception("Error updating record: " . $conn->error);
        }

        $response['success'] = true;
        $response['data'] = array(
            'firstname' => $firstName,
            'middlename' => $middleName,
            'lastname' => $lastName,
            'inistitutename' => $instituteName,
            'documenttype' => $documentType,
            'fileidentifier' => $fileIdentifier,
            'document' => $target_file,
            'useremail' => $userEmail
        );
    } else {
        throw new Exception("No record found with file identifier: " . $fileIdentifier);
    }

} catch (Exception $e) {
    $response['success'] = false;
    $response['error'] = $e->getMessage();
} finally {
    ob_end_clean(); // Clean (discard) the output buffer
    $conn->close();
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
