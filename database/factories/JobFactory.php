<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'employer_id' => Employer::query()->inRandomOrder()->value('id'), // Selects a random employer ID efficiently without loading all employers into memory
            'title' => $this->faker->jobTitle(),
            'salary' => $this->faker->randomElement(['$90,000', '$100,000', '$110,000', '$120,000', '$130,000']),
            'location' => $this->faker->randomElement(['Remote', 'On-site', 'Hybrid']),
            'schedule' => $this->faker->randomElement(['Full Time', 'Part Time', 'Contract', 'Internship']),
            'url' => $this->faker->url(),
            'featured' => $this->faker->randomElement([true, false]),
        ];
    }
}
