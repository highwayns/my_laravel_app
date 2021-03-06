<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class InsertInitalData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:InsertInitalData {db} {password} {vendor_id}';

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
        $db = $this->argument("db");
        $password = $this->argument("password");
        $vendor_id = $this->argument("vendor_id");
        $sql = 'insert into company' . $vendor_id;
        $process = new Process(['mysql','-u future_admin', '-p' . $password, '-e\'' . $sql . ';\'']);
        $process->run();
    }
}
