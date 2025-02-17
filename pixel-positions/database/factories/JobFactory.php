<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;
use App\Models\Employer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'title' => fake()->jobTitle,
            'salary' => fake()->randomElement(['$50,000', '$60,000', '$70,000', '$80,000', '$90,000', '$100,000']),
            'location' => 'Remote',
            'schedule' => fake()->randomElement(['Full-time', 'Part-time', 'Contract']),
            'url' => fake()->url,
            'featured' => fake()->boolean,
        ];
    }
}
