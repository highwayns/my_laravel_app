<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CreateDatabase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Vendor Database and init from dbfile';

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
        $sql = 'CREATE DATABASE '.$db.' DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci';
        $process = new Process(['mysql','-u future_admin', '-p' . $password, '-e\'' . $sql . ';\'']);
        $process->run();
        $sql = $db.' < ' .$initdbfile;
        $process = new Process(['mysql','-u future_admin', '-p' . $password, $sql]);
        $process->run();
    }
}
