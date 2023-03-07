<?php

namespace Database\Seeders;

use App\Models\Rendezvou;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RendezvouSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rendezvou::factory(3)->create();
    }
}
