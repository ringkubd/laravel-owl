<?php

namespace Anwar\LaravelOwl\Commands;

use Illuminate\Console\Command;

class LaravelOwlCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'LaravelOwl:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Laravel Owl Carousel';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("Start publishing.................");
        $this->call('vendor:publish', ['--provider' => 'Anwar\Laravelowl\OwlCarouselProvider']);
        $this->info("End publishing.");

        $this->info("Start database migration................");
        $this->call("migrate");
        $this->info("End database migration.");

        $this->info("Clear configuration cache and regenerating ........");
        $this->call("config:clear");

        $this->info("Storage symlink to public folder start..........");
        $this->call("storage:link");
    }
}
