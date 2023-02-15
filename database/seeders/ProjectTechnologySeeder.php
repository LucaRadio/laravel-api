<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tecnologies = Technology::all();
        $projects = Project::all();

        for ($i = 0; $i < 100; $i++) {
            DB::table('project_technology')->insert([
                'project_id' => $projects->random()->id,
                'technology_id' => $tecnologies->random()->id,
            ]);
        }
    }
}
