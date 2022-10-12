<?php

namespace App\Http\Controllers;

use App\Models\Perangkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.perangkat.index',[
            'perangkats' => Perangkat::paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.perangkat.create');
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
            'nama' => 'required|max:255',
            'notelp' => 'nullable|max:255',
            'alamat' => 'required',
            'email' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'foto' => 'required|image|file|max:5048',
        ]);



        if($request->file('foto')) {
            $newImageName = time() . '-' . $request->nama . '.' .
            $request->foto->extension();
            $request->foto->move(public_path('perangkat-images'),$newImageName);
            $validatedData['foto'] = $newImageName;
        }

        Perangkat::create($validatedData);

        return redirect('/dashboard/perangkat')->with('success', 'Perangkat Profil Sudah ditambahkan');
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
        return view('dashboard.perangkat.edit', [
            'perangkat' => Perangkat::findOrFail($id),
        ]);
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
        $rules = [
            'nama' => 'required|max:255',
            'notelp' => 'nullable|max:255',
            'alamat' => 'required',
            'email' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'foto' => 'image|file|max:5048',
        ];

        $validatedData = $request->validate($rules);

        if($request->file('foto')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $newImageName = time() . '-' . $request->nama . '.' .
            $request->foto->extension();
            $request->foto->move(public_path('perangkat-images'),$newImageName);
            $validatedData['foto'] = $newImageName;
        }

        Perangkat::where('id', $id)
        ->update($validatedData);

        return redirect('/dashboard/perangkat')->with('success', 'Foto sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perangkat = Perangkat::findOrFail($id);
        if($perangkat->foto){
            unlink("perangkat-images/".$perangkat->foto);
        }
        Perangkat::destroy($perangkat->id);
        return redirect('/dashboard/perangkat')->with('success', 'Perangkat has been deleted');
    }
}
