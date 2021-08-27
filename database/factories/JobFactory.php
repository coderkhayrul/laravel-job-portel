<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'category_id' => rand(1, 5),
            'company_id' => Company::all()->random()->id,
            'title' => $title = $this->faker->text(),
            'slug' => Str::slug($title, '-'),
            'position' => $this->faker->jobTitle(),
            'address' => $this->faker->address(),
            'type' => 'fulltime',
            'status' => rand(0, 1),
            'description' => $this->faker->paragraph(rand(2, 10)),
            'roles' => $this->faker->catchPhrase(),
            'last_date' => $this->faker->dateTime(),
        ];
    }
}
