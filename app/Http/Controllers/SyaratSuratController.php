<?php

namespace App\Http\Controllers;

use App\Models\SyaratSurat;
use Illuminate\Http\Request;


class SyaratSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.syaratsurat.index',[
            'surat' => SyaratSurat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.syaratsurat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedUp = $request->validate([
            'name' => 'required|max:255',
        ]);


        SyaratSurat::create($validatedUp);

        return redirect('/dashboard/syaratsurat')->with('success', 'Data Berhasil Ditambahkan');
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
    public function edit(SyaratSurat $syaratsurat)
    {
        return view('dashboard.syaratsurat.edit', [
            'syaratsurat' => $syaratsurat,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SyaratSurat $syaratSurat)
    {
        $rules = [
            'name' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);
        SyaratSurat::where('id',$syaratSurat->id)->update($validatedData);

        return redirect('/dashboard/syaratsurat')->with('success','New Category has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SyaratSurat::destroy($id);
        return redirect('/dashboard/syaratsurat')->with('success', 'Dokumen sudah di Update');
    }
}
