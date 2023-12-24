<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Valuation;

class valuation_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seeder for valuation table
        $citizen = [
            [
                "code_name" => "C1",
                "description" => "Status Kepemilikan Rumah",
                "level" => 2,
                "status" => "Benefit",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "code_name" => "C2",
                "description" => "Pendapatan ",
                "level" => 4,
                "status" => "Benefit",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "code_name" => "C3",
                "description" => "Jumlah tanggungan keluarga",
                "level" => 5,
                "status" => "Benefit",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "code_name" => "C4",
                "description" => "KTP",
                "level" => 2,
                "status" => "Benefit",
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];

        Valuation::insert($citizen);
    }
}