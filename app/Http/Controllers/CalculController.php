<?php

namespace App\Http\Controllers;

use App\Models\Rendezvou;
use App\Models\User;
use Illuminate\Http\Request;

class CalculController extends Controller
{
    public function SumPatient()
    {
        $Patnt = User::all()->where('role', 'Patient');
        $sumPatnt = count($Patnt);
        return view('admin.dashboard',compact($sumPatnt));
        // dd($sumPatnt);
    }
    public function SumDoctor()
    {
        $doc = User::all()->where('role', 'Doctor');
        $sumDoc = count($doc);
        // return view('admin.dashboard',compact($sumDoc));
        dd($sumDoc);
    }
    public function SumAssist()
    {
        $assist = User::all()->where('role', 'Assistant');
        $sumAssist = count($assist);
        // return view('admin.dashboard',compact($sumAssist));
        dd($sumAssist);
    }
    public function SumAppont()
    {
        $appont = Rendezvou::all()->where('state', 'Valider')->orWhere('state', 'Terminer')->get();
        $sumAppont = count($appont);
        // return view('admin.dashboard',compact($sumAppont));
        dd($sumAppont);
    }
}
