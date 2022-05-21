<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class dbdrop extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:drop {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fshije databazen';

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
     * @return int
     */
    public function handle()
    {
        //drop database
        

    }
}
