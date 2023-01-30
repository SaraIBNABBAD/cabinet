<?php

namespace App\Http\Controllers\assistant;

use App\Http\Controllers\Controller;
use App\Models\Rendezvou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appnts = Rendezvou::all();
        return view('assistant.appointement.list',['appnts'=>$appnts]);
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
        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|numeric',
            // 'email' => 'email|required',
            'address' => 'string',
            'time' => 'required|date|unique:rendezvous|after: 1 days',
            // 'hour' => 'required|unique:rendezvous|',
            'disease' => 'required|string',
            'motif' => 'required|string'
        ]);
        $validated['assistant_id']= Auth::user()->id;
        $appnt = Rendezvou::create($validated);
        if(isset($appnt)){
            return redirect()->route('asPoint.create')->with('success','Rndez-vous ajouter avec succées');
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
        $oldappnt->address = $request['address'];
        $oldappnt->date = $request['date'];
        $oldappnt->hour = $request['hour'];
        $oldappnt->disease = $request['disease'];
        $oldappnt->motif = $request['hour'];
        $oldappnt->state = $request['state'];
       

        $oldappnt ->save();
        return redirect()->route('asPoint.index');
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
        return redirect()->route('asPoint.index');
    }
}
