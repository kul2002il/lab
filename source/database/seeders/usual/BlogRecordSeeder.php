<?php

namespace Database\Seeders\usual;

use App\Models\BlogRecord;
use Illuminate\Database\Seeder;

class BlogRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogRecord::factory(30)->create();
    }
}
