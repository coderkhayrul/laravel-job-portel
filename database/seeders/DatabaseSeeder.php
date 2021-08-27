<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $categories = [
            'Technology',
            'Engineering',
            'Government',
            'Medical',
            'Construction',
            'Software'
        ];
        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
