<?php
ob_start(); // Start output buffering to capture any unwanted output

require "connection.php";

$response = array(); // Initialize a response array

try {
    // Get data from POST request
    $firstName = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middleName = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastname']);
    $instituteName = mysqli_real_escape_string($conn, $_POST['inistitutename']);
    $documentType = mysqli_real_escape_string($conn, $_POST['documenttype']);
    $fileIdentifier = mysqli_real_escape_string($conn, $_POST['fileidentifier']);
    $userEmail = mysqli_real_escape_string($conn, $_POST['useremail']);

    // Get the uploaded file name
    $target_file = basename($_FILES["document"]["name"]);

    // Insert data into database
    $sql = "INSERT INTO `inistitutefiles`(`firstname`, `middlename`, `lastname`, `inistitutename`, `documenttype`, `fileidentifier`, `document`, `useremail`) 
            VALUES ('$firstName','$middleName','$lastName','$instituteName','$documentType','$fileIdentifier','$target_file','$userEmail')";

    if ($conn->query($sql) !== TRUE) {
        throw new Exception("Error: " . $sql . "<br>" . $conn->error);
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