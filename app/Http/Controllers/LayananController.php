<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\SyaratSurat;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.layanan.index',[
            'layanan' => Layanan::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.layanan.create',[
            'syaratsurat'=>syaratsurat::get('name')

        ]);
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
            'syaratdokumen' => 'required'
        ]);
            $arraytostring = implode(',',$request->syaratdokumen);
            $validatedUp['syaratdokumen'] = $arraytostring;
        Layanan::create($validatedUp);

        return redirect('/dashboard/layanan')->with('success', 'Data Berhasil Ditambahkan');
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
    public function edit(Layanan $layanan)
    {
        return view('dashboard.layanan.edit', [
            'layanan' => $layanan,
            'syaratsurat' => SyaratSurat::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Layanan $layanan)
    {
        $rules = [
            'name' => 'required|max:255',
            'syaratdokumen' => 'required',
        ];

        $validatedData = $request->validate($rules);
        $arraytostring = implode(',',$request->syaratdokumen);
        $validatedData['syaratdokumen'] = $arraytostring;
        Layanan::where('id',$layanan->id)->update($validatedData);

        return redirect('/dashboard/layanan')->with('success','Layanan sudah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Layanan::destroy($id);
        return redirect('/dashboard/layanan')->with('success', 'Layanan Sudah dihapus');
    }
}
