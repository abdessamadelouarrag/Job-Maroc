<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Offre;

class OffreSeeder extends Seeder
{
    public function run(): void
    {
        Offre::factory()->count(50)->create();
    }
}
