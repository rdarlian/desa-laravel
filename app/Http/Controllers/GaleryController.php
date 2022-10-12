<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.galery.index',[
            'galeries' => Galery::paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.galery.create');
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
            'inputNamaFotoGalery' => 'required|max:255',
            'inputFotoGalery' => 'image|file|max:5048',
        ]);



        if($request->file('inputFotoGalery')) {
            $newImageName = time() . '-' . $request->inputNamaFotoGalery . '.' .
            $request->inputFotoGalery->extension();
            $request->inputFotoGalery->move(public_path('images'),$newImageName);
            $validatedData['inputFotoGalery'] = $newImageName;
        }

        Galery::create($validatedData);

        return redirect('/dashboard/galery')->with('success', 'New Post has been added');
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
        return view('dashboard.galery.edit', [
            'galery' => Galery::findOrFail($id),
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
            'inputNamaFotoGalery' => 'required|max:255',
            'inputFotoGalery' => 'image|file|max:5048',
        ];

        $validatedData = $request->validate($rules);

        if($request->file('inputFotoGalery')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $newImageName = time() . '-' . $request->inputNamaFotoGalery . '.' .
            $request->inputFotoGalery->extension();
            $request->inputFotoGalery->move(public_path('images'),$newImageName);
            $validatedData['inputFotoGalery'] = $newImageName;
        }

        Galery::where('id', $id)
        ->update($validatedData);

        return redirect('/dashboard/galery')->with('success', 'New Photo has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galery = Galery::findOrFail($id);
        if($galery->inputFotoGalery){
            unlink("images/".$galery->inputFotoGalery);
        }
        Galery::destroy($galery->id);
        return redirect('/dashboard/galery')->with('success', 'Photo has been deleted');
    }

}
