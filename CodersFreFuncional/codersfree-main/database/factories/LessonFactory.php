<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Lesson::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'name' => $this->faker->sentence(),
      'url' => 'https://www.youtube.com/watch?v=wkF9w86XXKU',
      'iframe' => '<iframe width="1350" height="480" src="https://www.youtube.com/embed/wkF9w86XXKU?list=RDwkF9w86XXKU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
      'platform_id' => 1
    ];
  }
}
