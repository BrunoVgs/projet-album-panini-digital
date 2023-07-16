<?php

namespace App\Controller\Admin;


use App\Service\NotificationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController
{
    /**
     * @Route("/back/admin/send-notification", name="send_notification" , methods={"GET"})
     */
    public function sendNotification(NotificationService $notificationService): Response
    {
        $recipient = 'example@example.com';
        $subject = 'Nouvelle notification';
        $message = 'Vous avez reçu une nouvelle notification.';

        $notificationService->sendNotification($recipient, $subject, $message);

        return new Response('Notification envoyée !');
    }
}
