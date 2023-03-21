<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdminDashController extends Controller
{
    public function templateAdmin()
    {
        return view('admin.templateAd');
    }
    public function displayDash()
    {
        return view('admin.dashboard');
    }

    public function Profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        $Patnt = User::all()->where('role', 'Patient');
        $countpat = count($Patnt);
        $Patnt = User::all()->where('role', 'Doctor');
        $countdoc = count($Patnt);
        return view('admin.admin_profile_view', compact('adminData', 'countpat', 'countdoc'));
    }
    public function EditProfile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }
    public function EditedProfile(Request $request)
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
            $photo = $request->file('picture')->storeAs('img/admin', $nameFile, 'public');
            $data->picture = 'storage/' . $photo;
        }
        $data->save();
        return redirect()->route('admin.profile');
    }
}
