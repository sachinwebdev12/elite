<?php
$servername = "localhost";
$username = "sql_elitefitxdub";
$password = "2c99ed0c5e7df8";
$dbname = "sql_elitefitxdub";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$contact_name = $_POST['name'];
$contact_email = $_POST['email'];
$contact_phone = $_POST['phone'];


$stmt = $conn->prepare("INSERT INTO contact_us (contact_name, contact_email, contact_phone) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $contact_name, $contact_email, $contact_phone); 


if ($stmt->execute()) {
    // $to = "tushar@opulixdigital.com";
    $to = "info@elitefitxdubaidatesnutrition.com";
    $email_subject = "Contact Us Form Elite Website";
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: noreply@elitefitxdubaidatesnutrition.com" . "\r\n";
    $headers .= "Reply-To: " . $contact_email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    $email_body = "<html>
                    <head>
                        <title>Contact Us Form Elite Website</title>
                    </head>
                    <body>
                        <h6>You have received a new message from your elite website contact form.</h6>
                        <p>Here are the details:</p>
                            <p>Name: $contact_name,<br>
                            Email: $contact_email,<br>
                            Phone: $contact_phone
                            </p>
                        </body>
                    </html>
    ";     
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "success";
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';


// $servername = "localhost";
// $username = "sql_elitefitxdub";
// $password = "2c99ed0c5e7df8";
// $dbname = "sql_elitefitxdub";


// $conn = new mysqli($servername, $username, $password, $dbname);


// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }


// $contact_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
// $contact_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
// $contact_phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);


// if (!filter_var($contact_email, FILTER_VALIDATE_EMAIL)) {
//     die("Invalid email format");
// }


// $stmt = $conn->prepare("INSERT INTO contact_us (contact_name, contact_email, contact_phone) VALUES (?, ?, ?)");
// $stmt->bind_param("sss", $contact_name, $contact_email, $contact_phone);


//     if ($stmt->execute()) {
//         $to = "tushar@opulixdigital.com";
//         $email_subject = "Contact Us Form Elite Website";
    
//         $mail = new PHPMailer(true);
    
//         try {
            
//             $mail->SMTPDebug = SMTP::DEBUG_OFF; // Disable debug output for production
//             $mail->isSMTP();
//             $mail->Host = 'smtp.gmail.com';
//             $mail->SMTPAuth = true;
//             $mail->Username = 'tushar@opulixdigital.com'; // Use environment variables or secure storage for sensitive information
//             $mail->Password = 'tushar@7881'; // Use environment variables or secure storage for sensitive information
//             $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//             $mail->Port = 587;
    
//             // Recipients
//             $mail->setFrom('noreply@elitefitxdubaidatesnutrition.com', 'Elite Fitx Dubai');
//             $mail->addAddress($to);
//             $mail->addReplyTo($contact_email, $contact_name);
    
//             // Content
//             $mail->isHTML(true);
//             $mail->Subject = $email_subject;
//             $mail->Body = "
//                 <html>
//                 <head>
//                     <title>Contact Us Form Elite Website</title>
//                 </head>
//                 <body>
//                     <h1>You have received a new message from your website contact form.</h1>
//                     <p>Here are the details:</p>
//                     <p>Name: $contact_name<br>
//                     Email: $contact_email<br>
//                     Phone: $contact_phone</p>
//                 </body>
//                 </html>";
//             $mail->AltBody = "You have received a new message from your website contact form.\n\n" .
//                              "Here are the details:\n" .
//                              "Name: $contact_name\n" .
//                              "Email: $contact_email\n" .
//                              "Phone: $contact_phone\n\n";
    
//             $mail->send();
//             echo 'Message has been sent';
//         } catch (Exception $e) {
//             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//         }
//     } else {
//         echo "Error: " . $stmt->error;
//     }
    
//     // Close statement and connection
//     $stmt->close();
//     $conn->close();
?>