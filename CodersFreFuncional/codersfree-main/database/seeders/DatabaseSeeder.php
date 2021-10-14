<?php

namespace Database\Seeders;

use Database\Seeders\CategorySeeder;
use Database\Seeders\CourseSeeder;
use Database\Seeders\LevelSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\PriceSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    Storage::deleteDirectory('courses');
    Storage::makeDirectory('courses');

    $this->call(PermissionSeeder::class);
    $this->call(RoleSeeder::class);
    $this->call(UserSeeder::class);
    $this->call(LevelSeeder::class);
    $this->call(CategorySeeder::class);
    $this->call(PriceSeeder::class);
    $this->call(PlatformSeeder::class);
    $this->call(CourseSeeder::class);
  }
}
