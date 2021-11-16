<?php

namespace App\Service;


use App\Repository\UserRepository;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SendMail
{

    public function __construct(private MailerInterface $mailer, private UserRepository $userRepository, private string $MAILER_FROM)
    {
    }

    public function onNewMessage()
    {
        $users = $this->userRepository->findAll();

        $userEmails = [];
        foreach ($users as $user) {
            if (in_array('ROLE_ADMIN', $user->getRoles())) {
                $userEmails[] = $user->getEmail();
            }
        }

        $mail = (new Email())
            ->from($this->MAILER_FROM)
            ->to(...$userEmails)
            ->subject('Nouveau message de contact')
            ->text('Nouveau message client');

        $this->mailer->send($mail);
    }
}
