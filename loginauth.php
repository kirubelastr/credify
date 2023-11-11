<?php
session_start();
include('connection.php'); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $email = trim($_POST['loginEmail']);
        $password = trim($_POST['loginPassword']);
        $stmt = $conn->prepare("SELECT * FROM login_auth WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashed_password_from_database = $row['password'];
            $role = $row['role'];
    
            if (password_verify($password, $hashed_password_from_database)) {
                $_SESSION['login_user'] = $email;
                if ($role === 'admin') {
                    header("Location: admin_dashboard.php");
                } elseif ($role === 'company') {
                    header("Location: companyindex.php");
                } elseif ($role === 'institute') {
                    header("Location: institute.html");  
                } else {
                    header("Location: user.php");
                }
                exit;
            } else {
                echo "<script>alert('Invalid password.'); window.location.href='login.php';</script>";
            }
        } else {
            echo "<script>alert('Invalid email.'); window.location.href='login.php';</script>";
        }
    }
}


mysqli_close($conn);
?>
