<?php

namespace App\EventSubscriber;

use App\Entity\Post;
use Cocur\Slugify\Slugify;
use DateTimeImmutable;
use DateTimeZone;
use Exception;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class PostAdminSubscriber implements EventSubscriberInterface
{
    public function __construct(private TokenStorageInterface $tokenStorage)
    {
    }

    /**
     * @throws Exception
     */
    public function onBeforeEntityPersistedEvent(BeforeEntityPersistedEvent $event): BeforeEntityPersistedEvent
    {
        $entity = $event->getEntityInstance();
        $user = $this->tokenStorage->getToken()->getUser();
        if ($entity instanceof Post)
        {
            $slugify = new Slugify();
            $entity->setSlug(
                $slugify->slugify($entity->getTitle())
            );

            $entity->setUrl('blog/' . $entity->getSlug());

            if (!$entity->getCreatedAt()) {
                $entity->setCreatedAt(new DateTimeImmutable('', new DateTimeZone('Europe/Paris')));
            } else {
                $entity->setUpdatedAt(new DateTimeImmutable('', new DateTimeZone('Europe/Paris')));
            }

            if (!$entity->getAuthor() && $user->getProfile()) {
                $entity->setAuthor($this->tokenStorage->getToken()->getUser()->getProfile()->getFullname());
            } else {
                $entity->setAuthor('Anonyme');
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
