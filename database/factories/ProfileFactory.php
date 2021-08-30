<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'address' => $this->faker->address(),
            'phone_number' => $this->faker->e164PhoneNumber(),
            'gender' => $this->faker->e164PhoneNumber(),
            'dob' => $this->faker->e164PhoneNumber(),
            'experience' => $this->faker->e164PhoneNumber(),
            'bio' => $this->faker->e164PhoneNumber(),
            'phone_number' => $this->faker->e164PhoneNumber(),
        ];
    }
}
