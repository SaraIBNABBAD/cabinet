<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\ValidationCompte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = User::where('role', 'patient')->paginate(5);
        return view('admin.patient.listPtnt', ['patients' => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.patient.addptnt');
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
            'gender' => 'required|string',
            'birth' => 'date|required',
            'mutuelle' => 'required|string',
            'password' => 'required|confirmed',
        ]);
        $validate['role'] = "Patient";

        $validate['user_id'] = Auth::user()->id;

        $validate['password'] = Hash::make('password');
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $nameFile = 'picture' . $validate['name'] . '.' . $file->getClientOriginalExtension();
            $photo = $request->file('picture')->storeAs('img/patient', $nameFile, 'public');
            $validate['picture'] = 'storage/' . $photo;
        }
        $patient = User::create($validate);
        if (isset($patient)) {
            Mail::to($patient->email)->send(new ValidationCompte(['name' => $patient->name, 'email' => $patient->email]));
            return redirect()->route('patients.index')->with('success', "Patient est bien ajouté");
        } else {
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
        return view('admin.patient.update', ['patient' => $patient]);
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
        $password = 'password';
        $oldpatient->password = Hash::make($password);
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $nameFile = 'picture' . $oldpatient['name'] . '.' . $file->getClientOriginalExtension();
            $photo = $request->file('picture')->storeAs('img/patient', $nameFile, 'public');
            $oldpatient->picture = 'storage/' . $photo;
        }
        if ($oldpatient->save()) {
            return redirect()->route('patients.index')->with('success', "Information modifié avec succès");
        } else {
            return back()->with('error', "La modification est échoué");
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
        return redirect()->route('patients.index')->with('success', 'Patient est supprimé');
    }

    public function search(Request $request)
    {
        $query = $request->search;
        $patient = User::orderBy('id', 'DESC')->where('name', 'LIKE', '%' . $query . '%')->where('role', 'Patient')->get();
        return view('search', compact('patient'));
    }
}
