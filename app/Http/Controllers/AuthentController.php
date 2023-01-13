<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthentController extends Controller
{
    public function displaySignup(){
        
        return view('admin.signUp');
    }
}
