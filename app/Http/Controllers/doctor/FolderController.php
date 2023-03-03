<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\Dossiermedical;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $folders = Dossiermedical::from( 'dossiermedicals as d' )
        ->join( 'users as u', DB::raw( 'u.id' ), '=', DB::raw( 'd.patnt_id' ) )
        ->select( DB::raw( 'u.name' ),DB::raw( 'u.picture' ),DB::raw( 'd.*' ))
        ->where('doc_id',Auth::user()->id)
        // ->groupby('u.id')
        ->paginate(5);
        return view('doctor.folder.listfold',['folders'=>$folders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.folder.addFolder');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $folder = new Dossiermedical;

        if ($request->hasFile('prescription')) {
            $file = $request->file('prescription');
            $fName = 'prescription' . $_POST['name'] . '.' . $file->getClientOriginalExtension();
            $prescription = $request->file('prescription')->storeAs('img/folder', $fName, 'public');
            $folder['prescription'] = 'storage/' . $prescription;
        }
        if ($request->hasFile('report')) {
            $files = $request->file('report');
            $fName = 'report' . $_POST['name'] . '.' . $files->getClientOriginalExtension();
            $report = $request->file('report')->storeAs('img/folder', $fName, 'public');
            $folder['report'] = 'storage/' . $report;
        }
        if ($request->hasFile('cnssSheet')) {
            $fil = $request->file('cnssSheet');
            $fName = 'cnssSheet' . $_POST['name'] . '.' . $fil->getClientOriginalExtension();
            $cnssSheet = $request->file('cnssSheet')->storeAs('img/folder', $fName, 'public');
            $folder['cnssSheet'] = 'storage/' . $cnssSheet;
        }
        if ($request->hasFile('balanceSheet')) {
            $filee = $request->file('balanceSheet');
            $fName = 'balanceSheet' . $_POST['name'] . '.' . $filee->getClientOriginalExtension();
            $balanceSheet = $request->file('balanceSheet')->storeAs('img/folder', $fName, 'public');
            $folder['balanceSheet'] = 'storage/' . $balanceSheet;
        }
        $folder->doc_id = Auth::user()->id;
        $folder->patnt_id = User::where('name', $_POST['name'])->first()->id;
        

        if ($folder->save() ) {

            return redirect()->route('dFolder.index')->with('success','Dossier ajouté avec succès');
        }else{
            return back()->with('error',"Dossier n'est pas ajouté");
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
        $folder = Dossiermedical::find($id);
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
        $oldFolder = Dossiermedical::find($id);
        $oldFolder->patnt_id = User::where('name', $_POST['name'])->first()->id;
        if ($request->hasFile('prescription')) {
            $file = $request->file('prescription');
            $fName = 'prescription' . $_POST['name'] . '.' . $file->getClientOriginalExtension();
            $prescription = $request->file('prescription')->storeAs('img/folder', $fName, 'public');
            $oldFolder['prescription'] = 'storage/' . $prescription;
        }
        if ($request->hasFile('report')) {
            $files = $request->file('report');
            $fName = 'report' . $_POST['name'] . '.' . $files->getClientOriginalExtension();
            $report = $request->file('report')->storeAs('img/folder', $fName, 'public');
            $oldFolder['report'] = 'storage/' . $report;
        }
        if ($request->hasFile('cnssSheet')) {
            $fil = $request->file('cnssSheet');
            $fName = 'cnssSheet' . $_POST['name'] . '.' . $fil->getClientOriginalExtension();
            $cnssSheet = $request->file('cnssSheet')->storeAs('img/folder', $fName, 'public');
            $oldFolder['cnssSheet'] = 'storage/' . $cnssSheet;
        }
        if ($request->hasFile('balanceSheet')) {
            $filee = $request->file('balanceSheet');
            $fName = 'balanceSheet' . $_POST['name'] . '.' . $filee->getClientOriginalExtension();
            $balanceSheet = $request->file('balanceSheet')->storeAs('img/folder', $fName, 'public');
            $oldFolder['balanceSheet'] = 'storage/' . $balanceSheet;
        }
       
        if ($oldFolder->save() ) {

            return redirect()->route('dFolder.index')->with('success','Dossier modifié avec succès');
        }else{
            return back()->with('error',"Dossier n'est pas modifié");
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
        $folder = Dossiermedical::find($id);
        $folder->delete();
        return redirect()->route('dFolder.index')->with('success',"Dossier supprimé");
    }
}
