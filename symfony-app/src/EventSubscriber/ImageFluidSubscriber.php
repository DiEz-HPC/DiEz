<?php

namespace App\EventSubscriber;

use App\Service\Image\ImageFluidInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityDeletedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityUpdatedEvent;

class ImageFluidSubscriber implements EventSubscriberInterface
{
    public function __construct(private ImageFluidInterface $imageFluid)
    {}

    public function onAfterEntityUpdatedEvent(AfterEntityUpdatedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if ($entity->getImageName()) {
            $this->imageFluid->setImagesFluid($entity->getImageName());
        }
    }

    public function onBeforeEntityUpdatedEvent(BeforeEntityUpdatedEvent $event)
    {
        $entity = $event->getEntityInstance();
        if ($entity->getImageName()) {
            $this->imageFluid->removeImagesFluid($entity->getImageName());
        }
    }

    public function onAfterEntityPersistedEvent(AfterEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if ($entity->getImageName()) {
            $this->imageFluid->setImagesFluid($entity->getImageName());
        }
    }

    public function onBeforeEntityDeletedEvent(BeforeEntityDeletedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if ($entity->getImageName()) {
            $this->imageFluid->removeImagesFluid($entity->getImageName());
        }
    }


    public static function getSubscribedEvents()
    {
        return [
            AfterEntityUpdatedEvent::class => 'onAfterEntityUpdatedEvent',
            BeforeEntityUpdatedEvent::class => 'onBeforeEntityUpdatedEvent',
            AfterEntityPersistedEvent::class => 'onAfterEntityPersistedEvent',
            BeforeEntityDeletedEvent::class => 'onBeforeEntityDeletedEvent',
        ];
    }
}
