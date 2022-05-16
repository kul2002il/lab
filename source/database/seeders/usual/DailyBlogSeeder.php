<?php

namespace Database\Seeders\usual;

use App\Models\DailyBlog;
use Illuminate\Database\Seeder;

class DailyBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DailyBlog::factory(30)->create();
    }
}
