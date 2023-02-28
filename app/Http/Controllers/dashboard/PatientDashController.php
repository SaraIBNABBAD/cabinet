<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dossiermedical;
use App\Models\Rendezvou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PatientDashController extends Controller
{
    public function templatePatient()
    {
        return view('patient.templatePt');
    }
    public function displayDoc()
    {
        $docs = Rendezvou::where('patient_id', Auth::user()->id)->paginate(5);
        return view('patient.listDoc', ['docs' => $docs]);
    }
    public function displayFolder()
    {
        $folders = Dossiermedical::from( 'dossiermedicals as d' )
        ->join( 'users as u', DB::raw( 'u.id' ), '=', DB::raw( 'd.doc_id' ) )
        ->select( DB::raw( 'u.name' ),DB::raw('d.*') )
        ->where('patnt_id', Auth::user()->id)->paginate(5);
        return view('patient.folder', ['folders' => $folders]);
    }
    public function dispalyDash()
    {
        return view('patient.dash');
    }
}
