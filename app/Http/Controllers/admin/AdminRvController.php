<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmationRv;
use App\Models\Dossiermedical;
use App\Models\Rendezvou;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminRvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $apponts = Rendezvou::from('rendezvous as r')
        ->join('users as u', DB::raw('u.id'), '=', DB::raw('r.patient_id'))
        ->select(DB::raw('r.*'),DB::raw('u.name'), DB::raw('u.phone'))
        ->orderby('r.time')
        ->paginate(5); */

        $apponts = Rendezvou::orderby('time')->paginate(5);
        return view('admin.appointmt.listApptmt', ['apponts' => $apponts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appointmt.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            // 'name' => 'required|string',
            // 'phone' => 'required|numeric',
            // 'email' => 'email|required',
            // 'doctor' => 'required|string',
            'time' => 'required|date|unique:rendezvous|after: 1 days',
            'disease' => 'required|string',
            'motif' => 'required|string'
        ]);
        $validate['state'] = "Valider";
        $validate['patient_id'] = User::where('name', $_POST['name'])->first()->id;
        $validate['doctor_id'] = User::where('name', $_POST['doctor'])->first()->id;
        $validate['createdBy_id'] = Auth::user()->id;
        // $validate['dossiermedical_id'] = User::where('name',$_POST['name'])
        // ->join('dossiermedicals','dossiermedicals.patnt_id','users.id','dossiermedicals.doc_id','users.id')
        // ->first()->id;
        $appont = Rendezvou::create($validate);
        if (isset($appont)) {
            Mail::to($appont->patient->email)->send(new ConfirmationRv(['name' => $appont->patient->name, 'doctor' => $appont->doctor->name, 'time' => $appont->time]));
            return redirect()->route('adApp.index')->with('success', 'Rendez-vous ajouter avec succées');
        }
        return back()->with('error', 'Rendez-vous non inseré');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appont = Rendezvou::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $oldappont = Rendezvou::find($id);
        $oldappont->disease = $request['disease'];
        $oldappont->motif = $request['motif'];
        $oldappont->state = $request['state'];
        $oldappont['doctor_id'] = User::where('name', $_POST['doctor'])->first()->id;

        if ($oldappont->save()) {
            return redirect()->route('adApp.index')->with('success', 'Informations modifiés avec succées');
        } else {
            return back()->with('error', "la modification est echoué");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appont = Rendezvou::find($id);
        $appont->delete();
        return redirect()->route('adApp.index');
    }
    public function searchAppont(Request $request)
    {
        $query = $request->search;
        $user = User::orderBy('id', 'DESC')
            ->where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('email', 'LIKE', '%' . $query . '%')
            ->orWhere('phone', 'LIKE', '%' . $query . '%')
            ->first();
            $appont = $user->patientRendezVous()
        // ->whereHas('patientRendezVous',function($q)use($query){
        //         $q ->orWhere('state', 'LIKE', '%' . $query . '%')
        //         ->orWhere('disease', 'LIKE', '%' . $query . '%')
        //         ->orWhere('motif', 'LIKE', '%' . $query . '%')
        //         ->where('id', Auth::user()->id)
        //         ->where('role', 'Patient');

        //     })
        //     ->orWhere('rendezvous.state', 'LIKE', '%' . $query . '%')
        //     ->orWhere('rendezvous.disease', 'LIKE', '%' . $query . '%')
        //     ->orWhere('rendezvous.motif', 'LIKE', '%' . $query . '%')
            ->get();
        $sum = count($appont);
        //  dd($appont);
        return view('admin.appointmt.searchApptmt', compact('appont', 'sum'));
    }
}
