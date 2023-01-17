<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthentController extends Controller
{
    public function templateAdmin(){
        return view('admin.templateAd');
    }
    public function templatePatient(){
        return view('patient.templatePt');
    }
    public function displaySignup()
    {

        return view('signUp');
    }
    public function displayLog()
    {

        return view('admin.addDoctor');
    }
    public function displayLogin()
    {
        return view('login');
    }
    public function displaystaff()
    {
        return view('admin.addStaff');
    }
    public function displatAddpatient()
    {
        return view('admin.addptnt');
    }

    public function displatAddrdv()
    {
        return view('admin.addrdv');
    }
    public function signup(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'role' => 'required',
        ]);
        // dd($validated);
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $fName = 'picture' . '.' . $file->getClientOriginalName();
            $photo = $request->file('picture')->storeAs('img/user', $fName, 'public');
            $validated['picture'] = 'storage/' . $photo;
        }
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        return redirect()->route('login');
    }
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role == "Admin") {
                return redirect()->route('dashboardAdmin');
            } else if ($user->role == "Patient") {
                return redirect()->route('dashboardPatient');
            } else if ($user->role == "Docteur") {
                return redirect()->route('dashboardDocteur');
            } else {
                return redirect()->route('dashboardAssistant');
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
