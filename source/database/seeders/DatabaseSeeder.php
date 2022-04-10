<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            DepartmentSeeder::class,
            CustomerSeeder::class,
            WorkerSeeder::class,
            ProjectSeeder::class,
            WeeklyBlogSeeder::class,
            DailyBlogSeeder::class,
            BlogRecordSeeder::class
        ]);
    }
}
