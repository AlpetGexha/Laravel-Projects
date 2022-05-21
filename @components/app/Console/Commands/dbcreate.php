<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class dbcreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Krijimi i databazes';

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

        $schemaName = $this->argument('name') ?: config("database.connections.mysql.database"); //emri i databazes ekzistuse
        $charset = config("database.connections.mysql.charset", 'utf8mb4');
        $collation = config("database.connections.mysql.collation", 'utf8mb4_unicode_ci');

        Artisan::call('db:drop', ['name' => $schemaName]);
        DB::statement("CREATE DATABASE IF NOT EXISTS `$schemaName` DEFAULT CHARACTER SET $charset COLLATE $collation;");
        $this->info("Databaza $schemaName u krijua me sukses!");
    }
}
