<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserControllers extends Controller
{
    public function index()
    {
        $data['dataUser'] = User::paginate(10); // Ganti all() dengan paginate()
        return view('admin.user.index', $data);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role'     => 'required|string|in:admin,pelanggan,mitra', // Sesuaikan dengan role yang ada
        ]);

        $data             = $request->only(['name', 'email', 'role']);
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('user.list')->with('success', 'Penambahan User Berhasil!');
    }

    public function edit(string $id)
    {
        $data['dataUser'] = User::findOrFail($id);
        return view('admin.user.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // Validasi
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'role'     => 'required|string|in:admin,pelanggan,mitra', // Sesuaikan dengan role yang ada
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->role  = $request->role; // Tambahkan ini

        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()->route('user.list')->with('success', 'Perubahan Data Berhasil');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->route('user.list')->with('success', 'Data berhasil dihapus');
    }
}
