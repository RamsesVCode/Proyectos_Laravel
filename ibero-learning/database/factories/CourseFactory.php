<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::whereRole(User::TEACHER)->get()->random()->id,
            'title' => $this->faker->unique()->text(10),
            'picture' => 'courses/'.$this->faker->image('public/storage/courses',640,480,null,false),
            'description' => $this->faker->paragraph(1),
            'price' => $this->faker->randomElement(['9.99','19.99','14.99','39.99','24.99','29.99']),
            'featured' => $this->faker->randomElement([true,false]),
            'status' => $this->faker->randomElement([Course::PUBLISHED,Course::PENDING]),
        ];
    }
}
