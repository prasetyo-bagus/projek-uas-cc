<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6'],
            'role' => ['required', Rule::in(['SUPER_ADMIN', 'ADMIN'])],
            'status' => ['required', Rule::in(['AKTIF', 'TIDAK_AKTIF'])],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $isEditingSelf = auth()->id() === $user->id && $user->role === 'SUPER_ADMIN';
    
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'confirmed', 'min:6'],
        ];
    
        if (!$isEditingSelf) {
            // Hanya jika bukan superadmin yang edit dirinya sendiri
            $rules['role'] = ['required', Rule::in(['SUPER_ADMIN', 'ADMIN'])];
            $rules['status'] = ['required', Rule::in(['AKTIF', 'TIDAK_AKTIF'])];
        }
    
        $validated = $request->validate($rules);
    
        // Jika mengedit diri sendiri, hapus role/status dari data validasi
        if ($isEditingSelf) {
            unset($validated['role'], $validated['status']);
        }
    
        // Proteksi: jangan biarkan mengubah role SUPER_ADMIN terakhir
        if ($user->role === 'SUPER_ADMIN' && isset($validated['role']) && $validated['role'] !== 'SUPER_ADMIN') {
            $superAdminCount = User::where('role', 'SUPER_ADMIN')->count();
            if ($superAdminCount <= 1) {
                return redirect()->back()->with('error', 'Minimal harus ada satu SUPER ADMIN. Tidak bisa mengubah role.');
            }
        }
    
        // Password hash jika diisi
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }
    
        $user->update($validated);
    
        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Jika user yang mau dihapus adalah SUPER_ADMIN
        if ($user->role === 'SUPER_ADMIN') {
            // Hitung jumlah super admin
            $superAdminCount = \App\Models\User::where('role', 'SUPER_ADMIN')->count();

            // Kalau hanya ada 1 super admin, larang penghapusan
            if ($superAdminCount <= 1) {
                return redirect()->back()->with('error', 'Minimal harus ada satu SUPER ADMIN. Tidak bisa menghapus user ini.');
            }
        }

        // Cegah superadmin menghapus dirinya sendiri
        if (auth()->id() === $user->id && $user->role === 'SUPER_ADMIN') {
            return redirect()->back()->with('error', 'Anda tidak bisa menghapus akun SUPER ADMIN milik sendiri.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
