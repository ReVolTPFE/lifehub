<?php

namespace LifeHub\Core\EventSubscriber;

use LifeHub\Core\Service\ModuleManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;

class ModuleSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private readonly Environment $twig,
        private readonly ModuleManager $moduleManager
    )
    {
    }

    public function onKernelController(ControllerEvent $event): void
    {
        $this->twig->addGlobal('modules', $this->moduleManager->getAllModules());
        $this->twig->addGlobal('activeModules', $this->moduleManager->getActiveModules());
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}
