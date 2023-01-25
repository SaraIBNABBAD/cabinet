<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashController extends Controller
{
    public function templateAdmin()
    {
        return view('admin.templateAd');
    }
    public function displayDash()
    {
        return view('admin.dashboard');
    }
}
