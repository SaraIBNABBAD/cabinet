<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Rendezvou;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apponts = Rendezvou::all();
        return view('admin.appointmt.listApptmt',['apponts'=>$apponts]);
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
            'name' => 'required|string',
            'phone' => 'required|numeric',
            // 'email' => 'email|required',
            // 'address' => 'string',
            'time' => 'required|date|unique:rendezvous|after: 1 days',
            'doctor' => 'required|string',
            'disease' => 'required|string',
            'motif' => 'required|string'
        ]);
        $validate['state'] = "Valider";
        $verif = User::where('name',$validate['name'])->where('phone',$validate['phone']);
        if ($verif->exists()) {
            $validate['patient_id'] = User::where('name', $validate['name'])->where('phone', $validate['phone'])->first()->id;
            $validate['doctor_id'] = User::where('name', $validate['doctor'])->first()->id;
            $validate['createdBy_id']= Auth::user()->id;
            $appont = Rendezvou::create($validate);
            if(isset($appont)){
                return redirect()->route('adApp.index')->with('success','Rendez-vous ajouter avec succées');
            }
            return back()->with('error','Rendez-vous non inseré');
        } else {
            return back()->with('error', "Ce patient n'est pas enregistré");
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
        $oldappont->name = $request['name'];
        $oldappont->phone = $request['phone'];
        $oldappont->time = $request['time'];
        $oldappont->disease = $request['disease'];
        $oldappont->doctor = $request['doctor'];
        $oldappont->motif = $request['motif'];
        $oldappont->state = $request['state'];
       
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
}
