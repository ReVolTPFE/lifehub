<?php

namespace LifeHub\Modules\Habits;

use LifeHub\Core\Interface\LifeHubModuleInterface;

final class HabitsModule implements LifeHubModuleInterface
{
    public static function getName(): string
    {
        return "Suivi des habitudes";
    }

    public static function getSlug(): string
    {
        return "habits";
    }

    public static function getDescription(): string
    {
        return "Module de gestion des habitudes";
    }

    public static function getVersion(): string
    {
        return "0.1.0";
    }

    public static function getIcon(): string
    {
        return "fa-solid fa-hourglass";
    }
}
