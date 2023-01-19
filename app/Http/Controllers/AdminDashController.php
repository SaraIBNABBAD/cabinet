<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashController extends Controller
{
    public function templateAdmin()
    {
        return view('admin.templateAd');
    }
}
