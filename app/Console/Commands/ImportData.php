<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ImportData {db} {password} {initdbfile}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Data from dbfile';

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
        $db = $this->argument("db");
        $password = $this->argument("password");
        $initdbfile = $this->argument("initdbfile");
        $process = new Process(['mysql','-u future_admin', '-p' . $password, $db, '<', $initdbfile]);
        $process->run();
    }
}
