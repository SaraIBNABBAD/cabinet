<?php

namespace App\Http\Controllers;

use App\Models\User;

class TeamController extends Controller
{

    public function Team()
    {

        $doctors = User::where('role', 'Doctor')->get();

        return view('welcome', compact('doctors'));
    }
}
