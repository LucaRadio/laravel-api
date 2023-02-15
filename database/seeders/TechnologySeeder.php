<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologyList = [
            "HTML",
            "Javascript",
            "Vue",
            "PHP",
            "Node.js",
            "Laravel"
        ];

        foreach ($technologyList as $technology) {

            DB::table('technologies')->insert([
                "name" => $technology,
            ]);
        }
    }
}
