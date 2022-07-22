<?php

namespace Database\Seeders;

use App\Models\Ustencil;
use Illuminate\Database\Seeder;

class UstencilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ustencil::factory(10)->create();
    }
}