<?php

namespace App\Controllers\InterfaceControllers;

use Core\Session;
use App\Services\MailService;
use Core\Controller; // ya da senin kullandığın ana Controller sınıfı

class ContactController extends Controller
{
    // GET /contact
    public function showForm()
{
    $data = ['pageTitle' => 'İletişim'];
    $this->render('interface/pages/contact', $data);
}

    // POST /contact
    public function submit()
    {
        // Basit doğrulama
        $name    = $_POST['name']    ?? '';
        $email   = $_POST['email']   ?? '';
        $message = $_POST['message'] ?? '';

        if (empty($name) || empty($email) || empty($message)) {
            Session::setFlash('warning', 'Lütfen tüm alanları doldurun.');
            header('Location: ' . base_url('contact'));
            exit;
        }

        // Mail gönder
        $mailService = new MailService();
        $body = "Gönderen: {$name} <{$email}>\n\nMesaj:\n{$message}";
        $sent = $mailService->send(
            $_ENV['MAIL_TO'] ?? $_ENV['MAIL_FROM'],
            "Yeni İletişim Mesajı",
            $body
        );

        if ($sent) {
            Session::setFlash('success', 'Mesajınız başarıyla gönderildi, teşekkürler!');
        } else {
            Session::setFlash('danger', 'Üzgünüm, mesaj gönderilemedi. Lütfen daha sonra tekrar deneyin.');
        }

        // —— DİKKAT: Burada render yerine kesin çıkışla redirect ediyoruz!
        header('Location: ' . base_url('contact'));
        exit;
    }
}
