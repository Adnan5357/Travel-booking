<?php
include ('payment.html');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['send'])) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'notlazykid2293@gmail.com';
        $mail->Password   = 'thuv cnel jjdj bsss';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        $username    = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : 'N/A';
        $numPeople   = isset($_POST['people']) ? htmlspecialchars($_POST['people']) : 'N/A';
        $arrivalDate = isset($_POST['adate']) ? htmlspecialchars($_POST['adate']) : 'N/A';
        $departureDate = isset($_POST['ldate']) ? htmlspecialchars($_POST['ldate']) : 'N/A';
        $userEmail   = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : 'N/A';
        $subject     = isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : 'No Subject Provided';
        $message     = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : 'No message or details provided.';

        $mail->setFrom('notlazykid2293@gmail.com', 'Your Website Contact Form'); // This is your sending email

        // The email will now be sent TO the address the user entered in the 'email' field
        $mail->addAddress($userEmail, $username);

        if ($userEmail !== 'N/A') {
            // Keep a Reply-To address to the user's email so you can easily reply to them
            $mail->addAddress('notlazykid2293@gmail.com');
        }

        $mail->isHTML(true);

        $mail->Subject = 'Your Booking Request: ' . $subject;

        $emailBody = "
            <h2>New Travel Booking Request Submission</h2>
            <p><strong>Date of Submission:</strong> " . date("Y-m-d H:i:s") . "</p>
            <hr>
            <h3>Contact Information:</h3>
            <ul>
                <li><strong>Name:</strong> " . $username . "</li>
                <li><strong>Email:</strong> " . $userEmail . "</li>
                <li><strong>Subject:</strong> " . $subject . "</li>
            </ul>
            <h3>Travel Details:</h3>
            <ul>
                <li><strong>Number of People:</strong> " . $numPeople . "</li>
                <li><strong>Arrival Date:</strong> " . $arrivalDate . "</li>
                <li><strong>Departure Date:</strong> " . $departureDate . "</li>
            </ul>
            <h3>Message/Destination Details:</h3>
            <p>" . nl2br($message) . "</p>
            <hr>
            <small>This email was sent from the contact form on your website.</small>
        ";

        $mail->Body = $emailBody;

        if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
            $attachmentName = $_FILES['attachment']['name'];
            $attachmentPath = $_FILES['attachment']['tmp_name'];
            $mail->addAttachment($attachmentPath, $attachmentName);
        }

        $mail->send();

    } catch (Exception $e) {
        echo "Mail could not be sent. Mailer Error: " . $mail->ErrorInfo;
    }
} else {
    echo "Access Denied: Please submit the form from the contact page.";
}

?>
