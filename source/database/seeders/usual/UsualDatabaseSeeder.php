<?php

namespace Database\Seeders\usual;

use Illuminate\Database\Seeder;

class UsualDatabaseSeeder extends Seeder
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
            BlogRecordSeeder::class,
            VacationOfficialSeeder::class,
            VacationSeeder::class,
        ]);
    }
}
