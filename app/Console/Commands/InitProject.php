<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class InitProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command To Init Project';

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
    public function handle(): int
    {
        Artisan::call('migrate:fresh');
        $this->info('Database Was Migrated');

        $name = $this->ask('Enter Name');
        $email = $this->ask('Enter Email');
        $password = $this->secret('Enter Password');

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info('User Created Successfully');

        Artisan::call('db:seed PermissionSeeder');
        $this->info('Permission Seeder Was Seed');

        Artisan::call('db:seed ModelPermissionSeeder');
        $this->info('Model Permission Seeder Was Seed');

        return self::SUCCESS;
    }
}
