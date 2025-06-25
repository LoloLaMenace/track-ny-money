<?php

namespace Database\Seeders;

use App\Models\Acount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Acount::factory()
           ->count(4)
           ->create();
    }
}
