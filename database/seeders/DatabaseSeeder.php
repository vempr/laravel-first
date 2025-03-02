<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $users = User::factory(5)->create();
        $employers = Employer::factory(5)->recycle($users)->create();
        Job::factory(30)->recycle($employers)->create();
    }
}
