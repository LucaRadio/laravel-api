<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $type = Type::all();
        for ($i = 0; $i < 50; $i++) {
            Project::create(
                [
                    'name' => $faker->catchPhrase(),
                    'description' => $faker->realText(),
                    'img_cover' => 'projects/noImg.jpg',
                    'type_id' => $type->random()->id

                ]
            );
        }
    }
}
