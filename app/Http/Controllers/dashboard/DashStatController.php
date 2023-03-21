<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Controller;
use App\Models\Rendezvou;
use Illuminate\Support\Facades\Auth;


class DashStatController extends Controller
{
    public function templateAdmin()
    {
        return view('admin.templateAd');
    }
    public function displayDash()
    {
        return view('admin.dashboard');
    }

    public function State()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        $Patnt = User::all()->where('role', 'Patient');
        $countpat = count($Patnt);
        $Doc = User::all()->where('role', 'Doctor');
        $countdoc = count($Doc);
        $Asst = User::all()->where('role', 'Assistant');
        $countass = count($Asst);
        $Staff = User::all()->where('role', 'Staff');
        $countstaff = count($Staff);
        $Rdv = Rendezvou::all();
        $countrdv = count($Rdv);

        return view('admin.admin_dashboard_view', compact('adminData', 'countpat', 'countdoc', 'countass', 'countstaff', 'countrdv'));
    }
}
