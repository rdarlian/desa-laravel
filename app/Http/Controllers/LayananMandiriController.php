<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Models\LayananMandiri;
use Illuminate\Support\Facades\File;

class LayananMandiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.layananmandiri.index',[
            'layananmandiri' => LayananMandiri::where('user_id', auth()->user()->id)->get(),
            'layanan' => Layanan::all()
            // Post::where('user_id', auth()->user()->id)
        ]);
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
            $validatedData['user_id'] = auth()->user()->id;

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
    public function edit(LayananMandiri $layananmandiri)
    {
        return view('dashboard.layananmandiri.edit', [
            'layananmandiri' => $layananmandiri,
            'layanan' => Layanan::all(),
            'syarat' => Layanan::where('id', $layananmandiri->layanan_id)->get('syaratdokumen')
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LayananMandiri $layananmandiri)
    {
        if($layananmandiri->filenames){
            File::delete( public_path('file/'. $layananmandiri->filenames) );
        }
        $layananmandiri::destroy($layananmandiri->id);
        return redirect('/dashboard/layananmandiri')->with('success', 'LayananMandiri has been deleted');
    }
}
