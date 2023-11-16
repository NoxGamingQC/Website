<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateString extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generatestring';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a random string of 64 character. Can be use as a key.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $key = str_random(64);
        $this->info('Here is your generated key: ' . $key);
        return Command::SUCCESS;
    }
}
