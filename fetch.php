<?php
session_start();
$user='root';
$pass='';
// Database connection
$dbh = new PDO('mysql:host=localhost;dbname=authentication', $user, $pass);

// Get form inputs
$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['lastName'];
$inistname = $_POST['inistname'];
$doctype = $_POST['doctype'];
$filenumber = $_POST['filenumber'];

// Prepare and execute the query
$stmt = $dbh->prepare("SELECT document FROM inistitutefiles WHERE firstName = :firstName AND middleName = :middleName AND lastName = :lastName AND inistitutename = :inistname AND documenttype = :doctype AND fileidentifier = :filenumber");
$stmt->execute(['firstName' => $firstName, 'middleName' => $middleName, 'lastName' => $lastName, 'inistname' => $inistname, 'doctype' => $doctype, 'filenumber' => $filenumber]);

// Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if($result){
    $_SESSION['document'] = $result['document'];
      
    echo $result['document'];
} else {
    echo 0;
}
?>
<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'user@example.com';                 // SMTP username
$mail->Password = 'secret';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('from@example.com', 'Mailer');
$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}