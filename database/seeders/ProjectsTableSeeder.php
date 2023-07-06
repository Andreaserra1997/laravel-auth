<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 50; $i++) {
            Project::create([
            'name' => $faker->words(rand(2, 10), true),
            'client_name' => $faker->words(rand(5, 10), true),
            'date' => $faker->date(),
            'cover_image' => 'https://picsum.photos/id/' . rand(1, 270) . '/500/400',
            'summary' => $faker->paragraphs(rand(2, 20), true),
        ]);
        }
    }
}
