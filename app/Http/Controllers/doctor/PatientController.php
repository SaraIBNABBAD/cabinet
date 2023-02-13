<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\Rendezvou;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = User::where('role', 'Patient')->join('rendezvous','rendezvous.patient_id','users.id')->where('rendezvous.doctor_id',Auth::user()->id)->get();
        return view('doctor.patient.listPtnt', ['patients' => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.patient.addptnt');
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
            'phone' => 'numeric|unique:users',
            'email' => 'email|unique:users',
            'address' => 'required|string',
            'sang' => 'string',
            'gender'=>'required|string',
            'birth'=>'date|required',
            'mutuelle'=>'required|string',
            'password' => 'required|confirmed',
        ]);
        $validate['role'] = "Patient";

        $validate['user_id']=Auth::user()->id;

        $validate['password']=Hash::make( $validate['password']);
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $nameFile = 'picture' .$validate['name']. '.' . $file->getClientOriginalExtension();
            $photo = $request->file('picture')->storeAs('img/patient', $nameFile, 'public');
            $validate['picture'] = 'storage/' . $photo;
        }
        $patient = User::create($validate);
        if(isset($patient)){
            return redirect()->route('Dpatient.index')->with('success', "Patient bien'est pas ajouté");
        }else{
            return back()->with('error', "Patient n'est pas ajouté");
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
        $patient = User::find($id);
        return view('doctor.patient.update', ['patient' => $patient]);
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
        $oldpatient = User::find($id);
        $oldpatient->name = $request['name'];
        $oldpatient->phone = $request['phone'];
        $oldpatient->email = $request['email'];
        $oldpatient->address = $request['address'];
        $oldpatient->role = 'Patient';
        $oldpatient->sang = $request['sang'];
        $oldpatient->gender = $request['gender'];
        $oldpatient->birth = $request['birth'];
        $oldpatient->mutuelle = $request['mutuelle'];
        $password=$request['password'];
        $oldpatient->password=Hash::make($password);
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $nameFile = 'picture' .$oldpatient['name']. '.' . $file->getClientOriginalExtension();
            $photo = $request->file('picture')->storeAs('img/patient', $nameFile, 'public');
            $oldpatient->picture = 'storage/' . $photo;
        }
        if ($oldpatient->save()) {
            return redirect()->route('Dpatient.index')->with('success','Informations modifiés avec succées');
        } else {
         return back()->with('error',"la modification est echoué");
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
        $patient = User::find($id);
        $patient->delete();
        return redirect()->route('Dpatient.index')->with('success','Membre supprimé');
    }
}
