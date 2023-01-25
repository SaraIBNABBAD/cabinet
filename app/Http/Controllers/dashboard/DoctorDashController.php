<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorDashController extends Controller
{
    public function templateDoctor()
    {
        return view('doctor.templateDt');
    }
}
