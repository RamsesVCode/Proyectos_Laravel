<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;
    public function definition()
    {
        return [
            'description'=>$this->faker->paragraph(2),
            'picture' => 'categories/'.$this->faker->image('public/storage/categories',640,480,null,false),
        ];
    }
}
