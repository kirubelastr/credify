<?php
session_start();
// Include database connection code here
include('connection.php'); // Assuming you have a separate file for database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if signup form was submitted
    if (isset($_POST['signup'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
        $role = trim($_POST['role']);
        
        // Additional fields for company
        $companyname = '';
        $subscription = '';
        $paymentMethod = '';
        $accountNumber = '';

        if ($role == 'company') {
            $companyname = trim($_POST['companyname']);
            $subscription = trim($_POST['subscription']);
            $paymentMethod = trim($_POST['paymentMethod']);
            $accountNumber = trim($_POST['accountNumber']);
        }

        // Rest of your code...

        // Prepare the SQL statement
        if ($role == 'company') {
            $stmt = $conn->prepare("INSERT INTO login_auth (email, password, role, companyname, subscription, paymentMethod, accountnumber) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $email, $hashed_password, $role, $companyname, $subscription, $paymentMethod, $accountNumber);
        } else {
            $stmt = $conn->prepare("INSERT INTO login_auth (email, password, role) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $email, $hashed_password, $role);
        }

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Account created successfully!'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('ERROR: Could not create account.'); window.location.href='login.php';</script>";
        }
    }
}
mysqli_close($conn);

?>
