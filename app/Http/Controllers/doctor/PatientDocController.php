<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Mail\ValidationCompte;
use App\Models\Rendezvou;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PatientDocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $patients=User::from( 'users as u' )
        ->join( 'rendezvous as r', DB::raw( 'u.id' ), '=', DB::raw( 'r.patient_id' ) )
        ->select( DB::raw( 'u.*' ))
        ->where('r.doctor_id',Auth::user()->id)
        ->groupby('u.id')
        ->paginate(5);

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

        $validate['password']=Hash::make( 'password');
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $nameFile = 'picture' .$validate['name']. '.' . $file->getClientOriginalExtension();
            $photo = $request->file('picture')->storeAs('img/patient', $nameFile, 'public');
            $validate['picture'] = 'storage/' . $photo;
        }
        $patient = User::create($validate);
        if(isset($patient)){
            Mail::to($patient->email)->send(new ValidationCompte(['name'=>$patient->name,'email'=>$patient->email]));
            return redirect()->route('Dpatients.index')->with('success', "Patient ajouté avec succès");
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
        $password='password';
        $oldpatient->password=Hash::make($password);
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $nameFile = 'picture' .$oldpatient['name']. '.' . $file->getClientOriginalExtension();
            $photo = $request->file('picture')->storeAs('img/patient', $nameFile, 'public');
            $oldpatient->picture = 'storage/' . $photo;
        }
        if ($oldpatient->save()) {
            return redirect()->route('Dpatients.index')->with('success',"Information modifié avec succès");
        } else {
            return back()->with('error',"La modification est échoué");
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
        return redirect()->route('Dpatients.index')->with('success','Membre supprimé');
    }
    public function searchPatnt(Request $request)
    {
        $query = $request->search;
        $patient = User::where('name', 'LIKE', '%' . $query . '%')
        ->orWhere('phone', 'LIKE', '%' . $query . '%')
        ->orWhere('gender', 'LIKE', '%' . $query . '%')
        ->orWhere('birth', 'LIKE', '%' . $query . '%')
        ->orWhere('sang', 'LIKE', '%' . $query . '%')
        ->orWhere('address', 'LIKE', '%' . $query . '%')
        
        ->where('role', 'Patient')
    

        // ->join( 'rendezvous', DB::raw('users.id'), '=', DB::raw('rendezvous.patient_id'))
        // ->where('rendezvous.doctor_id',Auth::user()->id)
        // ->groupby('users.phone')
        ->get();
        // dd($patient);
        $sumP = count($patient);
        return view('doctor.patient.searchPtnt', compact('patient','sumP'));
    }
}
