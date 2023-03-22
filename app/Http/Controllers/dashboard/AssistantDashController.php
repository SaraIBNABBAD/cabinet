<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssistantDashController extends Controller
{
    public function templateAssistant()
    {
        return view('assistant.templateAss');
    }
    public function displayDoc(){
        $docs = User::where('role','doctor')->paginate(5);
        return view('assistant.listDoc',['docs'=>$docs]);
    }
    public function ProfileAss(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('assistant.assist_profile_view',compact('adminData'));
    }
    public function EditProfileAss(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('assistant.assist_profile_edit',compact('editData'));
    }
    public function EditedProfileAss(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->email=$request->email;
        $data->address=$request->address;
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $nameFile = 'picture' .$data['name']. '.' . $file->getClientOriginalExtension();
            $photo = $request->file('picture')->storeAs('img/staff', $nameFile, 'public');
            $data->picture = 'storage/' . $photo;
        }
        $data->save();
        return redirect()->route('assist.profile');
    }
    public function searchingDoc(Request $request)
    {
        $query = $request->search;
        $doc = User::orderBy('id', 'DESC')->where('name', 'LIKE', '%' . $query . '%')->where('role', 'Doctor')->get();

        if ($doc == null) {
            return back()->with('error', "Le nom que vous avez saisie n'existe pas");
        } else {
            return view('assistant.searchingDoc', compact('doc'));
        }
    }
}
