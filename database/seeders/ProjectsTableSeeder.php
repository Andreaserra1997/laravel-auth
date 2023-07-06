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
            'name' => $faker->word(rand(5, 15), true),
            'client_name' => $faker->name(),
            'date' => $faker->date(),
            'cover_image' => 'https://picsum.photos/id/' . rand(1, 270) . '/500/400',
            'summary' => $faker->paragraphs(rand(2, 20), true),
        ]);
        }
    }
}
