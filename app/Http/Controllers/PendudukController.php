<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            return Datatables::of(Penduduk::query())
            ->addColumn('action','<a href="#edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>')
            ->make(true);
        }
        return view('dashboard.penduduk.aa',[
            'penduduks' => Penduduk::paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.penduduk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validatedData= $request->validate([
            'tgl_lapor' => 'required',
            'nik' => 'required|unique:penduduks',
            'nama' => 'required',
            'nokk'=> 'required',
            'statuskeluarga' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'statuspenduduk' => 'required',
            'maksud_tujuan_kedatangan' => '',
            'nomorakta' => 'required',
            'tempatlahir' => 'required',
            'tanggallahir' => 'required',
            'waktulahir' => '',
            'tempatdilahirkan' => '',
            'kelahiran_anak_ke' => '',
            'penolong_kelahiran' => '',
            'beratLahir' => '',
            'panjangLahir' => '',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
            'negara_asal' => '',
            'nikAyah' => 'required',
            'nikIbu' => 'required',
            'namaAyah' => 'required',
            'namaIbu' => 'required',
            'dusun' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'email' => 'required|email',
            'alamat_sekarang' => 'required',
            'statuskawin' => '',
            'noaktanikah' => '',
            'tanggalperkawinan' => '',
            'akta_perceraian' => '',
            'tanggalperceraian' => '',
            'goldarah' => '',
            'cacat' => '',
            'sakitmenahun' => '',
            'akseptorKB' => '',
            'asuransi' => '',
        ]);



        Penduduk::create($validatedData);

        return redirect('/dashboard/penduduk')->with('success', 'New Post has been added');
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
        //
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
