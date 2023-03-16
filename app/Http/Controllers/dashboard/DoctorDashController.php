<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorDashController extends Controller
{
    public function templateDoctor()
    {
        return view('doctor.templateDt');
    }
    public function ProfileDoc(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('doctor.doc_profile_view',compact('adminData'));
    }
    public function EditProfileDoc(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('doctor.doc_profile_edit',compact('editData'));
    }
    public function EditedProfileDoc(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->email=$request->email;
        $data->address=$request->address;
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $nameFile = 'picture' .$data['name']. '.' . $file->getClientOriginalExtension();
            $photo = $request->file('picture')->storeAs('img/user', $nameFile, 'public');
            $data->picture = 'storage/' . $photo;
        }
        $data->save();
        return redirect()->route('doc.profile');
    }
}


