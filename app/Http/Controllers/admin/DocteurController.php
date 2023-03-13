<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\ValidationCompte;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class DocteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = User::where('role','doctor')->paginate(5);
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
        $validate = $request->validate([
            'name' => 'required|string',
            'phone' => 'numeric|unique:users',
            'email' => 'email|unique:users',
            'role' => 'required|string',
            'speciality' => 'required',
            'password' => 'required|confirmed',
        ]);
        $validate['user_id']=Auth::user()->id;
        if($request->hasFile('picture')){
            $file=$request->file('picture');
            $nameFile = 'picture' .$validate['name']. '.' . $file->getClientOriginalExtension();            
            $photo = $request->file('picture')->storeAs('img/user', $nameFile, 'public');
            $validate['picture']='storage/'.$photo;
        }
        $validate['password'] = Hash::make('password');
        $doctor = User::create($validate);
        if(isset($doctor)){
            Mail::to($doctor->email)->send(new ValidationCompte(['name'=>$doctor->name,'email'=>$doctor->email]));
            return redirect()->route('doctors.index')->with('success',"Docteur est ajouté avec succès");
        }else{
            return back()->with('error', "Docteur n'est pas ajouté");
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
        $password="password";
        $olddoctor->password=Hash::make($password);
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $nameFile = 'picture' .$olddoctor['name']. '.' . $file->getClientOriginalExtension();
            $photo = $request->file('picture')->storeAs('img/user', $nameFile, 'public');
            $olddoctor->picture = 'storage/' . $photo;
        }
        if ($olddoctor->save()) {
            return redirect()->route('doctors.index')->with('success',"Information modifié avec succès");
        } else {
            return back()->with('error','La modification est échoué');
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
        $doctor = User::find($id);
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success',"Docteur est supprimé");
    }
}
