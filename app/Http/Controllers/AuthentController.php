<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthentController extends Controller
{
    public function displaySignup(){
        
        return view('admin.signUp');
    }
    public function displayLog(){
        
        return view('admin.addDoctor');
    } 
    public function displayLogin(){
        return view('admin.login');
    }
    public function displaystaff(){
        return view('admin.addStaff');
    }
    public function displatAddpatient(){
        return view('admin.addptnt');
    }

    public function displatAddrdv(){
        return view('admin.addrdv');
    }
    public function signup(Request $request){
       
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);
        // dd($validated);
        if ($request->hasFile('picture')){
            $file = $request->file('picture');
            $fName = 'picture' . '.' . $file->getClientOriginalName();
            $photo = $request->file('picture')->storeAs('img/user', $fName, 'public');
            $validated['picture'] = 'storage/' . $photo;
        }
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        return redirect()->route('login');
    }
}
