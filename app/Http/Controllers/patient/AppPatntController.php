<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Rendezvou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppPatntController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appnts = Rendezvou::where('name',Auth::user()->name)->get();
        return view('patient.appointment.listAppt', ['appnts'=>$appnts]);
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
            'name' => 'required|string',
            'phone' => 'required|numeric',
            // 'email' => 'email|required',
            'address' => 'string',
            'time' => 'required|date|unique:rendezvous|after: 1 days',
            'doctor' => 'required|string',
            'disease' => 'required|string',
            'motif' => 'required|string'
        ]);
        $validated['createdBy_id']= Auth::user()->id;
        $appnt = Rendezvou::create($validated);
        if(isset($appnt)){
            return redirect()->route('rendezVous.index')->with('success','Rndez-vous ajouter avec succées');
        }
        return back()->with('error','Rendez-vous non inseré');
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
        $oldappnt->name = $request['name'];
        $oldappnt->phone = $request['phone'];
        $oldappnt->time = $request['time'];
        $oldappnt->disease = $request['disease'];
        $oldappnt->motif = $request['motif'];
        $oldappnt->state = $request['state'];
        $oldappnt->save();
        return redirect()->route('rendezVous.index');
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
        return redirect()->route('rendezVous.index');
    }
}
