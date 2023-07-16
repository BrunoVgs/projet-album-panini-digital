<?php

namespace App\Service;

use App\Service;
use App\Controller\Admin;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class NotificationService
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendNotification($recipient, $subject, $message)
    {
        $email = (new Email())
            ->from('notifications@example.com')
            ->to($recipient)
            ->subject($subject)
            ->text($message);

        $this->mailer->send($email);
    }
}
