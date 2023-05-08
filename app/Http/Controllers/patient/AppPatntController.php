<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmationRv;
use App\Models\Rendezvou;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AppPatntController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appnts = Rendezvou::from('rendezvous as r')
            ->join('users as u', DB::raw('u.id'), '=', DB::raw('r.doctor_id'))
            ->select(DB::raw('r.*'), DB::raw('u.name'))
            ->where('patient_id', Auth::user()->id)->orderby('r.time')->paginate(5);
        return view('patient.appointment.listAppt', ['appnts' => $appnts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.appointment.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([

            'time' => 'required|date|unique:rendezvous|after: 1 days',
            'disease' => 'required|string',
            'motif' => 'required|string',

        ]);
        $verif = User::where('id', Auth::user()->id)->where('role', 'Patient');
        if ($verif->exists()) {

            $validated['state'] = "Valider";
            $validated['patient_id'] = Auth::user()->id;
            $validated['doctor_id'] = User::where('name', $_POST['doctor'])->first()->id;
            $validated['createdBy_id'] = Auth::user()->id;
            $appnt = Rendezvou::create($validated);
            if (isset($appnt)) {
                Mail::to(Auth::user()->email)->send(new ConfirmationRv(['name' => Auth::user()->name, 'doctor' => $appnt->doctor->name, 'time' => $appnt->time]));
                return redirect()->route('rendezVous.index')->with('success', 'Rendez-vous ajouter avec succées');
            } else {
                return back()->with('error', 'Rendez-vous non inseré');
            }
        } else {
            return back()->with('error', "Ce membre n'existe pas, Veuillez l'enregistrer");
        }
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
        $appnt = Rendezvou::find($id);
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
        $oldappnt = Rendezvou::find($id);
        $oldappnt->time = $request['time'];
        $oldappnt->disease = $request['disease'];
        $oldappnt->motif = $request['motif'];
        $oldappnt['doctor_id'] = User::where('name', $_POST['doctor'])->first()->id;
        $oldappnt['createdBy_id'] = Auth::user()->id;
        $oldappnt->state = "Valider";
        if ($oldappnt->save()) {
            return redirect()->route('rendezVous.index')->with('success', "Les informations est bien modifié");
        } else {
            return back()->with('error', "Modification échoué");
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
        $appnt = Rendezvou::find($id);
        $appnt->delete();
        return redirect()->route('rendezVous.index')->with('success', 'Rendez-vous est supprimé');
    }
    public function searchAppont(Request $request)
    {
        $query = $request->search;
        $from = $request->from;
        $to = $request->to;
        $appnt = Rendezvou::orderBy('id', 'asc')
            // ->where('name', 'LIKE', '%' . $query . '%')
            // ->where('role', 'Doctor')
            // ->join('rendezvous', DB::raw('users.id'), '=', DB::raw('rendezvous.doctor_id'))
            // ->select(DB::raw('rendezvous.*'), DB::raw('users.name'))
            // ->where('patient_id', Auth::user()->id)


            ->whereBetween('time',[$from,$to])
            
            
               ->orWhere('disease', 'LIKE', '%' . $query . '%')
               ->orWhere('motif', 'LIKE', '%' . $query . '%')
            //    ->where('name', 'LIKE', '%' . $query . '%')
            ->where('patient_id', Auth::user()->id)->with('doctor')
            ->get();
            
        return view('patient.appointment.searchAppt', compact('appnt'));
    }
}
