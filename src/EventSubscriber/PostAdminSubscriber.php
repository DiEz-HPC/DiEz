<?php

namespace App\EventSubscriber;

use App\Entity\Post;
use Cocur\Slugify\Slugify;
use DateTimeImmutable;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class PostAdminSubscriber implements EventSubscriberInterface
{
    public function __construct(private TokenStorageInterface $tokenStorage)
    {
    }

    public function onBeforeEntityPersistedEvent(BeforeEntityPersistedEvent $event): BeforeEntityPersistedEvent
    {
        $entity = $event->getEntityInstance();
        if ($entity instanceof Post)
        {
            $slugify = new Slugify();
            $entity->setSlug(
                $slugify->slugify($entity->getTitle())
            );

            if (!$entity->getCreatedAt()) {
                $entity->setCreatedAt(new DateTimeImmutable());
            } else {
                $entity->setUpdatedAt(new DateTimeImmutable());
            }

            if (!$entity->getAuthor()) {
                $entity->setAuthor($this->tokenStorage->getToken()->getUser()->getFullname());
            }
        }

        return $event;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => 'onBeforeEntityPersistedEvent',
        ];
    }
}
