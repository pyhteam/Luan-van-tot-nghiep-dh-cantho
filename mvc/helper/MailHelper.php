<?php
namespace Helper;

require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendMail
{
    private $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);
        $this->initializeMailer();
    }

    private function initializeMailer()
    {
        // Set mailer to use SMTP
        $this->mailer->isSMTP();

        // Enable debugging
        $this->mailer->SMTPDebug = 0;

        // Set the SMTP server and credentials
        $this->mailer->Host = 'smtp.office365.com';
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = 'pyhteam.solutions@hotmail.com';
        $this->mailer->Password = 'TubXyaas9x@';
        $this->mailer->SMTPSecure = 'tls';
        $this->mailer->Port = 587;
        $this->mailer->CharSet = 'UTF-8';

        // Set the 'from' address and name
        $this->mailer->setFrom('pyhteam.solutions@hotmail.com', 'Đại Học Cần Thơ');
    }

    public function sendEmail($to, $subject, $body, $isHTML = true)
    {
        try {
            // Add a recipient
            $this->mailer->addAddress($to);

            // Set email format (HTML or plain text)
            $this->mailer->isHTML($isHTML);

            // Set the subject
            $this->mailer->Subject = $subject;

            // Set the body
            $this->mailer->Body = $body;

            // Send the email
            $this->mailer->send();

            return true;
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$this->mailer->ErrorInfo}";
        }
    }

    public function sendEmailWithTemplate($to, $subject, $templatePath, $templateData)
    {
        try {
            // Add a recipient
            $this->mailer->addAddress($to);

            // Set email format to HTML
            $this->mailer->isHTML(true);

            // Set the subject
            $this->mailer->Subject = $subject;

            // Load the template file
            $templateContent = file_get_contents($templatePath);

            // Replace template placeholders with actual data
            foreach ($templateData as $placeholder => $value) {
                $templateContent = str_replace("{{ $placeholder }}", $value, $templateContent);
            }

            // Set the body with the template content
            $this->mailer->Body = $templateContent;

            // Send the email
            $this->mailer->send();

            return true;
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$this->mailer->ErrorInfo}";
        }
    }
}

// Example usage with HTML template
// $sendMail = new SendMail();
// $to = 'recipient@example.com';
// $subject = 'Test Email with HTML Template';
// $templatePath = 'path/to/your/template.html';

// // Define data to replace placeholders in the template
// $templateData = [
//     'username' => 'John Doe',
//     'message' => 'This is a test email with HTML template.',
// ];

// $result = $sendMail->sendEmailWithTemplate($to, $subject, $templatePath, $templateData);

// if ($result === true) {
//     echo 'Email sent successfully!';
// } else {
//     echo 'Error: ' . $result;
// }