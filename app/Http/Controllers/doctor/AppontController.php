<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmationRv;
use App\Models\Dossiermedical;
use App\Models\Rendezvou;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AppontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $apponts=Rendezvou::where('doctor_id', Auth::user()->id)->paginate(5);
        $apponts = Rendezvou::from('rendezvous as r')
        ->join('users as u', DB::raw('u.id'), '=', DB::raw('r.patient_id'))
        ->select(DB::raw('r.*'), DB::raw('u.name'), DB::raw('u.phone'))
        ->where('doctor_id', Auth::user()->id)
        ->orderby('r.time')->paginate(5);
        
        return view('doctor.appointmt.listAppt', ['apponts' => $apponts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.appointmt.add');
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
            // 'name' => 'required|string',
            // 'phone' => 'required|numeric',
            // 'email' => 'email|required',
            // 'address' => 'string',
            // 'doctor' => 'required|string',
            'time' => 'required|date|unique:rendezvous|after: 1 days',
            'disease' => 'required|string',
            'motif' => 'required|string'
        ]);
        
         
            $validated['patient_id'] = User::where('name', $_POST['name'])->first()->id;
            // $validated['dossiermedical_id'] = Dossiermedical::where('email', $validated['email'])->first()->id;
            $validated['doctor_id'] = Auth::user()->id;
            $validated['state'] = "Valider";
            $validated['createdBy_id'] = Auth::user()->id;
            $appont = Rendezvou::create($validated);
            if (isset($appont)) {
                Mail::to($appont->patient->email)->send(new ConfirmationRv(['name'=>$appont->patient->name,'doctor'=>$appont->doctor->name,'time'=>$appont->time]));
                return redirect()->route('docApp.index')->with('success', 'Rendez-vous ajouté avec succès');
            } else {
                return back()->with('error', 'Rendez-vous non inseré');
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
        // $oldappont['patient_id'] = User::where('name', $_POST['name'])->first()->id;
        $oldappont->time = $request['time'];
        $oldappont->motif = $request['motif'];
        $oldappont->state = $request['state'];

        if ($oldappont->save()) {
            return redirect()->route('docApp.index')->with('success', 'Informations modifiés avec succès');
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
        return redirect()->route('docApp.index')->with('success', 'Rendez-vous supprimé');
    }
}
