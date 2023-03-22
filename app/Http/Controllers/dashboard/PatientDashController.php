<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dossiermedical;
use App\Models\Rendezvou;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PatientDashController extends Controller
{
    public function templatePatient()
    {
        return view('patient.templatePt');
    }
    public function displayDoc()
    {
        $docs = Rendezvou::from('rendezvous as r')
            ->join('users as u', DB::raw('u.id'), '=', DB::raw('r.doctor_id'))
            ->select(DB::raw('u.*'))
            ->where('patient_id', Auth::user()->id)->groupby('u.id')->paginate(5);
        return view('patient.listDoc', ['docs' => $docs]);
    }
    public function displayFolder()
    {
        $folders = Dossiermedical::from('dossiermedicals as d')
            ->join('users as u', DB::raw('u.id'), '=', DB::raw('d.doc_id'))
            ->select(DB::raw('u.name'), DB::raw('d.*'))
            ->where('patnt_id', Auth::user()->id)->paginate(5);
        return view('patient.folder', ['folders' => $folders]);
    }
    public function dispalyDash()
    {
        return view('patient.dash');
    }
    public function ProfilePatnt()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('patient.patnt_profile_view', compact('adminData'));
    }
    public function EditProfilePatnt()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('patient.patnt_profile_edit', compact('editData'));
    }
    public function EditedProfilePatnt(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $nameFile = 'picture' . $data['name'] . '.' . $file->getClientOriginalExtension();
            $photo = $request->file('picture')->storeAs('img/patient', $nameFile, 'public');
            $data->picture = 'storage/' . $photo;
        }
        $data->save();
        return redirect()->route('patnt.profile');
    }
    public function searchdocs(Request $request)
    {
        $query = $request->search;
        $doc = User::orderBy('id', 'DESC')
            ->where('name', 'LIKE', '%' . $query . '%')
            ->where('role', 'Doctor')
            ->join('rendezvous', DB::raw('users.id'), '=', DB::raw('rendezvous.doctor_id'))
            ->select( DB::raw('users.*'))
            ->where('patient_id', Auth::user()->id)
            ->groupby('users.id')
            ->get();
        return view('patient.searchhDoc', compact('doc'));
    }
    public function searchFolder(Request $request){
        $query = $request->search;
        $folder = User::orderBy('id', 'DESC')
        ->where('name', 'LIKE', '%' . $query . '%')
        ->where('role', 'Doctor')
        ->join( 'dossiermedicals', DB::raw( 'users.id' ), '=', DB::raw( 'dossiermedicals.doc_id' ) )
        ->select( DB::raw( 'users.name' ),DB::raw( 'users.picture' ),DB::raw( 'dossiermedicals.*' ))
        ->where('patnt_id',Auth::user()->id)
        ->get();
        return view('patient.searchhfolder', compact('folder'));
    }
}
