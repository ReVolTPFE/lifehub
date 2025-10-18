<?php

namespace App\Command\Debug;

use LifeHub\Core\Service\ModuleManager;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'lifehub:debug:modules',
    description: 'Lists all discovered LifeHub modules using the ModuleManager.',
)]
final class ModuleDiscoveryCommand extends Command
{
    private ModuleManager $moduleManager;

    /**
     * The ModuleManager is automatically injected by autowiring and has already the collection of 'lifehub.module'
     * tagged classes.
     */
    public function __construct(ModuleManager $moduleManager)
    {
        $this->moduleManager = $moduleManager;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $modules = $this->moduleManager->getAllModules();

        $count = count($modules);
        $io->title(sprintf('LifeHub Module Discovery (%d module%s found)', $count, $count > 1 ? 's' : ''));

        if ($count === 0) {
            $io->note('No modules implementing LifeHubModuleInterface were found or tagged.');
            return Command::SUCCESS;
        }

        $data = [];
        foreach ($modules as $module) {
            $data[] = [
                $module::getName(),
                $module::getSlug(),
                $module::getDescription(),
                $module::getVersion(),
                $module::getIcon(),
            ];
        }

        $io->table(
            ['Name', 'Slug', 'Description', 'Version', 'Icon'],
            $data
        );

        $io->success('Module discovery successful. The Core can communicate with Modules.');

        return Command::SUCCESS;
    }
}
