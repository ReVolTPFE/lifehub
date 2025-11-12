<?php

namespace LifeHub\Core\Service;

use LifeHub\Core\Interface\LifeHubModuleInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * The central service responsible for discovering, listing, and managing all LifeHub modules.
 * This service achieves decoupling by working solely with the LifeHubModuleInterface.
 */
final class ModuleManager
{
    /** * @var LifeHubModuleInterface[]
     * Stores all discovered module instances after conversion from the injected Iterator.
     */
    private array $modules;

    /**
     * The collection of modules is injected here by Symfony's Dependency Injection Container.
     * The 'iterable $modules' parameter receives all services tagged with 'lifehub.module' (see services.yaml).
     * This uses Lazy Loading (services are only instantiated when the iterator is traversed).
     * * @param iterable<LifeHubModuleInterface> $modules A collection of all module services.
     */
    public function __construct(iterable $modules)
    {
        $this->modules = iterator_to_array($modules);
    }

    public function getAllModules(): array
    {
        return $this->modules;
    }

    public function getActiveModulesForUser(UserInterface $user): array
    {
        $activesModules = $user->getActiveModules();

        return array_filter($this->modules, function (LifeHubModuleInterface $module) use ($activesModules) {
            return in_array($module::getSlug(), $activesModules, true);
        });
    }
}
