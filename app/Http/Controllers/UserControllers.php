<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserControllers extends Controller
{

    public function index()
    {
        $data['dataUser'] = User::all();

        return view('admin.user.index', $data);
    }

    public function create()
    {
       return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        // $data['password_confirmation'] = $request->password;

        User::create($data);

        return redirect()->route('user.index')->with('success', 'Penambahan User Berhasil!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data['dataUser'] = User::findOrFail($id);
        return view('admin.user.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user -> delete();
        return redirect()->route('users.index')->with('success', 'Data berhasil dihapus');
    }
}
