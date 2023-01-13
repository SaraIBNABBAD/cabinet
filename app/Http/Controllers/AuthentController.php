<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
