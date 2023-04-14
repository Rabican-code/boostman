<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class boostman extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'app:boostman';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        echo "hello";
    }
}
