<?php

namespace App\EventSubscriber;

use App\Entity\Client;
use App\Repository\ProjectRepository;
use DateTimeImmutable;
use DateTimeZone;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityUpdatedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityDeletedEvent;
use Exception;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;


class ClientAdminSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private ProjectRepository      $projectRepository,
        private EntityManagerInterface $entityManager
    )
    {
    }

    /**
     * @throws Exception
     */
    public function onBeforeEntityPersistedEvent(BeforeEntityPersistedEvent $event): BeforeEntityPersistedEvent
    {
        $entity = $event->getEntityInstance();
        if ($entity instanceof Client) {
            if (!$entity->getCreatedAt()) {
                $entity->setCreatedAt(new DateTimeImmutable('', new DateTimeZone('Europe/Paris')));
            } else {
                $entity->setUpdatedAt(new DateTimeImmutable('', new DateTimeZone('Europe/Paris')));
            }
        }

        return $event;
    }

    public function onAfterEntityPersistedEvent(AfterEntityPersistedEvent $event): AfterEntityPersistedEvent
    {
        $entity = $event->getEntityInstance();
        if ($entity instanceof Client) {
            foreach ($entity->getProject() as $project) {
                $project->setClient($entity);
                $this->entityManager->persist($project);
            }
            $this->entityManager->flush();
        }

        return $event;
    }

    public function onAfterEntityUpdatedEvent(AfterEntityUpdatedEvent $event): AfterEntityUpdatedEvent
    {
        $entity = $event->getEntityInstance();
        $projects = $this->projectRepository->findBy(['client' => $entity]);
        foreach ($projects as $project) {
            if ($project->getClient() === $entity && !$entity->getProject()->contains($project)) {
                $project->setClient(null);
                $this->entityManager->persist($project);
            }
        }
        if ($entity instanceof Client) {
            foreach ($entity->getProject() as $project) {
                $project->setClient($entity);
                $this->entityManager->persist($project);
            }
            $this->entityManager->flush();
        }

        return $event;
    }

    public function onBeforeEntityDeletedEvent(BeforeEntityDeletedEvent $event): BeforeEntityDeletedEvent
    {
        $entity = $event->getEntityInstance();
        if ($entity instanceof Client) {
            foreach ($entity->getProject() as $project) {
                $project->setClient(null);
                $this->entityManager->persist($project);
            }
            $this->entityManager->flush();
        }

        return $event;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => 'onBeforeEntityPersistedEvent',
            AfterEntityPersistedEvent::class => 'onAfterEntityPersistedEvent',
            AfterEntityUpdatedEvent::class => 'onAfterEntityUpdatedEvent',
            BeforeEntityDeletedEvent::class => 'onBeforeEntityDeletedEvent',
        ];
    }
}
