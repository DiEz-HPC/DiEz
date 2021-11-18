<?php

namespace App\EventSubscriber;

use App\Entity\Testimony;
use DateTimeImmutable;
use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Exception;

class TestimonySubscriber implements EventSubscriberInterface
{
    /**
     * @throws Exception
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if ($entity instanceof Testimony) {
            $entity->setCreatedAt(new DateTimeImmutable('', new \DateTimeZone('Europe/Paris')));
        }
    }


    public function getSubscribedEvents()
    {
        return [
            Events::prePersist,
        ];
    }
}
