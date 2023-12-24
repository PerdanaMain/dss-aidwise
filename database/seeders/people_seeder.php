<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\People;

class people_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //seeder for people table
        People::factory()
            ->count(25)
            ->create();
    }
}
