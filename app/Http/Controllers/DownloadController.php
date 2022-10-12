<?php

namespace App\Http\Controllers;

use App\Models\DownloadModel;
use Illuminate\Container\RewindableGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{

    public function index()
    {
        $download = DownloadModel::all();
        return view('dashboard.download.index', [
            'download' => $download
        ]);
    }

    public function create()
    {
        return view('fileupload');
    }

    public function store(Request $request)
    {
        $validatedUp = $request->validate([
            'title' => 'required|max:255',
            'fileup' => 'required|file|max:5120'
        ]);




        $name = $request->file('fileup')->getClientOriginalName();
        // $extension = $request->file('fileup')->extension();

        $validatedUp['fileup'] = $request->file('fileup')->storeAs(
            'fileup', $name
        );

        DownloadModel::create($validatedUp);

        return redirect('/dashboard/download')->with('success', 'New Post has been added');

    }

    public function edit(DownloadModel $download)
    {
        return view('dashboard.download.edit', [
            'data' => $download,
        ]);
    }

    public function update(Request $request, $id)
    {
        $download = DownloadModel::findOrFail($id);


        $validatedUp = $request->validate([
            'title' => 'max:255',
            'fileup' => 'file|max:5120'
        ]);
        if($request->fileup)
        {
            if(Storage::exists($request->fileup)){
                Storage::delete($download->fileup);
            }

            $name = $request->file('fileup')->getClientOriginalName();
            $validatedUp['fileup'] = $request->file('fileup')->storeAs(
                'fileup', $name
            );
        }



        DownloadModel::where('id',$download->id)
        ->update($validatedUp);

        return redirect('/dashboard/download')->with('success', 'New Post has been Updated');
    }

    public function download($id){
        $path = DownloadModel::where('id', $id)->get();
        $file = $path[0]->fileup;
        // return $file;
        return Storage::download($file);

    }

    public function destroy($id)
    {
        $download = DownloadModel::findOrFail($id);

        Storage::delete($download->fileup);
        $download->delete();
        return redirect('/dashboard/download')->with('success', 'file has been deleted');
    }

    public function view($id)
    {
        $data = DownloadModel::findOrFail($id);

        return view('dashboard.download.viewproduct', compact('data'));
    }
}
