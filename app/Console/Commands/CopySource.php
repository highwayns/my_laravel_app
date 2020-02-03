<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class CopySource extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CopySource {source} {dest}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy Source file from staging';

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
        $source = $this->argument("source");
        $dest = $this->argument("dest");
        //$process = new Process(['xcopy', $source, $dest, '/D /E /R /Y /I /K']);
        $process = new Process(['cp', '-a', $source, $dest]);
        $process->setTimeout(10*60);
        $process->run();
    }
}
