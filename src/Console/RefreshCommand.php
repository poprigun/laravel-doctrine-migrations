<?php

declare(strict_types=1);

namespace LaravelDoctrine\Migrations\Console;

use Illuminate\Console\Command;

class RefreshCommand extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'doctrine:migrations:refresh
    {--connection= : For a specific connection.}';

    /**
     * @var string
     */
    protected $description = 'Reset and re-run all migrations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('doctrine:migrations:reset', [
            '--connection' => $this->option('connection')
        ]);

        $this->call('doctrine:migrations:migrate', [
            '--connection' => $this->option('connection')
        ]);
    }
}
