<?php

namespace App\EventSubscriber;

use App\Entity\Calendar;
use App\Entity\ContactMessage;
use App\Interface\ContactMessageInterface;
use App\Service\SendMail;
use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class ContactMessageSubscriber implements EventSubscriberInterface
{
    public function __construct(private SendMail $sendMail)
    {}

    public function postPersist(LifecycleEventArgs $args)
    {
        // On récupère l'entité qui vient d'être persistée
        $entity = $args->getEntity();
        // On vérifie que l'entité est bien un ContactMessage
        if ($entity instanceof ContactMessageInterface) {
            // On envoi l'email
            if($entity instanceof Calendar) {
                $this->sendMail->onNewMessage($entity, true);
            } else {
                $this->sendMail->onNewMessage($entity);
            }
        }
    }
    
        
    public function getSubscribedEvents()
    {
        return [
            Events::postPersist,
        ];
    }

}