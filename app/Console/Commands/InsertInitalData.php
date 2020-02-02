<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InsertInitalData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:InsertInitalData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert inital db for master db';

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
        //
    }
}
