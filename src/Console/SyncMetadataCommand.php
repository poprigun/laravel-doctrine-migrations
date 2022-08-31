<?php

declare(strict_types=1);

namespace LaravelDoctrine\Migrations\Console;

use LaravelDoctrine\Migrations\Configuration\DependencyFactoryProvider;

class SyncMetadataCommand extends BaseCommand
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'doctrine:migrations:sync-metadata-storage
    {--connection= : For a specific connection.}';

    /**
     * @var string
     */
    protected $description = 'Sync metadata storage';

    /**
     * Execute the console command.
     *
     * @param DependencyFactoryProvider $provider
     */
    public function handle(DependencyFactoryProvider $provider): int
    {
        $dependencyFactory = $provider->fromConnectionName($this->option('connection'));

        $command = new \Doctrine\Migrations\Tools\Console\Command\SyncMetadataCommand($dependencyFactory);

        return $command->run($this->getDoctrineInput($command), $this->output->getOutput());
    }
}
