<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()

    {
        $role=Arr::random(['Admin', 'Doctor', 'Patient', 'Assistant', 'Staff']);
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'picture' => fake()->imageUrl(33, 33, "user", true),
            'role' => $role,
            'speciality' => $role == 'Doctor' ? Arr::random(['Médecine_générale', 'Cardiologie', 'Dermatologie', 'Gastro_entérologie', 'Ophtalmologie', 'Pédiatrie', 'Pneumologie']) : null,
            // 'address' =>User::where('role', 'Patient')->fake()->address(),
            'sang' => User::where('role', 'Patient')->make([Arr::random(['O+', 'O-', 'A+', 'B+', 'AB+', 'A-', 'B-', 'AB-'])]),
            // 'birth' => User::where('role', 'Patient')->fake()->date(),
            'gender' => User::where('role', 'Patient')->make([Arr::random(['Homme', 'Femme'])]),
            'phone' => fake()->phoneNumber(),
            'mutuelle' => User::where('role', 'Patient')->make([Arr::random(['oui', 'non'])]),
            'active'=>fake()->boolean(),
            'user_id' => User::where('role', 'Admin')->orWhere('role', 'Doctor')->orWhere('role', 'Assistant')->get('id')->random(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
