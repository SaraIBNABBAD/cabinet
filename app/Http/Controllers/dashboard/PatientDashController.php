<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Rendezvou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientDashController extends Controller
{
    public function templatePatient()
    {
        return view('patient.templatePt');
    }
    public function displayDoc(){
        $docs = Rendezvou::where('name', Auth::user()->name)->get();
        return view('patient.listDoc',['docs'=>$docs]);
    }

}
