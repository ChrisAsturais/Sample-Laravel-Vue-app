<?php

namespace App\Console\Commands;

use App\Models\PreviousSearches;
use Illuminate\Console\Command;

class ClearSearchHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clearsearch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        PreviousSearches::truncate();
    }
}
