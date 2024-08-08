<?php

namespace App\Console\Commands;

use Hash;
use Illuminate\Console\Command;

class HashPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:hash-password {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hash a given password and display the original and hashed versions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $password = $this->argument('password');
        $hashedPassword = Hash::make($password);

        $this->info('Original Password: ' . $password);
        $this->info('Hashed Password: ' . $hashedPassword);
    }
}
