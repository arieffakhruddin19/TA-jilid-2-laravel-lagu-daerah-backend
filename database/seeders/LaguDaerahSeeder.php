<?php

namespace Database\Seeders;

use App\Models\LaguDaerah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaguDaerahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LaguDaerah::factory(100)->create();
    }
}
