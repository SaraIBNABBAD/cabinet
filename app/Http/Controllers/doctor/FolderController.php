<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\Dossiermedical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        $folder->name = $request['name'];

        if ($request->hasFile('prescription')) {
            $file = $request->file('prescription');
            $fName = 'prescription' . $folder['name'] . '.' . $file->getClientOriginalExtension();
            $prescription = $request->file('prescription')->storeAs('img/folder', $fName, 'public');
            $folder['prescription'] = 'storage/' . $prescription;
        }
        if ($request->hasFile('report')) {
            $files = $request->file('report');
            $fName = 'report' . $folder['name'] . '.' . $files->getClientOriginalExtension();
            $report = $request->file('report')->storeAs('img/folder', $fName, 'public');
            $folder['report'] = 'storage/' . $report;
        }
        if ($request->hasFile('cnssSheet')) {
            $fil = $request->file('cnssSheet');
            $fName = 'cnssSheet' . $folder['name'] . '.' . $fil->getClientOriginalExtension();
            $cnssSheet = $request->file('cnssSheet')->storeAs('img/folder', $fName, 'public');
            $folder['cnssSheet'] = 'storage/' . $cnssSheet;
        }
        if ($request->hasFile('balanceSheet')) {
            $filee = $request->file('balanceSheet');
            $fName = 'balanceSheet' . $folder['name'] . '.' . $filee->getClientOriginalExtension();
            $balanceSheet = $request->file('balanceSheet')->storeAs('img/folder', $fName, 'public');
            $folder['balanceSheet'] = 'storage/' . $balanceSheet;
        }
        $folder->doct_id = Auth::user()->id;
        if ($folder->save()) {
            return redirect()->route('dFolder.index');
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
        //
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
        $newFolder = Dossiermedical::find($id);
        $newFolder->name = $request['name'];
        $newFolder->prescription = $request['prescription'];
        $newFolder->report = $request['report'];
        $newFolder->cnssSheet = $request['cnssSheet'];
        $newFolder->balanceSheet = $request['balanceSheet'];
        if ($newFolder->save()) {
            return redirect()->route('dFolder.index');
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
        //
    }
}
