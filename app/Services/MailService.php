<?php
namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailService
{
    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->configure();
    }

 private function configure()
{
    // **Türkçe karakterler için UTF-8**
    $this->mail->CharSet = 'UTF-8';
    $this->mail->Encoding = 'base64';
    $this->mail->isSMTP();
    $this->mail->Host       = $_ENV['MAIL_HOST'] ?? '';
    $this->mail->SMTPAuth   = true;
    $this->mail->Username   = $_ENV['MAIL_USERNAME'] ?? '';
    $this->mail->Password   = $_ENV['MAIL_PASSWORD'] ?? '';
    $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $this->mail->Port       = $_ENV['MAIL_PORT'] ?? 587;
    $this->mail->setFrom($_ENV['MAIL_FROM'] ?? 'no-reply@example.com', 'Site Admin');
}


    public function send($to, $subject, $body)
    {
        try {
            $this->mail->addAddress($to);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            // Logla veya debug
            return false;
        }
    }
}
