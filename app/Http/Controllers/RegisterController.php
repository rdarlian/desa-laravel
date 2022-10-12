<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Penduduk;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('dashboard/users/index' ,[
            'datas' => User::get()
        ]);
    }
    public function create()
    {
        // SELECT * FROM tabel_a WHERE NOT EXISTS (SELECT * FROM tabel_b)
        $users = DB::table('users')->select('email');

        return view('register.index', [
            'title' => 'Register',
            'active' => 'register',
            'penduduks' => Penduduk::whereNotIn('email', $users)
            ->get()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5',
        ]);

        $validatedData['is_admin'] = false;
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        //$request->session()->flash('success', 'Reqistrasi Berhasil! Please Login');
        return redirect('/login')->with('success', 'Reqistrasi Berhasil! Please Login');

    }
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);
        User::where('id',$user->id)->update($validatedData);

        return redirect('/dashboard/categories')->with('success','New Category has been Updated');
    }
}
