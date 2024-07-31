<?php
// Database configuration
$servername = "localhost";
$username = "sql_elitefitxdub";
$password = "2c99ed0c5e7df8"; // Use a secure method to handle passwords
$dbname = "sql_elitefitxdub"; // Your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$contact_email = $_POST['email'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO contact_us (contact_email) VALUES (?)");
$stmt->bind_param("s", $contact_email); // 'sss' as there are three string parameters

if ($stmt->execute()) {
    
    $to = "info@elitefitxdubaidatesnutrition.com";
    // $to = "tushar@opulixdigital.com";
    $email_subject = "Subscribe Form Elite Website";
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: noreply@elitefitxdubaidatesnutrition.com" . "\r\n";
    $headers .= "Reply-To: " . $contact_email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    $email_body = "<html>
                    <head>
                        <title>Subscribe Form Elite Website</title>
                    </head>
                    <body>
                        <h6>You have received a new message from your elite subscribe form.</h6>
                        <p>Here are the details:</p>
                            Email: $contact_email
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
?>