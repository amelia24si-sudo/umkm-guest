<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserControllers extends Controller
{

    public function index()
    {
        return view('admin.user.index');
    }

    public function create()
    {
       return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        // $data['password_confirmation'] = $request->password;

        User::create($data);

        return redirect()->route('users.index')->with('success', 'Penambahan User Berhasil!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
