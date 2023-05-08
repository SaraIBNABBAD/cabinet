<?php

namespace App\Http\Controllers;

use App\Mail\ValidationCompte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthentController extends Controller
{
    
    public function displaySignup()
    {
        return view('signUp');
    }
  
    public function displayLogin()
    {
        return view('login');
    }
    
    public function signup(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'numeric|unique:users',
            'email' => 'email|unique:users',
            'address' => 'required|string',
            'sang' => 'string',
            'gender'=>'required|string',
            'birth'=>'date|required',
            'mutuelle'=>'required|string',
            'password' => 'required|confirmed',
        ]);
        // dd($validated);
        $validated['role'] = "Patient";
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $fName = 'picture' .$validated['name']. '.' . $file->getClientOriginalExtension();
            $photo = $request->file('picture')->storeAs('img/user', $fName, 'public');
            $validated['picture'] = 'storage/' . $photo;
        }
        $validated['password'] = Hash::make('password');
        $user = User::create($validated);
        Mail::to($user->email)->send(new ValidationCompte(['name'=>$user->name,'email'=>$user->email]));
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
                return redirect()->route('admin.state');
            } else if ($user->role == "Patient") {
                return redirect()->route('rendezVous.index');
            } else if ($user->role == "Doctor") {
                return redirect()->route('docApp.index');
            }elseif ($user->role == "Assistant"){
                return redirect()->route('asPoint.index');
            }
        }return back()->withErrors([
            'password' => "Les donnees saisies sont incorrect veuillez les verifier s'il vous plait.",
        ])->onlyInput('password');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
