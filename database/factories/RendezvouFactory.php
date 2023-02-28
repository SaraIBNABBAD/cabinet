<?php

namespace Database\Factories;

use App\Models\Dossiermedical;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rendezvou>
 */
class RendezvouFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'time'=>fake()->dateTime(),
            // 'prescription',
            'disease'=>User::where('role','Doctor')->get('speciality')->random(),
            'motif'=>Arr::random(['Consultation','Traitement']),
            'state'=>Arr::random(['Terminer','Annuler','Valider']),
            'name'=>User::where('role','Patient')->get('name')->random(),
            'doctor'=>User::where('role','Doctor')->get('name')->random(),
            'phone'=>User::where('role','Patient')->get('phone')->random(),
            'patient_id'=>User::where('role','Patient')->get('id')->random(),
            'doctor_id'=>User::where('role','Doctor')->get('id')->random(),
            'createdBy_id'=>User::where('role', 'Admin')->orWhere('role', 'Doctor')->orWhere('role', 'Assistant')->get('user_id')->random(),
            'dossiermedical_id'=>Dossiermedical::all()->get('id')->random(),
        ];
    }
}
