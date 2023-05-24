<?php

namespace Database\Seeders;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
   
    public function run(Faker $faker)
    {
        for($i=0;$i<10;$i++){
            $newProject = new Project();
            $newProject->title = $faker->sentence(5);
            $newProject->description = $faker->text(300);
            $newProject->link = $faker->url();
            $newProject->preview_image = $faker->url();
            $newProject->save();
        }
    }
}
