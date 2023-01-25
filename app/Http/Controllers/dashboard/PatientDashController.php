<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientDashController extends Controller
{
    public function templatePatient()
    {
        return view('patient.templatePt');
    }

}
