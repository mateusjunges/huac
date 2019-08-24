<?php

namespace HUAC\Console\Commands;

use Illuminate\Console\Command;

class MakeActionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:action {name : Action name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new action';

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
        $name = $this->argument('name');
        $action = str_replace(
            "DummyAction",
            $name,
            $this->stubs('action')
        );
        file_put_contents(app_path("Actions/{$name}.php"), $action);
        $this->info("Action created successfully");
    }

    private function stubs($name)
    {
        return file_get_contents(resource_path("stubs/{$name}.stub"));
    }
}
