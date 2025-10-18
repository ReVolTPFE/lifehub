<?php

namespace LifeHub\Core\Interface;

interface LifeHubModuleInterface
{
    // Module name visible to the user
    public static function getName(): string;

    // Module unique slug based on the module name
    public static function getSlug(): string;

    // Description of the module use
    public static function getDescription(): string;

    // Semantic versioning will be used for the modules
    public static function getVersion(): string;

    // Fontawesome icon class name
    public static function getIcon(): string;
}
