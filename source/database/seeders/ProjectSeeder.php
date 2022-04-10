<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Для создания иерархической структуры проектов, нужно иметь к чему
         * подвязывать проекты. Следовательно, их нужно создавать не скопом,
         * а по одному.
         */
        for($i = 0; $i < 30; $i++)
        {
            Project::factory()->create();
        }
    }
}
