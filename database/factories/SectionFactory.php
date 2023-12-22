<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $courses = Course::all()->pluck('id')->toArray();

        return [
            'title' => $this->faker->sentence(4),
            'text' => $this->faker->paragraph(100),
            'course_id' => $this->faker->randomElement($courses),
        ];
    }
}
