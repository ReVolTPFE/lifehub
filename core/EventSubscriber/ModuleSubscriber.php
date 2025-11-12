<?php

namespace LifeHub\Core\EventSubscriber;

use LifeHub\Core\Service\ModuleManager;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;

class ModuleSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private readonly Environment $twig,
        private readonly ModuleManager $moduleManager,
        private readonly Security $security
    )
    {
    }

    public function onKernelController(ControllerEvent $event): void
    {
        $user = $this->security->getUser();

        // If we are on login/register pages we don't need this.
        if (!$user) {
            return;
        }

        $this->twig->addGlobal('modules', $this->moduleManager->getAllModules());
        $this->twig->addGlobal('activeModules', $this->moduleManager->getActiveModulesForUser($user));
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}
