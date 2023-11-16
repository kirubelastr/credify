<?php
require "connection.php";

$response = array(); // Initialize a response array

try {
    $sql = "SELECT * FROM `inistitutefiles`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $response['success'] = true;
        $response['data'] = array();

        while($row = $result->fetch_assoc()) {
            $response['data'][] = $row;
        }
    } else {
        throw new Exception("No data found");
    }

} catch (Exception $e) {
    $response['success'] = false;
    $response['error'] = $e->getMessage();
} finally {
    $conn->close();
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
