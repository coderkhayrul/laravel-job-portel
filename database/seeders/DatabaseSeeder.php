<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(20)->create();

        $this->call([
            UserTableSeeder::class,
            CompanyTableSeeder::class,
            JobTableSeeder::class,
        ]);
    }
}
