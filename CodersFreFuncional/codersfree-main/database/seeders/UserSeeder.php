<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $user = User::create([
      'name' => 'Jose Maria Barragan',
      'email' => 'jmb@jmb.com',
      'password' => bcrypt('12345678')
    ]);
    // $user->roles()->attach(1)
    $user->assignRole('Admin');

    User::factory(99)->create();
  }
}
