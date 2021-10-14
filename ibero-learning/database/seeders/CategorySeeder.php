<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Helpers\Image;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            "Laravel",
            "Node.js",
            "Vuejs",
            "React",
            "Deno",
            "Amplify",
        ];
        foreach($categories as $category) {
            Category::factory()->create([
                'name' => $category,             
            ]);
        }
        // Category::factory(6)->create();
    }
}