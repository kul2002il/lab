<?php

namespace Database\Seeders\usual;

use App\Models\WeeklyBlog;
use Illuminate\Database\Seeder;

class WeeklyBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WeeklyBlog::factory(30)->create();
    }
}
