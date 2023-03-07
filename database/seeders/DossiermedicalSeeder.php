<?php

namespace Database\Seeders;

use App\Models\Dossiermedical;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DossiermedicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dossiermedical::factory(2)->create();
    }
}
