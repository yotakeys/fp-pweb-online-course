<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Plan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $plans = Plan::all()->pluck('id')->toArray();

        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(2),
            'plan_id' => $this->faker->randomElement($plans),
        ];
    }
}
