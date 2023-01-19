<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DocteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = User::where('role','doctor')->get();
        return view('admin.docteur.listDoc',['doctors'=>$doctors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.docteur.addDoctor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor = new User();
        $doctor->name = $request['name'];
        $doctor->phone = $request['phone'];
        $doctor->email = $request['email'];
        $doctor->role = $request['role'];
        $doctor->speciality = $request['speciality'];
        $password="pass";
        $doctor->password=Hash::make($password);
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $nameFile = 'picture' . '.' . $file->getClientOriginalExtension();
            $photo = $request->file('picture')->storeAs('img/user', $nameFile, 'public');
            $doctor->picture = 'storage/' . $photo;
        }
        $doctor->save();
        return redirect()->route('doctors.index');
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
        $doctor = User::find($id);
        return view('admin.docteur.update',['doctor'=>$doctor]);
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
        $olddoctor = User::find($id);
        $olddoctor->name = $request['name'];
        $olddoctor->phone = $request['phone'];
        $olddoctor->email = $request['email'];
        $olddoctor->role = $request['role'];
        $olddoctor->speciality = $request['speciality'];
        $password="pass";
        $olddoctor->password=Hash::make($password);
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $nameFile = 'picture' . '.' . $file->getClientOriginalExtension();
            $photo = $request->file('picture')->storeAs('img/user', $nameFile, 'public');
            $olddoctor->picture = 'storage/' . $photo;
        }
        $olddoctor->save();
        return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = User::find($id);
        $doctor->delete();
        return redirect()->route('doctors.index');
    }
}
