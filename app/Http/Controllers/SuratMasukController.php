<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\LayananMandiri;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.suratmasuk.index',[
            'layananmandiri' => LayananMandiri::all(),
            'layanan' => Layanan::all()
        ]);
    }
    
    public function verified_surat(Request $request, LayananMandiri $item)
    {
        $item->approved_at = now();
        $item->save();
        return back()->with('success', 'surat Approved');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('dashboard.layananmandiri.create', [
            'layanan' => Layanan::all(),
            'syarat' => Layanan::where('id', $request->layanan_id)->get('syaratdokumen')
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
        
        $validatedData= $request->validate([
            'layanan_id' => 'required',
            'filenames' => 'file|max:7024|required',
        ]);



        if($request->file('filenames')) {
            $filename = time();
            $request->filenames->extension();
            $request->filenames->move(public_path('file'),$filename);
            $validatedData['filenames'] = $filename;
        }

        LayananMandiri::create($validatedData);

        return redirect('/dashboard/layananmandiri')->with('success', 'New Layanan has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LayananMandiri $layananmandiri)
    {
        return view('dashboard.suratmasuk.show', [
            'layanan' => $layananmandiri::where('id', $request->id)
        ]);
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
