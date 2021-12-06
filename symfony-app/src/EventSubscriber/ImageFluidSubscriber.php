<?php

namespace App\EventSubscriber;

use App\Service\Image\ImageFluidInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityUpdatedEvent;

class ImageFluidSubscriber implements EventSubscriberInterface
{
    public function onAfterEntityUpdatedEvent(AfterEntityUpdatedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if ($entity instanceof ImageFluidInterface) {
            $entity->setImagesFluid($entity->getImageName());
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            AfterEntityUpdatedEvent::class => 'onAfterEntityUpdatedEvent',
        ];
    }
}
