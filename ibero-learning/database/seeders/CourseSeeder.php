<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // foreach ($courses as $course) {
        //     $categories = $course['categories'];
        //     $course['picture'] = Course::factory(1);
        //     $course['user_id'] = User::whereRole(User::TEACHER)->get()->random()->id;
        //     unset($course['categories']);
        //     $model = Course::create($course);
        //     $model->categories()->attach($categories);
        // }
        $courses = Course::factory(30)->create();
        foreach($courses as $course){
            $course->categories()->attach([mt_rand(1,6)]);
        }
    }
}
