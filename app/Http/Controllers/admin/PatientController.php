<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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
        $patients = User::where('role', 'patient')->get();
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
        $patient = new User();
        $patient->name = $request['name'];
        $patient->phone = $request['phone'];
        $patient->email = $request['email'];
        $patient->address = $request['address'];
        $patient->role = 'Patient';
        $patient->sang = $request['sang'];
        $patient->gender = $request['gender'];
        $patient->birth = $request['birth'];
        $patient->mutuelle = $request['mutuelle'];
        $password="pass";
        $patient->password=Hash::make($password);
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $nameFile = 'picture' .$patient['name']. '.' . $file->getClientOriginalExtension();
            $photo = $request->file('picture')->storeAs('img/patient', $nameFile, 'public');
            $patient->picture = 'storage/' . $photo;
        }
        $patient->save();
        return redirect()->route('patients.index');
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
        $password="pass";
        $oldpatient->password=Hash::make($password);
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $nameFile = 'picture' .$oldpatient['name']. '.' . $file->getClientOriginalExtension();
            $photo = $request->file('picture')->storeAs('img/patient', $nameFile, 'public');
            $oldpatient->picture = 'storage/' . $photo;
        }
        $oldpatient->save();
        return redirect()->route('patients.index');
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
        return redirect()->route('patients.index');
    }
}
