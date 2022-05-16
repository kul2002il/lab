<?php

namespace Database\Seeders\usual;

use Illuminate\Database\Seeder;
use App\Models\VacationOfficial;

class VacationOfficialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VacationOfficial::factory(30)->create();
    }
}
