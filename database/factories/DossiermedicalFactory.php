<?php

namespace Database\Factories;

use App\Models\Rendezvou;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dossiermedical>
 */
class DossiermedicalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'prescription'=>fake()->filePath(),
            'report'=>fake()->filePath(),
            'cnssSheet'=>fake()->filePath(),
            'balanceSheet'=>fake()->filePath(),
            'name'=>User::where('role','Patient')->get()->random(),
            // 'name'=>User::where('role','Patient')->get('name')->str_random(),
            'doc_id'=>Rendezvou::all()->get('doctor_id')->random(),
            'patnt_id'=>Rendezvou::all()->get('patient_id')->random(),
        ];
    }
}
