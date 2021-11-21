<?php

namespace App\EventSubscriber;

use App\Entity\Theme;
use App\Repository\ThemeRepository;
use App\Service\ConfigurationTheme;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityUpdatedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;

class ThemeAdminSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private ThemeRepository        $themeRepository,
        private EntityManagerInterface $entityManager,
        private ConfigurationTheme     $configurationTheme
    )
    {}

    public function onBeforeEntityPersistedEvent(BeforeEntityPersistedEvent $event)
    {
        $themeUpdate = $event->getEntityInstance();
        if ($themeUpdate instanceof Theme) {
            if ($themeUpdate->getIsActive()) {
                $this->resetActiveTheme($themeUpdate);
            }
        }
    }

    public function onBeforeEntityUpdatedEvent(BeforeEntityUpdatedEvent $event)
    {
        $themeUpdate = $event->getEntityInstance();
        if ($themeUpdate instanceof Theme) {
            if ($themeUpdate->getIsActive()) {
                $this->resetActiveTheme($themeUpdate);
            }
        }
    }

    public function onAfterEntityPersistedEvent(AfterEntityPersistedEvent $event)
    {
        $themeUpdate = $event->getEntityInstance();
        if ($themeUpdate instanceof Theme) {
            if ($themeUpdate->getIsActive()) {
                $this->configurationTheme->defineTheme();
            }
        }
    }

    public function onAfterEntityUpdatedEvent(AfterEntityUpdatedEvent $event)
    {
        $themeUpdate = $event->getEntityInstance();
        if ($themeUpdate instanceof Theme) {
            if ($themeUpdate->getIsActive()) {
                $this->configurationTheme->defineTheme();
            }
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => 'onBeforeEntityPersistedEvent',
            BeforeEntityUpdatedEvent::class => 'onBeforeEntityUpdatedEvent',
            AfterEntityPersistedEvent::class => 'onAfterEntityPersistedEvent',
            AfterEntityUpdatedEvent::class => 'onAfterEntityUpdatedEvent',
        ];
    }

    private function resetActiveTheme(Theme $themeUpdate)
    {
        $themes = $this->themeRepository->findAll();
        foreach ($themes as $theme) {
            if ($theme->getIsActive() && $theme !== $themeUpdate) {
                $theme->setIsActive(false);
                $this->entityManager->persist($theme);
            }
        }
        $this->entityManager->flush();
    }
}
