<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ModifySource extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ModifySource';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Modify the Vendor sourcefile add db';

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
        $filename = $this->argument("filename");
        $filename_tmp = $filename . ".tmp";
        $search = $this->argument("search");
        $replace = $this->argument("replace");
        $myfile = fopen($filename, "r") or die("Unable to open file!");
        $content = fread($myfile,filesize($filename));
        $content = str_replace($search, $replace, $content);
        $myfile_tmp = fopen($filename_tmp, "w") or die("Unable to open file!");
        fwrite($myfile_tmp, $content);
        fclose($myfile_tmp);
        fclose($myfile);
        @unlink($myfile);
        rename($myfile_tmp,$myfile);
    }
}
