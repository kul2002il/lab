<?php

namespace Database\Seeders\usual;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        /*
         * To create a hierarchical structure of projects, you need to have
         * something to tie projects to. Therefore, they need to be created
         * not en masse, but one at a time.
         */
        for($i = 0; $i < 30; $i++)
        {
            Project::factory()->create();
        }
    }
}
