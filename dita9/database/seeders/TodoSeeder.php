<?php

namespace Database\Seeders;

use App\Models\Todo;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Todo::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'completed' => $faker->boolean,
            ]);
        }
    }
}
