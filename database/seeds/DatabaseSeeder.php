<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'Kyle',
          'email' => 'kagron12@gmail.com',
          'is_admin' => true,
          'password' => bcrypt('password'),
      ]);
      DB::table('appetizer_items')->insert([
          'name' => 'Mozarella Sticks',
          'description' => 'Yummy yummy mozarella sticks',
          'price' => '6.99',
      ]);
      DB::table('entree_items')->insert([
          'name' => 'Mostaccioli',
          'description' => 'Cheesy mostaccioli',
          'price' => '10.99',
      ]);
      DB::table('drink_items')->insert([
          'brand' => 'Sam Adams',
          'description' => 'Dark, wheat ale lager',
          'price' => '4.99',
      ]);
      DB::table('pizza_types')->insert([
          'type' => 'Deep Dish',
          'description' => 'Deeeeeeeeeeeeeeeep dish',
          'price' => '10.99',
      ]);
      DB::table('dessert_items')->insert([
          'name' => 'Cookie Cake',
          'description' => 'It\'s like a cake, but made of cookie',
          'price' => '7.99',
      ]);
    }
}
