<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = User::where('role','assistant')->get();
        return view('admin.staff.listStaff', ['staffs' => $staffs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.addStaff');
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
            'password' => 'required|confirmed',
        ]);
        $validate['user_id']=Auth::user()->id;

        $validate['password']=Hash::make($validate['password']);
        
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $nameFile = 'picture' .$validate['name']. '.' . $file->getClientOriginalExtension();
            $photo = $request->file('picture')->storeAs('img/staff', $nameFile, 'public');
            $validate['picture'] = 'storage/' . $photo;
        }

        $staff = User::create($validate);
        if(isset($staff)){
            return redirect()->route('staffs.index');
        }else{
            return back()->with('error');
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
        $staff = User::find($id);
        return view('admin.staff.update',['staff' => $staff]);
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
        $oldstaff = User::find($id);
        $oldstaff->name = $request['name'];
        $oldstaff->phone = $request['phone'];
        $oldstaff->email = $request['email'];
        $oldstaff->address = $request['address'];
        $oldstaff->role = $request['role'];
        $oldstaff->sang = $request['sang'];
        $oldstaff->gender = $request['gender'];
        $oldstaff->birth = $request['birth'];
        $oldstaff->mutuelle = $request['mutuelle'];
        $password="pass";
        $oldstaff->password=Hash::make($password);
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $nameFile = 'picture' .$oldstaff['name']. '.' . $file->getClientOriginalExtension();
            $photo = $request->file('picture')->storeAs('img/patient', $nameFile, 'public');
            $oldstaff->picture = 'storage/' . $photo;
        }
        $oldstaff->save();
        return redirect()->route('staffs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = User::find($id);
        $staff->delete();
        return redirect()->route('staffs.index');
    }
}
