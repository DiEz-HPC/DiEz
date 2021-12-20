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
        // On récupère tout les utilisateurs
        $users = $this->userRepository->findAll();
        // On récupère les infos de l'instance
        $userName = $message->getNom();
        $userEmail = $message->getEmail();
        $message = $message->getMessage();
        $userEmails = [];
        // On boucle sur les utilisateurs pour récuperé les mails d'admin
        foreach ($users as $user) {
            if (in_array('ROLE_ADMIN', $user->getRoles())) {
                $userEmails[] = $user->getEmail();
            }
        }
        // On créer un nouveaux mail
        $mail = (new TemplatedEmail())
            // Adresse d'expediteur recuperai depuis le fichier .env
            ->from($this->MAILER_FROM)
            // Adresse de réception
            ->to(...$userEmails)
            // Objet du mail
            ->subject('Nouveau message de contact')
            // Template du mail
            ->htmlTemplate('mail/mail.html.twig')
            // Variables du template
            ->context([
                'userName' => $userName,
                'userEmail' => $userEmail,
                'message' => $message, 
            ]);
        // Envoie du mail
                $this->mailer->send($mail);
            }
}
