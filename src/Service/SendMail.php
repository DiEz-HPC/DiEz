<?php

namespace App\Service;

use App\Entity\ContactMessage;
use App\Repository\UserRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SendMail
{

    public function __construct(private MailerInterface $mailer, private UserRepository $userRepository, private string $MAILER_FROM)
    {
    }

    public function onNewMessage(ContactMessage $message)
    {
        $users = $this->userRepository->findAll();
        $userName = $message->getNom();
        $userEmail = $message->getEmail();
        $message = $message->getMessage();
        $userEmails = [];
        foreach ($users as $user) {
            if (in_array('ROLE_ADMIN', $user->getRoles())) {
                $userEmails[] = $user->getEmail();
            }
        }

        $mail = (new TemplatedEmail())
            ->from($this->MAILER_FROM)
            ->to(...$userEmails)
            ->subject('Nouveau message de contact')
            ->htmlTemplate('mail/mail.html.twig')
            ->context([
                'userName' => $userName,
                'userEmail' => $userEmail,
                'message' => $message, 
            ]);
                $this->mailer->send($mail);
            }
}
