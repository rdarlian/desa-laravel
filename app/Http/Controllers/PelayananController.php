<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pelayanan.index', [
            'pelayanans' => Pelayanan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pelayanan.create');
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
            'nama_pelayanan' => 'required|unique:pelayanans',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ]);


        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('pelayanan-images');
        }

        Pelayanan::create($validatedData);

        return redirect('/dashboard/pelayanan')->with('success', 'New Post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Pelayanan $pelayanan)
    {
        return view('dashboard.pelayanan.show',[
            "pelayanan" => $pelayanan
        ]);
    }


    public function edit(Pelayanan $pelayanan)
    {
        return view('dashboard.pelayanan.edit', [
            'pelayanan' => $pelayanan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pelayanan  $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelayanan $pelayanan)
    {
        $rules = [
            'nama_pelayanan' => 'unique',
            'image' => 'image|file|max:2048',
            'body' => 'required'

        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('pelayanan-images');
        }

        Pelayanan::where('id',$pelayanan->id)
        ->update($validatedData);

        return redirect('/dashboard/pelayanan')->with('success', 'New Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelayanan $pelayanan)
    {
        if($pelayanan->image){
            Storage::delete($pelayanan->image);
        }
        Pelayanan::destroy($pelayanan->id);
        return redirect('/dashboard/pelayanan')->with('success', 'Pelayanan has been deleted');
    }
    public function tampil(Pelayanan $pelayanan)
    {
        return view('pelayanan',[
            "active" => 'pelayanan',
            "title" => "Pelayanan",
            "pelayanan" => $pelayanan
        ]);
    }
}
