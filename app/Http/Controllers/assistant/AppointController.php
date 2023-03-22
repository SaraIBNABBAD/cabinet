<?php

namespace App\Http\Controllers\assistant;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmationRv;
use App\Models\Dossiermedical;
use App\Models\Rendezvou;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AppointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $name=User::from('users as u')
        // ->join('rendezvous as r',DB::raw('u.id'), '=', DB::raw('r.patient_id'))
        // ->where('role','Patient')
        // ->select(DB::raw('u.name'))
        // ->get();
        // $doc=User::from('users as u')
        // ->join('rendezvous as r',DB::raw('u.id'), '=', DB::raw('r.doctor_id'))
        // ->where('role','Doctor')
        // ->select(DB::raw('u.name'))
        // ->get();
        $appnts = Rendezvou::from('rendezvous as r')
        ->join('users as u', DB::raw('u.id'), '=', DB::raw('r.patient_id'))
        ->select(DB::raw('r.*'),DB::raw('u.name'), DB::raw('u.phone'))
        ->orderby('r.time')
        ->paginate(5);
        return view('assistant.appointement.list', ['appnts' => $appnts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assistant.appointement.add');
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
            // 'address' => 'string',
            // 'doctor' => 'required|string',
            'time' => 'required|date|unique:rendezvous|after: 1 days',
            'disease' => 'required|string',
            'motif' => 'required|string'
        ]);
        $validate['state'] = "Valider";

        $validate['patient_id'] = User::where('name', $_POST['name'])->first()->id;
        $validate['doctor_id'] = User::where('name', $_POST['doctor'])->first()->id;
        $validate['createdBy_id'] = Auth::user()->id;
        // $validate['dossiermedical_id'] = Dossiermedical::where('id', $_POST['id'])->first()->id;
        $appont = Rendezvou::create($validate);
        if (isset($appont)) {
            Mail::to($appont->patient->email)->send(new ConfirmationRv(['name'=>$appont->patient->name,'doctor'=>$appont->doctor->name,'time'=>$appont->time]));
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
        $oldappnt->state = $request['state'];
        $oldappnt['doctor_id'] = User::where('name', $_POST['doctor'])->first()->id;

        if ($oldappnt->save()) {
            return redirect()->route('asPoint.index')->with('success', 'Informations modifiés avec succées');
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
        $appnt = Rendezvou::find($id);
        $appnt->delete();
        return redirect()->route('asPoint.index')->with('success', 'Rendez-vous supprimé');
    }
    public function searchAppont(Request $request)
    {
        $query = $request->search;
        $appnt = User::orderBy('id', 'DESC')->where('name', 'LIKE', '%' . $query . '%')
        ->join('rendezvous','rendezvous.patient_id','users.id')
        ->select( DB::raw( 'users.name' ),DB::raw( 'users.phone' ),DB::raw( 'rendezvous.*' ))
        ->get();
        return view('assistant.appointement.searchAppn', compact('appnt'));
    }
}
